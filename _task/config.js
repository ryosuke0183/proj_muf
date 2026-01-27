export const src = {
  root: "_src/",
  sass: ["./_src/scss/**/*.scss", "!./_src/scss/**/_*.scss"],
  sassWatch: "./_src/scss/**/*.scss",
  phpWatch: "./**/*.php",
  bundleWatch: "_src/js/**/*.js",
};

export const dest = {
  root: "./assets",
  css: "./assets/css",
  js: "./assets/js",
};

export const server = {
  root: "/",
  proxy: "muf.wp",
};
