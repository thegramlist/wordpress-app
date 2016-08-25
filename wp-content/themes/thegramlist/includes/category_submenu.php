				<ul class="sub-menu">
				<?php 
				$categories = get_categories( array( 'orderby' => 'name' , 'hide_empty' => 0 , 'exclude' => array(1,985)  ) );
				foreach ( $categories as $category ) {
				echo '<li class="category-item"><a href="'.get_category_link( $category->term_id ).'">'.$category->name.'</a></li>';
				}
				?>
				</ul> 