<?php
get_header();
while(have_posts()): the_post();
if( class_exists( 'CSF' ) ) {
	$adiya 		= get_post_meta( get_the_ID(), 'page_options', true );
	$title 			= $adiya['title'];
	$breadcrumb 	= $adiya['breadcrumb'];
	$section 		= $adiya['hsection'];
	
	$background 	= $adiya['background'] ? $adiya['background']['url'] : get_template_directory_uri(). "/assets/images/header/06_header.jpg";
}
else{
	$title 			= get_the_title();
	$breadcrumb 	= true;
	$section 		= true;
	$background 	= $adiya['background'] ? $adiya['background']['url'] : get_template_directory_uri(). "/assets/images/header/06_header.jpg";
}
if($section):
?>
	<section class="breadcrumb-header" id="page" style="background-image: url(<?php echo esc_url($background); ?>)">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="banner">
						<h1><?php echo esc_html($title);?></h1>
						<?php if($breadcrumb){ adiya_breadcrumb(); }?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php 
	endif;
	the_content();
?>
<div class="row">
	<div class="col-md-12">
		<?php comments_template(); ?>
	</div>
	<div class="col-md-12">
		<div class="pagination-area">
			<?php wp_link_pages(); ?>
		</div>
	</div>
</div>
<?php
	endwhile;
get_footer();
?>