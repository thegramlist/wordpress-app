<?php
/* Template Name: Careers */
get_header();
?>

<div id="main-content" class="main-content page-content">
<?php


	if( has_post_thumbnail() ) {
		$imageData = wp_get_attachment_image_src( get_post_thumbnail_id(),'full'); ?>

		<div id="page-hero">
			<div class="max-width-container">
				<h1 class="page-hero-title"><?php echo the_title();?></h1>
				<?php echo ( get_field('page_sub_title') != "" ) ? '<h2 class="page-hero-sub-title">'.get_field('page_sub_title').'</h2>' : '' ; ?>
			</div>				
			<div class="page-hero-image" style="background-image:url(<?php echo $imageData[0];?>);"></div>

		</div>

	<?php } else { ?>
		<div id="page-top">
			<div class="max-width-container">
				<h1 class="page-title"><?php echo the_title();?></h1>
				<?php echo ( get_field('page_sub_title') != "" ) ? '<h2 class="page-sub-title">'.get_field('page_sub_title').'</h2>' : '' ; ?>				
			</div>
		</div>

	<?php } ?>

	<div class="max-width-container spaced-content limited-width-content">
		<?php echo the_content();?>

		<?php
		$args = array( 'post_type' => 'careers' );
		$careers_query = new WP_Query( $args );
		if ( $careers_query->have_posts()) :
			echo '<ul class="careers-list clearfix">';
			while ( $careers_query->have_posts()) : $careers_query->the_post();
			echo '<li>';
			echo '<a class="title" href="'.get_the_permalink().'">'.get_the_title().'</a>';
			echo '<div class="excerpt">';
			echo the_excerpt();
			// echo excerpt( strip_tags( get_the_content() ),40);
			echo '</div>';
			echo '<a class="view-details square-button" href="'.get_the_permalink().'">View Details</a>';
			echo '</li>';
		endif;	
		wp_reset_query();
		?>

	</div>









<!-- #main-content END -->
</div>
<?php get_footer(); ?>