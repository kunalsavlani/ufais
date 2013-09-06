<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ) ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href=" <?php bloginfo( 'template_url' ); ?>/jQuery/jquery.tagsinput.css" />
		<?php wp_head(); // @see bp_head(); ?>
		
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/south-street/jquery-ui.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="https://dl.dropbox.com/u/15564/jQuery/jquery.tagsinput.min.js"></script>
	<script type="text/javascript">
		function onAddTag(tag) {
			alert("Added a tag: " + tag);
		}
		function onRemoveTag(tag) {
			alert("Removed a tag: " + tag);
		}
		
		$(function() {
			
			var available_tags = [ 
				"ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "C#", "Clojure", "COBOL","ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"
			];
			
						var available_skills = [ 
				"ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL","ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"
			];
			
			// See jQuery Autocomplete for the complete list of Autocomplete options
			// ( http://jqueryui.com/demos/autocomplete/ )
			$('#field_8').tagsInput({
			    autocomplete: {source: available_skills},
			});
			$('#field_9').tagsInput({
			    autocomplete: {source: available_tags},
			});
// Uncomment this line to see the callback functions in action
//			$('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag});		

// Uncomment this line to see an input with no interface for adding new tags.
//		$('input.tags').tagsInput({interactive:false});
		});
	
	</script>
	</head>

	<body <?php body_class() ?> id="bp-default">

		<?php do_action( 'bp_before_header' ); ?>

		<div id="header">
			<div id="search-bar" role="search">
				<div class="padder">
					<h1 id="logo" role="banner"><a href="<?php echo home_url(); ?>" title="<?php _ex( 'Home', 'Home page banner link title', 'buddypress' ); ?>"><?php bp_site_name(); ?></a></h1>

						<form action="<?php echo bp_search_form_action() ?>" method="post" id="search-form">
							<label for="search-terms" class="accessibly-hidden"><?php _e( 'Search for:', 'buddypress' ); ?></label>
							<input type="text" id="search-terms" name="search-terms" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : ''; ?>" />

							<?php echo bp_search_form_type_select(); ?>

							<input type="submit" name="search-submit" id="search-submit" value="<?php _e( 'Search', 'buddypress' ) ?>" />

							<?php wp_nonce_field( 'bp_search_form' ); ?>

						</form><!-- #search-form -->

				<?php do_action( 'bp_search_login_bar' ); ?>

				</div><!-- .padder -->
			</div><!-- #search-bar -->

		<div class="nav-wrap">
			<div id="navigation" role="navigation">
				
				<?php if ( bp_is_active( 'messages' ) && is_user_logged_in() ) : ?>
					<?php frisco_bp_message_get_notices(); /* Site wide notices to all users */ ?>
				<?php endif; ?>
				
				<?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'nav', 'theme_location' => 'primary', 'fallback_cb' => 'bp_dtheme_main_nav' ) ); ?>
				
			</div>
		</div>

			<?php do_action( 'bp_header' ) ?>

		</div><!-- #header -->

		<?php do_action( 'bp_after_header' ) ?>
		<?php do_action( 'bp_before_container' ) ?>

		<div id="container">
