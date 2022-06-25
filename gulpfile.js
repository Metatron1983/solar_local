'use strict';

const { src, dest, series, parallel, watch } = require('gulp');
const del = require('del');
const autoprefixer = require('gulp-autoprefixer');
const browsersync = require('browser-sync').create();
const gulpSass = require('gulp-sass')(require('sass'));
// const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
// const uglify = require('gulp-uglify-es').default;
// const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
// const fileInclude = require('gulp-file-include');
const concat = require('gulp-concat');
const webpackstream = require('webpack-stream');


const sourceFolder = "./src";
const destFolder = "./www/wp-content/themes/solar";
// const destFolder = "./testdest";

const path = {
    src: {
        txt: [`${sourceFolder}/**/*.+(txt|docx)`],
        php: [`${sourceFolder}/**/*.php`],
        admin_css: [`${sourceFolder}/themes/main-admin.scss`],
        main_css: [`${sourceFolder}/themes/main.scss`],
        css404: [`${sourceFolder}/main404.scss`],
        css_config: `${sourceFolder}/style.css`,
        admin_js: [`${sourceFolder}/themes/main-admin.js`],
        main_js: [`${sourceFolder}/themes/main.js`],
        js404: [`${sourceFolder}/main-404.js`],
        images: [`${sourceFolder}/asset/img/**/*.*`],
        fonts: [`${sourceFolder}/asset/fonts/**/*.*`],
        json: [`${sourceFolder}/asset/json+xml/**/*.json`],
        xml: [`${sourceFolder}/asset/json+xml/**/*.xml`],
        // favIco: [`${sourceFolder}/*.+(png|xml|ico|webmanifest)`]

    },
    build: {
        txt: `${destFolder}/`,
        php: `${destFolder}/`,
        admin_css: `${destFolder}/asset/style/`,
        main_css: `${destFolder}/asset/style/`,
        css404: `${destFolder}/asset/style/`,
        cssConfig: `${destFolder}/`,
        admin_js: `${destFolder}/asset/script/`,
        main_js: `${destFolder}/asset/script/`,
        js404: `${destFolder}/asset/script/`,
        images: `${destFolder}/asset/img/`,
        fonts: `${destFolder}/asset/fonts/`,
        json: `${destFolder}/`,
        xml: `${destFolder}/`,
        // favIco:`${destFolder}`,
    },
    watch: {
        txt: `${sourceFolder}/**/*.+(txt|docx)`,
        php: `${sourceFolder}/**/*.php`,
        admin_css: [`${sourceFolder}/theme-part/admin-part/**/*.scss`, `${sourceFolder}/themes/main-admin.scss`],
        main_css: [`${sourceFolder}/theme-part/user-part/**/*.scss`, `${sourceFolder}/themes/main.scss`],
        css404: [`${sourceFolder}/theme-part/**/*.scss`, `${sourceFolder}/main404.scss`],
        admin_js: [`${sourceFolder}/theme-part/admin-part/**/*.js`, `${sourceFolder}/themes/main-admin.js`],
        main_js: [`${sourceFolder}/theme-part/user-part/**/*.js`, `${sourceFolder}/themes/main.js`],
        js404: [`${sourceFolder}/theme-part/**/*.js`, `${sourceFolder}/main-404.js`],
        images: [`${sourceFolder}/asset/img/**/*.*`],
        fonts: [`${sourceFolder}/asset/fonts/**/*.*`],
        json: [`${sourceFolder}/asset/json+xml/**/*.json`],
        xml: [`${sourceFolder}/asset/json+xml/**/*.xml`],
        // favIco: [`${sourceFolder}/*.+(png|xml|ico|webmanifest)`],
    },
    clean: destFolder,
};

const txt = () => {
    return src(path.src.txt)
        .pipe(dest(function(){
            return path.build.txt;
        }))
};
exports.txt = txt;

const php = () => {
    return src(path.src.php)
        .pipe(dest(function(){
            return path.build.php;
        }))
        .pipe(browsersync.stream());

};

const admin_css = () => {
    return src(path.src.admin_css)
        .pipe(gulpSass({
            outputStyle: 'expanded'
        }))
        .pipe(concat('main-admin.css'))
        .pipe(autoprefixer({
            cascade: true,
            overrideBrowserslist: ["last 5 version"],
        }))
        .pipe(dest(function () {
            return path.build.admin_css;
        }))
        .pipe(cleanCSS())
        .pipe(rename({
            extname: ".min.css"
        }))
        .pipe(dest(function () {
            return path.build.admin_css;
        }))
        .pipe(browsersync.stream());
};
exports.admin_css = admin_css;

const main_css = () => {
    return src(path.src.main_css)
        .pipe(gulpSass({
            outputStyle: 'expanded'
        }))
        .pipe(concat('main.css'))
        .pipe(autoprefixer({
            cascade: true,
            overrideBrowserslist: ["last 5 version"],
        }))
        .pipe(dest(function () {
            return path.build.main_css;
        }))
        .pipe(cleanCSS())
        .pipe(rename({
            extname: ".min.css"
        }))
        .pipe(dest(function () {
            return path.build.main_css;
        }))
        .pipe(browsersync.stream());
};
exports.main_css = main_css;

const css_404 = () => {
    return src(path.src.css404)
        .pipe(gulpSass({
            outputStyle: 'expanded'
        }))
        .pipe(concat('main-404.css'))
        .pipe(autoprefixer({
            cascade: true,
            overrideBrowserslist: ["last 5 version"],
        }))
        .pipe(dest(function() {
            return path.build.css404;
        }))
        .pipe(cleanCSS())
        .pipe(rename({
            extname: ".min.css"
        }))
        .pipe(dest(function() {
            return path.build.css404;
        }))
        .pipe(browsersync.stream());
};
exports.css_404 = css_404;

let admin_js_webpackConfig = {
    output: {
        filename: 'main-admin.min.js',
    },
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: '/node_modules/',
                loader: 'babel-loader',
            }
        ]
    }
};

const admin_js = () => {
    return src(path.src.admin_js)
        .pipe(webpackstream(admin_js_webpackConfig))
        .pipe(dest(path.build.admin_js))
        .pipe(browsersync.stream());
};
exports.admin_js = admin_js;

let main_js_webpackConfig = {
    output: {
        filename: 'main.min.js',
    },
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: '/node_modules/',
                loader: 'babel-loader',
            }
        ]
    }
};

const main_js = () => {
    return src(path.src.main_js)
        .pipe(webpackstream(main_js_webpackConfig))
        .pipe(dest(path.build.main_js))
        .pipe(browsersync.stream());
};
exports.main_js = main_js;

let js404_webpackConfig = {
    output: {
        filename: 'main-404.min.js',
    },
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: '/node_modules/',
                loader: 'babel-loader',
            }
        ]
    }
};

const js404 = () => {
    return src(path.src.js404)
        .pipe(webpackstream(js404_webpackConfig))
        .pipe(dest(path.build.js404))
        .pipe(browsersync.stream());
};
exports.js404 = js404;


const vendorCSS = () => {
    return src (['node_modules/normalize.css/normalize.css',])
        .pipe(concat('normalize.scss'))
        .pipe(dest('src/vendor/normalize'))
};
exports.vendorCSS = vendorCSS;

const cssConfig = () => {
    return src(path.src.css_config)
        .pipe(dest(path.build.cssConfig))
};
exports.cssConfig = cssConfig;

const images = () => {
    return src(path.src.images)
        .pipe(webp({
            quality: 70,
        }))
        .pipe(dest(function () {
            return path.build.images;
        }))
        .pipe(src(path.src.images))
        .pipe(dest(function () {
            return path.build.images;
        }))
        .pipe(browsersync.stream());
};
exports.images = images;

const fonts = () => {
    return src(path.src.fonts)
        .pipe(dest(function () {
            return path.build.fonts;
        }))
        .pipe(browsersync.stream());
};
exports.fonts = fonts;

const json = () => {
    return src(path.src.json)
        .pipe(rename(function(path){
            path.dirname = '';
        }))
        .pipe(dest(function () {
            return path.build.json;
        }))
        .pipe(browsersync.stream());
};
exports.json = json;

const xml = () => {
    return src(path.src.xml)
        .pipe(rename(function(path){
            path.dirname = '';
        }))
        .pipe(dest(function () {
            return path.build.xml;
        }))
        .pipe(browsersync.stream());
};
exports.xml = xml;

const favIco = () => {
    return src(path.src.favIco)
        .pipe(rename(function(path){
            path.dirname = '';
        }))
        .pipe(dest(function () {
            return path.build.favIco;
        }))
        .pipe(browsersync.stream());
};
// exports.favIco = favIco;



const clean = () => {
    return del(path.clean);
}

const server = () => {
    browsersync.init({
        // server: {
        //     // baseDir: "./www/wp-content/themes/solar",
        //     // directory: true,
        // },
        proxy: "http://www.solar.local/",
        port: 3000,
        // notify: false,
        notify: true,
    });
};

const watchFiles = () => {
    watch([path.watch.txt], txt);
    watch([path.watch.php], php);
    watch(path.watch.admin_css, admin_css);
    watch(path.watch.main_css, main_css);
    watch(path.watch.css404, css_404);
    watch(path.watch.admin_js, admin_js);
    watch(path.watch.main_js, main_js);
    watch(path.watch.js404, js404);
    watch(path.watch.images, images);
    watch(path.watch.fonts, fonts);
    watch(path.watch.json, json);
    watch(path.watch.xml, xml);
    // watch(path.watch.favIco, favIco);
};

exports.default = series(
    clean,
    vendorCSS,
    parallel(
        txt,
        php,
        cssConfig,
        css_404,
        admin_css,
        main_css,
        js404,
        admin_js,
        main_js,
        fonts,
        images,
        xml,
        json,
        // favIco,
   ),
   parallel(
       watchFiles,
       server
    )
);


