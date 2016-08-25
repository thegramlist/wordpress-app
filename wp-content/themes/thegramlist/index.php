<?php get_header(); ?>
<div id="main-content" class="main-content">
		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

				// LOOP CONTENT HERE



				endwhile;
				


			else :
				// NO CONTENT CODE

			endif;
		?>
<!-- #main-content END -->
</div>
<?php get_footer(); ?>