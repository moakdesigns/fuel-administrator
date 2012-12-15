<?php

return array(
	'defaults' => 
				array(
					'useragent' 		=> 'FuelPHP, PHP 5.3 Framework',
					'driver' 			=> 'mail',
					'is_html' 			=> NULL,
					'charset' 			=> 'utf-8',
					'encode_headers' 	=> true,
					'encoding' 			=> '8bit',
					'priority' 			=> '3 (Normal)',
					'from' 				=> 
											array(
												'email' => 'noreply@myhost.com',
												'name' => 'Custom Admin Panel',
											),
					'return_path' 		=> false,
					'validate' 			=> true,
					'auto_attach' 		=> true,
					'generate_alt' 		=> true,
					'force_mixed' 		=> false,
					'wordwrap' 			=> 76,
					'sendmail_path' 	=> '/usr/sbin/sendmail',
					'smtp' 				=> 
											array(
												'host' => '',
												'port' => 25,
												'username' => '',
												'password' => '',
												'timeout' => 5,
											),
					'newline' 			=> '',
					'attach_paths' 		=> 
											array(
												0 => '',
											),
				),
	'default_setup' 	=> 'default',
	'setups' 			=> 
							array(
								'default' 	=> 
												array(),
							),
);

/* End of file email.php */