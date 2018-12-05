<aside class='widget searchform-wrap'>
	<h2>Search Our Listings</h2>
	<form method="get" action="http://seiowarentals.com" class="searchform listing-search">

		<label for="location">Location</label>
		<?php outlines_custom_taxonomy_dropdown( 'location' ); ?>
		
		<label for="unit-type">Unit Type</label>
		<?php outlines_custom_taxonomy_dropdown( 'unit-type' ); ?>
		
		<label for="property-owner">Property Owner</label>
		<?php outlines_custom_taxonomy_dropdown( 'property-owner' ); ?>
		
		<div class="colwrap">
			<div class="col-first">
				<label for="bedrooms">Bedrooms</label>
				<?php outlines_custom_taxonomy_dropdown( 'bedrooms' ); ?>
			</div>
			<div class="col-last">
				<label for="bathrooms">Bathrooms</label>
				<?php outlines_custom_taxonomy_dropdown( 'bathrooms' ); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		<label for="price-range">Price Range</label>
		<?php outlines_custom_taxonomy_dropdown( 'price-range' ); ?>

		<label for="pets">Pets</label>
		<?php outlines_custom_taxonomy_dropdown( 'pets' ); ?>
		
		<input type="hidden" name="origin" value="search">
		
		<input type='submit' value='Search' />
	
	</form>
</aside>