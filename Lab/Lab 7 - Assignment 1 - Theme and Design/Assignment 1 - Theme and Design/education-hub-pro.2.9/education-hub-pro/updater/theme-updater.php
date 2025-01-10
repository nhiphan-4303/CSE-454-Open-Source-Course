<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package Education_Hub
 */

// Includes the files needed for the theme updater
if ( ! class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://themepalace.com', // Site where EDD is hosted
		'item_name'      => 'Education Hub Pro', // Name of theme
		'theme_slug'     => 'education-hub-pro', // Theme slug
		'version'        => '2.9', // The current version of this theme
		'author'         => 'WEN Themes', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => 'https://themepalace.com/my-account' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'education-hub' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'education-hub' ),
		'license-key'               => __( 'License Key', 'education-hub' ),
		'license-action'            => __( 'License Action', 'education-hub' ),
		'deactivate-license'        => __( 'Deactivate License', 'education-hub' ),
		'activate-license'          => __( 'Activate License', 'education-hub' ),
		'status-unknown'            => __( 'License status is unknown.', 'education-hub' ),
		'renew'                     => __( 'Renew?', 'education-hub' ),
		'unlimited'                 => __( 'unlimited', 'education-hub' ),
		'license-key-is-active'     => __( 'License key is active.', 'education-hub' ),
		'expires%s'                 => __( 'Expires %s.', 'education-hub' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'education-hub' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'education-hub' ),
		'license-key-expired'       => __( 'License key has expired.', 'education-hub' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'education-hub' ),
		'license-is-inactive'       => __( 'License is inactive.', 'education-hub' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'education-hub' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'education-hub' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'education-hub' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'education-hub' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4$s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'education-hub' ),
		'key-not-activated'         => __( '%1$s License Key has not been activated, so the theme is inactive. %2$sClick here%3$s to activate the license key and the theme.', 'education-hub' ),
		'get-license-key'           => __( 'Get API key from %s.', 'education-hub' ),
		'theme-palace'              => __( 'Theme Palace', 'education-hub' ),
	)

);
