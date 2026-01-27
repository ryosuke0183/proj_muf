import gulp from "gulp";
import { sassTask } from "./_task/sass.js";
import { watchTask } from "./_task/watch.js";
import { serverTask } from "./_task/server.js";

export default gulp.parallel(watchTask, serverTask);
export { sassTask as sass };
