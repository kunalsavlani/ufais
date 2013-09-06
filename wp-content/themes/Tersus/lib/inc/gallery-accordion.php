<?php 

	if($NV_imgheight) {
		$NV_galleryheight=$NV_imgheight;
	} else {
		$NV_galleryheight="350"; // Set default Gallery Height
		$NV_imgheight="350"; // Set default Gallery Height
	}
	
	$NV_gallerywidth="980";
	$NV_image_size = "h=". $NV_imgheight ."&amp;";
?>

<div id="nv-accordion" class="<?php echo $NV_galleryclass; ?> nv-skin accordion-gallery-wrap <?php if($NV_imageeffect=="shadow" || $NV_imageeffect=="shadowblackwhite") { ?>shadow<?php } elseif($NV_imageeffect=="reflection") { ?>reflection<?php } elseif($NV_imageeffect=="shadowreflection") { ?>shadowreflection<?php } ?> stage">
    <ul class="accordion-gallery stage" style="height:<?php echo $NV_galleryheight; ?>px">
	 
<?php 

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

$postcount = 0; ?>

	</ul>
</div><!-- / accordion-gallery -->
<?php if(!$NV_stagetimeout) { $NV_stagetimeout = "10"; }; ?>
<?php if(!$NV_accordionautoplay) {$NV_accordionautoplay="false";} else {$NV_accordionautoplay="true";} ?>
<script type="text/javascript">
<!--
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
	jQuery().ready(function() {
		jQuery('.accordion-gallery.stage').kwicks({
		autorotation: <?php echo $NV_accordionautoplay; ?>,
		event: 'mouseover',
		autorotationSpeed:<?php echo $NV_stagetimeout; ?>,
		easing: 'easeInOutCubic',
		duration: 700,
		id: 'nv-accordion'
		});
	});	
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
//-->
</script>