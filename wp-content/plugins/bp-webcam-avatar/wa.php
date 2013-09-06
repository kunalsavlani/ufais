<?php global $bp;
define ( 'BP_WA_DB_VERSION', '1.2.1' );
function wa_setup_globals() {
	global $bp, $wpdb;

	/* For internal identification */
	$bp->wa->id = 'wa';

	/* Register this in the active components array */
	$bp->active_components[$bp->wa->slug] = $bp->wa->id;
}

add_action( 'bp_setup_globals', 'bp_wa_setup_globals' );?>
<?php if ( isset ( $GLOBALS["HTTP_RAW_POST_DATA"] )&& isset($_GET['cam'])) {
$uniqueStamp = date(U);
$dir = bp_core_avatar_upload_path().'/avatars/'.$bp->loggedin_user->id.'/';
if(file_exists($dir)){}
else
mkdir($dir);
$picname = $uniqueStamp."-bpfull.jpg";
$fp = fopen( $dir.$picname,"wb");
fwrite( $fp, base64_decode($GLOBALS[ 'HTTP_RAW_POST_DATA' ]) );
fclose( $fp );
$picnamethumb = $uniqueStamp."-bpthumb.jpg";
	$resized_img = imagecreatetruecolor(50,50);
	$image = imagecreatefromjpeg($dir.$picname);
	imagecopyresampled($resized_img,$image, 0, 0, 0, 0, 50, 50, 150, 150);
	imagejpeg( $resized_img, $dir.$picnamethumb ,100);
    imagedestroy($resized_img);
	imagedestroy($image);
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    $arr=explode('-',$filename);
	if($arr[sizeof($arr)-1]=='bpfull.jpg')
		if($filename!=$picname)
			if(!is_dir($filename))
				unlink($dir.$filename);
	if($arr[sizeof($arr)-1]=='bpthumb.jpg')
		if($filename!=$picnamethumb)
			if(!is_dir($filename))
				unlink($dir.$filename);
}
echo "result=OK";}?>
<?php function webcam_avatar(){
	global $bp, $wpdb;?>
<style type="text/css" media="screen"> 
#flashContent { display:none; }
</style>
<script type="text/javascript" src="<?php echo plugins_url() ?>/bp-webcam-avatar/swfobject.js"></script>

        <script type="text/javascript">

            <!-- For version detection, set to min. required Flash Player version, or 0 (or 0.0.0), for no version detection. --> 

            var swfVersionStr = "10.0.0";

            <!-- To use express install, set to playerProductInstall.swf, otherwise the empty string. -->

            var xiSwfUrlStr = "<?php echo plugins_url();?>/bp-webcam-avatar/playerProductInstall.swf";

            var flashvars = {};

            var params = {};

            params.quality = "high";

            params.bgcolor = "#ffffff";

            params.allowscriptaccess = "sameDomain";

            params.allowfullscreen = "true";

            var attributes = {};

            attributes.id = "cam";

            attributes.name = "cam";

            attributes.align = "middle";

            swfobject.embedSWF(

                "<?php echo plugins_url();?>/bp-webcam-avatar/cam.swf", "flashContent", 

                "300", "345", 

                swfVersionStr, xiSwfUrlStr, 

                flashvars, params, attributes);

			<!-- JavaScript enabled so display the flashContent div in case it is not replaced with a swf object. -->

			swfobject.createCSS("#flashContent", "display:block;text-align:left;");
</script>
<div id="cameraObj">
<div id="flashContent">

        	<p>

	        	To view this page ensure that Adobe Flash Player version 

				10.0.0 or greater is installed. 

			</p>

			<script type="text/javascript"> 

				var pageHost = ((document.location.protocol == "https:") ? "https://" :	"http://"); 

				document.write("<a href='http://www.adobe.com/go/getflashplayer'><img src='" 

								+ pageHost + "www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a>" ); 

			</script> 

        </div>
		<div><input type='button' id='back_to_normal' value='Back to normal upload'/></div>
</div>
<noscript>

            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="300" height="345" id="Main">

                <param name="movie" value="<?php echo plugins_url();?>/bp-webcam-avatar/cam.swf" />

                <param name="quality" value="high" />

                <param name="bgcolor" value="#ffffff" />

                <param name="allowScriptAccess" value="sameDomain" />

                <param name="allowFullScreen" value="true" />

                <!--[if !IE]>-->

                <object type="application/x-shockwave-flash" data="<?php echo plugins_url();?>/bp-webcam-avatar/cam.swf" width="300" height="345">

                    <param name="quality" value="high" />

                    <param name="bgcolor" value="#ffffff" />

                    <param name="allowScriptAccess" value="sameDomain" />

                    <param name="allowFullScreen" value="true" />

                <!--<![endif]-->

                <!--[if gte IE 6]>-->

                	<p> 

                		Either scripts and active content are not permitted to run or Adobe Flash Player version

                		10.0.0 or greater is not installed.

                	</p>

                <!--<![endif]-->

                    <a href="http://www.adobe.com/go/getflashplayer">

                        <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash Player" />

                    </a>

                <!--[if !IE]>-->

                </object>

                <!--<![endif]-->

            </object>

	    </noscript>	
<script type="text/javascript">
jQuery(document).ready(function($){
	jQuery('#cameraObj').hide();
	jQuery('#avatar-upload-form').before("<p>You can also click on the webcam below to use a webcam snapshot</p>");
	jQuery('#avatar-upload-form').before("<div><a href='#' id='camera_button'><img src='<?php echo plugins_url();?>/bp-webcam-avatar/images/cam_icon.png'/></a></div>");
	jQuery('#camera_button').click(function() {
			jQuery('#avatar-upload-form').hide('slow');
			jQuery('#avatar-upload-form').before(jQuery('#cameraObj'));
			jQuery('#cameraObj').show('slow');
			});
	jQuery('#back_to_normal').click(function() {
			jQuery('#avatar-upload-form').show('slow');
			jQuery('#cameraObj').hide('slow');
			});
	});
</script><?php } add_action('bp_before_profile_avatar_upload_content', 'webcam_avatar', 10);?>