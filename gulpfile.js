'use strict';

/**
 * Paths to project folders
 */
const themePath = './template/',
  projectURL = 'project.local'; // Domain in local OpenServer

const paths = {
  styles: {
    input: themePath + 'assets/scss/style.scss',
    output: themePath + 'dist/css/',
    watch: themePath + 'assets/scss/**/*.scss'
  },
  scripts: {
    input: themePath + 'assets/js/main.js',
    output: themePath + 'dist/js/',
    watch: themePath + 'assets/js/**/*.js'
  }
};

// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
  'last 2 versions'
];

/**
 * Gulp Packages
 */
const gulp = require('gulp'),
  plumber = require('gulp-plumber'),
  sourcemaps = require('gulp-sourcemaps'), // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
  sass = require('gulp-sass'), // Gulp pluign for Sass compilation.
  autoprefixer = require('gulp-autoprefixer'), // Autoprefixing magic.
  lineec = require('gulp-line-ending-corrector'), // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
  filter = require('gulp-filter'), // Enables you to work on a subset of the original files by filtering them using globbing.
  browserSync = require('browser-sync').create(), // Reloads browser and injects CSS. Time-saving synchronised browser testing.
  rename = require('gulp-rename'), // Renames files E.g. style.css -> style.min.css
  minifycss = require('gulp-uglifycss'), // Minifies CSS files.

  rigger = require('gulp-rigger'),
  rollup = require('gulp-better-rollup'),
  uglify = require('gulp-uglify'),

  del = require('del');

/**
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 */
gulp.task('styles', () => {
  gulp.src(paths.styles.input)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass({
      precision: 10,
      sourceComments: true
    })
      .on('error', sass.logError))
    .pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
    .pipe(sourcemaps.write('./'))
    .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
    .pipe(gulp.dest(paths.styles.output))
    .pipe(filter('**/*.css')) // Filtering stream to only css files
    .pipe(browserSync.stream()) // Reloads style.css if that is enqueued.

    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
    .pipe(gulp.dest(paths.styles.output))
});

gulp.task('scripts', () => {
  return gulp.src(paths.scripts.input)
    .pipe(plumber())
    .pipe(rigger())
    .pipe(sourcemaps.init())
    // .pipe(rollup({}, `iife`))
    .pipe(rename('app.js'))
    .pipe(sourcemaps.write(''))
    .pipe(gulp.dest(paths.scripts.output))
    .pipe(filter('**/*.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.output));
});

gulp.task('js-watch', ['scripts'], (done) => {
  browserSync.reload();
  done();
});

/**
 * Watch Tasks.
 */

gulp.task('watch', ['assemble'], () => {
  browserSync.init({
    server: '.',
    // host: localhost,
    // proxy: projectURL,
    notify: false,
    open: true,
    port: 8080,
    ui: false
  });

  gulp.watch(paths.styles.watch, ['styles']);
  gulp.watch(paths.scripts.watch, ['js-watch']);
});

gulp.task('assemble', ['clean'], () => {
  // gulp.start('copy', 'style');
  gulp.start('styles');
  gulp.start('scripts');
});

gulp.task('clean', () => {
  // return del(paths.dist);
});

// gulp.task('copy', ['copy-html', 'scripts', 'style'], () => {
//   return gulp.src([
//     'fonts/**/*.{woff,woff2}',
//     'img/**/*.*'
//   ], {base: '.'})
//     .pipe(gulp.dest('build'));
// });

gulp.task('default', ['watch']);
