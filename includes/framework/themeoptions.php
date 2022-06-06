<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  $prefix = 'themeoptions';
  $image = get_template_directory_uri()."/assets/images/favicon.png" ;
  $icon = file_exists($image) ? $image : 'dashicons-image-filter';

  // Create options
  CSF::createOptions( $prefix, array(
	
	 
    'menu_title' 				=> 'Adiya Options',
    'menu_slug'  				=> 'adiya-options',
	'framework_title'         	=> 'Adiya Theme Options <small>v 1.0</small>',
	'menu_icon'               	=> $icon,
    'menu_position'           	=> 4,
	'show_bar_menu'           	=> false,
	'show_search'             	=> true,
    'show_reset_all'          	=> true,
    'show_reset_section'      	=> true,
    'show_footer'             	=> true,
    'show_all_options'        	=> true,
    'show_form_warning'       	=> true,
    'sticky_header'           	=> true,
    'save_defaults'           	=> true,
    'ajax_save'               	=> true,
	'footer_text'             	=> 'Adiya - Spa & Beauty  HTML Template by - <a href="https://www.developers-hub.com/">Developers-hub</a>',
    'footer_credit'           	=> '&nbsp',
  ) );

  //
  // Create a section
    CSF::createSection( $prefix, array(
    'title'  => esc_html__('General Options','adiya'),
    'fields' => array(

		array(
			'id'      => 'preloader_show',
			'type'       => 'switcher',
		    'text_on'    => esc_html__('Show','adiya'),
		    'text_off'   => esc_html__('Hide','adiya'),
		    'text_width' => 100,
		    'title'   => esc_html__('Page Preloader Visibility','adiya'),
			'default' => true
		),
		array(
			'id'      => 'scroltop',
			'type'       => 'switcher',
		  	'text_on'    => esc_html__('Show','adiya'),
		  	'text_off'   => esc_html__('Hide','adiya'),
		  	'text_width' => 100,
			'title'   => esc_html__('Scroll to Top Button Visibility','adiya'),
			'default' => true
		),

    )
  ) );
	
	
	CSF::createSection( $prefix, array(
	  'id'    => 'headeropt',
	  'title' => esc_html__('Header Options','adiya'),
	  'fields' => array(
		
		array(
			'id'    => 'header_logo',
			'type'  => 'media',
			'title' => esc_html__('Header Main Logo','adiya'),
			'library' => 'image',
		  ),
		array(
			'id'      => 'map_txt',
			'type'    => 'text',
			'title'   => esc_html__('Map Address','adiya'),
		),
		array(
			'id'      => 'header_phone',
			'type'    => 'link',
			'title'   => esc_html__('Set Phone Number','adiya'),
			'add_title'    => 'Add Phone Number',
			'edit_title'   => 'Edit Phone Number',
			'remove_title' => 'Remove Phone Number',
		),
		array(
			'id'      => 'header_mail',
			'type'    => 'link',
			'title'   => esc_html__('Set Mail Address','adiya'),
			'add_title'    => 'Add Mail Address',
			'edit_title'   => 'Edit Mail Address',
			'remove_title' => 'Remove Mail Address',
		),
		array(
			'id'      => 'header_search',
			'type'       => 'switcher',
			'text_on'    => esc_html__('Show','adiya'),
			'text_off'   => esc_html__('Hide','adiya'),
			'text_width' => 100,
			'title'   => esc_html__('Search Icon Visibility','adiya'),
			'default' => false
		),
		array(
			'id'      => 'header_button',
			'type'    => 'link',
			'title'   => esc_html__('Set Menu Button','adiya'),
			'add_title'    => 'Add Menu Button',
			'edit_title'   => 'Edit Menu Button',
			'remove_title' => 'Remove Menu Button',
		),

    )
	) );
	
	CSF::createSection( $prefix, array(
    'title'  => 'Footer Options',
    'fields' => array(
		
		array(
		  'id'      => 'footer_copyright',
		  'type'    => 'textarea',
		  'title'   => esc_html__('Copyright Text', 'adiya'),
		  'default' => "© 2022 All Right Reserved by <a href='#'>theme_crazy</a>",
		),
		array(
		  'id'      => 'footer_language',
		  'type'    => 'textarea',
		  'title'   => esc_html__('Language Information Text', 'adiya'),
		  'default' => "English / USD (US Dollar)",
		),
		array(
			'id'      => 'footer_widget1',
			'type'       => 'switcher',
		  'text_on'    => esc_html__('Show','adiya'),
		    'text_off'   => esc_html('Hide','adiya'),
		  'text_width' => 100,
			'title'   => esc_html__('Footer Widget 1', 'adiya'),
			'default' => true
		),
		array(
			'id'      => 'footer_widget2',
			'type'       => 'switcher',
		  'text_on'    => esc_html__('Show','adiya'),
		    'text_off'   => esc_html('Hide','adiya'),
		  'text_width' => 100,
			'title'   => esc_html__('Footer Widget 2', 'adiya'),
			'default' => true
		),
      array(
			'id'      => 'footer_widget3',
			'type'       => 'switcher',
		  'text_on'    => esc_html__('Show','adiya'),
		    'text_off'   => esc_html('Hide','adiya'),
		  'text_width' => 100,
			'title'   => esc_html__('Footer Widget 3', 'adiya'),
			'default' => true
		),

    )
  ) );
  CSF::createSection( $prefix, array(
	  'id'    => 'defpage',
	  'title' => esc_html__('Default Page Options','adiya'),
  ) );
  CSF::createSection( $prefix, array(
	  'id'    => 'blogpage',
	  'title' => esc_html__('Blog Page Options','adiya'),
	  'parent'      => 'defpage',
	  'fields' => array(
		  	array(
				'id'      => 'blog_title',
				'type'    => 'text',
				'title'   => esc_html__('Title','adiya'),
				'default' => esc_html__('Latest Blogs','adiya'),
			),
		  	array(
				'id'    => 'blog_background',
				'type'  => 'media',
				'title' => esc_html__('Blog Background Image','adiya'),
				'library' => 'image',
			),
		  	array(
				'id'      => 'blog_breadcrumb',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Breadcrumb Visibility','adiya'),
				'desc'   => esc_html__('Make breadcrumb visibility to show.','adiya'),
				'default' => true
			),
		  	array(
				'id'      => 'blog_titles',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Title & Description Visibility','adiya'),
				'desc'   => esc_html__('Make title & description visibility to show, so you can customize it according to your desire.','adiya'),
				'default' => false
			),
		  	array(
				'id'      => 'blog_sheading',
				'type'    => 'text',
				'dependency' => array( 'blog_titles', '==', 'true' ),
				'title'   => esc_html__('Section heading','adiya'),
				'default' => esc_html__('Read All News','adiya'),
			),
		  	array(
				'id'      => 'blog_stitle',
				'type'    => 'text',
				'dependency' => array( 'blog_titles', '==', 'true' ),
				'title'   => esc_html__('Section Title','adiya'),
				'default' => esc_html__('Recent Articles','adiya'),
			),
		  	array(
				'id'      => 'blog_sdesc',
				'type'    => 'textarea',
				'dependency' => array( 'blog_titles', '==', 'true' ),
				'title'   => esc_html__('Section Description','adiya'),
			),
		  )
  ));
  CSF::createSection( $prefix, array(
	  'id'    => 'archivepage',
	  'title' => esc_html__('Archive Page Options','adiya'),
	  'parent'      => 'defpage',
	  'fields' => array(
		  	array(
				'id'    => 'archive_background',
				'type'  => 'media',
				'title' => esc_html__('Archive Background Image','adiya'),
				'library' => 'image',
			),
		  	array(
				'id'      => 'archive_breadcrumb',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Breadcrumb Visibility','adiya'),
				'desc'   => esc_html__('Make breadcrumb visibility to show.','adiya'),
				'default' => true
			),
		  )
  ));
  CSF::createSection( $prefix, array(
	  'id'    => 'authorpage',
	  'title' => esc_html__('Author Page Options','adiya'),
	  'parent'      => 'defpage',
	  'fields' => array(
		  	array(
				'id'    => 'author_background',
				'type'  => 'media',
				'title' => esc_html__('Author Background Image','adiya'),
				'library' => 'image',
			),
		  	array(
				'id'      => 'author_breadcrumb',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Breadcrumb Visibility','adiya'),
				'desc'   => esc_html__('Make breadcrumb visibility to show.','adiya'),
				'default' => true
			),
		  )
  ));
  CSF::createSection( $prefix, array(
	  'id'    => 'categorypage',
	  'title' => esc_html__('Category Page Options','adiya'),
	  'parent'      => 'defpage',
	  'fields' => array(
		  	array(
				'id'    => 'category_background',
				'type'  => 'media',
				'title' => esc_html__('Category Background Image','adiya'),
				'library' => 'image',
			),
		  	array(
				'id'      => 'category_breadcrumb',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Breadcrumb Visibility','adiya'),
				'desc'   => esc_html__('Make breadcrumb visibility to show.','adiya'),
				'default' => true
			),
		  )
  ));
  CSF::createSection( $prefix, array(
	  'id'    => 'tagpage',
	  'title' => esc_html__('Tag Page Options','adiya'),
	  'parent'      => 'defpage',
	  'fields' => array(
		  	array(
				'id'    => 'tag_background',
				'type'  => 'media',
				'title' => esc_html__('Tag Background Image','adiya'),
				'library' => 'image',
			),
		  	array(
				'id'      => 'tag_breadcrumb',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Breadcrumb Visibility','adiya'),
				'desc'   => esc_html__('Make breadcrumb visibility to show.','adiya'),
				'default' => true
			),
		  )
  ));
  CSF::createSection( $prefix, array(
	  'id'    => 'searchpage',
	  'title' => esc_html__('Search Page Options','adiya'),
	  'parent'      => 'defpage',
	  'fields' => array(
		  	array(
				'id'    => 'search_background',
				'type'  => 'media',
				'title' => esc_html__('Search Background Image','adiya'),
				'library' => 'image',
			),
		  	array(
				'id'      => 'search_breadcrumb',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Breadcrumb Visibility','adiya'),
				'desc'   => esc_html__('Make breadcrumb visibility to show.','adiya'),
				'default' => true
			),
		  )
  ));
  CSF::createSection( $prefix, array(
	  'id'    => 'errorpage',
	  'title' => esc_html__('Error Page Options (404)','adiya'),
	  'parent'      => 'defpage',
	  'fields' => array(
		  	array(
				'id'      => 'error_title',
				'type'    => 'text',
				'title'   => esc_html__('Header Title','adiya'),
				'default' => esc_html__('404 Error Page','adiya'),
			),
		  	array(
				'id'    => 'error_background',
				'type'  => 'media',
				'title' => esc_html__('Error Background Image','adiya'),
				'library' => 'image',
			),
		  	array(
				'id'      => 'error_breadcrumb',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Breadcrumb Visibility','adiya'),
				'desc'   => esc_html__('Make breadcrumb visibility to show.','adiya'),
				'default' => true
			),
		  	array(
				'id'      => 'error_sheading',
				'type'    => 'text',
				'title'   => esc_html__('Heading','adiya'),
				'default' => esc_html__('404','adiya'),
			),
		  	array(
				'id'      => 'error_stext',
				'type'    => 'textarea',
				'title'   => esc_html__('Description Text','adiya'),
				'default' => esc_html__('adiya Are A IT Solutions & Technology Services Provider Institutions. Suitable For IT Solutions, IT Technology, IT Business, Consulting, Software, Digital Solution And Any Related Services Company Field.','adiya'),
			),
		  	array(
				'id'      => 'error_hbtn',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Homepage Button visibility','adiya'),
				'desc'   => esc_html__('Show Homepage Button on Page','adiya'),
				'default' => true
			),
		  	array(
				'id'      => 'error_btntxt',
				'type'    => 'text',
				'title'   => esc_html__('HomePage Button text','adiya'),
				'default' => esc_html__('Go Back To Homepage','adiya'),
			),
		  )
  ));

}
