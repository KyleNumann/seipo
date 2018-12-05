<?php
/**
 * @package outlines
 * @since outlines 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'View %s', 'outlines' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			</header><!-- .entry-header -->

			<div class="entry-summary">
			<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'View %s', 'outlines' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo(types_render_field("main-image", array("size"=>"medium"))); ?></a>
			
			<div class="meta-wrap">
				<?php

				// all you need to replace is 'your_taxonomy_name'
				$terms = wp_get_post_terms($post->ID,'location');
				$count = count($terms);
				if ( $count > 0 ){
					echo '<div class="location meta"><div class="colwrap"><div class="col-first"><b>Location</b></div><div class="col-last">';
					foreach ( $terms as $term ) {
					echo $term->name;
					}
					echo '</div><div class="clearfix"></div></div></div>';
				}?>
				
				<?php

				// all you need to replace is 'your_taxonomy_name'
				$terms = wp_get_post_terms($post->ID,'unit-type');
				$count = count($terms);
				if ( $count > 0 ){
					echo '<div class="unit-type meta"><div class="colwrap"><div class="col-first"><b>Unit Type</b></div><div class="col-last">';
					foreach ( $terms as $term ) {
					echo $term->name;
					}
					echo '</div><div class="clearfix"></div></div></div>';
				}?>
				<?php

				// all you need to replace is 'your_taxonomy_name'
				$terms = wp_get_post_terms($post->ID,'property-owner');
				$count = count($terms);
				if ( $count > 0 ){
					echo '<div class="owner meta"><div class="colwrap"><div class="col-first"><b>Owner</b></div><div class="col-last">';
					foreach ( $terms as $term ) {
					echo $term->name;
					}
					echo '</div><div class="clearfix"></div></div></div>';
				}?>
				<?php

				// all you need to replace is 'your_taxonomy_name'
				$terms = wp_get_post_terms($post->ID,'bedrooms');
				$count = count($terms);
				if ( $count > 0 ){
					echo '<div class="bedrooms meta"><div class="colwrap"><div class="col-first"><b>Bedrooms</b></div><div class="col-last">';
					foreach ( $terms as $term ) {
					echo $term->name;
					}
					echo '</div><div class="clearfix"></div></div></div>';
				}?>
				
				<div class="phone meta">
					<div class="colwrap">
						<div class="col-first"><b>Contact Phone</b></div>
						<div class="col-last">
							<?php echo(types_render_field("contact-phone", array())); ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<div class="price meta">
					<div class="colwrap">
						<div class="col-first"><b>Price</b></div>
						<div class="col-last">
							<?php echo(types_render_field("listing-price", array())); ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
				
			</div><!-- meta wrap -->
			</div><!-- .entry-summary -->

			<footer class="entry-meta">
			
			<?php edit_post_link( __( 'Edit', 'outlines' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</div><!-- art-wrap -->
</article><!-- #post-<?php the_ID(); ?> -->
