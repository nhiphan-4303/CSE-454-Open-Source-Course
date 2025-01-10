<?php
/**
 * CSS related functions.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package education_hub
 */

if ( ! function_exists( 'education_hub_trigger_custom_css_action' ) ) :

	/**
	 * Do action theme custom CSS.
	 *
	 * @since 1.0.0
	 */
	function education_hub_trigger_custom_css_action() {

		do_action( 'education_hub_action_theme_custom_css' );

	}

endif;

add_action( 'wp_head', 'education_hub_trigger_custom_css_action', 99 );



if ( ! function_exists( 'education_hub_add_theme_custom_font_css' ) ) :

	/**
	 * Inject theme custom font CSS.
	 *
	 * @since 1.0.0
	 */
	function education_hub_add_theme_custom_font_css() {

		$custom_css = '';

		$font_settings = education_hub_get_font_family_theme_settings_options();

		$required_fonts = array();

		if ( ! empty( $font_settings ) ) {
			foreach ( $font_settings as $key => $val ) {
				$option_value = education_hub_get_option( $key );
				if ( ! empty( $option_value ) && $val['default'] !== $option_value ) {
					$required_fonts[ $key ] = $option_value;
				}
			}
		}
		if ( empty( $required_fonts ) ) {
			// We do not need extra CSS.
			return;
		}

		foreach ( $required_fonts as $key => $font ) {

			$family = education_hub_get_font_family_from_key( $font );

			if ( ! empty( $family ) ) {

				switch ( $key ) {
					case 'font_site_default':
						$custom_css .= 'body{font-family:' . $family . '}' . "\n";
					break;

					case 'font_site_title':
						$custom_css .= '.site-title{font-family:' . $family . '}' . "\n";
					break;

					case 'font_site_tagline':
						$custom_css .= '.site-description{font-family:' . $family . '}' . "\n";
					break;

					case 'font_heading_tags':
						$custom_css .= 'h1,h2,h3,h4,h5,h6{font-family:' . $family . '}' . "\n";
					break;

					case 'font_content_title':
						$custom_css .= '.entry-header .entry-title{font-family:' . $family . '}' . "\n";
					break;

					case 'font_content_body':
						$custom_css .= '#content,#content p{font-family:' . $family . '}' . "\n";
					break;

					case 'font_navigation':
						$custom_css .= '#site-navigation ul li a,#secondary-navigation ul li a{font-family:' . $family . '}' . "\n";
					break;

					default:
					break;
				}
			}
		}

		// Render style.
		if ( ! empty( $custom_css ) ) {
			echo '<style type="text/css">';
			echo $custom_css;
			echo '</style>';
		}

	}

endif;

add_action( 'education_hub_action_theme_custom_css', 'education_hub_add_theme_custom_font_css', 20 );

if ( ! function_exists( 'education_hub_add_theme_custom_color_css' ) ) :

	/**
	 * Inject theme custom color CSS.
	 *
	 * @since 1.0.0
	 */
	function education_hub_add_theme_custom_color_css() {

		$custom_css = '';

		$color_settings = education_hub_get_color_theme_settings_options();

		$default = education_hub_get_default_colors();

		$required_colors = array();

		if ( ! empty( $color_settings ) ) {
		  foreach ($color_settings as $key => $val ) {
		    $option_value = education_hub_get_option( $key );
		    if ( ! empty( $option_value ) && $default[$key] != $option_value ) {
		      $required_colors[ $key ] = $option_value;
		    }
		  }
		}
		if ( empty( $required_colors ) ) {
		  // We do not need extra CSS.
		  return;
		}

		foreach ( $required_colors as $key => $color ) {

			switch ( $key ){

				// Basic.
				case 'color_basic_background':
				  $custom_css .= 'body{background-color:' . $color . '}' . "\n";
				  $custom_css .= '#crumbs > span::before{border-left-color:' . $color . '}' . "\n";
				  break;
				case 'color_basic_text':
				  $custom_css .= 'body,p{color:' . $color . '}' . "\n";
				  break;
				case 'color_basic_link':
				  $custom_css .= 'a,a:visited{color:' . $color . '}' . "\n";
				  break;
				case 'color_basic_link_hover':
				  $custom_css .= 'a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_basic_heading':
				  $custom_css .= 'h1,h2,h3,h4,h5,h6{color:' . $color . '}' . "\n";
				  break;
				case 'color_basic_button_text':
				  $custom_css .= '.search-form .search-submit,.comment-reply-link,.nav-links a,a.cta-button-primary,button, input[type="button"], input[type="reset"], input[type="submit"],#infinite-handle span button, #infinite-handle span button{color:' . $color . '}' . "\n";
				  $custom_css .= '.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{color:' . $color . '}' . "\n";

				  break;

				case 'color_basic_button_text_hover':
				  $custom_css .= '.search-form .search-submit:hover,a.cta-button-primary:hover,.nav-links a:hover,.comment-reply-link:hover,button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span button:hover{color:' . $color . '}' . "\n";
				  $custom_css .= '.woocommerce #respond input#submit.alt:hover,a.comment-reply-link:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button.woocommerce:hover #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt[disabled]:disabled, .woocommerce #respond input#submit.alt[disabled]:disabled:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt[disabled]:disabled, .woocommerce a.button.alt[disabled]:disabled:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt[disabled]:disabled, .woocommerce input.button.alt[disabled]:disabled:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover:hover{color:' . $color . '}' . "\n";

				  break;
				case 'color_basic_button_background':
				  $custom_css .= '.search-form .search-submit,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{background-color:' . $color . '}' . "\n";
				  $custom_css .= 'a.cta-button-primary,.nav-links a,.comment-reply-link,button, input[type="button"], input[type="reset"], input[type="submit"],#infinite-handle span button{background-color:' . $color . '}' . "\n";

				  break;
				case 'color_basic_button_background_hover':
				  $custom_css .= '.search-form .search-submit:hover,a.cta-button-primary:hover,a.comment-reply-link:hover,.nav-links a:hover,.comment-reply-link:hover,button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover,#infinite-handle span button{background-color:' . $color . '}' . "\n";
				  $custom_css .= '.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button.woocommerce:hover #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt[disabled]:disabled, .woocommerce #respond input#submit.alt[disabled]:disabled:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt[disabled]:disabled, .woocommerce a.button.alt[disabled]:disabled:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt[disabled]:disabled, .woocommerce input.button.alt[disabled]:disabled:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover{background-color:' . $color . '}' . "\n";
				  break;

				// Header.
				case 'color_header_background':
				  $custom_css .= '#masthead {background-color:' . $color . '}' . "\n";
				  break;
				case 'color_header_title':
				  $custom_css .= '.site-title > a{color:' . $color . '}' . "\n";
				  break;
				case 'color_header_title_hover':
				  $custom_css .= '.site-title > a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_header_tagline':
				  $custom_css .= '.site-description{color:' . $color . '}' . "\n";
				  break;
				case 'color_header_title_border':
				  $custom_css .= '.site-title{color:' . $color . '}' . "\n";
				  break;
				case 'color_header_search_button_background':
				  $custom_css .= '.search-form input[type="submit"]{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_header_search_button_background_hover':
				  $custom_css .= '.search-form input[type="submit"]:hover{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_header_search_button_text':
				  $custom_css .= '.search-form input[type="submit"]{color:' . $color . '}' . "\n";
				  break;
				case 'color_header_search_button_text_hover':
				  $custom_css .= '.search-form input[type="submit"]:hover{color:' . $color . '}' . "\n";
				  break;

				// Header Top.
				case 'color_header_top_background':
					$custom_css .= '#tophead ,#tophead p{background-color:' . $color . '}' . "\n";
					break;
				case 'color_header_top_text':
					$custom_css .= '#tophead p, #quick-contact {color:' . $color . '}' . "\n";
					break;
				case 'color_header_top_link':
					$custom_css .= '#tophead #quick-contact a,#quick-contact .top-news a{color:' . $color . '}' . "\n";
					break;
				case 'color_header_top_link_hover':
					$custom_css .= '#tophead #quick-contact a:hover,#quick-contact li:hover a,#quick-contact .top-news a:hover{color:' . $color . '}' . "\n";
					break;
				case 'color_header_top_icon':
					$custom_css .= '#quick-contact li::before,.top-news-title::before{color:' . $color . '}' . "\n";
					break;

				// Quick Links.
				case 'color_quick_links_text':
					$custom_css .= '.quick-links a.links-btn {color:' . $color . '}' . "\n";
					break;
				case 'color_quick_links_button_icon':
					$custom_css .= '.quick-links a.links-btn::before {border-top-color:' . $color . '}' . "\n";
					break;
				case 'color_quick_links_button_background':
					$custom_css .= '.quick-links a.links-btn::after{background-color:' . $color . '}' . "\n";
					break;
				case 'color_quick_links_button_background_hover':
					$custom_css .= '.quick-links a.links-btn:hover::after{background-color:' . $color . '}' . "\n";
					break;
				case 'color_quick_links_link':
					$custom_css .= '.quick-links ul li a{color:' . $color . '}' . "\n";
					break;
				case 'color_quick_links_link_hover':
					$custom_css .= '.quick-links ul li a:hover{color:' . $color . '}' . "\n";
					break;
				case 'color_quick_links_link_background':
					$custom_css .= '.quick-links ul li a{background-color:' . $color . '}' . "\n";
					break;
				case 'color_quick_links_link_background_hover':
					$custom_css .= '.quick-links ul li a:hover{background-color:' . $color . '}' . "\n";
					break;

				// Featured Content.
				case 'color_featured_content_background':
				  $custom_css .= '#featured-content{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_featured_content_title_link':
				  $custom_css .= '#featured-content .entry-title a{color:' . $color . '}' . "\n";
				  break;
				case 'color_featured_content_title_link_hover':
				  $custom_css .= '#featured-content .entry-title a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_featured_content_text':
				  $custom_css .= '#featured-content ,#featured-content p{color:' . $color . '}' . "\n";
				  break;

				// Content.
				case 'color_content_background':
				  $custom_css .= '.site-content{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_content_title':
				  $custom_css .= '.site-content .entry-title a{color:' . $color . '}' . "\n";
				  break;
				case 'color_content_text':
				  $custom_css .= '.site-content p{color:' . $color . '}' . "\n";
				  break;
				case 'color_content_link':
				  $custom_css .= '.content-area a{color:' . $color . '}' . "\n";
				  break;
				case 'color_content_link_hover':
				  $custom_css .= '.content-area  a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_content_meta_link':
				  $custom_css .= '.content-area .entry-meta > span a,.content-area  .entry-footer > span a{color:' . $color . '}' . "\n";
				  break;
				case 'color_content_meta_link_hover':
				  $custom_css .= '.content-area .entry-meta > span a:hover,.content-area  .entry-footer > span a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_content_meta_icon':
				  $custom_css .= '.content-area .entry-meta > span::before,.content-area  .entry-footer > span::before{color:' . $color . '}' . "\n";
				  break;

				// Slider.
				case 'color_slider_caption_background':
				  $custom_css .= '#main-slider .cycle-caption{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_caption_text':
				  $custom_css .= '#main-slider ,#main-slider  p{color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_caption_link':
				  $custom_css .= '#main-slider a{color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_caption_link_hover':
				  $custom_css .= '#main-slider  a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_icon':
				  $custom_css .= '#main-slider .cycle-prev, #main-slider .cycle-next{color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_icon_hover':
				  $custom_css .= '#main-slider .cycle-prev:hover::after, #main-slider .cycle-next:hover::after{color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_icon_background':
				  $custom_css .= '#main-slider .cycle-prev::after, #main-slider .cycle-next::after{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_icon_background_hover':
				  $custom_css .= '#main-slider .cycle-prev:hover::after, #main-slider .cycle-next:hover::after{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_pager':
				  $custom_css .= '#main-slider .pager-box{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_slider_pager_active':
				  $custom_css .= '#main-slider .pager-box:hover,#main-slider .pager-box.cycle-pager-active{background-color:' . $color . '}' . "\n";
				  break;

				// Sidebar.
				case 'color_sidebar_title':
				  $custom_css .= '#sidebar-primary .widget-title, #sidebar-secondary .widget-title{color:' . $color . '}' . "\n";
				  break;
				case 'color_sidebar_title_background':
				  $custom_css .= '#sidebar-primary .widget-title, #sidebar-secondary .widget-title{background-color:' . $color . '}' . "\n";
				  $custom_css .= '#sidebar-primary .widget-title::after, #sidebar-secondary .widget-title::after{border-top-color:' . $color . '}' . "\n";
				  break;
				case 'color_sidebar_title_left_border':
				  $custom_css .= '#sidebar-primary .widget-title, #sidebar-secondary .widget-title{border-color:' . $color . '}' . "\n";
				  break;
				case 'color_sidebar_text':
				  $custom_css .= '#sidebar-primary,#sidebar-secondary{color:' . $color . '}' . "\n";
				  break;
				case 'color_sidebar_link':
				  $custom_css .= '#sidebar-primary a,#sidebar-secondary  a{color:' . $color . '}' . "\n";
				  break;
				case 'color_sidebar_link_hover':
				  $custom_css .= '#sidebar-primary a:hover,#sidebar-secondary a:hover {color:' . $color . '}' . "\n";
				  break;
				case 'color_sidebar_list_icon':
				  $custom_css .= '.widget-area ul li::before{color:' . $color . '}' . "\n";
				  break;

				// Home Page Widgets.
				case 'color_home_widgets_area_background':
				  $custom_css .= '#sidebar-front-page-widget-area,#sidebar-front-page-widget-area-lower{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_home_widgets_title':
				  $custom_css .= '#sidebar-front-page-widget-area .widget-title,#sidebar-front-page-widget-area-lower .widget-title{color:' . $color . '}' . "\n";
				  break;
				case 'color_home_widgets_text':
				  $custom_css .= '#sidebar-front-page-widget-area p,#sidebar-front-page-widget-area-lower p{color:' . $color . '}' . "\n";
				  break;
				case 'color_home_widgets_link':
				  $custom_css .= '#sidebar-front-page-widget-area a,#sidebar-front-page-widget-area-lower a,.education_hub_widget_testimonial_slider .cycle-prev::after, .education_hub_widget_testimonial_slider .cycle-next::after{color:' . $color . '}' . "\n";
				  break;
				case 'color_home_widgets_link_hover':
				  $custom_css .= '#sidebar-front-page-widget-area a:hover,#sidebar-front-page-widget-area-lower a:hover,.education_hub_widget_testimonial_slider .cycle-prev:hover::after,
.education_hub_widget_testimonial_slider .cycle-next:hover::after{color:' . $color . '}' . "\n";
				  break;

				// News Events.
				case 'color_news_events_background':
					$custom_css .= '#featured-news-events{background-color:' . $color . '}' . "\n";
					break;
				case 'color_news_events_section_title':
					$custom_css .= '#featured-news-events h2{color:' . $color . '}' . "\n";
					break;
				case 'color_news_events_item_background':
					$custom_css .= '.news-content,.event-post{background-color:' . $color . '}' . "\n";
					break;
				case 'color_news_events_item_title':
					$custom_css .= '#featured-news-events h3 a{color:' . $color . '}' . "\n";
					break;
				case 'color_news_events_item_title_hover':
					$custom_css .= '#featured-news-events h3 a:hover{color:' . $color . '}' . "\n";
					break;
				case 'color_news_events_item_text':
					$custom_css .= '#featured-news-events p{color:' . $color . '}' . "\n";
					break;
				case 'color_news_events_item_link':
					$custom_css .= '#featured-news-events a{color:' . $color . '}' . "\n";
					break;
				case 'color_news_events_item_link_hover':
					$custom_css .= '#featured-news-events a:hover{color:' . $color . '}' . "\n";
					break;
				case 'color_news_events_news_separator':
					$custom_css .= '.news-content{border-color:' . $color . '}' . "\n";
					break;

				// Footer area.
				case 'color_footer_area_background':
				  $custom_css .= '#colophon{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_area_text':
				  $custom_css .= '#colophon p,#colophon{color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_area_link':
				  $custom_css .= '#colophon a{color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_area_link_hover':
				  $custom_css .= '#colophon a:hover{color:' . $color . '}' . "\n";
				  break;

				// Go To Top.
			    case 'color_goto_top_icon':
				  $custom_css .= '#btn-scrollup i.fa{color:' . $color . '}' . "\n";
				  break;
				case 'color_goto_top_icon_hover':
				  $custom_css .= '#btn-scrollup i.fa:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_goto_top_background':
				  $custom_css .= '#btn-scrollup{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_goto_top_background_hover':
				  $custom_css .= '#btn-scrollup:hover{background-color:' . $color . '}' . "\n";
				  break;


				// Pagination.
				case 'color_pagination_link':
				  $custom_css .= '.pagination .nav-links > a, .pagination .nav-links > span, .wp-pagenavi a, .wp-pagenavi span{color:' . $color . '}' . "\n";
				  break;
				case 'color_pagination_link_hover':
				  $custom_css .= '.pagination .nav-links > span.current, .pagination .nav-links > a:hover, .wp-pagenavi span.current, .wp-pagenavi a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_pagination_link_background':
				  $custom_css .= '.pagination .nav-links > a, .pagination .nav-links > span, .wp-pagenavi a, .wp-pagenavi span{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_pagination_link_background_hover':
				  $custom_css .= '.pagination .nav-links > span.current, .pagination .nav-links > a:hover, .wp-pagenavi span.current, .wp-pagenavi a:hover{background-color:' . $color . '}' . "\n";
				  break;

				// Breadcrumb.
				case 'color_breadcrumb_background':
				  $custom_css .= '#breadcrumb{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_breadcrumb_link':
				  $custom_css .= '#crumbs a,#breadcrumb a{color:' . $color . '}' . "\n";
				  break;
				case 'color_breadcrumb_link_hover':
				  $custom_css .= '#crumbs a:hover,#breadcrumb a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_breadcrumb_text':
				  $custom_css .= '#breadcrumb{color:' . $color . '}' . "\n";
				  break;

				// Footer Widgets.
				case 'color_footer_widgets_background':
				  $custom_css .= '#footer-widgets{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_widgets_title':
				  $custom_css .= '#footer-widgets .widget-title{color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_widgets_text':
				  $custom_css .= '#footer-widgets p,#footer-widgets {color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_widgets_link':
				  $custom_css .= '#footer-widgets a{color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_widgets_link_hover':
				  $custom_css .= '#footer-widgets a:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_widgets_list_icon':
				  $custom_css .= '#footer-widgets ul li::before{color:' . $color . '}' . "\n";
				  break;
				case 'color_footer_widgets_top_border':
				  $custom_css .= '#footer-widgets{border-color:' . $color . '}' . "\n";
				  break;

				// Primary Menu.
				case 'color_primary_menu_main_background':
				  $custom_css .= '#main-nav,#main-nav ul ul,.menu-toggle,.main-navigation ul{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_primary_menu_link':
				  $custom_css .= '#main-nav ul li a,.dropdown-toggle::after,.menu-toggle{color:' . $color . '}' . "\n";
				  break;

				case 'color_primary_menu_link_hover':
				  $custom_css .= '#main-nav ul li a:hover,#main-nav li.current-menu-item > a,
				  #main-nav li.current_page_item > a,#main-nav ul li:hover > a,.menu-toggle:hover{color:' . $color . '}' . "\n";
				  break;
				case 'color_primary_menu_link_background':
				  $custom_css .= '#main-nav ul li a{background-color:' . $color . '}' . "\n";
				  break;
				case 'color_primary_menu_link_background_hover':
				  $custom_css .= '#main-nav ul li a:hover,#main-nav ul li:hover > a, #main-nav li.current-menu-item > a,
				  #main-nav li.current_page_item > a,.menu-toggle:hover{background-color:' . $color . '}' . "\n";
				  $custom_css .= '#main-nav{border-color:' . $color . '}' . "\n";
				  break;

			  default:
			    break;

			}

		}

		// Render style.
		if ( ! empty( $custom_css ) ) {
		  echo '<style type="text/css">';
		  echo $custom_css;
		  echo '</style>';
		}

	}

endif;

add_action( 'education_hub_action_theme_custom_css', 'education_hub_add_theme_custom_color_css', 25 );
