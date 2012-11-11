<?php get_header(); ?>

    <div class="span9 content">
        <?php while ( have_posts() ) : the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        <?php endwhile; ?>
    </div>

    <div class="span3 side-context hidden-phone">
        <?php get_sidebar() ?>
    </div>

<?php get_footer(); ?>
