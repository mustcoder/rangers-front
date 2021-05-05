<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.2' );
}

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
		'name'          => esc_html__( 'Latest Sidebar', 'rangers' ),
		'id'            => 'latest-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'rangers' ),
		// 'before_widget' => '<section id="%1$s" class="widget text-left %2$s">',
		// 'after_widget'  => '</section>',
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

register_widget( 'widget_rangers_latest_sidebar' );