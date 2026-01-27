<header id="header" class="header">
  <div class="header__inner">
    <?php
    if (function_exists('the_custom_logo')) {
      the_custom_logo();
    }; ?>
    <div class="header__wrapper">
      <?php wp_nav_menu(array(
        "theme_location" => "global-header-nav",
        "menu_class" => "header__nav-list",
        "container" => "nav",
        "container_class" => "header__nav"
      )); ?>
      <?php dynamic_sidebar("sns"); ?>
    </div>
  </div>
</header>
<button
  class="hamburger"
  type="button">
    <div class="hamburger__lines">
      <span class="hamburger__line hamburger__line-1"></span>
      <span class="hamburger__line hamburger__line-2"></span>
      <span class="hamburger__line hamburger__line-3"></span>
    </div>
    <div class="hamburger__text-wrapper">
      <span class="hamburger__text-menu hamburger__text">Menu</span>
      <span class="hamburger__text-close hamburger__text">Close</span>
    </div>
</button>
<!-- .hamburger -->
<div class="drawer">
  <div class="drawer__inner">
    <img src="<? echo get_template_directory_uri(); ?>/assets/images/logo_white.png" alt="" class="drawer__logo">
    <?php wp_nav_menu(array(
      "theme_location" => "global-header-nav",
      "menu_class" => "drawer__list",
      "container" => "nav",
      "container_class" => "drawer__nav"
    )); ?>
    <?php dynamic_sidebar("sns"); ?>
  </div>
</div>