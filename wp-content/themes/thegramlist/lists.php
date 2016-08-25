<?php
/* Template Name: Lists */
get_header();
?>

<div id="main-content" class="main-content page-content centered-content">
	<div id="page-top">
		<div class="max-width-container">
			<h1 class="page-title">Lists</h1>
		</div>
	</div>
	<div class="max-width-container spaced-content">

		<div class="list-links">
			<span class="list-link-item has-sub-menu">
				<span class="text">Categories</span>
				<span class="icon"><?php include('images/triangle-down.svg'); ?></span>
				<?php include('includes/category_submenu.php'); ?>
			</span>
		</div>

		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$wp_query = new WP_Query( array(
			'post_type' => 'post',
			'posts_per_page' => '9',
			'paged' => $paged,
			'category__not_in' => array( 985 )
			));
		include('includes/posts_list.php');
		// if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif;
		?>

		<div id="posts-nav"><span class="prev"><?php previous_posts_link(); ?></span><span class="next"><?php next_posts_link(); ?></span></div>
	</div>	
<!-- #main-content END -->
</div>
<?php get_footer(); ?>