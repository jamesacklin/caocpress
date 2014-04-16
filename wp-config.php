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

// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'caocpress');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'root');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'r0mOjW-.V?=)0ycRHm-?P!3h8Q9/V&T<vcqEFbRhGmU+^:#,A OquPiR-15MD/t%');
define('SECURE_AUTH_KEY',  ' |}P CM2+Ab>Qw8C,}/Oz^X^>X3*{gb+@g*3(ao eVNi=H`xys&U^w6rof,W++]O');
define('LOGGED_IN_KEY',    'MPnXsJ5-OPpm(M}QF0@i^E-#[H5&8wzh49cjGAQ0$e]sQ%<0i,`PpQRal)*R:n4r');
define('NONCE_KEY',        'iKwK N:*}7GuQ|l42;_^f{Qw8+Q5y@dHc{NcYzC9 btuPbd+/n(13flWVW/{(@Pb');
define('AUTH_SALT',        'P};bA:Y9Xi6M%++fA=O*4^KM4_5$L{(fK(U*jnKmS+vJkgzQfhq*WW7]?(r`3P^+');
define('SECURE_AUTH_SALT', 'sGQYNk1wp1)pbs=3iA@p#eOXgOXN_v0|}L%(&p!R_@_w#(86qen1q=8iG}~GL}[ ');
define('LOGGED_IN_SALT',   'IUy44k; oPCfg#,Ht8CHss;#I?o!Pb#*-[$z;~b sjIRQw[4hVovK@Di9)kPN{?v');
define('NONCE_SALT',       'B?~54/NM@9-w:+l#)^t^ni {pi19zly/2d^`LXUNBmz$GVEK=gMFz;_XU<8Q+t87');

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
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
