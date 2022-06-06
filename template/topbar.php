<?php
	if (! function_exists('adiya_topbar') ) {
	function adiya_topbar(){
		if( class_exists( 'CSF' ) ) {
			$adiya 	= get_option( 'themeoptions' );
				$infos 		= $adiya['topbar_info'];
				$socials	= $adiya['topbar_social'];
				if($infos ||  $socials):
?>

	<!-- :: Top Navbar -->
	<div class="nav-top">
		<div class="container">
			<div class="nav-top-box d-flex align-items-center justify-content-between">
				<?php if($infos):?>
					<ul class="info">
						<?php 
							foreach($infos as $info):
								if($info['topbar_title'] || $info['topbar_txt'] ):
						?>
								<li>
									<span><?php echo esc_html($info['topbar_title']); ?></span> 
									<a href="<?php echo esc_url($info['topbar_lnk']['url']); ?>"><?php echo esc_html($info['topbar_txt']); ?></a>
								</li>
						<?php endif; endforeach;?>
					</ul>
				<?php 
					endif;
					if($socials):
				?>
					<ul class="icon-follow">
						<?php 
							foreach($socials as $social):
								if($social['topbar_sicon'] ):
									$link = $social['topbar_slnk']['url'] ? $social['topbar_slnk']['url'] : "#";
						?>
							<li>
								<a 
								   class="icon <?php echo esc_attr( $social['topbar_sidebar'] ? "menu-icon open" : '' ); ?> <?php echo esc_attr( $social['topbar_search'] ? "search-icon open" : '' ); ?>" 
								   href="<?php echo esc_url($link); ?>"
								>
									<i class="<?php echo esc_attr($social['topbar_sicon']); ?>"></i>
								</a>
							</li>
						<?php endif; endforeach;?>
					</ul>
				<?php endif;?>
			</div>
		</div>
	</div>
<?php endif; }}}?>