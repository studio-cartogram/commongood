const gulp = require('gulp')
const filter = require('gulp-filter')
const plumber = require('gulp-plumber')
const sourcemaps = require('gulp-sourcemaps')
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')
const notify = require('gulp-notify')
const browserSync = require('browser-sync')

// utils
const pumped = require('../../utils/pumped')

// config
const config = require('../../config/styles.js')

/**
 * Compile SCSS to CSS,
 * create Sourcemaps
 * and trigger
 * Browser-sync
 *
 *
 */
module.exports = function (cb) {
  const filterCSS = filter('**/*.css', { restore: true })

  return gulp.src(config.paths.src)
  .pipe(plumber())

  .pipe(sourcemaps.init())
  .pipe(sass.sync(config.options.sass).on('error', sass.logError))
  .pipe(autoprefixer(config.options.autoprefixer))
  .pipe(sourcemaps.write('./'))

  .pipe(gulp.dest(config.paths.dest))

  .pipe(filterCSS) // sourcemaps adds `.map` files to the gulp
  // stream, but we only want to trigger
  // Browser-sync on CSS files so we need to
  // filter the stream for the css files
  .pipe(browserSync.reload({ stream: true }))
  .pipe(filterCSS.restore)

  .pipe(notify({
    message: pumped('SCSS Compiled.'),
    onLast: true,
  }))
}
