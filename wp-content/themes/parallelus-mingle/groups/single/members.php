<?php if ( bp_group_has_members( 'exclude_admins_mods=0' ) ) : ?>

	<?php do_action( 'bp_before_group_members_content' ) ?>

	<div class="bp-pagination no-ajax">

		<div id="member-count" class="pag-count">
			<?php bp_group_member_pagination_count() ?>
		</div>

		<div id="member-pagination" class="pagination-links">
			<?php bp_group_member_pagination() ?>
		</div>

	</div>

	<?php do_action( 'bp_before_group_members_list' ) ?>

	<ul id="member-list" class="item-list">
		<?php while ( bp_group_members() ) : bp_group_the_member(); ?>

			<li>
				<div class="item-avatar">
					<a href="<?php bp_group_member_domain() ?>">
						<?php 
						// get the avatar image
						$avatarURL = bp_theme_avatar_url(64,64, 'group_member_avatar');
						echo '<div class="avatar" style="background-image: url(\''.$avatarURL.'\'); width:64px; height:64px; "></div>';
						
						//bp_group_member_avatar_thumb() 
						?>
					</a>
				</div>
				
				<div class="item">
					<h4 class="item-title poster-name"><?php bp_group_member_link() ?></h4>
					<div class="item-meta"><span class="activity"><?php bp_group_member_joined_since() ?></span></div>
				</div>
				
				<?php do_action( 'bp_group_members_list_item' ) ?>

				<?php if ( function_exists( 'friends_install' ) ) : ?>

					<div class="action">
						<?php bp_add_friend_button( bp_get_group_member_id(), bp_get_group_member_is_friend() ) ?>

						<?php do_action( 'bp_group_members_list_item_action' ) ?>
					</div>

				<?php endif; ?>
				
				<div class="clear"></div>
			</li>

		<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_group_members_content' ) ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'This group has no members.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>
