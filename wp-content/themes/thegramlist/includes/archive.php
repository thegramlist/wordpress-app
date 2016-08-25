<?php

// get all posts



?>

<section id="archive" class="explore">

	<div class="archive-intro">
		<div class="max-width-container">
			<h2 class="heading"><?php echo get_field('archive_intro_heading'); ?></h2>
			<div class="text"><?php echo get_field('archive_intro_text'); ?></div>
		</div>
	</div>

	<div class="max-width-container spaced-content">
		<?php
		$posts_per_page = 9;
		if( $detect->isMobile() ){
		    $posts_per_page = 4;
		}
		$wp_query = new WP_Query( array(
			'post_type'=>'post',
			'posts_per_page'=>$posts_per_page,
			'category__not_in' => array( 985 )
			) );
		include('posts_list.php');
		wp_reset_query();
		?>
	</div>	

	<div class="archive-link">
		<div class="max-width-container">
			<a class="rotating-button" href="<?php $site_url;?>/lists/"><span class="text" data-text="Lists">See More</span></a>
		</div>
	</div>

</section>