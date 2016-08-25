<?php
get_header();
?>


<div id="main-content" class="main-content lists-content">
	<div class="max-width-container spaced-content">
		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$wp_query = new WP_Query('post_type=casestudies&posts_per_page=9&paged='.$paged);
		include('includes/posts_list.php');
		?>
	</div>	
<!-- #main-content END -->
</div>
<?php get_footer(); ?>