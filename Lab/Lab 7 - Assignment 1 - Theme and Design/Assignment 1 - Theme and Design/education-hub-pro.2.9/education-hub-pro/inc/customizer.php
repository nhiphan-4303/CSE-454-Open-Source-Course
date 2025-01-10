<?php
/**
 * Theme Customizer.
 *
 * @package Education_Hub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function education_hub_customize_register( $wp_customize ) {

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/control.php';

	// Load customize helpers.
	require get_template_directory() . '/inc/helper/options.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/callback.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Load customize option.
	require get_template_directory() . '/inc/customizer/option.php';

	// Load font family option.
	require get_template_directory() . '/inc/customizer/font.php';

	// Load color option.
	require get_template_directory() . '/inc/customizer/color.php';

	// Load slider customize option.
	require get_template_directory() . '/inc/customizer/slider.php';

	// Load featured content customize option.
	require get_template_directory() . '/inc/customizer/featured-content.php';

	// Load reset option.
	require get_template_directory() . '/inc/customizer/reset.php';

	// Remove default Colors section.
	$wp_customize->remove_section( 'colors' );

}
add_action( 'customize_register', 'education_hub_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function education_hub_customize_preview_js() {

	wp_enqueue_script( 'education_hub_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}
add_action( 'customize_preview_init', 'education_hub_customize_preview_js' );

/**
 * Load styles for Customizer.
 *
 * @since 1.0.0
 */
function education_hub_load_customizer_styles() {

	global $pagenow;
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	if ( 'customize.php' === $pagenow ) {
		wp_register_style( 'education-hub-customizer-style', get_template_directory_uri() . '/css/customizer' . $min . '.css', false, '1.5' );
		wp_enqueue_style( 'education-hub-customizer-style' );
	}

}

add_action( 'admin_enqueue_scripts', 'education_hub_load_customizer_styles' );

/**
 * Hide Custom CSS.
 *
 * @since 2.4.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function education_hub_hide_custom_css( $wp_customize ) {

	// Bail if not WP 4.7.
	if ( ! function_exists( 'wp_get_custom_css_post' ) ) {
		return;
	}

	$wp_customize->remove_control( 'theme_options[custom_css]' );

}

add_action( 'customize_register', 'education_hub_hide_custom_css', 99 );
