<?php
	if (! function_exists('adiya_sidebar') ) {
	function adiya_sidebar(){
		if( class_exists( 'CSF' ) ) {
			$adiya 	= get_option( 'themeoptions' );
			
			$logo 		= $adiya['side_logo'] ? $adiya['side_logo']['url'] : '' ;
		}
?>
<div class="menu-box">
	<div class="inner-menu">
		<?php if( $adiya['side_desc'] || $logo ): ?>
			<div class="website-info">
				<?php if( $logo ): ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img class="img-fluid" src="<?php echo esc_html($logo); ?>" alt="<?php echo esc_html('Logo','adiya')?>"></a>
				<?php 
					endif;
					if( $adiya['side_desc']):
				?>
					<p><?php echo wp_kses( $adiya['side_desc'] , adiya_expanded_alowed_tags()); ?></p>
				<?php endif;?>
			</div>
		<?php 
			endif;
			if( ( $adiya['side_ctitle'] || $adiya['side_phone_show'] ) || ( $adiya['side_madd_show'] || $adiya['side_vadd_show'] ) ) :
		?>
			<div class="contact-info">
				<?php if( $adiya['side_ctitle']): ?>
					<h4><?php echo esc_html($adiya['side_ctitle']); ?></h4>
				<?php 
					endif;
					if( $adiya['side_phone_show'] ):
						$infos = $adiya['side_cinfo'];
				?>
					<div class="contact-box">
						<i class="icon-call"></i>
						<div class="box">
							<?php 
								foreach($infos as $info):
									if($info['scon_title'] ):
										$link = $info['scon_lnk']['url'] ? $info['scon_lnk']['url'] : "#";
							?>
								<a class="phone" href="<?php echo esc_url($link); ?>"><?php echo esc_html($info['scon_title']); ?></a>
							<?php endif; endforeach;?>
						</div>
					</div>
				<?php 
					endif;
					if( $adiya['side_madd_show'] ):
						$mainfos = $adiya['side_maddinfo'];
				?>
					<div class="contact-box">
						<i class="icon-email"></i>
						<div class="box">
							<?php 
								foreach($mainfos as $info):
									if($info['smadd_title'] ):
										$link = $info['smadd_lnk']['url'] ? $info['smadd_lnk']['url'] : "#";
							?>
								<a class="mail" href="<?php echo esc_url($link); ?>"><?php echo esc_html($info['smadd_title']); ?></a>
							<?php endif; endforeach;?>
						</div>
					</div>
				<?php 
					endif;
					if( $adiya['side_vadd_show']):
					$sainfos = $adiya['side_vaddinfo'];
				?>
					<div class="contact-box">
						<i class="icon-location"></i>
						<div class="box">
							<?php 
								foreach($sainfos as $info):
									if($info['svadd_title'] ):
							?>
								<p><?php echo esc_html($info['svadd_title']); ?></p>
							<?php endif; endforeach;?>
						</div>
					</div>
				<?php endif;?>
			</div>
		<?php 
			endif;
			if( $adiya['side_socititle'] || $adiya['side_socials']  ):
		?>
			<div class="follow-us">
				<?php if( $adiya['side_socititle']): ?>
					<h4><?php echo esc_html($adiya['side_socititle']); ?></h4>
				<?php 
					endif;
					if( $adiya['side_socials']):
						$ssinfos = $adiya['side_socials'];
				?>
					<ul class="icon-follow">
						<?php 
							foreach($ssinfos as $info):
								if($info['side_socials_icon'] ):
									$link = $info['side_socials_lnk']['url'] ? $info['side_socials_lnk']['url'] : "#";
						?>
								<li><a href="<?php echo esc_url($link); ?>"><i class="<?php echo esc_attr($info['side_socials_icon']); ?>"></i></a></li>
						<?php endif; endforeach;?>
					</ul>
				<?php endif;?>
			</div>
		<?php endif;?>
		<span class="menu-box-icon exit"><i class="fas fa-times"></i></span>
	</div>
</div>
<?php }} ?>