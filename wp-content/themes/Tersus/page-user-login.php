<?php

/**
 * Template Name: bbPress - User Login
 *
 * @package bbPress
 * @subpackage NorthVantage
 */

// No logged in users
bbp_logged_in_redirect();

// Begin Template
get_header(); ?>

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

					<div id="bbp-login" class="bbp-login">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">

							<?php the_content(); ?>

							<?php bbp_get_template_part( 'bbpress/form', 'user-login' ); ?>

						</div>
					</div><!-- #bbp-login -->

				<?php endwhile; ?>

		</article><!-- #container -->
	</div><!-- #content -->
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>
