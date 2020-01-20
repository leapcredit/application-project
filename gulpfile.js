const { watch, series, parallel, src, dest } = require('gulp');
const concat = require('gulp-concat');
const cleanDir = require('gulp-clean-dir');
const cleanCSS = require('gulp-clean-css');
const livereload = require('gulp-livereload');

function clean(cb) {
  cleanDir('./dist');
  cb();
}

function build(cb) {
  parallel(buildCSS, buildJS);
  cb();
}

function buildCSS() {
  return src('./src/css/*.css')
    .pipe(concat('main.css'))
    .pipe(cleanCSS())
    .pipe(dest('./dist/'))
    .pipe(livereload())
}

function buildJS() {
  return src(['./src/js/*.js', './src/js/slider/*.min.js'])
    .pipe(concat('main.js'))
    .pipe(dest('./dist/'))
    .pipe(livereload())
}

function watches(cb) {
  livereload.listen();
  watch('src/css/*.css', buildCSS)
  watch('src/js/*.js', buildJS)
  cb()
}

// exports.build = build;
exports.default = series(clean, parallel(buildCSS, buildJS), watches);