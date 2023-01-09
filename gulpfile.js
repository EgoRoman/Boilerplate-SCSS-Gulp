const appUrl = 'boilerplate-scss-gulp',
  themePath = './',
  uiPath = '';

const {dest, series, parallel, src, watch} = require('gulp'),
  // Common plugins
  browserSync = require('browser-sync'),
  plumber = require('gulp-plumber'), // Prevent pipe breaking caused by errors from gulp plugins
  rename = require('gulp-rename'); // Renames files
  // Scss plugins
  autoprefixer = require('autoprefixer'),
  csso = require('gulp-csso'),
  postcss = require('gulp-postcss'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps'),

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
    input: themePath + 'src/scss/style.scss',
    output: themePath + 'dist/css/',
    watch: themePath + 'src/scss/**/*.scss'
  },
  scripts: {
    input: themePath + 'assets/js/app.js',
    output: themePath + 'dist/js/',
    watch: themePath + 'assets/js/**/*.js'
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
 * Build styles task
 */
function styles() {
  return src(paths.styles.input)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    // .on("error", notify.onError("Error: <%= error.message %>"))
    .pipe(postcss([
      autoprefixer(),
    ]))
    //.pipe(groupmedia()) // todo add task?
    .pipe(sourcemaps.write('./'))
    .pipe(dest(paths.styles.output))
    .pipe(csso({
      sourceMap: false,
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(dest(paths.styles.output))
    .pipe(browserSync.reload({
      stream: true
    }));
}

/**
 * Build scripts task
 */
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

/**
 * BrowserSync tasks
 */
function startServer(done) {
  server.init({
    proxy: appUrl, // domain name from OpenServer
  });
  done();
}

function reloadBrowser(done) {
  server.reload();
  done();
}

function watchTask() {
  watch(paths.styles.watch, series(styles, reloadBrowser));
  watch(paths.scripts.watch, series(buildScripts, reloadBrowser));
  watch('index.php', series(reloadBrowser));
}

const copyTask = () => {
  return src([
    paths.fonts.input,
  ])
    .pipe(dest([
      paths.fonts.output
    ]));
}

// TODO image optimize task





/**
 * Export Tasks
 */
exports.dev = series(
  // copyTask,
  styles,
  // buildScripts,
  startServer,
  watchTask,
);

// Default task
// gulp
exports.default = series(
  // cleanDist,
  parallel(
    styles,
    buildScripts,


    // lintScripts,
    // buildSVGs,
    // copyFiles
  )
);
