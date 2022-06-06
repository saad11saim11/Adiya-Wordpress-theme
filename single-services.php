<?php
get_header();
while(have_posts()): the_post();
if( class_exists( 'CSF' ) ) {
	$adiya 		= get_post_meta( get_the_ID(), 'service_options', true );
	$title 			= $adiya['title'];
	$breadcrumb 	= $adiya['breadcrumb'];
	$sidebar 		= $adiya['sidebar'];
	
	$background 	= $adiya['background'] ? $adiya['background']['url'] : get_template_directory_uri(). "/assets/images/header/06_header.jpg";
}
else{
	$title 			= 'Services Details';
	$breadcrumb 	= true;
	$sidebar 		= true;
	$background 	= $adiya['background'] ? $adiya['background']['url'] : get_template_directory_uri(). "/assets/images/header/06_header.jpg";
}
if(is_active_sidebar('servicesidebar') && $sidebar){
	$check		= true ;
}
else{
	$check 		= false;
}
?>
<!-- :: Breadcrumb Header -->
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

<!-- :: Services Details -->
<div class="single-services py-100-70">
	<div class="container">
		<div class="row">
			<?php if($check): ?>
				<div class="col-md-4">
					<div class="sidebar-services mr-20">
						<?php dynamic_sidebar('servicesidebar'); ?>
					</div>
				</div>
			<?php endif;?>
			<div class="col-md-<?php echo esc_attr($check ? '8' : '12');?>">
				<div class="single-services-content-box">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	endwhile;
get_footer();
?>