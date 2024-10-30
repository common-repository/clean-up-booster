<?php
/**
 * This Template is used for displaying live traffic logs.
 *
 * @author Tech Banker
 * @package clean-up-booster/views/logs
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
	} elseif ( LOGS_CLEAN_UP_BOOSTER === '1' ) {
		$traffic_delete = wp_create_nonce( 'traffic_delete' );
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
					<a href="admin.php?page=cub_live_traffic">
						<?php echo esc_attr( $cub_logs_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_logs_live_traffic ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-directions"></i>
							<?php echo esc_attr( $cub_live_traffic_on_world_map_label ); ?>
						</div>
						<div class="caption pull-right" style="font-size:12px">
							<strong>Next Refresh in
							<span class="timer"></span> Seconds</strong>
						</div>
						<p class="premium-editions-clean-up-booster">
							<?php echo esc_attr( $cub_upgrade_know_about ); ?> <a href="https://tech-banker.com/clean-up-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_full_features ); ?></a> <?php echo esc_attr( $cub_chek_our ); ?> <a href="https://tech-banker.com/clean-up-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_online_demos ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_live_traffic">
							<div class="form-body">
								<div id="map_canvas" class="custom-map"></div>
							</div>
						</form>
					</div>
				</div>
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-directions"></i>
							<?php echo esc_attr( $cub_logs_live_traffic ); ?>
						</div>
						<div class="caption pull-right" style="font-size:12px">
							<strong> Next Refresh in
							<span class="timer"></span> Seconds</strong>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_live_traffic_logs">
							<div class="form-body">
								<?php
								if ( 'enable' == $live_traffic_logs_data['live_traffic_monitoring'] ) { // WPCS:loose comparison ok.
									?>
									<div class="form-actions">
										<div class="table-top-margin">
											<select name="ux_ddl_live_traffic" id="ux_ddl_live_traffic" class="custom-bulk-width"  onchange="clean_up_booster_show_time_for('#ux_ddl_live_traffic', '#ux_ddl_live_traffic_ip_blocked_for');">
												<option value=""><?php echo esc_attr( $cub_bulk_action_dropdown ); ?></option>
												<option value="delete" style="color: red;"><?php echo esc_attr( $cub_delete ) . ' ( ' . esc_attr( $cub_premium_editions_label ) . ' )'; ?></option>
												<option value="block" style="color: red;"><?php echo esc_attr( $cub_block ) . ' ( ' . esc_attr( $cub_premium_editions_label ) . ' )'; ?></option>
											</select>
											<select name="ux_ddl_live_traffic_ip_blocked_for" id="ux_ddl_live_traffic_ip_blocked_for" style="display:none" class="custom-bulk-width">
												<option value="1Hour"><?php echo esc_attr( $cub_one_hour ); ?></option>
												<option value="12Hour"><?php echo esc_attr( $cub_twelve_hours ); ?></option>
												<option value="24hours"><?php echo esc_attr( $cub_twenty_four_hours ); ?></option>
												<option value="48hours"><?php echo esc_attr( $cub_forty_eight_hours ); ?></option>
												<option value="week"><?php echo esc_attr( $cub_one_week ); ?></option>
												<option value="month"><?php echo esc_attr( $cub_one_month ); ?></option>
												<option value="permanently"><?php echo esc_attr( $cub_one_permanently ); ?></option>
											</select>
											<input type="button" class="btn vivid-green" name="ux_btn_apply" id="ux_btn_apply" onclick="premium_edition_notification_clean_up_booster();" value="<?php echo esc_attr( $cub_apply ); ?>">
										</div>
										<table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_live_traffic">
											<thead>
												<tr>
													<th  style="text-align:center;width: 5% !important;" class="chk-action">
														<input type="checkbox" name="ux_chk_all_live_traffic" id="ux_chk_all_live_traffic" >
													</th>
													<th style="width: 15%;">
														<label class="control-label" >
															<?php echo esc_attr( $cub_table_heading_user_name ); ?>
														</label>
													</th>
													<th style="width: 15%;">
														<label class="control-label">
															<?php echo esc_attr( $cub_ip_address ); ?>
														</label>
													</th>
													<th style="width: 15%;">
														<label class="control-label">
															<?php echo esc_attr( $cub_location ); ?>
														</label>
													</th>
													<th style="width: 25%;">
														<label class="control-label">
															<?php echo esc_attr( $cub_table_heading_details ); ?>
														</label>
													</th>
													<th style="width: 15%;">
														<label class="control-label">
															<?php echo esc_attr( $cub_table_heading_date_time ); ?>
														</label>
													</th>
													<th style="text-align:center;width: 10%;" class="chk-action">
														<label class="control-label">
															<?php echo esc_attr( $cub_action ); ?>
														</label>
													</th>
												</tr>
											</thead>
											<tbody id="dynamic_table_filter">
												<?php
												if ( isset( $data_logs ) && count( $data_logs ) > 0 ) {
													foreach ( $data_logs as $row ) {
														?>
														<tr>
															<td  style="text-align: center;width: 5% !important;">
																<input type="checkbox" name="ux_chk_live_traffic_<?php echo esc_attr( $row['meta_id'] ); ?>" id="ux_chk_live_traffic_<?php echo esc_attr( $row['meta_id'] ); ?>" value="<?php echo esc_attr( $row['meta_id'] ); ?>" onclick="check_all_clean_up_booster('#ux_chk_all_live_traffic');">
															</td>
															<td style="width: 15%;">
																<label>
																	<?php echo '' != $row['username'] ? esc_attr( $row['username'] ) : esc_attr( $cub_not_available ); // WPCS:loose comparison ok. ?>
																</label>
															</td>
															<td style="width: 15%;">
																<label>
																	<?php echo esc_attr( long2ip_clean_up_booster( $row['user_ip_address'] ) ); ?>
																</label>
															</td>
															<td style="width: 15%;">
																<label>
																	<?php echo '' != $row['location'] ? esc_attr( $row['location'] ) : esc_attr( $cub_not_available ); // WPCS:loose comparison ok. ?>
																</label>
															</td>
															<td style="width: 25%;">
																<label>
																	<?php echo esc_attr( $cub_live_traffic_resources ); ?>: <?php echo esc_attr( $row['resources'] ); ?><br/>
																	<?php echo esc_attr( $cub_http_user_agent ); ?>: <?php echo esc_attr( $row['http_user_agent'] ); ?>
																</label>
															</td>
															<td style="width: 15%;">
																<label>
																	<?php echo esc_attr( date( 'd M Y h:i A', $row['date_time'] ) ); ?>
																</label>
															</td>
															<td class="custom-alternative" style="width: 10%;">
																<a href="javascript:void(0);" class="icon-custom-trash tooltips" data-original-title="<?php echo esc_attr( $cub_delete ); ?>" data-placement="top" onclick="live_selected_delete_clean_up_booster(<?php echo intval( $row['meta_id'] ); ?>)"></a>
																<a href="javascript:void(0);" class="icon-custom-ban tooltips" data-original-title="<?php echo esc_attr( $cub_block_ip_address ); ?>" data-placement="right" onclick="premium_edition_notification_clean_up_booster();"></a>
															</td>
														</tr>
														<?php
													}
												}
												?>
											</tbody>
										</table>
									</div>
									<?php
								} else {
									?>
									<strong>
										<?php echo esc_attr( $cub_live_traffic_monitoring_message ); ?>
									</strong>
									<?php
								}
								?>
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
					<a href="admin.php?page=cub_live_traffic">
						<?php echo esc_attr( $cub_logs_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_logs_live_traffic ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-directions"></i>
							<?php echo esc_attr( $cub_logs_live_traffic ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_live_traffic_logs">
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
