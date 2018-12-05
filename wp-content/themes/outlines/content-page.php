<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package outlines
 * @since outlines 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if(is_page('member-directory')){ ?>
			<aside class="searchform-wrap compact">
			<h2>Search Member Directory</h2>
			<iframe id="srchform" src="<?php echo get_bloginfo('template_url'); ?>/page-search.html" width="260" height="30" border="0" frameborder="0" scrolling="no">
			</iframe>
			</aside>
		<?php }; ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'outlines' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'outlines' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
