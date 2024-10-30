<?php
/**
 * This File is used for plugin header.
 *
 * @author Tech Banker
 * @package clean-up-booster/includes
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

		$cub_upgrade_know_about = __( 'Know about', 'clean-up-booster' );
		$cub_full_features      = __( 'Full Features', 'clean-up-booster' );
		$cub_chek_our           = __( 'or check our', 'clean-up-booster' );
		$cub_online_demos       = __( 'Online Demos', 'clean-up-booster' );

		// Disclaimers.
		$cub_upgrade                 = __( 'Premium Editions', 'clean-up-booster' );
		$cub_premium_editions_label  = __( 'Premium Edition', 'clean-up-booster' );
		$cub_message_premium_edition = __( 'This feature is available only in Premium Editions! <br> Kindly Purchase to unlock it!', 'clean-up-booster' );
		$cub_support_forum           = __( 'Ask For Help', 'clean-up-booster' );

		// Footer.
		$cub_setting_saved              = __( 'Settings Saved!', 'clean-up-booster' );
		$cub_blockage_settings          = __( 'Blocked Successfully!', 'clean-up-booster' );
		$cub_delete_data                = __( 'Data Deleted!', 'clean-up-booster' );
		$cub_clean_up_data              = __( 'Cleaned Successfully!', 'clean-up-booster' );
		$cub_optimize_table             = __( 'Optimized Successfully!', 'clean-up-booster' );
		$cub_choose_action              = __( 'Please choose to proceed!', 'clean-up-booster' );
		$cub_confirm_action             = __( 'Are you sure?', 'clean-up-booster' );
		$cub_location                   = __( 'Location', 'clean-up-booster' );
		$cub_latitude                   = __( 'Latitude', 'clean-up-booster' );
		$cub_longitude                  = __( 'Longitude', 'clean-up-booster' );
		$cub_http_user_agent            = __( 'HTTP User Agent', 'clean-up-booster' );
		$cub_not_available              = __( 'N/A', 'clean-up-booster' );
		$cub_valid_ip_address_message   = __( 'Please provide valid IP Address', 'clean-up-booster' );
		$cub_valid_ip_address_title     = __( 'Error Message', 'clean-up-booster' );
		$cub_duplicate_ip_address       = __( 'This IP Address has been already blocked!', 'clean-up-booster' );
		$cub_duplicate_ip_address_title = __( 'Notification!', 'clean-up-booster' );
		$cub_valid_ip_range_message     = __( 'Please provide valid IP Range', 'clean-up-booster' );
		$cub_duplicate_ip_range         = __( 'This IP Range has been already blocked!', 'clean-up-booster' );
		$cub_success                    = __( 'Success!', 'clean-up-booster' );
		$cub_block_own_ip_address       = __( 'You cannot block your own IP Address!', 'clean-up-booster' );
		$cub_block_own_ip_range         = __( 'You cannot block this IP Range as your IP Address lies between this Range!', 'clean-up-booster' );

		// Add new scheduled clean up.
		$cub_data_add_new_scheduled_clean_up_label            = __( 'WordPress Data - Add New Schedule Clean Up', 'clean-up-booster' );
		$cub_database_update_scheduled_clean_up_label         = __( 'Database - Update Schedule Clean Up', 'clean-up-booster' );
		$cub_database_add_new_update_scheduled_clean_up_label = __( 'Database - Add New Schedule Clean Up', 'clean-up-booster' );

		// Database view records.
		$cub_database_manual_clean_up_view_records_label = __( 'Database - View Records', 'clean-up-booster' );
		$cub_rows                                        = __( 'Rows', 'clean-up-booster' );
		$cub_table_size                                  = __( 'Table Size', 'clean-up-booster' );
		$cub_database_view_record_back_button_label      = __( '<< Back to Manual Clean Up', 'clean-up-booster' );
		$cub_database_view_record_back_to_manual         = __( 'Back to Manual Clean Up', 'clean-up-booster' );

		// Recent Login Logs.
		$cub_recent_logins_on_world_map_label = __( 'Login Logs On World Map', 'clean-up-booster' );
		$cub_recent_logins_start_date_tooltip = __( 'In this field, you would need to specify start date to view information about userss who logged within a specified period', 'clean-up-booster' );
		$cub_recent_logins_end_date_tooltip   = __( 'In this field, you would need to specify end date to view information about users who logged within a specified period', 'clean-up-booster' );

		// Live traffic.
		$cub_live_traffic_on_world_map_label = __( 'Live Traffic On World Map', 'clean-up-booster' );
		$cub_live_traffic_resources          = __( 'Resources', 'clean-up-booster' );
		$cub_live_traffic_monitoring_message = __( 'Live Traffic Monitoring is Turned Off. Please go to General Settings > Other Settings Menu to enable it', 'clean-up-booster' );

		// Visitor Logs.
		$cub_visitor_log_start_date_tooltip  = __( 'In this field, you would need to specify start date to view information about users who logged within a specified period', 'clean-up-booster' );
		$cub_visitor_log_end_date_tooltip    = __( 'In this field, you would need to specify end date to view information about users who logged within a specified period', 'clean-up-booster' );
		$cub_visitor_logs_on_world_map_label = __( 'Visitor Logs On World Map', 'clean-up-booster' );
		$cub_visitor_logs_monitoring_message = __( 'Visitor Logs Monitoring is Turned Off. Please go to General Settings > Other Settings Menu to enable it', 'clean-up-booster' );

		// Alert setup.
		$cub_alert_setup_email_user_fail_login_label        = __( 'Email when a user Fails Login', 'clean-up-booster' );
		$cub_alert_setup_email_user_fail_login_tooltip      = __( 'In this field, you would need to choose Enable to automatically send an email to the Administrator when a user fails to login', 'clean-up-booster' );
		$cub_alert_setup_email_user_success_login_label     = __( 'Email when a user Success Login', 'clean-up-booster' );
		$cub_alert_setup_email_user_success_login_tooltip   = __( 'In this field, you would need to choose Enable to automatically send an email to the Administrator when a user succeeds in login', 'clean-up-booster' );
		$cub_alert_setup_email_ip_address_blocked_label     = __( 'Email when an IP Address is Blocked', 'clean-up-booster' );
		$cub_alert_setup_email_ip_address_blocked_tooltip   = __( 'In this field, you would need to choose Enable to automatically send an email to the Administrator when an IP Address is being blocked', 'clean-up-booster' );
		$cub_alert_setup_email_ip_address_unblocked_label   = __( 'Email when an IP Address is Unblocked', 'clean-up-booster' );
		$cub_alert_setup_email_ip_address_unblocked_tooltip = __( 'In this field, you would need to choose Enable to automatically send an email to the Administrator when an IP Address is being unblocked', 'clean-up-booster' );
		$cub_alert_setup_email_ip_range_blocked_label       = __( 'Email when an IP Range is Blocked', 'clean-up-booster' );
		$cub_alert_setup_email_ip_range_blocked_tooltip     = __( 'In this field, you would need to choose Enable to automatically send an email to the Administrator when an IP Range is being blocked', 'clean-up-booster' );
		$cub_alert_setup_email_ip_range_unblocked_label     = __( 'Email when an IP Range is Unblocked', 'clean-up-booster' );
		$cub_alert_setup_email_ip_range_unblocked_tooltip   = __( 'In this field, you would need to choose Enable to automatically send an email to the Administrator when an IP Range is being unblocked', 'clean-up-booster' );

		// Error messasges.
		$cub_error_messages_max_login_attempts_label             = __( 'For Maximum Login Attempts Error Message', 'clean-up-booster' );
		$cub_error_messages_max_login_attempts_label_tooltip     = __( 'In this field, you would need to provide an error message to be displayed when a user exceeds maximum number of login attempts', 'clean-up-booster' );
		$cub_error_messages_max_login_attempts_label_placeholder = __( 'Please provide your Login Attempts Error Message', 'clean-up-booster' );
		$cub_error_messages_blocked_country_label                = __( 'For Blocked Country Error Message', 'clean-up-booster' );
		$cub_error_messages_blocked_country_tooltip              = __( 'In this field, you would need to provide an error message to be displayed when user country is being blocked by the Administrator', 'clean-up-booster' );
		$cub_error_messages_blocked_country_placeholder          = __( 'Please provide your Blocked Country Error Message', 'clean-up-booster' );
		$cub_error_messages_max_ip_address_label                 = __( 'For Blocked IP Address Error Message', 'clean-up-booster' );
		$cub_error_messages_max_ip_address_tooltip               = __( 'In this field, you would need to provide an error message to be displayed when user IP Address is being blocked by the Administrator', 'clean-up-booster' );
		$cub_error_messages_max_ip_address_placeholder           = __( 'Please provide your Blocked IP Address Error Message', 'clean-up-booster' );
		$cub_error_messages_max_ip_range_label                   = __( 'For Blocked IP Range Error Message', 'clean-up-booster' );
		$cub_error_messages_max_ip_range_tooltip                 = __( 'In this field, you would need to provide an error message to be displayed when user IP Range is being blocked by the Administrator', 'clean-up-booster' );
		$cub_error_messages_max_ip_range_placeholder             = __( 'Please provide your Blocked IP Range Error Message', 'clean-up-booster' );

		// Other Settings.
		$cub_other_settings_trackbacks_label                   = __( 'Trackbacks', 'clean-up-booster' );
		$cub_other_settings_trackbacks_tooltip                 = __( 'Trackbacks are a way to notify legacy blog systems that you have linked to them. If you would like to enable trackbacks to your site then you would need to choose enable or vice-versa from drop-down', 'clean-up-booster' );
		$cub_other_settings_comments_tooltip                   = __( 'If you would like to allow people to comment on your posts or pages then you would need to choose enable or vise-versa from drop-down', 'clean-up-booster' );
		$cub_other_settings_live_traffic_monitoring_label      = __( 'Live Traffic Monitoring', 'clean-up-booster' );
		$cub_other_settings_live_traffic_monitoring_tooltip    = __( 'If you would like to monitor details of users who are currently visiting your website and pages visited by them then you would need to choose enable or vise-versa from dropdown', 'clean-up-booster' );
		$cub_other_settings_visitor_logs_monitoring_label      = __( 'Visitor Logs Monitoring', 'clean-up-booster' );
		$cub_other_settings_visitor_logs_monitoring_tooltip    = __( 'If you would like to monitor details of users who are visiting your website and pages visited by them then you would need to choose enable or vise-versa from dropdown', 'clean-up-booster' );
		$cub_other_settings_remove_tables_at_uninstall         = __( 'Remove Tables At Uninstall', 'clean-up-booster' );
		$cub_other_settings_remove_tables_at_uninstall_tooltip = __( 'If you would like to remove tables at uninstall then you would need to choose enable or vice-versa from dropdown', 'clean-up-booster' );
		$cub_other_settings_ip_address_fetching_method         = __( 'How does Clean Up Booster get IPs', 'clean-up-booster' );
		$cub_other_settings_ip_address_tooltips                = __( 'In this field, you would need to choose a specific option for how does Clean Up Booster get IPs', 'clean-up-booster' );
		$cub_other_settings_ip_address_fetching_option1        = __( 'Let Clean Up Booster use the most secure method to get visitor IP address. Prevents spoofing and works with most sites.', 'clean-up-booster' );
		$cub_other_settings_ip_address_fetching_option2        = __( 'Use PHP\'s built in REMOTE_ADDR and don\'t use anything else. Very secure if this is compatible with your site.', 'clean-up-booster' );
		$cub_other_settings_ip_address_fetching_option3        = __( 'Use the X-Forwarded-For HTTP header. Only use if you have a front-end proxy or spoofing may result.', 'clean-up-booster' );
		$cub_other_settings_ip_address_fetching_option4        = __( 'Use the X-Real-IP HTTP header. Only use if you have a front-end proxy or spoofing may result.', 'clean-up-booster' );
		$cub_other_settings_ip_address_fetching_option5        = __( 'Use the Cloudflare \'CF-Connecting-IP\' HTTP header to get a visitor IP. Only use if you\'re using Cloudflare.', 'clean-up-booster' );


		// Blocking options.
		$cub_blocking_options_auto_ip_block_label                = __( 'Auto IP Block', 'clean-up-booster' );
		$cub_blocking_options_auto_ip_block_tootltip             = __( 'In this field, you would need to choose Enable to automatically block an IP Address when a user exceeds their maximum login attempts', 'clean-up-booster' );
		$cub_blocking_options_max_login_attempts_day_label       = __( 'Maximum Login Attempts in a Day', 'clean-up-booster' );
		$cub_blocking_options_max_login_attempts_day_tooltip     = __( 'In this field, you would need to provide the maximum number of login attempts in a day. If a user exceeds its login attempts then their IP Address will be automatically blocked', 'clean-up-booster' );
		$cub_blocking_options_max_login_attempts_day_placeholder = __( 'Please provide Maximum Login Attempts in a Day', 'clean-up-booster' );
		$cub_blocking_options_blocked_for_tooltip                = __( 'In this field, you would need to choose a time duration for which you would like to block an IP Address so that particular IP Address will be blocked for a fixed time interval', 'clean-up-booster' );

		// Manage IP Addresses.
		$cub_manage_ip_addresses_tooltip                     = __( 'In this field, you would need to provide a valid IP Address which you would like to block', 'clean-up-booster' );
		$cub_manage_ip_addresses_blocked_for_tooltip         = __( 'In this field, you would need to choose a duration of time for which you would like to block IP Address', 'clean-up-booster' );
		$cub_manage_ip_addresses_comments_tooltip            = __( 'In this field, you would need to provide comments to give an overview about reason for blocking these IP Addresses', 'clean-up-booster' );
		$cub_manage_ip_addresses_comments_placeholder        = __( 'Please provide Comments', 'clean-up-booster' );
		$cub_manage_ip_addresses_view_block_ip_address_label = __( 'View Blocked IP Addresses', 'clean-up-booster' );
		$cub_manage_ip_addresses_start_date_tooltip          = __( 'In this field, you would need to choose start date to view information about IP Addresses which were blocked within a specified period', 'clean-up-booster' );
		$cub_manage_ip_addresses_end_date_tooltip            = __( 'In this field, you would need to choose end date to view information about IP Addresses which were blocked within a specified period', 'clean-up-booster' );

		// Manage IP Ranges.
		$cub_manage_ip_ranges_start_ip_range_label                = __( 'Start IP Range', 'clean-up-booster' );
		$cub_manage_ip_ranges_start_ip_range_tooltip              = __( 'In this field, you would need to provide a valid Start IP Ranges which you would like to block', 'clean-up-booster' );
		$cub_manage_ip_ranges_start_ip_range_placeholder          = __( 'Please provide Start IP Range', 'clean-up-booster' );
		$cub_manage_ip_ranges_end_ip_range_label                  = __( 'End IP Range', 'clean-up-booster' );
		$cub_manage_ip_ranges_end_ip_range_tooltip                = __( 'In this field, you would need to provide a valid End IP Ranges which you would like to block', 'clean-up-booster' );
		$cub_manage_ip_ranges_end_ip_range_placeholder            = __( 'Please provide End IP Range', 'clean-up-booster' );
		$cub_manage_ip_ranges_range_blocked_for_tooltip           = __( 'In this field, you would need to choose duration of time for which you would like to block these IP Ranges', 'clean-up-booster' );
		$cub_manage_ip_ranges_address_block_ip_range_button_label = __( 'Block IP Range', 'clean-up-booster' );
		$cub_manage_ip_ranges_view_block_ip_range_label           = __( 'View Blocked IP Ranges', 'clean-up-booster' );
		$cub_manage_ip_ranges_start_date_tooltip                  = __( 'In this field, you would need to choose start date to view information about IP Ranges which were blocked within a specified period', 'clean-up-booster' );
		$cub_manage_ip_ranges_end_date_tooltip                    = __( 'In this field, you would need to choose end date to view information about IP Ranges which were blocked within a specified period', 'clean-up-booster' );
		$cub_manage_ip_ranges_comments_tooltip                    = __( 'In this field, you would need to provide comments to give an overview about reason for blocking these IP Ranges', 'clean-up-booster' );

		// Country Blocks.
		$cub_country_blocks_available_countries_label   = __( 'Available Countries', 'clean-up-booster' );
		$cub_country_blocks_available_countries_tooltip = __( 'List of all Countries', 'clean-up-booster' );
		$cub_country_blocks_add_button_label            = __( 'Add >>', 'clean-up-booster' );
		$cub_country_blocks_remove_button_label         = __( '<< Remove', 'clean-up-booster' );
		$cub_country_blocks_blocked_countries_label     = __( 'Blocked Countries', 'clean-up-booster' );
		$cub_country_blocks_blocked_countries_tooltip   = __( 'List of all Countries being Blocked', 'clean-up-booster' );

		// Email Templates.
		$cub_email_templates_choose_email_template_label   = __( 'Choose Email Template', 'clean-up-booster' );
		$cub_email_templates_send_to_label                 = __( 'Send To', 'clean-up-booster' );
		$cub_email_templates_cc_label                      = __( 'CC', 'clean-up-booster' );
		$cub_email_templates_bcc_label                     = __( 'BCC', 'clean-up-booster' );
		$cub_email_templates_message_label                 = __( 'Message', 'clean-up-booster' );
		$cub_email_templates_choose_template_tooltip       = __( 'In this field, you would need to choose Email Template from dropdown', 'clean-up-booster' );
		$cub_email_templates_send_emails_address_tooltip   = __( 'In this field, you would need to provide a valid email address where you would like to send an email notification a user successfully logs in', 'clean-up-booster' );
		$cub_email_templates_cc_email_address_tooltip      = __( 'In this field, you would need to provide valid Cc Email Address', 'clean-up-booster' );
		$cub_email_templates_bcc_email_address_tooltip     = __( 'In this field, you would need to provide valid Bcc Email Address', 'clean-up-booster' );
		$cub_email_templates_subject_email_tooltip         = __( 'In this field, you would need to provide subject for email notification', 'clean-up-booster' );
		$cub_email_templates_content_email_tooltip         = __( 'In this field, you would need to provide content which has to be sent to the Administrator', 'clean-up-booster' );
		$cub_email_templates_successful_login_dropdown     = __( 'Template For User Successful Login', 'clean-up-booster' );
		$cub_email_templates_failure_login_dropdown        = __( 'Template For User Failure Login', 'clean-up-booster' );
		$cub_email_templates_ip_address_blocked_dropdown   = __( 'Template For IP Address Blocked', 'clean-up-booster' );
		$cub_email_templates_ip_address_unblocked_dropdown = __( 'Template For IP Address Unblocked', 'clean-up-booster' );
		$cub_email_templates_ip_range_blocked_dropdown     = __( 'Template For IP Range Blocked', 'clean-up-booster' );
		$cub_email_templates_ip_range_unblocked_dropdown   = __( 'Template For IP Range Unblocked', 'clean-up-booster' );
		$cub_email_templates_email_address_placeholder     = __( 'Please provide valid Email Address', 'clean-up-booster' );
		$cub_email_templates_cc_email_placeholder          = __( 'Please provide CC Email', 'clean-up-booster' );
		$cub_email_templates_bcc_email_placeholder         = __( 'Please provide BCC Email', 'clean-up-booster' );
		$cub_email_templates_subject_placeholder           = __( 'Please provide Subject', 'clean-up-booster' );

		// Roles And Capabilities.
		$cub_roles_and_capabilities_clean_up_booster_menu_label            = __( 'Show Clean Up Booster Menu', 'clean-up-booster' );
		$cub_roles_and_capabilities_clean_up_top_bar_menu_label            = __( 'Show Clean Up Booster Top Bar Menu', 'clean-up-booster' );
		$cub_roles_and_capabilities_administrator_role_label               = __( 'An Administrator Role can do the following', 'clean-up-booster' );
		$cub_roles_and_capabilities_author_role_label                      = __( 'An Author Role can do the following', 'clean-up-booster' );
		$cub_roles_and_capabilities_editor_role_label                      = __( 'An Editor Role can do the following', 'clean-up-booster' );
		$cub_roles_and_capabilities_contributor_role_label                 = __( 'A Contributor Role can do the following', 'clean-up-booster' );
		$cub_roles_and_capabilities_subscriber_role_label                  = __( 'A Subscriber Role can do the following', 'clean-up-booster' );
		$cub_roles_and_capabilities_other_role_label                       = __( 'Other Roles can do the following', 'clean-up-booster' );
		$cub_roles_and_capabilities_administrator_label                    = __( 'Administrator', 'clean-up-booster' );
		$cub_roles_and_capabilities_author_label                           = __( 'Author', 'clean-up-booster' );
		$cub_roles_and_capabilities_editor_label                           = __( 'Editor', 'clean-up-booster' );
		$cub_roles_and_capabilities_contributor_label                      = __( 'Contributor', 'clean-up-booster' );
		$cub_roles_and_capabilities_subscriber_label                       = __( 'Subscriber', 'clean-up-booster' );
		$cub_roles_and_capabilities_other_label                            = __( 'Others', 'clean-up-booster' );
		$cub_roles_and_capabilities_choose_specific_role                   = __( 'In this field, you would need to choose a specific role who can see Sidebar Menu', 'clean-up-booster' );
		$cub_roles_and_capabilities_clean_up_top_bar_tooltip               = __( 'If you would like to show Clean Up Booster Top Bar Menu then you would need to choose enable or vice-versa from dropdown', 'clean-up-booster' );
		$cub_roles_and_capabilities_choose_page_admin_access_tooltip       = __( 'Administrators will have by default full control to manage different options in Clean Up Booster, so all checkboxes will be already selected for the Administrator Role as mentioned below', 'clean-up-booster' );
		$cub_roles_and_capabilities_choose_page_author_access_tooltip      = __( 'You can choose what pages could be accessed by the users having Author Role on your Clean Up Booster Plugin. This could be achieved with the help of checkboxes mentioned below', 'clean-up-booster' );
		$cub_roles_and_capabilities_choose_page_editor_access_tooltip      = __( 'You can choose what pages could be accessed by the users having Editor Role on your Clean Up Booster Plugin. This could be achieved with the help of checkboxes mentioned below', 'clean-up-booster' );
		$cub_roles_and_capabilities_choose_page_contributor_access_tooltip = __( 'You can choose what pages could be accessed by the users having Contributor Role on your Clean Up Booster Plugin. This could be achieved with the help of checkboxes mentioned below', 'clean-up-booster' );
		$cub_roles_and_capabilities_choose_page_subscriber_access_tooltip  = __( 'You can choose what pages could be accessed by the users having Subscriber Role on your Clean Up Booster Plugin. This could be achieved with the help of checkboxes mentioned below', 'clean-up-booster' );
		$cub_roles_and_capabilities_choose_page_other_access_tooltip       = __( 'In this field, you would need to choose a specific page which is only available for Subscriber Access', 'clean-up-booster' );
		$cub_roles_and_capabilities_full_control_label                     = __( 'Full Control', 'clean-up-booster' );
		$cub_roles_and_capabilities_other_roles_capabilities               = __( 'In this field, you would need to choose appropriate capabilities for security purposes', 'clean-up-booster' );
		$cub_roles_and_capabilities_other_roles_capabilities_tooltip       = __( 'In this field, only users can access to these capabilities of Clean up Booster', 'clean-up-booster' );

		// Common Variables.
		$mb_upgrade_to                           = __( 'Upgrade to Premium Editions', 'clean-up-booster' );
		$cub_type_of_data                        = __( 'Type Of Data', 'clean-up-booster' );
		$cub_count                               = __( 'Count', 'clean-up-booster' );
		$cub_auto_drafts                         = __( 'Auto Drafts', 'clean-up-booster' );
		$cub_auto_drafts_tooltip                 = __( 'WordPress automatically saves Pages or Posts as a draft in WordPress Database. This is called an Auto Draft. You could have multiple Auto Drafts that you will never publish and hence you can clean them', 'clean-up-booster' );
		$cub_empty                               = __( 'Empty', 'clean-up-booster' );
		$cub_dashboard_transient_feed            = __( 'Dashboard Transient Feed', 'clean-up-booster' );
		$cub_dashboard_transient_feed_tooltip    = __( 'Transients Feed in WordPress allow developers to store information in your WordPress Database with an expiration time', 'clean-up-booster' );
		$cub_unapproved_comments                 = __( 'Unapproved Comments', 'clean-up-booster' );
		$cub_unapproved_comments_tooltip         = __( 'Unapproved Comments in WordPress are those comments which are still pending to be approved', 'clean-up-booster' );
		$cub_orphan_comment_meta                 = __( 'Orphan Comments Meta', 'clean-up-booster' );
		$cub_orphan_comment_meta_tooltip         = __( 'Orphan Comments Meta in WordPress holds miscellaneous bits of extra information of comment', 'clean-up-booster' );
		$cub_orphan_post_meta                    = __( 'Orphan Posts Meta', 'clean-up-booster' );
		$cub_orphan_post_meta_tooltip            = __( 'Orphan Posts Meta in WordPress is Meta Data belonging to posts which no longer exist', 'clean-up-booster' );
		$cub_orphan_relationships                = __( 'Orphan Relationships', 'clean-up-booster' );
		$cub_orphan_relationships_tooltip        = __( 'Orphan Relationships in WordPress hold junk or obsolete Category and Tag', 'clean-up-booster' );
		$cub_revisions                           = __( 'Revisions', 'clean-up-booster' );
		$cub_revisions_tooltip                   = __( 'WordPress Revisions system stores a record of each saved draft or published an update', 'clean-up-booster' );
		$cub_remove_pingbacks                    = __( 'Pingbacks', 'clean-up-booster' );
		$cub_remove_pingbacks_tooltip            = __( 'In WordPress, Ping-back is a type of comment that is created when you link to another blog post where Ping backs are enabled', 'clean-up-booster' );
		$cub_remove_transient_options            = __( 'Transient Options', 'clean-up-booster' );
		$cub_remove_transient_options_tooltip    = __( 'Transient Options are like a basic cache system used by WordPress', 'clean-up-booster' );
		$cub_remove_trackbacks                   = __( 'Trackbacks', 'clean-up-booster' );
		$cub_remove_trackbacks_tooltip           = __( 'In WordPress, Trackbacks are a way to notify legacy blog systems that you have linked to them', 'clean-up-booster' );
		$cub_spam_comments                       = __( 'Spam Comments', 'clean-up-booster' );
		$cub_spam_comments_tooltip               = __( 'Spam Comments are unwanted comments in WordPress Database', 'clean-up-booster' );
		$cub_trash_comments                      = __( 'Trash Comments', 'clean-up-booster' );
		$cub_trash_comments_tooltip              = __( 'Trash Comments are  comments which are stored in WordPress Trash after deletion', 'clean-up-booster' );
		$cub_drafts                              = __( 'Drafts', 'clean-up-booster' );
		$cub_drafts_tooltip                      = __( 'Drafts are New Post or Page created as Draft in WordPress', 'clean-up-booster' );
		$cub_deleted_posts                       = __( 'Deleted Posts', 'clean-up-booster' );
		$cub_deleted_posts_tooltip               = __( 'Deleted Posts are posts which are removed from WordPress Database', 'clean-up-booster' );
		$cub_duplicated_post_meta                = __( 'Duplicated Post Meta', 'clean-up-booster' );
		$cub_duplicated_post_meta_tooltip        = __( 'Duplicated Post Meta is duplicated values of Posts stored in a Posts Table in WordPress Database', 'clean-up-booster' );
		$cub_oembed_caches_post_meta             = __( 'oEmbed Caches in Post Meta', 'clean-up-booster' );
		$cub_oembed_caches_post_meta_tooltip     = __( 'oEmbed Caches in Post Meta hold data related to Embeddable Content in WordPress Database', 'clean-up-booster' );
		$cub_duplicated_comment_meta             = __( 'Duplicated Comment Meta', 'clean-up-booster' );
		$cub_duplicated_comment_meta_tooltip     = __( 'Duplicated Comment Meta holds information of Duplicate Comments in Comments Table in WordPress Database', 'clean-up-booster' );
		$cub_orphan_user_meta                    = __( 'Orphan User Meta', 'clean-up-booster' );
		$cub_orphan_user_meta_tooltip            = __( 'Orphan User Meta holds orphan data of an Usermeta table in WordPress Database', 'clean-up-booster' );
		$cub_duplicated_user_meta                = __( 'Duplicated User Meta', 'clean-up-booster' );
		$cub_duplicated_user_meta_tooltip        = __( 'Duplicated User Meta holds information of Duplicate user meta data in WordPress Database', 'clean-up-booster' );
		$cub_orphaned_term_relationships         = __( 'Orphaned Term Relationships', 'clean-up-booster' );
		$cub_orphaned_term_relationships_tooltip = __( 'Orphaned Term Relationships hold junk or obsolete term Category and Tag in WordPress Database', 'clean-up-booster' );
		$cub_unused_terms                        = __( 'Unused Terms', 'clean-up-booster' );
		$cub_unused_terms_tooltip                = __( 'Unused Terms hold term data which are not used by WordPress', 'clean-up-booster' );
		$cub_type                                = __( 'Type', 'clean-up-booster' );
		$cub_scheduled_start_date_time           = __( 'Start Date & Time', 'clean-up-booster' );
		$cub_data_action_label_scheduled_clean_up_tooltip = __( 'If you would like to empty selected types of data on a schedule then you would need to choose an Action from dropdown', 'clean-up-booster' );
		$cub_add_new_scheduled_duration_label_tooltip     = __( 'In this field, you would need to choose Time Duration for schedule to run. It could be Hourly or Daily', 'clean-up-booster' );
		$cub_table_name_heading                           = __( 'Table Name', 'clean-up-booster' );
		$cub_clean_up_clear_button_label                  = __( 'Clear', 'clean-up-booster' );
		$cub_clean_up_blocked_for_label                   = __( 'Blocked For', 'clean-up-booster' );
		$cub_one_hour                                     = __( '1 Hour', 'clean-up-booster' );
		$cub_twelve_hours                                 = __( '12 Hours', 'clean-up-booster' );
		$cub_twenty_four_hours                            = __( '24 Hours', 'clean-up-booster' );
		$cub_forty_eight_hours                            = __( '48 Hours', 'clean-up-booster' );
		$cub_one_week                                     = __( '1 Week', 'clean-up-booster' );
		$cub_one_month                                    = __( '1 Month', 'clean-up-booster' );
		$cub_one_permanently                              = __( 'Permanently', 'clean-up-booster' );
		$cub_never                                        = __( 'Never', 'clean-up-booster' );
		$cub_edit_tooltip                                 = __( 'Edit', 'clean-up-booster' );
		$cub_for                             = __( 'for', 'clean-up-booster' );
		$cub_apply                           = __( 'Apply', 'clean-up-booster' );
		$cub_delete                          = __( 'Delete', 'clean-up-booster' );
		$cub_block_ip_address                = __( 'Block IP Address', 'clean-up-booster' );
		$cub_ip_address                      = __( 'IP Address', 'clean-up-booster' );
		$cub_duration                        = __( 'Duration', 'clean-up-booster' );
		$cub_table_heading_blocked_date_time = __( 'Blocked Date & Time', 'clean-up-booster' );
		$cub_table_heading_release_date_time = __( 'Release Date & Time', 'clean-up-booster' );
		$cub_comments                        = __( 'Comments', 'clean-up-booster' );
		$cub_hourly                          = __( 'Hourly', 'clean-up-booster' );
		$cub_daily                           = __( 'Daily', 'clean-up-booster' );
		$cub_start_on                        = __( 'Start On', 'clean-up-booster' );
		$cub_start_on_placeholder            = __( 'Please choose Start On', 'clean-up-booster' );
		$cub_start_on_tooltip                = __( 'In this field, you would need to choose start date for scheduler to run', 'clean-up-booster' );
		$cub_start_time                      = __( 'Start Time', 'clean-up-booster' );
		$cub_start_time_tooltip              = __( 'In this field, you would need to choose a start time for scheduler to run at', 'clean-up-booster' );
		$cub_repeat_every                    = __( 'Repeat Every', 'clean-up-booster' );
		$cub_repeat_every_tooltip            = __( 'In this field, you would need to choose Repetition for the scheduler. The scheduler would be run on selected values from dropdown', 'clean-up-booster' );
		$cub_hrs                             = __( ' hrs', 'clean-up-booster' );
		$cub_mins                            = __( ' mins', 'clean-up-booster' );
		$cub_table_heading_ip_range          = __( 'IP Ranges', 'clean-up-booster' );
		$cub_start_date                      = __( 'Start Date', 'clean-up-booster' );
		$cub_start_date_placeholder          = __( 'Please choose Start Date', 'clean-up-booster' );
		$cub_end_date                        = __( 'End Date', 'clean-up-booster' );
		$cub_end_date_placeholder            = __( 'Please choose End Date', 'clean-up-booster' );
		$cub_submit                          = __( 'Submit', 'clean-up-booster' );
		$cub_table_heading_user_name         = __( 'User Name', 'clean-up-booster' );
		$cub_table_heading_date_time         = __( 'Date & Time', 'clean-up-booster' );
		$cub_table_heading_status            = __( 'Status', 'clean-up-booster' );
		$cub_table_heading_details           = __( 'Details', 'clean-up-booster' );
		$cub_name_hook_label                 = __( 'Name of the Hook', 'clean-up-booster' );
		$cub_interval_hook_label             = __( 'Interval Hook', 'clean-up-booster' );
		$cub_args_label                      = __( 'Args', 'clean-up-booster' );
		$cub_next_execution_label            = __( 'Next Execution', 'clean-up-booster' );
		$cub_subject_label                   = __( 'Subject', 'clean-up-booster' );
		$cub_bulk_action_dropdown            = __( 'Bulk Action', 'clean-up-booster' );
		$cub_action                          = __( 'Action', 'clean-up-booster' );
		$cub_optimize_dropdown               = __( 'Optimize', 'clean-up-booster' );
		$cub_repair_dropdown                 = __( 'Repair', 'clean-up-booster' );
		$cub_roles_capabilities_label        = __( 'Roles & Capabilities', 'clean-up-booster' );
		$cub_wordpress_data                  = __( 'WordPress Data', 'clean-up-booster' );
		$cub_database                        = __( 'Database', 'clean-up-booster' );
		$cub_manual_clean_up_label           = __( 'Manual Clean Up', 'clean-up-booster' );
		$cub_scheduled_clean_up_label        = __( 'Scheduled Clean Up', 'clean-up-booster' );
		$cub_wordpress_manual_clean_up_label = __( 'WordPress Data - Manual Clean Up', 'clean-up-booster' );

		$cub_worddpress_scheduled_clean_up_label = __( 'WordPress Data - Scheduled Clean Up', 'clean-up-booster' );
		$cub_database_scheduled_clean_up         = __( 'Database - Scheduled Clean Up', 'clean-up-booster' );
		$cub_database_manual_clean_up            = __( 'Database - Manual Clean Up', 'clean-up-booster' );
		$cub_add_new_scheduled_clean_up_label    = __( 'Add New Schedule Clean Up', 'clean-up-booster' );
		$cub_view_records_label                  = __( 'View Records', 'clean-up-booster' );
		$cub_logs_label                          = __( 'Logs', 'clean-up-booster' );
		$cub_logs_recent_login_logs              = __( 'Login Logs', 'clean-up-booster' );
		$cub_logs_live_traffic                   = __( 'Live Traffic', 'clean-up-booster' );
		$cub_logs_visitor_logs                   = __( 'Visitor Logs', 'clean-up-booster' );
		$cub_general_settings_label              = __( 'General Settings', 'clean-up-booster' );
		$cub_general_alert_setup                 = __( 'Alert Setup', 'clean-up-booster' );
		$cub_general_error_messages              = __( 'Error Messages', 'clean-up-booster' );
		$cub_general_other_settings              = __( 'Other Settings', 'clean-up-booster' );
		$cub_advance_security_label              = __( 'Advance Security', 'clean-up-booster' );
		$cub_advance_blocking_option             = __( 'Blocking Options', 'clean-up-booster' );
		$cub_advance_manage_ip_address           = __( 'Manage IP Addresses', 'clean-up-booster' );
		$cub_advance_manage_ip_range             = __( 'Manage IP Ranges', 'clean-up-booster' );
		$cub_advance_country_block               = __( 'Country Blocks', 'clean-up-booster' );
		$cub_email_templates_label               = __( 'Email Templates', 'clean-up-booster' );
		$cub_cron_jobs_label                     = __( 'Cron Jobs', 'clean-up-booster' );
		$cub_cron_custom_jobs_label              = __( 'Custom Cron Jobs', 'clean-up-booster' );
		$cub_cron_core_jobs_label                = __( 'Core Cron Jobs', 'clean-up-booster' );
		$cub_system_information_label            = __( 'System Information', 'clean-up-booster' );
		$cub_enable                              = __( 'Enable', 'clean-up-booster' );
		$cub_disable                             = __( 'Disable', 'clean-up-booster' );
		$cub_clean_up_booster                    = __( 'Clean Up Booster', 'clean-up-booster' );
		$cub_save_changes                        = __( 'Save Changes', 'clean-up-booster' );
		$cub_roles_capabilities_message          = __( 'You do not have Sufficient Access to this Page. Kindly contact the Administrator for more Privileges', 'clean-up-booster' );
		$cub_block                               = __( 'Block', 'clean-up-booster' );
	}
}
