<?php
/**
 * This File is used for creating helper class.
 *
 * @author Tech Banker
 * @package clean-up-booster/lib
 * @version 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} //exit if accessed directly
if ( ! is_user_logged_in() ) {
	return;
} else {
	$access_granted = false;
	if ( isset( $user_role_permission ) && count( $user_role_permission ) > 0 ) {
		foreach ( $user_role_permission as $permission ) {
			if ( current_user_can( $permission ) ) {
				$access_granted = true;
				break;
			}
		}
	}
	if ( ! $access_granted ) {
		return;
	} else {
		if ( ! class_exists( 'Dbhelper_Clean_Up_Booster' ) ) {
			/**
			 * This Class is used for Insert Update and Delete operations.
			 */
			class Dbhelper_Clean_Up_Booster {
				/**
				 * This Function is used for Insert data in database.
				 *
				 * @param string $table_name passes parameter as table name.
				 * @param string $data passes parameter as data.
				 */
				public function insert_command( $table_name, $data ) {
					global $wpdb;
					$wpdb->insert( $table_name, $data ); // WPCS: db call ok.
					return $wpdb->insert_id;
				}
				/**
				 * This function is used for Update data.
				 *
				 * @param string $table_name passes parameter as table.
				 * @param string $data passes parameter as data.
				 * @param string $where passes parameter as where.
				 */
				public function update_command( $table_name, $data, $where ) {
					global $wpdb;
					$wpdb->update( $table_name, $data, $where ); // WPCS: db call ok, no-cache ok.
				}
				/**
				 * This function is used to delete data from database.
				 *
				 * @param string $table_name passes parameter as table name.
				 * @param string $where passes parameter as where.
				 */
				public function delete_command( $table_name, $where ) {
					global $wpdb;
					$wpdb->delete( $table_name, $where ); // WPCS: db call ok, no-cache ok.
				}
			}
		}
		if ( ! class_exists( 'plugin_info_clean_up_booster' ) ) {
			/**
			 * This Class is used to get the the information about plugins.
			 */
			class plugin_info_clean_up_booster { // @codingStandardsIgnoreLine
				/**
				 * This function is used to return the information about plugins.
				 */
				function get_plugin_info_clean_up_booster() { // @codingStandardsIgnoreLine
					$active_plugins = (array) get_option( 'active_plugins', array() );
					if ( is_multisite() ) {
						$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
					}
					$plugins = array();
					if ( count( $active_plugins ) > 0 ) {
						$get_plugins = array();
						foreach ( $active_plugins as $plugin ) {
							$plugin_data                   = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin ); // @codingStandardsIgnoreLine
							$get_plugins['plugin_name']    = strip_tags( $plugin_data['Name'] ); // @codingStandardsIgnoreLine
							$get_plugins['plugin_author']  = strip_tags( $plugin_data['Author'] ); // @codingStandardsIgnoreLine
							$get_plugins['plugin_version'] = strip_tags( $plugin_data['Version'] ); // @codingStandardsIgnoreLine
							array_push( $plugins, $get_plugins );
						}
						return $plugins;
					}
				}
			}
		}
	}
}
