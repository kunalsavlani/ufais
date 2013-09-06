<?php
/**
 * If BuddyPress isn't active don't go any further.
 */
if( !defined( 'BP_VERSION' ) )
	return;

/**
 * Add 'msmw_child_theme' to themes body class.
 */
function mysite_child_theme_class() {
	return array( 'msmw_child_theme' );
}
add_filter( 'mysite_filter_body_class', 'mysite_child_theme_class' );

/**
 * Fix undefined 'wp_inactive_widgets' index error if
 * child theme is active before BuddyPress plugin is.
 */
function mysite_inactive_widgets_fix( $sidebars_widgets ) {
	if( empty( $sidebars_widgets ) )
		$sidebars_widgets = array();
	
	if( !isset( $sidebars_widgets['wp_inactive_widgets'] ) )
		$sidebars_widgets = array_merge( $sidebars_widgets, array( 'wp_inactive_widgets' => '' ) );
		
	return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'mysite_inactive_widgets_fix', 1, 1 );

/**
 * Is make sure is_singular() works on BuddyPress pages.
 */
function mysite_bbpress_fix() {
	global $wp_query;
	if( $wp_query->is_page && defined( 'BP_VERSION' ) )
		$wp_query->is_singular = true;
}
add_action( 'get_header', 'mysite_bbpress_fix' );

/**
 * Make sure our script load.
 */
if ( defined( 'BP_VERSION' ) )
	add_action('mysite_head', 'mysite_enqueue_script');
	
if ( !function_exists( 'bp_dtheme_enqueue_scripts' ) ) :
/**
 * Load BuddyPress Javascript
 */
function bp_dtheme_enqueue_scripts() {
	// Bump this when changes are made to bust cache
	$version = '20120110';

	// Enqueue the global JS - Ajax will not work without it
	wp_enqueue_script( 'dtheme-ajax-js', plugins_url( 'buddypress/bp-themes/bp-default' ) . '/_inc/global.js', array( 'jquery' ), $version );

	// Add words that we need to use in JS to the end of the page so they can be translated and still used.
	$params = array(
		'my_favs'           => __( 'My Favorites', 'buddypress' ),
		'accepted'          => __( 'Accepted', 'buddypress' ),
		'rejected'          => __( 'Rejected', 'buddypress' ),
		'show_all_comments' => __( 'Show all comments for this thread', 'buddypress' ),
		'show_all'          => __( 'Show all', 'buddypress' ),
		'comments'          => __( 'comments', 'buddypress' ),
		'close'             => __( 'Close', 'buddypress' ),
		'view'              => __( 'View', 'buddypress' ),
		'mark_as_fav'	    => __( 'Favorite', 'buddypress' ),
		'remove_fav'	    => __( 'Remove Favorite', 'buddypress' )
	);

	wp_localize_script( 'dtheme-ajax-js', 'BP_DTheme', $params );
}
add_action( 'wp_enqueue_scripts', 'bp_dtheme_enqueue_scripts' );
endif;

/**
 *
 */
if ( !function_exists( 'mysite_post_nav' ) ) :
/**
 * Make sure post navigation doesn't load on BuddyPress pages.
 */
function mysite_post_nav() {
	$disable_post_nav = apply_atomic( 'disable_post_nav', mysite_get_setting( 'disable_post_nav' ) );
	if( !empty( $disable_post_nav ) || is_page() )
		return;
	
?><div class="post_nav_module">
	<div class="previous_post"><?php previous_post_link( '%link', '%title' ); ?></div>
	<div class="next_post"><?php next_post_link( '%link', '%title' ); ?></div>
</div><!-- #nav-below -->
<?php
}
endif;

if ( !function_exists( 'bp_dtheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress and BuddyPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override bp_dtheme_setup() in a child theme, add your own bp_dtheme_setup to your child theme's
 * functions.php file.
 */
function bp_dtheme_setup() {

	// Load the AJAX functions for the theme
	require( BP_PLUGIN_DIR . '/bp-themes/bp-default/_inc/ajax.php' );

	if ( !is_admin() ) {
		// Register buttons for the relevant component templates
		// Friends button
		if ( bp_is_active( 'friends' ) )
			add_action( 'bp_member_header_actions',    'bp_add_friend_button' );

		// Activity button
		if ( bp_is_active( 'activity' ) )
			add_action( 'bp_member_header_actions',    'bp_send_public_message_button' );

		// Messages button
		if ( bp_is_active( 'messages' ) )
			add_action( 'bp_member_header_actions',    'bp_send_private_message_button' );

		// Group buttons
		if ( bp_is_active( 'groups' ) ) {
			add_action( 'bp_group_header_actions',     'bp_group_join_button' );
			add_action( 'bp_group_header_actions',     'bp_group_new_topic_button' );
			add_action( 'bp_directory_groups_actions', 'bp_group_join_button' );
		}

		// Blog button
		if ( bp_is_active( 'blogs' ) )
			add_action( 'bp_directory_blogs_actions',  'bp_blogs_visit_blog_button' );
	}
}
add_action( 'after_setup_theme', 'bp_dtheme_setup' );
endif;

if ( !function_exists( 'bp_dtheme_activity_secondary_avatars' ) ) :
/**
 * Add secondary avatar image to this activity stream's record, if supported.
 */
function bp_dtheme_activity_secondary_avatars( $action, $activity ) {
	switch ( $activity->component ) {
		case 'groups' :
		case 'friends' :
			// Only insert avatar if one exists
			if ( $secondary_avatar = bp_get_activity_secondary_avatar() ) {
				$reverse_content = strrev( $action );
				$position        = strpos( $reverse_content, 'a<' );
				$action          = substr_replace( $action, $secondary_avatar, -$position - 2, 0 );
			}
			break;
	}

	return $action;
}
add_filter( 'bp_get_activity_action_pre_meta', 'bp_dtheme_activity_secondary_avatars', 10, 2 );
endif;

if ( !function_exists( 'bp_dtheme_sidebar_login_redirect_to' ) ) :
/**
 * Adds a hidden "redirect_to" input field to the sidebar login form.
 */
function bp_dtheme_sidebar_login_redirect_to() {
	$redirect_to = apply_filters( 'bp_no_access_redirect', !empty( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '' );
?>
	<input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />
<?php
}
add_action( 'bp_sidebar_login_form', 'bp_dtheme_sidebar_login_redirect_to' );
endif;

/**
 * Fix undefined 'bp_is_active' function error if
 * child theme is active before BuddyPress plugin is.
 */
if ( !function_exists( 'bp_is_active' ) ) :
function bp_is_active( $component ) {
	global $bp;

	if ( isset( $bp->active_components[$component] ) )
		return true;

	return false;
}
endif;

?>