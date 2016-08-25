<?php 
get_header(); 
global $site_url;
?>

<div id="main-content" class="main-content page-content centered-content">

	<div id="page-top">
		<div class="max-width-container">
			<h1 class="page-title">404 Error</h1>
			<h2 class="page-sub-title">Sorry! Page not found.</h2>
						
		</div>
	</div>

	<div class="max-width-container wysiwyg-content spaced-content">
		<h2>The link you followed is probably broken or the page has been removed.<br></h2>
			<p>Please check the URL or go to the <strong><a href="<?php echo $site_url ;?>" class="bold-title">homepage</a></strong> to see if you can find it.</p>
	</div>

</div>
<?php get_footer(); ?>