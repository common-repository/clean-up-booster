<?php
/**
 * This Template is used for Wizard
 *
 * @author  Tech Banker
 * @package clean-up-booster/views/wizard
 * @version 3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
if ( ! is_user_logged_in() ) {
	return;
} else {
	$access_granted = false;
	foreach ( $user_role_permission as $permission ) {
		if ( current_user_can( $permission ) ) {
			$access_granted = true;
			break;
		}
	}
	if ( ! $access_granted ) {
		return;
	} else {
		$clean_up_booster_check_status = wp_create_nonce( 'clean_up_booster_check_status' );
		?>
		<html>
			<body>
				<div><div><div>
					<div class="page-container header-wizard">
						<div class="page-content">
							<div class="row row-custom">
								<div class="col-md-12 textalign">
									<p><?php echo esc_attr( __( 'Hi there!', 'clean-up-booster' ) ); ?></p>
									<p><?php echo esc_attr( __( 'Don\'t ever miss an opportunity to opt in for Email Notifications / Announcements about exciting New Features and Update Releases.', 'clean-up-booster' ) ); ?></p>
									<p><?php echo esc_attr( __( 'Contribute in helping us making our plugin compatible with most plugins and themes by allowing to share non-sensitive information about your website.', 'clean-up-booster' ) ); ?></p>
									<p><?php echo esc_attr( __( 'If you opt in, some data about your usage of Clean Up Booster Plugin will be sent to our servers for Compatiblity Testing Purposes and email notifications.', 'clean-up-booster' ) ); ?></p>
								</div>
							</div>
							<div class="row row-custom">
								<div class="col-md-12">
									<div style="padding-left: 40px;">
										<label style="font-size:16px;" class="control-label">
											<?php echo 'Email Address for Notifications'; ?> :
										</label>
										<span id="ux_txt_validation_gdpr_clean_up_booster" style="display:none;vertical-align:middle;">*</span>
										<input type="text" style="width: 90%;" class="form-control" name="ux_txt_email_address_notifications" id="ux_txt_email_address_notifications" value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>">
									</div>
									<div class="textalign">
										<p><?php echo esc_attr( __( 'If you\'re not ready to Opt-In, that\'s ok too!', 'clean-up-booster' ) ); ?></p>
										<p><strong><?php echo esc_attr( __( 'Clean Up Booster will still work fine.', 'clean-up-booster' ) ); ?></strong></p>
									</div>
								</div>
								<div class="col-md-12">
									<a class="permissions" onclick="show_hide_details_clean_up_booster();"><?php echo esc_attr( __( 'What permissions are being granted?', 'clean-up-booster' ) ); ?></a>
								</div>
								<div class="col-md-12" style="display:none;" id="ux_div_wizard_set_up">
									<div class="col-md-6">
										<ul>
											<li>
												<i class="dashicons dashicons-admin-users cub-dashicons-admin-users"></i>
												<div class="admin">
													<span><strong><?php echo esc_attr( __( 'User Details', 'clean-up-booster' ) ); ?></strong></span>
													<p><?php echo esc_attr( __( 'Name and Email Address', 'clean-up-booster' ) ); ?></p>
												</div>
											</li>
										</ul>
									</div>
									<div class="col-md-6 align align2">
										<ul>
											<li>
												<i class="dashicons dashicons-admin-plugins cub-dashicons-admin-plugins"></i>
												<div class="admin-plugins">
													<span><strong><?php echo esc_attr( __( 'Current Plugin Status', 'clean-up-booster' ) ); ?></strong></span>
													<p><?php echo esc_attr( __( 'Activation, Deactivation and Uninstall', 'clean-up-booster' ) ); ?></p>
												</div>
											</li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul>
											<li>
												<i class="dashicons dashicons-testimonial cub-dashicons-testimonial"></i>
												<div class="testimonial">
													<span><strong><?php echo esc_attr( __( 'Notifications', 'clean-up-booster' ) ); ?></strong></span>
													<p><?php echo esc_attr( __( 'Updates &amp; Announcements', 'clean-up-booster' ) ); ?></p>
												</div>
											</li>
										</ul>
									</div>
									<div class="col-md-6 align2">
										<ul>
											<li>
												<i class="dashicons dashicons-welcome-view-site cub-dashicons-welcome-view-site"></i>
												<div class="settings">
													<span><strong><?php echo esc_attr( __( 'Website Overview', 'clean-up-booster' ) ); ?></strong></span>
													<p><?php echo esc_attr( __( 'Site URL, WP Version, PHP Info, Plugins &amp; Themes Info', 'clean-up-booster' ) ); ?></p>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-12" style="margin-bottom:5px;">
							</div>
							<div class="col-md-12 allow">
								<div class="tech-banker-actions">
									<a onclick="plugin_stats_clean_up_booster('opt_in');" class="button button-primary-wizard">
										<strong><?php echo esc_attr( __( 'Opt-In &amp; Continue', 'clean-up-booster' ) ); ?> </strong>
										<i class="dashicons dashicons-arrow-right-alt cub-dashicons-arrow-right-alt"></i>
									</a>
									<a onclick="plugin_stats_clean_up_booster('skip');" class="button button-secondary-wizard" tabindex="2">
										<strong><?php echo esc_attr( __( 'Skip &amp; Continue', 'clean-up-booster' ) ); ?> </strong>
										<i class="dashicons dashicons-arrow-right-alt cub-dashicons-arrow-right-alt"></i>
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-12 terms">
								<a href="https://tech-banker.com/privacy-policy/" target="_blank"><?php echo esc_attr( __( 'Privacy Policy', 'clean-up-booster' ) ); ?></a>
								<span> - </span>
								<a href="https://tech-banker.com/terms-and-conditions/" target="_blank"><?php echo esc_attr( __( 'Terms &amp; Conditions', 'clean-up-booster' ) ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</body>
		</html>
		<?php
	}
}
