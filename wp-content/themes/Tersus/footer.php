<?php global $NV_hidecontent; 
if($NV_hidecontent!="yes") { ?>

<div class="clear"></div>
</div><!-- /skinset-main-->
<div class="clear"></div>
</div><!-- /content-wrapper -->

<?php

} // Hide Content *END* 

/* ------------------------------------

:: PAGE VARIABLES

------------------------------------ */

require NV_FILES ."/inc/page-constants.php"; // Group Slider Gallery


/* ------------------------------------

:: PAGE VARIABLES *END*

------------------------------------ */



/* ------------------------------------

:: TWITTER

------------------------------------ */

if($NV_twitter=="pagebot") { 

global $NV_frame_footer; ?>
<div class="row">
    <div class="twitter-wrap skinset-main nv-skin bottom <?php echo $NV_frame_footer; ?>">
        <?php require NV_FILES .'/inc/twitter.php'; // Call Twitter Template ?>
    </div>
</div>
<?php }

/* ------------------------------------

:: TWITTER *END*

------------------------------------ */

/* ------------------------------------

:: GROUP SLIDER

------------------------------------ */

if($NV_show_slider=="groupslider" && $NV_groupsliderpos=="below") {
	require NV_FILES ."/inc/gallery-groupslider.php"; // Group Slider Gallery 
} 

/* ------------------------------------

:: GROUP SLIDER *END*

------------------------------------ */


/* ------------------------------------

:: GRID

------------------------------------ */
	
if($NV_show_slider=="gridgallery" && $NV_groupsliderpos=="below") { ?>

<div class="gallery-wrap grid-gallery row bottom <?php echo $NV_galleryclass; ?> nv-skin">
	<?php require NV_FILES ."/inc/gallery-grid.php"; // Group Slider Gallery ?>
</div>

<?php }

/* ------------------------------------

:: GRID *END*

------------------------------------ */




/* ------------------------------------

:: EXIT TEXT

------------------------------------ */

global $exittext,$exit_classes,$NV_frame_footer, $NV_disablefooter;

if($exittext) { 
if(!$exit_classes) $exit_classes='skinset-main'; ?>
	<div class="row">
		<div class="intro-text skinset-main <?php echo $intro_classes.' '.$NV_frame_footer; ?> nv-skin"><div><?php echo do_shortcode($exittext); ?></div></div>
    </div>
<?php 
}
 
/* ------------------------------------

:: EXIT TEXT *END*

------------------------------------ */ ?>


	<?php if($NV_disablefooter!='yes' && get_option('mainfooter')!='disable') { ?>
	<footer id="footer-wrap" class="row">
		<div id="footer" class="clearfix skinset-footer nv-skin <?php echo $NV_frame_footer; ?>">
				<?php
				$get_footer_num = (get_option('footer_columns_num')!="") ? get_option('footer_columns_num') : '4'; // If not set, default to 4 columns
				$NV_footercolumns_text=numberToWords($get_footer_num ); // convert number to word
				$i=1;
				while($i<=$get_footer_num) { 
					if ( is_active_sidebar('footer'.$i) ) { ?>
                    <div class="block columns <?php echo $NV_footercolumns_text."_column "; if($i == $get_footer_num) { echo "last"; } ?>">
                    
                        <ul>
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column '.$i)) : endif; ?>
                        </ul>
                    
                    </div>
                    <?php } $i++;	
				} ?>

				<?php  global $NV_imgheight; ?>
				<?php if(get_option('lowerfooter')!="disable") {  // Check for enabled lower footer ?>
                <div class="clear"></div>
                <div class="lowerfooter-wrap clearfix">
                    <div class="lowerfooter">
                        <div class="lowfooterleft"><?php if(get_option('lowfooterleft')) { echo get_option('lowfooterleft'); } else { echo "&copy; ". date("Y") ." ".get_option("blogname"); } ?></div>
                        <div class="lowfooterright"><?php if(get_option('lowfooterright')) { echo get_option('lowfooterright'); } else { echo "designed by <a href=\"http://themeforest.net/user/NorthVantage/portfolio?ref=NorthVantage\" title=\"Buy Theme\" target=\"_blank\">NorthVantage</a>"; } ?></div>
                    </div><!-- / lowerfooter -->		
                </div><!-- / lowerfooter-wrap -->
			<?php } ?>
		</div><!-- / footer -->
	</footer><!-- / footer-wrap -->
    <?php } // disable footer ?>
    <div class="autototop"><a href="#"></a></div>
</div><!-- /wrapper -->

<!-- I would like to give a great thankyou to WordPress for their amazing platform -->
<!-- Theme Design by NorthVantage - http://www.northvantage.co.uk -->

<?php wp_footer(); ?>

<script type="text/javascript"> 
<!--
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
(function ($) {

$(document).ready(function() {	
$('.post-grid.archive .galleryimg,.accordion-gallery .galleryimg').append('<div class="hoverimg"><img src="<?php echo get_template_directory_uri(); ?>/images/image-hover.png" alt="&nbsp;" /></div>');	
$('.post-grid.archive .galleryvid,.accordion-gallery .galleryvid').append('<div class="hovervid"><img src="<?php echo get_template_directory_uri(); ?>/images/video-hover.png" alt="&nbsp;" /></div>');	
$('.container .galleryimg').append('<div class="hoverimg"><img src="<?php echo get_template_directory_uri(); ?>/images/image-hover.png" alt="&nbsp;" /></div>');	
$('.container .galleryvid').append('<div class="hovervid"><img src="<?php echo get_template_directory_uri(); ?>/images/video-hover.png" alt="&nbsp;" /></div>');	

$("img.reflect,#item-body img.avatar, #members-directory-form img.avatar, #item-header-avatar img.avatar, .avatar-block img.avatar").not('.animator-wrap img').reflect({height:0.12,opacity:0.2});

$(".fancybox").fancybox({
	openSpeed : 800,
	opacity : 0.85,
	beforeLoad : function() {     
			if(this.href.match(/width=[0-9]+/i))  this.width = parseInt(this.href.match(/width=[0-9]+/i)[0].replace('width=',''));  
            if(this.href.match(/height=[0-9]+/i)) this.height = parseInt(this.href.match(/height=[0-9]+/i)[0].replace('height=',''));
        },
 helpers : {
	media : {}
 }
});

if(!$.browser.msie) {
	$('.preload').preloadImages();
}

Cufon.now();

});

<?php 

if(empty($NV_twitter)) $NV_twitter='none';

if(TWITTERUSR!='' && $NV_twitter!='none') : ?>

$(window).load(function() {	
 gettweets('<?php echo TWITTERUSR; ?>','<?php if(TWITTERNUM) {echo TWITTERNUM;} else { echo "5";} ?>');
});

<?php endif; ?>

$(window).load(function() {
	if ($.browser.msie && $.browser.version.substr(0,1)<9) {
		// end
	} else {
		$('#primary-wrapper .gallery-wrap').animate({opacity:1});
	}
});


})(jQuery);

<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>

//-->
</script>
</div>
</body>
</html>