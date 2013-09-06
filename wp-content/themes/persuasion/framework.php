<?php
/**
 * The Mysitemyway class. Defines the necessary constants 
 * and includes the necessary files for theme's operation.
 *
 * @package Mysitemyway
 * @subpackage Persuasion
 */

class Mysitemyway {
	
	/**
	 * Initializes the theme framework by loading
	 * required files and functions for the theme.
	 *
	 * @since 1.0
	 */
	function init( $options ) {
		self::constants( $options );
		self::functions();
		self::extensions();
		self::classes();
		self::variables();
		self::actions();
		self::filters();
		self::supports();
		self::locale();
		self::admin();
	}
	
	/**
	 * Define theme constants.
	 *
	 * @since 1.0
	 */
	function constants( $options ) {
		define( 'THEME_NAME', $options['theme_name'] );
		define( 'THEME_SLUG', get_template() );
		define( 'THEME_VERSION', $options['theme_version'] );
		define( 'FRAMEWORK_VERSION', '2.1' );
		define( 'DOCUMENTATION_URL', 'http://mysitemyway.com/docs/index.php/Main_Page' );
		define( 'SUPPORT_URL', 'http://mysitemyway.com/support' );
		define( 'MYSITE_PREFIX', 'mysite' );
		define( 'MYSITE_TEXTDOMAIN', THEME_SLUG );
		define( 'MYSITE_ADMIN_TEXTDOMAIN', THEME_SLUG . '_admin' );

		define( 'MYSITE_SETTINGS', 'mysite_' . THEME_SLUG . '_options' );
		define( 'MYSITE_INTERNAL_SETTINGS', 'mysite_' . THEME_SLUG . '_internal_options' );
		define( 'MYSITE_SIDEBARS', 'mysite_' . THEME_SLUG . '_sidebars' );
		define( 'MYSITE_SKINS', 'mysite_' . THEME_SLUG . '_skins' );
		define( 'MYSITE_ACTIVE_SKIN', 'mysite_' . THEME_SLUG . '_active_skin' );
		define( 'MYSITE_SKIN_NT_WRITABLE', 'mysite_' . THEME_SLUG . '_skins_nt_writable' );

		define( 'THEME_URI', get_template_directory_uri() );
		define( 'THEME_DIR', get_template_directory() );

		define( 'THEME_LIBRARY', THEME_DIR . '/lib' );
		define( 'THEME_ADMIN', THEME_LIBRARY . '/admin' );
		define( 'THEME_FUNCTIONS', THEME_LIBRARY . '/functions' );
		define( 'THEME_CLASSES', THEME_LIBRARY . '/classes' );
		define( 'THEME_EXTENSIONS', THEME_LIBRARY . '/extensions' );
		define( 'THEME_SHORTCODES', THEME_LIBRARY . '/shortcodes' );
		define( 'THEME_CACHE', THEME_DIR . '/cache' );
		define( 'THEME_FONTS', THEME_LIBRARY . '/scripts/fonts' );
		define( 'THEME_STYLES_DIR', THEME_DIR . '/styles' );
		define( 'THEME_PATTERNS_DIR', THEME_STYLES_DIR . '/_patterns' );
		define( 'THEME_SPRITES_DIR', THEME_STYLES_DIR . '/_sprites' );
		define( 'THEME_IMAGES_DIR', THEME_DIR . '/images' );

		define( 'THEME_PATTERNS', '_patterns' );
		define( 'THEME_IMAGES', THEME_URI . '/images' );
		define( 'THEME_IMAGES_ASSETS', THEME_IMAGES . '/assets' );
		define( 'THEME_JS', THEME_URI . '/lib/scripts' );
		define( 'THEME_STYLES', THEME_URI . '/styles' );
		define( 'THEME_SPRITES', THEME_STYLES . '/_sprites' );

		define( 'THEME_ADMIN_FUNCTIONS', THEME_ADMIN . '/functions' );
		define( 'THEME_ADMIN_CLASSES', THEME_ADMIN . '/classes');
		define( 'THEME_ADMIN_OPTIONS', THEME_ADMIN . '/options');
		define( 'THEME_ADMIN_ASSETS_URI', THEME_URI . '/lib/admin/assets' );
	}
		
	/**
	 * Loads theme functions.
	 *
	 * @since 1.0
	 */
	function functions() {
		require_once( THEME_DIR . '/activation.php' );
		require_once( THEME_FUNCTIONS . '/hooks-actions.php' );
		require_once( THEME_FUNCTIONS . '/context.php' );
		require_once( THEME_FUNCTIONS . '/core.php' );
		require_once( THEME_FUNCTIONS . '/theme.php' );
		require_once( THEME_FUNCTIONS . '/sliders.php' );
		require_once( THEME_FUNCTIONS . '/scripts.php' );
		require_once( THEME_FUNCTIONS . '/image.php' );
		require_once( THEME_FUNCTIONS . '/twitter.php' );
		require_once( THEME_FUNCTIONS . '/bookmarks.php' );
		require_once( THEME_FUNCTIONS . '/hooks-actions.php' );
	}
	
	/**
	 * Loads theme extensions.
	 *
	 * @since 1.0
	 */
	function extensions() {
		require_once( THEME_EXTENSIONS . '/breadcrumbs-plus/breadcrumbs-plus.php' );
	}
	
	/**
	 * Loads theme classes.
	 *
	 * @since 1.0
	 */
	function classes() {
		require_once( THEME_CLASSES . '/contact.php' );
		require_once( THEME_CLASSES . '/menu-walker.php' );
	}
	
	/**
	 * Loads theme actions.
	 *
	 * @since 1.0
	 */
	function actions() {
		
		# WordPress actions
		add_action( 'init', 'mysite_shortcodes_init' );
		add_action( 'init', 'mysite_menus' );
		add_action( 'init', 'mysite_post_types'  );
		add_action( 'init', 'mysite_register_script' );
		add_action( 'init', 'mysite_wp_image_resize', 11 );
		add_action( 'init', array( 'mysiteForm', 'init'), 11 );
		add_action( 'widgets_init', 'mysite_sidebars' );
		add_action( 'widgets_init', 'mysite_widgets' );
		add_action( 'wp_head', 'mysite_seo_meta' );
		add_action( 'wp_head', 'mysite_analytics' );
		add_action( 'wp_head', 'mysite_custom_bg' );
		add_action( 'wp_head', 'mysite_additional_headers', 99 );
		add_action( 'template_redirect', 'mysite_enqueue_script' );
		add_action( 'template_redirect', 'mysite_addtional_post_dependencies' );
		add_action( 'template_redirect', 'mysite_squeeze_page' );
		add_action( 'comment_form_defaults', 'mysite_comment_form_args' );
		remove_action( 'wp_head', 'rel_canonical' );
		
		# Mysitemyway actions
		add_action( 'mysite_head', 'mysite_header_scripts' );
		add_action( 'mysite_before_header', 'mysite_fullscreen_bg' );
		add_action( 'mysite_before_header', 'mysite_header_extras' );
		add_action( 'mysite_header', 'mysite_logo' );
		add_action( 'mysite_header', 'mysite_primary_menu' );
		add_action( 'mysite_after_header', 'mysite_slider_module' );
		add_action( 'mysite_after_header', 'mysite_teaser' );
		add_action( 'mysite_after_header', 'mysite_breadcrumbs' );
		add_action( 'mysite_after_header', 'mysite_teaser' );
		add_action( 'mysite_before_post', 'mysite_post_image' );
		add_action( "mysite_before_post", 'mysite_post_title' );
		add_action( 'mysite_blog_before_post', 'mysite_post_meta' );
		add_action( 'mysite_singular-post_before_post', 'mysite_post_meta' );
		add_action( 'mysite_singular-portfolio_before_post', 'mysite_portfolio_date' );
		add_action( 'mysite_before_page_content', 'mysite_home_content' );
		add_action( 'mysite_before_page_content', 'mysite_page_content' );
		add_action( 'mysite_before_page_content', 'mysite_page_title' );
		add_action( 'mysite_before_page_content', 'mysite_query_posts' );
		add_action( 'mysite_singular-page_before_entry', 'mysite_post_image' );
		add_action( 'mysite_singular-post_after_entry', 'mysite_post_meta_bottom' );
		add_action( 'mysite_singular-post_after_entry', 'mysite_post_sociables' );
		add_action( 'mysite_singular-post_after_post', 'mysite_post_nav' );
		add_action( 'mysite_singular-post_after_post', 'mysite_like_module' );
		add_action( 'mysite_singular-post_after_post', 'mysite_about_author' );
		add_action( 'mysite_singular-portfolio_after_post', 'mysite_post_sociables' );
		add_action( 'mysite_after_post', 'mysite_page_navi' );
		add_action( 'mysite_after_main', 'mysite_get_sidebar' );
		add_action( 'mysite_before_footer', 'mysite_footer_teaser' );
		add_action( 'mysite_footer', 'mysite_main_footer' );
		add_action( 'mysite_after_footer', 'mysite_sub_footer' );
		add_action( 'mysite_body_end', 'mysite_print_cufon' );
		add_action( 'mysite_body_end', 'mysite_image_preloading' );
		add_action( 'mysite_body_end', 'mysite_custom_javascript' );
		add_action( 'mysite_singular-post_body_end', 'mysite_addtional_post_tooltip' );
	}
	
	/**
	 * Loads theme filters.
	 *
	 * @since 1.0
	 */
	function filters() {
		
		# Mysitemyway filters
		add_filter( 'mysite_author_avatar_size', create_function('','return "60";') );
		add_filter( 'mysite_avatar_size', create_function('','return "60";') );
		add_filter( 'mysite_date_format', create_function('','return __( "m-d-y" );') );
		add_filter( 'mysite_additional_posts_title', 'mysite_additional_posts_title' );
		add_filter( 'mysite_comments_title', 'mysite_comments_title', 10, 2 );
		add_filter( 'mysite_read_more', 'mysite_read_more' );
		
		# WordPress filters
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_content', 'wptexturize' );
		add_filter( 'the_content', 'mysite_texturize_shortcode_before' );
		add_filter( 'the_content', 'mysite_formatter', 99 );
		add_filter( 'widget_text', 'mysite_formatter', 99 );
		add_filter( 'the_content_more_link', 'mysite_full_read_more', 10, 2 );
		add_filter( 'excerpt_length', 'mysite_excerpt_length_long', 999 );
		add_filter( 'excerpt_more', 'mysite_excerpt_more' );
		add_filter( 'posts_where', 'mysite_multi_tax_terms' );
		add_filter( 'pre_get_posts', 'mysite_exclude_category_feed' );
		add_filter( 'pre_get_posts', 'mysite_custom_search' );
		add_filter( 'widget_categories_args', 'mysite_exclude_category_widget' );
		add_filter( 'query_vars', 'mysite_queryvars' );
		add_filter( 'rewrite_rules_array', 'mysite_rewrite_rules',10,2 );
		add_filter( 'widget_text', 'do_shortcode' );
		add_filter( 'wp_page_menu_args', 'mysite_page_menu_args' );
		add_filter( 'the_password_form', 'mysite_password_form' );
		add_filter( 'wp_feed_cache_transient_lifetime', 'mysite_twitter_feed_cahce', 10, 2 );
	}
	
	/**
	 * Loads theme supports.
	 *
	 * @since 1.0
	 */
	function supports() {
		add_theme_support( 'menus' );
		add_theme_support( 'widgets' );
		add_theme_support( 'post-thumbnails', array( 'post', 'page', 'portfolio' ) );
		add_theme_support( 'automatic-feed-links' );
	}
	
	/**
	 * Handles the locale functions file and translations.
	 *
	 * @since 1.0
	 */
	function locale() {
		# Get the user's locale.
		$locale = get_locale();

		if( is_admin() ) {
			# Load admin theme textdomain.
			load_theme_textdomain( MYSITE_ADMIN_TEXTDOMAIN, THEME_ADMIN . '/languages' );
			$locale_file = THEME_ADMIN . "/languages/$locale.php";

		} else {
			# Load theme textdomain.
			load_theme_textdomain( MYSITE_TEXTDOMAIN, THEME_DIR . '/languages' );
			$locale_file = THEME_DIR . "/languages/$locale.php";
		}

		if ( is_readable( $locale_file ) )
			require_once( $locale_file );
	}
		
	/**
	 * Loads admin files.
	 *
	 * @since 1.0
	 */
	function admin() {
		if( !is_admin() ) return;
			
		require_once( THEME_ADMIN . '/admin.php' );
		mysiteAdmin::init();
	}
	
	/**
	 * Define theme variables.
	 *
	 * @since 1.0
	 */
	function variables() {
		global $mysite;
		
		$layout = '';
		$img_set = get_option( MYSITE_SETTINGS );
		$img_set = ( !empty( $img_set ) && !isset( $_POST[MYSITE_SETTINGS]['reset'] ) ) ? $img_set : array();
		$blog_layout = apply_filters( 'mysite_blog_layout', mysite_get_setting( 'blog_layout' ) );
		
		# Images
		$images = array(
		    'one_column_portfolio' => array( 
		        ( !empty( $img_set['one_column_portfolio_full']['w'] ) ? $img_set['one_column_portfolio_full']['w'] : 968 ),
		        ( !empty( $img_set['one_column_portfolio_full']['h'] ) ? $img_set['one_column_portfolio_full']['h'] : 601 )),
		    'two_column_portfolio' => array( 
		        ( !empty( $img_set['two_column_portfolio_full']['w'] ) ? $img_set['two_column_portfolio_full']['w'] : 458 ),
		        ( !empty( $img_set['two_column_portfolio_full']['h'] ) ? $img_set['two_column_portfolio_full']['h'] : 284 )),
		    'three_column_portfolio' => array( 
		        ( !empty( $img_set['three_column_portfolio_full']['w'] ) ? $img_set['three_column_portfolio_full']['w'] : 288 ),
		        ( !empty( $img_set['three_column_portfolio_full']['h'] ) ? $img_set['three_column_portfolio_full']['h'] : 178 )),
		    'four_column_portfolio' => array( 
		        ( !empty( $img_set['four_column_portfolio_full']['w'] ) ? $img_set['four_column_portfolio_full']['w'] : 203 ),
		        ( !empty( $img_set['four_column_portfolio_full']['h'] ) ? $img_set['four_column_portfolio_full']['h'] : 126 )),

		    'one_column_blog' => array( 
		        ( !empty( $img_set['one_column_blog_full']['w'] ) ? $img_set['one_column_blog_full']['w'] : 968 ),
		        ( !empty( $img_set['one_column_blog_full']['h'] ) ? $img_set['one_column_blog_full']['h'] : 372 )),
		    'two_column_blog' => array( 
		        ( !empty( $img_set['two_column_blog_full']['w'] ) ? $img_set['two_column_blog_full']['w'] : 458 ),
		        ( !empty( $img_set['two_column_blog_full']['h'] ) ? $img_set['two_column_blog_full']['h'] : 176 )),
		    'three_column_blog' => array( 
		        ( !empty( $img_set['three_column_blog_full']['w'] ) ? $img_set['three_column_blog_full']['w'] : 288 ),
		        ( !empty( $img_set['three_column_blog_full']['h'] ) ? $img_set['three_column_blog_full']['h'] : 110 )),
		    'four_column_blog' => array( 
		        ( !empty( $img_set['four_column_blog_full']['w'] ) ? $img_set['four_column_blog_full']['w'] : 203 ),
		        ( !empty( $img_set['four_column_blog_full']['h'] ) ? $img_set['four_column_blog_full']['h'] : 78 )),

		    'small_post_list' => array( 
		        ( !empty( $img_set['small_post_list_full']['w'] ) ? $img_set['small_post_list_full']['w'] : 50 ),
		        ( !empty( $img_set['small_post_list_full']['h'] ) ? $img_set['small_post_list_full']['h'] : 50 )),
		    'medium_post_list' => array( 
		        ( !empty( $img_set['medium_post_list_full']['w'] ) ? $img_set['medium_post_list_full']['w'] : 200 ),
		        ( !empty( $img_set['medium_post_list_full']['h'] ) ? $img_set['medium_post_list_full']['h'] : 200 )),
		    'large_post_list' => array( 
		        ( !empty( $img_set['large_post_list_full']['w'] ) ? $img_set['large_post_list_full']['w'] : 628 ),
		        ( !empty( $img_set['large_post_list_full']['h'] ) ? $img_set['large_post_list_full']['h'] : 390 )),

		    'portfolio_single_full' => array( 
		        ( !empty( $img_set['portfolio_single_full_full']['w'] ) ? $img_set['portfolio_single_full_full']['w'] : 968 ),
		        ( !empty( $img_set['portfolio_single_full_full']['h'] ) ? $img_set['portfolio_single_full_full']['h'] : 601 )),
		    'additional_posts_grid' => array( 
		        ( !empty( $img_set['additional_posts_grid_full']['w'] ) ? $img_set['additional_posts_grid_full']['w'] : 203 ),
		        ( !empty( $img_set['additional_posts_grid_full']['h'] ) ? $img_set['additional_posts_grid_full']['h'] : 126 )),

		);

		$big_sidebar_images = array(
		    'one_column_portfolio' => array( 
		        ( !empty( $img_set['one_column_portfolio_big']['w'] ) ? $img_set['one_column_portfolio_big']['w'] : 648 ),
		        ( !empty( $img_set['one_column_portfolio_big']['h'] ) ? $img_set['one_column_portfolio_big']['h'] : 402 )),
		    'two_column_portfolio' => array( 
		        ( !empty( $img_set['two_column_portfolio_big']['w'] ) ? $img_set['two_column_portfolio_big']['w'] : 304 ),
		        ( !empty( $img_set['two_column_portfolio_big']['h'] ) ? $img_set['two_column_portfolio_big']['h'] : 188 )),
		    'three_column_portfolio' => array( 
		        ( !empty( $img_set['three_column_portfolio_big']['w'] ) ? $img_set['three_column_portfolio_big']['w'] : 190 ),
		        ( !empty( $img_set['three_column_portfolio_big']['h'] ) ? $img_set['three_column_portfolio_big']['h'] : 118 )),
		    'four_column_portfolio' => array( 
		        ( !empty( $img_set['four_column_portfolio_big']['w'] ) ? $img_set['four_column_portfolio_big']['w'] : 133 ),
		        ( !empty( $img_set['four_column_portfolio_big']['h'] ) ? $img_set['four_column_portfolio_big']['h'] : 82 )),

		    'one_column_blog' => array( 
		        ( !empty( $img_set['one_column_blog_big']['w'] ) ? $img_set['one_column_blog_big']['w'] : 648 ),
		        ( !empty( $img_set['one_column_blog_big']['h'] ) ? $img_set['one_column_blog_big']['h'] : 249 )),
		    'two_column_blog' => array( 
		        ( !empty( $img_set['two_column_blog_big']['w'] ) ? $img_set['two_column_blog_big']['w'] : 304 ),
		        ( !empty( $img_set['two_column_blog_big']['h'] ) ? $img_set['two_column_blog_big']['h'] : 116 )),
		    'three_column_blog' => array( 
		        ( !empty( $img_set['three_column_blog_big']['w'] ) ? $img_set['three_column_blog_big']['w'] : 190 ),
		        ( !empty( $img_set['three_column_blog_big']['h'] ) ? $img_set['three_column_blog_big']['h'] : 73 )),
		    'four_column_blog' => array( 
		        ( !empty( $img_set['four_column_blog_big']['w'] ) ? $img_set['four_column_blog_big']['w'] : 133 ),
		        ( !empty( $img_set['four_column_blog_big']['h'] ) ? $img_set['four_column_blog_big']['h'] : 51 )),

		    'small_post_list' => array( 
		        ( !empty( $img_set['small_post_list_big']['w'] ) ? $img_set['small_post_list_big']['w'] : 50 ),
		        ( !empty( $img_set['small_post_list_big']['h'] ) ? $img_set['small_post_list_big']['h'] : 50 )),
		    'medium_post_list' => array( 
		        ( !empty( $img_set['medium_post_list_big']['w'] ) ? $img_set['medium_post_list_big']['w'] : 200 ),
		        ( !empty( $img_set['medium_post_list_big']['h'] ) ? $img_set['medium_post_list_big']['h'] : 200 )),
		    'large_post_list' => array( 
		        ( !empty( $img_set['large_post_list_big']['w'] ) ? $img_set['large_post_list_big']['w'] : 419 ),
		        ( !empty( $img_set['large_post_list_big']['h'] ) ? $img_set['large_post_list_big']['h'] : 260 )),

		    'portfolio_single_full' => array( 
		        ( !empty( $img_set['portfolio_single_full_big']['w'] ) ? $img_set['portfolio_single_full_big']['w'] : 648 ),
		        ( !empty( $img_set['portfolio_single_full_big']['h'] ) ? $img_set['portfolio_single_full_big']['h'] : 402 )),
		    'additional_posts_grid' => array( 
		        ( !empty( $img_set['additional_posts_grid_big']['w'] ) ? $img_set['additional_posts_grid_big']['w'] : 145 ),
		        ( !empty( $img_set['additional_posts_grid_big']['h'] ) ? $img_set['additional_posts_grid_big']['h'] : 90 )),

		);

		$small_sidebar_images = array(
		    'one_column_portfolio' => array( 
		        ( !empty( $img_set['one_column_portfolio_small']['w'] ) ? $img_set['one_column_portfolio_small']['w'] : 688 ),
		        ( !empty( $img_set['one_column_portfolio_small']['h'] ) ? $img_set['one_column_portfolio_small']['h'] : 427 )),
		    'two_column_portfolio' => array( 
		        ( !empty( $img_set['two_column_portfolio_small']['w'] ) ? $img_set['two_column_portfolio_small']['w'] : 324 ),
		        ( !empty( $img_set['two_column_portfolio_small']['h'] ) ? $img_set['two_column_portfolio_small']['h'] : 201 )),
		    'three_column_portfolio' => array( 
		        ( !empty( $img_set['three_column_portfolio_small']['w'] ) ? $img_set['three_column_portfolio_small']['w'] : 202 ),
		        ( !empty( $img_set['three_column_portfolio_small']['h'] ) ? $img_set['three_column_portfolio_small']['h'] : 125 )),
		    'four_column_portfolio' => array( 
		        ( !empty( $img_set['four_column_portfolio_small']['w'] ) ? $img_set['four_column_portfolio_small']['w'] : 142 ),
		        ( !empty( $img_set['four_column_portfolio_small']['h'] ) ? $img_set['four_column_portfolio_small']['h'] : 88 )),

		    'one_column_blog' => array( 
		        ( !empty( $img_set['one_column_blog_small']['w'] ) ? $img_set['one_column_blog_small']['w'] : 688 ),
		        ( !empty( $img_set['one_column_blog_small']['h'] ) ? $img_set['one_column_blog_small']['h'] : 264 )),
		    'two_column_blog' => array( 
		        ( !empty( $img_set['two_column_blog_small']['w'] ) ? $img_set['two_column_blog_small']['w'] : 324 ),
		        ( !empty( $img_set['two_column_blog_small']['h'] ) ? $img_set['two_column_blog_small']['h'] : 124 )),
		    'three_column_blog' => array( 
		        ( !empty( $img_set['three_column_blog_small']['w'] ) ? $img_set['three_column_blog_small']['w'] : 202 ),
		        ( !empty( $img_set['three_column_blog_small']['h'] ) ? $img_set['three_column_blog_small']['h'] : 77 )),
		    'four_column_blog' => array( 
		        ( !empty( $img_set['four_column_blog_small']['w'] ) ? $img_set['four_column_blog_small']['w'] : 142 ),
		        ( !empty( $img_set['four_column_blog_small']['h'] ) ? $img_set['four_column_blog_small']['h'] : 54 )),

		    'small_post_list' => array( 
		        ( !empty( $img_set['small_post_list_small']['w'] ) ? $img_set['small_post_list_small']['w'] : 50 ),
		        ( !empty( $img_set['small_post_list_small']['h'] ) ? $img_set['small_post_list_small']['h'] : 50 )),
		    'medium_post_list' => array( 
		        ( !empty( $img_set['medium_post_list_small']['w'] ) ? $img_set['medium_post_list_small']['w'] : 200 ),
		        ( !empty( $img_set['medium_post_list_small']['h'] ) ? $img_set['medium_post_list_small']['h'] : 200 )),
		    'large_post_list' => array( 
		        ( !empty( $img_set['large_post_list_small']['w'] ) ? $img_set['large_post_list_small']['w'] : 445 ),
		        ( !empty( $img_set['large_post_list_small']['h'] ) ? $img_set['large_post_list_small']['h'] : 276 )),

		    'portfolio_single_full' => array( 
		        ( !empty( $img_set['portfolio_single_full_small']['w'] ) ? $img_set['portfolio_single_full_small']['w'] : 688 ),
		        ( !empty( $img_set['portfolio_single_full_small']['h'] ) ? $img_set['portfolio_single_full_small']['h'] : 427 )),
		    'additional_posts_grid' => array( 
		        ( !empty( $img_set['additional_posts_grid_small']['w'] ) ? $img_set['additional_posts_grid_small']['w'] : 145 ),
		        ( !empty( $img_set['additional_posts_grid_small']['h'] ) ? $img_set['additional_posts_grid_small']['h'] : 90 )),

		);
		
		$additional_images = array(
		    'image_banner_intro' => array( 
		        ( !empty( $img_set['image_banner_intro_full']['w'] ) ? $img_set['image_banner_intro_full']['w'] : 1100 ),
		        ( !empty( $img_set['image_banner_intro_full']['h'] ) ? $img_set['image_banner_intro_full']['h'] : 400 )),
		);



		# Slider
		$images_slider = array(
			'nivo_slide' => array( 972, 392 ),
			'floating_slide' => array( 972, 392 ),
			'staged_slide' => array( 972, 392 ),
			'partial_staged_slide' => array( 592, 392 ),
			'partial_gradient_slide' => array( 572, 392 ),
			'overlay_slide' => array( 972, 392 ),
			'full_slide' => array( 980, 470 ),
			'nav_thumbs' => array( 34, 34 )
		);
		
		foreach( $images as $key => $value ) {
			foreach( $value as $img => $size ) {
				$size = str_replace( ' ', '', $size );
				$new_size[$img] = str_replace( 'px', '', $size );
			}
			$images[$key] = $new_size;
		}

		foreach( $big_sidebar_images as $key => $value ) {
			foreach( $value as $img => $size ) {
				$size = str_replace( ' ', '', $size );
				$new_size[$img] = str_replace( 'px', '', $size );
			}
			$big_sidebar_images[$key] = $new_size;
		}

		foreach( $small_sidebar_images as $key => $value ) {
			foreach( $value as $img => $size ) {
				$size = str_replace( ' ', '', $size );
				$new_size[$img] = str_replace( 'px', '', $size );
			}
			$small_sidebar_images[$key] = $new_size;
		}
		
		foreach( $additional_images as $key => $value ) {
			foreach( $value as $img => $size ) {
				$size = str_replace( ' ', '', $size );
				$new_size[$img] = str_replace( 'px', '', $size );
			}
			$additional_images[$key] = $new_size;
		}
		
		# Blog layouts
		switch( $blog_layout ) {
			case "blog_layout1":
				$layout = array(
					'blog_layout' => $blog_layout,
					'main_class' => 'post_grid blog_layout1',
					'post_class' => 'post_grid_module',
					'content_class' => 'post_grid_content',
					'img_class' => 'post_grid_image'
				);
				break;
			case "blog_layout2":
				$layout = array(
					'blog_layout' => $blog_layout,
					'main_class' => 'post_list blog_layout2',
					'post_class' => 'post_list_module',
					'content_class' => 'post_list_content',
					'img_class' => 'post_list_image'
				);
				break;
			case "blog_layout3":
				$columns_num = 2;
				$featured = ( is_archive() || is_search() ) ? false : 1;
				$columns = ( $columns_num == 2 ? 'one_half'
				: ( $columns_num == 3 ? 'one_third'
				: ( $columns_num == 4 ? 'one_fourth'
				: ( $columns_num == 5 ? 'one_fifth'
				: ( $columns_num == 6 ? 'one_sixth'
				: ''
				)))));

				$layout = array(
					'blog_layout' => $blog_layout,
					'main_class' => 'post_grid blog_layout3',
					'post_class' => 'post_grid_module',
					'content_class' => 'post_grid_content',
					'img_class' => 'post_grid_image',
					'columns_num' => ( !empty( $columns_num ) ? $columns_num : '' ),
					'featured' => ( !empty( $featured ) ? $featured : '' ),
					'columns' => ( !empty( $columns ) ? $columns : '' )
				);
				break;
		}

		$mysite->layout['blog'] = $layout;
		$mysite->layout['images'] = array_merge( $images, array( 'image_padding' => 12 ) );
		$mysite->layout['big_sidebar_images'] = $big_sidebar_images;
		$mysite->layout['small_sidebar_images'] = $small_sidebar_images;
		$mysite->layout['additional_images'] = $additional_images;
		$mysite->layout['images_slider'] = $images_slider;
	}
		
}

/**
 * Functions & Pluggable functions specific to theme.
 *
 * @package Mysitemyway
 * @subpackage Persuasion
 */

if ( !function_exists( 'mysite_read_more' ) ) :
/**
 *
 */
function mysite_read_more( $args = array() ) {
	global $post;
	$out = '<a class="post_more_link" href="' . get_permalink( $post->ID ) . '">' . __( 'Read More', MYSITE_TEXTDOMAIN ) . ' →</a>';
	return $out;
}
endif;

if ( !function_exists( 'mysite_additional_posts_title' ) ) :
/**
 *
 */
function mysite_additional_posts_title() {
	$out = '<h6 class="additional_posts_title"><span>' . __( 'Popular <span class="fancy_amp">&</span> Related Posts', MYSITE_TEXTDOMAIN ) . '</span></h6>';
	return $out;
}
endif;

if ( !function_exists( 'mysite_comments_title' ) ) :
/**
 *
 */
function mysite_comments_title( $title, $args ) {
	extract( $args );
	
	$out = '<h6 id="comments-title"><span>' . sprintf( _n( '1 Comment', '%1$s Comments', $comments_number, MYSITE_TEXTDOMAIN ), number_format_i18n( $comments_number ), $title ) . '</span></h6>';
	return $out;
}
endif;

if ( !function_exists( 'mysite_post_meta' ) ) :
/**
 *
 */
function mysite_post_meta( $args = array() ) {
	$defaults = array(
		'shortcode' => false,
		'echo' => true
	);
	
	$args = wp_parse_args( $args, $defaults );
	
	extract( $args );
	
	if( is_page() && !$shortcode ) return;
	
	$out = '';
	$meta_options = mysite_get_setting( 'disable_meta_options' );
	$_meta = ( is_array( $meta_options ) ) ? $meta_options : array();
	$meta_output = '';
	
	if( !in_array( 'date_meta', $_meta ) )
		$meta_output .= '[post_date] ';
		
	if( !in_array( 'comments_meta', $_meta ) )
		$meta_output .= '[post_comments text="' . __( '<em>With:</em>', MYSITE_TEXTDOMAIN ) . ' "] ';
		 
	if( !in_array( 'author_meta', $_meta ) )
		$meta_output .= '[post_author]';
	
	if( !empty( $meta_output ) )
		$out .='<p class="post_meta">' . $meta_output . '</p>';
	
	if( $echo )
		echo apply_atomic_shortcode( 'post_meta', $out );
	else
		return apply_atomic_shortcode( 'post_meta', $out );
}
endif;


if ( !function_exists( 'mysite_about_author' ) ) :
/**
 *
 */
function mysite_about_author() {
	$disable_post_author = apply_atomic( 'disable_post_author', mysite_get_setting( 'disable_post_author' ) );
	if( !is_singular( 'post' ) || !empty( $disable_post_author ) )
		return;
		
	$out = '';
	
	if( get_the_author_meta( 'description' ) ) {
		$out .= '<div class="about_author_module">';
		$out .= '<h6 class="about_author_title"><span>' . __( 'About Author', MYSITE_TEXTDOMAIN ) . '</span></h6>';
		$out .= '<div class="about_author_content">';
		
		$out .= get_avatar( get_the_author_meta('user_email'), apply_filters( 'mysite_author_avatar_size', '80' ), THEME_IMAGES_ASSETS . '/author_gravatar_default.png' );
		$out .= '<p class="author_bio"><span class="author_name">' . esc_attr(get_the_author()) . '</span>' . get_the_author_meta( 'description' );
		$out .= '[fancy_link link="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '"]' . sprintf( __( 'View all posts by %s', MYSITE_TEXTDOMAIN ), get_the_author() ) . '[/fancy_link]';
		$out .= '</p><!-- .author_bio -->';
		
		$out .= '<div class="clearboth"></div>';
		$out .= '</div><!-- .about_author_content -->';
		$out .= '</div><!-- .about_author_module -->';
	}
	
	echo apply_atomic_shortcode( 'about_author', $out );
}
endif;

if ( !function_exists( 'mysite_popular_posts' ) ) :
/**
 *
 */
function mysite_popular_posts( $args = array() ) {
	global $post;
	
	$out = '';
	
	extract( $args );

	$popular_query = new WP_Query(array(
		'showposts' => $showposts, 
		'nopaging' => 0, 
		'orderby'=> 'comment_count', 
		'post_status' => 'publish',
		'category__not_in' => array( mysite_exclude_category_string( $minus = false ) ),
		'ignore_sticky_posts' => 1
	));
	
	if ( $popular_query->have_posts() ) {
		
		global $mysite;
		$img_sizes = ( $module == 'column' ) ? 'small_post_list' : 'additional_posts_grid';
		$_layout = get_post_meta( $post->ID, '_layout', true );
		$img_layout = ( $_layout == 'full_width' ? 'images'
		: ( $_layout == 'left_sidebar'
		? 'small_sidebar_images' : 'big_sidebar_images' ) );
		
		$out .= ( $module == 'column' ? '<ul class="post_list small_post_list">'
		: '<div class="post_grid four_column_blog">'
		);
		
		$i=1;
		while ( $popular_query->have_posts() ) {
			$popular_query->the_post();
			
			$out .= ( $module == 'column' ? '<li class="post_list_module">'
			: '<div class="' . ( $i%$showposts == 0 ? 'one_fourth last'
			: 'one_fourth' ) . '">'
			);
			
			$out .= ( $module == 'tab' ? '<div class="post_grid_module">' : '' );
			
			$out .= mysite_get_post_image(array(
				'width' => $mysite->layout[$img_layout][$img_sizes][0],
				'height' => $mysite->layout[$img_layout][$img_sizes][1],
				'img_class' => ( $module == 'tab' ? 'post_grid_image' : 'post_list_image' ),
				'preload' => false,
				'link_to' => get_permalink(),
				'prettyphoto' => false,
				'placeholder' => true,
				'echo' => false,
				'wp_resize' => ( mysite_get_setting( 'image_resize_type' ) == 'wordpress' ? true : false )
			));
			
			$out .= ( $module == 'column' ? '<div class="post_list_content">' : '' );
			
			if( $module == 'column' )
				$out .= the_title( '<p class="post_title"><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">', '</a></p>', false );
			
			$out .= ( $module == 'column' ? '<p class="post_meta">' . apply_filters( 'mysite_widget_meta', do_shortcode( '[post_date]' ) ) . '</p>' : '' );
			$out .= ( $module == 'column' ? '</div>' : '' );
			
			$out .= ( $module == 'column' ? '</li>' : '</div></div>' );
			
			$i++;
		}
		
		$out .= ( $module == 'column' ? '</ul>' : '</div>' );
	}
	
	wp_reset_postdata();
	
	if ( !empty( $out ) )
		return $out;
	else
		return false;
}
endif;

if ( !function_exists( 'mysite_related_posts' ) ) :
/**
 *
 */
function mysite_related_posts( $args = array() ) {
	global $post;
	$backup = $post;
	
	$out = '';
	
	extract( $args );
	
	$tags = wp_get_post_tags( $post->ID );
	$tagIDs = array();
	$related_post_found = false;
	
	if ( $tags ) {
		$tagcount = count( $tags );
		for ($i = 0; $i < $tagcount; $i++) {
			$tagIDs[$i] = $tags[$i]->term_id;
		}
		$related_query = new WP_Query(array(
			'tag__in' => $tagIDs,
			'post__not_in' => array( $post->ID ),
			'showposts'=>$showposts,
			'category__not_in' => array( mysite_exclude_category_string( $minus = false ) ),
			'ignore_sticky_posts' => 1
		));
		
		if( $related_query->have_posts() )
			$related_post_found = true;
	}
	
	if( !$related_post_found )
		$related_query = new WP_Query(array( 'showposts' => $showposts,
			'nopaging' => 0,
			'post_status' => 'publish',
			'category__not_in' => array( mysite_exclude_category_string( $minus = false ) ),
			'ignore_sticky_posts' => 1
		));
		
	if ( $related_query->have_posts() ) {
		
		global $mysite;
		$img_sizes = ( $module == 'column' ) ? 'small_post_list' : 'additional_posts_grid';
		$_layout = get_post_meta( $post->ID, '_layout', true );
		$img_layout = ( $_layout == 'full_width' ? 'images'
		: ( $_layout == 'left_sidebar'
		? 'small_sidebar_images' : 'big_sidebar_images' ) );

		$out .= ( $module == 'column' ? '<ul class="post_list small_post_list">'
		: '<div class="post_grid four_column_blog">'
		);
		
		$i=1;
		while ( $related_query->have_posts() ) {
			$related_query->the_post();

			$out .= ( $module == 'column' ? '<li class="post_list_module">'
			: '<div class="' . ( $i%$showposts == 0 ? 'one_fourth last'
			: 'one_fourth' ) . '">'
			);

			$out .= ( $module == 'tab' ? '<div class="post_grid_module">' : '' );
			$out .= mysite_get_post_image(array(
				'width' => $mysite->layout[$img_layout][$img_sizes][0],
				'height' => $mysite->layout[$img_layout][$img_sizes][1],
				'img_class' => ( $module == 'tab' ? 'post_grid_image' : 'post_list_image' ),
				'preload' => false,
				'link_to' => get_permalink(),
				'prettyphoto' => false,
				'placeholder' => true,
				'echo' => false,
				'wp_resize' => ( mysite_get_setting( 'image_resize_type' ) == 'wordpress' ? true : false )
			));
			
			$out .= ( $module == 'column' ? '<div class="post_list_content">' : '' );

			if( $module == 'column' )
				$out .= the_title( '<p class="post_title"><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">', '</a></p>', false );

			$out .= ( $module == 'column' ? '<p class="post_meta">' . apply_filters( 'mysite_widget_meta', do_shortcode( '[post_date]' ) ) . '</p>' : '' );
			$out .= ( $module == 'column' ? '</div>' : '' );
			
			$out .= ( $module == 'column' ? '</li>' : '</div></div>' );

			$i++;
		}

		$out .= ( $module == 'column' ? '</ul>' : '</div>' );
	}
	
	$post = $backup;
	wp_reset_postdata();

	if ( !empty( $out ) )
		return $out;
	else
		return false;
}
endif;

if ( !function_exists( 'mysite_addtional_post_dependencies' ) ) :
/**
 *
 */
function mysite_addtional_post_dependencies() {
	if( is_page() || is_archive() || is_search() || is_404() || mysite_get_setting( 'post_like_module' ) != 'tab' )
		return;
	
	wp_enqueue_script( MYSITE_PREFIX . '_cluetip' );
}
endif;

if ( !function_exists( 'mysite_addtional_post_tooltip' ) ) :
/**
 *
 */
function mysite_addtional_post_tooltip() {
	
	if( mysite_get_setting( 'post_like_module' ) != 'tab' )
		return;
		
	global $post;
		
	$_layout = get_post_meta( $post->ID, '_layout', true );
	$leftOffset[0] = -176;
	$leftOffset[1] = -20;
	
	if( $_layout == 'full_width' ) {
	    $leftOffset[0] -= 34;
	    $leftOffset[1] += 28;
	}
	
	$out = "<script type=\"text/javascript\">
	/* <![CDATA[ */ 
	jQuery(document).ready(function() {
		jQuery('.post_grid_module .post_grid_image a').each(function(i) {
			_title = this.title;
			jQuery(this).attr('title','|' +_title.replace('|', '') );
			jQuery(this).cluetip({width: 195, positionBy: 'fixed', topOffset: 20, leftOffset: {$leftOffset[0]}, arrows: true, splitTitle: '|', showTitle: false, dropShadow: false, waitImage :false,
				onShow: function(e) {
					jQuery(this).children().eq(0).attr('title','');
					jQuery('#cluetip-close').css('display','none');
					jQuery('#cluetip').attr('class','ui-widget ui-widget-content ui-cluetip clue-bottom-minimal cluetip-minimal');
					jQuery('#cluetip-arrows').css('top','-17px');
				},
				fx: { open: 'fadeIn', openSpeed: 'fast' }
			});
		});
	});
	
	jQuery('.blog_tabs a').click(function(){
		jQuery('.post_grid_image a').each(function(i) {
			_title = this.title;
			jQuery(this).attr('title','|' +_title.replace('|', '') );
			jQuery(this).cluetip({width: 195, positionBy: 'fixed', topOffset: 21, leftOffset: {$leftOffset[1]}, arrows: true, splitTitle: '|', showTitle: false, dropShadow: false, waitImage :false,
				onShow: function(e) {
					jQuery(this).children().eq(0).attr('title','');
					jQuery('#cluetip-close').css('display','none');
					jQuery('#cluetip').attr('class','ui-widget ui-widget-content ui-cluetip clue-bottom-minimal cluetip-minimal');
					jQuery('#cluetip-arrows').css('top','-17px');
				},
				fx: { open: 'fadeIn', openSpeed: 'fast' }
			});
		});
	});
	/* ]]> */
	</script>";
	
	echo preg_replace( "/(\r\n|\r|\n)\s*/i", '', $out );
}
endif;
	
?>