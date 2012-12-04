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
define('DB_NAME', 'rslh');

/** MySQL database username */
define('DB_USER', 'webmaster');

/** MySQL database password */
define('DB_PASSWORD', 'Cdilan10');

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
define('AUTH_KEY',         '14 +[8?[pEw(^&[61_B*c=j>zIS-+BacW*`g{Z0Tm:Ck$e j5tyIJ57?a!ZgM!p$');
define('SECURE_AUTH_KEY',  'u9_!]1w~vMg,zYX:fV#jXrB(PT/JelQQK827GHiStba>3YG2br`x!=w2aMO`BD/%');
define('LOGGED_IN_KEY',    'Qav3 tz`q,))4k4&+:$F=t_4oOFZfJmbuWPyLMSM47kZC8nq*gnB,+fys%pRJK@f');
define('NONCE_KEY',        'QCYY4$GR(uwU1_c0E>4=OgV:?gsXqf(;Ae (1;e:E.G$=FDLA58?zh^ 81HCIp&/');
define('AUTH_SALT',        'ip,8wGHWNOg/rw,;*<%t<SY[SC:o#yvdt9a:`,+FNfAGm|uo,V~{j,}LW%>7ly}5');
define('SECURE_AUTH_SALT', 'G`R&tNF)p=<Sazi_+-Z3z|D7^30{t#>pqNyEVn;%M~92 nLos.<r:_]0p3@qdNja');
define('LOGGED_IN_SALT',   '@5`C6]:^JAq18t7hBCG=sI@^4q*Za(r2R[?Jg1LE^FDQ3.3I!+5?4AYy-koOuT*=');
define('NONCE_SALT',       '2-%FbYPJM#fG$>xclIcju[V+t~bF!&g66{<>tR0C<HT$;I=bxnwq489>QOv;E2:r');

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
