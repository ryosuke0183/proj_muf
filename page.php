<?php
$class_page = "page-page"; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part("includes/head") ?>


<body <?php body_class($class_page); ?> data-bs-spy="scroll" data-bs-target="#header" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true">
  <?php get_header(); ?>
  <main class="<?php echo $class_page; ?>__main">
    <div class="inner">
      <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </main>
  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>