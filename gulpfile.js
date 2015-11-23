var gulp    = require('gulp'),
    gutil   = require('gulp-util'),
    uglify  = require('gulp-uglify'),
    concat  = require('gulp-concat');
 
gulp.task('js', function() {
    gulp.src(
        ['./js/*.js', './js/pagina/*.js']
    )
    .pipe(uglify())
    .pipe(concat("page.min.js"))
    .pipe(gulp.dest('./public/js/'));
});
gulp.task('default', ['js']);