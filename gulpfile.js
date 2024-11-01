const appUrl = '###',
  themePath = './',
  uiPath = '';

const {dest, series, parallel, src, watch} = require('gulp'),
  // Common plugins
  browserSync = require('browser-sync'),
  clean = require('gulp-clean'),
  plumber = require('gulp-plumber'),
  // newer = require('gulp-newer'),
  rename = require('gulp-rename'),
  replace = require('gulp-replace'),
  cheerio = require('gulp-cheerio'),
  sourcemaps = require('gulp-sourcemaps'),

  // Scss plugins
  autoprefixer = require('autoprefixer'),
  csso = require('gulp-csso'),
  postcss = require('gulp-postcss'),
  sass = require('gulp-sass')(require('sass')),

  // Images
  // imagemin = require('gulp-imagemin'),

  //SVG
  svgSprite = require('gulp-svg-sprite')

  //
  // concat = require('gulp-concat'),
  // include = require('gulp-include'),
  // uglify = require('gulp-uglify-es').default
;

const server = browserSync.create();
/**
 * TODO
 * - find-unused-sass-variables https://www.npmjs.com/package/find-unused-sass-variables
 */

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
  images: {
    input: ['src/img/**/*', '!src/img/icons/svg/**/*'],
    output: themePath + 'dist/img',
    watch: ['src/img/**/*', '!src/img/icons/svg/**/*'],
  },
  svg: {
    source: themePath + 'src/img/icons/svg/source/**/*.svg',
    outputSymbol: themePath + 'src/img/icons/svg/symbol/',
    output: themePath + 'dist/img/icons/svg/',
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
function css() {
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
 * END Build styles task
 */

/**
 * Build scripts
 */
/*function buildScripts() {
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
}*/

/**
 * Fonts
 */
/*function fonts() {
  return src(paths.fonts.input)
    .pipe(newer(paths.fonts.output))
    .pipe(dest(paths.fonts.output));
}*/

/**
 * Build Images
 */
/*function imgBuild() {
  // TODO optimize images
  return src(paths.images.input)
    .pipe(newer('dist/img'))
    .pipe(imagemin([
      /!*pngquant({
        speed: 1,
        quality: [0.8, 0.87]
      }),*!/
      // imagemin.jpegtran({ progressive: true }),
      /!*imageminMozjpeg({
        progressive: true,
        quality: 87
      }),*!/
      imagemin.svgo(),
    ]))
    .pipe(dest(paths.images.output))
}*/

/*function imgClean() {
  return src(['dist/img/', '!dist/img/icons/svg/'], { read: false })
    .pipe(clean())
}*/
/**
 * END Build Images
 */

/**
 * Build SVG Sprite
 */
function createSvgSymbol() {
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

function svgClear() {
  return src(paths.svg.outputSymbol, {read: false, allowEmpty: true})
    .pipe(clean());
}
/**
 * END Build SVG Sprite
 */

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
  watch(paths.styles.watch, series(css, reloadBrowser));
  // watch(paths.scripts.watch, series(buildScripts, reloadBrowser));
  watch(paths.svg.watchSource, series(createSvgSymbol));
  watch(paths.svg.watchSymbol, series(buildSvgSprite));
  // watch php files
  watch('index.php', series(reloadBrowser));
  watch('pages/**/*.php', series(reloadBrowser));
  watch('page-parts/**/*.php', series(reloadBrowser));
}

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


/**
 * Export Tasks
 */
// exports.buildSvgSprite = series(svgClear, cheerioTask, buildSvgSprite);
// exports.fonts = fonts;
// exports.img = series(imgBuild);
exports.svg = series(svgClear, createSvgSymbol, buildSvgSprite);

exports.dev = series(
  // clean,
  // copyTask,
  css,
  // series(imgBuild),
  series(svgClear, createSvgSymbol, buildSvgSprite),
  // buildScripts,
  // fonts,
  startServer,
  watchTask,
);

// Default task
// gulp
exports.default = series(
  // cleanDist,
  parallel(
    css,
    // cheerioTask,
    series(svgClear, createSvgSymbol, buildSvgSprite),
    // fonts,
    // img,
    // buildScripts,
    // lintScripts,
    // buildSVGs,
  )
);
