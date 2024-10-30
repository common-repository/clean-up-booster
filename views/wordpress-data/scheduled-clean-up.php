<?php
/**
 * This Template is used for displaying schedulers of WordPress data.
 *
 * @author Tech Banker
 * @package clean-up-booster/views/wordpress-data
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
	} elseif ( WORDPRESS_DATA_SCHEDULED_CLEAN_UP_BOOSTER === '1' ) {
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
					<a href="admin.php?page=cub_clean_up_booster">
						<?php echo esc_attr( $cub_wordpress_data ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_scheduled_clean_up_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-hourglass"></i>
							<?php echo esc_attr( $cub_worddpress_scheduled_clean_up_label ); ?>
						</div>
						<p class="premium-editions-clean-up-booster">
							<?php echo esc_attr( $cub_upgrade_know_about ); ?> <a href="https://tech-banker.com/clean-up-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_full_features ); ?></a> <?php echo esc_attr( $cub_chek_our ); ?> <a href="https://tech-banker.com/clean-up-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_online_demos ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_schedule_clean_up">
							<div class="form-body">
								<div class="form-actions">
									<div class="table-top-margin">
										<select name="ux_ddl_scheduled" id="ux_ddl_scheduled" class="custom-bulk-width">
											<option value=""><?php echo esc_attr( $cub_bulk_action_dropdown ); ?></option>
											<option value="delete" style="color:red !important;"><?php echo esc_attr( $cub_delete ); ?> ( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</option>
										</select>
										<input type="button" class="btn vivid-green" name="ux_btn_apply" id="ux_btn_apply" value="<?php echo esc_attr( $cub_apply ); ?>" onclick="premium_edition_notification_clean_up_booster();">
										<a href="admin.php?page=cub_add_new_schedule_clean_up" class="btn vivid-green" name="ux_btn_apply" id="ux_btn_apply" ><?php echo esc_attr( $cub_add_new_scheduled_clean_up_label ); ?></a>
									</div>
									<table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_schedule_clean_up">
										<thead>
											<tr>
												<th style="text-align:center; width:4%;" class="chk-action">
													<input type="checkbox" class="custom-chkbox-operation" name="ux_chk_all_schedule" id="ux_chk_all_schedule">
												</th>
												<th style="width: 10%;">
													<label class="control-label">
														<?php echo esc_attr( $cub_type ); ?>
													</label>
												</th>
												<th style="width: 30%;">
													<label class="control-label">
													<?php echo esc_attr( $cub_type_of_data ); ?>
													</label>
												</th>
												<th style="width:10%;">
													<label class="control-label">
														<?php echo esc_attr( $cub_duration ); ?>
													</label>
												</th>
												<th style="width:18%;">
													<label class="control-label">
														<?php echo esc_attr( $cub_scheduled_start_date_time ); ?>
													</label>
												</th>
												<th style="text-align:center; width:10%;" class="chk-action">
													<label class="control-label">
														<?php echo esc_attr( $cub_action ); ?>
													</label>
												</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
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
					<a href="admin.php?page=cub_clean_up_booster">
						<?php echo esc_attr( $cub_wordpress_data ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_scheduled_clean_up_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-hourglass"></i>
							<?php echo esc_attr( $cub_worddpress_scheduled_clean_up_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_schedule_clean_up">
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
