<?php

/**
 * Single Topic
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

				<?php if ( bbp_user_can_view_forum( array( 'forum_id' => bbp_get_topic_forum_id() ) ) ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<div id="bbp-topic-wrapper-<?php bbp_topic_id(); ?>" class="bbp-topic-wrapper">
							<h1 class="entry-title"><?php bbp_topic_title(); ?></h1>
							<div class="entry-content">

								<?php bbp_get_template_part( 'bbpress/content', 'single-topic' ); ?>

							</div>
						</div><!-- #bbp-topic-wrapper-<?php bbp_topic_id(); ?> -->

					<?php endwhile; ?>

				<?php elseif ( bbp_is_forum_private( bbp_get_topic_forum_id(), false ) ) : ?>

					<?php bbp_get_template_part( 'bbpress/feedback', 'no-access' ); ?>

				<?php endif; ?>

		</article><!-- #container -->
	</div><!-- #content -->
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>