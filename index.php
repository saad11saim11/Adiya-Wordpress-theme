<?php
get_header();
if( class_exists( 'CSF' ) ) {
	$gatedata 		= get_option( 'themeoptions' );
	
	$title 			= $gatedata['blog_title'];
	$breadcrumb 	= $gatedata['blog_breadcrumb'];
	
	$titles 		= $gatedata['blog_titles'];
	$background 	= $gatedata['blog_background']['url'] ? $gatedata['blog_background']['url'] : get_template_directory_uri(). "/assets/images/header/bg.png";
}
else{
	$title 			= "Latest Blogs";
	$breadcrumb 	= true;
	$titles 		= false;
	$background 	= get_template_directory_uri(). "/assets/images/header/bg.png";
}
?>
 <!-- ==========>> page Header Section start Here <<========== -->
<section class="page-header" style="background-image: url(<?php echo esc_url($background); ?>);background-size: cover;">
	<div class="container">
		<div class="page-header__wrapper text-center">
			<h2><?php echo esc_html($title);?></h2>
			<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
				aria-label="breadcrumb">
				<?php adiya_breadcrumb();?>
			</nav>
		</div>
	</div>
</section>
<!-- ==========>> page Header Section Ends Here <<========== -->


<!-- ==========>> Blog Section start Here <<========== -->
<section class="blog padding-bottom padding-top">
	<div class="container">
		<?php if($titles):?>
			<div class="section-header" data-aos="fade-up" data-aos-duration="1000">
				<?php if($gatedata['blog_sheading'] ):?>
				<h6><?php echo esc_html($gatedata['blog_sheading']);?></h6>
				<?php 
					endif;
					if($gatedata['blog_stitle'] ):
				?>
				<h3><?php echo esc_html($gatedata['blog_stitle']);?></h3>
				<?php 
					endif;
					if($gatedata['blog_sdesc'] ):
				?>
				<p><?php echo esc_html($gatedata['blog_sdesc']);?></p>
				<?php endif;?>
			</div>
		<?php endif;?>
		<div class="blog__wrapper">
			<div class="row justify-content-center gy-5 gx-4">
			<?php
				if(have_posts()){
					while(have_posts()): 
					the_post();
					$post_title = get_the_title();
					$categories = get_the_category();
			?>
				<div class="col-xl-4 col-md-6 col-sm-10">
					<div class="blog__item" data-aos="fade-up" data-aos-duration="1000">
						<div class="blog__inner">
							<?php  if( has_post_thumbnail() ): ?>
							<div class="blog__thumb">
								<?php the_post_thumbnail('adiya-336x339'); ?>
							</div>
							<?php endif;?>
							<div class="blog__content">
								<h4>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h4>
								<div class="blog__bottom">
									<div class="blog__date">
										<h3><?php the_time('j'); ?></h3>
										<p><?php the_time('M'); ?></p>
									</div>
									<p>
										<?php echo substr(strip_tags(get_the_content()) , 0 , 50); ?>
										<br>
										<a href="<?php the_permalink(); ?>"><span>
											<b><?php echo esc_html('Read More','gatedata'); ?></b>
											<svg xmlns="http://www.w3.org/2000/svg" width="18.469" height="13.046" viewBox="0 0 18.469 13.046">
												<path d="M5.3,0,4.109,1.186,8.6,5.676l-15.25,0v1.68L8.6,7.37l-4.49,4.49L5.3,13.046l6.523-6.523Z" transform="translate(6.651)" fill="#000"></path>
											</svg>
										</span></a>
									</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; }?>
			</div>
			<nav class="mt-5" aria-label="Page navigation example">
				<?php adiya_the_pagination(); ?>
			</nav>
		</div>
	</div>
</section>
<!-- ==========>> Blog Section Ends Here <<========== -->
<?php
get_footer();
?>