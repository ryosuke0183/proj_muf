import gulp from "gulp";
import { src, dest } from "./config.js";
import { sassTask } from "./sass.js";
import { bundleTask } from "./bundle.js";
import { browserSyncReload } from "./server.js";

export const watchTask = () => {
  gulp.watch(src.sassWatch, sassTask);
  gulp.watch(src.bundleWatch, bundleTask);
  gulp.watch(src.phpWatch, browserSyncReload);
};
