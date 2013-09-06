<?php
/**
 * Footer Template
 *
 * @package Mysitemyway
 * @subpackage Template
 */
?>





								<div class="clearboth"></div>

								</div><!-- .entry -->

							<?php mysite_after_entry(); ?>

						</div><!-- #post-## -->



					<?php mysite_after_page_content(); ?>

						<div class="clearboth"></div>
					</div><!-- #main_inner -->
				</div><!-- #main -->







<?php mysite_after_main();

?><div class="clearboth"></div>

	</div><!-- #content_inner -->
</div><!-- #content -->

<?php mysite_before_footer();

?><div id="footer">
	<div class="multibg">
		<div class="multibg"></div>
	</div>
	<div id="footer_inner">
		<?php mysite_footer();
		
	?></div><!-- #footer_inner -->
	<?php mysite_after_footer_inner();
?></div><!-- #footer -->

<?php mysite_after_footer();

?></div><!-- #body_inner -->

<?php wp_footer(); ?>
<?php mysite_body_end(); ?>

</body>
</html>