<?php
global $template_url;
global $site_url;
global $random_version;
?>
	<footer id="footer">
		<div class="max-width-container">
			<div class="footer-columns">
				<div class="footer-column left">
					<a href="<?php echo $site_url; ?>" class="logo">
                        <?php include('images/logo.svg'); ?> 
                    </a>
				</div>
				<div class="footer-column right">
					<ul id="footer-navigation" class="">
			            <?php wp_nav_menu( array( 'menu' => 'Footer Navigation','container' => false, 'items_wrap' => '%3$s' ) ); ?>
			        </ul>
				</div>
			</div>
        </div>
        <div class="footer-bottom">
        	<div class="max-width-container">
        		<div class="footer-columns">
        			<div class="footer-column left">
        				<p class="copyright">&copy; <?php echo date('Y');?>, <span class="light"><?php bloginfo('name'); ?> Inc.</span></p>
        			</div>
        			<div class="footer-column right">
        				<ul id="footer-social-navigation" class="">
        					<?php if( get_field('facebook_url', 'option') ) { ?>
        					<li>
        						<a target="_blank" href="<?php echo get_field('facebook_url', 'option'); ?>" class="social-icon-link facebook">
        							<span class="out"><?php include('images/social/facebook.svg'); ?></span>
        							<span class="in"><?php include('images/social/facebook.svg'); ?></span>
        						</a>
        					</li>
        					<?php }
        					if( get_field('instagram_url', 'option') ) { ?>
        					<li>
        						<a target="_blank" href="<?php echo get_field('instagram_url', 'option'); ?>" class="social-icon-link instagram">
        							<span class="out"><?php include('images/social/instagram.svg'); ?></span>
        							<span class="in"><?php include('images/social/instagram.svg'); ?></span>
        						</a>
        					</li>
        					<?php }
        					if( get_field('twitter_url', 'option') ) { ?>
        					<li>
        						<a target="_blank" href="<?php echo get_field('twitter_url', 'option'); ?>" class="social-icon-link twitter">
        							<span class="out"><?php include('images/social/twitter.svg'); ?></span>
        							<span class="in"><?php include('images/social/twitter.svg'); ?></span>
        						</a>
        					</li>
        					<?php }
                            if( get_field('snapchat_url', 'option') ) { ?>
                            <li>
                                <a target="_blank" href="<?php echo get_field('snapchat_url', 'option'); ?>" class="social-icon-link snapchat">
                                    <span class="out"><?php include('images/social/snapchat.svg'); ?></span>
                                    <span class="in"><?php include('images/social/snapchat.svg'); ?></span>
                                </a>
                            </li>
                            <?php }
                            if( get_field('contact_email', 'option') ) { ?>
                            <li>
                                <a target="_blank" href="mailto:<?php echo get_field('contact_email', 'option'); ?>" class="social-icon-link mail">
                                    <span class="out"><?php include('images/social/mail.svg'); ?></span>
                                    <span class="in"><?php include('images/social/mail.svg'); ?></span>
                                </a>
                            </li>
                            <?php } 
                            ?>
	        			</ul>
                        <a class="bordered-button subscribe" href="<?php $site_url;?>/subscribe/">Subscribe</a>
        			</div>
        		</div>
        </div>
	</footer>

    <!-- INCLUDE SCRIPTS -->
    <script>
    var templateUrl = '<?php echo $template_url;?>/';
    <?php echo ( is_singular( 'post' ) ) ? 'var captureEmail = true;' : 'var captureEmail = false;' ;?>
    var unlockHeading = '<?php echo get_field('unlock_heading', 'option') ?>';
    var unlockSubHeading = '<?php echo get_field('unlock_sub_heading', 'option') ?>';
    var unlockSmallText = '<?php echo get_field('unlock_small_text', 'option') ?>';
    var unlockSuccessMessage = '<?php echo get_field('unlock_success_message', 'option') ?>';
    </script>


    <!-- jQuery included on functions file -->
    <script type="text/javascript" src="<?php echo $template_url;?>/scripts/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo $template_url;?>/scripts/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
    <script src="<?php echo $template_url;?>/scripts/scripts.js?v=<?php echo $random_version;?>"></script>    

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-65257380-1', 'auto');
      ga('send', 'pageview');
    </script>

    <?php wp_footer(); ?>
</body>
</html>