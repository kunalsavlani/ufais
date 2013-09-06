<?php global $designBypassContent;

#===================================================================================
#
#	Looking for the footer content? You'll find it inside "footer-default.php"
#
#===================================================================================



/*
	This will reload the page using the default bbPress layout set from (Appearance > Layouts)

	To control layouts of plugins and other BP specific content which is not available from the theme options you can specify
	the layout in the function below. 
	
	For example: 
	
	create_page_layout('bp', 'full-width');
	
	The value of the second parameter can be any layout "key". The key is the value you enter field "Layout key (unique identifier)" 
	set during creation (Appearance > Layouts). You can look the value up by editing any layout and copying the the Key from the input.
	
	If you needed to conditionally set a custom layout depending on the plugin, you would need to determine a variable which can be
	tested to detect if that plugin is being shown then conditionally call the function below.
	
	For example something like this:
	-------------------------------------------------------------
	
		$bbPress_plugin_name = {some lookup you create}
		
		switch($bbPress_plugin_name) {
			
			case 'plugin-1':
				$layout_key = 'full-width';
				break;
			case 'plugin-2':
				$layout_key = 'page-left-sidebar';
				break;
			default:
				$layout_key = false;	// leaving it false will use default bbPress layout setting	
		}
		
		create_page_layout('bbpress', $layout_key);	// context = bbpress
	
	-------------------------------------------------------------

	That's just an example of a possible use for setting a custom layout based on a plugin or other page not availbel to configure from the admin.
	
*/



// This page is the second part in catching plugins that try loading content outside the design making direct calls to "the_header()" and "the_footer()"
// Previously in "header.php" we turned on output buffering to capture the output. Now we will return that content and load the theme design.
//................................................................

$designBypassContent = ob_get_clean();


// Add some BuddyPress specific theme structures
//................................................................

$designBypassContent = '<div id="bbPress-Container"><div id="bbPress-Content" role="main">'. $designBypassContent .'</div></div><div class="clear"></div>';


// Last thing... load the theme design normally and it will detect the content of "$improperLoadContent" and add it to the output.
//................................................................

create_page_layout('bbpress');	// context = bbpress

?>