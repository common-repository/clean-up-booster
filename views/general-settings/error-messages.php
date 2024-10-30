<?php
/**
 * This Template is used for displaying error messages.
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
						<?php echo esc_attr( $cub_general_error_messages ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-shield"></i>
							<?php echo esc_attr( $cub_general_error_messages ); ?>
						</div>
						<p class="premium-editions-clean-up-booster">
							<?php echo esc_attr( $cub_upgrade_know_about ); ?> <a href="https://tech-banker.com/clean-up-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_full_features ); ?></a> <?php echo esc_attr( $cub_chek_our ); ?> <a href="https://tech-banker.com/clean-up-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_online_demos ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_error_messages">
							<div class="form-body">
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_error_messages_max_login_attempts_label ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_error_messages_max_login_attempts_label_tooltip ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">* ( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
									</label>
									<textarea class="form-control" name="ux_txt_login_attempts" id="ux_txt_login_attempts"  placeholder="<?php echo esc_attr( $cub_error_messages_max_login_attempts_label_placeholder ); ?>"><?php echo isset( $meta_data_array['for_maximum_login_attempts'] ) ? trim( htmlspecialchars( htmlspecialchars_decode( $meta_data_array['for_maximum_login_attempts'] ) ) ) : ''; // WPCS: XSS ok. ?></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_error_messages_blocked_country_label ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_error_messages_blocked_country_tooltip ); ?>"data-placement="right"></i>
										<span class="required" aria-required="true">* ( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
									</label>
									<textarea class="form-control" name="ux_txt_blocked_country" id="ux_txt_blocked_country"  placeholder="<?php echo esc_attr( $cub_error_messages_blocked_country_placeholder ); ?>"><?php echo isset( $meta_data_array['for_blocked_country_error'] ) ? trim( htmlspecialchars( htmlspecialchars_decode( $meta_data_array['for_blocked_country_error'] ) ) ) : ''; // WPCS: XSS ok. ?></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_error_messages_max_ip_address_label ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_error_messages_max_ip_address_tooltip ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">* ( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
									</label>
									<textarea class="form-control" name="ux_txt_ip_address" id="ux_txt_ip_address"  placeholder="<?php echo esc_attr( $cub_error_messages_max_ip_address_placeholder ); ?>"><?php echo isset( $meta_data_array['for_blocked_ip_address_error'] ) ? trim( htmlspecialchars( htmlspecialchars_decode( $meta_data_array['for_blocked_ip_address_error'] ) ) ) : ''; // WPCS: XSS ok. ?></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_error_messages_max_ip_range_label ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_error_messages_max_ip_range_tooltip ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">* ( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
									</label>
									<textarea class="form-control" name="ux_txt_ip_range" id="ux_txt_ip_range"  placeholder="<?php echo esc_attr( $cub_error_messages_max_ip_range_placeholder ); ?>"><?php echo isset( $meta_data_array['for_blocked_ip_range_error'] ) ? trim( htmlspecialchars( htmlspecialchars_decode( $meta_data_array['for_blocked_ip_range_error'] ) ) ) : ''; // WPCS: XSS ok. ?></textarea>
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
						<?php echo esc_attr( $cub_general_error_messages ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-shield"></i>
							<?php echo esc_attr( $cub_general_error_messages ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_configuration">
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
