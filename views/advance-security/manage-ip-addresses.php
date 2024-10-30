<?php
/**
 * This Template is used for managing IP addresses.
 *
 * @author Tech Banker
 * @package clean-up-booster/views/advance-security
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
	} elseif ( ADVANCE_SECURITY_CLEAN_UP_BOOSTER === '1' ) {
		$timestamp                         = CLEAN_UP_BOOSTER_LOCAL_TIME;
		$start_date                        = $timestamp - 2592000;
		$clean_up_manage_ip_address        = wp_create_nonce( 'clean_up_manage_ip_address' );
		$clean_up_manage_ip_address_delete = wp_create_nonce( 'clean_up_manage_ip_address_delete' );
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
					<a href="admin.php?page=cub_blocking_options">
						<?php echo esc_attr( $cub_advance_security_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_advance_manage_ip_address ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-globe"></i>
							<?php echo esc_attr( $cub_advance_manage_ip_address ); ?>
						</div>
						<p class="premium-editions-clean-up-booster">
							<?php echo esc_attr( $cub_upgrade_know_about ); ?> <a href="https://tech-banker.com/clean-up-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_full_features ); ?></a> <?php echo esc_attr( $cub_chek_our ); ?> <a href="https://tech-banker.com/clean-up-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_online_demos ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_manage_ip_addresses_form">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_ip_address ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_manage_ip_addresses_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_ip_address" id="ux_txt_ip_address" placeholder="<?php echo esc_attr( $cub_valid_ip_address_message ); ?>" onblur="check_clean_up_booster_ip_address();" value="<?php echo isset( $_REQUEST['ip_address'] ) ? esc_attr( long2ip_clean_up_booster( $_REQUEST['ip_address'] ) ) : ''; // WPCS: CSRF ok, input var ok,sanitization ok. ?>" onfocus="prevent_paste_clean_up_booster(this.id);" onkeypress="clean_up_booster_valid_ip_address(event);">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_clean_up_blocked_for_label ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_manage_ip_addresses_blocked_for_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select name="ux_ddl_ip_blocked_for" id="ux_ddl_ip_blocked_for" class="form-control">
												<option value="1Hour"><?php echo esc_attr( $cub_one_hour ); ?></option>
												<option value="12Hour"><?php echo esc_attr( $cub_twelve_hours ); ?></option>
												<option value="24hours"><?php echo esc_attr( $cub_twenty_four_hours ); ?></option>
												<option value="48hours"><?php echo esc_attr( $cub_forty_eight_hours ); ?></option>
												<option value="week"><?php echo esc_attr( $cub_one_week ); ?></option>
												<option value="month"><?php echo esc_attr( $cub_one_month ); ?></option>
												<option value="permanently"><?php echo esc_attr( $cub_one_permanently ); ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cub_comments ); ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_manage_ip_addresses_comments_tooltip ); ?>" data-placement="right"></i>
									</label>
									<textarea class="form-control" name="ux_txtarea_ip_comments" id="ux_txtarea_ip_comments" rows="4" placeholder="<?php echo esc_attr( $cub_manage_ip_addresses_comments_placeholder ); ?>"></textarea>
								</div>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<input type="button" class="btn vivid-green" name="ux_btn_clear" id="ux_btn_clear" value="<?php echo esc_attr( $cub_clean_up_clear_button_label ); ?>" onclick="value_blank_clean_up_booster();">
										<input type="submit" class="btn vivid-green" name="ux_btn_block_ip_address" id="ux_btn_block_ip_address" value="<?php echo esc_attr( $cub_block_ip_address ); ?>">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-globe"></i>
							<?php echo esc_attr( $cub_manage_ip_addresses_view_block_ip_address_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_view_blocked_ip_addresses">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_start_date ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_manage_ip_addresses_start_date_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true"> ( <?php echo esc_attr( $cub_premium_editions_label ); ?> ) </span>
											</label>
											<input type="text" class="form-control" name="ux_txt_start_date" value="<?php echo esc_attr( date_i18n( 'm/d/Y', $start_date ) ); ?>" id="ux_txt_start_date"  placeholder="<?php echo esc_attr( $cub_start_date_placeholder ); ?>" onkeypress="prevent_data_clean_up_booster(event)">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_end_date ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_manage_ip_addresses_end_date_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true"> ( <?php echo esc_attr( $cub_premium_editions_label ); ?> ) </span>
											</label>
											<input type="text" class="form-control" name="ux_txt_end_date" value="<?php echo esc_attr( date_i18n( 'm/d/Y', $timestamp ) ); ?>" id="ux_txt_end_date" value="" placeholder="<?php echo esc_attr( $cub_end_date_placeholder ); ?>" onkeypress="prevent_data_clean_up_booster(event)">
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="pull-right">
										<input type="submit" class="btn vivid-green" name="ux_btn_ip_adresses" id="ux_btn_ip_adresses" value="<?php echo esc_attr( $cub_submit ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="table-top-margin">
									<select name="ux_ddl_manage_ip_addesses" id="ux_ddl_manage_ip_addesses" class="custom-bulk-width">
										<option value=""><?php echo esc_attr( $cub_bulk_action_dropdown ); ?></option>
										<option value="delete" style="color:red !important;"><?php echo esc_attr( $cub_delete ); ?> ( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</option>
									</select>
									<input type="button" class="btn vivid-green" name="ux_btn_apply" id="ux_btn_apply" value="<?php echo esc_attr( $cub_apply ); ?>" onclick="premium_edition_notification_clean_up_booster();">
								</div>
								<table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_manage_ip_addresses">
									<thead>
										<tr>
											<th style="text-align: center;" class="chk-action">
												<input type="checkbox" name="ux_chk_all_manage_ip_address" id="ux_chk_all_manage_ip_address">
											</th>
											<th>
												<label class="control-label">
													<?php echo esc_attr( $cub_ip_address ); ?>
												</label>
											</th>
											<th>
												<label class="control-label">
													<?php echo esc_attr( $cub_location ); ?>
												</label>
											</th>
											<th style="width:20%;">
												<label class="control-label">
													<?php echo esc_attr( $cub_table_heading_blocked_date_time ); ?>
												</label>
											</th>
											<th style="width:20%;">
												<label class="control-label">
													<?php echo esc_attr( $cub_table_heading_release_date_time ); ?>
												</label>
											</th>
											<th>
												<label class="control-label">
													<?php echo esc_attr( $cub_comments ); ?>
												</label>
											</th>
											<th style="text-align:center;" class="chk-action">
												<label class="control-label">
													<?php echo esc_attr( $cub_action ); ?>
												</label>
											</th>
										</tr>
									</thead>
									<tbody id="dynamic_table_filter">
										<?php
										if ( isset( $manage_ip_address ) && count( $manage_ip_address ) > 0 ) {
											foreach ( $manage_ip_address as $row ) {
												?>
												<tr>
													<td style="text-align: center;">
														<input type="checkbox" onclick="check_all_clean_up_booster('#ux_chk_all_manage_ip_address');" name="ux_chk_manage_ip_address_<?php echo esc_attr( $row['meta_id'] ); ?>" id="ux_chk_manage_ip_address_<?php echo esc_attr( $row['meta_id'] ); ?>" value="<?php echo esc_attr( $row['meta_id'] ); ?>">
													</td>
													<td>
														<label>
															<?php echo esc_attr( long2ip_clean_up_booster( $row['ip_address'] ) ); ?>
														</label>
													</td>
													<td>
														<label>
															<?php echo '' !== $row['location'] ? esc_attr( $row ['location'] ) : esc_attr( $cub_not_available ); ?>
														</label>
													</td>
													<td style="width:20%;">
														<label>
															<?php echo esc_attr( date_i18n( 'd M Y h:i A', $row['date_time'] ) ); ?>
														</label>
													</td>
													<td>
														<label>
														<?php
														$blocking_time = $row['blocked_for'];
														switch ( $blocking_time ) {
															case '1Hour':
																$release_date = $row['date_time'] + ( 60 * 60 );
																echo esc_attr( date_i18n( 'd M Y h:i A', $release_date ) );
																break;

															case '12Hour':
																$release_date = $row['date_time'] + ( 60 * 60 * 12 );
																echo esc_attr( date_i18n( 'd M Y h:i A', $release_date ) );
																break;

															case '24hours':
																$release_date = $row['date_time'] + ( 60 * 60 * 24 );
																echo esc_attr( date_i18n( 'd M Y h:i A', $release_date ) );
																break;

															case '48hours':
																$release_date = $row['date_time'] + ( 60 * 60 * 48 );
																echo esc_attr( date_i18n( 'd M Y h:i A', $release_date ) );
																break;

															case 'week':
																$release_date = $row['date_time'] + ( 60 * 60 * 24 * 7 );
																echo esc_attr( date_i18n( 'd M Y h:i A', $release_date ) );
																break;

															case 'month':
																$release_date = $row['date_time'] + ( 60 * 60 * 30 * 24 );
																echo esc_attr( date_i18n( 'd M Y h:i A', $release_date ) );
																break;

															case 'permanently':
																echo esc_attr( $cub_never );
																break;
														}
														?>
													</label>
												</td>
												<td>
														<label>
															<?php echo esc_attr( $row['comments'] ); ?>
														</label>
												</td>
												<td class="custom-alternative">
														<a href="javascript:void(0);">
															<i class="icon-custom-trash tooltips" data-original-title="<?php echo esc_attr( $cub_delete ); ?>"  onclick="delete_ip_address_clean_up_booster(<?php echo intval( $row['meta_id'] ); ?>)" data-placement="right"></i>
														</a>
												</td>
											</tr>
												<?php
											}
										}
										?>
									</tbody>
								</table>
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
					<a href="admin.php?page=cub_blocking_options">
						<?php echo esc_attr( $cub_advance_security_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_advance_manage_ip_address ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-globe"></i>
							<?php echo esc_attr( $cub_advance_manage_ip_address ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_manage_ip_addresses_form">
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
