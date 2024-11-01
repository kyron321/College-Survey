const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const plumber = require('gulp-plumber');
const cached = require('gulp-cached');

// Paths
const paths = {
  scripts: {
    src: 'assets/js/**/*.js',
    dest: 'dist/js/',
  },
  styles: {
    src: 'assets/scss/**/*.scss',
    dest: 'dist/css/',
  },
  images: {
    src: 'assets/images/socials/**/*',
    dest: 'dist/images/socials/',
  },
};

// Compile SCSS into CSS, with sourcemaps
function styles() {
  return gulp
    .src(paths.styles.src)
    .pipe(plumber())
    .pipe(cached('styles'))
    .pipe(sourcemaps.init())
    .pipe(concat('style.scss')) // Concatenate all SCSS files into a single file
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.styles.dest));
}

// Transpile, concatenate, and minify JavaScript files
function scripts() {
  return gulp
    .src(paths.scripts.src, { sourcemaps: true })
    .pipe(plumber())
    .pipe(cached('scripts'))
    .pipe(babel({ presets: ['@babel/preset-env'] }))
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest));
}

// Copy images
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
}

// Define complex tasks
const build = gulp.series(gulp.parallel(styles, scripts, images));
const watch = gulp.series(build, watchFiles);

// Export tasks
exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.build = build;
exports.watch = watch;
exports.default = build;