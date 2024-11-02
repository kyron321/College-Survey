const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

// Paths
const paths = {
  styles: {
    src: ['assets/scss/**/*.scss', '!assets/scss/admin/admin.scss'], // Exclude admin.scss
    dest: 'dist/css'
  },
  adminStyles: {
    src: 'assets/scss/admin/admin.scss',
    dest: 'dist/css'
  },
  scripts: {
    src: 'assets/js/**/*.js',
    dest: 'dist/js'
  },
  images: {
    src: 'assets/images/**/*',
    dest: 'dist/images'
  }
};

// Compile SCSS to CSS
function styles() {
  return gulp
    .src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('style.css')) // Concatenate all SCSS files into style.css
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.styles.dest));
}

// Compile Admin SCSS to CSS
function adminStyles() {
  return gulp
    .src(paths.adminStyles.src)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.adminStyles.dest));
}

// Process JavaScript files
function scripts() {
  return gulp
    .src(paths.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.scripts.dest));
}

// Process images
function images() {
  return gulp
    .src(paths.images.src)
    .pipe(gulp.dest(paths.images.dest));
}

// Watch files
function watchFiles() {
  gulp.watch(paths.styles.src, styles);
  gulp.watch(paths.scripts.src, scripts);
  gulp.watch(paths.images.src, images);
  gulp.watch(paths.adminStyles.src, adminStyles);
}

// Define complex tasks
const build = gulp.series(gulp.parallel(styles, scripts, images, adminStyles));
const watch = gulp.series(build, watchFiles);

// Export tasks
exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.adminStyles = adminStyles;
exports.build = build;
exports.watch = watch;
exports.default = build;