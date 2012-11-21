<?php
/*
Template Name: Run4Fun
*/
?>

<?php get_header(); ?>			

<script>
	$(document).ready(function(){
		$('#iview').iView({
			pauseTime: 7000,
			directionNav: false,
			controlNav: true,
			tooltipY: -15
		});
	});
</script>

<div id="iview">
	<div data-iview:thumbnail="wp-content/themes/run4fun/slider/slider-presentation.jpg" data-iview:transition="zigzag-drop-top,zigzag-drop-bottom">				
		<img src="wp-content/themes/run4fun/slider/slider-presentation.jpg" style="height: 250px;left: 10%;position: absolute;"/>
		<div class="iview-caption blackcaption" data-x="50" data-y="10" data-transition="wipeLeft" data-easing="easeInOutElastic">Gratuit!</div>
		<div class="iview-caption blackcaption" data-x="50" data-y="100" data-transition="wipeLeft" data-easing="easeInOutElastic">Conviviale!</div>
		<div class="iview-caption blackcaption" data-x="50" data-y="190" data-transition="wipeLeft" data-easing="easeInOutElastic">Et pour tous!</div>				
	</div>			
	<div data-iview:thumbnail="wp-content/themes/run4fun/slider/slider-time.jpg" data-iview:transition="zigzag-drop-top,zigzag-drop-bottom">	
		<img src="wp-content/themes/run4fun/slider/slider-time.jpg" style="height:250px;left: 10%;position: absolute;"/>
		<div class="iview-caption caption2" data-x="10" data-y="10" data-transition="wipeRight">Pour</div>
		<div class="iview-caption caption3" data-x="10" data-y="100" data-transition="wipeLeft">Vous!</div>				
	</div>			
	<div data-iview:thumbnail="wp-content/themes/run4fun/slider/slider-join-us.jpg" data-iview:transition="wipeRight">
		<img src="wp-content/themes/run4fun/slider/slider-join-us.jpg" style="height: 250px;left: 10%;position: absolute;"/>
		<div class="iview-caption caption6" data-x="170" data-y="10" data-transition="wipeUp"><a href="#">Inscription</a></div>				
	</div>
</div>
	
<div class="container-fluid">
	<div class="row-fluid main">

    <div class="span9 content">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
	
		<div class="span3 side-context hidden-phone">
        <?php get_sidebar('reviews') ?>
    </div>
		
		<div class="span3 side-context hidden-phone">
        <?php get_sidebar('events') ?>
    </div>
	
    <div class="span3 side-context hidden-phone">
        <?php get_sidebar('advertiser') ?>
    </div>	
	
<?php get_footer(); ?>