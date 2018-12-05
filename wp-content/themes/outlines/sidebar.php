<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package outlines
 * @since outlines 1.0
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php //get_template_part( 'inc/search-form'); ?>
			<aside class="widget">
				<?php include('inc/search-form.php'); ?>
			</aside>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<?php endif; // end sidebar widget area ?>
			
		</div><!-- #secondary .widget-area -->
