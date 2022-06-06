<?php
if( class_exists( 'CSF' ) ) {

  $prefix = 'team_options';


  CSF::createMetabox( $prefix, array(
    'title'     	=> 'Team Members Options',
    'post_type' 	=> 'team',
  ) );


  CSF::createSection( $prefix, array(
    'title'  => 'Hero Section',
    'fields' => array(

      array(
        'id'    	=> 'title',
        'type'  	=> 'text',
        'title'   	=> esc_html__('Title','adiya'),
		'default'   => esc_html__('Single Blog','adiya'),
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


  CSF::createSection( $prefix, array(
    'title'  => 'Team Details',
    'fields' => array(
		array(
			'id'      => 'sidebar',
			'type'       => 'switcher',
			'text_on'    => esc_html__('Show','adiya'),
			'text_off'   => esc_html__('Hide','adiya'),
			'text_width' => 100,
			'title'   => esc_html__('Sidebar Visibility','adiya'),
			'desc'   => esc_html__('Make sidebar visibility to show, so you can customize it according to your desire.','adiya'),
			'default' => true
		),
		array(
			'id'    	=> 'designation',
			'type'  	=> 'text',
			'title'   	=> esc_html__('Member Designation','adiya'),
			'default'   => esc_html__('President & CEO','adiya'),
		  ),
		array(
		  'id'        		=> 'socialprofiles',
		  'type'     		=> 'repeater',
		  'title'     		=> esc_html__("Social Profiles",'adiya'),
		  'button_title'    => esc_html__('Add New','adiya'),
		  'fields'    => array(

			array(
				'id'      => 'icon',
				'type'    => 'icon',
				'title'   => esc_html__('Social Site Icon','adiya'),
			),
			array(
			  'id'    => 'link',
			  'type'  => 'link',
			  'title' => esc_html__('Social Profile Link','adiya'),
			),

		  ),
		),

    )
  ) );

}