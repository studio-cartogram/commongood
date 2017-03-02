const gulp = require('gulp')
const plumber = require('gulp-plumber')
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')
const minify = require('gulp-cssnano')
const notify = require('gulp-notify')

// utils
const pumped = require('../../utils/pumped')

// config
const config = require('../../config/styles')


/**
 * Compile SCSS to CSS
 * and Minify
 *
 */
module.exports = function () {
  return gulp.src(config.paths.src)
  .pipe(plumber())

  .pipe(sass.sync(config.options.sass).on('error', sass.logError))
  .pipe(autoprefixer(config.options.autoprefixer))

  .pipe(minify(config.options.minify))

  .pipe(gulp.dest(config.paths.dest))
  .pipe(notify({
    message: pumped('SCSS Compiled & Minified.'),
    onLast: true,
  }))
}
