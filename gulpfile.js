const appUrl = 'boilerplate-scss-gulp',
  themePath = './',
  uiPath = '';

const {dest, series, parallel, src, watch} = require('gulp'),
  // Common plugins
  browserSync = require('browser-sync'),
  plumber = require('gulp-plumber'), // Prevent pipe breaking caused by errors from gulp plugins
  rename = require('gulp-rename'), // Renames files
  replace = require('gulp-replace'),

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
    input: themePath + 'src/js/app.js',
    output: themePath + 'dist/js/',
    watch: themePath + 'src/js/**/*.js'
  },
  svg: {
    source: themePath + 'src/img/icons/svg/source/**/*.svg',
    outputSymbol: themePath + 'src/img/icons/svg/symbol/',
    output: themePath + 'dist/img/icons/svg-sprite/'
  },
  fonts: {
    input: 'src/fonts/*.{woff,woff2}',
    output: 'dist/fonts/'
  },

  //

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
    .pipe(server.stream());
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
 * Build SVG Sprite
 */
function cheerio() {
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
  return src(paths.svg.outputSymbol)
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

/*todo*/

/*gulp.task('svg-clean', function () {
  return gulp.src('app/img/icons/sprite/svg/symbol/flat', { read: false, allowEmpty: true })
    .pipe(clean());
});*/

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
  watch(paths.svg.source, series(cheerio));
  watch(paths.svg.outputSymbol, series(buildSvgSprite));
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
exports.buildSvgSprite = buildSvgSprite;

exports.dev = series(
  // copyTask,
  styles,
  cheerio,
  buildSvgSprite,
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
    cheerio,
    buildSvgSprite,
    //buildScripts,
    // lintScripts,
    // buildSVGs,
    // copyFiles
  )
);
