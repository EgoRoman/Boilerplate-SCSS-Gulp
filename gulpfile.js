/**
 * Paths to project folders
 */
var themePath = './templates/osnova-med/';
// var projectURL = 'test.r98712ol.beget.tech';

var paths = {
  styles: {
    input: themePath + 'assets/scss/style.scss',
    output: themePath + '/css/',
    watch: themePath + 'assets/scss/**/*.scss'
  }
};

// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
var AUTOPREFIXER_BROWSERS = [
  'last 2 version',
  '> 1%',
  'ie >= 9',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 7',
  'android >= 4',
  'bb >= 10'
];

/**
 * Gulp Packages
 */
var gulp = require('gulp');
var browserSync = require('browser-sync').create(); // Reloads browser and injects CSS. Time-saving synchronised browser testing.
var sourcemaps = require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
var sass = require('gulp-sass'); // Gulp pluign for Sass compilation.
var autoprefixer = require('gulp-autoprefixer'); // Autoprefixing magic.
var lineec = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
var rename = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var minifycss = require('gulp-uglifycss'); // Minifies CSS files.
var filter = require('gulp-filter'); // Enables you to work on a subset of the original files by filtering them using globbing.

/**
 * Gulp Tasks
 */
gulp.task('browser-sync', function () {
  browserSync.init({
    // Project URL.
    proxy: projectURL,
    host: projectURL,
    open: 'external',
    // Inject CSS changes.
    // Commnet it to reload browser for every CSS change.
    injectChanges: true,
  });
});

/**
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 */
gulp.task('styles', function () {
  return gulp.src(paths.styles.input)
    .pipe(sourcemaps.init())
    .pipe(sass({
      errLogToConsole: true,
      precision: 10
    }))
    .on('error', console.error.bind(console))
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
 *
 * Watches for file changes and runs specific tasks.
 */
gulp.task('default', ['styles'], function () {
  gulp.watch(paths.styles.watch, ['styles']); // Reload on SCSS file changes.
});
