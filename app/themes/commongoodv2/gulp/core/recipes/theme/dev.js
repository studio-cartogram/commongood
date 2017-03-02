const gulp = require('gulp')
const plumber = require('gulp-plumber')
const transform = require('vinyl-transform')
const path = require('path')
const map = require('map-stream')
const add = require('gulp-add')
const filter = require('gulp-filter')
const insert = require('gulp-insert')
const notify = require('gulp-notify')
const browserSync = require('browser-sync')


// utils
const pumped = require('../../utils/pumped')

// config
const project = require('../../../../project.config')
const config = require('../../config/theme')

// templates
const includeDev = require('../../templates/devmode-php-include')
const style = require('../../templates/wordpress-style-css')
const bSSnippet = require('../../templates/browser-sync-snippet')

/**
 * Move the Theme to
 * the build directory
 * add required files
 * and add browser-sync
 * snippet
 *
 * @returns {*}
 */
module.exports = function () {
  const filterPHP = filter('**/*.php', { restore: true })
  const filterFunc = filter('functions.php', { restore: true })

  return gulp.src(config.paths.src)
  .pipe(plumber())

  .pipe(filterPHP) // Filter php files and transform
  // them to simply include the file
  // from the dev theme. This is to
  // make it possible to debug php from
  // within the dev theme
  .pipe(transform(filename => map((chunk, next) => {
    let definitions = []
    if (config.options.transform.preserve) {
      definitions = chunk.toString().match(config.options.transform.preserve)
    }

    const relativeFilename = path.relative(config.paths.dest, filename)
    return next(null, includeDev(relativeFilename, definitions))
  })))
  .pipe(filterPHP.restore)

  .pipe(add({
    '.gitignore': '*',
    'style.css': style,
  }))

  .pipe(filterFunc) // We only want to append the
  // Browser-sync snippet to the
  // functions.php so we need to
  // filter the gulp stream
  .pipe(insert.append(bSSnippet))
  .pipe(filterFunc.restore)

  .pipe(gulp.dest(config.paths.dest))
  .pipe(notify({
    message: pumped('Theme Moved!'),
    onLast: true,
  }))

  .on('end', browserSync.reload)
}
