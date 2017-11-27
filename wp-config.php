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
define('DB_NAME', 'films_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '{F!C)%ez2^/<pB6[$3aj@!MsOwPZGF7%4d/4V~ZR#fa@p>v@d`W/M%yYTvThV>Ln');
define('SECURE_AUTH_KEY',  'H@)Zd_2hd#OvVE]0t@;92$i;&8YVv,f$3z)ciAH(Pj-b~G.Csz0?xOP0AS^E&!t;');
define('LOGGED_IN_KEY',    'EF4U4Sc<I@!e$q/pjS?^2-uuP4ojr`NRlW1f![I9kjv nfoZz5;Cj3Jg6Vzq~J52');
define('NONCE_KEY',        'gc5)u3^dc2qF?nn,.!.<Ns J43Jbohq@dm,u/N,j32-h:&q{)#>hCz<hmKcovsra');
define('AUTH_SALT',        '7G~XLHx+KErz mB?o5j8Nr>LrC?s)b7<+QT;}fdQK|}:+TsC+Q4:bv0].sE(pE!k');
define('SECURE_AUTH_SALT', 'B^bYq0[DBMKHGZ2`CyFWOk?`+xTNFL?<rM~*x6rps%|*5S3 L6`U-3|-R|h=y J#');
define('LOGGED_IN_SALT',   'm 0pq/K8bCoRs U34-sNp7~f/-A/6Qa>tRw~?yJ9KU]f#0fLt!,mz6W%T%#2l k}');
define('NONCE_SALT',       '(X=BsWM9WlT{]B&o.^olNlXW$z}+?0c]%cH!+kv},`WCG{o[Lsai?M,(Q*_A J{c');

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
