// TODO image optimize task
const appUrl = 'App-domain';

const {dest, series, parallel, src, watch} = require('gulp'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  cssnano = require('cssnano'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps'),
  browserSync = require('browser-sync'),
  concat = require('gulp-concat'),
  include = require('gulp-include'),
  uglify = require('gulp-uglify-es').default;

const server = browserSync.create();

/**
 * Settings
 * Turn on/off build features
 */

const settings = {
  // clean: true,
  // scripts: true,
  // polyfills: true,
  // styles: true,
  // svgs: true,
  // copy: true,
  // reload: true
};

/**
 * Paths to project folders
 */

const paths = {
  styles: {
    input: 'src/scss/**/*.scss',
    output: 'dist/css/'
  },
  scripts: {
    vendorDir: 'src/js/vendor/',
    input: 'src/js/app.js',
    output: 'dist/js/'
  },
  fonts: {
    input: 'src/fonts/*.{woff,woff2}',
    output: 'dist/fonts/'
  },

  //
  // svgs: {
  //   input: 'build/svg/*.svg',
  //   output: 'dist/svg/'
  // },
  // copy: {
  //   input: 'build/copy/**/*',
  //   output: 'dist/'
  // },
  // reload: './dist/'
};

/**
 * Gulp Tasks
 */

function buildStyles() {
  return src(paths.styles.input)

    // initialize sourcemaps first
    .pipe(sourcemaps.init())
    // compile SCSS to CSS
    .pipe(sass())
    // PostCSS plugins
    .pipe(postcss([autoprefixer(), cssnano()]))
    // write sourcemaps file in current directory
    .pipe(sourcemaps.write('.'))
    // put final CSS in dist folder
    .pipe(dest(paths.styles.output));
}

function buildScripts() {
  return src(
    // paths.scripts.vendorDir + 'jquery.js',
    // paths.scripts.vendorDir + 'jquery.fancybox.js',
    // paths.scripts.vendorDir + 'scrollreveal.js',
    paths.scripts.input
  )
    .pipe(include())
    // .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(dest(paths.scripts.output));
}

const copyTask = () => {
  return src([
    paths.fonts.input,
  ])
    .pipe(dest([
      paths.fonts.output
    ]));
}

function serve(done) {
  server.init({
    proxy: appUrl
  });
  done();
}

function reloadBrowser(done) {
  server.reload();
  done();
}

function watchTask() {
  watch(paths.styles.input, series(buildStyles, reloadBrowser));
  watch(paths.scripts.input, series(buildScripts, reloadBrowser));
  watch('index.php', series(reloadBrowser));
}

/**
 * Export Tasks
 */

// Watch and reload
// gulp watch
exports.dev = series(
  copyTask,
  buildStyles,
  buildScripts,
  serve,
  watchTask
);

// Default task
// gulp
exports.default = series(
  // cleanDist,
  parallel(
    buildStyles,
    buildScripts,


    // lintScripts,
    // buildSVGs,
    // copyFiles
  )
);
