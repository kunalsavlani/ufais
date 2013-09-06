<?php
/*
Plugin Name: BP Webcam Avatar
Description: Add a webcam snapshot option for avatar.
Author: Vardi , michaelvar
Author URI: http://web-world.co.il
Plugin URI: http://web-world.co.il/wp-plugins/bp-webcam-avatar
Version: 0.8

License: CC-GNU-GPL http://creativecommons.org/licenses/GPL/2.0/

*/


/* Only load the plugin if BP is loaded and initialized. */
function bp_wa_init() {
	
	require( dirname( __FILE__ ) . '/wa.php' );
}
add_action( 'bp_init', 'bp_wa_init' );
/* end stuff for this file */
?>