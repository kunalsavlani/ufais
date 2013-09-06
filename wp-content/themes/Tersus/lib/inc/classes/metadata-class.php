<?php 
/**
 * The template for displaying Post Meta Data
 *
 * @package WordPress
 */
 ?>
<ul>
    <li class="post-date">
        <div class="date-day"><?php the_time('d'); ?></div>
        <div class="date-year"><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time('M, Y'); ?></a></div>   
    </li>  
    <li class="post-format"><span></span></li>   
	<?php if($NV_authorname) { ?>
    <li><h6><?php _e('Created By:', 'NorthVantage' ); ?></h6></li>
    <li><?php echo get_the_author_meta('first_name') ." ". get_the_author_meta('last_name'); ?></li>
    <?php } ?>
	<li class="category-title"><h6><?php _e('Categories:', 'NorthVantage' ); ?></h6></li>
    <li class="category-list"><?php the_category(', ') ?></li>    
    <li class="comments-title"><h6><?php _e('Comments:', 'NorthVantage' ); ?></h6></li>
    <li class="comments-list"><?php comments_popup_link( __('No Comments', 'NorthVantage' ) .' ', '1 '. __('Comment', 'NorthVantage' ) . ' ', '% '. __('Comments', 'NorthVantage' )); ?></li>    
			<?php if(get_the_tags()!='') {?>
    <li class="tags-title"><h6><?php _e('Tags:', 'NorthVantage' ); ?></h6></li>
    <li class="tags-list"><?php the_tags('',', '); ?></li>
    <?php } ?>
    <li><?php edit_post_link(__('Edit', 'NorthVantage' ), '', ''); ?></li>
</ul>