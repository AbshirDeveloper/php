<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sales');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'abshir26');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'o{SS[iEk3pn(Z`UXhgX|F0r&(#>i>&Sz(>E{V*t/%MQ5.p` %-SIFx`J8M%d>O-f');
define('SECURE_AUTH_KEY',  'X/6,Koh$+Amy1ICM(`6J_ @5o;f@}a^D#x^5W%*T{*`Sf`0LiuA|gd9*^gQu(H]?');
define('LOGGED_IN_KEY',    'ah{ikZla|:g8]Q6{{V&(<8Wmo(0Oqnl;HWhZ}}[-Q3c-5dcc*rAhuL0xrx&}tSjV');
define('NONCE_KEY',        'C?pQ vQu$YGGBIygTE:_BT4E5>#VW@CZ)sfQjrsv<4THX7;HN#Zt)% E9F2fU`}9');
define('AUTH_SALT',        '_WG*vl/Tn-@I?QpTgKP6@v?!+&WNKHzvl:Hw*$8H@v$xDEuAu#{#aHSw[ETKVvyP');
define('SECURE_AUTH_SALT', 'NILS4?V90DQ&Jgv#X1Gz|xSsa*d@y/|ch.UT`$7oA6g+CIaxnk#!<A)-4;~ wLM&');
define('LOGGED_IN_SALT',   'WQl?!lVAFMUHmAg#8RQM8l!. !)wb/2i,l.fX`-0&upD,l/2ma#_/4`IiS#Aea9~');
define('NONCE_SALT',       'fwgG[5vqX +(78!TJi+n*r,^AzfrqJ4YO.hg7k8WVJyX}HE Qo}G%{CkZh*.2wgB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

if(is_admin()) {
   add_filter('filesystem_method', create_function('$a', 'return "direct";' ));
   define( 'FS_CHMOD_DIR', 0751 );
}