const {src, dest, watch, parallel, series} = require('gulp');

const scss = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');
const webp = require('gulp-webp');
const newer = require('gulp-newer');
const ttf2woff2 = require('gulp-ttf2woff2');
const include = require('gulp-include');
const rigger = require('gulp-rigger');
const rename = require('gulp-rename');
const htmlmin = require('gulp-htmlmin');
const changed = require('gulp-changed');


function images() {
    return src('app/images/accomodate/**/*.*')
        .pipe(newer('app/images'))
        .pipe(webp())
        .pipe(dest('app/images'))
}

function fonts() {
    return src('app/fonts/accomodate/**/*.*')
        .pipe(changed('app/fonts', { extension: '.woff2' }))
        .pipe(ttf2woff2())
        .pipe(dest('app/fonts'))
}

function pages() {
    return src('app/**/*.dev.html')
        .pipe(include({
            includePaths: 'app/layouts/'
        }))
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(rename(function (path) {
            path.basename = path.basename.replace(".dev", "");
            path.extname = ".html";
        }))
        .pipe(dest('app'))
        .pipe(browserSync.stream())
}

function styles() {
    return src('app/scss/*.scss')
        .pipe(autoprefixer({overrideBrowserslist: ['last 10 version']}))
        .pipe(rename({
            suffix: ".min",
            extname: ".css"
        }))
        .pipe(scss({outputStyle: 'compressed'}))
        .pipe(dest('app/css'))
        .pipe(browserSync.stream())
}

function scripts() {
    return src('app/js/accomodate/**/*.js')
        .pipe(rigger())
        .pipe(uglify())
        .pipe(rename({
            suffix: ".min",
            extname: ".js"
        }))
        .pipe(dest('app/js'))
        .pipe(browserSync.stream());
}

function watching() {
    browserSync.init({
        server: {
            baseDir: "app/"
        }
    });
    watch(['app/images/accomodate/**/*.*'], images)
    watch(['app/fonts/accomodate/**/*.*'], fonts)
    watch(['app/layouts/**/*.html', 'app/**/*.dev.html'], pages)
    watch(['app/scss/**/*.scss'], styles)
    watch(['app/js/accomodate/**/*.js', 'app/js/components/**/*.js'], scripts).on('change', browserSync.reload)
}

function building() {
    return src([
        'app/images/**/*.*',
        '!app/images/accomodate/**/*.*',
        'app/fonts/**/*.*',
        '!app/fonts/accomodate/**/*.*',
        'app/**/*.html',
        '!app/**/*.dev.html',
        '!app/layouts/**/*.*',
        'app/css/**/*.css',
        'app/js/**/*.min.js',
    ], {base : 'app'})
        .pipe(dest('dist'))
}


exports.styles = styles;
exports.images = images;
exports.fonts = fonts;
exports.pages = pages;
exports.building = building;
exports.scripts = scripts;
exports.watching = watching;

exports.build = series(images, fonts, scripts, styles, pages, building);
exports.default = parallel(styles, fonts, images, scripts, pages, watching);
