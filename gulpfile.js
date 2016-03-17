var gulp = require('gulp'),
sass = require('gulp-ruby-sass');

gulp.task('sass', function () {
  return sass('./public/css/sass/**/*.scss')
    .pipe(gulp.dest('./public/css'));
});

gulp.task('default',function(){
    gulp.watch('./public/css/sass/**/*.scss',sass);
});
