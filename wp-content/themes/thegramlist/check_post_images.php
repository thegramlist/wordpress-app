<?php
		  // checks if the post has an image in the content or a featured thumbnail
		  $imageSource = array(
		  	'full' => '',
		  	'large' => '',
		  	'medium' => '',
		  	'thumbnail' => '',
		  );

		  // IF POST HAS FEATURED IMAGE
		  if( has_post_thumbnail() ) { 

				$imageData = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
		 		$imageSource['full'] = $imageData[0];
		 		$imageData = wp_get_attachment_image_src( get_post_thumbnail_id(),'large');
		 		$imageSource['large'] = $imageData[0];
		 		$imageData = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium');
		 		$imageSource['medium'] = $imageData[0];
		 		$imageData = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail');
		 		$imageSource['thumbnail'] = $imageData[0];

		  // ELSE, GET POST FIRST IMAGE
		  } else {

				$content = $post->post_content;
				$searchimages = '~<img [^>]* />~';
				preg_match_all( $searchimages, $content, $pics );
				$iNumberOfPics = count($pics[0]); // Check to see if we have at least 1 image

				// If your post has one or more images in the content, use the catch_that_image() function to get the first image's SRC
				if ( $iNumberOfPics > 0 ) { 

					$firstImage = catch_that_image();

					// get all sizes for the post's first image
					$currentPostId = get_the_ID();
					
					// use the get_image_id_by_link() function to get the first image's ID
					$currentImageId = get_image_id_by_link( $firstImage );

					// use the ID to get all the SRC for all sizes
					$firstImageFullArray = wp_get_attachment_image_src( $currentImageId, 'full');
					$imageSource['full'] = $firstImageFullArray[0];

					$firstImageLargeArray = wp_get_attachment_image_src( $currentImageId, 'large');
					$imageSource['large'] = $firstImageLargeArray[0];

					$firstImageMediumArray = wp_get_attachment_image_src( $currentImageId, 'medium');
					$imageSource['medium'] = $firstImageMediumArray[0];

					$firstImagethumbnailArray = wp_get_attachment_image_src( $currentImageId, 'thumbnail');
					$imageSource['thumbnail'] = $firstImagethumbnailArray[0];

					// if id wasnt retrieved succesfully, the image is external. Set all sizes to external image.
					if(!$currentImageId){
						$imageSource['full'] = $firstImage;
						$imageSource['large'] = $firstImage;
						$imageSource['medium'] = $firstImage;
						$imageSource['thumbnail'] = $firstImage;
					}
					
				}
		  }
?>