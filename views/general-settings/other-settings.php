<?php
/**
 * This Template is used for managing Other Plugin settings.
 *
 * @author Tech Banker
 * @package clean-up-booster/views/general-settings
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
	} elseif ( GENERAL_SETTINGS_CLEAN_UP_BOOSTER === '1' ) {
		$clean_up_other_settings = wp_create_nonce( 'clean_up_other_settings' );
		?>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="icon-custom-home"></i>
					<a href="admin.php?page=cub_clean_up_booster">
						<?php echo esc_attr( $cub_clean_up_booster ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<a href="admin.php?page=cub_alert_setup">
							<?php echo esc_attr( $cub_general_settings_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
							<?php echo esc_attr( $cub_general_other_settings ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-wrench"></i>
							<?php echo esc_attr( $cub_general_other_settings ); ?>
						</div>
						<p class="premium-editions-clean-up-booster">
							<?php echo esc_attr( $cub_upgrade_know_about ); ?> <a href="https://tech-banker.com/clean-up-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_full_features ); ?></a> <?php echo esc_attr( $cub_chek_our ); ?> <a href="https://tech-banker.com/clean-up-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_online_demos ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_other_settings">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_other_settings_trackbacks_label ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_other_settings_trackbacks_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select name="ux_ddl_trackback" id="ux_ddl_trackback" class="form-control">
												<option value="enable"><?php echo esc_attr( $cub_enable ); ?></option>
												<option value="disable"><?php echo esc_attr( $cub_disable ); ?></option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_comments ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_other_settings_comments_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select name="ux_ddl_Comments" id="ux_ddl_Comments" class="form-control">
												<option value="enable"><?php echo esc_attr( $cub_enable ); ?></option>
												<option value="disable"><?php echo esc_attr( $cub_disable ); ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_other_settings_live_traffic_monitoring_label ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_other_settings_live_traffic_monitoring_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select name="ux_ddl_live_traffic_monitoring" id="ux_ddl_live_traffic_monitoring" class="form-control">
												<option value="enable"><?php echo esc_attr( $cub_enable ); ?></option>
												<option value="disable"><?php echo esc_attr( $cub_disable ); ?></option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_other_settings_visitor_logs_monitoring_label ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_other_settings_visitor_logs_monitoring_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select name="ux_ddl_visitor_log_monitoring" id="ux_ddl_visitor_log_monitoring" class="form-control">
												<option value="enable"><?php echo esc_attr( $cub_enable ); ?></option>
												<option value="disable"><?php echo esc_attr( $cub_disable ); ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_other_settings_remove_tables_at_uninstall ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_other_settings_remove_tables_at_uninstall_tooltip ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">*</span>
									</label>
									<select name="ux_ddl_remove_tables" id="ux_ddl_remove_tables" class="form-control">
										<option value="enable"><?php echo esc_attr( $cub_enable ); ?></option>
										<option value="disable"><?php echo esc_attr( $cub_disable ); ?></option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_other_settings_ip_address_fetching_method ); ?> :
										<i class="icon-custom-question tooltips" data-original-title= "<?php echo esc_attr( $cub_other_settings_ip_address_tooltips ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">*</span>
									</label>
									<select name="ux_ddl_fetching_method" id="ux_ddl_fetching_method" class="form-control">
										<option value=""><?php echo esc_attr( $cub_other_settings_ip_address_fetching_option1 ); ?></option>
										<option value="REMOTE_ADDR"><?php echo esc_attr( $cub_other_settings_ip_address_fetching_option2 ); ?></option>
										<option value="HTTP_X_FORWADED_FOR"><?php echo esc_attr( $cub_other_settings_ip_address_fetching_option3 ); ?></option>
										<option value="HTTP_X_REAL_IP"><?php echo esc_attr( $cub_other_settings_ip_address_fetching_option4 ); ?></option>
										<option value="HTTP_CF_CONNECTING_IP"><?php echo esc_attr( $cub_other_settings_ip_address_fetching_option5 ); ?></option>
									</select>
								</div>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo esc_attr( $cub_save_changes ); ?>">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
	} else {
		?>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="icon-custom-home"></i>
					<a href="admin.php?page=cub_clean_up_booster">
						<?php echo esc_attr( $cub_clean_up_booster ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<a href="admin.php?page=cub_alert_setup">
						<?php echo esc_attr( $cub_general_settings_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_general_other_settings ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-wrench"></i>
							<?php echo esc_attr( $cub_general_other_settings ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_add_new_notification">
							<div class="form-body">
								<strong><?php echo esc_attr( $cub_roles_capabilities_message ); ?></strong>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
