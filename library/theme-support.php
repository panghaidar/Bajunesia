<?php
function FoundationPress_theme_support() {
    // Add language support
    load_theme_textdomain('FoundationPress', get_template_directory() . '/languages');

    // Add menu support
    add_theme_support('menus');

    // Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);

    // rss thingy
    add_theme_support('automatic-feed-links');

    // Add post formarts support: http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
//add support shortcode
add_filter('widget_text', 'do_shortcode');
add_theme_support( 'woocommerce' );
}

add_action('after_setup_theme', 'FoundationPress_theme_support'); 
/* Character excerpt */
function get_the_catcharacter_excerpt(){
$excerpt = get_the_content();
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$the_str = substr($excerpt, 0, 350);
return $the_str;
}
/* End of character excerpt */
function metaslider_hoplink($link) {
    return "https://getdpd.com/cart/hoplink/15318?referrer=1rglzk5fg140og0g";
}
add_filter('metaslider_hoplink', 'metaslider_hoplink', 10, 1);
/* Breadcrumb */
function kholis_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = ''; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div class="breadcrumbs><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div class="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . '' . single_cat_title('', false) . '' . $after;
 
    } elseif ( is_search() ) {
      echo $before . '' . get_search_query() . '' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb;
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}
/* End of breadcrumb */
//META BOX
add_action( 'init', 'create_events' );
function create_events() {
  $labels = array(
    'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'Event'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Event'),
    'new_item' => __('New Event'),
    'view_item' => __('View Event'),
    'search_items' => __('Search Events'),
    'not_found' =>  __('No Events found'),
    'not_found_in_trash' => __('No Events found in Trash'),
    'parent_item_colon' => ''
  );

  $supports = array('title', 'editor', 'custom-fields', 'revisions', 'excerpt');

  register_post_type( 'event',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports
    )
  );
}

add_action( 'init', 'create_locations' );
function create_locations() {
 $labels = array(
    'name' => _x( 'Locations', 'taxonomy general name' ),
    'singular_name' => _x( 'Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Locations' ),
    'all_items' => __( 'All Locations' ),
    'parent_item' => __( 'Parent Location' ),
    'parent_item_colon' => __( 'Parent Location:' ),
    'edit_item' => __( 'Edit Location' ),
    'update_item' => __( 'Update Location' ),
    'add_new_item' => __( 'Add New Location' ),
    'new_item_name' => __( 'New Location Name' ),
  );  

  register_taxonomy('location','event',array(
    'hierarchical' => true,
    'labels' => $labels
  ));
} 
/*
---------------------
Custom Field
---------------------
*/

$new_meta_boxes =
  array(
    "input-one" => array(
        "name" => "harga",
        "title" => "Harga",
        "description" => "Harga produk sebelum diskon"),
    "input-two" => array(
        "name" => "harga-diskon",
        "title" => "Harga Diskon",
        "description" => "Harga produk sesudah diskon"),
    "input-three" => array(
        "name" => "availability",
        "title" => "Availability",
        "description" => "Stok Produk"),
   
);
//end of array


//now we begin a function to create the html that comprise the new meta boxes
//below you can edit/add inline css if you want to change how the label and description appear on the admin page
//worth testing, but not important to manipulate this portion of the code unless you have a super specific objective in mind.
function new_meta_boxes() {
global $post, $new_meta_boxes;
  
  foreach($new_meta_boxes as $meta_box) {
    $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
    
    if($meta_box_value == "")
      $meta_box_value = $meta_box['std'];
    
    echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename"
value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

    echo'<label style="font-weight: bold; display: block; padding: 5px 0 2px 2px"
for="'.$meta_box['name'].'">'.$meta_box['title'].'</label>';

    echo'<input type="text" name="'.$meta_box['name'].'" value="'.$meta_box_value.'" size="55" /><br />';
    
    echo'<p><label for="'.$meta_box['name'].'">'.$meta_box['description'].'</label></p>';
  }
}//end of new_meta_boxes() function


//another function begins here. This is what actually creates the meta box. The one you see on the admin page.
//you should edit the title for your meta box below. don't worry about anything else
function create_meta_box() {
  global $theme_name;
  if ( function_exists('add_meta_box') ) {
    add_meta_box( 'new-meta-boxes', 'Detail Produk', 'new_meta_boxes', 'post', 'normal', 'high' );
  }
}//end of create_meta_box() function

//the third and most important function. this is what effectively saves your meta data into your database.
//DO NOT EDIT unless you have expert php skills or advice.
function save_postdata( $post_id ) {
  global $post, $new_meta_boxes;
  
  foreach($new_meta_boxes as $meta_box) {
  // Verify
  if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }
  
  if ( 'page' == $_POST['post_type'] ) {
  if ( !current_user_can( 'edit_page', $post_id ))
    return $post_id;
  } else {
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  }
  
  $data = $_POST[$meta_box['name']];
  
  if(get_post_meta($post_id, $meta_box['name']) == "")
    add_post_meta($post_id, $meta_box['name'], $data, true);
  elseif($data != get_post_meta($post_id, $meta_box['name'], true))
    update_post_meta($post_id, $meta_box['name'], $data);
  elseif($data == "")
    delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
  }
}//end of save_postdata () function

//these are action hooks that place your special functions defined above onto the admin page.
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

//----------------------------------------------- 
 $args = array(
  'before'           => '<p>' . __('Pages:'),
  'after'            => '</p>',
  'link_before'      => '',
  'link_after'       => '',
  'next_or_number'   => 'number',
  'nextpagelink'     => __('Next page'),
  'previouspagelink' => __('Previous page'),
  'pagelink'         => '%',
  'echo'             => 1
);
 //footer menu
 if(function_exists('register_nav_menu')) {  
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'footer-menu', __( 'Footer Menu', 'corporata' ) );
}
}
?>