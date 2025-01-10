<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_customize_search_form' ) ) :

	/**
	 * Customize search form.
	 *
	 * @since 1.0.0
	 *
	 * @return string The search form HTML output.
	 */
	function education_hub_customize_search_form() {

		$search_placeholder = education_hub_get_option( 'search_placeholder' );
		$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
	      <label>
	        <span class="screen-reader-text">' . _x( 'Search for:', 'label', 'education-hub' ) . '</span>
	        <input type="search" class="search-field" placeholder="' . esc_attr( $search_placeholder ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'education-hub' ) . '" />
	      </label>
	      <input type="submit" class="search-submit" value="' . esc_attr_x( 'Search', 'submit button', 'education-hub' ) . '" />
	    </form>';

		return $form;

	}

endif;

add_filter( 'get_search_form', 'education_hub_customize_search_form', 15 );


if ( ! function_exists( 'education_hub_add_custom_css' ) ) :

	/**
	 * Add custom CSS.
	 *
	 * @since 1.0.0
	 */
	function education_hub_add_custom_css() {

		$custom_css = education_hub_get_option( 'custom_css' );
		$output = '';

		if ( ! empty( $custom_css ) ) {
			$output = "\n" . '<style type="text/css">' . "\n";
			$output .= $custom_css;
			$output .= "\n" . '</style>' . "\n" ;
		}
		echo $output;

	}

endif;

add_action( 'wp_head', 'education_hub_add_custom_css', 100 );


if ( ! function_exists( 'education_hub_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function education_hub_implement_excerpt_length( $length ) {

		$excerpt_length = education_hub_get_option( 'excerpt_length' );
		if ( empty( $excerpt_length ) ) {
			$excerpt_length = $length;
		}
		return apply_filters( 'education_hub_filter_excerpt_length', esc_attr( $excerpt_length ) );

	}

endif;
add_filter( 'excerpt_length', 'education_hub_implement_excerpt_length', 999 );


if ( ! function_exists( 'education_hub_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function education_hub_implement_read_more( $more ) {

		$flag_apply_excerpt_read_more = apply_filters( 'education_hub_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more;
		}

		$output = $more;
		$read_more_text = education_hub_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$output = ' <a href="' . esc_url( get_permalink() ) . '" class="read-more">' . sprintf( '%s' , esc_html( $read_more_text ) ) . '</a>';
			$output = apply_filters( 'education_hub_filter_read_more_link' , $output );
		}
		return $output;

	}

endif;
add_filter( 'excerpt_more', 'education_hub_implement_read_more' );


if ( ! function_exists( 'education_hub_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function education_hub_content_more_link( $more_link, $more_link_text ) {

		$flag_apply_excerpt_read_more = apply_filters( 'education_hub_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more_link;
		}

		$read_more_text = education_hub_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );
		}
		return $more_link;

	}

endif;

add_filter( 'the_content_more_link', 'education_hub_content_more_link', 10, 2 );


if ( ! function_exists( 'education_hub_custom_body_class' ) ) :
	/**
	 * Custom body class
	 *
	 * @since 1.0.0
	 *
	 * @param string|array $input One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function education_hub_custom_body_class( $input ) {

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$input[] = 'group-blog';
		}

		// Site layout.
		$site_layout = education_hub_get_option( 'site_layout' );
		$input[] = 'site-layout-' . esc_attr( $site_layout );

		// Global layout.
		global $post;
		$global_layout = education_hub_get_option( 'global_layout' );
		$global_layout = apply_filters( 'education_hub_filter_theme_global_layout', $global_layout );
		// Check if single.
		if ( $post  && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		$input[] = 'global-layout-' . esc_attr( $global_layout );

		// Sticky menu.
		$enable_sticky_primary_menu = education_hub_get_option( 'enable_sticky_primary_menu' );
		if ( true === $enable_sticky_primary_menu) {
			$input[] = 'enabled-sticky-primary-menu';
		}

		$home_content_status = education_hub_get_option( 'home_content_status' );
		if( true !== $home_content_status ){
			$input[] = 'home-content-not-enabled';
		}

		return $input;

	}
endif;

add_filter( 'body_class', 'education_hub_custom_body_class' );

if ( ! function_exists( 'education_hub_featured_image_instruction' ) ) :

	/**
	 * Message to show in the Featured Image Meta box.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Admin post thumbnail HTML markup.
	 * @param int    $post_id Post ID.
	 * @return string HTML.
	 */
	function education_hub_featured_image_instruction( $content, $post_id ) {

		$allowed = array( 'post', 'page' );
		if ( in_array( get_post_type( $post_id ), $allowed ) ) {
			$content .= '<strong>' . __( 'Recommended Image Sizes', 'education-hub' ) . ':</strong><br/>';
			$content .= __( 'Slider Image', 'education-hub' ) . ' : 1420px X 550px';
		}
		return $content;

	}

endif;
add_filter( 'admin_post_thumbnail_html', 'education_hub_featured_image_instruction', 10, 2 );

if ( ! function_exists( 'education_hub_exclude_category_in_blog_page' ) ) :

	/**
	 * Exclude category in blog page.
	 *
	 * @since 2.1
	 */
	function education_hub_exclude_category_in_blog_page( $query ) {

		if ( $query->is_home && $query->is_main_query() ) {
			$exclude_categories = education_hub_get_option( 'exclude_categories' );
			if ( ! empty( $exclude_categories ) ) {
				$cats = explode( ',', $exclude_categories );
				$cats = array_filter( $cats, 'is_numeric' );
				$string_exclude = '';
				if ( ! empty( $cats ) ) {
					$string_exclude = '-' . implode( ',-', $cats );
					$query->set( 'cat', $string_exclude );
				}
			}
		}
		return $query;

	}

endif;
add_filter( 'pre_get_posts', 'education_hub_exclude_category_in_blog_page' );

/**
 * Load theme options from free theme.
 *
 * Checks if there are options already present from free version and adds it to the Pro theme options.
 *
 * @since 1.4
 */
function education_hub_import_free_options() {

	// Perform action only if theme_mods_XXX[theme_options] does not exist.
	if( ! get_theme_mod( 'theme_options' ) ) {

		// Perform action only if theme_mods_XXX free version exists.
		if ( $free_options = get_option ( 'theme_mods_education-hub' ) ) {
			if ( isset( $free_options['theme_options'] ) ) {
				$pro_default_options = education_hub_get_default_theme_options();

				$pro_theme_options = $free_options;

				$pro_theme_options['theme_options'] = array_merge( $pro_default_options , $free_options['theme_options'] );

				// WP default fields.
				$fields = array(
					'custom_logo',
					'header_image',
					'header_image_data',
					'background_image',
					'background_repeat',
					'background_position_x',
					'background_attachment',
				);

				foreach ( $fields as $key ) {
					if ( isset( $free_options[ $key ] ) && ! empty( $free_options[ $key ] ) ) {
						$pro_theme_options[ $key ] = $free_options[ $key ];
					}
				}

				update_option( 'theme_mods_education-hub-pro', $pro_theme_options );
			}
		}
	}
}

add_action( 'after_switch_theme', 'education_hub_import_free_options' );

/**
 * Import existing logo URL and set it to Custom Logo.
 *
 * @since 1.5
 */
function education_hub_import_logo_field() {

    // Bail if Custom Logo feature is not available.
    if ( ! function_exists( 'the_custom_logo' ) ) {
        return;
    }

    // Fetch old logo URL.
    $site_logo = education_hub_get_option( 'site_logo' );

    // Bail if there is no existing logo.
    if ( empty( $site_logo ) ) {
        return;
    }

    // Get attachment ID.
    $attachment_id = attachment_url_to_postid( $site_logo );

    if ( $attachment_id > 0 ) {

        // We got valid attachment ID.
        set_theme_mod( 'custom_logo', $attachment_id );
        // Remove old logo value.
        $all_options = education_hub_get_options();
        $all_options['site_logo'] = '';
        set_theme_mod( 'theme_options', $all_options );

    }

}
add_action( 'after_setup_theme', 'education_hub_import_logo_field', 20 );

if ( ! function_exists( 'education_hub_import_custom_css' ) ) :

	/**
	 * Import Custom CSS.
	 *
	 * @since 2.4.0
	 */
	function education_hub_import_custom_css() {

		// Bail if not WP 4.7.
		if ( ! function_exists( 'wp_get_custom_css_post' ) ) {
			return;
		}

		$custom_css = education_hub_get_option( 'custom_css' );

		// Bail if there is no Custom CSS.
		if ( empty( $custom_css ) ) {
			return;
		}

		$core_css = wp_get_custom_css();
		$return = wp_update_custom_css_post( $core_css . $custom_css );

		if ( ! is_wp_error( $return ) ) {

			// Remove from theme.
			$options = education_hub_get_options();
			$options['custom_css'] = '';
			set_theme_mod( 'theme_options', $options );
		}

	}
endif;

add_action( 'after_setup_theme', 'education_hub_import_custom_css', 99 );

if ( ! function_exists( 'education_hub_customizer_reset_callback' ) ) :

	/**
	 * Callback for reset in Customizer.
	 *
	 * @since 2.5
	 */
	function education_hub_customizer_reset_callback() {

		$reset_all_settings = education_hub_get_option( 'reset_all_settings' );

		if ( true === $reset_all_settings ) {

			// Reset custom theme options.
			set_theme_mod( 'theme_options', array() );

			// Reset custom header, logo and backgrounds.
			remove_theme_mod( 'custom_logo' );
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
		}

		// Reset color options.
		$reset_color_settings = education_hub_get_option( 'reset_color_settings' );
		if ( true === $reset_color_settings ) {
			$options = education_hub_get_options();
			$options['reset_color_settings'] = false;
			$color_fields = education_hub_get_color_theme_settings_options();
			$default = education_hub_get_default_theme_options();
			if ( ! empty( $color_fields ) ) {
				foreach ( $color_fields as $key => $val ) {
					$options[ $key ] = $default[ $key ];
				}
			}
			remove_theme_mod( 'background_color' );
			set_theme_mod( 'theme_options', $options );
		}

		// Reset font options.
		$reset_font_settings = education_hub_get_option( 'reset_font_settings' );
		if ( true === $reset_font_settings ) {
			$options = education_hub_get_options();
			$options['reset_font_settings'] = false;
			$font_settings = education_hub_get_font_family_theme_settings_options();
			if ( ! empty( $font_settings ) ) {
				foreach ( $font_settings as $key => $val ) {
					$options[ $key ] = $val['default'];
				}
			}
			set_theme_mod( 'theme_options', $options );
		}

		// Reset footer content.
		$reset_footer_content = education_hub_get_option( 'reset_footer_content' );
		if ( true === $reset_footer_content ) {
			$options = education_hub_get_options();
			$options['reset_footer_content'] = false;
	  		$default = education_hub_get_default_theme_options();
	  		$footer_fields = array(
				'copyright_text',
				'powered_by_text',
			);
	  		foreach ( $footer_fields as $field ) {
		  		if ( isset( $default[ $field ] ) ) {
		  			$options[ $field ] = $default[ $field ];
		  		}
	  		}
			set_theme_mod( 'theme_options', $options );
		}

	}
endif;

add_action( 'customize_save_after', 'education_hub_customizer_reset_callback' );
