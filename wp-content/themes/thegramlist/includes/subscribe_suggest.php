<section id="subscribe-suggest" class="explore">
	<div class="max-width-container">
		<?php 
		echo ( get_field('subscribe_language') ) ? '<div class="text">'.get_field('subscribe_language').'</div>' : '' ;
		include('mailchimp_form.php'); 
		echo ( get_field('subscribe_after_form_text') ) ? '<span class="suggest">'.get_field('subscribe_after_form_text').'</span>' : '' ;
		echo ( get_field('newsletter_testimonials') ) ? '<div class="testimonials">'.get_field('newsletter_testimonials').'</div>' : '' ; 
		?>
	</div>
</section>