var gulp = require('gulp')
  , concat = require('gulp-concat')
  , sass = require('gulp-sass')
  , merge = require('merge-stream')
  ;

var bower_path = "./vendor/bower_components";
var paths = {
  'jquery'     : bower_path + "/jquery/dist",
  'bootstrap'  : bower_path + "/bootstrap-sass-official/assets",
  'fontawesome': bower_path + "/fontawesome"
};

gulp.task('sass', function() {
  return gulp.src('resources/assets/sass/app.scss')
    .pipe(sass({
      includePaths: [
        paths.bootstrap + '/stylesheets',
        paths.fontawesome + '/scss'
      ]
    }))
    .pipe(gulp.dest('public/assets/css/'))
    ;
});

gulp.task('js', function() {
  var appjs = gulp.src('resources/assets/js/app.js')
    .pipe(gulp.dest('public/assets/js'))
    ;
  var dependencies = gulp.src([
      paths.jquery + '/jquery.min.js',
      paths.bootstrap + '/javascripts/bootstrap.min.js'
      ])
    .pipe(concat('dependencies.js'))
    .pipe(gulp.dest('public/assets/js'))
    ;

  return merge(dependencies, appjs);
});
gulp.task('copy-fa', function() {
  return gulp.src(paths.fontawesome + '/fonts/*')
    .pipe(gulp.dest('public/assets/fonts'))
    ;
});

gulp.task('watch', function() {
  gulp.watch('resources/assets/sass/*', ['sass']);
  gulp.watch('resources/assets/js/*', ['js']);
});

gulp.task('default', ['sass', 'js', 'copy-fa', 'watch']);
