var gulp = require('gulp');
var sass = require('gulp-sass');
var shell = require('gulp-shell');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();

var src = {
    scss: 'sass/**/*.scss',
    css: 'stylesheets',
    php: '**/*php',
    inc: '**/*.inc'
};

gulp.task('sass', function() {
    gulp.src(src.scss)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions', '> 1%'],
            cascade: false
        }))
        .pipe(gulp.dest(src.css))
        .pipe(cssmin({keepSpecialComments: 0}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(src.css))
        .pipe(browserSync.stream());
});

gulp.task('serve', ['sass'], function() {
    browserSync.init({
        proxy: "drupal.dev",
    });

    gulp.watch(src.scss, ['sass']);
    gulp.watch([src.php, src.inc], ['theme', browserSync.reload]);
});

gulp.task('theme', shell.task([
        'drush @local cc theme-registry',
    ]));

gulp.task('default', ['serve']);

gulp.task('cssmin', function() {
  return gulp.src('stylesheets/style.css')
  .pipe(cssmin({keepSpecialComments: 0}))
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(src.css));
});
