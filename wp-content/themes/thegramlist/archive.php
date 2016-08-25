<?php
/* Template Name: Lists */
get_header();
?>

<div id="main-content" class="main-content page-content centered-content">

	<div id="page-top">
		<div class="max-width-container">
			<h1 class="page-title"><?php echo single_cat_title( '', false ) ;?> </h1>
			<!-- <h2 class="page-info"></h2> -->
		</div>
	</div>
	
	<div class="max-width-container spaced-content">

		<div class="list-links">
			<a class="list-link-item" href="<?php echo $site_url; ?>/lists/"><span class="text">Lists</span></a>
			<span class="list-link-item has-sub-menu">
				<span class="text">Categories</span>
				<span class="icon"><?php include('images/triangle-down.svg'); ?></span>
				<?php include('includes/category_submenu.php'); ?> 
			</span>
		</div>

		<?php
		// $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		// $wp_query = new WP_Query('posts_per_page=9&paged='.$paged);
		include('includes/posts_list.php');
		//if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif;
		?>
		<div id="posts-nav"><span class="prev"><?php previous_posts_link(); ?></span><span class="next"><?php next_posts_link(); ?></span></div>
	</div>	
<!-- #main-content END -->
</div>
<?php get_footer(); ?>