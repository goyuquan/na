var gulp = require('gulp');
var sass = require('gulp-ruby-sass');

gulp.task('sass', function () {
  return sass('./sass/**/*.scss')
    .pipe(gulp.dest('./css'));
});

gulp.task('default',function(){
    gulp.watch('./sass/**/*.scss',['sass']);
});
