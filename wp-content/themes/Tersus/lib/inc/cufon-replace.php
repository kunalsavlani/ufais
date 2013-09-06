<?php

if($NV_skin) { $skin=$NV_skin; } elseif(DEFAULT_SKIN) {	$skin=DEFAULT_SKIN; } else { $skin='skinone'; } // get skin
$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));

// check elements settings
if(isset($get_skin_data['skin_id_main_inherit'])) $main_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_main_inherit'])); else $main_settings='';  
if(isset($get_skin_data['skin_id_header_inherit'])) $header_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_header_inherit'])); else $header_settings='';
if(isset($get_skin_data['skin_id_menu_inherit'])) $menu_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_menu_inherit'])); else $menu_settings='';
if(isset($get_skin_data['skin_id_footer_inherit'])) $footer_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_inherit'])); else $footer_settings='';

echo setcufon('background',$skin,'','');

if($main_settings=='custom') {
 	$inherited_elements=inherit_chk('main','header,menu,footer',$skin);
	echo setcufon('main',$skin,$inherited_elements,'');
}

if($header_settings=='custom') {
 	$inherited_elements=inherit_chk('header','main,menu,footer',$skin);
	echo setcufon('header',$skin,$inherited_elements,'');
}

if($menu_settings=='custom') {
 	$inherited_elements=inherit_chk('menu','header,main,footer',$skin);
	echo setcufon('menu',$skin,$inherited_elements,'');
}

if($footer_settings=='custom') {
 	$inherited_elements=inherit_chk('footer','header,main,menu',$skin);
	echo setcufon('footer',$skin,$inherited_elements,'');
}

$count = $get_skin_data['skin_id_custom_count']; 

for($z = 0; $z < $count; $z++) {
	echo setcufon('custom',$skin,'','_'.$z);
}


function init_cufon($classes,$font) {
	if(get_option("nv_font_type")!="disable") {
	global $cufon_list;
	if($cufon_list) {
		foreach($cufon_list as $cufon_name => $value) {
			if($cufon_name==$font) {
				$new_classes.=$value.','.$classes;
			} else {
				$new_classes.=','.$classes;	
			}
		}
		
		$cufon_list[$font] = $new_classes;	
	} else {
		$cufon_list=array();
		$cufon_list[$font]=$classes;	
	}
	
	
	} 
}


if(get_option("nv_font_type")!="disable" && get_option("nv_font_type")!="enable_google" && get_option("nv_font_type")!="") {
	global $cufon_list;
	if($cufon_list) { 
		if(is_array($cufon_list)) {
			foreach($cufon_list as $cufon_font => $class) {
			if($cufon_font==get_option('cufon_font')) {
				$cufon_js.='<script type="text/javascript" src="'.$cufon_font.'" defer ></script>';
			} else {
				$cufon_js.='<script type="text/javascript" src="'.get_template_directory_uri().'/js/'.$cufon_font.'.cufonfonts.js" defer ></script>';
			}

			$cufon_replace.="Cufon.replace('h1,h2,h3,h4,h5, span.dropcap ', { hover: true });";
			
			}
		}
		
$cufon_js=rTrim($cufon_js,',');
?>

<?php echo $cufon_js; ?>
<!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->
<script type="text/javascript">
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
(function ($) {

if($.browser.msie && $.browser.version == 9) {
$(document).ready(function() {	
	<?php echo $cufon_replace; ?>
});	
} else if($.browser.msie && $.browser.version == 7) {
$(window).load(function() {	
	<?php echo $cufon_replace; ?>
});
} else {
	<?php echo $cufon_replace; ?>
}
})(jQuery);
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
</script>

<?php 
}
} elseif(get_option("nv_font_type")=='enable_google') {
	
global $googlefont;
global $cufon_list;

$google_fonts='';

if($cufon_list) { 
	if(is_array($cufon_list)) {
		foreach($cufon_list as $googlefonts => $class) {
			foreach($googlefont as $google_font => $value) {
				if($googlefonts==$google_font) { // check if general font is a google font
					$value = str_replace(" ", "+", $value); // replace spaces with +
					$value = str_replace('"', "", $value); // replace " with blank
					$google_fonts.=$value.'|'; // add to google fonts list
				}
			}

		}
	}
}

	
	



	foreach($googlefont as $google_font => $value) {
		if(stripslashes($get_skin_data['skin_id_background_font'])==$google_font || stripslashes($get_skin_data['skin_id_header_font'])==$google_font) { // check if general font is a google font
			$value = str_replace(" ", "+", $value); // replace spaces with +
			$value = str_replace('"', "", $value); // replace " with blank
			$google_fonts.=$value.'|'; // add to google fonts list
		}
	}
	
	

$google_fonts=rtrim($google_fonts, '|'); // remove remaining pipe
echo '<link href="http://fonts.googleapis.com/css?family='. $google_fonts .'" rel="stylesheet" type="text/css">';

}?>