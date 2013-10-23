<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gruponorconsulting_com_wp2013');

/** MySQL database username */
define('DB_USER', '346494_8f9bab76b');

/** MySQL database password */
define('DB_PASSWORD', 'Sdy9j2P1mr');

/** MySQL hostname */
define('DB_HOST', 'hostingmysql56.nominalia.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'awjnkr5sggiszsczeezmmegrad5mwv33yqjwwuuitkmkqywl8sqjlxikcbyj4hfp');
define('SECURE_AUTH_KEY',  '8w0uspyw4vswvahhoag4r8hywgqyutgtehnpxpopln2qga7gotjc7obhzdv3dgrd');
define('LOGGED_IN_KEY',    '8nskz1uzlvkn9ii1oit7zpa5qvmslvdhlkd1jjz4aqzz2svkmywupqhqp0akro7f');
define('NONCE_KEY',        'ruzsi1wo0tyofklt7isq69buf8u3siecxcppztmnz1r21upfstkfidglailhqjmi');
define('AUTH_SALT',        'mrjlkdhlthjzjdmjbgdtnchvxl8nmgiw0imnpfovpb9oomc1nxs2iegzirvzxdlz');
define('SECURE_AUTH_SALT', 'amj1nzazupwvmihli5db0k26rwuupd8hvk0mmm9ew3riqpuqtu1dtkvu0lc3j8ls');
define('LOGGED_IN_SALT',   'xsf0bpn14kghyicp0idxdb0xkdxnrwfim1wlqpku4mla4rqhembayymnirlna7k5');
define('NONCE_SALT',       'z7lbabpg6nun3jobtkwwfrfvlaz0uxlzdiussi5mchfuw9pttbnamzp4pribe7ju');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
