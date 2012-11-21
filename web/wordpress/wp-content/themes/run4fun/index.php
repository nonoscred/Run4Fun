<?php get_header(); ?>

    <div class="span9 content">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
<?php
if ( is_home() ) :
?>	
	<div class="span3 side-context hidden-phone">
        <?php get_sidebar('temoignage') ?>
    </div>
		
	<div class="span3 side-context hidden-phone">
        <?php get_sidebar('events') ?>
    </div>
<?php	
endif;
?>	
    <div class="span3 side-context hidden-phone">
        <?php get_sidebar('publicite') ?>
    </div>	
	


<?php get_footer(); ?>
