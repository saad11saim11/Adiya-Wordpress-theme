<?php
if( class_exists( 'CSF' ) ) {
	$prefix = 'page_options';
	
	CSF::createMetabox( $prefix, array(
		'title'     	=> 'Page Options',
		'post_type' 	=> 'page',
	  ) );
	
	CSF::createSection( $prefix, array(
		'title'  => 'Page Meta',
		'fields' => array(

		  
		)
	  ) );
	
	CSF::createSection( $prefix, array(
		'title'  => 'Hero Section',
		'fields' => array(
		array(
				'id'      => 'hsection',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Hero Section Visibility','adiya'),
				'desc'   => esc_html__('Make hero section visibility to show according to you requirement.','adiya'),
				'default' => true
			),

		  array(
			'id'    	=> 'title',
			'type'  	=> 'text',
			'title'   	=> esc_html__('Title','adiya'),
			'default'   => esc_html__('Page','adiya'),
		  ),
		  array(
				'id'      => 'breadcrumb',
				'type'       => 'switcher',
				'text_on'    => esc_html__('Show','adiya'),
				'text_off'   => esc_html__('Hide','adiya'),
				'text_width' => 100,
				'title'   => esc_html__('Breadcrumb Visibility','adiya'),
				'desc'   => esc_html__('Make breadcrumb visibility to show.','adiya'),
				'default' => true
			),
		   array(
				'id'    => 'background',
				'type'  => 'media',
				'title' => esc_html__('Background Image','adiya'),
				'library' => 'image',
			),

		)
	  ) );
	
}