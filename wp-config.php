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
define('WP_SITEURL', 'http://kelioniupaieska.dev');
define('WP_HOME', 'http://kelioniupaieska.dev');
define('DB_NAME', 'kelioniupaieska');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'nNw]r!IzR0xJ}R,@RvX`=lF$?3,%gpHy`=~6p{q<Q RL]cmbp*DScY[hwLbzL?cP');
define('SECURE_AUTH_KEY',  '|=GY=zv?#z~cL~He>S/~R>?gOREh({jUbiB?>?kKd!niZdT1#R^cf~fcbSc,reO/');
define('LOGGED_IN_KEY',    ')(/i`}`xvuBvkLG0xXA|cyVhR;A~7-r0gJ4I 76-A~/ |wE(dd g?:D;HrD!I%P?');
define('NONCE_KEY',        'JXZ_`|gLkQM{wRMvGPL+JC*!SMu;lMQW[NT/&8HgMTO9~p8)1l!)g)NF+oc= 366');
define('AUTH_SALT',        '$_fTn5Bu*M+8P<ljOQQJ?`|Am@.w9b$<5r)%k]A;Ronj HWj/dK$^uvaiD(EWd q');
define('SECURE_AUTH_SALT', '*EwPCg(a=CmhzN(u+/?ofe-.GCE0KelBO.RBb VDsNzdHF@13Kt804IN*_+ASk5l');
define('LOGGED_IN_SALT',   '0:!4Z#FTkkRMJz*|SPhg8814G~cLYzdLVJ5i@<lC~(k-q)] N:8qo3c]pb ETI;L');
define('NONCE_SALT',       'p6LEQ!3NKV@!%=L/kVEE4I=i7>@*K7 4C5Ib-E]/2vV-FdCh9KN(IJ3wr55Zch2I');

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
