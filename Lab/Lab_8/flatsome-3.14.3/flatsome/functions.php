<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */
update_option( 'flatsome_wup_purchase_code', '123b8d75-85b3-4b3e-789c-2e29d386456c' );
update_option( 'flatsome_wup_supported_until', '01.01.2030' );
update_option( 'flatsome_wup_buyer', 'TheDevKit' );
update_option( 'flatsome_wup_sold_at', time() );
delete_option( 'flatsome_wup_errors');
add_action( 'init', 'hide_notice' );
function hide_notice() {
remove_action( 'admin_notices', 'flatsome_maintenance_admin_notice' );
}
require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */
