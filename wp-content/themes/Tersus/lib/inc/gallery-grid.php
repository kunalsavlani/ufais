<?php 

if(!$NV_gridcolumns) { // Set default columns number
	$NV_gridcolumns="3";
}

$NV_gridcolumns_text=numberToWords($NV_gridcolumns); // convert number to word

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


$postcount = 0;

$baseURL = get_permalink(); ?>

<div class="clear"></div>
<?php 


if($NV_datasource=="data-2" && empty($NV_slidesetid)) {
	pagination($featured_query,$baseURL);
} ?>

<script type="text/javascript">
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
// Custom sorting plugin
(function($) {
  jQuery.fn.sorted = function(customOptions) {
    var options = {
      reversed: false
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
		  
		$("#nv-sortable .panel:nth-child(<?php echo $NV_gridcolumns; ?>n)").css({marginRight:0});
		$("#nv-sortable .panel").removeClass('last',500);	
		
		  
		<?php if($NV_imageeffect=='shadow' || $NV_imageeffect=='shadowreflection') { ?>
			$('#nv-sortable .gridimg-wrap').find('.shadow-wrap img').fadeTo(1000, 0.9, function() {
      			// Animation complete.
    		});
		<?php } ?>
		
		$('.grid-gallery .galleryimg,.grid-gallery .galleryvid').hover(
				
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

		$('#nv-sortable .gridimg-wrap').hover(function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "show" }, 400, "easeInOutCubic");
				}, function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "hide" }, 400, "easeInBack");
		});

		$('#nv-sortable .container .galleryimg').append('<div class="hoverimg"><img src="<?php echo get_template_directory_uri(); ?>/images/image-hover.png" alt="&nbsp;" /></div>');	
		$('#nv-sortable .container .galleryvid').append('<div class="hovervid"><img src="<?php echo get_template_directory_uri(); ?>/images/video-hover.png" alt="&nbsp;" /></div>');	

		
		$("#nv-sortable img.reflect").each(function() {
			$(this).reflect({height:0.12,opacity:0.2});
		});
		
		$(".fancybox").fancybox({
			openSpeed : 800,
			opacity : 0.85,
		 helpers : {
			media : {}
		 }
		});
	
		if ($.browser.msie && $.browser.version=="7.0" && typeof Cufon !== "undefined"){
			Cufon.replace('#nv-sortable h2');
		}  else if(typeof Cufon !== "undefined") {
			Cufon.refresh();
		}	
			
	}
  };
  
  var $list = $('div#nv-sortable');
  var $data = $list.clone();
  
  var $controls = $('ul.splitter ul');
  
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
		var cnt = $(".splitter ul li").length+1; // Cycle through list and remove class
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