// https://youtu.be/tTrPLQ6nOX8
// https://www.pixemweb.com/blog/gulp-4-0-0-with-nodejs-imagemin-browsersync-sass-sourcemaps-cleancss-more/
// https://youtu.be/tTrPLQ6nOX8

var themename = 'tsktwo';

var gulp     	 = require( 'gulp' ),
	autoprefixer = require( 'gulp-autoprefixer' ),
	browserSync  = require( 'browser-sync' ).create(),
	reload       = browserSync.reload,
  plumber      = require( 'gulp-plumber'),
	sass         = require( 'gulp-sass' ),
	cleanCSS     = require( 'gulp-clean-css' ),
	sourcemaps   = require( 'gulp-sourcemaps' ),
	concat       = require( 'gulp-concat' ),
	imagemin     = require( 'gulp-imagemin' ),
	changed      = require( 'gulp-changed' ),
	uglify       = require( 'gulp-uglify' ),
	lineec       = require( 'gulp-line-ending-corrector' ),
	zip          = require( 'gulp-zip');

var root     = './',
    scss     = root + 'sass/',
    js       = root + 'src/js/',
    jsdist   = root + 'dist/js/',
    nodeDir  = root + 'node_modules/' ,
    zipDEST  = root + 'zipFiles/';

//    root  = '../' + themename + '/',

// Watch Files

var PHPWatchFiles  = root + '**/*.php',
    styleWatchFiles  = root + '**/*.scss';

// Used to concat the files in a specific order.
var jsSRC = [
    js + 'bootstrap.js',
    js + 'bootstrap-hover-two.js',
    js + 'nav-scroll.js',
    js + 'tsk-stickynav.js',
    js + 'tsk-pagination.js',
    js + 'prism.js',
    js + 'skip-link-focus-fix.js'
];


/*
    js + 'bootstrap.bundle.js',
    js + 'bootstrap-hover.js',
    js + 'nav-scroll.js',
    js + 'prism.js',
    js + 'resizeSensor.js',
    js + 'sticky-sidebar.js',
    js + 'sticky-sb.js',
    js + 'skip-link-focus-fix.js'
];*/


// nodeDir + 'material-design-lite/material.min.js'
//	js + 'tether.min.js', is no longer used
//  js + 'bootstrap.bundle.js',
//  js + 'prism.js',
//	js + 'resizeSensor.js',
// 	js + 'sticky-sidebar.js',
// 	js + 'sticky-sb.js',

// Used to concat the files in a specific order.
var cssSRC =  [
  // root + 'src/css/bootstrap.css',
  // nodeDir + material-design-lite/material.min.css
  root + 'fonts/font-awesome/css/all.css',
  root + 'src/css/prism.css',
  root + 'style.css'
];

// Used to concat the files in a specific order.

/*
root + 'src/css/bootstrap.css',
root + 'src/css/all.css',
root + 'src/css/prism.css',
root + 'style.css',*/
// nodeDir + 'bootstrap/scss/bootstrap.scss',

var imgSRC 	= root + 'src/images/*',
    imgDEST = root + 'dist/images/';

// zip is my addition
var zipSRC 			= [
	'*',
	'./css/*',
	'./fonts/*',
	'./images/**/*',
	'./inc/**/*',
	'./js/**/*',
	'./languages/*',
	'./sass/**/*',
	'./plugin-activation/**/*',
	'./template-parts/*',
	'./templates/*',
	'!bower_components',
	'!node_modules',
	'!src',
	'!dist',
	'!originalFiles',
	'!gulp*.*',
	'!pack*.*',
	'!.git*',
	'!zipFile'
];

/*var errorlog = function errorsLog(error) {
  console.error.bind(error);
  this.emit('end');
}*/

var onError = function( err ) {
  console.log( 'An error occured:', err.message );
  this.emit('end');
}


// return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'])
// /node_modules/material-design-lite/material.min.js
// /node_modules/material-design-lite/material.min.css
function css() {
  return gulp.src([scss + 'style.scss'])
  .pipe(sourcemaps.init({loadMaps: true}))
  .pipe(sass({
    outputStyle: 'expanded'
  }).on('error', onError))
  .pipe(autoprefixer('last 2 versions'))
  .pipe(sourcemaps.write())
  .pipe(lineec())
  .pipe(gulp.dest(root));
}

// .pipe(plumber())
// sass.logError))
// .pipe(sass({
//    outputStyle: 'expanded'
//  }).on('error', sass.logError))

function concatCSS() {
  return gulp.src(cssSRC)
  .pipe(sourcemaps.init({loadMaps: true, largeFile: true}))
  .pipe(concat('style.min.css').on('error', onError))
  .pipe(cleanCSS())
  .pipe(sourcemaps.write('./maps/'))
  .pipe(lineec())
  .pipe(gulp.dest(scss))
  .pipe(browserSync.stream());
}

// .pipe(browserSync.stream());

function javascript() {
  return gulp.src(jsSRC)
  .pipe(concat( themename + '.js').on('error', onError))
  .pipe(uglify().on('error', onError))
  .pipe(lineec())
  .pipe(gulp.dest(jsdist));
}
// .pipe(concat('devtsk.js'))

function imgmin() {
  return gulp.src(imgSRC)
  .pipe(changed(imgDEST))
      .pipe( imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 5})
      ]).on('error', onError))
      .pipe( gulp.dest(imgDEST));
}

function zipPackage (){
	return gulp.src(zipSRC, {base: "."})
    .pipe(zip(themeName + '.zip'))
    .pipe(gulp.dest(zipDEST));
}

function watch() {
  browserSync.init({
    open: 'external',
    proxy: 'http://localhost:8888/wpDev/mydevnw',
    port: 8090,
    browser: 'google chrome'
  });
  gulp.watch(styleWatchFiles, gulp.series([css, concatCSS]));
  gulp.watch(jsSRC, javascript);
  gulp.watch(imgSRC, imgmin);
  gulp.watch([PHPWatchFiles, jsdist + themename + '.js', scss + 'style.min.css']).on('change', browserSync.reload);

}

// gulp.watch([PHPWatchFiles, jsdist + themename + '.js', scss + 'style.min.css']).on('change', browserSync.reload);
// .pipe(browserSync.stream()); is not necessary with new broswers..??
// gulp.watch([PHPWatchFiles, jsdist + themename + '.js']).on('change', reload);
exports.css = css;
exports.concatCSS = concatCSS;
exports.javascript = javascript;
exports.watch = watch;
exports.imgmin = imgmin;
exports.zip = zipPackage;

var build = gulp.parallel(watch);
gulp.task('default', build);
