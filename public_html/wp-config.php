<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'admin_57292' );

/** Database username */
define( 'DB_USER', 'admin_57292' );

/** Database password */
define( 'DB_PASSWORD', '2f9cf02aa3d288ab0968' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[RgXex8?IN0j)A9V4X0|m-flx8AX 0oG[g{c+oGxMis:*`$jPYI4>VvtE,g0J y8' );
define( 'SECURE_AUTH_KEY',  '`]Eu`Zd;(0y>*qbT8CNHbl%S_=s+ Xn=^;w0Q],_PwtU,r-znox]eb<t@!yz%X*#' );
define( 'LOGGED_IN_KEY',    'BOaN+<UI,~n<HgWY}$gj1e9;:rupT8p1_TX^PM@b{V]A/h%Z4HC(.N]kd)$lX@n|' );
define( 'NONCE_KEY',        ')*l`OUR< )vV7-v= ?rJrv[+;3b ?N`2[$L>J*/>1Z:WOA~42@8s aYM2CX) 9' );
define( 'AUTH_SALT',        'aPfnh*l^M)gE*[:el0&5e@AYy0s09kl9a9T2Q/SU@8M(A%mt7`gKft&sep_Y#p n' );
define( 'SECURE_AUTH_SALT', ' 8ANslssx,ieE78dy)q+8$=X:b.CMY{{`&{P).lgtH7+o,+!+)OSN)D4c} yt-+3' );
define( 'LOGGED_IN_SALT',   'bB/qk12:*PDYxbHi(*@2pX}9V&[UPv{`R_GXi m(?/:K]N^L~VF.?`~9!Qv`HY x' );
define( 'NONCE_SALT',       'g(&l#;36l(66x;Jhky/Y4[^H%GJ8GoTqL1P13H|+GyosRtC*U1wx<D#SV|3jsX=-' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';