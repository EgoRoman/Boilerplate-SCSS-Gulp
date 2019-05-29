'use strict';

/**
 * Paths to project folders
 */
const themePath = './template/';
// const projectURL = 'test.r98712ol.beget.tech';

const paths = {
  styles: {
    input: themePath + 'assets/scss/style.scss',
    output: themePath + 'dist/css/',
    watch: themePath + 'assets/scss/**/*.scss'
  },
  dist: themePath + 'dist'
};

// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
  'last 1 version',
  'last 2 Chrome versions',
  'last 2 Firefox versions',
  'last 2 Opera versions',
  'last 2 Edge versions'
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
    // .on('error', console.error.bind(console))
    // .pipe(sourcemaps.write({includeContent: false}))
    // .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
    .pipe(sourcemaps.write('./'))
    .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
    .pipe(gulp.dest(paths.styles.output))
    .pipe(filter('**/*.css')) // Filtering stream to only css files
    .pipe(browserSync.stream()) // Reloads style.css if that is enqueued.

    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss({
      maxLineLen: 10
    }))
    .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
    .pipe(gulp.dest(paths.styles.output))
});

/**
 * Watch Tasks.
 */

gulp.task('watch', ['assemble'], () => {
  browserSync.init({
    server: '.',
    // host: localhost,
    notify: false,
    open: true,
    port: 8080,
    ui: false
  });

  gulp.watch(paths.styles.watch, ['styles']);
  // gulp.watch('*.html').on('change', (e) => {
  //   if (e.type !== 'deleted') {
  //     gulp.start('copy-html');
  //   }
  // });
  // gulp.watch('js/**/*.js', ['js-watch']);
});

gulp.task('assemble', ['clean'], () => {
  // gulp.start('copy', 'style');
  gulp.start('styles');
});

gulp.task('clean', () => {
  return del(paths.dist);
});

// gulp.task('copy', ['copy-html', 'scripts', 'style'], () => {
//   return gulp.src([
//     'fonts/**/*.{woff,woff2}',
//     'img/**/*.*'
//   ], {base: '.'})
//     .pipe(gulp.dest('build'));
// });

gulp.task('default', ['watch']);
