<?php
/**
 * Theme widgets.
 *
 * @package Education_Hub
 */

// Load widget base.
require_once get_template_directory() . '/lib/widget-base/class-widget-base.php';

if ( ! function_exists( 'education_hub_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function education_hub_load_widgets() {

		// Social widget.
		register_widget( 'Education_Hub_Social_Widget' );

		// Call To Action widget.
		register_widget( 'Education_Hub_Call_To_Action_Widget' );

		// Featured Page widget.
		register_widget( 'Education_Hub_Featured_Page_Widget' );

		// Testimonial Slider widget.
		register_widget( 'Education_Hub_Testimonial_Slider_Widget' );

		// Teams widget.
		register_widget( 'Education_Hub_Teams_Widget' );

	}

endif;

add_action( 'widgets_init', 'education_hub_load_widgets' );

if ( ! class_exists( 'Education_Hub_Social_Widget' ) ) :

	/**
	 * Social widget Class.
	 *
	 * @since 1.0.0
	 */
	class Education_Hub_Social_Widget extends Education_Hub_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'education_hub_widget_social',
				'description'                 => __( 'Displays social icons.', 'education-hub' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'education-hub' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				);

			if ( false === has_nav_menu( 'social' ) ) {
				$fields['message'] = array(
					'label' => __( 'Social menu is not set. Please create menu and assign it to Social Menu.', 'education-hub' ),
					'type'  => 'message',
					'class' => 'widefat',
					);
			}

			parent::__construct( 'education-hub-social', __( 'EH: Social', 'education-hub' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			if ( has_nav_menu( 'social' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'social',
					'container'      => false,
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
			}

			echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Education_Hub_Call_To_Action_Widget' ) ) :

	/**
	 * Call to action widget Class.
	 *
	 * @since 1.0.0
	 */
	class Education_Hub_Call_To_Action_Widget extends Education_Hub_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'education_hub_widget_call_to_action',
				'description'                 => __( 'Call To Action Widget', 'education-hub' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'education-hub' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'text' => array(
					'label' => __( 'Text:', 'education-hub' ),
					'type'  => 'textarea',
					'class' => 'widefat',
					),
				'filter' => array(
					'label' => __( 'Automatically add paragraphs', 'education-hub' ),
					'type'  => 'checkbox',
					),
				'primary_button_text' => array(
					'label'   => __( 'Button Text:', 'education-hub' ),
					'default' => __( 'Learn more', 'education-hub' ),
					'type'    => 'text',
					'class'   => 'widefat',
					),
				'primary_button_url' => array(
					'label' => __( 'Button URL:', 'education-hub' ),
					'type'  => 'url',
					'class' => 'widefat',
					),
				'open_url_in_new_window' => array(
					'label' => __( 'Open URL in New Window', 'education-hub' ),
					'type'  => 'checkbox',
					),
				);

			parent::__construct( 'education-hub-call-to-action', __( 'EH: Call To Action', 'education-hub' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			?>
			<div class="call-to-action-content">
				<?php echo ! empty( $params['filter'] ) ? wp_kses_post( wpautop( $params['text'] ) ) : $params['text']; ?>
			</div><!-- .call-to-action-content -->
			<div class="call-to-action-buttons">
				<?php
				$target_text = '';
				if ( $params['open_url_in_new_window'] ) {
					$target_text = ' target="_blank" ';
				}
				?>
				<?php if ( ! empty( $params['primary_button_text'] ) ) : ?>
					<a href="<?php echo esc_url( $params['primary_button_url'] ); ?>" <?php echo $target_text; ?> class="cta-button-primary"><?php echo esc_html( $params['primary_button_text'] ); ?></a>
				<?php endif; ?>
			</div><!-- .call-to-action-buttons -->
			<?php
			echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Education_Hub_Featured_Page_Widget' ) ) :

	/**
	 * Featured page widget Class.
	 *
	 * @since 1.0.0
	 */
	class Education_Hub_Featured_Page_Widget extends Education_Hub_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'education_hub_widget_featured_page',
				'description'                 => __( 'Displays single featured Page or Post.', 'education-hub' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'education-hub' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'use_page_title' => array(
					'label'   => __( 'Use Page/Post Title as Widget Title', 'education-hub' ),
					'type'    => 'checkbox',
					'default' => true,
					),
				'featured_page' => array(
					'label'            => __( 'Select Page:', 'education-hub' ),
					'type'             => 'dropdown-pages',
					'show_option_none' => __( '&mdash; Select &mdash;', 'education-hub' ),
					),
				'id_message' => array(
					'label'            => '<strong>' . _x( 'OR', 'Featured Page Widget', 'education-hub' ) . '</strong>',
					'type'             => 'message',
					),
				'featured_post' => array(
					'label'             => __( 'Post ID:', 'education-hub' ),
					'placeholder'       => __( 'Eg: 1234', 'education-hub' ),
					'type'              => 'text',
					'sanitize_callback' => 'education_hub_widget_sanitize_post_id',
					),
				'content_type' => array(
					'label'   => __( 'Show Content:', 'education-hub' ),
					'type'    => 'select',
					'default' => 'full',
					'options' => array(
						'short' => __( 'Short', 'education-hub' ),
						'full'  => __( 'Full', 'education-hub' ),
						),
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'education-hub' ),
					'description' => __( 'Applies when Short is selected in Content option.', 'education-hub' ),
					'type'        => 'number',
					'css'         => 'max-width:60px;',
					'default'     => 40,
					'min'         => 1,
					'max'         => 400,
					),
				'featured_image' => array(
					'label'   => __( 'Featured Image:', 'education-hub' ),
					'type'    => 'select',
					'default' => 'disable',
					'options' => education_hub_get_image_sizes_options(),
					),
				'featured_image_alignment' => array(
					'label'   => __( 'Image Alignment:', 'education-hub' ),
					'type'    => 'select',
					'default' => 'center',
					'options' => education_hub_get_image_alignment_options(),
					),
				);

			parent::__construct( 'education-hub-featured-page', __( 'EH: Featured Page', 'education-hub' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			// ID validation.
			$our_post_object = null;
			$our_id = '';
			if ( absint( $params['featured_post'] ) > 0 ) {
				$our_id = absint( $params['featured_post'] );
			}
			if ( absint( $params['featured_page'] ) > 0 ) {
				$our_id = absint( $params['featured_page'] );
			}
			if ( absint( $our_id ) > 0 ) {
				$raw_object = get_post( $our_id );
				if ( ! in_array( $raw_object->post_type, array( 'attachment', 'nav_menu_item', 'revision' ) ) ) {
					$our_post_object = $raw_object;
				}
			}
			if ( ! $our_post_object ) {
				// No valid object; bail now!
				return;
			}


			echo $args['before_widget'];

			global $post;
			// Setup global post.
			$post = $our_post_object;
			setup_postdata( $post );

			// Override title if checkbox is enabled.
			if ( true === $params['use_page_title'] ) {
				$params['title'] = get_the_title( $post );
			}

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			?>
			<div class="featured-page-widget entry-content">
				<?php if ( 'disable' !== $params['featured_image'] && has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( esc_attr( $params['featured_image'] ), array( 'class' => 'align' . esc_attr( $params['featured_image_alignment'] ) ) ); ?>
				<?php endif; ?>
				<?php if ( 'short' === $params['content_type'] ) : ?>
					<?php
						$excerpt = education_hub_the_excerpt( absint( $params['excerpt_length'] ) );
						echo wp_kses_post( wpautop( $excerpt ) );
					?>
				<?php else : ?>
					<?php the_content(); ?>
				<?php endif; ?>
			</div><!-- .featured-page-widget entry-content -->
			<?php
			// Reset.
			wp_reset_postdata();

			echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Education_Hub_Testimonial_Slider_Widget' ) ) :

	/**
	 * Testimonial Slider widget Class.
	 *
	 * @since 1.0.0
	 */
	class Education_Hub_Testimonial_Slider_Widget extends Education_Hub_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'   => 'education_hub_widget_testimonial_slider',
				'description' => __( 'Displays Testimonials as a Slider.', 'education-hub' ),
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'education-hub' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'post_category' => array(
					'label'           => __( 'Select Category:', 'education-hub' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => __( 'All Categories', 'education-hub' ),
					),
				'post_number' => array(
					'label'   => __( 'Number of Posts:', 'education-hub' ),
					'type'    => 'number',
					'default' => 4,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'education-hub' ),
					'description' => __( 'in words', 'education-hub' ),
					'type'        => 'number',
					'adjacent'    => true,
					'default'     => 30,
					'css'         => 'max-width:60px;',
					'min'         => 1,
					'max'         => 500,
					),
				'slider_heading' => array(
					'label'   => __( 'SLIDER OPTIONS', 'education-hub' ),
					'type'    => 'heading',
					),
				'transition_delay' => array(
					'label'       => __( 'Transition Delay:', 'education-hub' ),
					'description' => __( 'in seconds', 'education-hub' ),
					'type'        => 'number',
					'default'     => 3,
					'css'         => 'max-width:50px;',
					'min'         => 1,
					'max'         => 10,
					'adjacent'    => true,
					),
				'enable_autoplay' => array(
					'label'   => __( 'Enable Autoplay', 'education-hub' ),
					'type'    => 'checkbox',
					'default' => true,
					),
				);

			parent::__construct( 'education-hub-testimonial-slider', __( 'EH: Testimonial Slider', 'education-hub' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			$testimonial_posts = $this->get_testimonials( $params );

			if ( ! empty( $testimonial_posts ) ) {
				$this->render_testimonials( $testimonial_posts, $params );
			}

			echo $args['after_widget'];

		}

		/**
		 * Return testimonial posts detail.
		 *
		 * @since 1.0.0
		 *
		 * @param array $params Parameters.
		 * @return array Posts details.
		 */
		function get_testimonials( $params ) {

			$output = array();

			$qargs = array(
				'posts_per_page' => esc_attr( $params['post_number'] ),
				'no_found_rows'  => true,
				);
			if ( absint( $params['post_category'] ) > 0  ) {
				$qargs['cat'] = absint( $params['post_category'] );
			}
			$all_posts = get_posts( $qargs );

			if ( ! empty( $all_posts ) ) {
				$cnt = 0;
				global $post;
				foreach ( $all_posts as $key => $post ) {

					setup_postdata( $post );

					$item = array();
					$item['title'] = get_the_title( $post->ID );
					$item['excerpt'] = education_hub_the_excerpt( $params['excerpt_length'], $post );
					$item['image'] = null;
					if ( has_post_thumbnail( $post->ID ) ) {
						$image_detail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
						if ( ! empty( $image_detail ) ) {
							$item['image'] = $image_detail;
						}
					}

					$output[ $cnt ] = $item;
					$cnt++;

				}
				wp_reset_postdata();
			}

			return $output;

		}

		/**
		 * Render testimonial slider.
		 *
		 * @since 1.0.0
		 *
		 * @param array $testimonials Testimonials.
		 * @param array $params Parameters.
		 * @return void
		 */
		function render_testimonials( $testimonials, $params ) {

			$timeout = 0;
			if ( true === $params['enable_autoplay'] ) {
				$timeout = 1000 * absint( $params['transition_delay'] );
			}
			?>
			<div class="cycle-slideshow"
				data-cycle-slides="> article"
				data-cycle-auto-height="container"
				data-cycle-timeout="<?php echo absint( $timeout ); ?>"
				>
				<!-- prev/next links -->
				<div class="cycle-prev"></div>
				<div class="cycle-next"></div>
				<?php foreach ( $testimonials as $testimonial ) : ?>
					<article>
						<?php if ( ! empty( $testimonial['image'] ) ) : ?>
							<img src="<?php echo esc_url( $testimonial['image'][0] ); ?>" />
						<?php endif; ?>
						<div class="testimonial-content-area">
						<?php if ( ! empty( $testimonial['excerpt'] ) ) : ?>
							<div class="testimonial-excerpt">
								<?php echo wp_kses_post( wpautop( $testimonial['excerpt'] ) ); ?>
							</div><!-- .testimonial-excerpt -->
						<?php endif; ?>
						<h4><?php echo esc_html( $testimonial['title'] ); ?></h4>
						</div> <!-- .testimonial-content-area -->
					</article>

				<?php endforeach; ?>

			</div><!-- .cycle-slideshow -->
			<?php

		}

	}
endif;

if ( ! class_exists( 'Education_Hub_Teams_Widget' ) ) :

	/**
	 * Teams widget Class.
	 *
	 * @since 1.0.0
	 */
	class Education_Hub_Teams_Widget extends Education_Hub_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'education_hub_widget_teams',
				'description'                 => __( 'Displays teams.', 'education-hub' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'education-hub' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'post_category' => array(
					'label'           => __( 'Select Category:', 'education-hub' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => __( 'All Categories', 'education-hub' ),
					),
				'post_number' => array(
					'label'   => __( 'Number of Posts:', 'education-hub' ),
					'type'    => 'number',
					'default' => 3,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'post_column' => array(
					'label'   => __( 'Number of Columns:', 'education-hub' ),
					'type'    => 'select',
					'default' => 3,
					'options' => education_hub_get_numbers_dropdown_options( 1, 4 ),
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'education-hub' ),
					'description' => __( 'in words', 'education-hub' ),
					'type'        => 'number',
					'css'         => 'max-width:60px;',
					'default'     => 15,
					'min'         => 1,
					'max'         => 400,
					'adjacent'    => true,
					),
				'disable_excerpt' => array(
					'label'   => __( 'Disable Excerpt', 'education-hub' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			parent::__construct( 'education-hub-teams', __( 'EH: Teams', 'education-hub' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );
			$args = $this->add_animation( $args, $params );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			$this->render_teams( $params );

			echo $args['after_widget'];

		}
		/**
		 * Render teams.
		 *
		 * @since 1.0.0
		 *
		 * @param array $params Parameters.
		 * @return void
		 */
		function render_teams( $params ) {

			$qargs = array(
				'posts_per_page' => esc_attr( $params['post_number'] ),
				'no_found_rows'  => true,
				'meta_key'       => '_thumbnail_id',
				);
			if ( absint( $params['post_category'] ) > 0  ) {
				$qargs['cat'] = absint( $params['post_category'] );
			}
			$all_posts = get_posts( $qargs );
			?>
			<?php if ( ! empty( $all_posts ) ) : ?>

				<?php global $post; ?>

				<div class="teams-widget teams-col-<?php echo esc_attr( $params['post_column'] ); ?>">
					<div class="inner-wrapper">
						<?php foreach ( $all_posts as $key => $post ) :  ?>
							<?php setup_postdata( $post ); ?>
							<div class="team-item">
							<?php if ( has_post_thumbnail() ) :  ?>
								<div class="thumb-summary-wrap">
									<div class="team-thumb">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'thumbnail' ); ?>
										</a>
									</div><!-- .team-thumb-->
									<div class="team-text-wrap">
										<h3 class="team-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<?php if ( true !== $params['disable_excerpt'] ) : ?>
											<div class="team-summary">
												<?php
												$summary = education_hub_the_excerpt( absint( $params['excerpt_length'] ), $post );
												echo wp_kses_post( wpautop( $summary ) );
												 ?>
											</div><!-- .team-summary -->
										<?php endif; ?>

									</div><!-- .team-text-wrap -->
								</div><!-- .thumb-summary-wrap-->

							<?php endif; ?>

							</div><!-- .team-item -->
						<?php endforeach; ?>

					</div><!-- .inner-wrapper -->
				</div><!-- .teams-widget -->

				<?php wp_reset_postdata(); // Reset. ?>

			<?php endif; ?>

			<?php

		}

	}
endif;
