<?php
include_once( get_template_directory() . '/includes/loader.php');
add_action('after_setup_theme', 'adiya_theme_setup');

function adiya_preview_scripts() {

	$scripts = array(
					'adiya-bootstrap' => 'assets/js/bootstrap.bundle.min.js',
					'adiya-min' => 'assets/js/all.min.js',
					'adiya-swiper' => 'assets/js/swiper-bundle.min.js',
					'adiya-aos' => 'assets/js/aos.js',
					'adiya-purecounter' => 'assets/js/purecounter.js',
					'adiya-lightcase' => 'assets/js/lightcase.js',
					'adiya-custom' => 'assets/js/custom.js',
				);
	foreach( $scripts as $name => $js )
	{
		wp_register_script( $name, get_template_directory_uri().'/'.$js, '', '', true);
	}
	wp_enqueue_script( array(
					'jquery',
					'adiya-bootstrap',
					'adiya-min',
					'adiya-swiper',
					'adiya-aos',
					'adiya-purecounter',
					'adiya-lightcase',
					'adiya-custom',
				   )
				);
}
add_action( 'elementor/preview/enqueue_scripts', 'adiya_preview_scripts' );
add_action( 'elementor/frontend/before_register_scripts', 'adiya_preview_scripts' );

function adiya_preview_styles() {

	$styles = array(
				'adiya-bootstrap.min' => 'assets/css/bootstrap.min.css',
				'adiya-aos' => 'assets/css/aos.css',
				'adiya-allmin' => 'assets/css/all.min.css',
				'adiya-swiper' => 'assets/css/swiper-bundle.min.css',
				'adiya-lightcase.min' => 'assets/css/lightcase.css',
				'adiya-style' => 'assets/css/style.css',
				'adiya-inner-theme' => 'assets/css/theme.css',
				'adiya-theme-style'=>'style.css'
			 );
	foreach( $styles as $name => $style )
	{
		 wp_register_style( $name, get_template_directory_uri().'/'.$style);
	}
	foreach( $styles as $name => $style )
	{
		 wp_enqueue_style( $name );
	}

}
add_action( 'elementor/preview/enqueue_styles', 'adiya_preview_styles' );
add_action( 'elementor/frontend/before_enqueue_styles', 'adiya_preview_styles' );

function adiya_theme_setup()
{
	load_theme_textdomain('adiya', get_template_directory() . '/languages');

	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support( "custom-header");
	add_theme_support( "custom-background");
	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );

	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'header_menu' => esc_html__('Main Menu', 'adiya'),
			)
		);
	}
	
	if ( ! isset( $content_width ) ) 
	
		$content_width = 960;
		
		add_image_size( 'adiya-336x339' , 336, 339, true );
		
}
function adiya_widget_init()
{
	if (function_exists('adiya_widget_call')) {
		adiya_widget_call();
	}

	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Default Sidebar', 'adiya' ),
			'id'			=> 'default_sidebar',
			'description'	=> esc_html__( 'Widgets in this area will be shown on blog page & blog post detail.', 'adiya' ),
			'class'			=>'',
			'before_widget'	=>'<div class="widget adiya_widgets %2$s %s">',
			'after_widget'	=>'</div>',
			'before_title'	=> '<div class="widget-title"><h3>',
			'after_title'	=> '</h3></div>',
		)
	);
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Footer Sidebar 1', 'adiya' ),
			'id'			=> 'fsidebar_1',
			'description'	=> esc_html__( 'Widgets in this area will be shown in Footer.', 'adiya' ),
			'class'			=>'',
			'before_widget'	=>'<div class="%2$s %s footer-widget">',
			'after_widget'	=>'</div>',
			'before_title'	=> '<div class="footer__title"><h4>',
			'after_title'	=> '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Footer Sidebar 2', 'adiya' ),
			'id'			=> 'fsidebar_2',
			'description'	=> esc_html__( 'Widgets in this area will be shown in Footer.', 'adiya' ),
			'class'			=>'',
			'before_widget'	=>'<div class="%2$s %s footer-widget">',
			'after_widget'	=>'</div>',
			'before_title'	=> '<div class="footer__title"><h4>',
			'after_title'	=> '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Footer Sidebar 3', 'adiya' ),
			'id'			=> 'fsidebar_3',
			'description'	=> esc_html__( 'Widgets in this area will be shown in Footer.', 'adiya' ),
			'class'			=>'',
			'before_widget'	=>'<div class="%2$s %s footer-widget">',
			'after_widget'	=>'</div>',
			'before_title'	=> '<div class="footer__title"><h4>',
			'after_title'	=> '</h4></div>',
		)
	);
}
add_action( 'widgets_init', 'adiya_widget_init' );

//* Remove type tag from script and style
add_action('wp_loaded', 'adiya_prefix_output_buffer_start');
function adiya_prefix_output_buffer_start() { 
    ob_start("adiya_prefix_output_callback"); 
}

function adiya_prefix_output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}
if ( !function_exists('adiya_posts_fetch')){
	function adiya_posts_fetch( $post ){
		$posts_list = [];
		$args = array(
			'post_type'=> $post,
			'orderby'    => 'ID',
			'post_status' => 'publish',
			'order'    => 'DESC',
			'posts_per_page' => -1 // this will retrive all the post that is published 
		);
		$results = get_posts( $args );
		foreach ($results as $result) {
			$posts_list[$result->ID] = $result -> post_title;
		}
		return $posts_list;
	}
}
if ( !function_exists('adiya_socialshare')){
	function adiya_socialshare( $socials, $url ){
		?>
			<ul>
		<?php
		foreach( $socials as $social => $value ){
			switch($social){
				case "facebook":
					$link = "http://www.facebook.com/sharer.php?u=".$url;
				?>
					<li><a href="<?php echo esc_url($link);?>"><i class="fab fa-facebook-f"></i></a></li>
				<?php
				break;
				case "twitter":
					$link = "http://twitter.com/share?text=Visit the post &url=".$url;
				?>
					<li><a href="<?php echo esc_url($link);?>"><i class="fab fa-twitter"></i></a></li>
				<?php
				break;
				case "reddit":
					$link = "http://reddit.com/submit?url=".$url;
				?>
					<li><a href="<?php echo esc_url($link);?>"><i class="fab fa-instagram"></i></a></li>
				<?php
				break;
				case "linkedin":
					$link = "http://www.linkedin.com/shareArticle?mini=true&url=".$url;
				?>
					<li><a href="<?php echo esc_url($link);?>"><i class="fab fa-linkedin-in"></i></a></li>
				<?php
				break;
				case "google":
					$link = "https://plus.google.com/share?url=".$url;
				?>
					<li><a href="<?php echo esc_url($link);?>"><i class="fab fa-google-plus-g"></i></a></li>
				<?php
				break;
			}
		}
		?>
			</ul>
		<?php
	}
}