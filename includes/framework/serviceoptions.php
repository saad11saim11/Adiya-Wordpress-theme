<?php
if( class_exists( 'CSF' ) ) {

  $prefix = 'service_options';


  CSF::createMetabox( $prefix, array(
    'title'     	=> 'Service Options',
    'post_type' 	=> 'services',
  ) );


  CSF::createSection( $prefix, array(
    'title'  => 'Hero Section',
    'fields' => array(

      array(
        'id'    	=> 'title',
        'type'  	=> 'text',
        'title'   	=> esc_html__('Title','adiya'),
		'default'   => esc_html__('Services Details','adiya'),
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
			'id'      => 'sidebar',
			'type'       => 'switcher',
			'text_on'    => esc_html__('Show','adiya'),
			'text_off'   => esc_html__('Hide','adiya'),
			'text_width' => 100,
			'title'   => esc_html__('Sidebar Visibility','adiya'),
			'desc'   => esc_html__('Make sidebar visibility to show.','adiya'),
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