<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<?php
include('includes/hero_slider.php'); 
include('includes/archive.php'); 
include('includes/subscribe_suggest.php'); 
include('includes/gramlist_effect.php'); 
include('includes/contact.php'); 
include('includes/clients.php'); 
/*
include('includes/feed.php');
*/ 
?>
<div class="explore-wrapper active">
<span class="explore-label">Explore</span>
<a href="#the-effect" class="nav-arrow explore down">
	<img src="<?php echo $template_url;?>/images/slider-left-arrow.png">
</a>	
</div>
<?php get_footer(); ?>