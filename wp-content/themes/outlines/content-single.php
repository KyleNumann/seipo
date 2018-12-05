<?php
/**
 * @package outlines
 * @since outlines 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- <header class="entry-header">
		<h1 class="entry-title"><?php //the_title(); ?></h1>
	</header> .entry-header -->

	<div class="entry-content">
	<h1 class="listing-title"><?php the_title(); ?></h1>
		<div class="image-wrap">
			<div class="main-image">
				<a href="<?php echo(types_render_field("main-image", array("url"=>"true", "size"=>"large"))); ?>" rel="lightbox"><?php echo(types_render_field("main-image", array("size"=>"medium"))); ?></a>
			</div>
			<div class="additional-images">
				<div class="sub-image">
					<?php $imagetwo = types_render_field("second-image", array("url"=>"true", "size"=>"large"));
						if (!empty($imagetwo)) : ?>
					<a href="<?php echo $imagetwo; ?>" rel="lightbox"><?php echo(types_render_field("second-image", array("size"=>"thumbnail"))); ?></a>
					<?php  endif; ?>
				</div>
				<div class="sub-image">
					<?php $imagethree = types_render_field("third-image", array("url"=>"true", "size"=>"large"));
						if (!empty($imagethree)) : ?>
					<a href="<?php echo $imagethree; ?>" rel="lightbox"><?php echo(types_render_field("third-image", array("size"=>"thumbnail"))); ?></a>
					<?php  endif; ?>
				</div>
				<div class="sub-image">
					<?php $imagefour = types_render_field("fourth-image", array("url"=>"true", "size"=>"large"));
						if (!empty($imagefour)) : ?>
					<a href="<?php echo $imagefour; ?>" rel="lightbox"><?php echo(types_render_field("fourth-image", array("size"=>"thumbnail"))); ?></a>
					<?php  endif; ?>
				</div>
			</div>
		</div>
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
			<?php

			// all you need to replace is 'your_taxonomy_name'
			$terms = wp_get_post_terms($post->ID,'bathrooms');
			$count = count($terms);
			if ( $count > 0 ){
				echo '<div class="bathrooms meta"><div class="colwrap"><div class="col-first"><b>Bathrooms</b></div><div class="col-last">';
				foreach ( $terms as $term ) {
				echo $term->name;
				}
				echo '</div><div class="clearfix"></div></div></div>';
			}?>
			<?php
			// all you need to replace is 'your_taxonomy_name'
			$terms = wp_get_post_terms($post->ID,'pets');
			$count = count($terms);
			if ( $count > 0 ){
				echo '<div class="pets meta"><div class="colwrap"><div class="col-first"><b>Pets</b></div><div class="col-last">';
				foreach ( $terms as $term ) {
				echo $term->name;
				}
				echo '</div><div class="clearfix"></div></div></div>';
			}?>
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
		
		<div class="address">
			<h3>Contact</h3>
			<p><?php echo(types_render_field("contact-phone", array())); ?><br />
			<?php echo(types_render_field("contact-email", array())); ?></p>
		</div>
		<div class="description">
			<h3>Description</h3>
			<p><?php echo(types_render_field("description", array())); ?></p>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
