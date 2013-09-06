<?php 

	if($NV_show_slider=='gallery3d') $NV_show_slider ='stageslider';

	if($NV_show_slider=='stageslider') { // Set the Gallery Type
	 $NV_gallery_type='stage-slider';	
	} elseif($NV_show_slider=='islider') {
	 $NV_gallery_type='stage-slider islider';
	} elseif($NV_show_slider=='nivo') {
	 $NV_gallery_type='stage-slider-nivo stage';
	}
	

	if(!$NV_imgheight && !$NV_imgwidth) {
		
		if($NV_show_slider=='islider') {
			$NV_imgwidth="784";
		} else {
			$NV_imgwidth="980";
		}
		
		$NV_image_size = "w=". $NV_imgwidth ."&amp;";
		
	} elseif($NV_imgwidth && !$NV_imgheight) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;";	
	} elseif($NV_imgheight && !$NV_imgwidth) {

		if($NV_show_slider=='islider') {
			$NV_imgwidth="784";
		} 
		
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
	} elseif($NV_imgheight && $NV_imgwidth) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}


	if($NV_show_slider=='nivo') {
		if(!$NV_imgwidth) 	$NV_imgwidth='980';
		if(!$NV_imgheight) 	$NV_galleryheight=$NV_imgheight='350';
		
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}	
	
	
	$NV_gallery_width = $NV_imgwidth;
	
	$NV_effectheight='height:'.$NV_galleryheight.'px';
	
	
	if(!$NV_stagetransition) { // set default transition type
	$NV_stagetransition='fade';
	}
	
	if(!$NV_stagetween) { // set default tween type
	$NV_stagetween='linear';
	}
	
	if($NV_show_slider=='islider') {
	// iSlider Vars
	$NV_navimg_width=$NV_imgwidth/100*25;
	$NV_gallery_width=$NV_imgwidth+$NV_navimg_width;
	$NV_gallery_format='style="float:left;"';
	$NV_gallery_effect=$NV_imageeffect.' islider';
	$NV_gallerywrap_style ='style="max-width:'. $NV_gallery_width .'px;"';
	$NV_imageeffect='';
	}
	
	if($NV_show_slider=='nivo') {
	// Nivo Slider Vars
	$NV_gallery_format='style="max-width:'.$NV_imgwidth.'px;"';
	$NV_gallery_effect=$NV_imageeffect.' nivo';
	$NV_imageeffect='';
	$NV_gallery_extras='style="height:'.$NV_imgheight.'px"';
	} 
	
	if($NV_show_slider=='stageslider') {
	// Stage Slider Vars
	$NV_gallery_effect='stage';
	$NV_gallery_extras='style="'.$NV_effectheight.'"';
	} ?>

<div class="gallery-wrap <?php echo $NV_galleryclass; ?> stage-slider-wrap <?php if($NV_stageplaypause!="disabled") echo 'nav-enable'; ?> <?php if($NV_gallery_effect) echo $NV_gallery_effect; ?>" <?php if(isset($NV_gallerywrap_style)) echo $NV_gallerywrap_style; ?>>

<?php 
if($NV_show_slider!='islider') {
	if($NV_stageplaypause!="disabled") { 
		if($NV_stageplaypause=="enabled" ||$NV_stageplaypause=='leftrightonly') { ?>
		<div class="slidernav-left nvcolor-wrap">
			<span class="nvcolor"></span><div class="slidernav"><a id="stage-prev" class="nivo-prevNav idstage"></a></div>
		</div>
		<div class="slidernav-right nvcolor-wrap">
			<span class="nvcolor"></span><div class="slidernav"><a id="stage-next" class="nivo-nextNav idstage"></a></div>
		</div>
			
	<?php } 
	}
} ?>

<div class="slider-inner-wrap" <?php if(isset($NV_gallery_format)) echo $NV_gallery_format; ?>>
<?php 
if($NV_show_slider!='islider') {
	if($NV_stageplaypause!="disabled" && $NV_stageplaypause!="leftrightonly") { ?>
		<div class="control-wrap">  
			<div class="control-panel">
			</div><!-- / control-panel -->
		</div><!-- / control-wrap -->
<?php }
} ?>

<div class="<?php echo $NV_gallery_type; ?>" <?php echo $NV_gallery_extras; ?>>

<?php if($NV_gallery_type=='stage-slider') { ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/blank.gif">
<?php } 


/* ------------------------------------

:: LOAD DATA SOURCE

------------------------------------ */
 
if(!$NV_datasource) { // check datasource, if no datasource check Post Categories / Slide Set selected (backwards compatibility)
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
$slidenum_chk=$postcount;
if(!empty($post_count)) $slidenum_chk=$post_count;

$postcount = 0; ?>

</div><!-- / stageslider -->
</div><!-- / slider-inner-wrap -->


<?php if($NV_show_slider=='islider') { // iSlider Image Nav
$NV_navimg_height=$NV_imgheight/3+1;
$NV_navimg = rTrim($NV_navimg,',');
$NV_navimg=explode(',',$NV_navimg);
 ?>
<div class='islider-nav-wrap'>
	<div class='nvcolor-wrap'><span class="nvcolor"></span><div id="stage-next" class="islider-nav"></div></div>
	<ul class='islider-nav-ul' style="height:<?php echo $NV_imgheight; ?>px">
    <li class="copynav">
		<ul><?php foreach ($NV_navimg as $NV_navimg) { ?>
<li><a href="#"><img src="<?php  echo $NV_imagepath . dyn_getimagepath($NV_navimg);  ?>" /></a></li>
<?php } ?>
		</ul>
	</li>
    </ul>
</div> 
<?php } ?>
<div class="clear"></div>
<script type='text/javascript'>
<!--
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
(function($) {
$('.stage-slider-wrap').ready(function() {
<?php if($NV_show_slider=='nivo') { 

if(!$NV_nivoeffect) $NV_nivoeffect = 'random'; ?>

$('.stage-slider-nivo.stage').nivoSlider({
	effect: '<?php echo $NV_nivoeffect; ?>',
	<?php if(!$NV_stagetimeout) $NV_stagetimeout=10000; else $NV_stagetimeout= $NV_stagetimeout*1000; ?>
	 pauseTime: <?php echo $NV_stagetimeout; ?>, // How long each slide will show
     afterChange: function(){ Cufon.replace('.nivo-caption h2');},
	 <?php if($NV_stageplaypause=="disabled") { ?>
	 controlNav: false,
	 <?php } ?> 
	 sliderid: 'stage'
});

<?php } else {
	
if($NV_show_slider=='islider') { ?>
	var index = 0;
	var thumbs = $(".islider-nav-ul img");
	var imgHeight = <?php echo $NV_navimg_height; ?>;
	for (i=0; i<thumbs.length; i++)
	{
		$(thumbs[i]).addClass("thumb-"+i);
		$(thumbs[i]).css("height",imgHeight+'px');
	}
	
	$("#stage-next").click(sift);
	show(index);
	
	function sift()
	{
		if (index<(thumbs.length-1)){index+=1 ; }
		else {index=0}
		show (index);
	}
	
	function show(num)
	{
		imgHeight = $('.islider-nav-ul img').height();
		var scrollPos = (num+1)*imgHeight;
		$(".islider-nav-ul").stop().animate({scrollTop: scrollPos}, 1000);			
	}
	
	var thumbsclone = $(".islider-nav-ul li.copynav");
	$(thumbsclone).slice(0,3).clone().appendTo(".islider-nav-ul");

<?php } else { ?>
	$('.control-panel').append('<ul class="nav"></ul>');
<?php } ?>

	$('.stage-slider').cycle({ 
		fx:     '<?php echo $NV_stagetransition; ?>', 
		easing: '<?php echo $NV_stagetween; ?>',
		timeoutFn: calculateTimeout,
		speed: 750,	
		before:  onBefore,
		slideExpr: '.panel',
        slideResize: 0,
		after:  onAfter,
		pager:  '.control-panel .nav',
		pause:  1,
		cleartype:  true,
    	cleartypeNoBg:  true,
		next:   '#stage-next', 
    	prev:   '#stage-prev',
		pagerAnchorBuilder: function(idx, slide) { 
        
<?php if($NV_show_slider=='islider') { ?>
		var $nav = $('.islider-nav-ul li').slice(0).find(' li:eq(' + (idx) + ') a');
		return $nav;
	
		var $nav_clone = $('.islider-nav-ul li').slice(1).find(' li:eq(' + (idx) + ') a');
        return $nav_clone;	
<?php } else { ?>	
		return '<li><a href="#"></a></li>'; 
<?php } ?>	
    } 
	
	});
	
	
	$(".stage-slider").touchwipe({
		preventDefaultEvents: false,
            wipeLeft: function() {
                $('.stage-slider').cycle('next');
                return false;
            },
		      wipeRight: function() {
                $('.stage-slider').cycle("prev");
                return false;
            }
	 	
	});	



    $(window).resize(function() {
		
		$('.stage-slider-wrap.stage,.stage-slider-wrap.islider').resizegallery('','','.panel.current','.slider-inner-wrap'); // resize gallery
		$('.stage-slider-wrap.islider').resize_islider('.panel.current'); // resize iSlider

    });	


	function onBefore() { 
	
	$('.stage-slider-wrap .panel').removeClass('current');
	$(this).addClass('current');

	
	$(this).find('.animator-wrap').css('display','none').removeClass('played'); // remove class to init content animator	

		$(this).find('.animator-wrap.loaded').each(function(index, value) { 
			var animatorid='content_animator_'+$(this).attr('id');		
			
			var fn = window[animatorid];
			if(typeof fn === 'function') {
				fn();
			}

		});		
	
	$('.stage-slider-wrap.stage .panel.current').stage_overlay('before'); // animate stage overlay text
	
	$('.stage-slider-wrap.islider').resize_islider('.panel.current'); // resize iSlider
	$('.stage-slider-wrap.stage').resizegallery(jQuery(this).height(),'animate','.panel','.slider-inner-wrap'); // resize gallery	
	$('.stage-slider-wrap.islider').resizegallery(jQuery(this).height(),'animate','.panel','.stage-slider.islider','islider'); // resize islider gallery
	
	if($.browser.msie || $.browser.opera) { // resize canvas
		$('.stage-slider .panel.current').resize_canvas('.panel');
	}	

	
<?php if($NV_show_slider=='islider') { ?>
		sift();
<?php } ?>
	
	} 

	function onAfter() { 	
		
		
		$('.stage-slider-wrap.stage .panel.current').stage_overlay('after'); // animate stage overlay text
		
   		var videoid = $(this).find('.jwplayer').attr("id");
			
		$('.stage-slider-wrap .jwplayer').each(function(index) {
					var obj='';
					obj = $(this).attr("id");
					
					if(obj==videoid && $(this).hasClass("autostart")) {
						currentState = obj.newstate; 
						if(currentState=="IDLE") {
							jwplayer(obj).play();
						}
					}					 
		});
	
	} 
	

	
<?php } ?>

});

<?php if($NV_imageeffect=='shadow' || $NV_imageeffect ='shadowreflection') $NV_forceheight=$NV_imgheight+$NV_imgheight/100*13; else $NV_forceheight=$NV_imgheight; // include force height for video only slides ?>

$(window).load(function() {
	
	$('.stage-slider-wrap.stage .panel:first').stage_overlay('after'); // animate stage overlay text
	
	$('.stage-slider-wrap.islider').resize_islider('.panel'); // resize iSlider
	<?php if($slidenum_chk>1) { ?>
		$('.stage-slider-wrap.stage').resizegallery('','animate','.panel','.slider-inner-wrap','','<?php echo $NV_forceheight; ?>'); // resize gallery
	<?php } ?>
	$('.stage-slider-wrap.islider').resizegallery('','','.panel','.stage-slider.islider','','<?php echo $NV_forceheight; ?>'); // resize islider gallery

});

})(jQuery);
//-->


// timeouts per slide (in seconds) 
var timeouts = [<?php echo $NV_slidearray; ?>]; 
function calculateTimeout(currElement, nextElement, opts, isForward) { 
    var index = opts.currSlide; 
    return timeouts[index] * 1000; 
} 
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
</script>
</div><!-- / gallery-wrap -->
