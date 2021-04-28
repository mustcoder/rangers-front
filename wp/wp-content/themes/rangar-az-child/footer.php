<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ranger_az
 */

?>



<?php wp_footer(); ?>
<div id="page" class="container-fluid">
	<?php 
	# include(locate_template('partials/layouts/navbar.php', false, false ) );
	get_template_part( 'partials/layouts/footer');
