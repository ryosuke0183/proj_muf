import gulp from "gulp";
import gulpPlumber from "gulp-plumber";
import dartSass from "sass";
import gulpSass from "gulp-sass";
const sass = gulpSass(dartSass);
import browserSync from "browser-sync";
import { src, dest } from "./config.js";

export const sassTask = () => {
  return gulp
    .src(src.sass)
    .pipe(gulpPlumber())
    .pipe(
      sass
        .sync({
          outputStyle: "expanded",
        })
        .on("error", sass.logError)
    )
    .pipe(gulp.dest(dest.css))
    .pipe(browserSync.reload({ stream: true }));
};
