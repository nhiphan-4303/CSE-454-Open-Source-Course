<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Education_Hub
 */

/**
 * Add theme support for Infinite Scroll.
 *
 * @since 1.0.0
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function education_hub_jetpack_setup() {
	$pagination_type = education_hub_get_option( 'pagination_type' );
	if ( in_array( $pagination_type, array( 'infinite-scroll-click', 'infinite-scroll' ) ) ) {
		$type = ( 'infinite-scroll-click' === $pagination_type ) ? 'click' : 'scroll' ;
		add_theme_support( 'infinite-scroll', array(
			'type'           => $type,
			'container'      => 'main',
			'footer'         => 'page',
			'wrapper'        => false,
			'render'         => 'education_hub_infinite_scroll_render',
			'footer_widgets' => array( 'footer-1', 'footer-2', 'footer-3', 'footer-4' )
		) );
	}
	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'education_hub_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 *
 * @since 1.0.0
 */
function education_hub_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
		    get_template_part( 'template-parts/content', 'search' );
		else :
		    get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
