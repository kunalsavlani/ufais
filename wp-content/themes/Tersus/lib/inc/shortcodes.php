<?php

/******************************************************************/
/*	Grid Gallery							      				  */
/******************************************************************/

function postgallery_grid_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'filtering' => '',
	  'columns' => '',
	  'categories' => '',
	  'post_format'=> '',
	  'product_categories' => '',
	  'product_tags' => '',		  
	  'slidesetid' => '',
	  'attached_id' => '', 
	  'media_categories' => '', 
	  'flickr_set' => '',  	  	  
	  'imageeffect' => '',
	  'height' => '',
	  'width' => '',
	  'title' => '',
	  'imgheight' => '',
	  'align' => '',
	  'imgwidth' => '',	  
	  'id' => '',
	  'lightbox' => '',	  
	  'shadow' => '',
	  'limit' => '',
	  'excerpt' => '',
	  'orderby' => '',	  
	  'sortby' => '',	  
      ), $atts ) );


$NV_title = esc_attr($title);
$NV_gallerysortby =  esc_attr($sortby);
$NV_galleryorderby =  esc_attr($orderby);
$NV_gallerynumposts= esc_attr($limit);
$NV_groupgridcontent = esc_attr($content);
$NV_gridfilter = esc_attr($filtering);
$NV_galleryheight = esc_attr($height);
$NV_gallerywidth = esc_attr($width);


if(!esc_attr($columns)) {
	$NV_gridcolumns="3"; // Set default 3 Columns
} else {
	$NV_gridcolumns = esc_attr($columns);
}

$NV_gridcolumns_text=numberToWords($NV_gridcolumns); // convert number to word

$NV_shadowsize = esc_attr($shadow);
$NV_imageeffect = esc_attr($imageeffect);

$NV_imgheight = esc_attr($imgheight);
$NV_imgwidth = esc_attr($imgwidth);

$NV_lightbox = esc_attr($lightbox);

if(!$NV_gallerywidth) { $NV_panelwidth = 100/$NV_gridcolumns; $NV_widthtype='%'; } else { $NV_panelwidth = $NV_gallerywidth/$NV_gridcolumns; $NV_widthtype='px'; }
$NV_panelformat='style="width:'.$NV_panelwidth.$NV_widthtype.';height:'.$NV_galleryheight.'px"'; // calc panel width/height

/* ------------------------------------
:: DEFAULT IMAGE SIZES
------------------------------------ */
	
if(!$NV_imgheight && !$NV_imgwidth) {
			
	$NV_imgheight = '120';
	$NV_image_size = "h=". $NV_imgheight ."&amp;";	
			
} elseif($NV_imgwidth && !$NV_imgheight) {
	$NV_image_size = "w=". $NV_imgwidth ."&amp;";	
} elseif($NV_imgheight && !$NV_imgwidth) {
	$NV_image_size = "h=". $NV_imgheight ."&amp;";	
} elseif($NV_imgheight && $NV_imgwidth) {
	$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
}

if($NV_gallerywidth) $NV_gridgallery_width = 'style="max-width:'.$NV_gallerywidth.'px"'; else $NV_gridgallery_width ='';


if(esc_attr($excerpt)) {
	$NV_galleryexcerpt = esc_attr($excerpt);
} else {
	$NV_galleryexcerpt = "55";
}

ob_start(); 

/* ------------------------------------
:: SET VARIABLES
------------------------------------ */

$NV_shortcode_id="gd".esc_attr($id);
$NV_show_slider = 'gridgallery';
$NV_gallerycat = esc_attr($categories);
$NV_gallerypostformat = esc_attr($post_format);
$NV_mediacat = esc_attr($media_categories);
$NV_slidesetid = esc_attr($slidesetid);
$NV_attachedmedia = esc_attr($attached_id);
$NV_flickrset = esc_attr($flickr_set);
$NV_productcat = esc_attr($product_categories);
$NV_producttag = esc_attr($product_tags);

/* ------------------------------------
:: SET VARIABLES *END*
------------------------------------ */


if($NV_title) echo '<div class="gallery-title"><h4>'.$NV_title.'</h4></div>'; // TITLE ?>

<div class="grid-gallery nv-skin id-<?php echo $NV_shortcode_id.' '.esc_attr($align); ?>" <?php echo $NV_gridgallery_width; ?>>
<div class="gallery-wrap clearfix"> 

<?php 
$postcount = 0;

/* ------------------------------------

:: LOAD DATA SOURCE

------------------------------------ */

if($NV_attachedmedia) 	{ $NV_datasource='data-1'; }
if($NV_gallerycat ||
$NV_gallerypostformat) 	{ $NV_datasource='data-2'; }
if($NV_flickrset)  		{ $NV_datasource='data-3'; }
if($NV_slidesetid) 		{ $NV_datasource='data-4'; }
if($NV_productcat ||
$NV_producttag) 		{ $NV_datasource='data-5'; }
if($NV_mediacat) 		{ $NV_datasource='data-6'; }

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

------------------------------------ */ ?>

<div class="clear"></div>
</div><!-- /gallery-wrap -->
</div><!-- /postslider -->

<script type="text/javascript">
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
// Custom sorting plugin
(function($) {
  jQuery.fn.sorted = function(customOptions) {
    var options = {
      reversed: false,
      by: function(a) { return a.text(); }
    };
    jQuery.extend(options, customOptions);
    $data = $(this);
    arr = $data.get();
    arr.sort(function(a, b) {
      var valA = options.by(jQuery(a));
      var valB = options.by(jQuery(b));
      if (options.reversed) {
        return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;				
      } else {		
        return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
      }
    });
    return $(arr);
  };
})(jQuery);



(function($) {
$(document).ready(function() {
  
  var read_button = function(class_names) {
    var r = {
      selected: false,
      type: 0
    };
    for (var i=0; i < class_names.length; i++) {
      if (class_names[i].indexOf('selected-') == 0) {
        r.selected = true;
      }
      if (class_names[i].indexOf('segment-') == 0) {
        r.segment = class_names[i].split('-')[1];
      }
    };
    return r;
  };
  
  var determine_sort = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };
  
  var determine_kind = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };
  
  var $preferences = {
    duration: 800,
    easing: 'easeInOutBack',
	  enhancement: function() {
		  

		$("#nv-sortable<?php echo "-".$NV_shortcode_id; ?> .panel:nth-child(<?php echo $NV_gridcolumns; ?>n)").css({marginRight:0});
		$("#nv-sortable<?php echo "-".$NV_shortcode_id; ?> .panel").removeClass('last',500);
		  
		
		$('.grid-gallery #nv-sortable<?php echo "-".$NV_shortcode_id; ?> .galleryimg').append('<div class="hoverimg"><img src="<?php echo get_template_directory_uri(); ?>/images/image-hover.png" alt="&nbsp;" /></div>');	
		$('.grid-gallery #nv-sortable<?php echo "-".$NV_shortcode_id; ?> .galleryvid').append('<div class="hovervid"><img src="<?php echo get_template_directory_uri(); ?>/images/video-hover.png" alt="&nbsp;" /></div>');			
	
		<?php if($NV_imageeffect=='shadow' || $NV_imageeffect=='shadowreflection') { ?>
			$('#nv-sortable<?php echo "-".$NV_shortcode_id; ?> .gridimg-wrap').find('.shadow-wrap img').fadeTo(1000, 0.9, function() {
      			// Animation complete.
    		});
		<?php } ?>
		
		$('.grid-gallery #nv-sortable<?php echo "-".$NV_shortcode_id; ?> .galleryimg,.grid-gallery #nv-sortable<?php echo "-".$NV_shortcode_id; ?> .galleryvid').hover(	
						
				//Mouseover, fadeIn the hidden hover class	
				function() {
				$(this).children('div').css('display', 'block'); // FIX IE BUG	
				$(this).children('div').fadeTo("slow",1);
						
				}, 
			
				//Mouseout, fadeOut the hover class
				function() {
				$(this).children('div').fadeTo("fast",0, function() {
				});
				
				
			});

		$('#nv-sortable<?php echo "-".$NV_shortcode_id; ?> .gridimg-wrap').hover(function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "show" }, 400, "easeInOutCubic");
				}, function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "hide" }, 400, "easeInBack");
		});
	
		$(".fancybox").fancybox({
			openSpeed : 800,
			opacity : 0.85,
		 helpers : {
			media : {}
		 }
		});

		$("#nv-sortable<?php echo "-".$NV_shortcode_id; ?> img.reflect").each(function() {
			$(this).reflect({height:0.12,opacity:0.2});
		});
				
	
		if ($.browser.msie && $.browser.version=="7.0" && typeof Cufon !== "undefined"){
			Cufon.replace('#nv-sortable<?php echo "-".$NV_shortcode_id; ?> h3');
		} else if(typeof Cufon !== "undefined") {
			Cufon.refresh();
		}

	}
  };
  
  var $list = $('div#nv-sortable<?php echo "-".$NV_shortcode_id; ?>');
  var $data = $list.clone();
  
  var $controls = $('ul.splitter.<?php echo "id-".$NV_shortcode_id; ?> ul');
  
  $controls.each(function(i) {
    
    var $control = $(this);
    var $buttons = $control.find('a');
    
    $buttons.bind('click', function(e) {
      
      var $button = $(this);
      var $button_container = $button.parent();
      var button_properties = read_button($button_container.attr('class').split(' '));      
      var selected = button_properties.selected;
      var button_segment = button_properties.segment;

      if (!selected) {
		var cnt = $(".splitter.<?php echo "id-".$NV_shortcode_id; ?> ul li").length+1; // Cycle through list and remove class
		for(var i=1; i<cnt; i++){
			$buttons.parent().removeClass('selected-'+i)
		}

        $buttons.parent().removeClass('active');
        $button_container.addClass('selected-' + button_segment).addClass('active');
        
        var sorting_type = determine_sort($controls.eq(1).find('a'));
        var sorting_kind = determine_kind($controls.eq(0).find('a'));
        
        if (sorting_kind == 'all') {
          var $filtered_data = $data.find('.panel');
        } else {
          var $filtered_data = $data.find('.panel.' + sorting_kind);
        }
        
        if (sorting_type == 'size') {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return parseFloat($(v).find('span').text());
            }
          });
        } else {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return $(v).find('strong').text().toLowerCase();
            }
          });
        }
        
        $list.quicksand($sorted_data, $preferences);
        
      }
      
      e.preventDefault();
    });
    
  }); 

});
})(jQuery);
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
</script>
<?php 

$output_string=ob_get_contents();
ob_end_clean();

return $output_string;
}


/******************************************************************/
/*	Group Slider							      				  */
/******************************************************************/

function postgallery_slider_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'post_format'=> '',
	  'product_categories' => '',
	  'product_tags' => '',	  
	  'slidesetid' => '',
	  'attached_id' => '', 
	  'media_categories' => '', 
	  'flickr_set' => '',  	  
	  'imageeffect' => '',
	  'height' => '',
	  'width' => '',
	  'imgheight' => '',
	  'imgwidth' => '',
	  'title' => '',
	  'id' => '',
	  'lightbox' => '',	 
	  'shadow' => '', 
	  'limit' => '',
	  'excerpt' => '',
	  'orderby' => '',	  
	  'sortby' => '',
	  'timeout' => '', 
	  'vertical' => '',	
	  'align' => '',
	  'columns' => '',
	  'class' => '',
	  'image_align' => '',  
	  'animation' => '',
	  'tween' => '',	  
      ), $atts ) );
 
$NV_gallerysortby =  esc_attr($sortby);
$NV_galleryorderby =  esc_attr($orderby);
$NV_gallerynumposts= esc_attr($limit);
$NV_groupgridcontent = esc_attr($content);
$NV_gallerywidth = esc_attr($width);
$NV_shadowsize = esc_attr($shadow);
$NV_imageeffect = esc_attr($imageeffect);
$NV_imgheight = esc_attr($imgheight);
$NV_imgwidth = esc_attr($imgwidth);
$NV_galleryheight = esc_attr($height);
$NV_lightbox = esc_attr($lightbox);
$NV_slidetimeout=esc_attr($timeout);
$NV_title = esc_attr($title);

$NV_verticalslide = esc_attr($vertical);
$NV_slidercolumns = esc_attr($columns);
if(!$NV_slidercolumns) $NV_slidercolumns = '3';

$NV_slidercolumns_text=numberToWords($NV_slidercolumns); // convert number to word

$NV_imgalign = esc_attr($image_align);
$NV_class = esc_attr($class);

if($NV_imgalign) $NV_imgalign = 'imgalign-'.$NV_imgalign; else $NV_imgalign='';

if($NV_verticalslide=='yes') $NV_verticalslide='vertical'; else $NV_verticalslide='horizontal';

if($NV_verticalslide=='vertical') {
	/* ------------------------------------
	:: VERTICAL SLIDER VARIABLES
	------------------------------------ */
	$NV_sliderformat =  'style="max-width:'.$NV_gallerywidth.'px;"';
	
	if($NV_galleryheight) {
		$NV_vertheight = $NV_galleryheight;
		$NV_panelheight = $NV_vertheight/$NV_slidercolumns;
		$NV_panelformat='style="min-height:'.$NV_panelheight.$NV_widthtype.'px;"';
	}
	
} else {
	/* ------------------------------------
	:: HORIZONTAL SLIDER VARIABLES
	------------------------------------ */
	$NV_vertheight=$NV_galleryheight;
	$NV_sliderformat =  'style="max-width:'.$NV_gallerywidth.'px;"';
	if(!$NV_gallerywidth) { $NV_panelwidth = 100/$NV_slidercolumns; $NV_widthtype='%'; } else { $NV_gallerywidth=$NV_gallerywidth; $NV_panelwidth = $NV_gallerywidth/$NV_slidercolumns; $NV_widthtype='px'; }
	
	if($NV_galleryheight) { $NV_panelformat='style="min-height:'.$NV_galleryheight.'px"'; }

}

	/* ------------------------------------
	:: DEFAULT IMAGE SIZES
	------------------------------------ */
	
	if(!$NV_imgheight && !$NV_imgwidth) {
			
		$NV_imgheight = '100';
		$NV_image_size = "h=". $NV_imgheight ."&amp;";
			
	} elseif($NV_imgwidth && !$NV_imgheight) {
		
		$NV_image_size = "w=". $NV_imgwidth ."&amp;";

		
	} elseif($NV_imgheight && !$NV_imgwidth) {
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
		
	} elseif($NV_imgheight && $NV_imgwidth) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}

if(!$NV_galleryheight) $NV_galleryheight = $NV_imgheight+$NV_imgheight/100*12;


if($NV_verticalslide=='vertical') {
	$NV_animation="scrollVert";
} elseif(esc_attr($animation)) {
	$NV_animation=esc_attr($animation);
} else {
	$NV_animation="scrollHorz";
}
	 
if(esc_attr($tween)) {
	$NV_tween=esc_attr($tween);
} else {
	$NV_tween="easeInOutExpo";
} 


if(esc_attr($excerpt)) {
	$NV_galleryexcerpt = esc_attr($excerpt);
} else {
	$NV_galleryexcerpt = "55";
}


ob_start();

/* ------------------------------------
:: SET VARIABLES
------------------------------------ */

$NV_shortcode_id="gp".esc_attr($id);
$NV_show_slider = 'groupslider';

$NV_gallerycat = esc_attr($categories);
$NV_gallerypostformat = esc_attr($post_format);
$NV_mediacat = esc_attr($media_categories);
$NV_slidesetid = esc_attr($slidesetid);
$NV_attachedmedia = esc_attr($attached_id);
$NV_flickrset = esc_attr($flickr_set);
$NV_productcat = esc_attr($product_categories);
$NV_producttag = esc_attr($product_tags);

/* ------------------------------------
:: SET VARIABLES *END*
------------------------------------ */

if($NV_title) echo '<div class="gallery-title"><h4>'.$NV_title.'</h4></div>'; // TITLE ?>

<div class="group-slider shortcode nv-skin id-<?php echo $NV_shortcode_id.' '. $NV_verticalslide .' '.$NV_class. ' '.esc_attr($align); ?> top"  <?php echo $NV_sliderformat;?>>
	<div class="gallery-wrap">
		<div class="post-slide <?php echo $NV_imgalign; ?>" style="height:<?php echo $NV_vertheight; ?>px">

<?php

/* ------------------------------------

:: LOAD DATA SOURCE

------------------------------------ */

if($NV_attachedmedia) 	{ $NV_datasource='data-1'; }
if($NV_gallerycat ||
$NV_gallerypostformat) 	{ $NV_datasource='data-2'; }
if($NV_flickrset)  		{ $NV_datasource='data-3'; }
if($NV_slidesetid) 		{ $NV_datasource='data-4'; }
if($NV_productcat ||
$NV_producttag) 		{ $NV_datasource='data-5'; }
if($NV_mediacat) 		{ $NV_datasource='data-6'; }

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

------------------------------------ */ ?>

		</div><!-- / postslide -->
        <div class="slidernav-right nvcolor-wrap">
        <?php if($post_count>$NV_slidercolumns) { ?>
            <span class="nvcolor"></span><div class="slidernav"><a id="rightnav-<?php echo $NV_shortcode_id; ?>" href="#"></a>
            </div>
        <?php } ?>
        </div>
        
            <div class="slidernav-left nvcolor-wrap">
        <?php if($post_count>$NV_slidercolumns) { ?>
			<span class="nvcolor"></span><div class="slidernav"><a id="leftnav-<?php echo $NV_shortcode_id; ?>" href="#"></a>
                </div>
        <?php } ?>
        </div>
		<div class="clear"></div>
	</div><!-- / gallery-wrap -->
</div><!-- /gallery-slider -->

<script type="text/javascript">
<!--
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
jQuery(document).ready(function() {

	jQuery('.group-slider.id-<?php echo $NV_shortcode_id; ?> .post-slide').cycle({ 
		fx:     '<?php echo $NV_animation; ?>',
		timeout: <?php echo esc_attr($timeout) * 1000; ?>,
		before:  onBefore<?php echo $NV_shortcode_id; ?>,
		after:  onAfter<?php echo $NV_shortcode_id; ?>,			
		speed: 1000,
		pause: 1,
		slideResize: 0,		
		slideExpr: '.groupslides-wrap',				
		cleartype:  true,
    	cleartypeNoBg:  true,
		easing: '<?php echo $NV_tween; ?>',
		prev: '#leftnav-<?php echo $NV_shortcode_id; ?>',
		next: '#rightnav-<?php echo $NV_shortcode_id; ?>'
	});

	jQuery(".group-slider.id-<?php echo $NV_shortcode_id; ?> .post-slide").touchwipe({
		preventDefaultEvents: false,
            wipeLeft: function() {
                jQuery('.group-slider.id-<?php echo $NV_shortcode_id; ?> .post-slide').cycle('next');
                return false;
            },
		      wipeRight: function() {
                jQuery('.group-slider.id-<?php echo $NV_shortcode_id; ?> .post-slide').cycle("prev");
                return false;
            }
	 	
	});

});

	

 
    jQuery(window).resize(function() {

			jQuery('.group-slider.id-<?php echo $NV_shortcode_id; ?>').resizegallery('','','.groupslides-wrap','.post-slide');		
			
			var alive = 1;
			if(jQuery.browser.msie && alive==1) {
				var gridwrap_height = jQuery('.group-slider.id-<?php echo $NV_shortcode_id; ?>').find('.gridimg-wrap').height();
				reflectionheight=gridwrap_height/100*10.8;
				jQuery('.group-slider.id-<?php echo $NV_shortcode_id; ?> .reflect canvas').css('height',reflectionheight+'px');
			}          
    });



	function onBefore<?php echo $NV_shortcode_id; ?>() { 
		
		jQuery('.group-slider.id-<?php echo $NV_shortcode_id; ?>').resizegallery(jQuery(this).height(),'animate','.groupslides-wrap','.post-slide');	
		
   		var videoid = jQuery(this).find('.jwplayer.id<?php echo $NV_shortcode_id; ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo $NV_shortcode_id; ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					if(str!=videoid) {
						if(str.search("video")==-1) {
						jwplayer(str).stop();
						}
					}					 
		});
	
	} 

	function onAfter<?php echo $NV_shortcode_id; ?>() { 

   		var videoid = jQuery(this).find('.jwplayer.id<?php echo $NV_shortcode_id; ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo $NV_shortcode_id; ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					autostart = jQuery(this).attr("class");
					if(str==videoid) {
						if(str.search("video")==-1 && autostart.search("autostart")!=-1) {
						jwplayer(str).play();
						}
					}					 
		});
					
	} 
	

jQuery(window).load(function() {
	jQuery('.group-slider.id-<?php echo $NV_shortcode_id; ?>').resizegallery('','animate','.groupslides-wrap','.post-slide');
});	

<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
//-->
</script>
<?php
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;

}

/******************************************************************/
/*	Stage Gallery							      				  */
/******************************************************************/

function postgallery_image_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'post_format'=> '',
	  'product_categories' => '',
	  'product_tags' => '',	  
	  'slidesetid' => '',
	  'attached_id' => '', 
	  'media_categories' => '', 
	  'flickr_set' => '',  	  
	  'imageeffect' => '',
	  'shadow' => '',
	  'timeout' => '',
	  'lightbox' => '',
	  'playnav' => '',
	  'navigation' => '',
	  'height' => '',
	  'width' => '',
	  'title' => '',	  
	  'align' => '',
	  'id' => '',
	  'limit' => '',
	  'orderby' => '',	  
	  'sortby' => '',
	  'animation' => '',
	  'tween' => '',
	  'speed' => '',
	  'excerpt' => '',
	  'customlayer' => '',	 	  
      ), $atts ) );


/* ------------------------------------
:: SET VARIABLES
------------------------------------ */

$NV_shortcode_id="sg".esc_attr($id);

$NV_gallerycat = esc_attr($categories);
$NV_gallerypostformat = esc_attr($post_format);
$NV_mediacat = esc_attr($media_categories);
$NV_slidesetid = esc_attr($slidesetid);
$NV_attachedmedia = esc_attr($attached_id);
$NV_flickrset = esc_attr($flickr_set);
$NV_productcat = esc_attr($product_categories);
$NV_producttag = esc_attr($product_tags);



/* ------------------------------------
:: SET VARIABLES *END*
------------------------------------ */

	$NV_show_slider='';
	
	if($code=='postgallery_image') {
	 $NV_show_slider='stageslider';
	} elseif($code=='postgallery_islider') {
	 $NV_show_slider='islider';
	} elseif($code=='postgallery_nivo') {
	 $NV_show_slider='nivo';
	}
	
	$NV_gallery_format ='';
	$NV_speed =  esc_attr($speed);
	$NV_customlayer = esc_attr($customlayer);
	$NV_title = esc_attr($title);
	$NV_lightbox =  esc_attr($lightbox);
	$NV_slidesetid = esc_attr($slidesetid);
	$NV_stageplaypause= esc_attr($playnav);
	$NV_stageplaypause= esc_attr($navigation);
	if(esc_attr($excerpt)) {
		$NV_galleryexcerpt = esc_attr($excerpt);
	} else {
		$NV_galleryexcerpt = "55";
	}
	 
	if(esc_attr($animation)) {
		$NV_animation=esc_attr($animation);
	} else {
		if($NV_show_slider=='nivo') {
			$NV_animation="random";
		} else {
			$NV_animation="fade";
		}
	}
	 
	if(esc_attr($tween)) {
		$NV_tween=esc_attr($tween);
	} else {
		$NV_tween="linear";
	} 
	 
	$NV_imgwidth=esc_attr($width);
	$NV_imgheight=esc_attr($height);
	$NV_galleryheight=$NV_imgheight;
	$NV_imageeffect=esc_attr($imageeffect);
	$NV_gallery_width = $NV_imgwidth;
	
	$NV_gallerysortby =  esc_attr($sortby);
	$NV_galleryorderby =  esc_attr($orderby);
	$NV_gallerynumposts= esc_attr($limit);

	if($NV_imgwidth && !$NV_imgheight) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;";	
	} elseif($NV_imgheight && !$NV_imgwidth) {
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
	} elseif($NV_imgheight && $NV_imgwidth) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}


	if($NV_show_slider=='nivo' && !$NV_imgheight) {
		$NV_galleryheight=$NV_imgheight='350';
		
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}	
	

	if($NV_show_slider=='stageslider') { // Set the Gallery Type
	 $NV_gallery_type='post-gallery';	
	} elseif($NV_show_slider=='islider') {
	 $NV_gallery_type='post-gallery islider id'.$NV_shortcode_id;
	} elseif($NV_show_slider=='nivo') {
	 $NV_gallery_type='stage-slider-nivo id'.$NV_shortcode_id;
	}



	if($NV_show_slider=='islider') {
	// iSlider Vars
	$NV_navimg_width=$NV_imgwidth/100*25;
	$NV_gallery_width=$NV_imgwidth+$NV_navimg_width;
	$NV_gallery_format='style="float:left;"';
	$NV_gallery_effect=$NV_imageeffect.' islider';
	$NV_imageeffect='';
	$NV_gallerywrap_style ='max-width:'. $NV_imgwidth .'px;';
	}
	
	
	if($NV_show_slider=='nivo') {
	// Nivo Slider Vars
	$NV_gallery_format='style="height:'.$NV_galleryheight.'px;max-width:'.$NV_imgwidth.'px"';
	$NV_gallerywrap_style='max-width:'.$NV_gallery_width.'px';
	$NV_gallery_effect=$NV_imageeffect.' nivo';
	$NV_imageeffect='';
	} 
	

	if($NV_show_slider=='stageslider') {
	// Stage Slider Vars
	$NV_gallerywrap_style='max-width:'.$NV_gallery_width.'px';
	$NV_gallery_effect=' stage';
	$NV_gallery_extras='style="height:'.$NV_galleryheight.'px;"';
	} 	
	
	if(esc_attr($timeout)) {
		$NV_stagetimeout = esc_attr($timeout);
	}

ob_start();

if($NV_title) echo '<div class="gallery-title"><h4>'.$NV_title.'</h4></div>'; // TITLE ?>

<div class="post-gallery-wrap shortcode nv-skin id-<?php echo $NV_shortcode_id; ?> <?php echo esc_attr($align); ?> gallery-wrap <?php if($NV_gallery_effect) echo $NV_gallery_effect; ?>" style=" <?php if(!$NV_customlayer) { echo $NV_gallerywrap_style; } ?>">

<?php
if($NV_show_slider!='islider') {
if($NV_stageplaypause=="enabled" || $NV_stageplaypause=="leftrightonly") { ?>
<div class="slidernav-left nvcolor-wrap">
		<span class="nvcolor"></span><div class="slidernav"><a class="nivo-prevNav poststage-prev id<?php echo $NV_shortcode_id; ?>"></a></div>
</div>
<div class="slidernav-right nvcolor-wrap">
		<span class="nvcolor"></span><div class="slidernav"><a class="nivo-nextNav poststage-next id<?php echo $NV_shortcode_id; ?>"></a></div>
</div>
<?php } 
if($NV_stageplaypause!="disabled" && $NV_stageplaypause!="leftrightonly") { ?>  
<div class="control-wrap">
	<div class="post-control-panel id<?php echo $NV_shortcode_id; ?>">
	</div><!-- / control-panel -->
</div><!-- / control-wrap -->
<?php } 
} ?> 
<div class="slider-inner-wrap" <?php if($NV_gallery_format) echo $NV_gallery_format; ?>>
<div class="<?php echo $NV_gallery_type; ?>" <?php if(isset($NV_gallery_extras)) echo $NV_gallery_extras; ?>>

<?php if($NV_gallery_type=='stage-slider') { ?>
<img src="<?php echo get_template_directory_uri()."/lib/scripts/timthumb.php?h=". $NV_imgheight ."&amp;h=". $NV_imgwidth ."&amp;zc=1&amp;src=". get_template_directory_uri(); ?>/images/blank.gif">
<?php } 



/* ------------------------------------

:: LOAD DATA SOURCE

------------------------------------ */

if($NV_attachedmedia) 	{ $NV_datasource='data-1'; }
if($NV_gallerycat ||
$NV_gallerypostformat) 	{ $NV_datasource='data-2'; }
if($NV_flickrset)  		{ $NV_datasource='data-3'; }
if($NV_slidesetid) 		{ $NV_datasource='data-4'; }
if($NV_productcat ||
$NV_producttag) 		{ $NV_datasource='data-5'; }
if($NV_mediacat) 		{ $NV_datasource='data-6'; }

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
?>

</div><!-- / slider-inner-wrap -->
</div><!-- / stageslider -->
<?php if($NV_show_slider=='islider') { // iSlider Image Nav

$NV_navimg_height=esc_attr($height)/3+1;
$NV_navimg = rTrim($NV_navimg,',');
$NV_navimg=explode(',',$NV_navimg);
 ?>
<div class='islider-nav-wrap'>
	<div class='nvcolor-wrap'><span class="nvcolor"></span><div class="poststage-prev id<?php echo $NV_shortcode_id; ?> islider-nav"></div></div>
	<ul class="islider-nav-ul id<?php echo $NV_shortcode_id; ?>" style="height:<?php echo $NV_imgheight; ?>px">
    <li class="copynav">
		<ul>
		<?php foreach ($NV_navimg as $NV_navimg) { ?>
			<li><a href="#"><img src="<?php  echo $NV_imagepath . dyn_getimagepath($NV_navimg); ?>" /></a></li>
		<?php } ?>
		</ul>
	</li>
    </ul>
</div> 


<?php } ?>
<div class="clear"></div>
</div><!-- / gallery-wrap -->

<script type="text/javascript">
<!--
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
(function($) {
$(document).ready(function() {
<?php if($NV_show_slider=='nivo') { // Nivo script ?>

$('.stage-slider-nivo.id<?php echo $NV_shortcode_id; ?>').nivoSlider({
	effect: '<?php echo $NV_animation; ?>',
	<?php if(!$NV_stagetimeout) $NV_stagetimeout=10000; else $NV_stagetimeout= $NV_stagetimeout*1000; ?>
	 pauseTime: <?php echo $NV_stagetimeout; ?>, // How long each slide will show
     afterChange: function(){ Cufon.replace('.nivo-caption h2');},
	 <?php if($NV_stageplaypause=="disabled") { ?>
	 controlNav: false,
	 <?php } ?> 
	 sliderid: '<?php echo $NV_shortcode_id; ?>'
});

<?php } else { // iSlider and Stage script
	
if($NV_show_slider=='islider') { ?>
	var index = 0;
	var thumbs = $(".islider-nav-ul.id<?php echo $NV_shortcode_id; ?> img");
	var imgHeight = <?php echo $NV_navimg_height; ?>;
	for (i=0; i<thumbs.length; i++)
	{
		$(thumbs[i]).addClass("thumb-"+i);
		$(thumbs[i]).css("height",imgHeight+'px');
	}
	
	$(".poststage-prev.id<?php echo $NV_shortcode_id; ?>").click(sift);
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
		$(".islider-nav-ul.id<?php echo $NV_shortcode_id; ?>").stop().animate({scrollTop: scrollPos}, 400);			
	}
	
	var thumbsclone = $(".islider-nav-ul.id<?php echo $NV_shortcode_id; ?> li.copynav");
	$(thumbsclone).slice(0,3).clone().appendTo(".islider-nav-ul.id<?php echo $NV_shortcode_id; ?>");

<?php } else { // stage gallery navigation ?>	
	$('.post-control-panel.id<?php echo $NV_shortcode_id; ?>').append('<ul class="nav<?php echo $NV_shortcode_id; ?>"></ul>');
<?php } ?>

	var posttimeouts = [<?php echo substr($NV_slidearray,0,-1); ?>];
	
	$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .post-gallery').cycle({ 
		fx:     '<?php echo $NV_animation; ?>', 
		easing: '<?php echo $NV_tween; ?>',
		timeoutFn: function (currElement, nextElement, opts, isForward) { 
		var index = opts.currSlide; 
		return posttimeouts[index] * 1000; 
		},
		<?php if($NV_speed) {
		$speed = $NV_speed;	
		} else {
		$speed = 750;	
		} ?>
		speed: <?php echo $speed; ?>,
		pager:  '.post-control-panel .nav<?php echo $NV_shortcode_id; ?>',
		pause:  1,
		slideExpr: '.panel',
        slideResize: 0,		
		before:  onBefore,
		after:  onAfter,		
		cleartype:  true,
    	cleartypeNoBg:  true,
<?php if($NV_show_slider=='islider') { ?>
		next:   '.poststage-prev.id<?php echo $NV_shortcode_id; ?>',
<?php } else {
	 if($NV_stageplaypause=="enabled" || $NV_stageplaypause=="leftrightonly") { // check if play pause nav is enabled ?>		
		next:   '.poststage-next.id<?php echo $NV_shortcode_id; ?>', 
    	prev:   '.poststage-prev.id<?php echo $NV_shortcode_id; ?>',		
<?php }
}?>	
		pagerAnchorBuilder: function(idx, slide) { 
		
		<?php 
		
		
		if($NV_show_slider=='islider') { ?>
		var $nav = $('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .islider-nav-ul li').slice(0).find(' li:eq(' + (idx) + ') a');
		return $nav;
	
		var $nav_clone = $('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .islider-nav-ul li').slice(1).find(' li:eq(' + (idx) + ') a');
        return $nav_clone;	
		<?php } else { ?>	
		
        return '<li><a href="#"></a></li>'; 
		
		<?php } ?>
		}

		

	});
	



	function onBefore() { 

		$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .panel').removeClass('current');
		$(this).addClass('current');	
	
		$(this).find('.animator-wrap').css('display','none').removeClass('played'); // remove class to init content animator

		$(this).find('.animator-wrap.loaded').each(function(index, value) { 
			var animatorid='content_animator_'+$(this).attr('id');			
			
			var fn = window[animatorid];
			if(typeof fn === 'function') {
				fn();
			}
			
		}); 			

		$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.islider').resize_islider('.panel.current'); // resize iSlider	
		
		$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.stage').resizegallery(jQuery(this).height(),'animate','.panel','.slider-inner-wrap'); // resize gallery
		
		$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.islider').resizegallery(jQuery(this).height(),'animate','.panel','.post-gallery.islider','islider'); // resize gallery
		
			
		if($.browser.msie || $.browser.opera) { // resize canvas
			$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .panel.current').resize_canvas('.panel');
		}	

		<?php if($NV_show_slider=='islider') { ?>
				sift();
		<?php } ?>				
	
	} 

	function onAfter() { 
	
   		var videoid = $(this).find('.jwplayer').attr("id");
			
		$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .jwplayer').each(function(index) {
					obj='';
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

$(".post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .post-gallery").touchwipe({
	wipeLeft: function()  { $('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .post-gallery').cycle('next'); },
	wipeRight: function() { $('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?> .post-gallery').cycle('prev'); },
	preventDefaultEvents: true
});	

$(window).resize(function() {
	$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.islider').resize_islider('.panel'); // resize iSlider
	$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.stage,.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.islider').resizegallery('','','.panel','.slider-inner-wrap'); // resize Gallery
});	


$(window).load(function() {
	
	$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.islider').resize_islider('.panel'); // resize iSlider Nav

	<?php if($slidenum_chk>1) { ?>
		$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.stage').resizegallery('','animate','.panel','.slider-inner-wrap','','<?php echo $NV_forceheight; ?>'); // resize gallery
	<?php } ?>
	
	$('.post-gallery-wrap.id-<?php echo $NV_shortcode_id; ?>.islider').resizegallery('','animate','.panel','.post-gallery.islider'); // resize iSlider Gallery
	
});

})(jQuery);
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
//-->
</script>


<?php 
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;

}

/******************************************************************/
/*	Accordion Gallery							      			  */
/******************************************************************/


function postgallery_accordion_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'post_format'=> '',
	  'product_categories' => '',
	  'product_tags' => '',	  
	  'slidesetid' => '',
	  'attached_id' => '', 
	  'media_categories' => '', 
	  'flickr_set' => '',  	  
	  'imageeffect' => '',
	  'shadow' => '',
	  'timeout' => '',
	  'autoplay' => '',
	  'height' => '',
	  'width' => '',
	  'title' => '',
	  'lightbox' => '',	  
	  'minititles' => '',
	  'id' => '',
	  'align' => '',
	  'excerpt' =>'',
	  'limit' => '',
	  'orderby' => '',	  
	  'sortby' => '',	 	  
      ), $atts ) );
 
	$NV_title = esc_attr($title);
	$NV_lightbox=esc_attr($lightbox); 
	 
	if(esc_attr($height)) {
	$NV_imgheight=esc_attr($height); // No Reflection
	} else {
	$NV_imgheight="350"; // Set default Gallery Height
	}
	
	$NV_image_size = "h=". $NV_imgheight ."&amp;";
	
	if(esc_attr($width)) {
	$NV_gallerywidth=esc_attr($width);
	} else {
	$NV_gallerywidth="400";
	}
	
	$NV_imageeffect=esc_attr($imageeffect);
	if(esc_attr($autoplay)) {
	$NV_accordionautoplay="true";
	} else {
	$NV_accordionautoplay="false";
	}
	
	if(esc_attr($timeout)) {
	$NV_stagetimeout=esc_attr($timeout);
	} else {
	$NV_stagetimeout="10";
	}
	
	$NV_groupgridcontent=esc_attr($content);
	
	if(esc_attr($minititles)=="disable") {
	$NV_accordiontitles=esc_attr($minititles);
	}
	
	$NV_slidesetid=esc_attr($slidesetid);
	
	 if(esc_attr($timeout)) {
		$NV_poststagetimeout = esc_attr($timeout);
	 }

	$NV_gallerysortby =  esc_attr($sortby);
	$NV_galleryorderby =  esc_attr($orderby);
	$NV_gallerynumposts= esc_attr($limit);
	 
ob_start();

/* ------------------------------------
:: SET VARIABLES
------------------------------------ */

$NV_shortcode_id="an".esc_attr($id);
$NV_show_slider = 'galleryaccordion';

$NV_gallerycat = esc_attr($categories);
$NV_gallerypostformat = esc_attr($post_format);
$NV_mediacat = esc_attr($media_categories);
$NV_slidesetid = esc_attr($slidesetid);
$NV_attachedmedia = esc_attr($attached_id);
$NV_flickrset = esc_attr($flickr_set);
$NV_productcat = esc_attr($product_categories);
$NV_producttag = esc_attr($product_tags);


/* ------------------------------------
:: SET VARIABLES *END*
------------------------------------ */

if($NV_title) echo '<div class="gallery-title"><h4>'.$NV_title.'</h4></div>'; // TITLE ?>

<div id="nv-accordion-<?php echo $NV_shortcode_id; ?>" class="nv-skin accordion-gallery-wrap <?php if($NV_imageeffect=="shadow" || $NV_imageeffect=="shadowblackwhite") { ?>shadow<?php } elseif($NV_imageeffect=="reflection") { ?>reflection<?php } elseif($NV_imageeffect=="shadowreflection") { ?>shadowreflection<?php } ?> <?php echo esc_attr($align); ?>"  style="width:<?php echo $NV_gallerywidth; ?>px;">
    <ul class="accordion-gallery id-<?php echo $NV_shortcode_id; ?>" style="height:<?php echo $NV_imgheight; ?>px;">
	
<?php

/* ------------------------------------

:: LOAD DATA SOURCE

------------------------------------ */

if($NV_attachedmedia) 	{ $NV_datasource='data-1'; }
if($NV_gallerycat ||
$NV_gallerypostformat) 	{ $NV_datasource='data-2'; }
if($NV_flickrset)  		{ $NV_datasource='data-3'; }
if($NV_slidesetid) 		{ $NV_datasource='data-4'; }
if($NV_productcat ||
$NV_producttag) 		{ $NV_datasource='data-5'; }
if($NV_mediacat) 		{ $NV_datasource='data-6'; }

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
?>

	</ul>
</div><!-- / accordion-gallery -->

<script type="text/javascript">
<!--
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
jQuery().ready(function() {
	jQuery('.accordion-gallery.id-<?php echo $NV_shortcode_id; ?>').kwicks({
	autorotation: <?php echo $NV_accordionautoplay; ?>,
	event: 'mouseover',
	autorotationSpeed:<?php echo $NV_stagetimeout; ?>,
	easing: 'easeInOutCubic',
	duration: 700,
	id: 'nv-accordion-<?php echo $NV_shortcode_id; ?>'
	});
});	
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
//-->
</script>


<?php 
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;
}


/******************************************************************/
/*	Buttons									      				  */
/******************************************************************/


function button_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'url' => '',
      'target' => '',
	  'color' => '',
	  'width' => '',
	  'align' => '',	  
), $atts ) );
 
 if(esc_attr($target)) {
 $target = 'target="'.esc_attr($target).'"';
 }
 
 if($align) $buttonalign='align'.$align; else $buttonalign='';
 
   return '<div class="button-wrap '.esc_attr($width).' '.$buttonalign.'"><div class="'.esc_attr($color).' button ' . esc_attr($width). '"><a href="' . esc_attr($url) . '" ' . $target . '>' . $content . '</a></div></div>';
}

function droppanelbutton_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
	  'color' => '',
	  'width' => '',	
	  'align' => '',	  
), $atts ) );

	if($align) $buttonalign='align'.$align; else $buttonalign='';
    return '<div class="button-wrap ' . esc_attr($width). '  '.$buttonalign.'"><div class="'.esc_attr($color).' button '.esc_attr($width).' droppaneltrigger"><a href="#">' . $content . '</a></div></div>';
}

/******************************************************************/
/*	Block Quote								      				  */
/******************************************************************/

function blockquote_shortcode( $atts, $content = null ) {

	global $NV_inskin;

   extract( shortcode_atts( array(
      'type' => '',
	  'align' => '',
	  'width' => '',
      ), $atts ) );
	  
	$blockwidth='';
	
	if(esc_attr($width)!='') { $blockwidth='style="width:'.esc_attr($width).'px"'; }
 
 	if(esc_attr($type)!="blockquote_line") {
 
	$length = strlen($content);
	$position = intval($length - 17);
	
	$insert_string = '<span class="quote right"><span>&#8221;</span></span>';	

	$newstring=substr_replace($content, $insert_string, $position, 0);
	

   return '<span class="nv-skin ' . esc_attr($type) .' '. esc_attr($align) .'" '.$blockwidth.'><span class="quote left"><span>&#8220;</span></span>' . do_shortcode($newstring) . '</span>';

   
   } else {
       return '<span class="nv-skin ' . esc_attr($type) .' '. esc_attr($align) .'" '.$blockwidth.'>' . do_shortcode($content) . '</span>';  
   }
   
}

/******************************************************************/
/*	Horizontal Breaks						      				  */
/******************************************************************/

function hozbreak_shortcode( $atts, $content = null,$code ) {

	if($code=='divider_blank') {
		return '<div class="hozbreak blank row clearfix">&nbsp;</div>';
	} else {
		return '<div class="hozbreak row clearfix">&nbsp;</div>';
	}
}

function hozbreaktop_shortcode( $atts, $content = null ) {

   return '<div class="hozbreak-top row clearfix"><a href="#top" class="clearfix">'.__('Back to Top', 'NorthVantage' ).'</a></div>';
}

function divider_shadow_shortcode( $atts, $content = null,$code ) {
	extract( shortcode_atts( array(
	  'opacity' => '',
), $atts ) );

	if($code=='divider_shadow_top') $imgtype='break-c'; else $imgtype='break-b'; // select correct shadow image

	if($opacity=='100') $opacity_dec='1'; elseif($opacity=='.') $opacity_dec='0'; elseif($opacity<'10')  $opacity_dec='.0'.$opacity; else $opacity_dec='.'.$opacity;

   return '<div class="hozbreak shadow '.$imgtype.' clearfix"><div class="divider-wrap"><img style="opacity:'.$opacity_dec.';" src="'.get_template_directory_uri().'/images/'.$imgtype.'.png" alt="horizontal break" /></div></div>';
}

/******************************************************************/
/*	Styled Boxes							      				  */
/******************************************************************/

function styledbox_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
	  'width' => '',
	  'height' => '',
	  'align' => '',
      ), $atts ) );
 
 if(esc_attr($width)) {
 	$style='max-width:'. esc_attr($width) .'px;';
 }

 if(esc_attr($height)) {
 	$style.='max-height:'. esc_attr($height) .'px;';
 } 
 
 if(isset($style)) $style='style="'.$style.'"';
 
 if(esc_attr($type)=="shadow") {
 
 	return '<div class="styledbox shadow top '. esc_attr($align) .' row" '. $style .'><div class="boxcontent shadow">'. do_shortcode($content) .'<div class="clear"></div></div></div>';
 
 } elseif(esc_attr($type)=="shadowbottom") {
 	return '<div class="styledbox shadow '. esc_attr($align) .' row" '. $style .'><div class="boxcontent shadow">'.do_shortcode($content).'<div class="clear"></div></div></div>';
 
 } else {
   if(!isset($style)) $style='';
   return '<div class="styledbox ' . esc_attr($type) .' '. esc_attr($align) .' row" '. $style .'><div class="boxcontent">'. do_shortcode($content) .'<div class="clear"></div></div></div>';

 }
}

/******************************************************************/
/*	Highlight													  */
/******************************************************************/

function highlight_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
      ), $atts ) );
  
   return '<span class="nv-skin highlight ' . esc_attr($type) .'">' . $content . '</span>';
}

/******************************************************************/
/*	Image Shortcode							      				  */
/******************************************************************/

function imageeffect_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
      'url' => '',	 
      'width' => '',	
	  'class' => '',	 
      'height' => '',
	  'videourl' => '',
	  'lightbox' => '',
	  'target' => '',
	  'link' => '',
      'alt' => '',	 
      'align' => '',
      'shadow' => '',
	  'titleoverlay' => '',	  	 	  	  	 	  	   
      ), $atts ) );



	
	if(esc_attr($videourl)) {
	$lightboxurl = esc_attr($videourl);
	} else {
	$lightboxurl = esc_attr($url);
	}
	
	$NV_imgheight = esc_attr($height);
	$NV_imgwidth = esc_attr($width);
	$NV_imgzoomcrop = "0";
	$NV_previewimgurl = esc_attr($url);

	$NV_imgheight = esc_attr($height);
	$NV_imgwidth = esc_attr($width);
	$NV_imgzoomcrop = "0";
	$NV_previewimgurl = esc_attr($url);
	
	if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
		$NV_imagepath = get_template_directory_uri()."/lib/scripts/timthumb.php?h=". $NV_imgheight ."&amp;w=". $NV_imgwidth ."&amp;zc=". $NV_imgzoomcrop ."&amp;src="; 
	} else {
		$NV_imagepath="";
	}
		

	if($NV_imgheight) {
		$NV_height_attr='height="'.$NV_imgheight.'"';	
	} else {
		$NV_height_attr='';
	}
	
	if($NV_imgwidth) {
		$NV_width_attr='style="width:'.$NV_imgwidth.'px"';	
	} else {
		$NV_width_attr='';
	}	

	
	ob_start();
	
    if(esc_attr($type)=="reflect" || esc_attr($type)=="reflectlightbox") { 
	$NV_imageeffect = 'reflection'; 
	} elseif(esc_attr($type)=="shadowreflectlightbox" || esc_attr($type)=="shadowreflection" || esc_attr($type)=="shadowreflect") {
	$NV_imageeffect = 'shadowreflection'; 
	} elseif(esc_attr($type)=="frame" || esc_attr($type)=="framelightbox" || esc_attr($type)=="frameblackwhite") {
	$NV_imgframe = 'frame'; 
	} 
	
	if(
	esc_attr($type)=="blackwhite" || 
	esc_attr($type)=="shadowblackwhite" || 
	esc_attr($type)=="frameblackwhite") {
		$NV_imgblackwhite ='blackwhite';
	} 
	
	if(
	esc_attr($type)=="shadowlightbox" || 
	esc_attr($type)=="shadowreflectlightbox" || 
	esc_attr($type)=="reflectlightbox" || 
	esc_attr($type)=="framelightbox" || 
	esc_attr($type)=="lightbox" ||
	esc_attr($lightbox)=="yes") {
		$NV_lightbox="yes";	
	}
	
	
	if(
	esc_attr($shadow) || 
	esc_attr($type)=="shadow" ||
	esc_attr($type)=="shadowblackwhite" ||
	esc_attr($type)=="shadowlightbox") { 
		$NV_imageeffect ='shadow'; 
	} 

	$NV_target = esc_attr($target);
	
	if(!empty($NV_target)) $NV_target='target="'.$NV_target.'"'; else $NV_target='';	
	
	if(esc_attr($link)!='') {
		$NV_link_start='<a href="'.esc_attr($link).'" title="'.esc_attr($alt).'" '.$NV_target.' >';
		$NV_link_end='</a>';
	} else {
		$NV_link_start='';
		$NV_link_end='';
	} ?>
	
    
	<div class="nv-skin mediawrap <?php echo esc_attr($align).' '.esc_attr($class); if($NV_imgframe) echo ' '.$NV_imgframe; ?> <?php echo $NV_imageeffect; ?> row" style="max-width:<?php echo $NV_imgwidth; ?>px">
        <div class="container <?php if($NV_imgeffect) { echo $NV_imgeffect; } ?>">
            <div class="gridimg-wrap <?php if(esc_attr($type)=='none') echo 'none'; ?>">
				<div class="title-wrap">	

				<?php if(isset($NV_lightbox) && !$NV_link_start) { ?>
                    <a href="<?php echo $lightboxurl; ?>" title="<?php echo esc_attr($alt); ?>" data-fancybox-group="image-<?php echo esc_attr($alt); ?>" class="fancybox <?php if(esc_attr($videourl)) { ?>galleryvid<?php } else { ?> galleryimg<?php } ?>" style="height:<?php echo esc_attr($height); ?>px;">
                <?php } 
				
				echo $NV_link_start; ?>
                
                <img <?php if(esc_attr($type)=="reflect" || esc_attr($type)=="reflectlightbox" || esc_attr($type)=="shadowreflectlightbox" || esc_attr($type)=="shadowreflect"  || esc_attr($type)=="shadowreflection") { ?>class="reflect"<?php } ?> src="<?php echo $NV_imagepath . dyn_getimagepath($NV_previewimgurl); ?>" alt="<?php echo esc_attr($alt); ?>"  />

                <?php if(isset($NV_lightbox) && !$NV_link_start) { ?>
                </a>
                <?php } 
				
				echo $NV_link_end;
				
				if(esc_attr($titleoverlay)=="yes") { ?>
					<div class="title">
						<h3><?php echo esc_attr($alt);  ?></h3>
					</div>	              
                <?php } ?>                           
				</div><!-- / title-wrap -->           
            </div>
        </div>
	</div>
	<?php
	
	$output_string=ob_get_contents();
	ob_end_clean();

	return $output_string;

}


/******************************************************************/
/*	Media Shortcode							      				  */
/******************************************************************/

function mediaembed_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'type' => '',
      'url' => '',
	  'imageurl' => '',	 
      'width' => '',	 
      'height' => '',
      'align' => '',
      'shadow' => '',
	  'ratio' => '',
	  'id' => '',
	  'autoplay' => '',	
	  'loop' => '',
	  'customlayer' => '',	  	 	  	  	 	  	   
      ), $atts ) );
	
	if($code=='videoembed') {
	 $NV_mediatype='video';
	} elseif($code=='audioembed') {
	  $NV_mediatype='audio';
	} 
	
	$NV_previewimgurl='';
	
	$NV_customlayer = esc_attr($customlayer);
	$NV_imgheight = esc_attr($height);
	$NV_imgwidth = esc_attr($width);
	$NV_movieurl = esc_attr($url);
	$NV_videotype = esc_attr($type);
	$NV_videoautoplay = esc_attr($autoplay);
	$NV_previewimgurl = esc_attr($imageurl);
	$NV_loop = esc_attr($loop);
	
	
	if(!$NV_loop) $NV_loop="0";
	if($NV_loop=="yes") $NV_loop="1";
	
	$slide_id = esc_attr($id);
	
	if($NV_videotype=="jwplayer") {
		$NV_videotype="jwp";
	}
	
	if($NV_videotype=="flash") {
		$NV_videotype="swf";
	}
	
	
	if(esc_attr($shadow)=="yes") {
		$NV_videoshadow = "shadow";
	} elseif(esc_attr($shadow)=="frame") {
		$NV_videoframe = "frame"; 
	} else {
		$NV_videoshadow ='';
		$NV_videoframe='';
	}
	
	if($NV_videoautoplay) {
		$NV_videoautoplay = "1";
	} else {
		$NV_videoautoplay ="0";	
	}	
	
	if($NV_mediatype=='audio') {
		$NV_videotype='jwp';
		if($NV_previewimgurl =='' && get_option('jwplayer_height')=='') $NV_imgheight='24';
		
	}
	
	ob_start(); 

	$styling=''; // add inline CSS
	if(esc_attr($height)) 	{ $styling='height:'.esc_attr($height).'px;';}
	if($styling) { $styling='style="'.$styling.'"'; } else { $styling=''; }	

	if($NV_imgwidth) {
		$NV_width_attr='max-width:'.$NV_imgwidth.'px';
	} else {
		$NV_width_attr='';
	}
	
	?>

	<div class="nv-skin mediawrap <?php echo esc_attr($align).' '.$NV_mediatype.' '.$NV_videoframe; ?> row"  style="max-width:<?php echo $NV_imgwidth; ?>px">
    
		<div class="container videotype <?php echo $NV_videoshadow ?>">   
			<div class="gridimg-wrap" style="<?php echo $NV_width_attr; ?>">
         		<?php include(NV_FILES .'/inc/classes/video-class.php'); ?>
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->	
    </div><!-- / mediawrap -->
<?php 

	$output_string=ob_get_contents();
	ob_end_clean();

	return $output_string;

}

/******************************************************************/
/*	Media Shortcode	*END*					      				  */
/******************************************************************/

/******************************************************************/
/*	Columns									      				  */
/******************************************************************/

function columns_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'border' => '',
	  'height' => '',
	  'class' => '',
), $atts ) );
	if($code=="two_columns") {
	$classes = $class." two_column";	
	} elseif($code=="two_columns_last") {
	$classes = $class." two_column last clearfix";	
	} elseif($code=="three_columns") {
	$classes = $class." three_column";	
	} elseif($code=="three_columns_last") {
	$classes = $class." three_column last clearfix";	
	} elseif($code=="four_columns") {
	$classes = $class." four_column";	
	} elseif($code=="four_columns_last") {
	$classes = $class." four_column last clearfix";	
	} elseif($code=="five_columns") {
	$classes = $class." five_column";	
	} elseif($code=="five_columns_last") {
	$classes = $class." five_column last clearfix";	
	} elseif($code=="six_columns") {
	$classes = $class." six_column";	
	} elseif($code=="six_columns_last") {
	$classes = $class." six_column last clearfix";	
	} elseif($code=="onethird_columns") {
	$classes = $class." three_column";	
	} elseif($code=="twothirds_columns") {
	$classes = $class." two_thirds_column";	
	} elseif($code=="onethird_columns_last") {
	$classes = $class." three_column last clearfix";	
	} elseif($code=="twothirds_columns_last") {
	$classes = $class." two_thirds_column last clearfix";	
	} elseif($code=="onefourth_columns") {
	$classes = $class." four_column";	
	} elseif($code=="threefourths_columns") {
	$classes = $class." three_fourths_column";	
	} elseif($code=="onefourth_columns_last") {
	$classes = $class." four_column last clearfix";	
	} elseif($code=="threefourths_columns_last") {
	$classes = $class." three_fourths_column last clearfix";	
	}
	
	if(esc_attr($height)!='') {
	$height = 'style="height:'. esc_attr($height) .'px"';
	}
	
	$clear = strpos($code,"_last");

	if($clear === false) {
		return '<div class="columns block '. $classes .' '. esc_attr($border) .'">
		<div class="columns-inner" '. $height.'>
		'. do_shortcode($content) .'</div></div>';
	} else {
		return '<div class="columns block '. $classes .' '. esc_attr($border) .'">
		<div class="columns-inner" '. $height.'>
		'. do_shortcode($content) .'</div></div>';
	}

   
}

/******************************************************************/
/*	Tabs									      				  */
/******************************************************************/

function tabs_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'id' => '',
	  'class' => '',
), $atts ) );
	
	if($code=="tabswrap") {
		return '<div class="nv-tabs clearfix row '.esc_attr($class).'">'. do_shortcode($content) .'</div>';
	} elseif($code=="tabhead") { // tab title check if first
	if( esc_attr($id)=="1") {
		return '<ul><li class="'.esc_attr($class).'"><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li>';
	} else {
		return '<li class="'.esc_attr($class).'"><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li>';
	}
	} elseif($code=="tabhead_last") {
		return '<li class="'.esc_attr($class).'"><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li></ul>';
	} elseif($code=="tab") {	
		return '<div class="tab-content '.esc_attr($class).'" id="tabs-'. esc_attr($id).'">'. do_shortcode($content) .'</div>';
	}
}


function accordion_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'title' => '',
	  'color' => '',
	  'class' => '',
	  'collapse' => '',
), $atts ) );

	ob_start();
	
	if($code=="accordion") { ?>
		<div class="accordion row <?php if(esc_attr($collapse=='yes')) {  ?>collapse<?php } else { ?>open<?php } ?>"><?php echo do_shortcode($content); ?></div>

		<script type="text/javascript">
		
		<?php if(get_option('priority_loading')=='enable') { ?>
		head.ready(function() {
		<?php } ?>
        jQuery(document).ready(function($){
        var getacc_id='';
		var getacc_id = parseInt(window.location.hash.slice(1)); // retrieve # number
    
        if(!getacc_id) {
            getacc_id = 0;
        }
        // Accordion
		<?php if(!$collapse) { ?>
        $(".accordion").accordion({ header: "h4.accordionhead",autoHeight: false,collapsible: true,navigation:true,active:getacc_id});
		<?php } else { ?>
        $(".accordion.collapse").accordion({ header: "h4.accordionhead",autoHeight: false,collapsible: true,navigation:true,active:false });			
		<?php } ?>
      
        });
		<?php if(get_option('priority_loading')=='enable') { ?>
		});
		<?php } ?>
        </script>
        
	<?php } elseif($code=="panel") { ?>
		<div class="section <?php echo esc_attr($color) .' '. esc_attr($class); ?>"><h4 class="accordionhead"><a href="#"><?php echo esc_attr($title); ?></a></h4><div class="sectioncontent"><?php echo do_shortcode($content); ?></div></div>
	<?php }
 
 $output_string=ob_get_contents();
 ob_end_clean();
 return $output_string;

}

function list_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'style' => '',
	  'color' => '',
), $atts ) );

	return '<div class="list '. esc_attr($style) .' '. esc_attr($color) .'">'. remove_wpautop( $content ) .'</div>';

}

function reveal_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'width' => '',
	  'align' => '',
	  'title' => '',
	  'color' => '',
      ), $atts ) );
 
 if(esc_attr($width)) {
 	$width='style="width:'. esc_attr($width) .'px"';
 }
 
   return '<div class="revealbox '. esc_attr($align) .' '. esc_attr($color) .' row clearfix" '. $width .'><h4 class="reveal"><span class="ui-icon"></span>'. esc_attr($title) .'</h4><div class="reveal-content">' . do_shortcode($content) . '</div></div>';

}

function dropcaps_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'style' => '',
	  'text' => '',
	  'color' => '',
      ), $atts ) );
 
   return '<span class="dropcap '. esc_attr($style) .' '. esc_attr($color) .'">' . esc_attr($text)  . '</span>';

}


function socialicons_shortcode( $atts, $content = null,$code ) {
   extract( shortcode_atts( array(
	  'share_icon' => '',
	  'name' => '',
	  'url' => '',
	  'align' => '',
      ), $atts ) );
 
if($code=='socialwrap') {
	if(esc_attr($align)) {
		$align=	esc_attr($align);
	} else {
		$align='';	
	}
	
	if(esc_attr($share_icon)=='yes') {
		return '
	<div id="togglesocial" class="'.$align.'">
		<ul>                     
			<li class="socialinit nvcolor-wrap"><div class="socialinithide"></div><span class="nvcolor"></span></li>
			<li  style="display: none;" class="socialhide nvcolor-wrap"><div class="socialinithide"></div><span class="nvcolor"></span></li>
		</ul>
	</div><!-- /togglesocial -->                            
	<div class="socialicons '.$align.' toggle"><ul>'.do_shortcode($content).'</ul></div><div class="clear"></div>';
	} else {
	return '<div class="socialicons display '.$align.'"><ul>'.do_shortcode($content).'</ul></div><div class="clear"></div>';
	}
}

	
if($code=="socialicon") {
	require NV_FILES .'/adm/inc/social-media-urls.php'; // get social media button links
	
	if(esc_attr($name)=='digg') {
		if(esc_attr($url)!='') {
		$sociallink_digg=esc_attr($url);
		} else {
		$sociallink_digg=getsociallink($sociallink_digg);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_digg .'" title="Digg" target="_blank"><span class="nvcolor"></span><div class="social-icon social-digg"></div></a></li>';
	}

	if(esc_attr($name)=='fb') {
		if(esc_attr($url)!='') {
		$sociallink_fb=esc_attr($url);
		} else {
		$sociallink_fb=getsociallink($sociallink_fb);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_fb .'" title="Facebook" target="_blank"><span class="nvcolor"></span><div class="social-icon social-facebook"></div></a></li>';
	}

	if(esc_attr($name)=='linkedin') {
		if(esc_attr($url)!='') {
		$sociallink_linkedin=esc_attr($url);
		} else {
		$sociallink_linkedin=getsociallink($sociallink_linkedin);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_linkedin .'" title="Linkedin" target="_blank"><span class="nvcolor"></span><div class="social-icon social-linkedin"></div></a></li>';
	}
	
	if(esc_attr($name)=='deli') {
		if(esc_attr($url)!='') {
		$sociallink_deli=esc_attr($url);
		} else {
		$sociallink_deli=getsociallink($sociallink_deli);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_deli .'" title="Del.icio.us" target="_blank"><span class="nvcolor"></span><div class="social-icon social-delicious"></div></a></li>';
	}		

	if(esc_attr($name)=='reddit') {
		if(esc_attr($url)!='') {
		$sociallink_reddit=esc_attr($url);
		} else {
		$sociallink_reddit=getsociallink($sociallink_reddit);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_reddit .'" title="Reddit" target="_blank"><span class="nvcolor"></span><div class="social-icon social-reddit"></div></a></li>';
	}
	
	if(esc_attr($name)=='stumble') {
		if(esc_attr($url)!='') {
		$sociallink_stumble=esc_attr($url);
		} else {
		$sociallink_stumble=getsociallink($sociallink_stumble);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_stumble .'" title="Stumble Upon" target="_blank"><span class="nvcolor"></span><div class="social-icon social-icon social-stumble"></div></a></li>';
	}
	

	if(esc_attr($name)=='twitter') {
		if(esc_attr($url)!='') {
		$sociallink_twitter=esc_attr($url);
		} else {
		$sociallink_twitter=getsociallink($sociallink_twitter);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_twitter .'" title="Twitter" target="_blank"><span class="nvcolor"></span><div class="social-icon social-twitter"></div></a></li>';
	}				

	if(esc_attr($name)=='google') {
		if(esc_attr($url)!='') {
		$sociallink_google=esc_attr($url);
		} else {
		$sociallink_google=getsociallink($sociallink_google);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_google .'" title="Google Plus" target="_blank"><span class="nvcolor"></span><div class="social-icon social-google"></div></a></li>';
	}					

	if(esc_attr($name)=='rss') {
		if(esc_attr($url)!='') {
		$sociallink_rss=esc_attr($url);
		} else {
		$sociallink_rss=getsociallink($sociallink_rss);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_rss .'" title="RSS" target="_blank"><span class="nvcolor"></span><div class="social-icon social-rss"></div></a></li>';
	}

	if(esc_attr($name)=='youtube') {
		if(esc_attr($url)!='') {
		$sociallink_youtube=esc_attr($url);
		} else {
		$sociallink_youtube=getsociallink($sociallink_youtube);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_youtube .'" title="YouTube" target="_blank"><span class="nvcolor"></span><div class="social-icon social-youtube"></div></a></li>';
	}

	if(esc_attr($name)=='vimeo') {
		if(esc_attr($url)!='') {
		$sociallink_vimeo=esc_attr($url);
		} else {
		$sociallink_vimeo=getsociallink($sociallink_vimeo);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_vimeo .'" title="Vimeo" target="_blank"><span class="nvcolor"></span><div class="social-icon social-vimeo"></div></a></li>';
	}

	if(esc_attr($name)=='pinterest') {
		if(esc_attr($url)!='') {
		$sociallink_pinterest=esc_attr($url);
		} else {
		$sociallink_pinterest=getsociallink($sociallink_pinterest);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_pinterest .'" title="pinterest" target="_blank"><span class="nvcolor"></span><div class="social-icon social-pinterest"></div></a></li>';
	}

	if(esc_attr($name)=='email') {
		if(esc_attr($url)!='') {
		$sociallink_email=esc_attr($url);
		} else {
		$sociallink_email=getsociallink($sociallink_email);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_email .'" title="email" target="_blank"><span class="nvcolor"></span><div class="social-icon social-email"></div></a></li>';
	}	

}

}


function enquiry_form_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'emailto' => '',
	  'thankyou' => '',
	  'id' => '',
      ), $atts ) );
 
   ob_start(); 
   
   contact_form(esc_attr($id),'','',esc_attr($emailto),esc_attr($thankyou));
   $output_string=ob_get_contents();
   ob_end_clean();
   
   return $output_string;
   
}


function pricing_table_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
	  'title' => '',
	  'featured' => '',
	  'button_text' => '',
	  'button_link' => '',
	  'price' => '',
	  'target' => '',
	  'per' => '',
	  'color' => '',
	  'columns'=>'',
), $atts ) );

	if($code=='pricing_table') {
		if(!esc_attr($columns) || esc_attr($columns)>6) $pcolumns='6'; else $pcolumns=esc_attr($columns);
		$pricing_columns=numberToWords($pcolumns); // convert number to word
		return '<div class="nv-pricing-table row '.$pricing_columns.'-column">'.remove_wpautop($content).'</div>';
		
	} elseif($code=='plan') {
		
		if(esc_attr($target!='')) $target='target="'.esc_attr($target).'"';
		
		if(esc_attr($featured=='true')) $featured='featured';
		if(!esc_attr($color)) $color='grey-lite'; else $color=esc_attr($color);
		
		if(esc_attr($button_link)=='droppaneltrigger') {
			$button_type='[droppanelbutton align="center" color="'.$color.'" ]'.esc_attr($button_text).'[/droppanelbutton]';
		} else {
			$button_type='[button url="'.esc_attr($button_link).'"  align="center" color="'.$color.'" '.$target.' ]'.esc_attr($button_text).'[/button]';
		}
		
		return '
		<div class="nv-pricing-plan column '.$featured.'">
		<div class="nv-pricing-title '.$color.'"><h4>'.esc_attr($title).'</h4></div>
		<div class="nv-pricing-container '.$color.'">
		<div class="nv-pricing-cost"><span class="price-value">'.esc_attr($price).'</span> <span class="price-per">'.esc_attr($per).'</span></div>
		<div class="nv-pricing-content">
		'.remove_wpautop($content).'
		</div>
		<div class="nv-pricing-signup">'. do_shortcode($button_type) .'</div></div>
		</div>';
	}
}


function tooltip_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
	  'tip' => '',
	  'color' => '',
	  'position' => '',
	  'icon' => '',
), $atts ) );
		
	if($icon!='') $icon='<span class="tooltip-icon">&nbsp;</span>'; else $icon='';
	
	ob_start(); ?>
	<div class="tooltip-info <?php echo $position; ?> <?php if($icon) echo 'icon'; ?> <?php if($content==' ') echo 'info'; ?>"><?php echo do_shortcode($content).$icon; ?></div><div class="tooltip <?php echo esc_attr($color);  ?>"><?php echo do_shortcode($tip); ?></div>

	<script type="text/javascript">
	<?php if(get_option('priority_loading')=='enable') { ?>
	head.ready(function() {
	<?php } ?>
	<?php if($position) $position_class = '.'.str_replace(" ", ".", $position); ?>
	(function ($) {
		$(document).ready(function() {
				$('.tooltip-info<?php echo $position_class; ?>').tooltip({
				position: "<?php echo esc_attr($position);  ?>", opacity: 0.8,
				relative:true,
				effect:'fade'
				});
		});
	})(jQuery);		
	<?php if(get_option('priority_loading')=='enable') { ?>
	});
	<?php } ?>
    </script>

<?php 
 
 $output_string=ob_get_contents();
 ob_end_clean();
 return $output_string;

}


function content_animator_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
	  'delay' => '',
	  'effect' => '',
	  'direction' => '',	  
	  'align' => '',
	  'class' => '',
	  'easing' => '',
	  'margin_top' => '',
	  'margin_left' => '',
	  'margin_right' => '',
	  'float' => '',
	  'id' => '',
	  'speed' => '',
), $atts ) );

	ob_start(); 
	$styling='';
	if($margin_top)  $styling='margin-top:'.$margin_top.'px;'; 
	if($margin_left) $styling.='margin-left:'.$margin_left.'px;'; 
	if($margin_right) $styling.='margin-right:'.$margin_right.'px;'; 
	
	$styling='style="'.$styling.'"';
	
	if($float=='yes') $floatclass='float'; else $floatclass='';
	
	?>
    
	<div id="anim_<?php echo esc_attr($id);?>" class="animator-wrap <?php echo 'anim-'.esc_attr($id) .' '. $floatclass .' '.esc_attr($align). ' '.esc_attr($class);  ?>" <?php echo $styling; ?>><?php echo remove_wpautop($content); ?></div>
	
	<?php 
	
	if(esc_attr($effect)!='fade') :
	
	$anim_options=" { direction: '".esc_attr($direction)."', easing: '".esc_attr($easing)."' }, ".esc_attr($speed); 
	
	else : $anim_options=" { easing: '".esc_attr($easing)."' } ,".esc_attr($speed);
	
	endif;
	
	?>
	
	<script type="text/javascript">
	
	function content_animator_anim_<?php echo esc_attr($id);?>() {	
	
	(function ($) {
				
			var caid = $('.animator-wrap.anim-<?php echo esc_attr($id);?>');
			
			if(!caid.hasClass('played')) {
				
				caid.css('display','none');

				caid.addClass('played');
				
				if(!caid.hasClass('loaded')) { // add class so galleries can replay animation
					caid.addClass('loaded');
				}				
				
				clearTimeout( $.data( caid , 'timer') );
				 
				 $.data( caid , 'timer', setTimeout(function() {
				 
					caid.stop(true,true).show('<?php echo esc_attr($effect); ?>', <?php echo $anim_options;?>,function(){
							
							if(caid.find('img').hasClass('reflect')) { // add reflection to image if required		
									caid.find('img.reflect').each(function() {
											$(this).reflect({height:0.12,opacity:0.2});	
									});
							}			
						});
				
				 
				 }, <?php echo esc_attr($delay); ?>));
				 
				}
				
				
	})(jQuery);				
	}
	
	
	jQuery(window).load(function() {
		content_animator_anim_<?php echo esc_attr($id);?>();
	});

    </script>    

<?php 
 
 $output_string=ob_get_contents();
 ob_end_clean();
 return $output_string;

}

/* ------------------------------------

:: RECENT POSTS

------------------------------------ */

function nv_recent_posts_shortcode($atts){
	extract(shortcode_atts(array(
		'limit' => '',
		'categories' => '',
		'metadata' => '',
		'show_date' => '',
		'order' => 'date',
		'orderby' => '',
		'offset' =>'',
		'image_width' =>'',
		'image_height' =>'',
		'image_align' =>'',
		'image_effect' =>'',
		'content' =>'textimage',
		'excerpt' =>'',
		), $atts));

	ob_start();  	
	
	$q = new WP_Query('offset='.$offset.'&orderby='.$order.'&order='.$orderby.'&category_name='.$categories.'&posts_per_page=' . $limit);
 
	if(esc_attr($excerpt)) {
		$recent_excerpt = esc_attr($excerpt);
	} else {
		$recent_excerpt = "15";
	} ?>
    
    <ul class="nv-recent-posts">
    
    <?php
 
	while($q->have_posts()) : $q->the_post();
	$pdata = maybe_unserialize(get_post_meta( get_the_ID(), 'pgopts', true ));
	
	$NV_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL

	if(empty($NV_previewimgurl)) { // check what image to use, custom, featured, image within post. 
		$post_image_id = get_post_thumbnail_id(get_the_ID());
			if ($post_image_id) {
				$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
				$NV_previewimgurl=$thumbnail[0];
				$NV_previewimgurl	=	parse_url($NV_previewimgurl, PHP_URL_PATH); // make relative Image URL
			} else {
			$NV_previewimgurl=catch_image(); // Check for images within post 
		}
	}	
	
	$image=$NV_previewimgurl;
	
	if($image && ($content=='textimage' || $content=='titleimage' || $content=='image')) {
	
	$image='<a href="'. get_permalink() .'" title="'.get_the_title().'">[imageeffect type="'.$image_effect.'" align="'.$image_align.'" width="'.$image_width.'" height="'.$image_height.'"  alt="'. get_the_title().'" url="'.$image.'"  ]</a>';
	} else {
	$image='';	
	} ?>
    
        <li>
		<?php echo do_shortcode($image); ?>
  		<?php if($content!='image') { ?>
        <div>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <?php if( $show_date=='yes' ) { ?>
        <small><?php echo get_the_date(); ?></small>
        <?php } ?>
		<?php if($content!='titleimage') { ?>
		<?php the_advanced_excerpt('length='.$recent_excerpt); ?>
        <p><a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'Read more &rarr;', 'NorthVantage' ); ?></a></p>
        <?php } ?>
        </div>
        <?php } ?>
		<?php if($metadata=='yes') { ?>
        <div class="recent-metadata">
        <?php echo __('by', 'NorthVantage' ); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('first_name') ." ". get_the_author_meta('last_name'); ?></a> <span class="subbreak">/</span> 
		<?php echo __('in', 'NorthVantage' ).' '; the_category(', ') ?> <span class="subbreak">/</span> 
        <?php comments_popup_link( __('No Comments', 'NorthVantage' ) .' ', '1 '. __('Comment', 'NorthVantage' ) . ' ', '% '. __('Comments', 'NorthVantage' )); ?>
        <div class="hozbreak clearfix">&nbsp;</div>
        </div>
        <?php } ?>                
        <div class="clear"></div>
        </li>
    <?php endwhile;	wp_reset_query();  ?>
	</ul>
	
	
<?php 
   $output_string=ob_get_contents();
   ob_end_clean();
   
   return $output_string;	
}

function clear_shortcode( $atts, $content = null ) {
   
   return '<div class="clear"></div>';

}



add_filter('widget_text', 'do_shortcode');

add_shortcode('postgallery_grid', 'postgallery_grid_shortcode');
add_shortcode('postgallery_slider', 'postgallery_slider_shortcode');
add_shortcode('postgallery_image', 'postgallery_image_shortcode');
add_shortcode('postgallery_islider', 'postgallery_image_shortcode');
add_shortcode('postgallery_nivo', 'postgallery_image_shortcode');
add_shortcode('postgallery_accordion', 'postgallery_accordion_shortcode');
add_shortcode('button', 'button_shortcode');
add_shortcode('droppanelbutton', 'droppanelbutton_shortcode');
add_shortcode('blockquote', 'blockquote_shortcode');
add_shortcode('hozbreak', 'hozbreak_shortcode');
add_shortcode('divider_line', 'hozbreak_shortcode');
add_shortcode('divider_blank', 'hozbreak_shortcode');
add_shortcode('divider_shadow', 'divider_shadow_shortcode');
add_shortcode('divider_shadow_top', 'divider_shadow_shortcode');
add_shortcode('hozbreaktop', 'hozbreaktop_shortcode');
add_shortcode('divider_linetop', 'hozbreaktop_shortcode');
add_shortcode('styledbox', 'styledbox_shortcode');
add_shortcode('highlight', 'highlight_shortcode');
add_shortcode('imageeffect', 'imageeffect_shortcode');
add_shortcode('videoembed', 'mediaembed_shortcode');
add_shortcode('audioembed', 'mediaembed_shortcode');
add_shortcode('tabswrap', 'tabs_shortcode');
add_shortcode('tabhead', 'tabs_shortcode');
add_shortcode('tabhead_last', 'tabs_shortcode');
add_shortcode('tab', 'tabs_shortcode');
add_shortcode('accordion', 'accordion_shortcode');
add_shortcode('list', 'list_shortcode');
add_shortcode('reveal', 'reveal_shortcode');
add_shortcode('dropcap', 'dropcaps_shortcode');
add_shortcode('panel', 'accordion_shortcode');
add_shortcode('two_columns', 'columns_shortcode');
add_shortcode('two_columns_last', 'columns_shortcode');
add_shortcode('three_columns', 'columns_shortcode');
add_shortcode('three_columns_last', 'columns_shortcode');
add_shortcode('onethird_columns', 'columns_shortcode');
add_shortcode('twothirds_columns', 'columns_shortcode');
add_shortcode('onethird_columns_last', 'columns_shortcode');
add_shortcode('twothirds_columns_last', 'columns_shortcode');
add_shortcode('four_columns', 'columns_shortcode');
add_shortcode('four_columns_last', 'columns_shortcode');
add_shortcode('five_columns', 'columns_shortcode');
add_shortcode('five_columns_last', 'columns_shortcode');
add_shortcode('six_columns', 'columns_shortcode');
add_shortcode('six_columns_last', 'columns_shortcode');
add_shortcode('onefourth_columns', 'columns_shortcode');
add_shortcode('threefourths_columns', 'columns_shortcode');
add_shortcode('onefourth_columns_last', 'columns_shortcode');
add_shortcode('threefourths_columns_last', 'columns_shortcode');
add_shortcode('socialwrap', 'socialicons_shortcode');
add_shortcode('socialicon', 'socialicons_shortcode');
add_shortcode('enquiry_form', 'enquiry_form_shortcode');
add_shortcode('pricing_table', 'pricing_table_shortcode');
add_shortcode('plan', 'pricing_table_shortcode');
add_shortcode('tooltip', 'tooltip_shortcode');
add_shortcode('content_animator', 'content_animator_shortcode');
add_shortcode('recent_posts', 'nv_recent_posts_shortcode');
add_shortcode('clear', 'clear_shortcode');

?>
