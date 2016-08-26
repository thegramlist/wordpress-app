		<!-- http://stackoverflow.com/questions/8425701/ajax-mailchimp-signup-form-integration -->
		<!-- Begin MailChimp Signup Form -->
		<div id="mc_embed_signup">
			<form action="//thegramlist.us11.list-manage.com/subscribe/post-json?u=a2c8529ce898b34a787d2c547&amp;id=4a4443980c&amp;c=?" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

				<div id="mce-status" class="error">A valid email address is required</div>

				<table class="mce-table">
					<td class="input">
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email'">
					</td>
					<td class="submit">

						<span class="loader">
				           <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"><circle cx="500" cy="500" r="150"/><path d="M500,150c96.56,0,183.984,39.103,247.308,102.335l106.142-105.991C762.976,55.922,638.019,0,500,0S237.024,55.922,146.551,146.344l106.141,105.991C316.016,189.103,403.441,150,500,150z"/><path d="M747.308,747.665C683.984,810.897,596.559,850,500,850s-183.984-39.103-247.308-102.336L146.551,853.656C237.025,944.077,361.981,1000,500,1000s262.976-55.923,353.449-146.344L747.308,747.665z"/></svg>
				        </span>

						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="<?php echo ( is_page('subscribe') ) ? 'square-button' : 'bordered-button' ?>">
					</td>
				</table>
				
			    <div id="mc_embed_signup_scroll">
					<div class="mc-field-group"></div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a2c8529ce898b34a787d2c547_4a4443980c" tabindex="-1" value=""></div>
			    </div>

			    <?php echo ( is_page('subscribe') ) ? '<p class="directions">'.get_field('unlock_small_text', 'option').'</p>' : '' ?>
			</form>
		</div>
		<!--End mc_embed_signup-->