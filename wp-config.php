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
define('DB_NAME', 'kingwood');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'jBrL<B]) }_=t%)zeZ#/Z;mh#!7?V/ Vx/F|>PZq<S+SZmNtV^r%yrRuV&:V1~|j');
define('SECURE_AUTH_KEY',  'ElZ+wbTfCvD?m-{JIQwTl[DFkJ-HP-l:_;L{ 1QgtcfX*g|lm<?$k)c)lP6*,c|L');
define('LOGGED_IN_KEY',    '^L;,w+M9v))Rqb^fJvB!hNEp,|a@!GXXAld42h9 gpRF4O,*75aU9$8,_G#,0F~]');
define('NONCE_KEY',        'xgp=xMhSX*k+/p/g4Q8ekEW?x#2mD.Q$Fz#;SOdLA$V{JUC5+r-#v.thBpbO$LTi');
define('AUTH_SALT',        '|oc]u/:bT?Y+[X#gG}V7,/L[>00yu+4c`u[M!7)2ZjOr63AKFNKGV8rFU;@U(<Zr');
define('SECURE_AUTH_SALT', ')}:2*z&ivg1SiuNc:_<ukLHLNiIr;E~G1 7z?d:l9. ryeZz1iHCpXvaZnbN&geO');
define('LOGGED_IN_SALT',   'G/v>t)837?gPQwN&.<xtwn^~jzl_&VkvnG^m{SM>^@H?{QEa[[W&{YM`kd@t[hd9');
define('NONCE_SALT',       ')NpgBd~-nx+vm|wDPix8^fvv#}[ fY/~M2C_ol(@qE-1XxU>e$$$B0P]P)DIS4zK');
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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
