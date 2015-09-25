<form role="search" method="get" id="searchform" class="searchform" action="http://studioviq.nl">
	<div>
		<!-- <label class="screen-reader-text" for="s">Search for:</label> -->
		<!-- <input type="text" value="" name="s" id="s"> -->
		<input type="text" name="s" id="search" class="search-field" value="<?php the_search_query(); ?>" placeholder="Zoek in blog" />
		<!-- <input type="submit" id="searchsubmit" value="Search"> -->
	</div>
</form>