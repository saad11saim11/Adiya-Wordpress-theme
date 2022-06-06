<?php
if( class_exists( 'CSF' ) ) {

  $prefix = 'blog_options';


  CSF::createMetabox( $prefix, array(
    'title'     	=> 'Blog Post Options',
    'post_type' 	=> 'post',
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
    'title'  => 'Post Meta',
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
			'id'      => 'categories',
			'type'       => 'switcher',
			'text_on'    => esc_html__('Show','adiya'),
			'text_off'   => esc_html__('Hide','adiya'),
			'text_width' => 100,
			'title'   => esc_html__('Categories Visibility','adiya'),
			'desc'   => esc_html__('Make categories  visibility to show.','adiya'),
			'default' => true
		),
		array(
			'id'      => 'tags',
			'type'       => 'switcher',
			'text_on'    => esc_html__('Show','adiya'),
			'text_off'   => esc_html__('Hide','adiya'),
			'text_width' => 100,
			'title'   => esc_html__('Tags Visibility','adiya'),
			'desc'   => esc_html__('Make tags  visibility to show.','adiya'),
			'default' => true
		),

    )
  ) );

}