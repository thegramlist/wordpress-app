<?php

// get all posts
$posts_query = new WP_Query( array('post_type'=>'post','posts_per_page'=>10) );
$posts_array = populatePostArray( $posts_query );
wp_reset_query();

// get all case studies
$cases_query = new WP_Query( array( 'post_type'=>'casestudies','posts_per_page'=>10) );
$cases_array = populatePostArray( $cases_query );
wp_reset_query();
?>


<section id="archive" class="explore">

	<div class="archive-intro">
		<div class="max-width-container">
			<h2 class="heading"><?php echo get_field('archive_intro_heading'); ?></h2>
			<div class="text"><?php echo get_field('archive_intro_text'); ?></div>
		</div>
	</div>


	<div id="posts-wrapper" class="posts-wrapper">

		<div class="post-row main">
			<div class="post-column col-50-w">
				<?php
				$current_post = $posts_array[0];
				$current_index = 0;
				include('post_item.php'); 
				?>
			</div>
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[1];
						$current_index = 1;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[2];
						$current_index = 2;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[3];
						$current_index = 3;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[4];
						$current_index = 4;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="post-row main">
			
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[5];
						$current_index = 5;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[6];
						$current_index = 6;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[7];
						$current_index = 7;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[8];
						$current_index = 8;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
			<div class="post-column col-50-w">
				<?php
				$current_post = $posts_array[9];
				$current_index = 9;
				include('post_item.php'); 
				?>
			</div>
		</div>

	</div>

	<?php /* ?>
	<div id="posts-wrapper" class="posts-wrapper">
		<div class="post-row main">
			<div class="post-column col-50-w">
				<?php
				$current_post = $posts_array[0];
				$current_index = 0;
				include('post_item.php'); 
				?>
			</div>
			<div class="post-column col-50-w">
				<?php
				$current_post = $posts_array[1];
				$current_index = 1;
				include('post_item.php'); 
				?>
			</div>
		</div>

		<div class="post-row main">
			<div class="post-column col-25-w">
				<?php
				$current_post = $posts_array[2];
				$current_index = 2;
				include('post_item.php'); 
				?>
			</div>
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[3];
						$current_index = 3;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[4];
						$current_index = 4;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
			<div class="post-column col-50-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[5];
						$current_index = 5;
						include('post_item.php'); 
						?>
					</div>
					<div class="post-column">
						<?php
						$current_post = $posts_array[6];
						$current_index = 6;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $posts_array[7];
						$current_index = 7;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php */ ?>

	<div class="archive-link">
		<div class="max-width-container">
			<a class="rotating-button" href="<?php $site_url;?>/lists/"><span class="text" data-text="Lists">See More</span></a>
		</div>
	</div>

	<?php /* ?>
	
	<div id="case-studies-wrapper" class="posts-wrapper">

		<div class="post-row main">
			<div class="post-column col-50-w">
				<?php
				$current_post = $cases_array[0];
				$current_index = 0;
				include('post_item.php'); 
				?>
			</div>
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $cases_array[1];
						$current_index = 1;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $cases_array[2];
						$current_index = 2;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $cases_array[3];
						$current_index = 3;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $cases_array[4];
						$current_index = 4;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="post-row main">
			
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $cases_array[5];
						$current_index = 5;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $cases_array[6];
						$current_index = 6;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
			<div class="post-column col-25-w">
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $cases_array[7];
						$current_index = 7;
						include('post_item.php'); 
						?>
					</div>
				</div>
				<div class="post-row row-50-h">
					<div class="post-column">
						<?php
						$current_post = $cases_array[8];
						$current_index = 8;
						include('post_item.php'); 
						?>
					</div>
				</div>
			</div>
			<div class="post-column col-50-w">
				<?php
				$current_post = $cases_array[9];
				$current_index = 9;
				include('post_item.php'); 
				?>
			</div>
		</div>

	</div>
	
	
	
	

	<div class="archive-link">
		<div class="max-width-container">
			<a class="rotating-button" href="<?php $site_url;?>/case-studies/"><span class="text" data-text="Case Studies">Case Studies</span></a>
		</div>
	</div>

	<?php */ ?>

</section>