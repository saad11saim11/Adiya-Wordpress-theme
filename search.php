<?php
get_header();
if( class_exists( 'CSF' ) ) {
	$adiya 		= get_option( 'themeoptions' );
	$breadcrumb 	= $adiya['search_breadcrumb'];
	$bsidebar 		= $adiya['search_sidebar'];
	$titles 		= $adiya['search_titles'];
	$column 		= $adiya['search_column'];
	$background 	= $adiya['search_background'] ? $adiya['search_background']['url'] : get_template_directory_uri(). "/assets/images/header/07_header.jpg";
	$padding 		= $adiya['search_breadcrumb_padding'];
}
else{
	$breadcrumb 	= true;
	$bsidebar 		= true;
	$titles 		= false;
	$column			= "option1";
	$padding		= true;
	$background 	= get_template_directory_uri(). "/assets/images/header/07_header.jpg";
}
	$title 			= esc_html(get_search_query());
?>
<section class="breadcrumb-header <?php echo esc_attr( $padding ? 'home-2' : '');?>" id="page" 
		 	style="background-image: url(<?php echo esc_url($background); ?>)">
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

<!-- :: Blog -->
<section class="blog-page py-100">
	<div class="container">
		<?php if($titles):?>
		<div class="sec-title home-3">
			<div class="row">
				<?php if( $adiya['search_sheading'] || $adiya['search_stitle']  ):?>
				<div class="col-lg-5">
					<?php if($adiya['search_sheading'] ):?>
						<h2><?php echo esc_html($adiya['search_sheading']);?></h2>
					<?php 
						endif;
						if($adiya['search_stitle'] ):
					?>
						<h3><?php echo esc_html($adiya['search_stitle']);?></h3>
					<?php endif;?>
				</div>
				<?php 
					endif;
					if( $adiya['search_sdesc'] ):
				?>
				<div class="col-lg-5 d-flex align-items-center">
					<p class="sec-explain"><?php echo wp_kses( $adiya['search_sdesc'] , adiya_expanded_alowed_tags()); ?></p>
				</div>
				<?php endif;?>
			</div>
		</div>
		<?php endif;?>
		<div class="row">
			<?php if(is_active_sidebar('default_sidebar') && $bsidebar){ ?>
			<div class="col-lg-8">
				<div class="row">
				<?php
					}
					if(have_posts()){
						while(have_posts()): 
						the_post();
						$post_title = get_the_title();
						$categories = get_the_category();
						$class = $column == "option3" ? "col-md-6 col-lg-4" : ( $column == "option2" ? "col-md-6" : "col-md-12") ;
				?>
					<div class="<?php echo esc_attr($class);?>">
						<div class="blog-item">
							<?php  if( has_post_thumbnail() ): ?>
								<div class="img-box">
									<a href="<?php the_permalink(); ?>" class="open-post">
										<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr('Post Image','adiya')?>">
									</a>
									<span class="blog-date"><?php the_time('j'); ?><br><?php the_time('M'); ?></span>
								</div>
							<?php endif;?>
							<div class="text-box">
								<?php if($categories):?>
								<ul class="blog-tags">
									<?php
										$i = 1;
										foreach((array)$categories as $cat) {
											if ($i <= 6 ){
												echo '<li><a href="'.get_category_link($cat->cat_ID).'" >'. $cat->cat_name . '</a></li>';
											}
												$i++;
										}
									?> 
								</ul>
								<?php endif;?>
								<a href="<?php the_permalink(); ?>" class="title-blog">
									<h5><?php the_title(); ?></h5>
								</a>
								<p><?php echo substr(strip_tags(get_the_content()) , 0 , 121); ?></p>
								<a href="<?php the_permalink(); ?>" class="link"><?php echo esc_html('Read More','adiya')?></a>
							</div>
						</div>
					</div>
					<?php
							endwhile;
						}
						if(is_active_sidebar('default_sidebar') && $bsidebar){ 
					?>
				</div>
			</div>
			<?php 
				}
				if(is_active_sidebar('default_sidebar') && $bsidebar){ 
			?>
			<div class="col-lg-4">
				<div class="sidebar-blog ml-20">
					<?php dynamic_sidebar('default_sidebar'); ?>
				</div>
			</div>
			<?php }	?>

			<div class="col-lg-12">
				<div class="pagination-area">
					<?php adiya_the_pagination(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
?>