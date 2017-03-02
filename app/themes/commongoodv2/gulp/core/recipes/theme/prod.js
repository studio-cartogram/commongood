const gulp = require('gulp')
const plumber = require('gulp-plumber')
const add = require('gulp-add')
const notify = require('gulp-notify')

// utils
const pumped = require('../../utils/pumped')

// config
const project = require('../../../../project.config')
const config = require('../../config/theme')

// templates
const style = require('../../templates/wordpress-style-css.js')


/**
 * Move the Theme to
 * the build directory
 * and add required files
 *
 * @returns {*}
 */
module.exports = function () {
  return gulp.src(config.paths.src)
  .pipe(plumber())

  .pipe(add({
    '.gitignore': '*',
    'style.css': style,
  }))

  .pipe(gulp.dest(config.paths.dest))
  .pipe(notify({
    message: pumped('Theme Moved!'),
    onLast: true,
  }))
}
