<?php
get_header();
if( class_exists( 'CSF' ) ) {
	$adiya 		= get_option( 'themeoptions' );
	$title 			= $adiya['error_title'];
	$breadcrumb		= $adiya['error_breadcrumb'];
	$heading 		= $adiya['error_sheading'];
	$text 			= $adiya['error_stext'];
	$button 		= $adiya['error_hbtn'];
	$buttontxt	 	= $adiya['error_btntxt'];

	$background 	= $adiya['error_background'] ? $adiya['error_background']['url'] : get_template_directory_uri(). "/assets/images/header/07_header.jpg";
}
else{
	$title 			= '404 Error Page';
	$heading 		= '404';
	$breadcrumb		= true;
	$text 			= '';
	$button 		= true;
	$buttontxt	 	= 'Go Back To Homepage';
	
	$background 	= get_template_directory_uri(). "/assets/images/header/07_header.jpg";
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
<?php if( ( $heading || $text ) || ( $button || $buttontxt ) ): ?>
<!-- :: 404 Error Page -->
<section class="page-404-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<?php if($heading):?>
					<h2><?php echo esc_html($heading);?></h2>
				<?php 
					endif;
					if($text):
				?>
					<p><?php echo wp_kses( $text , adiya_expanded_alowed_tags()); ?></p>
				<?php 
					endif;
					if($button && $buttontxt):
				?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-1 btn-3"><?php echo esc_html($buttontxt);?></a>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>
<?php 
	endif;
	get_footer();
?>