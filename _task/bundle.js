import gulp from "gulp";
import webpack from "webpack";
import webpackStream from "webpack-stream";
import webpackConfig from "../webpack.config.js";
import browserSync from "browser-sync";

import { src, dest } from "./config.js";

export const bundleTask = () => {
  return webpackStream(webpackConfig, webpack)
    .pipe(gulp.dest(dest.js))
    .pipe(browserSync.reload({ stream: true }));
};
