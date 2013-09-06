<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

#-----------------------------------------------------------------
# Enable/disable developer theme options
#-----------------------------------------------------------------

$developer_options = true;

#-----------------------------------------------------------------
# Default theme variables and information
#-----------------------------------------------------------------

$themeInfo = get_theme_data(TEMPLATEPATH . '/style.css');
$themeVersion = trim($themeInfo['Version']);
$themeTitle= trim($themeInfo['Title']);
$shortname = sanitize_title($themeTitle . "_");


// shortcuts variables
//................................................................

$cssPath = trailingslashit(get_bloginfo('stylesheet_directory')) . 'assets/css/';
$jsPath = trailingslashit(get_bloginfo('stylesheet_directory')) . 'assets/js/';
$themePath = trailingslashit(get_bloginfo('template_url'));
$themeUrlArray = parse_url(get_bloginfo('template_url'));
$themeLocalUrl = trailingslashit($themeUrlArray['path']);
$frameworkPath = trailingslashit($themePath . 'framework');

// set as constants
//................................................................

define('THEME_NAME', $themeTitle);											// Theme title
define('THEME_VERSION', $themeVersion);										// Theme version number
define('THEME_URL', $themePath);											// URL of theme folder
define('FRAMEWORK_URL', $frameworkPath);									// URL of framework folder
define('THEME_DIR', trailingslashit(TEMPLATEPATH));							// Server path to theme folder
define('FRAMEWORK_DIR', trailingslashit(TEMPLATEPATH) . 'framework/');		// Server path to framework folder
define('AVATAR_SIZE', 35);													// Default avatar size


// other variables
//................................................................

if (!isset($content_width)) $content_width = 926;							// Max content width

// a temporary post variable used with custom post type filters
global $tempPost; 

// Theme menu locations (auto registered "framework/theme-functions/filters-and-actions.php")
$themeMenus = array(
	'MainMenu' => __( 'Main Menu', THEME_NAME)
);


#-----------------------------------------------------------------
# Translation ready code
#-----------------------------------------------------------------

/* 
*  To create a translation file for your language, download POEdit (www.poedit.net) and open the file "assets/translation/en_US.po"
*  Create the translation using this file and save the new file in the format "lang_COUNTRY.po", for example "en_UK.po" for British translation of English.
*
*  You can manually set your language with the value of the "$locale" variable to your ".mo" file name.  
*  For example, you could force the locale with:  $locale = 'es_ES';
*/

global $locale;
$locale = get_locale();
// $locale = 'es_ES';
load_theme_textdomain( THEME_NAME, THEME_DIR . 'assets/translation' );
load_theme_textdomain( 'buddypress', THEME_DIR . 'assets/translation' );


#-----------------------------------------------------------------
# Setup post thumbnails
#-----------------------------------------------------------------

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
}


#-----------------------------------------------------------------
# Load framework
#-----------------------------------------------------------------

include_once(FRAMEWORK_DIR . 'setup.php');


#-----------------------------------------------------------------
# Enqueue CSS style sheets
#-----------------------------------------------------------------

/*	This function will add CSS files to the list which are output by the function "theme_style_sheets()" in "header.php"
*	You can add to or remove from this list as needed. The function follows the format shown in the example below:
*
*	theme_register_css( $handle, $src, $priority (optional), $id (optional), $class (optional) );
*
*	You must include the following paramaters:
*
*		$handle	- string or plain text name for registering the file
*		$src	- the path to the file
*/

theme_register_css( 'base', $cssPath.'base.css', 1 );										// Base CSS styles for browsers
theme_register_css( 'default', get_stylesheet_directory_uri().'/style-default.css', 2 );	// Default theme styles
theme_register_css( 'ddsmoothmenu', $cssPath.'ddsmoothmenu.css' );							// Drop down menu styles
theme_register_css( 'colorbox', $cssPath.'colorbox.css' );									// Lightbox styles
theme_register_css( 'qtip', $cssPath.'qtip.css' );											// Tool tip styles


#-----------------------------------------------------------------
# Enqueue required scripts
#-----------------------------------------------------------------

// Default scripts to load (universal to all pages)
//................................................................
if (!function_exists('enqueue_theme_scripts')) :
	function enqueue_theme_scripts() {
		if (!is_admin()) {
			global $jsPath, $theLayout;
			// wp_register_script( $handle, $src, $deps, $ver, $in_footer );
			
			// Modernizr (enables HTML5 elements & feature detects)
			wp_deregister_script( 'modernizr' );
			wp_register_script( 'modernizr', $jsPath.'libs/modernizr-1.6.min.js', '', '1.6');
			wp_enqueue_script( 'modernizr' );
			
			// jQuery
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), '1.7.1');
			wp_enqueue_script( 'jquery' );
			
			// swfobject
			wp_deregister_script( 'swfobject' );
			wp_register_script( 'swfobject', $jsPath.'libs/swfobject.js', array(), '2.2');
			wp_enqueue_script( 'swfobject' );
			
			// Cufon fonts for headings
			//if ($theLayout['heading_font']['cufon']) {
				// Cufon YUI
				wp_deregister_script( 'cufon' );
				wp_register_script( 'cufon', $jsPath.'libs/cufon-yui.js', '', '1.09');
				wp_enqueue_script( 'cufon' );
			//}
			
			// DD Smooth Menu (main menu drop downs) 
			wp_deregister_script( 'ddsmoothmenu' );
			wp_register_script( 'ddsmoothmenu', $jsPath.'libs/ddsmoothmenu.js', array('jquery'), '1.5', true);
			wp_enqueue_script( 'ddsmoothmenu' );
	
			// Colorbox (lightbox)
			wp_deregister_script( 'colorbox' );
			wp_register_script( 'colorbox', $jsPath.'libs/jquery.colorbox-min.js', array('jquery'), '1.3.16', true);
			wp_enqueue_script( 'colorbox' );
			
			// qTips (tool tips)
			wp_deregister_script( 'qtip' );
			wp_register_script( 'qtip', $jsPath.'libs/jquery.qtip.min.js', array('jquery'), '2', true);
			wp_enqueue_script( 'qtip' );
			
			// Overlabel (if enabled you must also enable function in "assets/js/onLoad.js")
			/*
			wp_deregister_script( 'overlabel' );
			wp_register_script( 'overlabel', $jsPath.'libs/jquery.overlabel.min.js', array('jquery'), '1.0', true);
			wp_enqueue_script( 'overlabel' );
			*/
			
		}
	}
	
	add_action('wp_enqueue_scripts', 'enqueue_theme_scripts', 1);
endif;

// Shortcode or other conditional scripts. 
//................................................................
if (!function_exists('enqueue_conditional_footer_scripts')) :
    function enqueue_conditional_footer_scripts() {
        global $jsPath;
		
		// Items below must have a global variable set to 'true' to trigger enqueue.
		// Also, these can only be loaded in footer becaues they they happen after the <head> is loaded.

		// Contact form
        if ($GLOBALS['load_contact_form_scripts']) {
			wp_register_script( 'jquery-validate', $jsPath.'libs/jquery.validate.min.js', array('jquery'), '1.8.0', true);
			wp_print_scripts('jquery-validate');

			wp_register_script( 'ajax-form', $jsPath.'ajaxForm.js', array('jquery'), '1.0', true);
			wp_print_scripts('ajax-form');
		}

		// Slide show
        if ($GLOBALS['load_slide_show_scripts']) {
			wp_register_script( 'jquery-cycle-all', $jsPath.'libs/jquery.cycle.all.min.js', array('jquery'), '2.9995', true);
			wp_print_scripts('jquery-cycle-all');
		}
		
    }
endif;
add_action('wp_footer', 'enqueue_conditional_footer_scripts');


#-----------------------------------------------------------------
# Other WP Stuff
#-----------------------------------------------------------------

// required by WP
//................................................................
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

add_theme_support('automatic-feed-links');

// CSS styling to apply to admin editor
//................................................................
add_editor_style('style-wp-editor.css');

function _out($var) {
    echo "<pre>".print_r($var, true)."</pre><br>";
}

?>