<?php get_header(); ?>

<div id="main-content" class="main-content page-content list-content centered-content">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();

	if( get_field('hero_image') ) { ?>

		<div id="page-hero">
			<div class="max-width-container">
				<div class="page-links">
					<?php
					$categories = get_the_category();
					for( $x=0 ; $x < count($categories) ; $x++ ){
						if( $categories[$x]->term_id != 1 ){
							echo '<a href="'.$site_url.'/category/'.$categories[$x]->slug.'">'.$categories[$x]->name.'</a>';
							echo ( $x < count($categories) - 1 ) ? ', ' : '';
						}
					}
					?>
				</div>
				<h1 class="page-hero-title"><?php echo the_title();?></h1>
				<h2 class="page-info"><?php the_date('F d, Y', '', ''); ?></h2>
			</div>				
			<div class="page-hero-image" style="background-image:url(<?php echo get_field('hero_image');?>);"></div>

		</div>

	<?php } else { ?>

		<div id="page-top">
			<div class="max-width-container">

				<div class="page-links">
					<?php
					$categories = get_the_category();
					for( $x=0 ; $x < count($categories) ; $x++ ){
						if( $categories[$x]->term_id != 1 ){
							echo '<a href="'.$site_url.'/category/'.$categories[$x]->slug.'">'.$categories[$x]->name.'</a>';
							echo ( $x < count($categories) - 1 ) ? ', ' : '';
						}
					}
					?>
				</div>

				<h1 class="page-title" itemprop="headline"><?php echo the_title();?></h1>
				<h2 class="page-info" itemprop="datePublished">
					<?php the_date('F d, Y', '', ''); ?>
				</h2>			

			</div>
		</div>

	<?php } ?>

	<div class="max-width-container wysiwyg-content spaced-content limited-width-content list-content" itemprop="text">
		<?php echo the_content();?>
		
		<?php /* USE IF EVER NEED TO PROGRAM OUR OWN SHARING FUNCTIONALITY */ ?>
		<div class="post-social">
			<h3>Share</h3>
            <ul class="header-social-navigation center-vertically">
                <li>
                    <a target="_blank" href="#" class="social-icon-link facebook">
                        <span class="out"><?php include('images/social/facebook.svg'); ?></span>
                        <span class="in"><?php include('images/social/facebook.svg'); ?></span>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="#" class="social-icon-link instagram">
                        <span class="out"><?php include('images/social/instagram.svg'); ?></span>
                        <span class="in"><?php include('images/social/instagram.svg'); ?></span>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="#" class="social-icon-link twitter">
                        <span class="out"><?php include('images/social/twitter.svg'); ?></span>
                        <span class="in"><?php include('images/social/twitter.svg'); ?></span>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="#" class="social-icon-link snapchat">
                        <span class="out"><?php include('images/social/snapchat.svg'); ?></span>
                        <span class="in"><?php include('images/social/snapchat.svg'); ?></span>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="mailto:<?php echo get_field('contact_email', 'option'); ?>" class="social-icon-link mail">
                        <span class="out"><?php include('images/social/mail.svg'); ?></span>
                        <span class="in"><?php include('images/social/mail.svg'); ?></span>
                    </a>
                </li>
            </ul>
		</div>
		
		
	</div>

	<div id="additional-posts" class="max-width-container">
		<?php
		$posts_per_page = 4;
		$wp_query = new WP_Query( array('post_type'=>'post','posts_per_page'=>$posts_per_page , 'post__not_in'=>array( get_the_ID() ) ) );
		include('includes/posts_list.php');
		wp_reset_query();
		?>
	</div>

	<?php /* USE IF EVER NEED POST NAVIGATION ?>
	<div class="max-width-container post-navigation">
		<div class="next">
			<?php next_post_link('<span class="label">Newer Post</span>&laquo; %link'); ?> 
		</div>
		<div class="previous">
			<?php previous_post_link('<span class="label">Older Post</span>%link &raquo;'); ?>
		</div>
	</div>
	<?php */ ?>

<?php
endwhile;
else :
endif;
?>
<!-- #main-content END -->
</div>
<?php get_footer(); ?>