<?php

global $general_site_content;
global $template_url;
global $site_url;
global $template_url;
global $detect;
global $random_version;
$random_version = mt_rand();
$template_url = get_bloginfo('template_url');
$site_url = get_bloginfo('url');

include_once('includes/mobile_detect/Mobile_Detect.php');
$detect = new Mobile_Detect;

// GET GENERAL SITE CONTENT
// create new custom query for general content
$args = array( 'pagename' => 'general-site-content' );
$general_content_query = new WP_Query( $args );
if ( $general_content_query->have_posts()) : while ( $general_content_query->have_posts()) : $general_content_query->the_post(); 
// populate array with all general content data
$general_site_content  = array(
    'field_name' => get_field('field_name')
);
endwhile;
endif;
wp_reset_query();
?>
<!doctype html>
<html <?php html_schema(); ?>>
<head>
	<title itemprop="name"><?php bloginfo('name'); ?></title>
    <link rel="icon" href="<?php echo $template_url;?>/images/favicon.ico" type="image/x-icon">
    <link rel="canonical" href="<?php echo $site_url; ?>"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="">

    <meta itemprop="name" content="<?php bloginfo('name'); ?>"/>
    <meta itemprop="url" content="<?php echo $site_url; ?>"/>
    <meta itemprop="thumbnailUrl" content="<?php echo $site_social_image; ?>"/>
    <link rel="image_src" href="<?php echo $site_social_image; ?>" />
    <meta itemprop="image" content="<?php echo $site_social_image; ?>"/>
    <meta name="google-site-verification" content="GY_apS4X-vmbNIs0XNTkE2ky-3dbWckr_ssWArn7iDY" />

<?php 
// get sitewide social image and description
$site_social_image = get_field('social_media_image', 'option');
$site_social_description = get_field('social_media_description', 'option');
if ( is_front_page() ) {
    // on the homepage, add image tags and description, Yoast handles rest
?>
    <meta property="og:image" content="<?php echo $site_social_image; ?>"/>
    <meta name="twitter:image" content="<?php echo $site_social_image; ?>"/>
    <meta property="og:description" content="<?php echo ( $site_social_description ) ? $site_social_description : bloginfo('description') ; ?>"/>
<?php } elseif  ( is_page() ) { 
    // on pages, add image tags, Yoast handles rest
    $page_social_image = ( get_field('social_media_image') ) ? get_field('social_media_image')  : $site_social_image ;
?>
    <meta property="og:image" content="<?php echo ($page_social_image)?$page_social_image:$site_social_image; ?>"/>
    <meta name="twitter:image" content="<?php echo ($page_social_image)?$page_social_image:$site_social_image; ?>"/>
<?php } elseif ( is_singular('post') ) { 
     // on posts Yoast handles all
} ?>
    <?php wp_head(); ?>
    
    <link href="<?php echo $template_url;?>/css/styles.css?v=<?php echo $random_version;?>" rel="stylesheet">
    <link href="<?php echo $template_url;?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $template_url;?>/css/owl.theme.default.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300' rel='stylesheet' type='text/css'>


</head>
<body <?php body_class(); ?>>
    <div id="loading">
        <span class="loader">
           <?php include('images/loader.svg'); ?> 
        </span>
    </div>

    <div id="overlay" class="active">
        <a href="#" class="overlay-close">
            <?php include('images/close.svg'); ?>
        </a>
        <div class="overlay-outer">
            <div class="overlay-inner">
                <div class="overlay-content wysiwyg-content">
                </div>
            </div>
        </div>
    </div>

    <?php 
    $current_post = $wp_query->post;
    $current_post->ID;

    $header_class = "";
    if ( is_front_page() || (is_page() && has_post_thumbnail()) || (is_singular('casestudies') && has_post_thumbnail()) || (is_singular('post') && get_field('hero_image' , $current_post->ID )) ){
        // HOME: is_front_page()
        // PAGES: is_page() && has_post_thumbnail()
        // CASE STUDIES: is_singular('casestudies') && has_post_thumbnail()
        // LISTS: is_singular('post') && get_field('hero_image' , $current_post->ID )
        $header_class = "light-to-dark";
    }
    ?>

    <div id="search-wrapper" class="">
        <form role="search" method="get" id="searchform"
            class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Enter search term..." />
            <span class="form-actions center-vertically">
                <input type="submit" id="searchsubmit"
                    value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
                <a href="#" class="search-close">
                    <?php include('images/close.svg'); ?>
                </a> 
            </span>
        </form>
    </div>

    <header id="header" class=" <?php echo $header_class ;?>">
        <div class="max-width-container">
            <a href="#" class="mobile-menu-toggle center-vertically">
                <?php include('images/menu_toggle.svg'); ?>
            </a>
            <a href="#" class="search-toggle center-vertically">
                <?php include('images/search.svg'); ?>
            </a> 
            <a href="<?php echo $site_url; ?>" class="logo" itemprop=”url”>
                <?php include('images/logo.svg'); ?> 
            </a>
            <ul class="header-social-navigation center-vertically">
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
                ?>
            </ul>

            <?php 
            // include('includes/mobile_navigation_1.php'); 
            ?>

            <div class="mobile-navigation-wrapper-outer">            
                <div class="mobile-navigation-wrapper">
                    <div class="mobile-navigation-wrapper-inner">
                        <div class="mobile-navigation-tray-topbar">
                            <a href="" class="tray-logo">
                            <?php include('images/logo.svg'); ?> 
                            </a>
                            <a href="#" class="tray-close center-vertically">
                                <?php include('images/close.svg'); ?>
                            </a> 
                        </div>                        
                        <div class="mobile-navigation-tray">

                            <ul id="mobile-navigation" class="" itemscope itemtype="http://schema.org/SiteNavigationElement">
                            <?php
                            $menuitems = wp_get_nav_menu_items( 'Header Navigation', array( 'order' => 'DESC' ) );
                            foreach( $menuitems as $item ) {
                                $title = $item->title;
                                $link = $item->url;
                                ?>
                                <li class="<?php echo ($title == 'Lists') ? '' : 'menu-item'; ?>">
                                    <a href="<?php echo $link; ?>" itemprop="url"><?php echo $title; ?></a>
                                    <?php
                                    if( $title == 'Lists' ){
                                        include('includes/category_submenu.php');
                                    }
                                    ?>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>                             
                        </div>                

                    </div>                
                </div>
            </div>



            <ul id="desktop-navigation" class="" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <?php
                foreach( $menuitems as $item ) {
                    $title = $item->title;
                    $link = $item->url;
                    ?>
                    <li class="">
                        <a href="<?php echo $link; ?>" itemprop="url"><?php echo $title; ?></a>
                        <?php
                        if( $title == 'Lists' ){
                            include('includes/category_submenu.php');
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </header>