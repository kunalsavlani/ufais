<style type="text/css">
	form textarea.input-textarea { width: 100% !important; height: 200px !important; }
</style>
<?php


$keys = $design_settings_settings->keys;
$data = $design_settings_settings->data;


	
// SLIDE SHOW SETUP
if ( $design_settings_settings->navigation == 'slideshow') :

	// Set up the navigation
	if (!($navtext = $design_settings_settings->get_val('label'))) $navtext = __('Create new', THEME_NAME);
	$design_settings_settings->navigation_bar(array(__('Slide show', THEME_NAME) . ': ' . $navtext));
	

	echo '<p>' . __('Create a new slide show.', THEME_NAME) . '</p>';

	$form_link = array('navigation' => 'slideshows', 'action_keys' => $keys, 'action' => 'save');
	$design_settings_settings->settings_form_header($form_link);
	
	?>
	<table class="form-table">
	<?php
	
		$comment = __('This name is for reference only.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Title of slide show', THEME_NAME) . $required, $design_settings_settings->settings_input('label') . $comment);
		$design_settings_settings->setting_row($row);

		$comment = __('This ID can be used to add the slide show with a shortcode.', THEME_NAME);
		if ($val = $design_settings_settings->get_val('key')) {
			$comment .= ' ' . sprintf ( '<br />' . __('For example, you can use %s to include the slide show into a page.', THEME_NAME), '<code>[slideshow alias="' . $val . '"]</code>' ); 
		}
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('ID (unique identifier)', THEME_NAME) . $required, $design_settings_settings->settings_input('key') . $comment);
		$design_settings_settings->setting_row($row);

		$comment = __('Optional', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$comment2 = __('Leave this field blank to use the default value.', THEME_NAME);
		$comment2 = $design_settings_settings->format_comment($comment2);
		$row = array(__('Width', THEME_NAME) . $comment, $design_settings_settings->settings_input('width') . $comment2);
		$design_settings_settings->setting_row($row);

		$comment = __('Optional', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$comment2 = __('Leave this field blank to use the default value.', THEME_NAME);
		$comment2 = $design_settings_settings->format_comment($comment2);
		$row = array(__('Height', THEME_NAME) . $comment, $design_settings_settings->settings_input('height') . $comment2);
		$design_settings_settings->setting_row($row);

		$comment = __('The number of seconds between slides.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Timing', THEME_NAME), $design_settings_settings->settings_input('timing') . $comment);
		$design_settings_settings->setting_row($row);

		$transitions = array( 
			'fade' => 'fade',
			'scrollHorz' => 'scrollHorz',
			'scrollVert' => 'scrollVert',
			'shuffle' => 'shuffle',
			'blindY' => 'blindY',
			'blindZ' => 'blindZ',
			'cover' => 'cover',
			'curtainX' => 'curtainX',
			'curtainY' => 'curtainY',
			'fadeZoom' => 'fadeZoom',
			'growX' => 'growX',
			'growY' => 'growY',
			'scrollUp' => 'scrollUp',
			'scrollDown' => 'scrollDown',
			'scrollLeft' => 'scrollLeft',
			'scrollRight' => 'scrollRight',
			'slideX' => 'slideX',
			'slideY' => 'slideY',
			'toss' => 'toss',
			'turnUp' => 'turnUp',
			'turnDown' => 'turnDown',
			'turnLeft' => 'turnLeft',
			'turnRight' => 'turnRight',
			'uncover' => 'uncover',
			'wipe' => 'wipe',
			'zoom' => 'zoom',
			'none' => 'none'
		);
		$comment = __('Default transition used for slides. Can be set individually for each slide if desired.', THEME_NAME);
		$comment = '<em>' . $comment . '</em>';
		$row = array(__('Transition', THEME_NAME), $design_settings_settings->settings_select('transition', $transitions) . $comment);
		$design_settings_settings->setting_row($row);

		$comment = __('Optional. Speed of the transition effect in milliseconds. For example, enter 2000 for 2 seconds.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Transition speed', THEME_NAME), $design_settings_settings->settings_input('speed') . $comment);
		$design_settings_settings->setting_row($row);

		$comment = __('Only applies to 1 column slide shows. ', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Pause on hover', THEME_NAME), $design_settings_settings->settings_bool('pause_on_hover', $keys) . $comment);
		$design_settings_settings->setting_row($row);
		
		$field_set = array( 
			'1' => '1 (default)', 
			'2' => '2', 
			'3' => '3', 
			'4' => '4', 
			'5' => '5',
			'6' => '6'
		);
		$field_comments = array();
		$comment = __('The slide show supports multiple columns of images allowing you to select a different series of images for each column.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Columns', THEME_NAME) . $comment, $design_settings_settings->settings_radiobuttons('columns', $field_set, $field_comments));
		$design_settings_settings->setting_row($row);

	echo '</table>';
	echo $design_settings_settings->settings_hidden('slides_1');
	echo $design_settings_settings->settings_hidden('slides_2');
	echo $design_settings_settings->settings_hidden('slides_3');
	echo $design_settings_settings->settings_hidden('slides_4');
	echo $design_settings_settings->settings_hidden('slides_5');
	echo $design_settings_settings->settings_hidden('slides_6');
	

	if ($design_settings_settings->action != 'add') {

		// Slides
		//................................................................
	
		$titles = array(
					__('Slide', THEME_NAME), 
					__('Media', THEME_NAME),
					__('Transition', THEME_NAME),
					__('Actions', THEME_NAME)
				);

		$title = __('Slides', THEME_NAME);
		$caption = __('The slides for this slide show.', THEME_NAME);
		echo '<h3>' . $title . '</h3><p>' . $caption . '</p>';
		
		$ancestor_keys = array();
		$defaultTrans = 'Default (' . $design_settings_settings->get_val('transition') . ')';
		
		// Look up slides for each column
		$columns = $design_settings_settings->get_val('columns');
		for ($i=1; $i <= $columns; $i++) {
			
			// print the slides in this column
			echo '<h4>Column '. $i .'</h4>';
			$design_settings_settings->table_header($titles);
			
			$col = 'slides_'. $i;
			$nbr = 0;
			$slides = $design_settings_settings->get_val($col);
			if (!empty($slides)) {
				$slide_count = 1;
				foreach ((array) $slides as $key => $item) {
					$fieldKeys = $keys[0] .','. $keys[1] .','. $keys[2] .','. $col;
					$akeys = $fieldKeys .','. $key;
					$label = 'Slide ' . $slide_count;
					// $media
					if ($item['format'] == 'image' || $item['format'] == 'background-image' || $item['format'] == 'framed-image') {
						$media = '<img src="'. $item['media'] .'" width="200" height="60" />';
					} elseif ($item['format'] == 'video' || $item['format'] == 'framed-video') {
						$media = __('Video', THEME_NAME);
					} else {
						$media = __('Other', THEME_NAME);
					}
					$transition = (!$item['transition']) ? $defaultTrans : stripslashes($item['transition']);
					$edit_link = array('navigation' => 'slide', 'action' => 'edit', 'keys' => $akeys);
					$delete_link = array('navigation' => 'slideshow', 'action' => 'delete', 'action_keys' => $akeys, 'keys' => $keys, 'class' => 'more-common-delete');
		
					$row = array(	
							$design_settings_settings->settings_link($label, $edit_link) . $warning,
							$design_settings_settings->settings_link($media, $edit_link),
							$transition,
							$design_settings_settings->settings_link(__('Edit', THEME_NAME), $edit_link) . ' | ' .
							$design_settings_settings->settings_link(__('Delete', THEME_NAME), $delete_link) .
							$design_settings_settings->updown_link($nbr, count($slides), array('keys' => $keys, 'action_keys' => $fieldKeys ))
						);
					$design_settings_settings->table_row($row, $nbr++);
					$slide_count++;
				}
			} else {
				$row = array(__('No slides added.', THEME_NAME), '', '', '');
				$design_settings_settings->table_row($row, $nbr++);
			}

			?>
			</tbody>
				<tfoot>
					<tr>
					<th colspan="<?php echo count($titles); ?>">
					<?php
						$new_key = $keys[0] . ',' . $keys[1] . ',' . $keys[2] . ','. $col .','. $design_settings_settings->add_key;
						$options = array('action' => 'add', 'navigation' => 'slide', 'keys' => $new_key, 'class' => 'button');
						echo '<p>' . $design_settings_settings->settings_link('Add new Slide', $options) . '</p>';
					?>
					</th>
					</tr>
				</tfoot>
			</table>
			<?php
			
		} // end loop for each column



	} else {
	
		echo '<p>';
		_e('After saving these settings you can edit the slide show to add slides.', THEME_NAME);
		echo '</p>';
	}

	echo '<br />';

	// save button
	$design_settings_settings->settings_save_button(__('Save Slide Show', THEME_NAME), 'button-primary');	
	
	echo '<br /><br />';



else:	// ADDING (or editing) A SINGLE SLIDE



	// Set up the navigation
	$navtext = __('Edit slide', THEME_NAME);
	if ($design_settings_settings->action !== 'edit') $navtext = __('Create new slide', THEME_NAME);

	$parentSS = $design_settings_settings->get_val('label', array($keys[0], $keys[1], $keys[2]));
	$navurl = $design_settings_settings->settings_link($parentSS, array('keys' => $keys[0].','.$keys[1].','.$keys[2], 'navigation' => 'slideshow'));
	$design_settings_settings->navigation_bar(array($navurl, $navtext));

	
	echo '<p>' . __('Add a new slide.', THEME_NAME) . '</p>';

	$form_link = array('navigation' => 'slideshow', 'action_keys' => $keys, 'action' => 'save', 'keys' => array($keys[0], $keys[1], $keys[2]) );
	$design_settings_settings->settings_form_header($form_link);
	
	?>
	<table class="form-table">
	<?php
	
		$comment = __('The full path to an image or video. Leave empty to custom define slide layout in content area.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Media', THEME_NAME), $design_settings_settings->settings_input('media') . $comment);
		$design_settings_settings->setting_row($row);

		$comment = __('Optional. Make the slide link to a page, post or other website.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Link URL', THEME_NAME), $design_settings_settings->settings_input('link') . $comment);
		$design_settings_settings->setting_row($row);

		$comment = __('Open the link in a new window.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Open in new window', THEME_NAME), $design_settings_settings->settings_bool('target_blank', $keys) . $comment);
		$design_settings_settings->setting_row($row);

		$field_set = array( 
			'image' => 'Image only', 
			'video' => 'Video only', 
			'content' => 'Content only (custom)', 
			'background-image' => 'Content with background image', 
			'framed-image' => 'Content with framed image', 
			'framed-video' => 'Content with framed video'
		);
		$field_comments = array(
			'image' => 'Use the image entered in the "Media" field above as the only content for this slide.', 
			'video' => 'Display the video entered in the "Media" field above as the only content for this slide.', 
			'content' => 'Custom define the layout and content of your slide using the content area below.', 
			'background-image' => 'Use the image from the  "Media" field as a background for the content entered in the content area below.', 
			'framed-image' => 'Show a framed image (media field) to the left or right of my content.', 
			'framed-video' => 'Show a framed video (media field) to the left or right of my content.'
		);
		$comment = '<br />'. __('Define the layout to use for displaying your slide.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Slide format', THEME_NAME) . $required . $comment, $design_settings_settings->settings_radiobuttons('format', $field_set, $field_comments));
		$design_settings_settings->setting_row($row);

		$field_set = array( 
			'left' => 'Left', 
			'right' => 'Right'
		);
		$field_comments = array( );
		$comment = __('Only applies to slides using the framed media format.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Media position', THEME_NAME) . $comment, $design_settings_settings->settings_radiobuttons('position', $field_set, $field_comments));
		$design_settings_settings->setting_row($row);

		$transitions = array( 
			'' => '',
			'fade' => 'fade',
			'scrollHorz' => 'scrollHorz',
			'scrollVert' => 'scrollVert',
			'shuffle' => 'shuffle',
			'blindY' => 'blindY',
			'blindZ' => 'blindZ',
			'cover' => 'cover',
			'curtainX' => 'curtainX',
			'curtainY' => 'curtainY',
			'fadeZoom' => 'fadeZoom',
			'growX' => 'growX',
			'growY' => 'growY',
			'scrollUp' => 'scrollUp',
			'scrollDown' => 'scrollDown',
			'scrollLeft' => 'scrollLeft',
			'scrollRight' => 'scrollRight',
			'slideX' => 'slideX',
			'slideY' => 'slideY',
			'toss' => 'toss',
			'turnUp' => 'turnUp',
			'turnDown' => 'turnDown',
			'turnLeft' => 'turnLeft',
			'turnRight' => 'turnRight',
			'uncover' => 'uncover',
			'wipe' => 'wipe',
			'zoom' => 'zoom',
			'none' => 'none'
		);
		$comment = __('Optional. Custom transition for this slide.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Transition', THEME_NAME), $design_settings_settings->settings_select('transition', $transitions) . $comment);
		$design_settings_settings->setting_row($row);

		$comment = __('Add your own content to the slide. This may include any text or images you choose. HTML and shortcodes are allowed.', THEME_NAME);
		$comment = $design_settings_settings->format_comment($comment);
		$row = array(__('Slide content', THEME_NAME), $design_settings_settings->settings_textarea('content', $keys) . $comment);
		$design_settings_settings->setting_row($row);


	echo '</table>';

	// key for this data type is generated at random when adding new slides.
	echo '<input type="hidden" name="key" value="'. $design_settings_settings->get_val('key') .'" />'; // Normal way causes error --> $design_settings_settings->settings_hidden('index'); 

	// save button
	$design_settings_settings->settings_save_button(__('Save Slide', THEME_NAME), 'button-primary');	
	
	echo '<br /><br />';
	
endif;





























?>