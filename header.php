<?php
if( class_exists( 'CSF' ) ) {
	$adiya 			= get_option( 'themeoptions' );
	$preloader 		= $adiya['preloader_show'];
	$search 		= $adiya['header_search'];
	$logo 			= $adiya['header_logo']['url'] 		? $adiya['header_logo']['url'] : get_template_directory_uri(). "/assets/images/logo/logo.png";
	$map 			= $adiya['map_txt'] 				? $adiya['map_txt'] 		: '';
	$phone 			= $adiya['header_phone']['text'] 	? $adiya['header_phone'] 	: '';
	$mail 			= $adiya['header_mail'] 			? $adiya['header_mail'] 	: '';
	$button 		= $adiya['header_button']['text'] 	? $adiya['header_button'] 	: '';
}
else{
	$preloader 		= true;
	$search 		= true;
	$map 			= "1234 king Street, Australia";
	$phone 			= true;
	$phone['text']	= "1 (+500) 123 456 789";
	$phone['url']	= "tel:123456789";
	$mail 			= true;
	$mail['text']	= "demo@mail.com";
	$mail['url']	= "mailto:demo@mail.com";
	$button 		= false;
	$logo 			= get_template_directory_uri(). "/assets/images/logo/logo.png";
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
	<?php 
		if(function_exists( 'wp_body_open' ) ){
			wp_body_open(); 
		}
	if($preloader):
	?>
	<!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->
	<?php 
		endif;
		if($search):
	?>
    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="search-input">
                <div class="search-close">
                    <i class="fas fa-times"></i>
                </div>
                <form>
                    <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="Search Here">
                    <button class="search-btn">
                        <span class="serch-icon">
                            <i class="fas fa-search"></i>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- search area -->
	<?php endif;?>


    <!-- ==========Header Section Starts Here========== -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="header-top-area d-none d-xl-flex">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr('Adiya','adiya')?>">
                        </a>
                    </div>
                    <ul class="header-address d-flex align-items-center">
						<?php if($map):?>
                        <li>
                            <a class="fb"><i class="fas fa-map-marker-alt"></i><?php echo esc_html($map);?></a>
                        </li>
						<?php 
							endif;
							if($phone):
						?>
                        <li>
                            <a href="<?php echo esc_url($phone['url']);?>" class="twitter">
								<i class="fas fa-phone-alt"></i> 
								<?php echo esc_html($phone['text']);?>
							</a>
                        </li>
						<?php 
							endif;
							if($mail):
						?>
                        <li>
                            <a href="<?php echo esc_url($mail['url']);?>" class="vimeo">
								<i class="far fa-envelope"></i>
								<?php echo esc_html($mail['text']);?>
							</a>
                        </li>
						<?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="mobile-logo d-xl-none">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr('Adiya','adiya')?>">
                        </a>
                    </div>
                    <div class="menu-area">
						<?php
							if(has_nav_menu( 'header_menu' )){
								wp_nav_menu(
										array(  
											'theme_location'=> 'header_menu', 
											'menu_class'=>'menu' ,
											'container' =>'ul' , 
											'container_class'=> '',
											'container_id'=> '',
											'depth' => 2,
										)
								);
							}
							elseif(is_user_logged_in()){
								echo '<ul>
										<li>
											<a href="'.site_url().'/wp-admin/nav-menus.php">'.esc_html__("Set Menu", 'foores').'</a>
										</li>
									  </ul>';
							}
							if($search):
						?>
							<div class="header-right">
								<div class="search-menubar">
									<div class="search">
										<img src="<?php echo esc_url( get_template_directory_uri().'/assets/images/shape/search-icon.svg');?>" alt="<?php echo esc_attr('Search','adiya')?>">
									</div>
								</div>
							</div>
						<?php endif;?>
                        <!-- toggle icons -->
                        <div class="header-bar d-xl-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
					<?php if($button):?>
                    	<a href="<?php echo esc_url($button['url']);?>" class="menu-btn">
							<?php echo esc_html($button['text']);?>
						</a>
					<?php endif;?>
                </div>
            </div>
        </div>
    </header>
    <!-- ==========>> Header Section Ends Here <<========== -->
	<?php	adiya_bar_check(); ?>