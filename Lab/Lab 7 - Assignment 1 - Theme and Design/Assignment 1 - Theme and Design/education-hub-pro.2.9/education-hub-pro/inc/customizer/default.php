<?php
/**
 * Default theme options.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function education_hub_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['site_logo']                  = '';
		$defaults['move_logo_after_title']      = false;
		$defaults['show_title']                 = true;
		$defaults['show_tagline']               = true;
		$defaults['contact_number']             = '234-235-5678';
		$defaults['contact_email']              = 'demo@wenthemes.com';
		$defaults['show_notice']                = true;
		$defaults['notice_type']                = 'featured-category';
		$defaults['notice_title']               = esc_html__( 'Notice:', 'education-hub' );
		$defaults['notice_link_text']           = esc_html__( 'Welcome to our university!', 'education-hub' );
		$defaults['notice_link_url']            = '#';
		$defaults['notice_category']            = 0;
		$defaults['notice_number']              = 3;
		$defaults['show_social_in_header']      = false;
		$defaults['show_quick_links']           = true;
		$defaults['quick_links_text']           = esc_html__( 'Quick Links', 'education-hub' );
		$defaults['enable_sticky_primary_menu'] = false;
		$defaults['show_search_form']           = true;

		// Search.
		$defaults['search_placeholder'] = esc_html__( 'Search...', 'education-hub' );

		// Layout.
		$defaults['site_layout']             = 'fluid';
		$defaults['global_layout']           = 'right-sidebar';
		$defaults['archive_layout']          = 'excerpt';
		$defaults['archive_image']           = 'large';
		$defaults['archive_image_alignment'] = 'center';
		$defaults['single_image']            = 'large';
		$defaults['single_image_alignment']  = 'center';

		// Home page.
		$defaults['home_content_status']        = true;
		$defaults['home_news_section_status']   = true;
		$defaults['home_news_section_title']    = esc_html__( 'News', 'education-hub' );
		$defaults['home_news_category']         = 0;
		$defaults['home_news_number']           = 2;
		$defaults['home_news_excerpt_length']   = 15;
		$defaults['home_news_read_more_text']   = esc_html__( 'Read More', 'education-hub' );
		$defaults['home_events_section_status'] = true;
		$defaults['home_events_section_title']  = esc_html__( 'Events', 'education-hub' );
		$defaults['home_events_category']       = 0;
		$defaults['home_events_number']         = 3;
		$defaults['home_events_excerpt_length'] = 10;

		// Pagination.
		$defaults['pagination_type'] = 'default';

		// Content Meta.
		$defaults['show_meta_date']       = true;
		$defaults['show_meta_author']     = true;
		$defaults['show_meta_categories'] = true;
		$defaults['show_meta_tags']       = true;
		$defaults['show_meta_comment']    = true;

		// Footer.
		$defaults['copyright_text']       = esc_html__( 'Copyright &copy; [the-year] [the-site-link]. All rights reserved.', 'education-hub' );
		$defaults['powered_by_text']      = esc_html__( 'Education Hub Pro by ', 'education-hub' ) . '<a target="_blank" rel="designer" href="https://wenthemes.com/">WEN Themes</a>';
		$defaults['reset_footer_content'] = false;
		$defaults['go_to_top']            = true;

		// Blog.
		$defaults['excerpt_length']     = 40;
		$defaults['read_more_text']     = esc_html__( 'Read More ...', 'education-hub' );
		$defaults['exclude_categories'] = '';

		// Author Bio.
		$defaults['author_bio_in_single']           = true;
		$defaults['author_bio_show_recent_posts']   = false;
		$defaults['author_bio_recent_posts_number'] = 3;

		// Breadcrumb.
		$defaults['breadcrumb_type']      = 'disabled';
		$defaults['breadcrumb_separator'] = '&gt;';

		// Advanced.
		$defaults['custom_css'] = '';

		// Slider Options.
		$defaults['featured_slider_status']              = 'home-page';
		$defaults['featured_slider_transition_effect']   = 'fadeout';
		$defaults['featured_slider_transition_delay']    = 3;
		$defaults['featured_slider_transition_duration'] = 1;
		$defaults['featured_slider_enable_caption']      = true;
		$defaults['featured_slider_enable_arrow']        = true;
		$defaults['featured_slider_enable_pager']        = true;
		$defaults['featured_slider_enable_autoplay']     = true;
		$defaults['featured_slider_type']                = 'featured-category';
		$defaults['featured_slider_number']              = 3;
		$defaults['featured_slider_category']            = '';
		$defaults['featured_slider_tag']                 = '';

		// Featured Content Options.
		$defaults['featured_content_status'] = 'home-page';
		$defaults['featured_content_number'] = 3;
		$defaults['featured_content_type']   = 'demo-content';

		// Font.
		$font_keys = education_hub_get_font_family_theme_settings_options();
		if ( ! empty( $font_keys ) ) {
			foreach ( $font_keys as $k => $v ) {
			  $defaults[ $k ]  = $v['default'];
			}
		}
		$defaults['reset_font_settings'] = false;

		// Color.
		$colors = education_hub_get_default_colors();
		if ( ! empty( $colors ) ) {
		  foreach ( $colors as $key => $val ) {
		    $defaults[$key] = $val;
		  }
		}

		// Pass through filter.
		$defaults = apply_filters( 'education_hub_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
