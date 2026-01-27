<?php
$class_page = "page-index"; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part("includes/head") ?>


<body <?php body_class($class_page); ?>>
  <?php get_header(); ?>
  <main class="<?php echo $class_page; ?>__main">
    <?php if (have_posts()): ?>
      <?php while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </main>
  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>