<?php 

if(!isset($NV_gallerywidth)) $NV_gallerywidth='';

$NV_gallerywidth = ($NV_gallerywidth !="") ? $NV_gallerywidth	: '980';

if(!$NV_slidercolumns) $NV_slidercolumns = '3';

$NV_slidercolumns_text=numberToWords($NV_slidercolumns); // convert number to word

if($NV_imgalign) $NV_imgalign = 'imgalign-'.$NV_imgalign; else $NV_imgalign='';

if($NV_verticalslide=='vertical') { 

	/* ------------------------------------
	:: VERTICAL SLIDER VARIABLES
	------------------------------------ */
	
	$NV_sliderformat =  'style="width:'.$NV_gallerywidth.'px;"';
	
	if($NV_galleryheight) {
		$NV_vertheight = $NV_galleryheight;
		$NV_panelheight = $NV_vertheight/$NV_slidercolumns;
		$NV_panelformat='style="min-height:'.$NV_panelheight.'px;"';
		$NV_vertheight='style="min-height:'.$NV_galleryheight.'px"';
	}
	
} else {

	/* ------------------------------------
	:: HORIZONTAL SLIDER VARIABLES
	------------------------------------ */
		
	$NV_verticalslide='horizontal';
	$NV_sliderformat =  'style="width:'.$NV_gallerywidth.'px;height:'.$NV_galleryheight.'px"';
	if(!$NV_gallerywidth) { $NV_panelwidth = 100/$NV_slidercolumns; $NV_widthtype='%'; } else { $NV_gallerywidth=$NV_gallerywidth-80; $NV_panelwidth = $NV_gallerywidth/$NV_slidercolumns; $NV_widthtype='px'; }
	
	if($NV_galleryheight) {
		$NV_vertheight=$NV_panelformat='style="min-height:'.$NV_galleryheight.'px"';
	}
}

	if(!$NV_imgheight && !$NV_imgwidth) {
		
		$NV_imgheight = '160';
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
		
	} elseif($NV_imgwidth && !$NV_imgheight) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;";	
	} elseif($NV_imgheight && !$NV_imgwidth) {
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
	} elseif($NV_imgheight && $NV_imgwidth) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}


?>
<div class="gallery-wrap <?php echo $NV_galleryclass; ?> nv-skin clearfix <?php echo $NV_verticalslide; ?>">
<div class="group-slider main <?php echo $NV_imgalign; ?> row" <?php if(isset($NV_vertheight)) echo $NV_vertheight; ?>>

<img src="<?php echo get_template_directory_uri(); ?>/images/blank.gif">

<?php 

/* ------------------------------------

:: LOAD DATA SOURCE

------------------------------------ */
 
if(!$NV_datasource) { // CHECK DATASOURCE
	if(!$NV_slidesetid) {
		$NV_datasource='data-2';
	} else {
		$NV_datasource='data-1';
	}
}

if($NV_datasource=="data-1") {
	include(NV_FILES .'/inc/classes/post-attachments-class.php');
} elseif($NV_datasource=="data-2") {
	include(NV_FILES .'/inc/classes/post-categories-class.php');
} elseif($NV_datasource=="data-3") {
	include(NV_FILES .'/inc/classes/flickr-class.php');
} elseif($NV_datasource=="data-4") {
	include(NV_FILES .'/inc/classes/slideset-class.php');
} elseif($NV_datasource=="data-5") {
	include(NV_FILES .'/inc/classes/post-categories-class.php');
} elseif($NV_datasource=="data-6") {
	include(NV_FILES .'/inc/classes/post-categories-class.php');
}

/* ------------------------------------

:: LOAD DATA SOURCE *END*

------------------------------------ */

$postcount = 0; ?>


</div><!-- / groupslider -->
<div class="slidernav-left nvcolor-wrap">
<?php if($post_count>$NV_slidercolumns) { ?>
		<span class="nvcolor"></span><div class="slidernav"><a id="leftnav" href="#"></a></div>
<?php } ?>
	</div>
<div class="slidernav-right nvcolor-wrap">
<?php if($post_count>$NV_slidercolumns) { ?>
		<span class="nvcolor"></span><div class="slidernav"><a id="rightnav" href="#"></a></div>
<?php } ?>
</div>
<div class="clear"></div>
</div><!-- / gallery-wrap -->

<script type="text/javascript">
<!--
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
	jQuery(document).ready(function() {
	<?php if(!$NV_stagetimeout) $NV_slidetimeout = "0"; else $NV_slidetimeout = $NV_stagetimeout * 1000; ?>
		jQuery('.group-slider.main').cycle({ 
			<?php if($NV_verticalslide=='vertical') { ?>
			fx:     'scrollVert',
			<?php } else { ?>
			fx:     'scrollHorz',
			<?php } ?> 
			timeout: <?php echo $NV_slidetimeout; ?>,
			speed: 1000,
			slideResize: 0,		
			slideExpr: '.groupslides-wrap',			
			cleartype:  true,
			cleartypeNoBg:  true,
			before:  onBefore,
			after:  onAfter,
			easing: 'easeInOutExpo',
			prev: '#leftnav',
			next: '#rightnav'
		});

	
		jQuery(".group-slider.main").touchwipe({
			preventDefaultEvents: false,
				wipeLeft: function() {
					jQuery('.group-slider.main').cycle('next');
					return false;
				},
				  wipeRight: function() {
					jQuery('.group-slider.main').cycle("prev");
					return false;
				}
			
		});	

	});


    jQuery(window).resize(function($) {
            var slide_height = jQuery('.group-slider.main').find('.groupslides-wrap.current').height();
            jQuery('.group-slider.main').css('height', slide_height);	
    });	


	function onBefore() { 		

		jQuery('.group-slider.main .groupslides-wrap.current').removeClass('current');
		jQuery(this).addClass('current');	
		
		var slide_height =jQuery(this).height();
		resize_container(slide_height);
					
	}


	function onAfter() { 		
		
		var videoid = jQuery(this).find('.jwplayer').attr("id");
				
		if(videoid) {
			$('.group-slider.main .jwplayer').each(function(index) {
						var obj='';
						obj = $(this).attr("id");
						
						if(obj==videoid && $(this).hasClass("autostart")) {
							jwplayer(obj).onReady(function() {
								currentState = jwplayer(obj).getState(); 
								if(currentState=="IDLE") {
									jwplayer(obj).play();
								}
							});
						}					 
			});
		}
					
	} 
	
	
	
	
function resize_container(height) {
	if(!height) {
		var init_slide_height = jQuery('.group-slider.main .groupslides-wrap').height();
	} else {
		var init_slide_height = height;
	}
	
	jQuery('.group-slider.main').animate({
    height: init_slide_height
  }, 750, function() {
    // Animation complete.
  });	
}

jQuery(window).load(function() {
	resize_container();
});
	

<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
//-->
</script>