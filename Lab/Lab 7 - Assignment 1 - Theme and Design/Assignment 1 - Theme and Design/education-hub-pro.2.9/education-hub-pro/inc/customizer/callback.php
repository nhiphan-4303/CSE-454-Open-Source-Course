<?php
/**
 * Callback functions for active_callback.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_is_simple_breadcrumb_active' ) ) :

	/**
	 * Check if simple breadcrumb is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_simple_breadcrumb_active( $control ) {

		if ( 'simple' === $control->manager->get_setting( 'theme_options[breadcrumb_type]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_notice_active' ) ) :

	/**
	 * Check if notice is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_notice_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[show_notice]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_notice_active_and_static' ) ) :

	/**
	 * Check if notice is active and static.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_notice_active_and_static( $control ) {

		if ( $control->manager->get_setting( 'theme_options[show_notice]' )->value() && 'static' === $control->manager->get_setting( 'theme_options[notice_type]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_notice_active_and_featured_category' ) ) :

	/**
	 * Check if notice is active and featured category.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_notice_active_and_featured_category( $control ) {

		if ( $control->manager->get_setting( 'theme_options[show_notice]' )->value() && 'featured-category' === $control->manager->get_setting( 'theme_options[notice_type]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_slider_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_slider_active( $control ) {

		if ( 'disabled' !== $control->manager->get_setting( 'theme_options[featured_slider_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_content_active' ) ) :

	/**
	 * Check if featured content is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_content_active( $control ) {

		if ( 'disabled' !== $control->manager->get_setting( 'theme_options[featured_content_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_page_slider_active' ) ) :

	/**
	 * Check if featured page slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_page_slider_active( $control ) {

		if (
		'featured-page' === $control->manager->get_setting( 'theme_options[featured_slider_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_slider_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_image_slider_active' ) ) :

	/**
	 * Check if featured image slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_image_slider_active( $control ) {

		if (
		'featured-image' === $control->manager->get_setting( 'theme_options[featured_slider_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_slider_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_post_slider_active' ) ) :

	/**
	 * Check if featured post slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_post_slider_active( $control ) {

		if (
		'featured-post' === $control->manager->get_setting( 'theme_options[featured_slider_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_slider_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_category_slider_active' ) ) :

	/**
	 * Check if featured category slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_category_slider_active( $control ) {

		if (
		'featured-category' === $control->manager->get_setting( 'theme_options[featured_slider_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_slider_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_tag_slider_active' ) ) :

	/**
	 * Check if featured tag slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_tag_slider_active( $control ) {

		if (
		'featured-tag' === $control->manager->get_setting( 'theme_options[featured_slider_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_slider_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_page_content_active' ) ) :

	/**
	 * Check if featured page content is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_page_content_active( $control ) {

		if (
		'featured-page' === $control->manager->get_setting( 'theme_options[featured_content_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_content_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_post_content_active' ) ) :

	/**
	 * Check if featured post content is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_post_content_active( $control ) {

		if (
		'featured-post' === $control->manager->get_setting( 'theme_options[featured_content_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_content_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_home_news_active' ) ) :

	/**
	 * Check if home news is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_home_news_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[home_news_section_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;
if ( ! function_exists( 'education_hub_is_home_events_active' ) ) :

	/**
	 * Check if home news is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_home_events_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[home_events_section_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_quick_links_active' ) ) :

	/**
	 * Check if quick links is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_quick_links_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[show_quick_links]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_author_bio_active' ) ) :

	/**
	 * Check if author bio is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_author_bio_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[author_bio_in_single]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_author_bio_recent_posts_active' ) ) :

	/**
	 * Check if author bio is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_author_bio_recent_posts_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[author_bio_in_single]' )->value() && $control->manager->get_setting( 'theme_options[author_bio_show_recent_posts]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;
