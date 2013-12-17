<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'db113679_wp');

/** MySQL database username */
define('DB_USER', '1clk_wp_P8jAoTw');

/** MySQL database password */
define('DB_PASSWORD', 'fSdNsVtE');

/** MySQL hostname */
define('DB_HOST', $_ENV{DATABASE_SERVER});

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
define('AUTH_KEY',         '6wXa66pl 6avYotRo TAPrIZoe AMAZDxLv uPCKpLu7');
define('SECURE_AUTH_KEY',  'izvhyjBJ Dm47X8vU E836gsvj 6YwQCIcA GSOwBrNq');
define('LOGGED_IN_KEY',    'hHJWqFKj AIQEA8Dq 6JnmOsOn Fwzb3GOj y8wO41pZ');
define('NONCE_KEY',        'frSO8lSp WqFvNrt5 ErUvCin4 VHpyilzu MpPi71KE');
define('AUTH_SALT',        'XRrrIPgA q6K8nPEi iKSmtdfP My64XA7B pVgSPDF6');
define('SECURE_AUTH_SALT', 'XOqvu5SH rMCOwlBS olzaEsGO OmiHyma1 QccwCnDL');
define('LOGGED_IN_SALT',   'zKTOvu7a Zki3Rcet ZgzoB5w3 oN3iWj1u zebhYOb6');
define('NONCE_SALT',       'c2JmsMdo X8re522g ULNyBfvX QkoU1ErA BAzjrWjk');

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
define ('WPLANG', '');

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
