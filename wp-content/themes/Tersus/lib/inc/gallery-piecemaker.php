<div class="slider-3d-wrap <?php echo $NV_galleryclass; ?> nv-skin">
	<div id="slider_3d">
	</div>
    <?php $NV_galleryheight ? $NV_galleryheight = $NV_galleryheight : $NV_galleryheight = '450'; 
	$page_id=$post->ID;
	$_SESSION['piecemaker_ID'] = $page_id;
	?>
    <script type="text/javascript">
	<?php if(get_option('priority_loading')=='enable') { ?>
	head.ready(function() {
	<?php } ?>
	jQuery(document).ready(function(){
		jQuery('#slider_3d').flash(
			{ 
				src: '<?php echo get_template_directory_uri(); ?>/images/piecemaker.swf',
				wmode:"transparent",
				height: <?php echo $NV_galleryheight; ?>,
				width:'100%',
				AllowScriptAccess:'always',
				expressInstaller: "<?php echo get_template_directory_uri(); ?>/lib/inc/swfobject/expressInstall.swf",
				flashvars: { xmlSource: "<?php echo get_template_directory_uri(); ?>/lib/inc/piecemakerXML.php",cssSource: "<?php echo get_template_directory_uri(); ?>/stylesheets/piecemaker.php" }
			},
			{ version: 10 }
		);
	});
	<?php if(get_option('priority_loading')=='enable') { ?>
	});
	<?php } ?>
    </script>    
</div>