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
define('DB_NAME', 'pbfoaeventsnew');

/** MySQL database username */
define('DB_USER', 'pbfoaeventsnew');

/** MySQL database password */
define('DB_PASSWORD', 'pbFoa@pixector9333');

/** MySQL hostname */
define('DB_HOST', 'pbfoaeventsnew.db.10076444.hostedresource.com');

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
define('AUTH_KEY',         '-td?kS!WD}|)-.c;Iavy{AZDjx3W1?0uj;vn8h4S+OV]B#Wc_g|Tb;KjHioUWZ)(');
define('SECURE_AUTH_KEY',  'by%SQwy2-@Fd5O@2f&pJX5@tLnDITW@T.UQ0!J1Qjj>-)e{ho/mR*dJy9a7v$D$i');
define('LOGGED_IN_KEY',    '<(#R5%kuM&n;v$V%}xd&pJI5P]7zb+<tZu7J;ceaI3Z#>h{egWd$1#Ne4$D(taPd');
define('NONCE_KEY',        '~xD~x5Zhp|&Epbh6{TGK]V^%B-3=^7v[e8OCC3M}z2)VLCAdE#Nx<[W5:uqAlO9a');
define('AUTH_SALT',        ' |UJ4rr;EnY>R{3AmNHy-/S.6rV4$mgQ~.|#i].:G9bBrh[5t1{EOi5u9/THgajE');
define('SECURE_AUTH_SALT', '%u@KD{`.T;WxGoMf5-.QXEFMQ+_l}M|G *wU>Z||X$&*AHb3(P1h_{OKv@]SY0wW');
define('LOGGED_IN_SALT',   'IuX8eI6ow#oGxE1/76H-RmwnA8K]f2MX]S,Q1l(,o+&A1MVOWi`)u^ZPr^!xB#ot');
define('NONCE_SALT',       '3Q7TEj(-2DYO%oBk:Jiu5it+KuQT5:Z?QmK>2;Qf5AxfHH=%i:hO!*ShMxQ};KQ]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'eventspbfoawp_';

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
