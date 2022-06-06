<?php

class adiya_Ajax
{
	function __construct()
	{
		add_action( 'wp_ajax__sh_ajax_callback', array( $this, 'ajax_handler' ) );
		add_action( 'wp_ajax_nopriv__sh_ajax_callback', array( $this, 'ajax_handler' ) );
	}
	
	function ajax_handler()
	{
		$method = adiya_set( $_REQUEST, 'subaction' );
		if( method_exists( $this, $method ) ) $this->$method();
		
		exit;
	}
	function adiya_contact_submit(){
		if( function_exists('adiya_ajax_submit_form') ){
			adiya_ajax_submit_form();
		}	
	}
	function adiya_career_form_submit(){
		if( function_exists('adiya_ajax_submit_career_form') ){
			adiya_ajax_submit_career_form();
		}	
	}
}