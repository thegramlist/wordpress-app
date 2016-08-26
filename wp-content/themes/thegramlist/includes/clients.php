<section id="clients" class="explore">
	<div class="max-width-container">
		<h2 class="heading"><?php echo get_field('clients_heading'); ?></h2>
		<?php
		$client_logos = get_field('client_logos');
		if( $client_logos ){
			$delay = 0;
			echo '<ul class="client-list">';
			foreach( $client_logos as $client_logo ) {
				echo '<li style="-webkit-transition: opacity 2s ease '.$delay.'s ;-moz-transition: opacity 2s ease '.$delay.'s; transition: opacity 2s ease '.$delay.'s;">';
				echo ( $client_logo['url'] ) ? '<a href="'.$client_logo['url'].'" target="_blank">' : '' ;
				echo '<img src="'.$client_logo['logo'].'" />';
				echo ( $client_logo['url'] ) ? '</a>' : '' ;
				echo '</li>';
				$delay += .05;
			}
			echo '</ul>';
		}
		?>
	</div>
</section>


