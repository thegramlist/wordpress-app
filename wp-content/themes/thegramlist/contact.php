<?php
/* Template Name: Contact */
get_header();
?>

<div id="main-content" class="main-content page-content">
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

	<div class="max-width-container wysiwyg-content spaced-content">
		<div class="column-row">
			<div class="content-column width-70">
				<?php echo the_content();?>
			</div>
			<div class="content-column width-30">
				<h3>Social Media</h3>
				<div class="social-links">
					<?php if( get_field('facebook_url', 'option') ) { ?>
					<a target="_blank" href="<?php echo get_field('facebook_url', 'option'); ?>" class="social-icon-link facebook">
						<span class="out"><?php include('images/social/facebook.svg'); ?></span>
						<span class="in"><?php include('images/social/facebook.svg'); ?></span>
					</a>
					<?php }
					if( get_field('instagram_url', 'option') ) { ?>
					<a target="_blank" href="<?php echo get_field('instagram_url', 'option'); ?>" class="social-icon-link instagram">
						<span class="out"><?php include('images/social/instagram.svg'); ?></span>
						<span class="in"><?php include('images/social/instagram.svg'); ?></span>
					</a>
					<?php }
					if( get_field('twitter_url', 'option') ) { ?>
					<a target="_blank" href="<?php echo get_field('twitter_url', 'option'); ?>" class="social-icon-link twitter">
						<span class="out"><?php include('images/social/twitter.svg'); ?></span>
						<span class="in"><?php include('images/social/twitter.svg'); ?></span>
					</a>
					<?php }
					if( get_field('contact_email', 'option') ) { ?>
					<a target="_blank" href="mailto:<?php echo get_field('contact_email', 'option'); ?>" class="social-icon-link mail">
						<span class="out"><?php include('images/social/mail.svg'); ?></span>
						<span class="in"><?php include('images/social/mail.svg'); ?></span>
					</a>
					<?php } ?>
    			</div>
			</div>

			
		</div>

		
	</div>








<?php
endwhile;
else :
endif;
?>
<!-- #main-content END -->
</div>
<?php get_footer(); ?>