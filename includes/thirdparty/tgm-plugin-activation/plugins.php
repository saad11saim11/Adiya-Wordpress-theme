<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-1.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/includes/thirdparty/tgm-plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'adiya_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function adiya_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins =	array(
					array(
						'name'     			=> esc_html('Adiya Core' , 'adiya'),
						'slug'     			=> 'adiya_core',
						'source'   			=> get_template_directory() . '/includes/thirdparty/tgm-plugin-activation/plugins/adiya_core.zip',
						'required' 			=> true,
						'force_activation' 	=> false,
						'force_deactivation'=> false,
						'file_path'			=> ABSPATH.'wp-content/plugins/ad_custom_post/adiya_core.php'
					),
					array(
						'name'     			=> esc_html('Codestar Framework (Premium)' , 'edufie'),
						'slug'     			=> 'codestar',
						'source'   			=> get_template_directory() . '/includes/thirdparty/tgm-plugin-activation/plugins/codestar-framework.zip',
						'required' 			=> true,
						'force_activation' 	=> false,
						'force_deactivation'=> true,
						'file_path'			=> ABSPATH.'wp-content/plugins/codestar-framework/codestar-framework.php'
					),
					array(
						'name'         		=> esc_html__("Elementor" , 'adiya'),
						'slug'         		=> 'elementor',
						'required'     		=> true,
					),
					//array(
//						'name'         		=> esc_html__("WooCommerce" , 'taleem'),
//						'slug'         		=> 'woocommerce',
//						'required'     		=> true,
//					),
					array(
						'name'         		=> esc_html__("Contact Form 7" , 'adiya'),
						'slug'         		=> 'contact-form-7',
						'required'     		=> true,
					),
					array(
						'name'         		=> esc_html__("MailChimp for WP" , 'adiya'),
						'slug'         		=> 'mailchimp-for-wp',
						'required'     		=> true,
					),
					array(
						'name'         		=> esc_html__("One Click Demo Import" , 'adiya'),
						'slug'         		=> 'one-click-demo-import',
						'required'     		=> true,
					),	
	);
	
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
