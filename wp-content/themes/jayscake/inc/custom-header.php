<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Animal Pet Store
 * @subpackage jays_cake
 */

function jays_cake_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'jays_cake_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'jays_cake_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'jays_cake_custom_header_setup' );

if ( ! function_exists( 'jays_cake_header_style' ) ) :
add_action( 'wp_enqueue_scripts', 'jays_cake_header_style' );
function jays_cake_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .header-box{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: cover;
		}";
	   	wp_add_inline_style( 'jays-cake-style', $custom_css );
	endif;
}
endif;