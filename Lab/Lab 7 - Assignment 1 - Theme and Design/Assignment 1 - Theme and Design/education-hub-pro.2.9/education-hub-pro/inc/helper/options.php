<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_global_layout_options() {

		$choices = array(
			'left-sidebar'            => esc_html__( 'Primary Sidebar - Content', 'education-hub' ),
			'right-sidebar'           => esc_html__( 'Content - Primary Sidebar', 'education-hub' ),
			'three-columns'           => esc_html__( 'Three Columns ( Secondary - Content - Primary )', 'education-hub' ),
			'three-columns-pcs'       => esc_html__( 'Three Columns ( Primary - Content - Secondary )', 'education-hub' ),
			'three-columns-cps'       => esc_html__( 'Three Columns ( Content - Primary - Secondary )', 'education-hub' ),
			'three-columns-psc'       => esc_html__( 'Three Columns ( Primary - Secondary - Content )', 'education-hub' ),
			'three-columns-pcs-equal' => esc_html__( 'Three Columns ( Equal Primary - Content - Secondary )', 'education-hub' ),
			'three-columns-scp-equal' => esc_html__( 'Three Columns ( Equal Secondary - Content - Primary )', 'education-hub' ),
			'no-sidebar'              => esc_html__( 'No Sidebar', 'education-hub' ),

		);
		$output = apply_filters( 'education_hub_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_site_layout_options' ) ) :

	/**
	 * Returns site layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_site_layout_options() {

		$choices = array(
			'fluid' => esc_html__( 'Fluid', 'education-hub' ),
			'boxed' => esc_html__( 'Boxed', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_site_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_numbers_dropdown_options' ) ) :

	/**
	 * Returns numbers dropdown options.
	 *
	 * @since 1.0.0
	 *
	 * @param int $min Min.
	 * @param int $max Max.
	 *
	 * @return array Options array.
	 */
	function education_hub_get_numbers_dropdown_options( $min = 1, $max = 4 ) {

		$output = array();

		if ( $min <= $max ) {
			for ( $i = $min; $i <= $max; $i++ ) {
				$output[ $i ] = $i;
			}
		}

		return $output;

	}

endif;


if ( ! function_exists( 'education_hub_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_pagination_type_options() {

		$choices = array(
			'default'               => esc_html__( 'Default (Older / Newer Post)', 'education-hub' ),
			'numeric'               => esc_html__( 'Numeric', 'education-hub' ),
			'infinite-scroll'       => esc_html__( 'Infinite Scroll - Scroll', 'education-hub' ),
			'infinite-scroll-click' => esc_html__( 'Infinite Scroll - Click', 'education-hub' ),

		);
		return $choices;

	}

endif;

if ( ! function_exists( 'education_hub_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_breadcrumb_type_options() {

		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'education-hub' ),
			'simple'   => esc_html__( 'Simple', 'education-hub' ),
			'advanced' => esc_html__( 'Advanced', 'education-hub' ),
		);
		return $choices;

	}

endif;


if ( ! function_exists( 'education_hub_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'education-hub' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function education_hub_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'education-hub' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'education-hub' );
		$choices['medium']    = esc_html__( 'Medium', 'education-hub' );
		$choices['large']     = esc_html__( 'Large', 'education-hub' );
		$choices['full']      = esc_html__( 'Full (original)', 'education-hub' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = ucfirst( $_size ) . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ){
					$choices[ $key ] .= ' ('. $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;

if ( ! function_exists( 'education_hub_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_image_alignment_options() {

		$choices = array(
			'none'   => _x( 'None', 'Alignment', 'education-hub' ),
			'left'   => _x( 'Left', 'Alignment', 'education-hub' ),
			'center' => _x( 'Center', 'Alignment', 'education-hub' ),
			'right'  => _x( 'Right', 'Alignment', 'education-hub' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_slider_transition_effects() {

		$choices = array(
			'fade'       => _x( 'fade', 'Transition Effect', 'education-hub' ),
			'fadeout'    => _x( 'fadeout', 'Transition Effect', 'education-hub' ),
			'none'       => _x( 'none', 'Transition Effect', 'education-hub' ),
			'scrollHorz' => _x( 'scrollHorz', 'Transition Effect', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_slider_transition_effects', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_slider_content_options() {

		$choices = array(
			'home-page'   => esc_html__( 'Home Page / Front Page', 'education-hub' ),
			'entire-site' => esc_html__( 'Entire Site', 'education-hub' ),
			'disabled'    => esc_html__( 'Disabled', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_slider_content_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_content_status_options' ) ) :

	/**
	 * Returns the featured content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_content_status_options() {

		$choices = array(
			'home-page' => esc_html__( 'Home Page Only', 'education-hub' ),
			'disabled'  => esc_html__( 'Disabled', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_content_status_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_slider_type() {

		$choices = array(
			'featured-page'     => __( 'Featured Pages', 'education-hub' ),
			'featured-category' => __( 'Featured Category', 'education-hub' ),
			'featured-post'     => __( 'Featured Posts', 'education-hub' ),
			'featured-image'    => __( 'Featured Images', 'education-hub' ),
			'featured-tag'      => __( 'Featured Tag', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_slider_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_content_type' ) ) :

	/**
	 * Returns the featured content type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_content_type() {

		$choices = array(
			'featured-page' => esc_html__( 'Featured Pages', 'education-hub' ),
			'featured-post' => esc_html__( 'Featured Posts', 'education-hub' ),
			'demo-content'  => esc_html__( 'Demo Content', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_content_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_notice_type' ) ) :

	/**
	 * Returns the notice type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_notice_type() {

		$choices = array(
			'static'            => esc_html__( 'Static', 'education-hub' ),
			'featured-category' => esc_html__( 'Dynamic', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_notice_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if( ! function_exists( 'education_hub_get_font_family_theme_settings_options' ) ) :

  /**
   * Returns font family theme settings options.
   *
   * @since 1.0.0
   */
  function education_hub_get_font_family_theme_settings_options(){

    $choices = array(
      'font_site_title' => array(
          'label'   => __( 'Site Title', 'education-hub' ),
          'default' => 'merriweather-sans',
        ),
      'font_site_tagline' => array(
          'label'   => __( 'Site Tagline', 'education-hub' ),
          'default' => 'open-sans',
        ),
      'font_site_default' => array(
          'label'   => __( 'Default', 'education-hub' ),
          'default' => 'open-sans',
        ),
      'font_content_title' => array(
          'label'   => __( 'Content Title', 'education-hub' ),
          'default' => 'open-sans',
        ),
      'font_content_body' => array(
          'label'   => __( 'Content Body', 'education-hub' ),
          'default' => 'open-sans',
        ),
      'font_heading_tags' => array(
          'label'   => __( 'Heading Tags', 'education-hub' ),
          'default' => 'open-sans',
        ),
      'font_navigation' => array(
          'label'   => __( 'Navigation', 'education-hub' ),
          'default' => 'open-sans',
        ),
    );
    return $choices;

  }

endif;

if( ! function_exists( 'education_hub_get_customizer_font_options' ) ) :

  /**
   * Returns customizer font options.
   *
   * @since 1.0.0
   */
  function education_hub_get_customizer_font_options(){

    $web_fonts = education_hub_get_web_fonts();
    $os_fonts  = education_hub_get_os_fonts();

    $web_fonts = array_merge( $web_fonts, $os_fonts );

    if ( ! empty( $web_fonts ) ) {
      ksort( $web_fonts );
    }

    $choices = array();

    if ( ! empty( $web_fonts ) ) {
      foreach ( $web_fonts as $k => $v ) {
        $choices[$k] = esc_html( $v['label'] );
      }
    }
    return $choices;

  }

endif;

if( ! function_exists( 'education_hub_get_web_fonts' ) ) :

  /**
   * Returns web font options.
   *
   * @since 1.0.0
   */
  function education_hub_get_web_fonts(){

    $choices = array(
      'open-sans' => array(
        'name'  => 'Open Sans',
        'label' => "'Open Sans', sans-serif",
      ),
      'merriweather-sans' => array(
        'name'  => 'Merriweather Sans',
        'label' => "'Merriweather Sans', sans-serif",
      ),
      'roboto' => array(
        'name'  => 'Roboto',
        'label' => "'Roboto', sans-serif",
      ),
      'arizonia' => array(
        'name'  => 'Arizonia',
        'label' => "'Arizonia', cursive",
      ),
      'raleway' => array(
        'name'  => 'Raleway',
        'label' => "'Raleway', sans-serif",
      ),
      'droid-sans' => array(
        'name'  => 'Droid Sans',
        'label' => "'Droid Sans', sans-serif",
      ),
      'lato' => array(
        'name'  => 'Lato',
        'label' => "'Lato', sans-serif",
      ),
      'dosis' => array(
        'name'  => 'Dosis',
        'label' => "'Dosis', sans-serif",
      ),
      'slabo-27px' => array(
        'name'  => 'Slabo 27px',
        'label' => "'Slabo 27px', serif",
      ),
      'oswald' => array(
        'name'  => 'Oswald',
        'label' => "'Oswald', sans-serif",
      ),
      'pt-sans-narrow' => array(
        'name'  => 'PT Sans Narrow',
        'label' => "'PT Sans Narrow', sans-serif",
      ),
      'josefin-slab' => array(
        'name'  => 'Josefin Slab',
        'label' => "'Josefin Slab', serif",
      ),
      'alegreya' => array(
        'name'  => 'Alegreya',
        'label' => "'Alegreya', serif",
      ),
      'exo' => array(
        'name'  => 'Exo',
        'label' => "'Exo', sans-serif",
      ),
      'signika' => array(
        'name'  => 'Signika',
        'label' => "'Signika', sans-serif",
      ),
      'lobster' => array(
        'name'  => 'Lobster',
        'label' => "'Lobster', cursive",
      ),
      'indie-flower' => array(
        'name'  => 'Indie Flower',
        'label' => "'Indie Flower', cursive",
      ),
      'shadows-into-light' => array(
        'name'  => 'Shadows Into Light',
        'label' => "'Shadows Into Light', cursive",
      ),
      'kaushan-script' => array(
        'name'  => 'Kaushan Script',
        'label' => "'Kaushan Script', cursive",
      ),
      'dancing-script' => array(
        'name'  => 'Dancing Script',
        'label' => "'Dancing Script', cursive",
      ),
      'fredericka-the-great' => array(
        'name'  => 'Fredericka the Great',
        'label' => "'Fredericka the Great', cursive",
      ),
      'covered-by-your-grace' => array(
        'name'  => 'Covered By Your Grace',
        'label' => "'Covered By Your Grace', cursive",
      ),
    );
    $choices = apply_filters( 'education_hub_filter_web_fonts', $choices );

    if ( ! empty( $choices ) ) {
      ksort( $choices );
    }

    return $choices;

  }

endif;

if( ! function_exists( 'education_hub_get_os_fonts' ) ) :

  /**
   * Returns OS font options.
   *
   * @since 1.0.0
   */
  function education_hub_get_os_fonts(){

    $choices = array(
      'arial' => array(
        'name'  => 'Arial',
        'label' => "'Arial', sans-serif",
      ),
      'georgia' => array(
        'name'  => 'Georgia',
        'label' => "'Georgia', serif",
      ),
      'cambria' => array(
        'name'  => 'Cambria',
        'label' => "'Cambria', Georgia, serif",
      ),
      'tahoma' => array(
        'name'  => 'Tahoma',
        'label' => "'Tahoma', Geneva, sans-serif",
      ),
      'sans-serif' => array(
        'name'  => 'Sans Serif',
        'label' => "'Sans Serif', Arial",
      ),
      'verdana' => array(
        'name'  => 'Verdana',
        'label' => "'Verdana', Geneva, sans-serif",
      ),
    );
    $choices = apply_filters( 'education_hub_filter_os_fonts', $choices );

    if ( ! empty( $choices ) ) {
      ksort( $choices );
    }
    return $choices;

  }

endif;

if( ! function_exists( 'education_hub_get_font_family_from_key' ) ) :

  /**
   * Return font family from font slug.
   *
   * @since 1.0.0
   *
   * @param string $key Font slug.
   * @return string Font name.
   */
  function education_hub_get_font_family_from_key( $key ){

    $output = '';

    $web_fonts = education_hub_get_web_fonts();
    $os_fonts  = education_hub_get_os_fonts();

    $fonts = array_merge( $web_fonts, $os_fonts );

    if ( isset( $fonts[ $key ] ) ) {
      $output = $fonts[ $key ]['label'];
    }
    return $output;

  }

endif;

if( ! function_exists( 'education_hub_get_default_colors' ) ) :

  /**
   * Returns default colors.
   *
   * @since 1.0.0
   *
   * @param string $scheme Color scheme.
   * @return array Color values based on scheme.
   */
	function education_hub_get_default_colors( $scheme = 'default' ){

		$output = array();

		switch ( $scheme ) {

			case 'default':
			default:
			$output = array(

				// Basic.
				'color_basic_background'              => '#ffffff',
				'color_basic_text'                    => '#666666',
				'color_basic_link'                    => '#294a70',
				'color_basic_link_hover'              => '#6081a7',
				'color_basic_heading'                 => '#294a70',
				'color_basic_button_background'       => '#ffab1f',
				'color_basic_button_text'             => '#ffffff',
				'color_basic_button_background_hover' => '#294a70',
				'color_basic_button_text_hover'       => '#ffffff',

				// Header.
				'color_header_background'                     => '#ffffff',
				'color_header_title'                          => '#294a70',
				'color_header_title_hover'                    => '#6081a7',
				'color_header_tagline'                        => '#666666',
				'color_header_search_button_background'       => '#294a70',
				'color_header_search_button_background_hover' => '#ffab1f',
				'color_header_search_button_text'             => '#ffffff',
				'color_header_search_button_text_hover'       => '#ffffff',

				// Header Top.
				'color_header_top_background' => '#49688e',
				'color_header_top_text'       => '#ffffff',
				'color_header_top_link'       => '#ffffff',
				'color_header_top_link_hover' => '#bfbfbf',
				'color_header_top_icon'       => '#ffab1f',

				// Quick Links.
				'color_quick_links_text'                    => '#fffff',
				'color_quick_links_button_icon'             => '#fffff',
				'color_quick_links_button_background'       => '#ffab1f ',
				'color_quick_links_button_background_hover' => '#ffab1f ',
				'color_quick_links_link'                    => '#333366',
				'color_quick_links_link_hover'              => '#ffffff',
				'color_quick_links_link_background'         => '#ffffff',
				'color_quick_links_link_background_hover'   => '#ffab1f',

				// Featured Content.
				'color_featured_content_background'       => '#fbfbfb',
				'color_featured_content_title_link'       => '#294a70',
				'color_featured_content_title_link_hover' => '#6081a7',
				'color_featured_content_text'             => '#666666',

				// Content.
				'color_content_background'      => '#ffffff',
				'color_content_title'           => '#294a70',
				'color_content_text'            => '#666666',
				'color_content_link'            => '#294a70',
				'color_content_link_hover'      => '#6081a7',
				'color_content_meta_link'       => '#294a70',
				'color_content_meta_link_hover' => '#6081a7',
				'color_content_meta_icon'       => '#294a70',

				// Sidebar.
				'color_sidebar_title'             => '#ffffff',
				'color_sidebar_title_background'  => '#294a70',
				'color_sidebar_title_left_border' => '#ffab1f',
				'color_sidebar_text'              => '#ffffff',
				'color_sidebar_link'              => '#294a70',
				'color_sidebar_link_hover'        => '#6081a7',
				'color_sidebar_list_icon'         => '#ffab1f',

				// Slider.
				'color_slider_caption_background'    => '#ffffff',
				'color_slider_caption_text'          => '#09254b',
				'color_slider_caption_link'          => '#294a70',
				'color_slider_caption_link_hover'    => '#6081a7',
				'color_slider_icon'                  => '#ffffff',
				'color_slider_icon_hover'            => '#ffffff',
				'color_slider_icon_background'       => '#294a70',
				'color_slider_icon_background_hover' => '#f4a024',
				'color_slider_pager'                 => '#f4a024',
				'color_slider_pager_active'          => '#294a70',

				// Home Page Widgets.
				'color_home_widgets_area_background' => '#ffffff',
				'color_home_widgets_title'           => '#294a70',
				'color_home_widgets_text'            => '#666666',
				'color_home_widgets_link'            => '#294a70',
				'color_home_widgets_link_hover'      => '#6081a7',

				// News Events Widgets.
				'color_news_events_background'       => '#ffffff',
				'color_news_events_section_title'    => '#294a70',
				'color_news_events_item_background'  => '#f3f3f3',
				'color_news_events_item_title'       => '#294a70',
				'color_news_events_item_title_hover' => '#6081a7',
				'color_news_events_item_text'        => '#666666',
				'color_news_events_item_link'        => '#294a70',
				'color_news_events_item_link_hover'  => '#6081a7',
				'color_news_events_news_separator'   => '#ffab1f',

				// Primary Menu.
				'color_primary_menu_main_background'       => '#294a70',
				'color_primary_menu_link'                  => '#ffffff',
				'color_primary_menu_link_hover'            => '#ffffff',
				'color_primary_menu_link_background_hover' => '#f4a024',

				// Footer Widgets.
				'color_footer_widgets_background' => '#dddddd',
				'color_footer_widgets_title'      => '#666666',
				'color_footer_widgets_text'       => '#ffffff',
				'color_footer_widgets_link'       => '#1f1f29',
				'color_footer_widgets_link_hover' => '#333333',
				'color_footer_widgets_list_icon'  => '#1f1f29',
				'color_footer_widgets_top_border' => '#ffab1f',

				// Footer area.
				'color_footer_area_background' => '#294a70',
				'color_footer_area_text'       => '#ffffff',
				'color_footer_area_link'       => '#ffffff',
				'color_footer_area_link_hover' => '#c2c2c2',

				// Go To Top.
				'color_goto_top_icon'             => '#294a70',
				'color_goto_top_icon_hover'       => '#ffffff',
				'color_goto_top_background'       => '#1f1f29',
				'color_goto_top_background_hover' => '#ffab1f',

				// Pagination.
				'color_pagination_link'                  => '#ffffff',
				'color_pagination_link_hover'            => '#ffffff',
				'color_pagination_link_background'       => '#294a70',
				'color_pagination_link_background_hover' => '#ffab1f',

				// Breadcrumb.
				'color_breadcrumb_background' => '#f4f4f4',
				'color_breadcrumb_link'       => '#294a70',
				'color_breadcrumb_link_hover' => '#6081a7',
				'color_breadcrumb_text'       => '#666666',

			);
			break;

		} // End switch.

	return $output;

	}

endif;

if( ! function_exists( 'education_hub_get_color_theme_settings_options' ) ) :

  /**
   * Returns color theme settings options.
   *
   * @since 1.0.0
   */
  function education_hub_get_color_theme_settings_options(){

  	$choices = array(

		// Basic.
  		'color_basic_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),
  		'color_basic_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),
  		'color_basic_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),
  		'color_basic_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),
  		'color_basic_heading' => array(
  			'label'   => __( 'Heading Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),
  		'color_basic_button_text' => array(
  			'label'   => __( 'Button Text Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),
  		'color_basic_button_background' => array(
  			'label'   => __( 'Button Background Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),
  		'color_basic_button_text_hover' => array(
  			'label'   => __( 'Button Text Hover Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),
  		'color_basic_button_background_hover' => array(
  			'label'   => __( 'Button Background Hover Color', 'education-hub' ),
  			'section' => 'color_section_basic',
  			),

		// Header.
  		'color_header_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_header',
  			),
  		'color_header_title' => array(
  			'label'   => __( 'Site Title Color', 'education-hub' ),
  			'section' => 'color_section_header',
  			),
  		'color_header_title_hover' => array(
  			'label'   => __( 'Site Title Hover Color', 'education-hub' ),
  			'section' => 'color_section_header',
  			),
  		'color_header_tagline' => array(
  			'label'   => __( 'Site Tagline Color', 'education-hub' ),
  			'section' => 'color_section_header',
  			),
  		'color_header_search_button_background' => array(
  			'label'   => __( 'Search Button Background', 'education-hub' ),
  			'section' => 'color_section_header',
  			),
  		'color_header_search_button_background_hover' => array(
  			'label'   => __( 'Search Button Background Hover', 'education-hub' ),
  			'section' => 'color_section_header',
  			),
  		'color_header_search_button_text' => array(
  			'label'   => __( 'Search Button Text', 'education-hub' ),
  			'section' => 'color_section_header',
  			),
  		'color_header_search_button_text_hover' => array(
  			'label'   => __( 'Search Button Text Hover', 'education-hub' ),
  			'section' => 'color_section_header',
  			),

		// Header Top.
  		'color_header_top_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_header_top',
  			),
  		'color_header_top_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_header_top',
  			),
  		'color_header_top_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_header_top',
  			),
  		'color_header_top_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_header_top',
  			),
  		'color_header_top_icon' => array(
  			'label'   => __( 'Icon Color', 'education-hub' ),
  			'section' => 'color_section_header_top',
  			),

		// Quick Links.
  		'color_quick_links_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_quick_links',
  			),
  		'color_quick_links_button_icon' => array(
  			'label'   => __( 'Button Icon Color', 'education-hub' ),
  			'section' => 'color_section_quick_links',
  			),
  		'color_quick_links_button_background' => array(
  			'label'   => __( 'Button Background Color', 'education-hub' ),
  			'section' => 'color_section_quick_links',
  			),
  		'color_quick_links_button_background_hover' => array(
  			'label'   => __( 'Button Background Hover Color', 'education-hub' ),
  			'section' => 'color_section_quick_links',
  			),
  		'color_quick_links_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_quick_links',
  			),
  		'color_quick_links_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_quick_links',
  			),
  		'color_quick_links_link_background' => array(
  			'label'   => __( 'Link Background Color', 'education-hub' ),
  			'section' => 'color_section_quick_links',
  			),
  		'color_quick_links_link_background_hover' => array(
  			'label'   => __( 'Link Background Hover Color', 'education-hub' ),
  			'section' => 'color_section_quick_links',
  			),

		// Primary Menu.
  		'color_primary_menu_main_background' => array(
  			'label'   => __( 'Main Background Color', 'education-hub' ),
  			'section' => 'color_section_primary_menu',
  			),
  		'color_primary_menu_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_primary_menu',
  			),
  		'color_primary_menu_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_primary_menu',
  			),
  		'color_primary_menu_link_background_hover' => array(
  			'label'   => __( 'Link Background Hover Color', 'education-hub' ),
  			'section' => 'color_section_primary_menu',
  			),

		// Featured Content.
  		'color_featured_content_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_featured_content',
  			),
  		'color_featured_content_title_link' => array(
  			'label'   => __( 'Title Link Color', 'education-hub' ),
  			'section' => 'color_section_featured_content',
  			),
  		'color_featured_content_title_link_hover' => array(
  			'label'   => __( 'Title Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_featured_content',
  			),
  		'color_featured_content_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_featured_content',
  			),

		// Content.
  		'color_content_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_content',
  			),
  		'color_content_title' => array(
  			'label'   => __( 'Title Color', 'education-hub' ),
  			'section' => 'color_section_content',
  			),
  		'color_content_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_content',
  			),
  		'color_content_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_content',
  			),
  		'color_content_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_content',
  			),
  		'color_content_meta_link' => array(
  			'label'   => __( 'Meta Link Color', 'education-hub' ),
  			'section' => 'color_section_content',
  			),
  		'color_content_meta_link_hover' => array(
  			'label'   => __( 'Meta Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_content',
  			),
  		'color_content_meta_icon' => array(
  			'label'   => __( 'Meta Icon Color', 'education-hub' ),
  			'section' => 'color_section_content',
  			),

		// Slider.
  		'color_slider_caption_background' => array(
  			'label'   => __( 'Caption Background Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_caption_text' => array(
  			'label'   => __( 'Caption Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_caption_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_caption_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_icon' => array(
  			'label'   => __( 'Icon Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_icon_hover' => array(
  			'label'   => __( 'Icon Hover Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_icon_background' => array(
  			'label'   => __( 'Icon Background Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_icon_background_hover' => array(
  			'label'   => __( 'Icon Background Hover Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_pager' => array(
  			'label'   => __( 'Pager Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),
  		'color_slider_pager_active' => array(
  			'label'   => __( 'Pager Active Color', 'education-hub' ),
  			'section' => 'color_section_slider',
  			),

		// Home Page Widgets.
  		'color_home_widgets_area_background' => array(
  			'label'   => __( 'Widget Area Background Color', 'education-hub' ),
  			'section' => 'color_section_home_widgets',
  			),
  		'color_home_widgets_title' => array(
  			'label'   => __( 'Widget Title Color', 'education-hub' ),
  			'section' => 'color_section_home_widgets',
  			),
  		'color_home_widgets_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_home_widgets',
  			),
  		'color_home_widgets_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_home_widgets',
  			),
  		'color_home_widgets_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_home_widgets',
  			),

		// News Events.
  		'color_news_events_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),
  		'color_news_events_section_title' => array(
  			'label'   => __( 'Section Title Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),
  		'color_news_events_item_background' => array(
  			'label'   => __( 'Item Background Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),
  		'color_news_events_item_title' => array(
  			'label'   => __( 'Item Title Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),
  		'color_news_events_item_title_hover' => array(
  			'label'   => __( 'Item Title Hover Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),
  		'color_news_events_item_text' => array(
  			'label'   => __( 'Item Text Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),
  		'color_news_events_item_link' => array(
  			'label'   => __( 'Item Link Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),
  		'color_news_events_item_link_hover' => array(
  			'label'   => __( 'Item Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),
  		'color_news_events_news_separator' => array(
  			'label'   => __( 'News Separator Color', 'education-hub' ),
  			'section' => 'color_section_news_events',
		),

		// Sidebar.
  		'color_sidebar_title' => array(
  			'label'   => __( 'Title Color', 'education-hub' ),
  			'section' => 'color_section_sidebar',
		),
  		'color_sidebar_title_background' => array(
  			'label'   => __( 'Title Background Color', 'education-hub' ),
  			'section' => 'color_section_sidebar',
		),
  		'color_sidebar_title_left_border' => array(
  			'label'   => __( 'Title Left Border Color', 'education-hub' ),
  			'section' => 'color_section_sidebar',
		),
  		'color_sidebar_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_sidebar',
		),
  		'color_sidebar_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_sidebar',
		),
  		'color_sidebar_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_sidebar',
		),
  		'color_sidebar_list_icon' => array(
  			'label'   => __( 'List Icon Color', 'education-hub' ),
  			'section' => 'color_section_sidebar',
		),

		// Footer area.
  		'color_footer_area_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_footer_area',
  			),
  		'color_footer_area_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_footer_area',
  			),
  		'color_footer_area_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_footer_area',
  			),
  		'color_footer_area_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_footer_area',
  			),

		// Go To Top.
  		'color_goto_top_icon' => array(
  			'label'   => __( 'Icon Color', 'education-hub' ),
  			'section' => 'color_section_goto_top',
  			),
  		'color_goto_top_icon_hover' => array(
  			'label'   => __( 'Icon Hover Color', 'education-hub' ),
  			'section' => 'color_section_goto_top',
  			),
  		'color_goto_top_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_goto_top',
  			),
  		'color_goto_top_background_hover' => array(
  			'label'   => __( 'Background Hover Color', 'education-hub' ),
  			'section' => 'color_section_goto_top',
  			),

		// Pagination.
  		'color_pagination_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_pagination',
  			),
  		'color_pagination_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_pagination',
  			),
  		'color_pagination_link_background' => array(
  			'label'   => __( 'Link Background Color', 'education-hub' ),
  			'section' => 'color_section_pagination',
  			),
  		'color_pagination_link_background_hover' => array(
  			'label'   => __( 'Link Background Hover Color', 'education-hub' ),
  			'section' => 'color_section_pagination',
  			),

		// Breadcrumb.
  		'color_breadcrumb_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_breadcrumb',
  			),
  		'color_breadcrumb_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_breadcrumb',
  			),
  		'color_breadcrumb_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_breadcrumb',
  			),
  		'color_breadcrumb_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_breadcrumb',
  			),

		// Footer Widgets.
  		'color_footer_widgets_background' => array(
  			'label'   => __( 'Background Color', 'education-hub' ),
  			'section' => 'color_section_footer_widgets',
  			),
  		'color_footer_widgets_title' => array(
  			'label'   => __( 'Title Color', 'education-hub' ),
  			'section' => 'color_section_footer_widgets',
  			),
  		'color_footer_widgets_text' => array(
  			'label'   => __( 'Text Color', 'education-hub' ),
  			'section' => 'color_section_footer_widgets',
  			),
  		'color_footer_widgets_link' => array(
  			'label'   => __( 'Link Color', 'education-hub' ),
  			'section' => 'color_section_footer_widgets',
  			),
  		'color_footer_widgets_link_hover' => array(
  			'label'   => __( 'Link Hover Color', 'education-hub' ),
  			'section' => 'color_section_footer_widgets',
  			),
  		'color_footer_widgets_list_icon' => array(
  			'label'   => __( 'List Icon Color', 'education-hub' ),
  			'section' => 'color_section_footer_widgets',
  			),
  		'color_footer_widgets_top_border' => array(
  			'label'   => __( 'Top Border Color', 'education-hub' ),
  			'section' => 'color_section_footer_widgets',
  			),


  		);

    return $choices;

  }

endif;

if( ! function_exists( 'education_hub_get_color_sections_options' ) ) :

  /**
   * Returns color sections options.
   *
   * @since 1.0.0
   */
	function education_hub_get_color_sections_options(){

		$choices = array(
			'color_section_basic' => array(
				'label' => __( 'Basic Color Options', 'education-hub' ),
				),
			'color_section_header' => array(
				'label' => __( 'Header Color Options', 'education-hub' ),
				),
			'color_section_header_top' => array(
				'label' => __( 'Header Top Color Options', 'education-hub' ),
				),
			'color_section_quick_links' => array(
				'label' => __( 'Quick Links Color Options', 'education-hub' ),
				),
			'color_section_primary_menu' => array(
				'label' => __( 'Primary Menu Color Options', 'education-hub' ),
				),
			'color_section_slider' => array(
				'label' => __( 'Slider Color Options', 'education-hub' ),
				),
			'color_section_featured_content' => array(
				'label' => __( 'Featured Content Color Options', 'education-hub' ),
				),
			'color_section_content' => array(
				'label' => __( 'Content Color Options', 'education-hub' ),
				),
			'color_section_home_widgets' => array(
				'label' => __( 'Home Page Widgets Color Options', 'education-hub' ),
				),
			'color_section_news_events' => array(
				'label' => __( 'News Events Color Options', 'education-hub' ),
				),
			'color_section_sidebar' => array(
				'label' => __( 'Sidebar Color Options', 'education-hub' ),
				),
			'color_section_breadcrumb' => array(
				'label' => __( 'Breadcrumb Color Options', 'education-hub' ),
				),
			'color_section_goto_top' => array(
				'label' => __( 'Go To Top Color Options', 'education-hub' ),
				),
			'color_section_pagination' => array(
				'label' => __( 'Pagination Color Options', 'education-hub' ),
				),
			'color_section_footer_widgets' => array(
				'label' => __( 'Footer Widgets Color Options', 'education-hub' ),
				),
			'color_section_footer_area' => array(
				'label' => __( 'Footer Area Color Options', 'education-hub' ),
				),
			);
		return $choices;
	}

endif;
