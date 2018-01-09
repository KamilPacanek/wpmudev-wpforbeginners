<?php
add_action( 'wp_enqueue_scripts', 'mat_assets' );
function mat_assets() {
	wp_enqueue_style( 'my-awesome-theme', get_stylesheet_uri() );
}
?>
