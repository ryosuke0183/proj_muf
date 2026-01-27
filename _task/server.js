import browserSync from "browser-sync";
import { src, dest, server } from "./config.js";

export const serverTask = () => {
  browserSync.init({
    proxy: server.proxy,
    baseDir: server.root,
    open: "external",
    online: true,
    notify: true,
  });
};

export const browserSyncReload = (done) => {
  browserSync.reload();
  done();
};
