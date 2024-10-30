<?php
/**
 * This File is used to drop Tables and Unschedule schedulers at uninstall.
 *
 * @author Tech Banker
 * @package clean-up-booster/
 * @version 2.0
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}
if ( ! current_user_can( 'manage_options' ) ) {
	return;
} else {
	global $wpdb;
	if ( is_multisite() ) {
		$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" ); // WPCS: db call ok, no-cache ok.
		foreach ( $blog_ids as $blog_id ) { // @codingStandardsIgnoreLine
			switch_to_blog( $blog_id );
			$version = get_option( 'clean_up_booster_version_number' );
			if ( false !== $version ) {
				$other_settings_data              = $wpdb->get_var(
					$wpdb->prepare(
						'SELECT meta_value FROM ' . $wpdb->prefix . 'clean_up_booster_meta
							WHERE meta_key = %s ',
						'other_settings'
					)
				); // WPCS: db call ok, no-cache ok.
				$other_settings_unserialized_data = maybe_unserialize( $other_settings_data );
				if ( esc_attr( $other_settings_unserialized_data['remove_tables_uninstall'] ) === 'enable' ) {
					$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'clean_up_booster' ); // @codingStandardsIgnoreLine
					$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'clean_up_booster_meta' ); // @codingStandardsIgnoreLine
					$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'clean_up_booster_ip_locations' ); // @codingStandardsIgnoreLine
					// Delete options.
					delete_option( 'clean_up_booster_version_number' );
					delete_option( 'cub_admin_notice' );
				}
			}
			restore_current_blog();
		}
	} else {
		$clean_up_booster_version_number = get_option( 'clean_up_booster_version_number' );
		if ( false !== $clean_up_booster_version_number ) {
			global $wp_version, $wpdb;
			$other_settings_data              = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'clean_up_booster_meta
						WHERE meta_key = %s ',
					'other_settings'
				)
			); // WPCS: db call ok, no-cache ok.
			$other_settings_unserialized_data = maybe_unserialize( $other_settings_data );
			if ( esc_attr( $other_settings_unserialized_data['remove_tables_uninstall'] ) === 'enable' ) {
				// Drop Tables.
				$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'clean_up_booster' ); // @codingStandardsIgnoreLine.
				$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'clean_up_booster_meta' ); // @codingStandardsIgnoreLine.
				$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'clean_up_booster_ip_locations' ); // @codingStandardsIgnoreLine.
				// Delete options.
				delete_option( 'clean_up_booster_version_number' );
				delete_option( 'cub_admin_notice' );
			}
		}
	}
}
