<?php


if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", false, null);
   wp_enqueue_script('jquery');
}



// ADD MENU SUPPORT
register_nav_menus( array(
    'primary'   => __( 'Menu 1' ),
    'secondary'   => __( 'Menu 2' )
) );

// ADD FEATURED IMAGE SUPPORT
add_theme_support( 'post-thumbnails' );

// ALLOW SVG IMAGE SUPPORT
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// MAKE POST CAPTIONS RESPONSIVE
add_filter( 'img_caption_shortcode', 'bs_responsive_img_caption_filter', 10, 3 );
function bs_responsive_img_caption_filter( $val, $attr, $content = null ) {
	extract( shortcode_atts( array(
		'id' => '',
		'align' => '',
		'width' => '',
		'caption' => ''
		), $attr
	) );

	if ( 1 > (int) $width || empty( $caption ) )
		return $val;

	$new_caption = sprintf( '<div id="%1$s" class="wp-caption %2$s" style="max-width:100%%;height:auto;width:auto;">%4$s<p class="wp-caption-text">%5$s</p></div>',
		esc_attr( $id ),
		esc_attr( $align ),
		'', //( 10 + (int) $width ),
		do_shortcode( $content ),
		$caption
	);
	return $new_caption;
}


// RETURN FEATURED IMAGE DATA
// USAGE: Takes 2 parameters: post ID & required attribute (url,width,height)
// echo getFeaturedImage( get_the_ID(), 'url' )
function getFeaturedImage( $post_ID, $reqAttr ){
	$imageAttributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ID ),'full');
	switch ($reqAttr) {
	  case 'url':
	    return $imageAttributes[0];
	    break;
	  case 'width':
	    return $imageAttributes[1];
	    break;
	 case 'height':
	    return $imageAttributes[2];
	    break;
	  default:
	} 
}



// GET THE FIRST IMAGE IN POST - USAGE: echo catch_that_image() 
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}


// GET THE WORDPRESS POST ATTACHMENT ID FROM AN IMAGE SRC
function get_image_id_by_link($link)
{
global $wpdb;

$link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);

return $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");
}


// ADD ACF OPTIONS PAGE SUPPORT
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


// returns an array with the requested query's posts
function populatePostArray( $req_query ){
  $results_array = array();
  if ( $req_query->have_posts() ) {
      while ( $req_query->have_posts() ) {
        $req_query->the_post();
        // get featired image
        if( has_post_thumbnail() ) {
          $imageData = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
        }
        $req_query->post->post_image = $imageData[0];
          // add formatted date to post object
          $req_query->post->formatted_date = date("m.d.Y", strtotime( $req_query->post->post_date) );
          // add permalink to post object
          $req_query->post->permalink = get_permalink( $req_query->post->ID );
          // add post object to posts array
          array_push( $results_array , $req_query->post );
      }
  }
  return $results_array;
}


// RETURNS A CUSTOM EXCERPT, WITH OR WITHOUT A LINK
function excerpt($content, $num,$moreLink=false) {
  $limit = $num+1;
  $excerpt = explode(' ', $content, $limit);
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt)."... ";
  echo $excerpt;
  if($moreLink){
    echo '  <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
  }
}

// Case Studies custom type
add_action( 'init', 'create_case_studies' );
function create_case_studies() {
  $labels = array(
    'name' => _x('Case Studies', 'post type general name'),
    'singular_name' => _x('Case Study', 'post type singular name'),
    'add_new' => _x('Add New Case Study', 'Case Study'),
    'add_new_item' => __('Add New Case Study'),
    'edit_item' => __('Edit Case Study'),
    'new_item' => __('New Case Study'),
    'view_item' => __('View Case Study'),
    'search_items' => __('Search Case Studies'),
    'not_found' =>  __('No Case Studies found'),
    'not_found_in_trash' => __('No Case Studies found in Trash'),
    'parent_item_colon' => ''
  );
  $supports = array('title', 'editor', 'revisions', 'thumbnail');
  register_post_type( 'Case Studies',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
      'has_archive' => true,
      'rewrite' => array(
      		'slug' => 'case-studies'
      	),
      'capabilities' => array(
          'edit_post'          => 'update_core',
          'read_post'          => 'update_core',
          'delete_post'        => 'update_core',
          'edit_posts'         => 'update_core',
          'edit_others_posts'  => 'update_core',
          'publish_posts'      => 'update_core',
          'read_private_posts' => 'update_core'
      )
    )
  );
}



// Careers custom type
add_action( 'init', 'create_careers' );
function create_careers() {
  $labels = array(
    'name' => _x('Careers', 'post type general name'),
    'singular_name' => _x('Position', 'post type singular name'),
    'add_new' => _x('Add New Position', 'Position'),
    'add_new_item' => __('Add New Position'),
    'edit_item' => __('Edit Position'),
    'new_item' => __('New Position'),
    'view_item' => __('View Position'),
    'search_items' => __('Search Positions'),
    'not_found' =>  __('No Positions found'),
    'not_found_in_trash' => __('No Positions found in Trash'),
    'parent_item_colon' => ''
  );
  $supports = array('title', 'editor', 'revisions', 'thumbnail','excerpt');
  register_post_type( 'Careers',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports
    )
  );
}





function html_schema()
{
    $schema = 'http://schema.org/';
 
    // Is single post
    if(is_single())
    {
        $type = "Article";
    }
    // Is blog home, archive or category
    else if(is_home()||is_archive()||is_category())
    {
        $type = "Blog";
    }
    // Is static front page
    else if(is_front_page())
    {
        $type = "Website";
    }
    // Is a general page
     else
    {
        $type = 'WebPage';
    }
 
    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}


?>