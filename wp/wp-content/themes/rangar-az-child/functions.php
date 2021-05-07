<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.2' );
}

/**
 * Remove version of WP
 *
 * @return void
 */
function wpbeginner_remove_version() {
	return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

// Changing excerpt length
function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');
	 
// Changing excerpt more
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Function to change email address
 
// function my_sender_email( $original_email_address ) {
//     return 'rashad@example.com';
// }
 
// Function to change sender name
// function my_sender_name( $original_email_from ) {
//     return 'Rashad Aliyev';
// }
 
// Hooking up our functions to WordPress filters 
// add_filter( 'wp_mail_from', 'my_sender_email' );
// add_filter( 'wp_mail_from_name', 'my_sender_name' );

// update_option( 'siteurl', 'http://example.com' );
// update_option( 'home', 'http://example.com' );

// function wpb_imagelink_setup() {
//     $image_set = get_option( 'image_default_link_type' );
     
//     if ($image_set !== 'none') {
//         update_option('image_default_link_type', 'none');
//     }
// }
// add_action('admin_init', 'wpb_imagelink_setup', 10);

/**
 * Enqueue scripts and styles.
 */
function rangar_az_scripts() {
	
	wp_enqueue_style( 'rangar-az-bootstrap', get_template_directory_uri() . "/assets/plugins/bootstrap/css/bootstrap.min.css", array(), _S_VERSION );
	wp_enqueue_style( 'rangar-az-style', get_template_directory_uri() . "/assets/css/style.css", [
		'rangar-az-bootstrap'
	], _S_VERSION );


	wp_enqueue_script( 'rangar-az-app', get_template_directory_uri() . '/assets/js/app.js', [
		'rangar-az-jquery', 'rangar-az-bootstrap'
	], _S_VERSION, true );
	wp_enqueue_script( 'rangar-az-jquery', get_template_directory_uri() . '/assets/plugins/jquery/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'rangar-az-bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/js/bootstrap.min.js', [
		'rangar-az-jquery'
	], _S_VERSION, true );
	
	if (is_home()) {
		wp_enqueue_style( 'rangar-az-slick', get_template_directory_uri() . "/assets/plugins/slick/slick.css", array(), _S_VERSION );
		wp_enqueue_script( 'rangar-az-slick', get_template_directory_uri() . '/assets/plugins/slick/slick.min.js', [
			'rangar-az-jquery'
		], _S_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rangar_az_scripts' );

// Register menu
register_nav_menus(array(
    'primary' => __('Header Menu'),
    'footer' => __('Footer Menu'),
    'mobile' => __('Mobile Menu'),
  )
);

  
class My_Custom_Primary_Nav_Walker extends Walker_Nav_Menu {

//   function start_lvl(&$output, $depth = 0, $args = array()) {
//     $output .= "\n<ul class=\"nav nav-menu-dropdown dropdown-menu font-assist-b\">\n";
//   }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $item_html = '';
    parent::start_el($item_html, $item, $depth, $args);
	
	if ( $depth === 0 ) {
    	$item_html = str_replace( '<a', '<a href="'.$item->url.'" class="nav-link text-dark"', $item_html );
	}

    // if ( $item->is_dropdown && $depth === 0 ) {
    //   $item_html = str_replace( '<a', '<a href="'.$item->url.'"', $item_html );
    //   $item_html = str_replace( '</a', '<i class="fa fa-chevron-down"></i></a', $item_html );
    // }

    $output .= $item_html;
  }

  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
    if ( $element->current )
      $element->classes[] = 'active';

	if ( $depth === 0 ) {
		$element->classes[] = 'nav-link text-dark'; 
	}

	// $element->is_dropdown = !empty( $children_elements[$element->ID] );

    // if ( $element->is_dropdown ) {
    //   if ( $depth === 0 ) {
    //     $element->classes[] = 'nav-link text-dark';
    //   } elseif ( $depth === 1 ) {
    //     // Extra level of dropdown menu,
    //     // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
    //     $element->classes[] = 'dropdown-submenu';
    //   }
    // }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }
}

function rangers_widgets_init() {
	register_sidebar([
		'name'          => esc_html__( 'Inner Page Sidebar', 'rangers' ),
		'id'            => 'inner-page-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'rangers' ),
		'before_widget' => '<section class="widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	]);
	
	register_sidebar([
		'name'          => esc_html__( 'Home Slick Carousel', 'rangers' ),
		'id'            => 'home-slick-carousel',
		'description'   => esc_html__( 'This will show home page carousel', 'rangers' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	  ]);
}
add_action( 'widgets_init', 'rangers_widgets_init' );

## CPTs
require get_template_directory() . '/inc/cpt/cpt-news.php';
require get_template_directory() . '/inc/cpt/cpt-articles.php';

## Widgets
require get_template_directory() . '/inc/widgets/latest-sidebar.php';
require get_template_directory() . '/inc/widgets/inner-post-preview.php';

register_widget( 'widget_rangers_latest_sidebar' );
register_widget( 'widget_rangers_inner_post_preview' );

## Taxonomies
require get_template_directory() . '/inc/taxonomies/news-taxonomy.php';
require get_template_directory() . '/inc/taxonomies/article-taxonomy.php';

//hook into the init action and call rangers_register_taxonomy_article_categories when it fires
add_action( 'init', 'rangers_register_taxonomy_article_categories' );