<?php

function adiya_set( $var, $key, $def = '' )
{
	if( !$var ) return false;

	if( is_object( $var ) && isset( $var->$key ) ) return $var->$key;
	elseif( is_array( $var ) && isset( $var[$key] ) ) return $var[$key];
	elseif( $def ) return $def;
	else return false;
}


function adiya_printr($data)
{
	echo '<pre>'; print_r($data);exit;
}

function adiya_load_class($class, $directory = 'libraries', $global = true, $prefix = 'adiya_')
{
	$obj = &$GLOBALS['_sh_base'];
	$obj = is_object( $obj ) ? $obj : new stdClass;

	$name = FALSE;

	// Is the request a class extension?  If so we load it too
	$path = get_template_directory().'/includes/'.$directory.'/'.$class.'.php';
	if( file_exists($path) )
	{
		$name = $prefix.ucwords( $class );

		if (class_exists($name) === FALSE)	require($path);
	}

	// Did we find the class?
	if ($name === FALSE) exit('Unable to locate the specified class: '.$class.'.php');

	if( $global ) $GLOBALS['_sh_base']->$class = new $name();
	else new $name();
}
function adiya_template_call() {
	$path = get_template_directory() . "/template/";
	foreach (glob($path."/*.php") as $filename)
		{
			include $filename;
		}
}
adiya_template_call();
if( class_exists( 'CSF' ) ) {
	$path = get_template_directory() . "/includes/framework/";
	foreach (glob($path."/*.php") as $filename)
		{
			include $filename;
		}
}
include_once( get_template_directory() . '/includes/library/functions.php');
//include_once( get_template_directory() . '/includes/helpers/core_renderer.php');

adiya_load_class( 'ajax', 'helpers', false );
adiya_load_class( 'enqueue', 'helpers', false );

if( is_admin() )
/** Plugin Activation */
require_once(get_template_directory().'/includes/thirdparty/tgm-plugin-activation/plugins.php');