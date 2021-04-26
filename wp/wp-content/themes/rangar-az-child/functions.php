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
		wp_enqueue_style( 'rangar-az-slick', get_template_directory_uri() . "/assets/plugins/slick/slick.min.css", array(), _S_VERSION );
		wp_enqueue_script( 'rangar-az-slick', get_template_directory_uri() . '/assets/plugins/slick/slick.min.js', [
			'rangar-az-jquery'
		], _S_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rangar_az_scripts' );