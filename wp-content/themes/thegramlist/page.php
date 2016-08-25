<?php get_header(); ?>


<div id="main-content" class="main-content page-content centered-content">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();

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

	<div class="max-width-container wysiwyg-content spaced-content limited-width-content">
		<?php 
		echo the_content();
		if( is_page('subscribe') ){
			include('includes/mailchimp_form.php');
		}
		?>

	</div>


<?php
endwhile;
else :
endif;
?>
<!-- #main-content END -->
</div>
<?php get_footer(); ?>