<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses conference_event_planner_header_style()
 */
function conference_event_planner_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'conference_event_planner_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 280,
		'height'                 => 1600,
		'wp-head-callback'       => 'conference_event_planner_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'conference_event_planner_custom_header_setup' );

if ( ! function_exists( 'conference_event_planner_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see conference_event_planner_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'conference_event_planner_header_style' );
function conference_event_planner_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$conference_event_planner_custom_css = "
        .headerbox{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'conference-event-planner-style', $conference_event_planner_custom_css );
	endif;
}
endif;
