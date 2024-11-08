<?php
/**
 * This Template is used for displaying Email Templates.
 *
 * @author Tech Banker
 * @package clean-up-booster/views/email-templates
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
	} elseif ( EMAIL_TEMPLATES_CLEAN_UP_BOOSTER === '1' ) {
		$email_template_data = wp_create_nonce( 'email_template_data' );
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
					<span>
						<?php echo esc_attr( $cub_email_templates_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-link"></i>
							<?php echo esc_attr( $cub_email_templates_label ); ?>
						</div>
						<p class="premium-editions-clean-up-booster">
							<?php echo esc_attr( $cub_upgrade_know_about ); ?> <a href="https://tech-banker.com/clean-up-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_full_features ); ?></a> <?php echo esc_attr( $cub_chek_our ); ?> <a href="https://tech-banker.com/clean-up-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_online_demos ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_email_templates">
							<div class="form-body">
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_email_templates_choose_email_template_label ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_email_templates_choose_template_tooltip ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
									</label>
									<select name="ux_ddl_user_success" id="ux_ddl_user_success" class="form-control" onchange="template_change_data_clean_up_booster();">
										<option value="template_for_user_success"><?php echo esc_attr( $cub_email_templates_successful_login_dropdown ); ?></option>
										<option value="template_for_user_failure"><?php echo esc_attr( $cub_email_templates_failure_login_dropdown ); ?></option>
										<option value="template_for_ip_address_blocked"><?php echo esc_attr( $cub_email_templates_ip_address_blocked_dropdown ); ?></option>
										<option value="template_for_ip_address_unblocked"><?php echo esc_attr( $cub_email_templates_ip_address_unblocked_dropdown ); ?></option>
										<option value="template_for_ip_range_blocked"><?php echo esc_attr( $cub_email_templates_ip_range_blocked_dropdown ); ?></option>
										<option value="template_for_ip_range_unblocked"><?php echo esc_attr( $cub_email_templates_ip_range_unblocked_dropdown ); ?></option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_email_templates_send_to_label ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_email_templates_send_emails_address_tooltip ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
									</label>
									<input type="text" class="form-control" name="ux_txt_send_to" id="ux_txt_send_to" value="" placeholder="<?php echo esc_attr( $cub_email_templates_email_address_placeholder ); ?>">
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_email_templates_cc_label ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_email_templates_cc_email_address_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_cc" id="ux_txt_cc" placeholder="<?php echo esc_attr( $cub_email_templates_cc_email_placeholder ); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_email_templates_bcc_label ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_email_templates_bcc_email_address_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_bcc" id="ux_txt_bcc" placeholder="<?php echo esc_attr( $cub_email_templates_bcc_email_placeholder ); ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_subject_label ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_email_templates_subject_email_tooltip ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
									</label>
									<input type="text" class="form-control" name="ux_txt_subject" id="ux_txt_subject"  placeholder="<?php echo esc_attr( $cub_email_templates_subject_placeholder ); ?>">
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_email_templates_message_label ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_email_templates_content_email_tooltip ); ?>" data-placement="right"></i>
										<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
									</label>
									<?php
									$distribution                 = '';
									wp_editor( $distribution, $id = 'ux_heading_content', array( 'media_buttons' => false, 'textarea_rows' => 8, 'tabindex' => 4 ) ); // @codingStandardsIgnoreLine.
									?>
								</div>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<input type="hidden" id="ux_email_template_meta_id" value=""/>
										<input type="submit" class="btn vivid-green" name="ux_btn_email_change" id="ux_btn_email_change" value="<?php echo esc_attr( $cub_save_changes ); ?>">
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
					<span>
						<?php echo esc_attr( $cub_email_templates_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-link"></i>
							<?php echo esc_attr( $cub_email_templates_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_email_templates">
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
