<?php
global $general_site_content;
global $template_url;
global $site_url;
global $template_url;
$template_url = get_bloginfo('template_url');
$site_url = get_bloginfo('url');

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
<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <link rel="icon" href="<?php echo $template_url;?>/images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Description Here">
    <meta name="keywords" content="Keywords Here" >
    <link href="<?php echo $template_url;?>/css/styles.css" rel="stylesheet">
    <link href="<?php echo $template_url;?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $template_url;?>/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300|Montserrat:400,700' rel='stylesheet' type='text/css'> -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="loading">
        <span class="loader">
           <?php include('images/loader.svg'); ?> 
        </span>
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

    <?php /* ?>
	<header id="header" class="header-a <?php echo $header_class ;?>">
        <div class="max-width-container">
            <div class="header-columns">
                <div class="header-column left">
                    <a href="<?php echo $site_url; ?>" class="logo">
                        <?php include('images/logo.svg'); ?> 
                    </a>
                    <a href="#" class="mobile-menu-toggle center-vertically"><?php include('images/menu_toggle.svg'); ?></a>       
                </div>
                <div class="header-column right">
                    <ul id="header-navigation" class="">
                        <?php wp_nav_menu( array( 'menu' => 'Header Navigation','container' => false, 'items_wrap' => '%3$s' ) ); ?>
                    </ul>       
                </div>
            </div>
        </div>
	</header>
    <?php */ ?>

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

    <header id="header" class="header-b <?php echo $header_class ;?>">
        <div class="max-width-container">
            <a href="#" class="mobile-menu-toggle center-vertically">
                <?php include('images/menu_toggle.svg'); ?>
            </a>
            <a href="#" class="search-toggle center-vertically">
                <?php include('images/search.svg'); ?>
            </a> 
            <a href="<?php echo $site_url; ?>" class="logo">
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
                <?php } ?>
            </ul>
            <div class="mobile-navigation-wrapper-outer">            
                <div class="mobile-navigation-wrapper">
                    <div class="mobile-navigation-wrapper-inner">                    
                        <ul id="mobile-navigation" class="">
                        <?php
                        $menuitems = wp_get_nav_menu_items( 'Header Navigation', array( 'order' => 'DESC' ) );
                        foreach( $menuitems as $item ) {
                            $title = $item->title;
                            $link = $item->url;
                            ?>
                            <li class="">
                                <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                <?php
                                if( $title == 'Lists' ){
                                    include('includes/category_submenu.php');
                                }
                                ?>
                            </li>
                            <?php
                        }
                        /*
                        wp_nav_menu( array( 'menu' => 'Header Navigation','container' => false, 'items_wrap' => '%3$s' ) );
                        echo '<li class="label">List Categories</li>';
                        $categories = get_categories( array( 'orderby' => 'name' , 'hide_empty' => 0 , 'exclude' => '1'  ) );
                        foreach ( $categories as $category ) {
                            echo '<li class="category-item"><a href="'.get_category_link( $category->term_id ).'">'.$category->name.'</a></li>';
                        }
                        */
                        ?>
                        </ul> 
                    </div>                
                </div>
            </div>
            <ul id="desktop-navigation" class="">
                <?php
                foreach( $menuitems as $item ) {
                    $title = $item->title;
                    $link = $item->url;
                    ?>
                    <li class="">
                        <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                        <?php
                        if( $title == 'Lists' ){
                            include('includes/category_submenu.php');
                        }
                        ?>
                    </li>
                    <?php
                }

                // wp_nav_menu( array( 'menu' => 'Header Navigation','container' => false, 'items_wrap' => '%3$s' ) ); ?>
            </ul>
        </div>
    </header>