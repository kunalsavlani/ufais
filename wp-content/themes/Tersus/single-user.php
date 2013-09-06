<?php

/**
 * User Profile
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

				<div id="bbp-user-<?php bbp_current_user_id(); ?>" class="bbp-single-user">
					<div class="entry-content">

						<?php bbp_get_template_part( 'bbpress/content', 'single-user' ); ?>

					</div><!-- .entry-content -->
				</div><!-- #bbp-user-<?php bbp_current_user_id(); ?> -->

		</article><!-- #container -->
	</div><!-- #content -->
    
<?php get_sidebar(); ?>>
<?php get_footer(); ?>