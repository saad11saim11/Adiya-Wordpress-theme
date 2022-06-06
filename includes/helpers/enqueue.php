<?php
class adiya_Enqueue{
	
	function __construct()	{

		add_action( 'wp_enqueue_scripts', array( $this, 'adiya_enqueue_scripts' ) );

		add_action( 'wp_head', array( $this, 'wp_head' ) );

		add_action( 'wp_footer', array( $this, 'wp_footer' ) );

	}


	function adiya_enqueue_scripts()
	{
		global $adiya;
				
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

			if(strstr($style, 'http') || strstr($style, 'https') ) 
			{
				wp_enqueue_style( $name, $style);
			}

			else wp_enqueue_style( $name, get_template_directory_uri().'/'.$style);
		}
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
		if( is_singular() ) 
			wp_enqueue_script('comment-reply');
	}
	function wp_head()
	{
	}
	
	function wp_footer()
	{
		$this->adiya_enqueue_scripts();
	}

}
