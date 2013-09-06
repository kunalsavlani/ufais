<?php 

#===================================================================================
#
#	Looking for the header content? You'll find it inside "header-default.php"
#
#===================================================================================


// This page is meant to catch plugins that try loading content outside the design making direct calls to "the_header('buddypress')" and "the_footer('buddypress')"
// It is now used to load BP content for greater consistancy and easier upgrading.

// We start by turning on output buffering to capture the output attempting to display
//................................................................

ob_start(); 


// Now we skip to "footer-buddypress.php" and finish capturing the output before returning to the theme to display it properly
//................................................................


?>