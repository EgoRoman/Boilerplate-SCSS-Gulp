const {series, parallel, src, dest, watch} = require('gulp');
const pug = require('gulp-pug');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create();
const del = require('del');
const svgSprite = require('gulp-svg-sprite');

function watchServer() {
  browserSync.init({
    server: {
      baseDir: './dist'
    }
  });
  watch('./src/pages/**/*.pug', pugHtml);
  watch('./src/static/scripts/*.js', js);
  watch('./src/static/images/icons/*.svg', iconsSvgSprite);
  watch('./src/static/styles/**/*.scss', buildStyles);
  watch('dist/*.html').on('change', browserSync.reload);
}

function iconsSvgSprite() {
  return src('./src/static/images/icons/*.svg')
    .pipe(svgSprite({
      mode: {
        symbol: {
          sprite: 'sprite.svg'
        }
      }
    }))
    .pipe(dest('dist/static/images/icons'));
}

function clean() {
  return del('dist');
}


function js() {
  return src('./src/static/scripts/*.*')
    .pipe(dest('./dist/static/scripts'));
}

function fonts() {
  return src('./src/static/fonts/*.*')
    .pipe(dest('./dist/static/fonts'))
}

function pugHtml() {
  return src('./src/pages/*.pug')
    .pipe(pug({}))
    .pipe(dest('./dist'));
}

function buildStyles() {
  return src('./src/static/styles/styles.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(dest('./dist/static/css'))
    .pipe(browserSync.stream());
}

function images() {
  return src('./src/static/images/content/**/*.*')
    .pipe(dest('./dist/static/images/content'))
}

exports.default = series(clean, parallel(fonts, images, pugHtml, buildStyles, js, iconsSvgSprite), watchServer);
