'use strict';

//Required libraries
const gulp = require('gulp');
const webserver = require('gulp-webserver');
const cleanCSS = require('gulp-clean-css');
const sass = require('gulp-sass');
const imagemin = require('gulp-imagemin');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

gulp.task('ugly', () => {
  return gulp.src('./src/js/*.js')
    .pipe(babel({
      presets: ['es2015']
    }))
    .pipe(uglify())
    .pipe(gulp.dest('./dist/js'));
});

gulp.task('webserver', () => {
  gulp.src('./')
    .pipe(webserver({
      host: "localhost",
      port: 80,
      livereload: true,
      open: true
    }));
});

gulp.task('images', () => {
  gulp.src('./src/img/*')
    .pipe(imagemin([
      imagemin.optipng({optimizationLevel: 5})
    ]))
    .pipe(gulp.dest('./dist/img'));
});

gulp.task('sass', () => {
  return gulp.src('./src/sass/*.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(gulp.dest('./build/css'));
});

gulp.task('minify-css', () =>{
  return gulp.src('./build/css/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('./dist/css'))
});


gulp.task('watch', () => {
  gulp.watch('./src/sass/*.scss', ['sass']);
  gulp.watch('./build/css/*.css', ['minify-css']);
  gulp.watch('./src/img/*.png', ['images']);
  gulp.watch('./src/js/*.js', ['ugly']);
});

gulp.task('default', ['webserver', 'watch']);
