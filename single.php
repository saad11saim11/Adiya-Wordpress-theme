<?php
get_header();
while(have_posts()): the_post();
if( class_exists( 'CSF' ) ) {
	$adiya 			= get_post_meta( get_the_ID(), 'blog_options', true );
	$title 			= $adiya['title'];
	$breadcrumb 	= $adiya['breadcrumb'];
	$sidebar 		= $adiya['sidebar'];
	$tag_show 		= $adiya['tags'];
	$cat_show 		= $adiya['categories'];
	
	$background 	= $adiya['background'] ? $adiya['background']['url'] : get_template_directory_uri(). "/assets/images/header/bg.png";
}
else{
	$title 			= 'Single Blog';
	$breadcrumb 	= true;
	$sidebar 		= true;
	$tag_show 		= true;
	$cat_show 		= true;
	$background 	= $adiya['background'] ? $adiya['background']['url'] : get_template_directory_uri(). "/assets/images/header/bg.png";
}
$categories = get_the_category();
$tags 		= get_the_tags();
if(is_active_sidebar('default_sidebar') && $sidebar){
	$check		= true ;
}
else{
	$check 		= false;
}

?>
<!-- ==========>> page Header Section start Here <<========== -->
<section class="page-header" style="background-image: url(<?php echo esc_url($background); ?>)">
	<div class="container">
		<div class="page-header__wrapper text-center">
			<h2><?php echo esc_html($title);?></h2>
			<?php if($breadcrumb){ adiya_breadcrumb(); }?>
		</div>
	</div>
</section>
<!-- ==========>> page Header Section Ends Here <<========== -->
<!-- =======================<< Blog-page start here >>======================== -->
<div class="blog-page padding-bottom padding-top">
	<div class="container">
		<div class="blog-page__wrapper">
			<div class="row g-5">
				<div class="col-lg-<?php echo esc_attr($check ? '8' : '12');?>">
					<article>
						<div class="news__item mb-5">
							<div class="news__item-inner">
								<div class="news__item-thumb">
									<img src="assets/images/blog/blog-single.jpg" alt="blog Images">
								</div>
								<div class="news__item-content">
									<ul class="news__tags d-flex flex-wrap">
										<li> <a href="#" class="news__tag-item color__theme-color">#Adiya</a>
										</li>
										<li> <a href="#" class="news__tag-item color__theme-color">#facial_spa</a>
										</li>
									</ul>
									<h4><a href="javascript:void(0);">Relaxation of your full body with hot
											stone</a> </h4>
									<ul class="news__meta mb-4 d-flex flex-wrap">
										<li class="news__author"> by <a href="#"
												class="color__theme-color">admin</a>
										</li>
										<li class="news__date">30 June 2022</li>
									</ul>
									<p>
										Sprawling across 9 acres, the most spacious, densely green residential
										development, designed for childhood. With wide
										open spaces to run free, wander, explore, learn and grow. “Give your
										children a childhood they’ll cherish forever.”
									</p>
									<p>Nestled between a lake and the east Kolkata wetlands, One10 is located in the
										prime neighborhood of Newtown, Action Area
										1. It features an Olympic length swimming pool with water slides, Nature
										Trail, Multi-sport Game Courts, Triple height
										Sports Arena, Centre for Extra-curricular activities, Montessori and
										Daycare.</p>
									<p>Nestled between a lake and the east Kolkata wetlands, One10 is located in the
										prime neighborhood of Newtown, Action Area
										1. It features an Olympic length swimming pool with water slides, Nature
										Trail, Multi-sport Game Courts, Triple height
										Sports Arena, Centre for Extra-curricular activities, Montessori and
										Daycare.</p>
									<blockquote>
										<p>Nestled between a lake and the east Kolkata wetlands, One10 is located in
											the prime neighborhood of Newtown, Action Area
											1. It features an Olympic length swimming pool with water slides, Nature
											Trail, Multi-sport Game Courts, Triple height
											Sports Arena.</p>
									</blockquote>
									<p>Nestled between a lake and the east Kolkata wetlands, One10 is located in the
										prime neighborhood of Newtown, Action Area
										1. It features an Olympic length swimming pool with water slides, Nature
										Trail, Multi-sport Game Courts, Triple height
										Sports Arena, Centre for Extra-curricular activities, Montessori and
										Daycare.</p>
								</div>
							</div>
						</div>

					</article>
					<div class="comment">
						<?php comments_template(); ?>
						<div class="comment__title">
							<h5>Leave a reply</h5>
						</div>
						<div class="comment__form">
							<form action="#">
								<input type="text" name="Name" placeholder="Name">
								<input type="email" name="Email" placeholder="Email">
								<input type="tel" name="Phone" placeholder="Phone">
								<textarea name="Comment" placeholder="Comment Here..."></textarea>
								<button class="default-btn" type="submit"><span>Post Comment</span> </button>
							</form>
						</div>
					</div>
				</div>
				<?php if($check): ?>
				<div class="col-lg-4">
					<aside>
						<div class="widget widget__search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search..." aria-label="Search"
									aria-describedby="button-search">
								<button class="btn btn-outline-secondary" type="button" id="button-search"><i
										class="fas fa-search"></i></button>
							</div>
						</div>
						<div class="widget">
							<div class="widget__title">
								<h5>Recent Posts</h5>
							</div>
							<div class="widget__content">
								<div class="widget__post-item">
									<div class="widget__post-thumb">
										<a href="blog-sinlge.html">
											<img src="assets/images/blog/thumb/01.jpg" alt="Blog Image">
										</a>
									</div>
									<div class="widget__post-content">
										<ul class="tag-list">
											<li><a href="#">#facial</a></li>
											<li><a href="#">#tips</a></li>
										</ul>
										<h6><a href="blog-single.html">
												Residential Developments
											</a></h6>
									</div>
								</div>
								<div class="widget__post-item">
									<div class="widget__post-thumb">
										<a href="blog-sinlge.html">
											<img src="assets/images/blog/thumb/02.jpg" alt="Blog Image">
										</a>
									</div>
									<div class="widget__post-content">
										<ul class="tag-list">
											<li><a href="#">#beauty</a></li>
											<li><a href="#">#home</a></li>
										</ul>
										<h6><a href="blog-single.html">
												Motivational Sayings Ten
												Great Ones
											</a></h6>
									</div>
								</div>
								<div class="widget__post-item">
									<div class="widget__post-thumb">
										<a href="blog-sinlge.html">
											<img src="assets/images/blog/thumb/03.jpg" alt="Blog Image">
										</a>
									</div>
									<div class="widget__post-content">
										<ul class="tag-list">
											<li><a href="#">#spa</a></li>
											<li><a href="#">#hair</a></li>
										</ul>
										<h6><a href="blog-single.html">
												Do You Think
												spa-beauty
											</a></h6>
									</div>
								</div>
							</div>
						</div>
						<div class="widget">
							<div class="widget__title">
								<h5>Categories</h5>
							</div>
							<div class="widget__content">
								<ul class="widget__link-list">
									<li class="widget__link-item"><a href="#"><i
												class="fas fa-angle-double-right"></i>
											Hot Stone</a></li>
									<li class="widget__link-item"><a href="#"><i
												class="fas fa-angle-double-right"></i>
											Body Message</a></li>
									<li class="widget__link-item"><a href="#"><i
												class="fas fa-angle-double-right"></i>
											Facial</a></li>
									<li class="widget__link-item"><a href="#"><i
												class="fas fa-angle-double-right"></i>
											Tips & Tricks</a></li>
									<li class="widget__link-item"><a href="#"><i
												class="fas fa-angle-double-right"></i>
											Hair Treatment</a></li>
								</ul>
							</div>
						</div>
						<div class="widget">
							<div class="widget__title">
								<h5>Archieve</h5>
							</div>
							<div class="widget__content">
								<ul class="widget__link-list">
									<li class="widget__link-item"><a href="#"> <i
												class="fas fa-angle-double-right"></i>
											March 2022</a></li>
									<li class="widget__link-item"><a href="#"> <i
												class="fas fa-angle-double-right"></i>
											April 2022</a></li>
									<li class="widget__link-item"><a href="#"> <i
												class="fas fa-angle-double-right"></i>
											May 2022</a></li>
									<li class="widget__link-item"><a href="#"> <i
												class="fas fa-angle-double-right"></i>
											Feb 2022</a></li>
									<li class="widget__link-item"><a href="#"><i
												class="fas fa-angle-double-right"></i>
											Jan 2022</a></li>

								</ul>
							</div>
						</div>
					</aside>
				</div>
				<?php endif;?>	
			</div>
		</div>
	</div>
</div>
<!-- =======================<< Blog-page end here >>======================== -->
<!-- :: Single Blog -->
<div class="single-blog-page py-100-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-<?php echo esc_attr($check ? '8' : '12');?>">
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
						<?php if($categories && $cat_show):?>
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
						<h5><?php the_title(); ?></h5>
						<?php 
							the_content(); 
							if($tags && $tag_show):?>
							<br><br>
							<ul class="blog-tags">
								<span><i class="fas fa-tag"></i><?php echo esc_html(' Tags :','adiya')?></span>
								<?php
									$i = 1;
									foreach((array)$tags as $tag) {
										if ($i <= 6 ){
											echo '<li><a href="'.get_tag_link($tag->term_id).'" >'. $tag->name . '</a></li>';
										}
											$i++;
									}
								?> 
							</ul>
						<?php 
							endif;
							if($share):
								if($adiya['social_share']):
									$socials = $adiya['social_share']['enabled'];
									$url	 = get_permalink ();
						?>
							<div class="share-post">
								<span><?php echo esc_html($adiya['sharetitle']);?></span>
								<?php 
									if (function_exists('adiya_socialshare')){
										adiya_socialshare($socials , $url);
									}
								?>
							</div>
						<?php endif;endif;?>
					</div>
				</div>
				<?php if($qoute_show):?>	
				<div class="quotes-people">
					<?php if($adiya['qoute']):?>
						<p><?php echo wp_kses( $adiya['qoute'] , adiya_expanded_alowed_tags()); ?></p>
					<?php 
						endif;
						if($adiya['name'] || $adiya['position'] ):
					?>
					<div class="people-name">
						<?php if($adiya['name'] ): ?>
						<h5><?php echo esc_html($adiya['name']);?></h5>
						<?php 
							endif;
							if($adiya['position'] ):
						?>
						<span><?php echo esc_html($adiya['position']);?></span>
						<?php endif;?>	
					</div>
					<?php endif;?>	
				</div>
				<?php 
					endif;
					comments_template(); 
				?>
			</div>
		<?php if($check): ?>
			<div class="col-lg-4">
				<div class="sidebar-blog ml-20">
					<?php dynamic_sidebar('default_sidebar'); ?>
				</div>
			</div>
		<?php endif;?>
		</div>
	</div>
</div>
<?php
	endwhile;
get_footer();
?>