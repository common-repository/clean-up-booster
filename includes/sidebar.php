<?php
/**
 * This File is used for displaying Sidebar Menus.
 *
 * @author Tech Banker
 * @package clean-up-booster/includes
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
		?>

		<div class="page-sidebar-wrapper-tech-banker">
			<div class="page-sidebar-tech-banker navbar-collapse collapse">
				<div class="sidebar-menu-tech-banker">
					<ul class="page-sidebar-menu-tech-banker" data-slide-speed="200">
						<div class="sidebar-search-wrapper" style="padding:20px;text-align:center">
							<a class="plugin-logo" href="<?php echo esc_attr( TECH_BANKER_SITE_URL ); ?>" target="_blank">
								<img src="<?php echo esc_attr( plugins_url( 'assets/global/img/logo.png', dirname( __FILE__ ) ) ); ?>" alt ="Clean Up Booster"/>
							</a>
						</div>
						<li id="ux_li_wordpress_data">
							<a href="javascript:;">
								<i class="icon-custom-grid"></i>
								<span class="title">
									<?php echo esc_attr( $cub_wordpress_data ); ?>
								</span>
							</a>
							<ul class="sub-menu">
								<li id="ux_li_wp_manual_clean_up">
									<a href="admin.php?page=cub_clean_up_booster">
										<i class="icon-custom-note"></i>
										<span class="title">
											<?php echo esc_attr( $cub_manual_clean_up_label ); ?>
										</span>
									</a>
								</li>
								<li id="ux_li_wp_scheduled_clean_up">
									<a href="admin.php?page=cub_scheduled_clean_up">
										<i class="icon-custom-hourglass"></i>
										<span class="title">
											<?php echo esc_attr( $cub_scheduled_clean_up_label ); ?>
										</span>
										<span class="badge"> Pro </span>
									</a>
								</li>
							</ul>
						</li>
						<li id="ux_li_database">
							<a href="javascript:;">
								<i class="icon-custom-book-open"></i>
								<span class="title">
									<?php echo esc_attr( $cub_database ); ?>
								</span>
							</a>
							<ul class="sub-menu">
								<li id="ux_li_manual_clean_up">
									<a href="admin.php?page=cub_database_manual_clean_up">
										<i class="icon-custom-note"></i>
										<span class="title">
											<?php echo esc_attr( $cub_manual_clean_up_label ); ?>
										</span>
									</a>
								</li>
								<li id="ux_li_scheduled_clean_up">
									<a href="admin.php?page=cub_database_scheduled_clean_up">
										<i class="icon-custom-hourglass"></i>
										<span class="title">
											<?php echo esc_attr( $cub_scheduled_clean_up_label ); ?>
										</span>
										<span class="badge"> Pro </sapn>
									</a>
								</li>
							</ul>
						</li>
						<li id="ux_li_logs">
							<a href="javascript:;">
								<i class="icon-custom-docs"></i>
								<span class="title">
									<?php echo esc_attr( $cub_logs_label ); ?>
								</span>
							</a>
							<ul class="sub-menu">
								<li id="ux_li_live_traffic">
									<a href="admin.php?page=cub_live_traffic">
										<i class="icon-custom-directions"></i>
										<span class="title">
											<?php echo esc_attr( $cub_logs_live_traffic ); ?>
										</span>
									</a>
								</li>
								<li id="ux_li_recent_logins">
									<a href="admin.php?page=cub_recent_logins">
										<i class="icon-custom-clock"></i>
										<span class="title">
											<?php echo esc_attr( $cub_logs_recent_login_logs ); ?>
										</span>
									</a>
								</li>
								<li id="ux_li_visitor_logs">
									<a href="admin.php?page=cub_visitor_logs">
										<i class="icon-custom-users"></i>
										<span class="title">
											<?php echo esc_attr( $cub_logs_visitor_logs ); ?>
										</span>
									</a>
								</li>
							</ul>
						</li>
						<li id="ux_li_general_settings">
							<a href="javascript:;">
								<i class="icon-custom-settings"></i>
								<span class="title">
									<?php echo esc_attr( $cub_general_settings_label ); ?>
								</span>
							</a>
							<ul class="sub-menu">
								<li id="ux_li_alert_setup">
									<a href="admin.php?page=cub_alert_setup">
										<i class="icon-custom-bell"></i>
										<span class="title">
											<?php echo esc_attr( $cub_general_alert_setup ); ?>
										</span>
										<span class="badge"> Pro </span>
									</a>
								</li>
								<li id="ux_li_error_messages">
									<a href="admin.php?page=cub_error_messages">
										<i class="icon-custom-shield"></i>
										<span class="title">
											<?php echo esc_attr( $cub_general_error_messages ); ?>
										</span>
										<span class="badge"> Pro </span>
									</a>
								</li>
								<li id="ux_li_other_settings">
									<a href="admin.php?page=cub_other_settings">
										<i class="icon-custom-wrench"></i>
										<span class="title">
											<?php echo esc_attr( $cub_general_other_settings ); ?>
										</span>
									</a>
								</li>
							</ul>
						</li>
						<li id="ux_li_advance_security">
							<a href="javascript:;">
								<i class="icon-custom-lock"></i>
								<span class="title">
									<?php echo esc_attr( $cub_advance_security_label ); ?>
								</span>
							</a>
							<ul class="sub-menu">
								<li id="ux_li_blocking_options">
									<a href="admin.php?page=cub_blocking_options">
										<i class="icon-custom-shield"></i>
										<span class="title">
											<?php echo esc_attr( $cub_advance_blocking_option ); ?>
										</span>
									</a>
								</li>
								<li id="ux_li_manage_ip_addresses">
									<a href="admin.php?page=cub_manage_ip_addresses">
										<i class="icon-custom-globe"></i>
										<span class="title">
											<?php echo esc_attr( $cub_advance_manage_ip_address ); ?>
										</span>
									</a>
								</li>
								<li id="ux_li_manage_ip_ranges">
									<a href="admin.php?page=cub_manage_ip_ranges">
										<i class="icon-custom-wrench"></i>
										<span class="title">
											<?php echo esc_attr( $cub_advance_manage_ip_range ); ?>
										</span>
									</a>
								</li>
								<li id="ux_li_country_blocks">
									<a href="admin.php?page=cub_country_blocks">
										<i class="icon-custom-target"></i>
										<span class="title">
											<?php echo esc_attr( $cub_advance_country_block ); ?>
										</span>
										<span class="badge"> Pro </span>
									</a>
								</li>
							</ul>
						</li>
						<li id="ux_li_email_templates">
							<a href="admin.php?page=cub_email_templates">
								<i class="icon-custom-link"></i>
								<span class="title">
									<?php echo esc_attr( $cub_email_templates_label ); ?>
								</span>
								<span class="badge"> Pro </span>
							</a>
						</li>
						<li id="ux_li_roles_capabilities">
							<a href="admin.php?page=cub_roles_and_capabilities">
								<i class="icon-custom-users"></i>
								<span class="title">
									<?php echo esc_attr( $cub_roles_capabilities_label ); ?>
								</span>
								<span class="badge"> Pro </span>
							</a>
						</li>
						<li id="ux_li_cron_jobs">
							<a href="javascript:;">
								<i class="icon-custom-speedometer"></i>
								<span class="title">
									<?php echo esc_attr( $cub_cron_jobs_label ); ?>
								</span>
							</a>
							<ul class="sub-menu">
								<li id="ux_li_custom_cron_jobs">
									<a href="admin.php?page=cub_custom_cron_jobs">
										<i class="icon-custom-user"></i>
										<span class="title">
											<?php echo esc_attr( $cub_cron_custom_jobs_label ); ?>
										</span>
										<span class="badge"> Pro </span>
									</a>
								</li>
								<li id="ux_li_core_cron_jobs">
									<a href="admin.php?page=cub_core_cron_jobs">
										<i class="icon-custom-folder"></i>
										<span class="title">
											<?php echo esc_attr( $cub_cron_core_jobs_label ); ?>
										</span>
									</a>
								</li>
							</ul>
						</li>
						<li id="ux_li_support_forum">
							<a href="https://wordpress.org/support/plugin/clean-up-booster" target="_blank">
								<i class="icon-custom-users"></i>
								<span class="title">
									<?php echo esc_attr( $cub_support_forum ); ?>
								</span>
							</a>
						</li>
						<li id="ux_li_system_information">
							<a href="admin.php?page=cub_system_information">
								<i class="icon-custom-screen-desktop"></i>
								<span class="title">
									<?php echo esc_attr( $cub_system_information_label ); ?>
								</span>
							</a>
						</li>
						<li id="ux_li_premium_editions">
							<a href="https://tech-banker.com/clean-up-booster/pricing/" target="_blank">
								<i class="icon-custom-briefcase"></i>
								<strong><span class="title" style="color:yellow;">
									<?php echo esc_attr( $cub_upgrade ); ?>
								</span></strong>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="page-content-wrapper">
			<div class="page-content">
		<?php
	}
}
