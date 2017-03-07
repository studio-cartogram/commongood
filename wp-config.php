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
define('DB_NAME', 'commongood');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '>6Z^{fJA[h8Fi{UsUcbv{s&n-UbzMjKg+qc?Pf&;DAS*,)?d*W7P7[+i3 O#-3c|');
define('SECURE_AUTH_KEY',  '$uPA>A-|q)eAI9GV-mSIXE=Wy@2GwL=/wT(CCD;CC=1V8/5c+dp+7ND LI(@Z5DH');
define('LOGGED_IN_KEY',    'r%@V:n6ahh^r*=GQc[(/a$m.XK%8;*$Gvj/M33Idq6JSrEG:| UE.jn&)]5}6(p5');
define('NONCE_KEY',        '421gyEdENV)qXLLbY;3r%/Y-lRg&Ewgd_#Bbj!*[WI`WGq|XW_?,S?m_A1~KY);!');
define('AUTH_SALT',        ',)BhnqN] BNZ,mh:qTJ#3R]|A&U,L^7PlMxbjINTTy/W&duY=~h)dMzAQm.cZ+Vc');
define('SECURE_AUTH_SALT', 'n7E2OStJ=vDQ&B,<FU;F-,Z+!Y3bQ#pXBr|!l?+VtfAj9?U LG|#Jw~UR9?;fYzY');
define('LOGGED_IN_SALT',   'F8>}gOAS7t}+lTEh%wt&n;$btA.3F(A+<Pm0WL+tDwzp{hWf[gPrJ`u;KX>U7E1,');
define('NONCE_SALT',       'P*kEh~&+`Ws9&N~{+a6M{2|[oH7}$EE99cm7h:k6^k]$ lK+Z+dl#Q8G-9#^?%h@');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/cms');
define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
define('WP_CONTENT_DIR', __dir__ . '/app');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/app');

/**
 * Disable external requests
 *
 * This is so that users dont see update requests since things are managed through git
 */
define('WP_HTTP_BLOCK_EXTERNAL', false);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'JETPACK_DEV_DEBUG', true);
