<?php
/**
 * Color Options.
 *
 * @package Education_Hub
 */

$color_sections = education_hub_get_color_sections_options();
if ( empty( $color_sections ) ) {
	return;
}

$color_fields = education_hub_get_color_theme_settings_options();
if ( empty( $color_fields ) ) {
	return;
}

// Default values.
$default = education_hub_get_default_theme_options();

// Add Color Options Panel.
$wp_customize->add_panel( 'theme_color_panel',
	array(
		'title'      => esc_html__( 'Color Options', 'education-hub' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
	)
);

// Add sections.
$pr = 1;
foreach ($color_sections as $section_id => $section ) {

  $wp_customize->add_section( $section_id,
  	array(
  		'title'      => $section['label'],
  		'priority'   => $pr,
  		'capability' => 'edit_theme_options',
  		'panel'      => 'theme_color_panel',
  	)
  );
  $pr++;

}

// Add color fields.
foreach ( $color_fields as $field_id => $field ) {
  $wp_customize->add_setting( 'theme_options[' . $field_id . ']',
  	array(
  		'default'           => $default[ $field_id ],
  		'capability'        => 'edit_theme_options',
  		'sanitize_callback' => 'esc_attr',
  	)
  );
  $wp_customize->add_control(
  	new WP_Customize_Color_Control( $wp_customize, 'theme_options[' . $field_id . ']',
  		array(
  			'label'    => $field['label'],
  			'section'  => $field['section'],
  			'settings' => 'theme_options[' . $field_id . ']',
  		)
  	)
  );

}

// Reset color Section.
$wp_customize->add_section( 'section_reset_color_options',
	array(
		'title'       => esc_html__( 'Reset Color Options', 'education-hub' ),
		'description' => esc_html__( 'Caution: All color settings will be reset to default. Refresh the page after save to view full effects.', 'education-hub' ),
		'priority'    => 110,
		'capability'  => 'edit_theme_options',
		'panel'       => 'theme_color_panel',
	)
);
// Setting - reset_color_settings.
$wp_customize->add_setting( 'theme_options[reset_color_settings]',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[reset_color_settings]',
	array(
		'label'       => esc_html__( 'Reset Color Settings', 'education-hub' ),
		'section'     => 'section_reset_color_options',
		'type'        => 'checkbox',
		'priority'    => 110,
	)
);
