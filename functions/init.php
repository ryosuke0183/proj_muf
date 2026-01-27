<?php
add_action('wp_enqueue_scripts', function () {
  // plugin:font-awesome
  wp_enqueue_style(
    'font-awesome',
    'https://use.fontawesome.com/releases/v6.2.0/css/all.css',
    array(),
    null,
    'all'
  );

  // plugin:bootstrap
  wp_enqueue_style(
    'bootstrap-css',
    get_theme_file_uri('/assets/css/bootstrap/bootstrap.css'),
    array(),
    null,
    'all'
  );

  // theme:css
  wp_enqueue_style(
    'style',
    get_theme_file_uri('/assets/css/theme/style.css'),
    array("bootstrap-css"),
    date("ymdHis", filemtime( get_stylesheet_directory().'/assets/css/theme/style.css')),
    'all'
  );

  // template-file:css
  if(is_front_page()) {
    wp_enqueue_style(
      'index-stylesheet',
      get_theme_file_uri('/assets/css/theme/page/index.css'),
      array("style"),
      date("ymdHis", filemtime( get_stylesheet_directory().'/assets/css/theme/page/index.css')),
      'all'
    );    
  }

  // plugin:bootstrap-popper
  wp_enqueue_script(
    'bootstrap-popper',
    'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js',
    array(),
    null,
    true
  );

  // plugin:bootstrap
  wp_enqueue_script(
    'bootstrap-js',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
    array("bootstrap-popper"),
    null,
    true
  );

  // // plugin:gsap
  // wp_enqueue_script(
  //   'gsap',
  //   'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js',
  //   array(),
  //   null,
  //   true
  // );

  // // plugin:gsap-scroll-trigger
  // wp_enqueue_script(
  //   'gsap-scroll-trigger',
  //   'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js',
  //   array("gsap"),
  //   null,
  //   true
  // );

  if (!is_admin()) {
    // jQueryの登録を解除
    wp_deregister_script('jquery');
    // plugin:jquery
    wp_enqueue_script(
      'jquery-new',
      "https://code.jquery.com/jquery-3.7.1.min.js",
      array(),
      null,
      true
    );
  }

  // plugin:swiper
  wp_enqueue_style(
    'my-stylesheet',
    get_theme_file_uri('https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css'),
    array("swiper-css"),
    '1.0',
    'all'
  );

  // plugin:swiper
  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
    array(),
    null,
    true
  );

  // theme:js
  wp_enqueue_script(
    'index',
    get_theme_file_uri('/assets/js/bundle.js'),
    array("bootstrap-popper", "bootstrap-js", "swiper-js", "jquery-new"),
    date("ymdHis", filemtime( get_theme_file_path('/assets/js/bundle.js'))),
    true
  );
});

// ブロックエディター用CSSの読み込み
add_action("after_setup_theme", function () {
  add_theme_support("editor-styles");
  add_editor_style(array("https://use.fontawesome.com/releases/v6.2.0/css/all.css", get_theme_file_uri('/assets/css/editor-style.css')));
});

// ブロックエディタ用CSSを有効化
add_theme_support("wp-block-styles");

// カスタムメニュー
add_action("after_setup_theme", function () {
  register_nav_menus(
    array(
      "global-header-nav" => "グローバルヘッダーナビゲーション",
      "global-footer-nav" => "グローバルフッターナビゲーション",
    )
  );
});

// カスタムロゴ
add_theme_support("custom-logo", array(
  "flex-height" => true,
  "flex-width" => true
));

// ウィジェット
add_action("widgets_init", function () {
  register_sidebar(array(
    "name" => "SNS",
    "descriotion" => "SNSリンク",
    "id" => "sns",
    "before_widget" => "<div class='widget-sns'>",
    "after_widget" => "</div>",
  ));

  register_sidebar(array(
    "name" => "会社概要(フッター)",
    "descriotion" => "会社概要(フッター)",
    "id" => "footer-company-info",
    "before_widget" => "<div class='widget-footer-company-info'>",
    "after_widget" => "</div>",
  ));
});

// アイキャッチ設定
add_theme_support('post-thumbnails');

// SCFオプションページ
SCF::add_options_page(
	'オンラインショップ',
	'オンラインショップ(商品一覧)',
	'manage_options',
	'online-shop-option',
	'dashicons-admin-generic',
	11
);

SCF::add_options_page(
	'メディア出演',
	'メディア出演',
	'manage_options',
	'media-option',
	'dashicons-admin-generic',
	11
);

SCF::add_options_page(
	'店舗案内',
	'店舗案内',
	'manage_options',
	'shop-option',
	'dashicons-admin-generic',
	11
);