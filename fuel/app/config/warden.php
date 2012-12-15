<?php
return array(
	'lifetime' => 1209600,
	'default_role' => 'User',
	'profilable' => true,
	'trackable' => true,
	'recoverable' => 
	array(
		'in_use' => true,
		'reset_password_within' => '+1 week',
		'url' => 'users/reset',
	),
	'confirmable' => 
	array(
		'in_use' => true,
		'confirm_within' => '+1 week',
		'url' => 'confirm',
	),
	'lockable' => 
	array(
		'in_use' => true,
		'maximum_attempts' => 10,
		'lock_strategy' => 'sign_in_count',
		'unlock_strategy' => 'both',
		'unlock_in' => '+1 week',
		'url' => 'users/unlock',
	),
	'http_authenticatable' => 
	array(
		'in_use' => false,
		'method' => 'digest',
		'realm' => 'Protected by Warden',
		'users' => 
		array(
		),
	),
);
