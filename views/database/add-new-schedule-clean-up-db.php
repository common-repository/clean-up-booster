<?php
/**
 * This Template is used for adding new schedulers of database.
 *
 * @author Tech Banker
 * @package clean-up-booster/views/database
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
	} elseif ( DATABASE_SCHEDULED_CLEAN_UP_BOOSTER === '1' ) {
		global $wp_version;
		$start_time = explode( ',', isset( $get_array['start_time_database'] ) ? $get_array['start_time_database'] : '' );
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
					<a href="admin.php?page=cub_database_manual_clean_up">
						<?php echo esc_attr( $cub_database ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo isset( $_REQUEST['id'] ) ? esc_attr( $cub_data_update_scheduled_clean_up ) : esc_attr( $cub_add_new_scheduled_clean_up_label ); // WPCS: CSRF ok. ?>
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
								<?php echo esc_attr( $cub_database_add_new_update_scheduled_clean_up_label ); ?>
							</div>
							<p class="premium-editions-clean-up-booster">
								<?php echo esc_attr( $cub_upgrade_know_about ); ?> <a href="https://tech-banker.com/clean-up-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_full_features ); ?></a> <?php echo esc_attr( $cub_chek_our ); ?> <a href="https://tech-banker.com/clean-up-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_online_demos ); ?></a>
							</p>
						</div>
						<div class="portlet-body form">
							<form id="ux_frm_add_new_schedule_clean_up_db">
								<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $cub_action ); ?> :
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_data_action_label_scheduled_clean_up_tooltip ); ?>" data-placement="right"></i>
													<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
												</label>
												<select name="ux_ddl_action" id="ux_ddl_action" class="form-control">
													<option value=""><?php echo esc_attr( $cub_bulk_action_dropdown ); ?></option>
													<option value="Empty"><?php echo esc_attr( $cub_empty ); ?></option>
													<option value="Delete" ><?php echo esc_attr( $cub_delete ); ?></option>
													<option value="Optimize"><?php echo esc_attr( $cub_optimize_dropdown ); ?></option>
													<option value="Repair"><?php echo esc_attr( $cub_repair_dropdown ); ?></option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $cub_duration ); ?> :
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_add_new_scheduled_duration_label_tooltip ); ?>" data-placement="right"></i>
													<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<select name="ux_ddl_duration" id="ux_ddl_duration" class="form-control" onchange="change_duration_clean_up_booster();">
														<option value="Hourly"><?php echo esc_attr( $cub_hourly ); ?></option>
														<option value="Daily"><?php echo esc_attr( $cub_daily ); ?></option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div id="ux_div_start_on_start_time">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $cub_start_on ); ?> :
														<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_start_on_tooltip ); ?>" data-placement="right"></i>
														<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
													</label>
													<input name="ux_txt_start_date" id="ux_txt_start_date" type="text" class="form-control" placeholder="<?php echo esc_attr( $cub_start_on_placeholder ); ?>" value="<?php echo isset( $get_array['start_on_database'] ) ? date( 'm/d/Y', $get_array['start_on_database'] ) : date( 'm/d/Y' ); // WPCS:XSS ok. ?>" onkeypress="prevent_data_clean_up_booster(event)">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $cub_start_time ); ?> :
														<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_start_time_tooltip ); ?>" data-placement="right"></i>
														<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
													</label>
													<div class="input-icon right">
														<select class="form-control custom-input-medium input-inline" name="ux_ddl_start_hours" id="ux_ddl_start_hours">
															<?php
															for ( $flag = 0; $flag < 24; $flag++ ) {
																if ( $flag < 10 ) {
																	?>
																	<option value="<?php echo intval( $flag ) * 60 * 60; ?>">0<?php echo intval( $flag ); ?><?php echo esc_attr( $cub_hrs ); ?></option>
																	<?php
																} else {
																	?>
																	<option value="<?php echo intval( $flag ) * 60 * 60; ?>"><?php echo intval( $flag ); ?><?php echo esc_attr( $cub_hrs ); ?></option>
																	<?php
																}
															}
															?>
														</select>
														<select class="form-control custom-input-medium input-inline" name="ux_ddl_start_minutes" id="ux_ddl_start_minutes">
															<?php
															for ( $flag = 0; $flag < 60; $flag++ ) {
																if ( $flag < 10 ) {
																	?>
																	<option value="<?php echo intval( $flag ) * 60; ?>">0<?php echo intval( $flag ); ?><?php echo esc_attr( $cub_mins ); ?></option>
																	<?php
																} else {
																	?>
																	<option value="<?php echo intval( $flag ) * 60; ?>"><?php echo intval( $flag ); ?><?php echo esc_attr( $cub_mins ); ?></option>
																	<?php
																}
															}
															?>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="ux_div_repeat_every">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $cub_repeat_every ); ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_repeat_every_tooltip ); ?>" data-placement="right"></i>
												<span class="required" aria-required="true">( <?php echo esc_attr( $cub_premium_editions_label ); ?> )</span>
											</label>
											<select class="form-control" name="ux_ddl_repeat_every" id="ux_ddl_repeat_every">
												<?php
												for ( $flag = 1; $flag < 24; $flag++ ) {
													if ( $flag < 10 ) {
														if ( '4' === $flag ) {
															?>
															<option selected="selected" value="<?php echo intval( $flag ) . 'Hour'; ?>">0<?php echo intval( $flag ); ?><?php echo esc_attr( $cub_hrs ); ?></option>
															<?php
														} else {
															?>
															<option value="<?php echo intval( $flag ) . 'Hour'; ?>">0<?php echo intval( $flag ); ?><?php echo esc_attr( $cub_hrs ); ?></option>
															<?php
														}
													} else {
														?>
														<option value="<?php echo intval( $flag ) . 'Hour'; ?>"><?php echo intval( $flag ); ?><?php echo esc_attr( $cub_hrs ); ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_database_schedule_clean_up">
										<thead>
											<tr>
												<th style="width: 4%;">
													<input type="checkbox" id="ux_chk_select_all_first" value="0" name="ux_chk_select_all_first">
												</th>
												<th>
													<?php echo esc_attr( $cub_table_name_heading ); ?>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											for ( $flag = 0; $flag < count( $result ); $flag++ ) { // @codingStandardsIgnoreLine
												$checked = isset( $tables_array ) ? in_array( $result[ $flag ]->Name, $tables_array ) : ''; // @codingStandardsIgnoreLine
												if ( 0 == $flag % 2 ) { // WPCS:loose comparison ok.
													$tables         = $result[ $flag ]->Name;
													$table_termmeta = $wp_version >= 4.4 ? strstr( $tables, $wpdb->termmeta ) : '';
													if ( ( strstr( $tables, $wpdb->terms ) || strstr( $tables, $wpdb->term_taxonomy ) || strstr( $tables, $wpdb->term_relationships ) || strstr( $tables, $wpdb->commentmeta ) || strstr( $tables, $wpdb->comments ) || strstr( $tables, $wpdb->links ) || strstr( $tables, $wpdb->options ) || strstr( $tables, $wpdb->postmeta ) || strstr( $tables, $wpdb->posts ) || strstr( $tables, $wpdb->users ) || strstr( $tables, $wpdb->usermeta ) || strstr( $tables, clean_up_booster() ) || strstr( $tables, clean_up_booster_meta() ) || strstr( $tables, $wpdb->signups ) || strstr( $tables, $wpdb->sitemeta ) || strstr( $tables, $wpdb->site ) || strstr( $tables, $wpdb->registration_log ) || strstr( $tables, $wpdb->blogs ) || strstr( $tables, $wpdb->blog_versions ) || $table_termmeta ) == true ) { // WPCS:loose comparison ok.
														?>
														<tr>
															<td style="text-align:center;">
																<input type="checkbox"  table="inbuilt" id="ux_chk_add_new_schedule_db_<?php echo intval( $flag ); ?>" name="ux_chk_add_new_schedule_db[]" onclick="check_all_clean_up_booster('#ux_chk_select_all_first');" value="<?php echo esc_attr( $result[ $flag ]->Name ); ?>" <?php echo '' != $checked ? 'checked=checked' : ''; // WPCS: loose comparison ok. ?>>
															</td>
															<td class="custom-manual-td">
																<label style="font-size:13px;color:#FF0000 !important;"><?php echo esc_attr( $result[ $flag ]->Name ) . '*'; ?></label>
															</td>
														<?php
													} else {
														?>
														<tr>
															<td style="text-align:center;">
																<input type="checkbox" id="ux_chk_add_new_schedule_db_<?php echo intval( $flag ); ?>" name="ux_chk_add_new_schedule_db[]" onclick="check_all_clean_up_booster('#ux_chk_select_all_first');" value="<?php echo esc_attr( $result[ $flag ]->Name ); ?>" <?php echo '' != $checked ? 'checked=checked' : ''; // WPCS: loose comparison ok. ?>>
															</td>
															<td class="custom-manual-td green-custom">
																<label><?php echo esc_attr( $result[ $flag ]->Name ); ?></label>
															</td>
														<?php
													}
												} else {
													$tables         = $result[ $flag ]->Name;
													$table_termmeta = $wp_version >= 4.4 ? strstr( $tables, $wpdb->termmeta ) : '';
													if ( ( strstr( $tables, $wpdb->terms ) || strstr( $tables, $wpdb->term_taxonomy ) || strstr( $tables, $wpdb->term_relationships ) || strstr( $tables, $wpdb->commentmeta ) || strstr( $tables, $wpdb->comments ) || strstr( $tables, $wpdb->links ) || strstr( $tables, $wpdb->options ) || strstr( $tables, $wpdb->postmeta ) || strstr( $tables, $wpdb->posts ) || strstr( $tables, $wpdb->users ) || strstr( $tables, $wpdb->usermeta ) || strstr( $tables, clean_up_booster() ) || strstr( $tables, clean_up_booster_meta() ) || strstr( $tables, $wpdb->signups ) || strstr( $tables, $wpdb->sitemeta ) || strstr( $tables, $wpdb->site ) || strstr( $tables, $wpdb->registration_log ) || strstr( $tables, $wpdb->blogs ) || strstr( $tables, $wpdb->blog_versions ) || $table_termmeta ) == true ) { // WPCS:loose comparison ok.
														?>
														<td style="text-align:center;">
															<input type="checkbox"  table="inbuilt" id="ux_chk_add_new_schedule_db_<?php echo intval( $flag ); ?>" name="ux_chk_add_new_schedule_db[]" onclick="check_all_clean_up_booster('#ux_chk_select_all_first');" value="<?php echo esc_attr( $result[ $flag ]->Name ); ?>" <?php echo '' != $checked ? 'checked=checked' : ''; // WPCS: loose comparison ok. ?>>
														</td>
														<td class="custom-manual-td">
															<label style="font-size:13px;color:#FF0000 !important;"><?php echo esc_attr( $result[ $flag ]->Name ) . '*'; ?></label>
														</td>
													</tr>
														<?php
													} else {
														?>
														<td style="text-align:center;">
															<input type="checkbox"  id="ux_chk_add_new_schedule_db_<?php echo intval( $flag ); ?>" name="ux_chk_add_new_schedule_db[]" onclick="check_all_clean_up_booster('#ux_chk_select_all_first');" value="<?php echo esc_attr( $result[ $flag ]->Name ); ?>" <?php echo '' != $checked ? 'checked=checked' : ''; // WPCS: loose comparison ok. ?>>
														</td>
														<td class="custom-manual-td green-custom">
															<label><?php echo esc_attr( $result[ $flag ]->Name ); ?></label>
														</td>
														<?php
													}
													?>
												</tr>
													<?php
												}
												if ( count( $result ) - 1 == $flag && 0 == $flag % 2 ) { // WPCS:loose comparison ok.
													?>
													<td style="text-align:center;"></td>
													<td class="custom-manual-td green-custom">
														<label></label>
													</td>
													<?php
												}
											}
											$flag++;
											?>
									</tbody>
								</table>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<input type="submit" class="btn vivid-green" name="ux_btn_schedule_save_changes" id="ux_btn_schedule_save_changes" value="<?php echo esc_attr( $cub_save_changes ); ?>">
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
					<a href="admin.php?page=cub_database_manual_clean_up">
						<?php echo esc_attr( $cub_database ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_add_new_scheduled_clean_up_label ); ?>
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
							<?php echo esc_attr( $cub_database_update_scheduled_clean_up_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_add_new_schedule_clean_up_db">
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
