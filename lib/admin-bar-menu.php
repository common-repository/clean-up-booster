<?php
/**
 * This File is used for displaying Topbar menu.
 *
 * @author Tech Banker
 * @package clean-up-booster/lib
 * @version 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}//exit if accessed directly
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
		$flag                   = 0;
		$role_capabilities      = $wpdb->get_var(
			$wpdb->prepare(
				'SELECT meta_value FROM ' . $wpdb->prefix . 'clean_up_booster_meta WHERE  meta_key = %s',
				'roles_and_capabilities'
			)
		); // WPCS:db call ok, no-cache ok.
		$roles_and_capabilities = maybe_unserialize( $role_capabilities );
		$capabilities           = explode( ',', $roles_and_capabilities['roles_and_capabilities'] );
		if ( is_super_admin() ) {
			$cub_role = 'administrator';
		} else {
			$cub_role = check_user_roles_for_clean_up_booster();
		}
		switch ( $cub_role ) {
			case 'administrator':
				$flag = $capabilities[0];
				break;

			case 'author':
				$flag = $capabilities[1];
				break;

			case 'editor':
				$flag = $capabilities[2];
				break;

			case 'contributor':
				$flag = $capabilities[3];
				break;

			case 'subscriber':
				$flag = $capabilities[4];
				break;

			default:
				$flag = $capabilities[5];
				break;
		}

		if ( '1' === $flag ) {
			$wp_admin_bar->add_menu(
				array(
					'id'    => 'clean_up_booster',
					'title' => '<img style="width:16px; height:16px; vertical-align:middle; display:inline-block; margin-right:3px;\" src=' . plugins_url( 'assets/global/img/icon.png', dirname( __FILE__ ) ) . "> $cub_clean_up_booster",
					'href'  => admin_url( 'admin.php?page=cub_clean_up_booster' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'wordpress_data',
					'title'  => $cub_wordpress_data,
					'href'   => admin_url( 'admin.php?page=cub_clean_up_booster' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'database',
					'title'  => $cub_database,
					'href'   => admin_url( 'admin.php?page=cub_database_manual_clean_up' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'logs',
					'title'  => $cub_logs_label,
					'href'   => admin_url( 'admin.php?page=cub_live_traffic' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'general_settings',
					'title'  => $cub_general_settings_label,
					'href'   => admin_url( 'admin.php?page=cub_alert_setup' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'advance_security',
					'title'  => $cub_advance_security_label,
					'href'   => admin_url( 'admin.php?page=cub_blocking_options' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'email_templates',
					'title'  => $cub_email_templates_label,
					'href'   => admin_url( 'admin.php?page=cub_email_templates' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'roles_and_capabilities',
					'title'  => $cub_roles_capabilities_label,
					'href'   => admin_url( 'admin.php?page=cub_roles_and_capabilities' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'cron_jobs',
					'title'  => $cub_cron_jobs_label,
					'href'   => admin_url( 'admin.php?page=cub_custom_cron_jobs' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'support_forum',
					'title'  => $cub_support_forum,
					'href'   => 'https://wordpress.org/support/plugin/clean-up-booster',
					'meta'   => array( 'target' => '_blank' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'system_information',
					'title'  => $cub_system_information_label,
					'href'   => admin_url( 'admin.php?page=cub_system_information' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'clean_up_booster',
					'id'     => 'premium_editions',
					'title'  => $cub_upgrade,
					'href'   => 'https://tech-banker.com/clean-up-booster/pricing/',
					'meta'   => array( 'target' => '_blank' ),
				)
			);
		}
	}
}
