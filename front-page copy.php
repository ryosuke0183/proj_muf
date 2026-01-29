<?php
$class_page = "page-front"; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<?php get_template_part("includes/head") ?>


<body <?php body_class($class_page); ?> data-bs-spy="scroll" data-bs-target="#header" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true">
  <?php get_header(); ?>
  <main class="<?php echo $class_page; ?>__main">
    <div class="section-mv">
      <div class="section-mv__inner">
        <?php
          $img_id_sp = post_custom("mv-image-sp"); 
          $img_data_sp = wp_get_attachment_image_src($img_id_sp, "full");
          $url_sp = $img_data_sp[0];
          $alt_sp = get_post_meta($img_id_sp, "_wp_attachment_alt", true);

          $img_id_pc = post_custom("mv-image-pc"); 
          $img_data_pc = wp_get_attachment_image_src($img_id_pc, "full");
          $url_pc = $img_data_pc[0];
          $alt_pc = get_post_meta($img_id_pc, "_wp_attachment_alt", true);
        ?>

        <picture class="section-mv__mv">
          <source srcset="<?php echo esc_url($url_pc) ?>" media="(min-width: 751px)" class="section-mv__source">
          <img src="<?php echo esc_url($url_sp) ?>" alt="<?php echo esc_attr($alt_sp) ?>" class="section-mv__img">
        </picture>
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_white.png" alt="muf" class="section-mv__logo">
        <div class="section-mv__menu">
          <?php wp_nav_menu(array(
            "theme_location" => "global-header-nav",
            "menu_class" => "section-mv__nav-list",
            "container" => "nav",
            "container_class" => "section-mv__nav"
          )); ?>
          <?php dynamic_sidebar("sns"); ?>
        </div>
      </div>
    </div>
    <section id="about" class="section-about">
      <div class="inner section-about__inner">
        <span class="text-center section-about__en">What's</span>
        <h2 class="text-center heading heading--large section-about__heading"><?php echo nl2br(post_custom("about-1-heading")) ?></h2>
        <p class="text-center section-about__body"><?php echo nl2br(post_custom("about-1-body")) ?></p>
        <?php
          $about_1_img_id = post_custom("about-1-image"); 
          $about_1_img_data = wp_get_attachment_image_src($about_1_img_id, "full");
          $about_1_img_url = $about_1_img_data[0];
          $about_1_img_alt = get_post_meta($about_1_img_id, "_wp_attachment_alt", true); 
        ?>
        <img src="<?php echo esc_url($about_1_img_url) ?>" alt="<?php echo esc_attr($about_1_img_alt) ?>" class="section-about__img">
        <div class="media-text-area section-about__media-text-area">
          <div class="media-text media-text--narrow section-about__media-text-item">
            <div class="media-text__inner">
              <div class="media-text__wrapper">
                <h3 class="heading media-text__heading"><?php echo nl2br(post_custom("about-2-heading")) ?></h3>
                <p class="media-text__body"><?php echo nl2br(post_custom("about-2-body")) ?></p>
              </div>
              <?php 
                $about_2_img_id = post_custom("about-2-image"); 
                $about_2_img_data = wp_get_attachment_image_src($about_2_img_id, "full");
                $about_2_img_url = $about_2_img_data[0];
                $about_2_img_alt = get_post_meta($about_2_img_id, "_wp_attachment_alt", true); 
              ?>
              <div class="media-text__img-wrapper">
                <img src="<?php echo esc_url($about_2_img_url) ?>" alt="<?php echo esc_attr($about_2_img_alt) ?>" class="media-text__img">
              </div>
            </div>
          </div>
          <div class="media-text media-text--reverse media-text--wide section-about__media-text-item">
            <div class="media-text__inner">
              <div class="media-text__wrapper">
                <h3 class="heading media-text__heading"><?php echo nl2br(post_custom("about-3-heading")) ?></h3>
                <p class="media-text__body"><?php echo nl2br(post_custom("about-3-body")) ?></p>
              </div>
              <?php 
                $about_3_img_id = post_custom("about-3-image"); 
                $about_3_img_data = wp_get_attachment_image_src($about_3_img_id, "full");
                $about_3_img_url = $about_3_img_data[0];
                $about_3_img_alt = get_post_meta($about_3_img_id, "_wp_attachment_alt", true); 
              ?>
              <div class="media-text__img-wrapper">
                <img src="<?php echo esc_url($about_3_img_url) ?>" alt="<?php echo esc_attr($about_3_img_alt) ?>" class="media-text__img">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="online-store" class="section-online-store">
      <div class="section-online-store__inner">
        <div class="inner section-online-store__header">
          <h2 class="heading-subtitle section-online-store__heading">
            <span class="heading-subtitle__en">Online Store</span>
            <span class="heading-subtitle__ja">オンラインストア</span>
          </h2>
          <a href="<?php echo esc_url(SCF::get_option_meta( 'online-shop-option', 'online-store-url' )) ?>" class="d-none d-vw-inline-block button button--outer section-online-store__button-top" target="_blank">オンラインストア</a>
        </div>
        <!-- Slider main container -->
        <div class="swiper-global-wrapper">
          <div class="inner swiper-global-inner">
            <div class="swiper-custom swiper">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <?php 
                  $online_store = SCF::get_option_meta( 'online-shop-option', 'online-store-item' );
                ?>
                <?php foreach($online_store as $item): ?>
                  <?php
                    $online_store_url = $item["online-store-item-url"];

                    $online_store_image_id = $item["online-store-item-image"];
                    $online_store_image_data = wp_get_attachment_image_src($online_store_image_id, "full");
                    $online_store_image_url = $online_store_image_data[0];
                    $online_store_image_alt = get_post_meta($online_store_image_id, "_wp_attachment_alt", true);

                    $online_store_title = $item["online-store-item-title"];
                    $online_store_price = $item["online-store-item-price"];           
                  
                  ?>
                  <?php echo $online_store_url == ''
                    ? "<div class='swiper-online-store-slide swiper-slide'>" 
                    : "<a class='swiper-online-store-slide swiper-slide' href='" . esc_url($online_store_url) . "'>"
                  ?>
                    <img src="<?php echo esc_url($online_store_image_url) ?>">
                    <span class="swiper-online-store-slide__title">
                      <?php 
                        $limit = 40;
                        if(mb_strlen($online_store_title) >= $limit) {
                          $online_store_title = mb_substr($online_store_title, 0, $limit) . "...";
                        }
                        echo $online_store_title;
                      ?>
                    </span>
                    <?php
                      $online_store_price_result = ($online_store_price != "") ? "¥".number_format((int) $online_store_price) : "";
                    ?>
                    <span class="swiper-online-store-slide__price"><?php echo $online_store_price_result ?></span>              
                  <?php echo $online_store_url == ''
                    ? "</div>" 
                    : "</a>"
                  ?>
                <?php endforeach ?>
              </div>
              <!-- If we need pagination -->
              <div class="swiper-custom-pagination"></div>

              <!-- If we need navigation buttons -->
              <div class="swiper-custom-button-prev swiper-custom-button"><i class="fa-solid fa-arrow-left"></i></div>
              <div class="swiper-custom-button-next swiper-custom-button"><i class="fa-solid fa-arrow-right"></i></div>
            </div>
          </div>
        </div>
        <div class="d-vw-none text-center section-online-store__button-sp">
          <a href="<?php echo esc_url(SCF::get_option_meta( 'online-shop-option', 'online-store-url' )) ?>" class="button button--outer section-online-store__button-under" target="_blank">オンラインストア</a>
        </div>
      </div>
    </section>
    <section id="shop" class="section-shop">
      <div class="inner section-shop__inner">
        <h2 class="heading-subtitle section-shop__heading">
          <span class="heading-subtitle__en">Shop</span>
          <span class="heading-subtitle__ja">店舗案内</span>
        </h2>
        <div class="section-shop__media-text">
          <?php
            $shop_info = SCF::get_option_meta( 'shop-option');

            $shop_image_id = $shop_info["shop-info-image"];
            $shop_image_data = wp_get_attachment_image_src($shop_image_id, "full");
            $shop_image_url = $shop_image_data[0];
            $shop_image_alt = get_post_meta($shop_image_id, "_wp_attachment_alt", true);
          ?>
          <div class="section-shop__img-wrapper">
            <img src="<?php echo esc_url($shop_image_url) ?>" alt="<?php echo esc_attr($shop_image_url) ?>" class="section-shop__img">
          </div>
          <div class="section-shop__wrapper">
            <span class="section-shop__name"><?php echo $shop_info["shop-info-name"]?></span>
            <address class="section-shop__address"><?php echo $shop_info["shop-info-address"]?></address>
            <div class="dl-area section-shop__details">
              <?php foreach($shop_info["shop-info-details"] as $info): ?>
                <dl class="dl dl-area__dl">
                  <dt class="dl__dt"><?php echo $info["shop-info-details-dt"]?></dt>
                  <dd class="dl__dd"><?php echo $info["shop-info-details-dd"]?></dd>
                </dl>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="media" class="section-media">
      <div class="inner section-media__inner">
        <h2 class="heading-subtitle section-media__heading">
          <span class="heading-subtitle__en">Media</span>
          <span class="heading-subtitle__ja">メディア出演</span>
        </h2>      
      </div>
      <div class="swiper-global-wrapper">
        <div class="inner swiper-global-inner">
          <!-- Slider main container -->
          <div class="swiper-custom-loop swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <?php 
                $media = SCF::get_option_meta( 'media-option', 'media' );;
              ?>
              <?php foreach($media as $item): ?>
                <?php
                  $media_image_id = $item["media-image"];
                  $media_image_data = wp_get_attachment_image_src($media_image_id, "full");
                  $media_image_url = $media_image_data[0];
                  $media_image_alt = get_post_meta($media_image_id, "_wp_attachment_alt", true);        
                ?>
                <div class="swiper-slide">
                  <img src="<?php echo esc_url($media_image_url) ?>">
                </div>
              <?php endforeach ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-custom-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-custom-button-prev swiper-custom-button"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="swiper-custom-button-next swiper-custom-button"><i class="fa-solid fa-arrow-right"></i></div>
          </div>
        </div>
      </div>
    </section>
    <section id="contact" class="section-contact">
      <div class="inner section-contact__inner">
        <h2 class="heading-subtitle section-contact__heading">
          <span class="heading-subtitle__en">Contact</span>
          <span class="heading-subtitle__ja">お問い合わせ</span>
        </h2>
        <p class="section-contact__text"><?php echo nl2br(post_custom("contact-text")) ?></p>
        <?php echo apply_shortcodes( '[contact-form-7 id="b171f63" title="お問い合わせ"]' ); ?>
      </div>
    </section>
  </main>
  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>