<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function register_oembed_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/acp-items.php' );

	$widgets_manager->register( new \ACP_items() );

}
add_action( 'elementor/widgets/register', 'register_oembed_widget' );