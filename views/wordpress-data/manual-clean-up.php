<?php
/**
 * This Template is used for managing WordPress data manually.
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
	} elseif ( WORDPRESS_DATA_MANUAL_CLEAN_UP_BOOSTER === '1' ) {
		$wordpress_data_manual_clean_up = wp_create_nonce( 'wordpress_data_manual_clean_up' );
		$empty_manual_clean_up          = wp_create_nonce( 'empty_manual_clean_up' );
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
						<?php echo esc_attr( $cub_manual_clean_up_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
						<i class="icon-custom-note"></i>
							<?php echo esc_attr( $cub_wordpress_manual_clean_up_label ); ?>
						</div>
						<p class="premium-editions-clean-up-booster">
							<?php echo esc_attr( $cub_upgrade_know_about ); ?> <a href="https://tech-banker.com/clean-up-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_full_features ); ?></a> <?php echo esc_attr( $cub_chek_our ); ?> <a href="https://tech-banker.com/clean-up-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cub_online_demos ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_manual_clean_up">
							<div class="form-body">
								<div class="table-margin-top">
									<select name="ux_ddl_bulk_action" id="ux_ddl_bulk_action" class="custom-bulk-width">
										<option value=""><?php echo esc_attr( $cub_bulk_action_dropdown ); ?></option>
										<option value="empty"><?php echo esc_attr( $cub_empty ); ?></option>
									</select>
									<input type="button" id="ux_btn_apply" name="ux_btn_apply" class="btn vivid-green" value="<?php echo esc_attr( $cub_apply ); ?>" onclick="bulk_empty_clean_up_booster();">
								</div>
								<div class="line-separator"></div>
								<table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_wp_manual_clean_up">
									<thead>
										<tr>
											<th style="text-align:center;width:5%;">
												<input type="checkbox" id="ux_chk_select_all" name="ux_chk_select_all">
											</th>
											<th style="width: 65%;">
												<?php echo esc_attr( $cub_type_of_data ); ?>
											</th>
											<th style="text-align:center; width: 15%;">
												<?php echo esc_attr( $cub_count ); ?>
											</th>
											<th style="text-align:center; width: 15%;">
												<?php echo esc_attr( $cub_action ); ?>
											</th>
										</tr>
									</thead>
									<tbody class="check-all">
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_auto_draft" name="ux_chk_auto_draft" value="1" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_auto_drafts ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_auto_drafts_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'autodraft' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_auto_draft" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(1);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_dashboard_transient_feed" value="2" name="ux_chk_dashboard_transient_feed" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_dashboard_transient_feed ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_dashboard_transient_feed_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'transient_feed' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_dashboard_transient_feed" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(2);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_unapproved_comments" value="3" name="ux_chk_unapproved_comments" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_unapproved_comments ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_unapproved_comments_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'unapproved_comments' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_unapproved_comments" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(3);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_orphan_comments_meta" value="4" name="ux_chk_orphan_comments_meta" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_orphan_comment_meta ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_orphan_comment_meta_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'comments_meta' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_orphan_comments_meta" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(4);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_orphan_posts_meta" value="5" name="ux_chk_orphan_posts_meta" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_orphan_post_meta ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_orphan_post_meta_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'posts_meta' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_orphan_posts_meta" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(5);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_orphan_relationships" value="6" name="ux_chk_orphan_relationships" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_orphan_relationships ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_orphan_relationships_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'relationships' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_orphan_relationships" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(6);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_revision" value="7" name="ux_chk_revision" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_revisions ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_revisions_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'revision' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_revision" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(7);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_remove_pingbacks" value="8" name="ux_chk_remove_pingbacks" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_remove_pingbacks ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_remove_pingbacks_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'remove_pingbacks' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_remove_pingbacks" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>"onclick="selected_empty_clean_up_booster(8);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_remove_transient_options" value="9" name="ux_chk_remove_transient_options" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_remove_transient_options ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_remove_transient_options_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'remove_transient_options' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_remove_transient_options" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(9);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_remove_trackbacks" value="10" name="ux_chk_remove_trackbacks" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_remove_trackbacks ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_remove_trackbacks_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'remove_trackbacks' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_remove_trackbacks" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(10);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_spam_comments" value="11" name="ux_chk_spam_comments" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_spam_comments ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_spam_comments_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'spam' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_btn_spam_comments" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(11);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_trash_comments" value="12" name="ux_chk_trash_comments" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_trash_comments ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_trash_comments_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'trash' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_trash_comments" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(12);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_draft" value="13" name="ux_chk_draft" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_drafts ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_drafts_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'draft' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_draft" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(13);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_deleted_posts" value="14" name="ux_chk_deleted_posts" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_deleted_posts ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_deleted_posts_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'deleted_posts' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_deleted_posts" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(14);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_duplicated_postmeta" value="15" name="ux_chk_duplicated_postmeta" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_duplicated_post_meta ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_duplicated_post_meta_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'duplicated_postmeta' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_duplicated_postmeta" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(15);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_oembed_caches_in_post_meta" value="16" name="ux_chk_oembed_caches_in_post_meta" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_oembed_caches_post_meta ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_oembed_caches_post_meta_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'oembed_caches' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_oembed_caches_in_post_meta" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(16);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_duplicated_comment_meta" value="17" name="ux_chk_duplicated_comment_meta" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_duplicated_comment_meta ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_duplicated_comment_meta_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'duplicated_commentmeta' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_duplicated_comment_meta" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(17);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_orphan_user_meta" value="18" name="ux_chk_orphan_user_meta" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_orphan_user_meta ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_orphan_user_meta_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'orphan_user_meta' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_orphan_user_meta" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(18);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_duplicated_usermeta" value="19" name="ux_chk_duplicated_usermeta" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_duplicated_user_meta ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_duplicated_user_meta_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'duplicated_usermeta' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_duplicated_usermeta" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>"onclick="selected_empty_clean_up_booster(19);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_orphaned_term_relationships" value="20" name="ux_chk_orphaned_term_relationships" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_orphaned_term_relationships ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_orphaned_term_relationships_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'orphaned_term_relationships' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_orphaned_term_relationships" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(20);">
											</td>
										</tr>
										<tr>
											<td class="custom-align-chk">
												<input type="checkbox" id="ux_chk_unused_terms" value="21" name="ux_chk_unused_terms" onclick="check_all_clean_up_booster('#ux_chk_select_all')">
											</td>
											<td style="width: 65%;">
												<label>
													<?php echo esc_attr( $cub_unused_terms ); ?>
													<i class="icon-custom-question tooltips" data-original-title="<?php echo esc_attr( $cub_unused_terms_tooltip ); ?>" data-placement="right"></i>
												</label>
											</td>
											<td class="custom-align">
												<label>
													<?php echo intval( count_clean_up_booster( 'unused_terms' ) ); ?>
												</label>
											</td>
											<td class="custom-align">
												<input type="button" id="ux_chk_unused_terms" class="btn vivid-green btn-align" value="<?php echo esc_attr( $cub_empty ); ?>" onclick="selected_empty_clean_up_booster(21);">
											</td>
										</tr>
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
					<a href="admin.php?page=cub_clean_up_booster">
						<?php echo esc_attr( $cub_wordpress_data ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cub_manual_clean_up_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-note"></i>
							<?php echo esc_attr( $cub_wordpress_manual_clean_up_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">
							<strong><?php echo esc_attr( $cub_roles_capabilities_message ); ?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
