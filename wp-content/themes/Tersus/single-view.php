<?php

/**
 * Single View
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

				<div id="bbp-view-<?php bbp_view_id(); ?>" class="bbp-view">
					<h1 class="entry-title"><?php bbp_view_title(); ?></h1>
					<div class="entry-content">

						<?php bbp_get_template_part( 'bbpress/content', 'single-view' ); ?>

					</div>
				</div><!-- #bbp-view-<?php bbp_view_id(); ?> -->

		</article><!-- #container -->
	</div><!-- #content -->
    
<?php get_sidebar(); ?>>
<?php get_footer(); ?>