<?php
return array(
	'_root_'  => 'main/index',  // The default route
	'_404_'   => 'main/404',    // The main 404 route
	
	'login'                                         => 'users/login',
        'logout'                                        => 'users/logout',
        'register'                                      => 'users/register',
        'confirm'                                       => 'users/confirm',
        'confirm/(:any)'                                => 'users/confirm/$1',
        'admin'                                         => 'main/admin/main',
        'admin/(:segment)'                              => '$1/admin/$1',
        'admin/(:segment)/(:any)'                       => '$1/admin/$1/$2',
        'admin/(:segment)/(:any)/(:any)'                => '$1/admin/$1/$2/$3',
        'admin/(:segment)/(:any)/(:any)/(:any)'         => '$1/admin/$1/$2/$3/$4'
);