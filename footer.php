<?php
if( class_exists( 'CSF' ) ) {
	$adiya 			= get_option( 'themeoptions' );
	
	$scroltop 		= $adiya['scroltop'];
	$copyright 		= $adiya['footer_copyright'];
	$language 		= $adiya['footer_language'];
	$footer_widget1 = $adiya['footer_widget1'];
	$footer_widget2 = $adiya['footer_widget2'];
	$footer_widget3 = $adiya['footer_widget3'];
}
else{
	$scroltop 		= true;
	$copyright 		= "© 2022 All Right Reserved by<a href='https://themeforest.net/user/theme_crazy/portfolio'>theme_crazy</a>";
	$language 		= "English / USD (US Dollar)";
	$footer_widget1 = true;
	$footer_widget2 = true;
	$footer_widget3 = true;
}
if((is_active_sidebar('fsidebar_1') && $footer_widget1) || (is_active_sidebar('fsidebar_2') && $footer_widget2) || (is_active_sidebar('fsidebar_3') && $footer_widget3)){$widgetchk = true;}
else{$widgetchk = false;}
?>
<!-- ==========>> Footer Section start Here <<========== -->
<footer class="footer footer__shape">
	<div class="container">
		<?php if($widgetchk):?>
		<div class="footer__wrapper padding-top padding-bottom">
			<div class="row g-5">
				<?php if(is_active_sidebar('fsidebar_1') && $footer_widget1){ ?>
				<div class="col-lg-4">
					<?php dynamic_sidebar('fsidebar_1'); ?>
				</div>
				<?php }?>
				<?php if( (is_active_sidebar('fsidebar_2') && $footer_widget2) || (is_active_sidebar('fsidebar_3') && $footer_widget3) ){ ?>
					<div class="col-lg-8">
						<div class="footer__link-group">
							<div class="row g-5">
								<?php if(is_active_sidebar('fsidebar_2') && $footer_widget2){ ?>
									<div class="col-md-6 col-sm-6">
										<?php dynamic_sidebar('fsidebar_2'); ?>
									</div>
								<?php }	?>
								<?php if(is_active_sidebar('fsidebar_3') && $footer_widget3){ ?>
									<div class="col-md-6 col-sm-6">
										<?php dynamic_sidebar('fsidebar_3'); ?>
									</div>
								<?php }	?>
							</div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>	
		<?php 
			endif;	
			if($copyright || $language):
		?>
			<div class="footer__copyright">
				<?php if($copyright):?>
				<p class="mb-0"><?php echo wp_kses( $copyright , adiya_expanded_alowed_tags()); ?></p>
				<?php 
					endif;
					if($language):
				?>
					<p><span><i class="fas fa-globe"></i></span> <?php echo esc_html($language);?></p>
				<?php endif;?>
			</div>
		<?php endif;?>
	</div>
</footer>
<!-- ==========>> Footer Section Ends Here <<========== -->
<?php if($scroltop):?>
<!-- scrollToTop start here -->
<a href="#" class="scrollToTop"><i class="fas fa-arrow-up"></i><span class="pluse_1"></span><span
		class="pluse_2"></span></a>
<!-- scrollToTop ending here -->
<?php
	endif;
	wp_footer();
?>
</body>
</html>