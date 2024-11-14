<?php 
// Register custom navigation walker

add_theme_support( 'menus' );
/***************** Thumbnail Display *********************/
add_theme_support( 'post-thumbnails' );
/***************** End Thumbnail Display *****************/


/*************** wp_nav_menu *****************************/
register_nav_menus( array('header' => __('Header Navigation', 'evas'),'responsive' => __('Responsive Navigation', 'evas') ));

/*************** end wp_nav_menu **************************/

/*************** wp_nav_menu footer *****************************/
register_nav_menus( array('footer' => __('Footer Navigation', 'evas'),'responsive' => __('Responsive Navigation', 'evas')));
/*************** end wp_nav_menu footer **************************/

/*************** wp_nav_menu footer *****************************/
register_nav_menus( array('footer_right' => __('Right Footer Navigation', 'evas'),'responsive' => __('Responsive Navigation', 'evas')));
/*************** end wp_nav_menu footer **************************/

/*************** wp_nav_menu footer *****************************/
register_nav_menus( array('resource_p' => __('Resource Navigation', 'evas'),'responsive' => __('Responsive Navigation', 'evas')));
/*************** end wp_nav_menu footer **************************/

/*************** wp_nav_menu footer *****************************/
register_nav_menus( array('service_right' => __('Footer Service Navigation', 'evas'),'responsive' => __('Responsive Navigation', 'evas')));
/*************** end wp_nav_menu footer **************************/



/*************** Theme Scripts   **************************/
function evas_scripts_styles() {
  /*
   * Adds JavaScript to pages with the comment form to support<p class="navLabelTxt">your questions</p>
   * sites with threaded comments (when in use).
   */
  // Add Genericons font, used in the main stylesheet.
 
  wp_enqueue_style( 'artemas-aos', get_template_directory_uri() . '/css/aos.css', array(), '1.00' ); 
  wp_enqueue_style( 'artemas-style', get_template_directory_uri() . '/css/default.css', array(), '1.00' );
  wp_enqueue_style( 'artemas-menu', get_template_directory_uri() . '/css/menu.css', array(), '1.00' );
  wp_enqueue_style( 'artemas-mobile', get_template_directory_uri() . '/css/mobile.css', array(), '1.00' );   
  wp_enqueue_style( 'artemas-flickity', get_template_directory_uri() . '/css/flickity.css', array(), '1.00' ); 
   
}

add_action( 'wp_enqueue_scripts', 'evas_scripts_styles' );
/*************** end Theme Scripts ************************/

// Customising the body_class()
function custom_body_class( $classes ) {
  global $post;
  if(is_front_page()) {
    $classes[] = ' ';
  } 
  elseif(is_page_template('template-about.php')) {
    $classes[] = 'about';
  } 
  elseif(is_page_template('template-contact.php')) {
    $classes[] = 'contact-page-sec';
  }
  elseif(is_page_template('template-service.php')) {
    $classes[] = 'inner insight-page';
  }
  // elseif(is_single('blogs')) {
  //   $classes[] = 'inner header-color';
  // } 
  else {
    $classes[] = 'inner';
  }
  return $classes;     
}
add_filter( 'body_class','custom_body_class' );


/************** walker_nav_menu ****************************/
class themeslug_walker_nav_menu extends Walker_Nav_Menu {
  
  //add classes to ul sub-menus
 function evast_lvl( &$output, $depth = 0, $args = array() ) {
    // depth dependent classes
     $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
     $display_depth = ( $depth + 1); // because it counts the first submenu as 0
     $classes = array(
         'sub-menu',
        ( $display_depth % 2  ? '' : '' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'sub-menu-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
   
 //    // build html
     $output .= "\n" . $indent . '<ul class="'.$class_names.'">'."\n";
 }
 
   
 // add main/sub classes to li's and links
  function evast_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
     global $wp_query;
      
     $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
     
     // depth dependent classes
     $depth_classes = array(( $depth == 0 ? '' : '' ),
         ( $depth >=2 ? '' : '' ),
         ( $depth % 2 ? '' : '' ),);
     $depth_class_names = esc_attr( implode( ' ',$depth_classes) );
   
     // passed classes
     $classes = empty( $item->classes ) ? array() : (array) $item->classes;
     $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
       // build html
      
     $arrow="";
     if($depth==2)
     {
     $depth="sub";
     $arrow="arrow";
     }
     $output .= $indent . '<li class="'.$class_names.''.$class_names.'">';
   
     // link attributes
     $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
     $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
     $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
     $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
     //$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
   
     $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
         $args->before,
         $attributes,
         $args->link_before,
         apply_filters( 'the_title', $item->title, $item->ID ),
         $args->link_after,
         $args->after
     );
   
     // build html
     $output .= apply_filters( 'walker_nav_menu_evast_el', $item_output, $item, $depth, $args );
 }
 }
 /**************End walker_nav_menu ****************************/   
 
 
 /**************hide Admin Bar front end********************************/
 add_filter('show_admin_bar', '__return_false');
 /**************hide Admin Bar front end********************************/ 
 
 
 /****************Set active to current Menu link*****************************/ 
 add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
 
 function special_nav_class ($classes, $item) {
     if (in_array('current-menu-item', $classes) ){
         $classes[] = 'active ';
     }
     return $classes;
 }
 /****************End Menu active *****************************/ 

  
 /****************Set active to <a> tag*****************************/  
 function add_class_to_href( $classes, $item ) {
  if ( in_array('current_page_item', $item->classes) ) {
      $classes['class'] = 'active';
  }
  return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_href', 10, 2 );
 /****************End <a> active *****************************/ 

 
/** Adding svg supporting code **/
function triq_myme_types($mime_types){
  $mime_types['svg'] = 'image/svg+xml'; 
  return $mime_types;
}
add_filter('upload_mimes', 'triq_myme_types', 1, 1);


 
 /**********  Creating Theme settings Page**********/
 add_action('acf/init', 'my_acf_op_init');
 function my_acf_op_init() {
 
     // Check function exists.
     if( function_exists('acf_add_options_page') ) {
 
         // Register options page.
         $option_page = acf_add_options_page(array(
             'page_title'    => __('Theme General Settings'),
             'menu_title'    => __('Theme Settings'),
             'menu_slug'     => 'theme-general-settings',
             'capability'    => 'edit_posts',
             'redirect'      => false
         ));
     }
 }
 /********** End Creating Option Page**********/
 
/*Custom Post type start*/
function cw_post_type_blogs() {
  $supports = array(
  'title', // post title
  'editor', // post content
  'author', // post author
  'thumbnail', // featured images
  'excerpt', // post excerpt
  'custom-fields', // custom fields
  'comments', // post comments
  'revisions', // post revisions
  'post-formats', // post formats
  );
  $labels = array(
  'name' => _x('Blogs', 'plural'),
  'singular_name' => _x('Blog', 'singular'),
  'menu_name' => _x('Blogs', 'admin menu'),
  'name_admin_bar' => _x('Blogs', 'admin bar'),
  'add_new' => _x('Add New', 'add new'),
  'add_new_item' => __('Add New Blog'),
  'new_item' => __('New Blog'),
  'edit_item' => __('Edit Blog'),
  'view_item' => __('View Blog'),
  'all_items' => __('All Blogs'),
  'search_items' => __('Search Blogs'),
  'not_found' => __('No blogs found.'),
  );
  $args = array(
  'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'blogs'),
  'has_archive' => true,
  'hierarchical' => false,
  );
  register_post_type('blogs', $args);
  }
  add_action('init', 'cw_post_type_blogs');
  /*Custom Post type end*/


  /*Custom Post type start*/
function cw_post_type_services() {
  $supports = array(
  'title', // post title
  'editor', // post content
  'author', // post author
  'thumbnail', // featured images
  'excerpt', // post excerpt
  'custom-fields', // custom fields
  'comments', // post comments
  'revisions', // post revisions
  'post-formats', // post formats
  );
  $labels = array(
  'name' => _x('Services', 'plural'),
  'singular_name' => _x('Service', 'singular'),
  'menu_name' => _x('Services', 'admin menu'),
  'name_admin_bar' => _x('Services', 'admin bar'),
  'add_new' => _x('Add New', 'add new'),
  'add_new_item' => __('Add New Service'),
  'new_item' => __('New Service'),
  'edit_item' => __('Edit Service'),
  'view_item' => __('View Service'),
  'all_items' => __('All Services'),
  'search_items' => __('Search Services'),
  'not_found' => __('No services found.'),
  );
  $args = array(
  'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'query_var' => true,
  //'rewrite' => array('slug' => 'services'),
  'has_archive' => true,
  'hierarchical' => false,
  );
  register_post_type('services', $args);
  }
  add_action('init', 'cw_post_type_services');
  /*Custom Post type end*/


/****************************************
 * Add custom taxonomy for Service *
 ****************************************/

add_action('init', 'service_categories_register');

function service_categories_register() {
$labels = array(
    'name'                          => 'Service Categories',
    'singular_name'                 => 'Service Category',
    'search_items'                  => 'Search Service Categories',
    'popular_items'                 => 'Popular Service Categories',
    'all_items'                     => 'All Service Categories',
    'parent_item'                   => 'Parent Service Category',
    'edit_item'                     => 'Edit Service Category',
    'update_item'                   => 'Update Service Category',
    'add_new_item'                  => 'Add New Service Category',
    'new_item_name'                 => 'New Service Category',
    'separate_items_with_commas'    => 'Separate service categories with commas',
    'add_or_remove_items'           => 'Add or remove service categories',
    'choose_from_most_used'         => 'Choose from most used service categories'
    );

$args = array(
    'label'                         => 'Service Categories',
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    //'rewrite'                       => array( 'slug' => 'service', 'with_front' => true, 'hierarchical' => true ),
    'query_var'                     => true
);

register_taxonomy( 'service_categories', 'services', $args );
}

/******************************************/





/*Custom Post type start*/
function cw_post_type_press() {
  $supports = array(
  'title', // post title
  'editor', // post content
  'author', // post author
  'thumbnail', // featured images
  'excerpt', // post excerpt
  'custom-fields', // custom fields
  'comments', // post comments
  'revisions', // post revisions
  'post-formats', // post formats
  );
  $labels = array(
  'name' => _x('Press', 'plural'),
  'singular_name' => _x('Press', 'singular'),
  'menu_name' => _x('Press', 'admin menu'),
  'name_admin_bar' => _x('Press', 'admin bar'),
  'add_new' => _x('Add New', 'add new'),
  'add_new_item' => __('Add New'),
  'new_item' => __('New Press Release'),
  'edit_item' => __('Edit Press Release'),
  'view_item' => __('View Press Release'),
  'all_items' => __('All Press Release'),
  'search_items' => __('Search Press Release'),
  'not_found' => __('No Press Release found.'),
  );
  $args = array(
  'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => false,
  'query_var' => true, 
  'has_archive' => true,
  'hierarchical' => false,
  );
  register_post_type('press', $args);
  }
  add_action('init', 'cw_post_type_press');
  /*Custom Post type end*/

//Validate CF7
add_filter( 'wpcf7_validate_configuration', '__return_false' );


//Regenerate img size
add_image_size( 'banner-img', 1440, '', true );
add_image_size( 'blog-thumb', 1024, '', true );

 ?>