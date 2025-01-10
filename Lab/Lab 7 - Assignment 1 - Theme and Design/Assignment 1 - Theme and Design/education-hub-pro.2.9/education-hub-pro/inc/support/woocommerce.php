<?php
/**
 * WooCommerce support class.
 *
 * @package Education_Hub
 */

/**
 * Woocommerce support class.
 *
 * @since 1.0.0
 */
class Education_Hub_Woocommerce{

  /**
   * Construcor.
   *
   * @since 1.0.0
   */
  function __construct() {

    $this->setup();
    $this->init();

  }

  /**
   * Initial setup.
   *
   * @since 1.0.0
   *
   */
  function setup(){
  }
  /**
   * Initialize hooks.
   *
   * @since 1.0.0
   *
   */
  function init() {

    // Register widgets.
    add_action( 'widgets_init', array( $this, 'register_woo_sidebars' ) );

    // Wrapper.
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    add_action('woocommerce_before_main_content', array( $this, 'woo_wrapper_start' ), 10);
    add_action('woocommerce_after_main_content', array( $this, 'woo_wrapper_end' ), 10);

    // Breadcrumb.
    add_filter( 'woocommerce_breadcrumb_defaults', array( $this, 'custom_woocommerce_breadcrumbs_defaults' ) );
    add_action( 'wp', array( $this, 'hooking_woo' ) );

    // Sidebar.
    add_action( 'woocommerce_sidebar', array( $this, 'add_secondary_sidebar' ), 11 );

    // Sidebar filter.
    add_filter( 'education_hub_filter_default_sidebar_id', array( $this, 'sidebar_defaults' ), 10, 2 );

    // Customizer options.
    add_action( 'customize_register', array( $this, 'customizer_fields' ) );

    // Add default options.
    add_filter( 'education_hub_filter_default_theme_options', array( $this, 'default_options' ) );

    // Modify global layout.
    add_filter( 'education_hub_filter_theme_global_layout', array( $this, 'modify_global_layout' ), 15 );

  }

  function default_options( $input ){

		$input['woo_page_layout']       = 'right-sidebar';
		$input['woo_sidebar_primary']   = '';
		$input['woo_sidebar_secondary'] = '';

  	return $input;
  }

  /**
   * Hooking Woocommerce.
   *
   * @since 1.0.0
   */
  function hooking_woo(){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    if ( 'disabled' !== education_hub_get_option('breadcrumb_type') && is_woocommerce() ) {
      add_action( 'education_hub_action_before_content', 'woocommerce_breadcrumb', 7 );
      remove_action( 'education_hub_action_before_content', 'education_hub_add_breadcrumb', 7 );
    }

    // Fixing primary sidebar.
    $global_layout = education_hub_get_option( 'global_layout' );
    $global_layout = apply_filters( 'education_hub_filter_theme_global_layout', $global_layout );
    if ( in_array( $global_layout, array( 'no-sidebar', 'no-sidebar-centered' ) ) ) {
      remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }

  }

  /**
   * Modify global layout.
   *
   * @since 1.0.0
   */
  function modify_global_layout( $layout ){

    $woo_page_layout = education_hub_get_option( 'woo_page_layout' );

    if ( is_woocommerce() && ! empty( $woo_page_layout ) ) {
      $layout = esc_attr( $woo_page_layout );
    }

    return $layout;

  }

  /**
   * Add extra customizer options for WooCommerce.
   *
   * @since 1.0.0
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
   */
  function customizer_fields( $wp_customize ){

  	$default = education_hub_get_default_theme_options();

  	// WooCommerce Section.
  	$wp_customize->add_section( 'section_theme_woocommerce',
  		array(
				'title'       => esc_html__( 'WooCommerce Options', 'education-hub' ),
				'description' => esc_html__( 'Settings specific to WooCommerce. Note: WooCommerce Page means shop page, product page and product archive page.', 'education-hub' ),
				'priority'    => 100,
				'capability'  => 'edit_theme_options',
				'panel'       => 'theme_option_panel',
  		)
  	);
  	// Setting - woo_page_layout.
  	$wp_customize->add_setting( 'theme_options[woo_page_layout]',
  		array(
  			'default'           => $default['woo_page_layout'],
  			'capability'        => 'edit_theme_options',
  			'sanitize_callback' => 'education_hub_sanitize_select',
  		)
  	);
  	$wp_customize->add_control( 'theme_options[woo_page_layout]',
  		array(
				'label'   => esc_html__( 'Content Layout', 'education-hub' ),
				'section' => 'section_theme_woocommerce',
				'type'    => 'select',
				'choices' => education_hub_get_global_layout_options(),
  		)
  	);
  	// Setting - woo_sidebar_primary.
  	$wp_customize->add_setting( 'theme_options[woo_sidebar_primary]',
  		array(
  			'default'           => $default['woo_sidebar_primary'],
  			'capability'        => 'edit_theme_options',
  			'sanitize_callback' => 'sanitize_key',
  		)
  	);
  	$wp_customize->add_control(
  		new Education_Hub_Dropdown_Sidebars_Control( $wp_customize, 'theme_options[woo_sidebar_primary]',
  			array(
  				'label'       => esc_html__( 'Primary Sidebar', 'education-hub' ),
  				'description' => esc_html__( 'Choose Primary Sidebar for WooCommerce pages. If not selected default sidebar will be displayed.', 'education-hub' ),
  				'section'  => 'section_theme_woocommerce',
  				'settings' => 'theme_options[woo_sidebar_primary]',
  			)
  		)
  	);
  	// Setting - woo_sidebar_secondary.
  	$wp_customize->add_setting( 'theme_options[woo_sidebar_secondary]',
  		array(
  			'default'           => $default['woo_sidebar_secondary'],
  			'capability'        => 'edit_theme_options',
  			'sanitize_callback' => 'sanitize_key',
  		)
  	);
  	$wp_customize->add_control(
  		new Education_Hub_Dropdown_Sidebars_Control( $wp_customize, 'theme_options[woo_sidebar_secondary]',
  			array(
  				'label'       => esc_html__( 'Secondary Sidebar', 'education-hub' ),
  				'description' => esc_html__( 'Choose Secondary Sidebar for WooCommerce pages. If not selected default sidebar will be displayed.', 'education-hub' ),
  				'section'  => 'section_theme_woocommerce',
  				'settings' => 'theme_options[woo_sidebar_secondary]',
  			)
  		)
  	);

  }

  /**
   * Register Woocommerce sidebars.
   *
   * @since 1.0.0
   */
  function register_woo_sidebars(){

    register_sidebar( array(
      'name'          => __( 'WooCommerce Primary', 'education-hub' ),
      'id'            => 'sidebar-woocommerce-primary',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
      'name'          => __( 'WooCommerce Secondary', 'education-hub' ),
      'id'            => 'sidebar-woocommerce-secondary',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );

  }

  /**
   * Add secondary sidebar in Woocommerce.
   *
   * @since 1.0.0
   */
  function add_secondary_sidebar(){

    $global_layout = education_hub_get_option( 'global_layout' );
    $global_layout = apply_filters( 'education_hub_filter_theme_global_layout', $global_layout );

    switch ( $global_layout ) {
      case 'three-columns':
      case 'three-columns-pcs':
      case 'three-columns-cps':
      case 'three-columns-psc':
      case 'three-columns-pcs-equal':
      case 'three-columns-scp-equal':
        get_sidebar( 'secondary' );
        break;

      default:
        break;
    }

  }

  /**
   * Woocommerce content wrapper start.
   *
   * @since 1.0.0
   */
  function woo_wrapper_start() {
    echo '<div id="primary">';
    echo '<main role="main" class="site-main" id="main">';
  }

  /**
   * Woocommerce content wrapper end.
   *
   * @since 1.0.0
   */
  function woo_wrapper_end() {
    echo '</main><!-- #main -->';
    echo '</div><!-- #primary -->';
  }

  /**
   * Woocommerce breadcrumb defaults
   *
   * @since 1.0.0
   */
  function custom_woocommerce_breadcrumbs_defaults() {

    return array(
      'delimiter'   => ' &gt; ',
      'wrap_before' => '<div id="breadcrumb" itemprop="breadcrumb"><div class="container"><div id="crumbs">',
      'wrap_after'  => '</div></div></div>',
      'before'      => '',
      'after'       => '',
      'home'        => get_bloginfo( 'name', 'display' ),
    );
  }

  /**
   * Modify woo sidebar id defaults.
   *
   * @param  string $id       Sidebar ID.
   * @param  string $location Sidebar position.
   * @return string           Modified default sidebar id.
   */
  function sidebar_defaults( $id, $location ){
  	if ( ! is_woocommerce() ) {
  		return $id;
  	}
    switch ( $location ) {
      case 'primary':
        $woo_sidebar_primary = education_hub_get_option( 'woo_sidebar_primary' );
        if ( ! empty( $woo_sidebar_primary ) ) {
          $id = esc_attr( $woo_sidebar_primary );
        }
        break;
      case 'secondary':
        $woo_sidebar_secondary = education_hub_get_option( 'woo_sidebar_secondary' );
        if ( ! empty( $woo_sidebar_secondary ) ) {
          $id = esc_attr( $woo_sidebar_secondary );
        }
        break;

      default:
        break;
    }
    return $id;

  }




} // End class.


// Initialize.
$education_hub_woocommerce = new Education_Hub_Woocommerce();
