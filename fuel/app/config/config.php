<?php

return array(
	'base_url' => NULL,
	'url_suffix' => '',
	'index_file' => false,
	'profiling' => false,
	'cache_dir' => APPPATH.'cache/',
	'caching' => false,
	'cache_lifetime' => 3600,
	'ob_callback' => NULL,
	'errors' => 
	array(
		'continue_on' => 
		array(
		),
		'throttle' => 10,
		'notices' => true,
	),
	'language' => 'en',
	'language_fallback' => 'en',
	'locale' => 'en_US',
	'encoding' => 'UTF-8',
	'server_gmt_offset' => 0,
	'default_timezone' => NULL,
	'log_threshold' => 2,
	'log_path' => APPPATH.'logs/',
	'log_date_format' => 'Y-m-d H:i:s',
	'security' => 
	array(
		'csrf_autoload' => false,
		'csrf_token_key' => 'fuel_csrf_token',
		'csrf_expiration' => 0,
		'uri_filter' => 
		array(
			0 => 'htmlentities',
		),
		'input_filter' => 
		array(
		),
		'output_filter' => 
		array(
			0 => 'Security::htmlentities',
		),
		'htmlentities_flags' => 3,
		'htmlentities_double_encode' => false,
		'auto_filter_output' => true,
		'whitelisted_classes' => 
		array(
			0 => 'Fuel\\Core\\Response',
			1 => 'Fuel\\Core\\View',
			2 => 'Fuel\\Core\\ViewModel',
			3 => 'Closure',
		),
	),
	'cookie' => 
	array(
		'expiration' => 0,
		'path' => '/',
		'domain' => NULL,
		'secure' => false,
		'http_only' => false,
	),
	'validation' => 
	array(
		'global_input_fallback' => true,
	),
	'controller_prefix' => 'Controller_',
	'routing' => 
	array(
		'case_sensitive' => true,
		'strip_extension' => true,
	),
	'module_paths' => array(
		APPPATH.'modules'.DS
	),

	'package_paths' => 
	array(
		PKGPATH
	),
	'always_load' => 
	array(
		'packages' => 
		array(
			'orm', 'dbmenu', 'warden', 'email', 'breadcrumb'
		),
		'modules' => 
		array(
		),
		'classes' => 
		array(
		),
		'config' => 
		array(
			'website'
		),
		'language' => 
		array(
		),
	),
);

/* End of file config.php */