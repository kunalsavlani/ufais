<?php

/**
 * Single Reply
 *
 * @package bbPress
 * @subpackage NorthVantage
 */

?>

<?php get_header(); ?>

<?php $NV_layout=get_option("buddylayout"); ?>

<?php if($NV_layout!="layout_four" && $NV_layout!="layout_five") { get_sidebar(); } ?>

	<div id="content" class="columns <?php if($NV_layout=="layout_one") { ?>twelve<?php } 
		elseif($NV_layout=="layout_two") { ?>eight last<?php }
		elseif($NV_layout=="layout_three") { ?>six last<?php }
		elseif($NV_layout=="layout_four") { ?>eight<?php }
		elseif($NV_layout=="layout_five") { ?>six<?php }
		elseif($NV_layout=="layout_six") { ?>six<?php }
		else { ?>eight<?php } ?>">

		<article id="container">

				<?php do_action( 'bbp_template_notices' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div id="bbp-reply-wrapper-<?php bbp_reply_id(); ?>" class="bbp-reply-wrapper">
						<h1 class="entry-title"><?php bbp_reply_title(); ?></h1>

						<div class="entry-content">

							<table class="bbp-replies" id="topic-<?php bbp_topic_id(); ?>-replies">
								<thead>
									<tr>
										<th class="bbp-reply-author"><?php  _e( 'Author',  'bbpress' ); ?></th>
										<th class="bbp-reply-content"><?php _e( 'Replies', 'bbpress' ); ?></th>
									</tr>
								</thead>

								<tfoot>
									<tr>
										<td colspan="2"><?php bbp_topic_admin_links(); ?></td>
									</tr>
								</tfoot>

								<tbody>
									<tr class="bbp-reply-header">
										<td class="bbp-reply-author">

											<?php bbp_reply_author_display_name(); ?>

										</td>
										<td class="bbp-reply-content">
											<a href="<?php bbp_reply_url(); ?>" title="<?php bbp_reply_title(); ?>">#</a>

											<?php printf( __( 'Posted on %1$s at %2$s', 'bbpress' ), get_the_date(), esc_attr( get_the_time() ) ); ?>

											<span><?php bbp_reply_admin_links(); ?></span>
										</td>
									</tr>

									<tr id="reply-<?php bbp_reply_id(); ?>" <?php bbp_reply_class(); ?>>

										<td class="bbp-reply-author"><?php bbp_reply_author_link( array( 'type' => 'avatar' ) ); ?></td>

										<td class="bbp-reply-content">

											<?php bbp_reply_content(); ?>

										</td>

									</tr><!-- #topic-<?php bbp_topic_id(); ?>-replies -->
								</tbody>
							</table>

						</div><!-- .entry-content -->
					</div><!-- #bbp-reply-wrapper-<?php bbp_reply_id(); ?> -->

				<?php endwhile; ?>

		</article><!-- #container -->
	</div><!-- #content -->
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>
