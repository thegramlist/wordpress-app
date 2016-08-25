<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<div id="main-content" class="main-content page-content">
	<div id="page-top">
		<div class="max-width-container">
			<h1 class="page-title">Search Results for: <?php echo esc_html( get_search_query() );?></h1>
			<!-- <h2 class="page-sub-title"></h2> -->			
		</div>
	</div>
	<div class="max-width-container spaced-content">
		<ul class="article-list">
		<?php if ( have_posts() ) : ?>
		
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
			include('includes/check_post_images.php');
			$post_image = $imageSource['large'];
			?>
			<li class="<?php echo ( $post_image ) ? '' : 'no-image' ;?>">

				<?php echo ( $post_image ) ? '<div class="image-column"><a class="article-image" href="'.get_the_permalink().'" alt="'.get_the_title().'" style="background-image:url('.$post_image.');"></a></div>' : '' ;?>
				

				<div class="info-column">
					<h3 class="article-type">
						<?php
						// get post type object
						$post_type_object = get_post_type_object( get_post_type( $post->ID ) );
						$post_type_name = $post_type_object->labels->singular_name;
						if ( $post_type_name == 'Post' ) {
							echo 'Category: ';
							foreach((get_the_category()) as $category) {
								if ($category->cat_name != 'Uncategorized') {
									echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> ';
								}
							}
						} else {
							echo $post_type_name;
						}
						?>
					</h3>
					<h2 class="article-title"><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h2>
				</div>
			</li>

			<?php
			// End the loop.
			endwhile;

		// If no content, include the "No posts found" template.
		else : ?>
			<li><h2 class="article-title">No Results found.</h2></li>
		
		<?php endif; ?>
		</ul>
		<?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
	</div>
</div>
<?php get_footer(); ?>
