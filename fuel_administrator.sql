SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE `dbmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `parent` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `divider` int(1) NOT NULL,
  `menuicon` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

INSERT INTO `dbmenu` (`id`, `catid`, `title`, `link`, `parent`, `position`, `active`, `divider`, `menuicon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', '', 0, 1, 1, 0, '', 0, 1350218912),
(2, 1, 'Website design', '#', 0, 2, 1, 0, '', 0, 1356823509),
(3, 1, 'web', '#', 2, 2, 1, 0, '', 0, 1356823516),
(5, 1, 'Contact', '#', 0, 4, 1, 0, '', 0, 1356823582),
(6, 1, 'Support', '#', 0, 3, 1, 0, '', 0, 1356823560),
(7, 1, 'home pc', '#', 6, 1, 1, 0, '', 0, 1356823569),
(8, 1, 'business pc', '#', 6, 2, 1, 0, '', 0, 1356823576),
(9, 1, 'portfolio', '#', 2, 4, 1, 0, '', 0, 1356823553),
(10, 1, 'quote', '#', 2, 3, 1, 0, '', 0, 1356823545),
(11, 1, 'Test1', '#', 3, 2, 1, 0, '', 0, 0),
(12, 1, 'Test2', '#', 3, 3, 1, 0, '', 0, 0),
(17, 1, 'Test3', '#', 3, 4, 1, 1, '', 0, 0),
(18, 1, 'Test4', '#', 3, 5, 1, 0, '', 0, 0),
(24, 2, 'General', '', 0, 1, 1, 0, '', 1348352413, 1348360931),
(25, 2, 'Statistics', '', 0, 3, 1, 0, '', 1348353574, 1348360972),
(26, 2, 'Users', '', 0, 2, 1, 0, '', 1348353593, 1348360953),
(27, 2, 'Settings', '', 0, 4, 1, 0, '', 1348353612, 1348361018),
(29, 2, 'Dashboard', 'admin', 0, 0, 1, 0, '', 1348356593, 1349259197),
(31, 2, 'Menues', 'admin/menu', 24, 0, 1, 0, 'none', 1348358137, 1349260167),
(32, 2, 'Manage Users', 'admin/users', 26, 0, 1, 0, '', 1348362579, 1348362579),
(33, 2, 'Manage Roles', 'admin/users/roles', 26, 1, 1, 0, '', 1348362613, 1348399028),
(34, 2, 'Manage Permissions', 'admin/users/permissions', 26, 2, 1, 0, '', 1348362676, 1348362700),
(35, 2, 'Divider', '', 26, 3, 1, 1, '', 1348362737, 1348362737),
(36, 2, 'Inactive Users', 'admin/users/inactive', 26, 4, 1, 0, '', 1348362815, 1348362815),
(37, 2, 'Users', 'admin/users/settings', 27, 1, 1, 0, '', 1348362884, 1349260212),
(39, 2, 'Website', 'admin/main/settings', 27, 2, 1, 0, '', 1348363067, 1356954245),
(51, 0, 'Create Category', 'menu/create_category', 48, 0, 1, 0, 'icon-folder-open', 1353825791, 1356809552),
(52, 0, '', '', 48, 1, 1, 1, '', 1353825852, 1356809552),
(53, 0, 'Create Link', 'menu/create', 48, 2, 1, 0, 'icon-plus', 1353825900, 1356809552),
(55, 5, 'Login', 'login', 61, 0, 1, 0, 'none', 1356821104, 1356822201),
(56, 5, 'Register', 'register', 61, 1, 1, 0, 'none', 1356821125, 1356953979),
(57, 5, 'Password?', 'users/forgot', 61, 2, 1, 0, 'none', 1356821891, 1356953993),
(58, 6, 'Logout', 'logout', 60, 2, 1, 0, 'none', 1356821910, 1357038812),
(59, 6, 'Admin Panel', 'admin', 60, 0, 1, 0, 'none', 1356821948, 1356822061),
(60, 6, 'Control Panel', '#', 0, 0, 1, 0, 'icon-user icon-white', 1356822050, 1356823208),
(61, 5, 'Control Panel', '#', 0, 0, 1, 0, 'icon-user icon-white', 1356822108, 1356822108),
(62, 6, 'My Profile', 'users/profile', 60, 1, 1, 0, 'none', 1357038799, 1357038799);

CREATE TABLE `dbmenu_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `dbmenu_categories` (`id`, `catname`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', 'main', 0, 0),
(2, 'Admin Menu', 'admin', 0, 0),
(5, 'Guest Menu', 'guest', 1356821012, 1356821023),
(6, 'User Menu', 'user', 1356821040, 1356821049);

CREATE TABLE `permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `resource` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_permissions_on_name` (`name`),
  UNIQUE KEY `index_permissions_on_resource_and_action` (`resource`,`action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

INSERT INTO `permissions` (`id`, `name`, `resource`, `action`, `description`) VALUES
(4, 'Create News', 'news', 'create', 'Allows an user to create new news'),
(5, 'news - update', 'news', 'update', 'news - update'),
(6, 'news - delete', 'news', 'delete', 'news - delete'),
(8, 'pages - create', 'pages', 'create', 'pages - create'),
(9, 'pages - update', 'pages', 'update', 'pages - update'),
(10, 'pages - delete', 'pages', 'delete', 'pages - delete'),
(11, 'users - create', 'users', 'create', 'users - create'),
(12, 'users - update', 'users', 'update', 'users - update'),
(13, 'users - delete', 'users', 'delete', 'users - delete'),
(14, 'users - read', 'users', 'read', ''),
(18, 'controlpanel', 'controlpanel', 'execute', 'access to the control panel'),
(19, 'Roles - Read', 'roles', 'read', ''),
(20, 'Roles - Create', 'roles', 'create', ''),
(21, 'Roles - Update', 'roles', 'update', ''),
(22, 'Roles - Delete', 'roles', 'delete', '');

CREATE TABLE `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_profiles_on_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_roles_on_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'User', 'Default login role.'),
(2, 'Admin', 'Site admin role.');

CREATE TABLE `roles_permissions` (
  `role_id` int(11) unsigned NOT NULL,
  `permission_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `index_roles_permissions_on_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(2, 4),
(2, 5),
(2, 6),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22);

CREATE TABLE `roles_users` (
  `role_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `index_roles_users_on_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles_users` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(1, 2);

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `encrypted_password` varbinary(60) NOT NULL,
  `authentication_token` varbinary(60) DEFAULT NULL,
  `remember_token` varbinary(60) DEFAULT NULL,
  `reset_password_token` varbinary(60) DEFAULT '',
  `reset_password_sent_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `confirmation_token` varbinary(60) DEFAULT NULL,
  `confirmation_sent_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sign_in_count` int(11) unsigned NOT NULL DEFAULT '0',
  `current_sign_in_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_sign_in_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `current_sign_in_ip` int(10) unsigned NOT NULL DEFAULT '0',
  `last_sign_in_ip` int(10) unsigned NOT NULL DEFAULT '0',
  `unlock_token` varbinary(60) DEFAULT NULL,
  `locked_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_users_on_email` (`email`),
  UNIQUE KEY `index_users_on_username` (`username`),
  KEY `index_users_on_authentication_token` (`authentication_token`),
  KEY `index_users_on_remember_token` (`remember_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

INSERT INTO `users` (`id`, `email`, `username`, `encrypted_password`, `authentication_token`, `remember_token`, `reset_password_token`, `reset_password_sent_at`, `is_confirmed`, `confirmation_token`, `confirmation_sent_at`, `sign_in_count`, `current_sign_in_at`, `last_sign_in_at`, `current_sign_in_ip`, `last_sign_in_ip`, `unlock_token`, `locked_at`, `created_at`, `updated_at`) VALUES
(1, 'admin@localhost.tld', 'admin', '$2a$08$XdJOhIWv9vUvlMe6LfGbuu4wdvV6QHq60W6JV/KnQa4cfUQ4lU43O', 'NUJxyG5mYjdNWFstMmdHyjEzNTczNzkwMjxr', 'N1VpbFVxVE1XbWVySURyyjEzNTY5NTM5NTQr', NULL, '0000-00-00 00:00:00', 1, NULL, '0000-00-00 00:00:00', 0, '2013-01-06 13:30:22', '2013-01-06 10:51:16', 0, 0, NULL, '0000-00-00 00:00:00', '2012-12-15 15:59:24', '2013-01-06 13:30:22'),
(2, 'mydomain@localhost.tld', 'testuser', '$2a$08$McyU0m87pOAuez1ySK1Uu.Hd9zEFFTufW7asvYSayhF62MDJOPoA.', 'ZDJUUzdqbFJmSGVMTDBjyjEzNTU2NzQzNjAr', NULL, NULL, '0000-00-00 00:00:00', 0, NULL, '2012-12-16 15:32:40', 0, '2012-12-16 16:12:40', '2012-12-16 16:12:40', 0, 0, NULL, '0000-00-00 00:00:00', '2012-12-16 15:32:40', '2012-12-29 19:14:20');


ALTER TABLE `profiles`
  ADD CONSTRAINT `fk_index_profiles_on_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `fk_index_roles_permissions_on_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_index_roles_permissions_on_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

ALTER TABLE `roles_users`
  ADD CONSTRAINT `fk_index_roles_users_on_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_index_roles_users_on_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
