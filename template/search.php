<?php
if (! function_exists('adiya_search_pop') ) {
	function adiya_search_pop(){
		?>
		<!-- :: Search Box -->
		<div class="search-box">
			<form>
				<input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_html('Search Here.....','adiya')?>">
				<button type="submit"><i class="fas fa-search"></i></button>
			</form>
			<span class="search-box-icon exit"><i class="fas fa-times"></i></span>
		</div>
<?php
	}
}