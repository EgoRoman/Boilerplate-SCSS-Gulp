const appUrl = 'picture-plus',
  themePath = './',
  uiPath = '';

const {dest, series, parallel, src, watch} = require('gulp'),
  // Common plugins
  browserSync = require('browser-sync'),
  clean = require('gulp-clean'),
  plumber = require('gulp-plumber'),
  newer = require('gulp-newer'),
  rename = require('gulp-rename'),
  replace = require('gulp-replace'),
  cheerio = require('gulp-cheerio'),

  // Scss plugins
  autoprefixer = require('autoprefixer'),
  csso = require('gulp-csso'),
  postcss = require('gulp-postcss'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps'),

  //SVG
  svgSprite = require('gulp-svg-sprite'),

  //
  concat = require('gulp-concat'),
  include = require('gulp-include'),
  uglify = require('gulp-uglify-es').default;

const server = browserSync.create();

/**
 * Settings
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
  svg: {
    source: themePath + 'src/img/icons/svg/source/**/*.svg',
    outputSymbol: themePath + 'src/img/icons/svg/symbol/',
    output: themePath + 'dist/img/icons/svg-sprite/',
    watchSource: themePath + 'src/img/icons/svg/source/**/*.svg',
    watchSymbol: themePath + 'src/img/icons/svg/symbol/**/*.svg',
  },
  fonts: {
    input: themePath + 'src/fonts/**/*.*',
    output: themePath + 'dist/fonts/'
  },

  // copy: {
  //   input: 'build/copy/**/*',
  //   output: 'dist/'
  // },
  // reload: './dist/'
};

/**
 * Build styles task
 */
function buildStyles() {
  return src(paths.styles.input)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    // .on("error", notify.onError("Error: <%= error.message %>"))
    .pipe(postcss([
      autoprefixer(),
    ]))
    .pipe(sourcemaps.write('./'))
    .pipe(dest(paths.styles.output))
    .pipe(csso({
      sourceMap: false,
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(dest(paths.styles.output))
    .pipe(server.stream());
}

/**
 * Build scripts
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
 * Build SVG Sprite
 */
function cheerioTask() {
  return src(paths.svg.source)
    .pipe(cheerio({
      run: function ($) {
        $('[fill]').removeAttr('fill');
        $('[stroke]').removeAttr('stroke');
        $('[style]').removeAttr('style');
        $('[class]').removeAttr('class');
      },
      parserOptions: {xmlMode: true}
    }))
    .pipe(replace('&gt;', '>'))
    .pipe(dest(paths.svg.outputSymbol))
}

function buildSvgSprite() {
  return src(paths.svg.outputSymbol + '*.svg')
    .pipe(svgSprite({
      shape: {
        dimension: {
          maxWidth: 128,
          maxHeight: 128
        }
      },
      mode: {
        symbol: {
          dest: ".",
          sprite: "sprite.svg",
          example: true
        }
      }
    }))
    .pipe(dest(paths.svg.output))
    .pipe(browserSync.reload({
      stream: true
    }))
    .on('end', browserSync.reload);
}

function svgClean() {
  return src(paths.svg.outputSymbol, {read: false, allowEmpty: true})
    .pipe(clean());
}

/**
 * Fonts
 */
function fonts() {
  return src(paths.fonts.input)
    .pipe(newer(paths.fonts.output))
    .pipe(dest(paths.fonts.output));
}

/**
 * Images
 */
function img() {
  return src(['src/img/**/*', '!src/img/icons/svg/**/*'])
    .pipe(newer('dist/img'))
    .pipe(dest('dist/img'))
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
  watch(paths.styles.watch, series(buildStyles, reloadBrowser));
  watch(paths.scripts.watch, series(buildScripts, reloadBrowser));
  watch(paths.svg.watchSource, series(cheerioTask));
  watch(paths.svg.watchSymbol, series(buildSvgSprite));
  // watch php files
  watch('index.php', series(reloadBrowser));
  watch('pages/**/*.php', series(reloadBrowser));
  watch('page-parts/**/*.php', series(reloadBrowser));
}

/**
 * Export Tasks
 */
exports.buildSvgSprite = series(svgClean, cheerioTask, buildSvgSprite);
exports.fonts = fonts;
exports.img = img;

exports.dev = series(
  // copyTask,
  buildStyles,
  svgClean, cheerioTask, buildSvgSprite,
  // buildScripts,
  fonts,
  img,
  startServer,
  watchTask,
);

// Default task
// gulp
exports.default = series(
  // cleanDist,
  parallel(
    buildStyles,
    cheerioTask,
    svgClean, cheerioTask, buildSvgSprite,
    fonts,
    img,
    // buildScripts,
    // lintScripts,
    // buildSVGs,
  )
);

///////// TODO
const copyTask = () => {
  return src([
    paths.fonts.input,
  ])
    .pipe(dest([
      paths.fonts.output
    ]));
}
// TODO image optimize task
