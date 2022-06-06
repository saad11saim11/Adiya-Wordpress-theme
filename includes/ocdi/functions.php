<?php
include_once( get_template_directory() . '/includes/ocdi/codestar.php');
function adiya_ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'adiya Restaurant Theme',
			'categories'                   => array( 'adiya' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'adiya_theme',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri('template_url') . '/includes/ocdi/demo/screenshot.png',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'adiya' ),
			'preview_url'                  => 'https://themexriver.com/wp/adiya',
		),
		
	);
}
add_filter( 'pt-ocdi/import_files', 'adiya_ocdi_import_files' );


function adiya_ocdi_after_import( $selected_import ) {
	// Assign menus to their locations.
    $header_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array( 'header_menu' => $header_menu->term_id ) );

    // Assign front page and posts page (blog page)
    $front_page_id	= get_page_by_title( 'Home' );
	
    $blog_page_id	= get_page_by_title( 'Blog' );


    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'adiya_ocdi_after_import' );

function adiya_ocdi_before_widgets_import( $selected_import ) {
	$sidebars_widgets = get_option('sidebars_widgets');
    $all_widgets = array();

    array_walk_recursive( $sidebars_widgets, function ($item, $key) use ( &$all_widgets ) {
        if( ! isset( $all_widgets[$key] ) ) {
            $all_widgets[$key] = $item;
        } else {
            $all_widgets[] = $item;
        }
    } );

    if( isset( $all_widgets['array_version'] ) ) {
        $array_version = $all_widgets['array_version'];
        unset( $all_widgets['array_version'] );
    }

    $new_sidebars_widgets = array_fill_keys( array_keys( $sidebars_widgets ), array() );

    $new_sidebars_widgets['wp_inactive_widgets'] = $all_widgets;
    if( isset( $array_version ) ) {
        $new_sidebars_widgets['array_version'] = $array_version;
    }

    update_option( 'sidebars_widgets', $new_sidebars_widgets );
}
add_action( 'pt-ocdi/before_widgets_import', 'adiya_ocdi_before_widgets_import' );

function adiya_ocdi_before_content_import() {
    add_filter( 'wp_import_post_data_processed', 'adiya_ocdi_wp_import_post_data_processed', 99, 2 );
}
add_action( 'pt-ocdi/before_content_import', 'adiya_ocdi_before_content_import', 99 );

function adiya_ocdi_wp_import_post_data_processed( $postdata, $data ) {
    return wp_slash( $postdata );
}

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );