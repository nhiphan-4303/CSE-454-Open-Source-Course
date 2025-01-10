<?php
/**
 * Font Family Options.
 *
 * @package Education_Hub
 */

$font_fields = array();

// Fetch font family keys.
$font_keys = education_hub_get_font_family_theme_settings_options();

if ( empty( $font_keys ) ) {
	return;
}

// Font Family Section.
$wp_customize->add_section( 'section_font_family',
	array(
		'title'      => esc_html__( 'Font Family Options', 'education-hub' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

foreach ( $font_keys as $key => $font ) {

	$wp_customize->add_setting( "theme_options[$key]",
		array(
			'default'           => esc_attr( $font['default'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'education_hub_sanitize_select',
		)
	);
	$wp_customize->add_control( "theme_options[$key]",
		array(
			'label'    => esc_html( $font['label'] ),
			'section'  => 'section_font_family',
			'type'     => 'select',
			'choices'  => education_hub_get_customizer_font_options(),
			'priority' => 100,
		)
	);

}

// Setting - reset_font_settings.
$wp_customize->add_setting( 'theme_options[reset_font_settings]',
	array(
		'default'           => $default['reset_font_settings'],
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[reset_font_settings]',
	array(
		'label'       => esc_html__( 'Reset Font Settings', 'education-hub' ),
		'description' => esc_html__( 'Refresh the page after save to view full effects.', 'education-hub' ),
		'section'     => 'section_font_family',
		'type'        => 'checkbox',
		'priority'    => 110,
	)
);
