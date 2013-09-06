<?php

/**
 * Template Name: bbPress - Topic Tags
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

					<div id="bbp-topic-tags" class="bbp-topic-tags">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">

							<?php get_the_content() ? the_content() : _e( '<p>This is a collection of tags that are currently popular on our forums.</p>', 'bbpress' ); ?>

							<div id="bbp-topic-hot-tags">

								<?php wp_tag_cloud( array( 'smallest' => 9, 'largest' => 38, 'number' => 80, 'taxonomy' => bbp_get_topic_tag_tax_id() ) ); ?>

							</div>

						</div>
					</div><!-- #bbp-topic-tags -->

				<?php endwhile; ?>

		</article><!-- #container -->
	</div><!-- #content -->
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>
