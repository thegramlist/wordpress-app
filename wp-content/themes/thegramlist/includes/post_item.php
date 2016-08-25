			<span class="post-item info-slide item-<?php echo $current_index;?>">
				<a href="<?php echo $current_post->permalink ;?>"><span class="post-image" style="background-image:url(<?php echo $current_post->post_image ;?>);"></span></a>
				<span class="post-info">
					<?php /* ?>
					<span class="title"><?php echo ( $current_post->post_type == "casestudies" ) ? 'Case Study: '.$current_post->post_title : $current_post->post_title ;?></span>
					<?php */ ?>
					<span class="title">
					<?php
					$categories = get_the_category();
					for( $x=0 ; $x < count($categories) ; $x++ ){
						if( $categories[$x]->term_id != 1 ){
							echo '<a href="'.$site_url.'/category/'.$categories[$x]->slug.'/">'.$categories[$x]->name.'</a>';
							echo ( $x < count($categories) - 1 ) ? ', ' : '';
						}
					}
					?>
					</span>
					<span class="sub-text"><?php echo $current_post->formatted_date ;?></span>
				</span>
			</span>