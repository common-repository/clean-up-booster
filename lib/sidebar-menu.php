<?php
/**
 * This File is used for creating Sidebar Menu.
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
		$flag              = 0;
		$role_capabilities = $wpdb->get_var(
			$wpdb->prepare(
				'SELECT meta_value FROM ' . $wpdb->prefix . 'clean_up_booster_meta WHERE  meta_key = %s',
				'roles_and_capabilities'
			)
		);// WPCS: db call ok, no-cache ok.

		$roles_and_capabilities = maybe_unserialize( $role_capabilities );
		$capabilities           = explode( ',', esc_attr( $roles_and_capabilities['roles_and_capabilities'] ) );
		if ( is_super_admin() ) {
			$cub_role = 'administrator';
		} else {
			$cub_role = check_user_roles_for_clean_up_booster();
		}
		switch ( $cub_role ) {
			case 'administrator':
				$privileges = 'administrator_privileges';
				$flag       = $capabilities[0];
				break;

			case 'author':
				$privileges = 'author_privileges';
				$flag       = $capabilities[1];
				break;

			case 'editor':
				$privileges = 'editor_privileges';
				$flag       = $capabilities[2];
				break;

			case 'contributor':
				$privileges = 'contributor_privileges';
				$flag       = $capabilities[3];
				break;

			case 'subscriber':
				$privileges = 'subscriber_privileges';
				$flag       = $capabilities[4];
				break;

			default:
				$privileges = 'other_privileges';
				$flag       = $capabilities[5];
				break;
		}

		$privileges_value = '';
		if ( isset( $roles_and_capabilities ) && count( $roles_and_capabilities ) > 0 ) {
			foreach ( $roles_and_capabilities as $key => $value ) {
				if ( $privileges == $key ) {// WPCS: Loose Comparison ok.
					$privileges_value = $value;
					break;
				}
			}
		}

		$full_control = explode( ',', $privileges_value );
		if ( ! defined( 'FULL_CONTROL' ) ) {
			define( 'FULL_CONTROL', $full_control[0] );
		}
		if ( ! defined( 'WORDPRESS_DATA_MANUAL_CLEAN_UP_BOOSTER' ) ) {
			define( 'WORDPRESS_DATA_MANUAL_CLEAN_UP_BOOSTER', $full_control[1] );
		}
		if ( ! defined( 'WORDPRESS_DATA_SCHEDULED_CLEAN_UP_BOOSTER' ) ) {
			define( 'WORDPRESS_DATA_SCHEDULED_CLEAN_UP_BOOSTER', $full_control[2] );
		}
		if ( ! defined( 'DATABASE_MANUAL_CLEAN_UP_BOOSTER' ) ) {
			define( 'DATABASE_MANUAL_CLEAN_UP_BOOSTER', $full_control[3] );
		}
		if ( ! defined( 'DATABASE_SCHEDULED_CLEAN_UP_BOOSTER' ) ) {
			define( 'DATABASE_SCHEDULED_CLEAN_UP_BOOSTER', $full_control[4] );
		}
		if ( ! defined( 'LOGS_CLEAN_UP_BOOSTER' ) ) {
			define( 'LOGS_CLEAN_UP_BOOSTER', $full_control[5] );
		}
		if ( ! defined( 'GENERAL_SETTINGS_CLEAN_UP_BOOSTER' ) ) {
			define( 'GENERAL_SETTINGS_CLEAN_UP_BOOSTER', $full_control[6] );
		}
		if ( ! defined( 'ADVANCE_SECURITY_CLEAN_UP_BOOSTER' ) ) {
			define( 'ADVANCE_SECURITY_CLEAN_UP_BOOSTER', $full_control[7] );
		}
		if ( ! defined( 'EMAIL_TEMPLATES_CLEAN_UP_BOOSTER' ) ) {
			define( 'EMAIL_TEMPLATES_CLEAN_UP_BOOSTER', $full_control[8] );
		}
		if ( ! defined( 'ROLES_AND_CAPABILITIES_CLEAN_UP_BOOSTER' ) ) {
			define( 'ROLES_AND_CAPABILITIES_CLEAN_UP_BOOSTER', $full_control[9] );
		}
		if ( ! defined( 'CRON_JOBS_CLEAN_UP_BOOSTER' ) ) {
			define( 'CRON_JOBS_CLEAN_UP_BOOSTER', $full_control[10] );
		}
		if ( ! defined( 'SYSTEM_INFORMATION_CLEAN_UP_BOOSTER' ) ) {
			define( 'SYSTEM_INFORMATION_CLEAN_UP_BOOSTER', $full_control[11] );
		}
		$check_clean_up_wizard = get_option( 'clean-up-booster-wizard-set-up' );
		if ( '1' == $flag ) {// WPCS: Loose Comparison ok.
			if ( $check_clean_up_wizard ) {
				add_menu_page( $cub_clean_up_booster, $cub_clean_up_booster, 'read', 'cub_clean_up_booster', '', plugins_url( 'assets/global/img/icon.png', dirName( __FILE__ ) ) );
			} else {
				add_menu_page( $cub_clean_up_booster, $cub_clean_up_booster, 'read', 'cub_wizard_booster', '', plugins_url( 'assets/global/img/icon.png', dirName( __FILE__ ) ) );
				add_submenu_page( $cub_clean_up_booster, $cub_clean_up_booster, '', 'read', 'cub_wizard_booster', 'cub_wizard_booster' );
			}
			add_submenu_page( 'cub_clean_up_booster', $cub_manual_clean_up_label, $cub_wordpress_data, 'read', 'cub_clean_up_booster', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_clean_up_booster' );
			add_submenu_page( $cub_wordpress_data, $cub_scheduled_clean_up_label, '', 'read', 'cub_scheduled_clean_up', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_scheduled_clean_up' );
			add_submenu_page( $cub_wordpress_data, $cub_add_new_scheduled_clean_up_label, '', 'read', 'cub_add_new_schedule_clean_up', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_add_new_schedule_clean_up' );

			add_submenu_page( 'cub_clean_up_booster', $cub_manual_clean_up_label, $cub_database, 'read', 'cub_database_manual_clean_up', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_database_manual_clean_up' );
			add_submenu_page( $cub_database, $cub_view_records_label, '', 'read', 'cub_database_view_records_manual_clean_up', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_database_view_records_manual_clean_up' );
			add_submenu_page( $cub_database, $cub_scheduled_clean_up_label, '', 'read', 'cub_database_scheduled_clean_up', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_database_scheduled_clean_up' );
			add_submenu_page( $cub_database, $cub_add_new_scheduled_clean_up_label, '', 'read', 'cub_add_new_schedule_clean_up_db', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_add_new_schedule_clean_up_db' );

			add_submenu_page( 'cub_clean_up_booster', $cub_logs_live_traffic, $cub_logs_label, 'read', 'cub_live_traffic', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_live_traffic' );
			add_submenu_page( $cub_logs_label, $cub_logs_recent_login_logs, '', 'read', 'cub_recent_logins', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_recent_logins' );
			add_submenu_page( $cub_logs_label, $cub_logs_visitor_logs, '', 'read', 'cub_visitor_logs', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_visitor_logs' );

			add_submenu_page( 'cub_clean_up_booster', $cub_general_alert_setup, $cub_general_settings_label, 'read', 'cub_alert_setup', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_alert_setup' );
			add_submenu_page( $cub_general_settings_label, $cub_general_error_messages, '', 'read', 'cub_error_messages', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_error_messages' );
			add_submenu_page( $cub_general_settings_label, $cub_general_other_settings, '', 'read', 'cub_other_settings', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_other_settings' );

			add_submenu_page( 'cub_clean_up_booster', $cub_advance_blocking_option, $cub_advance_security_label, 'read', 'cub_blocking_options', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_blocking_options' );
			add_submenu_page( $cub_advance_security_label, $cub_advance_manage_ip_address, '', 'read', 'cub_manage_ip_addresses', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_manage_ip_addresses' );
			add_submenu_page( $cub_advance_security_label, $cub_advance_manage_ip_range, '', 'read', 'cub_manage_ip_ranges', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_manage_ip_ranges' );
			add_submenu_page( $cub_advance_security_label, $cub_advance_country_block, '', 'read', 'cub_country_blocks', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_country_blocks' );

			add_submenu_page( 'cub_clean_up_booster', $cub_email_templates_label, $cub_email_templates_label, 'read', 'cub_email_templates', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_email_templates' );
			add_submenu_page( 'cub_clean_up_booster', $cub_roles_capabilities_label, $cub_roles_capabilities_label, 'read', 'cub_roles_and_capabilities', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_roles_and_capabilities' );

			add_submenu_page( 'cub_clean_up_booster', $cub_cron_custom_jobs_label, $cub_cron_jobs_label, 'read', 'cub_custom_cron_jobs', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_custom_cron_jobs' );
			add_submenu_page( $cub_cron_jobs_label, $cub_cron_core_jobs_label, '', 'read', 'cub_core_cron_jobs', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_core_cron_jobs' );
			add_submenu_page( 'cub_clean_up_booster', $cub_support_forum, $cub_support_forum, 'read', 'https://wordpress.org/support/plugin/clean-up-booster', '' );
			add_submenu_page( 'cub_clean_up_booster', $cub_system_information_label, $cub_system_information_label, 'read', 'cub_system_information', false === $check_clean_up_wizard ? 'cub_wizard_booster' : 'cub_system_information' );
		}

		/**
		 * This function is used to create manual Clean Up Menu.
		 */
		function cub_clean_up_booster() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/wordpress-data/manual-clean-up.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/wordpress-data/manual-clean-up.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_wizard_booster
		 */
		function cub_wizard_booster() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/wizard/wizard.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/wizard/wizard.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create scheduled Clean Up Menu.
		 */
		function cub_scheduled_clean_up() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/wordpress-data/scheduled-clean-up.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/wordpress-data/scheduled-clean-up.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create add new scheduled Clean Up Menu.
		 */
		function cub_add_new_schedule_clean_up() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/wordpress-data/add-new-schedule-clean-up.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/wordpress-data/add-new-schedule-clean-up.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create database manual Clean Up Menu.
		 */
		function cub_database_manual_clean_up() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/database/manual-clean-up.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/database/manual-clean-up.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create Database view records manual Clean Up Menu
		 */
		function cub_database_view_records_manual_clean_up() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/database/database-view-records-manual-clean-up.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/database/database-view-records-manual-clean-up.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create Database scheduled clean up menu
		 */
		function cub_database_scheduled_clean_up() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/database/scheduled-clean-up.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/database/scheduled-clean-up.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create Add New Schedule clean up db menu
		 */
		function cub_add_new_schedule_clean_up_db() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/database/add-new-schedule-clean-up-db.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/database/add-new-schedule-clean-up-db.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_live_traffic menu
		 */
		function cub_live_traffic() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/logs/live-traffic.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/logs/live-traffic.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_recent_logins menu
		 */
		function cub_recent_logins() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/logs/recent-login-logs.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/logs/recent-login-logs.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create Visitor logs menu
		 */
		function cub_visitor_logs() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/logs/visitor-logs.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/logs/visitor-logs.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_alert_setup menu
		 */
		function cub_alert_setup() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/general-settings/alert-setup.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/general-settings/alert-setup.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_error_messages menu
		 */
		function cub_error_messages() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/general-settings/error-messages.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/general-settings/error-messages.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_other_settings menu
		 */
		function cub_other_settings() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/general-settings/other-settings.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/general-settings/other-settings.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_blocking_options menu
		 */
		function cub_blocking_options() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/advance-security/blocking-options.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/advance-security/blocking-options.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_manage_ip_addresses menu
		 */
		function cub_manage_ip_addresses() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/advance-security/manage-ip-addresses.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/advance-security/manage-ip-addresses.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_manage_ip_ranges menu
		 */
		function cub_manage_ip_ranges() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/advance-security/manage-ip-ranges.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/advance-security/manage-ip-ranges.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_country_blocks menu
		 */
		function cub_country_blocks() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/advance-security/country-blocks.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/advance-security/country-blocks.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_email_templates
		 */
		function cub_email_templates() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/email-templates/email-templates.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/email-templates/email-templates.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_roles_and_capabilities
		 */
		function cub_roles_and_capabilities() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/roles-and-capabilities/roles-and-capabilities.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/roles-and-capabilities/roles-and-capabilities.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_core_cron_jobs menu
		 */
		function cub_core_cron_jobs() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/cron-jobs/core-cron-jobs.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/cron-jobs/core-cron-jobs.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_custom_cron_jobs menu
		 */
		function cub_custom_cron_jobs() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/cron-jobs/custom-cron-jobs.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/cron-jobs/custom-cron-jobs.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_system_information menu
		 */
		function cub_system_information() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/system-information/system-information.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/system-information/system-information.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
		/**
		 * This function is used to create cub_premium_editions menu
		 */
		function cub_premium_editions() {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_clean_up_booster();
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include CLEAN_UP_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/header.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/sidebar.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/queries.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'views/premium-editions/premium-editions.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'views/premium-editions/premium-editions.php';
			}
			if ( file_exists( CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
				include_once CLEAN_UP_BOOSTER_DIR_PATH . 'includes/footer.php';
			}
		}
	}
}
