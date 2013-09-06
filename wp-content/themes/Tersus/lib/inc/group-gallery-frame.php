<?php 

/* ------------------------------------

:: CONFIGURE SLIDE

------------------------------------ */

	if($NV_movieurl && $NV_videotype=="") { // Check if using JW Player -> Add Skin if enabled
		 $isplayer = strpos($NV_movieurl, "player.swf");
		 
		if ($isplayer !== false) {	
			if($NV_videoautoplay=="1") {
				$NV_movieurl .= "&amp;autostart=true";
			}
				
			if(get_option('jwplayer_skin')) {
				$NV_movieurl .="&amp;skin=".get_option('jwplayer_skin');
			}
				
			if(get_option('jwplayer_skinpos')) {
				$NV_movieurl .="&amp;controlbar.position=".get_option('jwplayer_skinpos');
			}				
		}
	}

	if($NV_imgwidth && $NV_verticalslide=='horizontal') {
		$NV_maxwidth='style="max-width:'.($NV_imgwidth-2).'px"';
	}


	if(!$NV_previewimgurl) { // check what image to use, custom, featured, image within post. 
		$post_image_id = get_post_thumbnail_id(get_the_ID());
			if ($post_image_id) {
				$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
				$NV_previewimgurl=$thumbnail[0];
				$NV_previewimgurl	=	parse_url($NV_previewimgurl, PHP_URL_PATH); // make relative Image URL
			} elseif($image) {
			$NV_previewimgurl=$image;
		}
	}
	
	if($NV_imageeffect=='shadowblackwhite') { $NV_imageeffect = 'shadow'; $NV_blackwhite='blackwhite'; } // add space for separate effects (shadow / black white)
	
	if(!isset($NV_gallery_postformat)) $NV_gallery_postformat=''; // check if postformat enabled

/* ------------------------------------

:: CONFIGURE SLIDE *END*

------------------------------------ */

?>

<?php if($postcount=="1") { ?>
    <div class="groupslides-wrap row" <?php if(isset($NV_panelformat)) echo $NV_panelformat; ?>>
<?php } ?>


	<div class="panel block columns <?php echo $NV_slidercolumns_text."_column "; if($postcount==$NV_slidercolumns) { echo 'last'; } ?>">

<?php if($NV_gallery_postformat=='yes') {
	
	global $is_widget; $is_widget=true; // stop comments displaying within gallery
	get_template_part( 'content', get_post_format() );	
	
} else { 


	if($NV_groupgridcontent!="text") { ?> 

    <?php if($NV_videotype) { // Check "Preview Image" field is completed ?>    
  
		<div class="container videotype <?php echo $NV_shadowsize.' '.$NV_imageeffect.' '.$NV_cssclasses; ?>">
			<div class="gridimg-wrap">
				<div class="title-wrap <?php echo $NV_blackwhite; ?>">
				
					<?php include(NV_FILES .'/inc/classes/video-class.php'); ?>

 					<?php if(($NV_groupgridcontent=="titleoverlay" || $NV_groupgridcontent=="titletextoverlay")) { ?>	
                    <div class="title"><h3><?php if($NV_disablegallink!='yes') { ?><a href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>" title="<?php echo $NV_posttitle; ?>" target="_blank"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a><?php } ?></h3>
                        <?php if($NV_groupgridcontent=="titletextoverlay") { ?>
                        <div class="overlaytext">
                        <?php echo do_shortcode($NV_description); ?>
                        </div> 
                        <?php } ?>
                    </div>	             
                    <?php } ?>	
                    
				</div><!-- / title-wrap -->    	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->		    
        
    <?php } elseif($NV_previewimgurl) { // Check "Preview Image" field is completed ?>
   
		<div class="container <?php echo $NV_shadowsize.' '.$NV_imageeffect.' '.$NV_cssclasses; ?>">
			<div class="gridimg-wrap">
				<div class="title-wrap <?php echo $NV_blackwhite; ?>">

					<?php if(class_exists('WPSC_Query') || class_exists('Woocommerce')   && $NV_datasource=='data-5') { // Product Price  ?>
                        <?php if( !empty( $NV_productprice ) ) : ?>	<span class="productprice"><?php echo $NV_productprice; ?></span> <?php endif; ?>	  
                    <?php } ?>
                
					<?php if($NV_lightbox=="yes") { ?><a href="<?php if($NV_movieurl) { echo $NV_movieurl; } else { echo $NV_previewimgurl; } ?>" title="<?php echo $NV_posttitle; ?>" data-fancybox-group="group-gallery<?php echo $NV_shortcode_id; ?>" <?php if($NV_movieurl) { ?> class="fancybox galleryvid" <?php } else { ?> class="fancybox galleryimg" <?php } ?>><?php } elseif($NV_disablegallink!='yes') { ?><a href="<?php echo $NV_galexturl; ?>" title="<?php echo $NV_posttitle; ?>"><?php } ?>
                    
                        <img class="gallery-img <?php if($NV_imageeffect=="reflection" || $NV_imageeffect=="shadowreflection") { ?>reflect<?php } ?>" src="<?php echo $NV_imagepath . dyn_getimagepath($NV_previewimgurl); ?>" alt="<?php echo $NV_posttitle; ?>" <?php if(isset($NV_image_attr)) echo $NV_image_attr; ?> />
                    <?php if($NV_disablegallink!='yes' || $NV_lightbox=="yes") { ?>
                        </a>
                    <?php } ?>

                <?php if(($NV_groupgridcontent=="titleoverlay" || $NV_groupgridcontent=="titletextoverlay")) { ?>	
				<div class="title"><h3><?php if($NV_disablegallink!='yes') { ?><a href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>" title="<?php echo $NV_posttitle; ?>" target="_blank"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a><?php } ?></h3>
                    
                    <?php if($NV_groupgridcontent=="titletextoverlay") { ?>
                    <div class="overlaytext">
                    <?php echo do_shortcode($NV_description); ?>
                	</div>      
                    <?php } ?>                              
                </div>	             
                <?php } ?>	
				</div><!-- / title-wrap --> 
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->				
				
	<?php } 
	
	} 

if(($NV_groupgridcontent!="image" && $NV_groupgridcontent!="titleoverlay" && $NV_groupgridcontent!="titletextoverlay" )) { ?>  

	<div class="panelcontent content <?php echo $NV_cssclasses; ?>"  <?php if(isset($NV_maxwidth)) echo $NV_maxwidth; ?>>
		
        <h3><?php if($NV_disablegallink!='yes') { ?>
        <a href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>" title="<?php echo $NV_posttitle; ?>"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a>
		<?php } ?></h3>	

		<?php if($NV_groupgridcontent!="titleimage")  { ?>
		    
			<?php echo do_shortcode($NV_description);
			
			if($NV_disablegallink!='yes' && $NV_disablereadmore!='yes') { ?>
			<p class="read-more-wrap"><a class="read-more" href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>"><?php _e( 'Read more  &rarr;', 'NorthVantage' );  ?></a></p>
			<?php }	?>	
			
        <?php } ?>

	</div><!-- /panelcontent --> 
     
<?php } 	        
        
} // end of post format ?>
	
    </div><!-- /panel -->     

<?php if($postcount==$NV_slidercolumns) { 
	$postcount="0";
?>
	</div><!--  / row -->
<?php } ?>    