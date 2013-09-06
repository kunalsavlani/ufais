<div class="videowrap <?php if(!empty($ratio)) echo $ratio; ?>">
<?php           
 
$vidurl = $NV_movieurl;
$file = basename($vidurl); 
$parts = explode(".", $file); 

$vidid = $parts[0]; //File name 
  if($NV_videotype=="youtube") {

        $vidid = strstr($vidid,'='); // trim id after = 
		$params = strstr($vidid,'&'); // trim id after = 
		

		$splitter = '?'; // set url parameter	
		$isplaylist = strpos($vidurl ,"playlist?list="); // check if playlist
		$isredirect = strpos($vidurl ,"youtu.be"); // check if share url
			
		if($isredirect!=false) { // if share url retrieve video id
			$vidid=$parts[0];
			$splitter = '&amp;'; // set url parameter	
		}				
							
		if($isplaylist!=false) {
			$vidid = 'videoseries?list='.$vidid;
			$splitter = '&amp;';		
		}	

		
		if($isredirect==false) {
        	$vidid = substr($vidid, 1); // remove = if not youtu.be address		
		}
		
		$vidid = str_replace($params,"",$vidid);
		$params = str_replace('?','',$params);
	
	
} elseif($NV_videotype=="swf" || $NV_videotype=="jwp") {
	$vidid = $vidurl;
}

if($NV_videotype=="youtube") { 

/* ------------------------------------

:: YOUTUBE

------------------------------------ */

?>

<iframe frameborder="0" marginheight="0" marginwidth="0" width="<?php echo $NV_imgwidth; ?>" height="<?php echo $NV_imgheight; ?>" src="http://www.youtube.com/embed/<?php echo $vidid.$splitter; ?>autoplay=<?php echo $NV_videoautoplay ?>&amp;loop=<?php echo $NV_loop; ?><?php echo $params; ?>&amp;wmode=opaque&amp;title=" allowfullscreen></iframe>

<?php } elseif($NV_videotype=="vimeo") { 

/* ------------------------------------

:: VIMEO

------------------------------------ */

?>

<iframe frameborder="0" marginheight="0" marginwidth="0"  src="http://player.vimeo.com/video/<?php echo $vidid; ?>?autoplay=<?php echo $NV_videoautoplay ?>&amp;loop=<?php echo $NV_loop; ?>&amp;title=0&amp;byline=0&amp;portrait=0" width="<?php echo $NV_imgwidth; ?>" height="<?php echo $NV_imgheight; ?>"></iframe>

<?php } elseif($NV_videotype=="swf") {
	
/* ------------------------------------

:: FLASH (SWF)

------------------------------------ */

if(!$NV_imgheight) $NV_imgheight='100%';
if(!$NV_imgwidth) $NV_imgwidth='100%';	
	
?>
          
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $NV_imgwidth; ?>" height="<?php echo $NV_imgheight; ?>">
<param name="movie" value="<?php echo $vidid; ?><?php if($NV_videotype!="swf") { ?>&amp;autoplay=<?php echo $NV_videoautoplay ?><?php } ?>" />
<param name="wmode" value="transparent" />
<param name="allowFullScreen" value="true" />
<param name="allowScriptAccess" value="always" />
<param name="scale" value="exactfit">
<!--[if !IE]>-->
<object type="application/x-shockwave-flash" data="<?php echo $vidid; ?><?php if($NV_videotype!="swf") { ?>&amp;autoplay=<?php echo $NV_videoautoplay ?><?php } ?>" width="<?php echo $NV_imgwidth; ?>" height="<?php echo $NV_imgheight; ?>">
<param name="wmode" value="transparent" />
<param name="allowFullScreen" value="true" />
<param name="allowScriptAccess" value="always" />		
<param name="scale" value="exactfit">		
<!--<![endif]-->
<!--[if !IE]>-->
</object>
<!--<![endif]-->
</object>

<?php } elseif($NV_videotype=="jwp") {
	
/* ------------------------------------

:: JW PLAYER

------------------------------------ */

	
if(!$NV_imgwidth)  $NV_vidwidth = $NV_imgheight * "1.595"; else $NV_vidwidth = $NV_imgwidth; // 16:9 Ratio for Video


if(!$NV_imgheight && $NV_imgwidth) { $jwplayer_height = $jwplayer_height="'height':'".ceil($NV_imgwidth / "1.595")."',"; $NV_imgheight=ceil($NV_imgwidth / "1.595"); } elseif($NV_imgheight) { $jwplayer_height="'height':'".$NV_imgheight."',"; } 

if($NV_mediatype=='audio' && get_option('jwplayer_height')!='') {
	$jwplayer_height="'height':'".get_option('jwplayer_height')."',";
} ?>

<div class="jwplayer-wrapper"><div id="<?php echo $slide_id; ?>" class="jwplayer-container"></div></div>
	<script type="text/javascript">
	
	<?php if(get_option('priority_loading')=='enable') { ?>
	head.ready(function() {
	<?php } ?>
		jwplayer('<?php echo $slide_id; ?>').setup({
		'id': 'player_<?php echo $slide_id; ?>',
		'file': '<?php echo $vidid; ?>',
		'width': '<?php echo $NV_vidwidth; ?>',
		<?php echo $jwplayer_height; ?>		
		<?php if(get_option('jwplayer_skin')) { ?>
		'skin': '<?php echo get_option('jwplayer_skin'); ?>',
		<?php } ?>
		<?php if($NV_mediatype=='audio') { ?>
		'controlbar.position': 'bottom',
		<?php } elseif(get_option('jwplayer_skinpos')) { ?>
		'controlbar.position': '<?php echo get_option('jwplayer_skinpos'); ?>',
		<?php } 
		if($NV_loop=="1") { ?>
		'repeat':'always',
		'shuffle':'true',
		<?php } ?>		
		'stretching': 'exactfit',
		'controlbar.idlehide':'true',
		<?php if($NV_customlayer) {?>
		'icons': 'false',
		<?php } ?>
		'wmode': 'transparent',
		'image': '<?php echo dyn_getimagepath($NV_previewimgurl); ?>',
		'players': [
		{type: 'flash', src: '<?php echo get_option('jwplayer_swf'); ?>'},	
		{type: 'download'}
		]
    });
			  

	jQuery(window).load(function() {	
	

		<?php if($NV_mediatype!='audio') { // only apply the following if video type ?>			
		
			jQuery('#<?php echo $slide_id; ?>,#<?php echo $slide_id; ?>_wrapper').addClass('jwplayer'); 
			jQuery('#<?php echo $slide_id; ?>').addClass('id<?php echo $slide_id; ?>');
	
			jQuery('#<?php echo $slide_id; ?>_video_wrapper').addClass('jw_video_wrapper'); 
			jQuery('#<?php echo $slide_id; ?>_displayarea').addClass('jw_displayarea'); 
			jQuery('#<?php echo $slide_id; ?>_jwplayer_display').addClass('jw_display'); 
			jQuery('#<?php echo $slide_id; ?>_jwplayer_display_image').addClass('jw_display_image'); 
			jQuery('#<?php echo $slide_id; ?>_jwplayer_display_iconBackground').addClass('jw_iconBackground'); 
	
		<?php } ?>
			
			
			jQuery('.mediawrap.audio .jwplayer-wrapper div:first-child').css('width','100%');
		
			if("1"=="<?php echo $NV_videoautoplay; ?>") {
				jQuery('#<?php echo $slide_id; ?>').addClass('autostart');
			}
			
			var obj = jQuery('#<?php echo $slide_id; ?>').attr("id");
				
			if(jQuery("#"+obj).hasClass('autostart')) {
				jwplayer(obj).onReady(function() {
					currentState = jwplayer(obj).getState(); 
					if(currentState=="IDLE") {
						jwplayer(obj).play();
					}
				});
			}
	});
	
		
	<?php if(get_option('priority_loading')=='enable') { ?>
	});
	<?php } ?>
	
	
</script>

<?php } ?>
</div>