<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package TSKTwo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tsktwo_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	// if ( ! is_active_sidebar( 'sidebar-1 ' ) ) {
	if ( ! is_active_sidebar( 'right-sidebar') ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'tsktwo_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tsktwo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'tsktwo_pingback_header' );

/**
 * Responsive Video Embeded code
 */
add_filter('embed_oembed_html', 'tsktwo_wrap_embed_with_div', 10, 3);

function tsktwo_wrap_embed_with_div( $html, $url, $attr ) {
	return "<div class=\"responsive-container\">" . $html . "</div>";
}
