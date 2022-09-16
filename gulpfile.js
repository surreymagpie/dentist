const { src, dest, series, watch } = require('gulp');
let sass = require('gulp-sass')(require('sass'));
// sass.compiler = ;
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
    .pipe(sass({ outputStyle: "compressed" }).on('error', sass.logError))
    .pipe(autoprefixer({ browsers: ['last 2 versions', '> 1%'] }))
    .pipe(dest(source.css))
    .pipe(browserSync.stream());
};

function serve() {
  browserSync.init({
    proxy: "http://drupal7.ddev.site",
  });
  watch(source.scss, styles);
}

exports.default = series(styles, serve);
exports.css = styles;
