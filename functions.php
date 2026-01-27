<?php

defined('ABSPATH') || exit;

$function_files = [
  "functions/init.php",
  "functions/blocks.php",
  "functions/permalink.php",
];

foreach ($function_files as $file) {
  if (file_exists(get_template_directory() . '/' . $file)) {
    require_once get_template_directory() . '/' . $file;
  } else {
    trigger_error("ファイルが見つかりません: $file", E_USER_WARNING);
  }
};
