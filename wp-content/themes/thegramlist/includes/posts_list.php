		
		<?php
		echo '<ul id="posts-list" class="post-item-list">';
		$current_index = 0;
		if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();

			// get post featured image
			$post_image = '';
			/*
			if( has_post_thumbnail() ) {
	          $imageData = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
	          $post_image = $imageData[0];
	        }
	        $post->post_image = $post_image;
	        */
	        include('check_post_images.php');
			$post->post_image = $imageSource['large'];


			// add formatted date to post object
			$post->formatted_date = date("m.d.Y", strtotime( $post->post_date) );
			// add permalink to post object
			$post->permalink = get_permalink( $req_query->post->ID );

			// print li item
			echo '<li class="post-list-item">';
			echo '<div class="post-item-wrapper">';
			$current_post = $post;
			include('post_item.php');
			echo '</div>';
			echo '</li>';
			$current_index ++;

		endwhile;
		endif;
		echo '</ul>';
		?>