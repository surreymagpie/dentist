const { src, dest, series, watch } = require ('gulp');
let sass = require('gulp-sass');
sass.compiler = require ('node-sass');
let shell = require('gulp-shell');
let cssmin = require('gulp-cssmin');
let rename = require('gulp-rename');
let autoprefixer = require('gulp-autoprefixer');
let browserSync = require('browser-sync').create();
let source = {
    scss: 'sass/**/*.scss',
    css: 'stylesheets',
    php: '**/*php',
    inc: '**/*.inc'
};

function styles() {
    return src(source.scss)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions', '> 1%'],
            cascade: false
        }))
        .pipe(dest(source.css))
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(source.css))
        .pipe(browserSync.stream());
};

function serve(done) {
    browserSync.init({
        proxy: "d7.cornerhouse-dental.co.uk",
    });
    done;
}
function watch_files () {
    watch(source.scss, 'styles');
    watch([source.php, source.inc], series('theme', browserSync.reload));
}

function theme() {
    shell.task('drush @local cc theme-registry');
}

function cssminify() {
    return src('stylesheets/style.css')
    .pipe(cssmin({keepSpecialComments: 0}))
    .pipe(rename({suffix: '.min'}))
    .pipe(dest(source.css));
}
exports.default = series(styles, serve, watch_files);
exports.css = styles
exports.build = cssminify
