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
define('DB_NAME', 'tourneymap');

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
define('AUTH_KEY',         '3~TZH9oWYFH+P+f|sc5J$2],G|vB7M,,2t8Q]x=Wsbapt`z-QS_fCoM-}d9N`Zcg');
define('SECURE_AUTH_KEY',  'M#i+oq-PI6[aY>#?Q^Po|X|0@=n.R$jP+wlF3m7@[9V:B}C`F$QbdaXKG$ZAq|->');
define('LOGGED_IN_KEY',    'J|-|b9|QtYC54+nG q4Xj:LA{<+>1Yhm/Cu,l6q<CZ_r(+|Ghlvx^u`s<fheEGM!');
define('NONCE_KEY',        'l:p-Z=-m?(LWIg]iH})DZ2C3254e$>+y)|v0+VD-qU(~Gf9k_l+EKJ2Um+l>hU{P');
define('AUTH_SALT',        '|%?DKZ3LKkx6Q+Z|lK;)7UX+{O[d$VC)!gi+=4,GPOx^p:Mi6PVa3+?uru*;~g-t');
define('SECURE_AUTH_SALT', 'SQ4vw9lJ|iQ~.0!Nu5b[VDfyo[9>O#;ypsbhyKIb(kq>[+X2mAg/MqHE7o8nZ?e$');
define('LOGGED_IN_SALT',   'T^5u_LcanY~.xby^F<5bU5n=3Z;+FzR![s|T.|L-{JFP4QfUBrq!#c>hv$Cp|lYg');
define('NONCE_SALT',       '=aBOp(AW*+.urj;-)%BZdIH, 9(M^K[.T%yGW;DboO5C6ksiPw8&P]THUN|32MjP');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
