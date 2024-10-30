<?php
/**
 * This File is used for unscheduling schedulers.
 *
 * @author Tech Banker
 * @package clean-up-booster/lib
 * @version 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} //exit if accessed directly
if ( defined( 'DOING_CRON' ) && DOING_CRON ) {
	if ( wp_verify_nonce( $nonce_unblock_script, 'unblock_script' ) ) {
		if ( strstr( SCHEDULER_NAME, 'ip_address_unblocker_' ) ) {
			$meta_id = explode( 'ip_address_unblocker_', SCHEDULER_NAME );
		} else {
			$meta_id = explode( 'ip_range_unblocker_', SCHEDULER_NAME );
		}
		$where              = array();
		$where_parent       = array();
		$where['meta_id']   = $meta_id[1];
		$where_parent['id'] = $meta_id[1];
		$type               = $wpdb->get_var(
			$wpdb->prepare(
				'SELECT type FROM ' . $wpdb->prefix . 'clean_up_booster WHERE id = %d',
				$meta_id[1]
			)
		); // WPCS: db call ok, no-cache ok.
		if ( '' != esc_attr( $type ) ) { // WPCS :loose comparison ok.
			$manage_ip = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'clean_up_booster_meta WHERE meta_id=%d AND meta_key=%s',
					$meta_id[1],
					$type
				)
			); // WPCS: db call ok, no-cache ok.

			$ip_address_data_array = maybe_unserialize( $manage_ip );
			$wpdb->delete( clean_up_booster(), $where_parent ); // WPCS: db call ok, no-cache ok.
			$wpdb->delete( clean_up_booster_meta(), $where ); // WPCS: db call ok, no-cache ok.
		}
		unschedule_events_clean_up_booster( SCHEDULER_NAME );
	}
}
