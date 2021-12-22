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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dixeed_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'E`W1C%ZH0WyYt<VG A8:pPa?DE~kW60ltgh;R4G>I E`_`:j}oA08mwMN63|b5%%' );
define( 'SECURE_AUTH_KEY',  '*g3 xhd[/KIQ5u)KVe4.^X?IdTHIBimiWyftP$fFqEKC|m_*6[=!>VE`,i^2&;j>' );
define( 'LOGGED_IN_KEY',    'n .QC.@&FezR#,Se`/v|b_$Zcw,b4z08^b+_sfbwd30yo?4$m3%wuqg3]BdjhW`c' );
define( 'NONCE_KEY',        '/_`/J.*.VW`sDW]7Rz|Bs-9MA0qV^g{<Xjf-A|[U7J`TYo; _E``(Z[JP6,4[jaC' );
define( 'AUTH_SALT',        'TRyb1CIO,1t@_H}gJUwn@4qdu8ayT&&Kwu9CV?3vFUwVOr/L# t!0V(fiT@:ZC-h' );
define( 'SECURE_AUTH_SALT', 'PMp}um,74jEK2=.$ifVWS29(c,g|*uo$W0,ZUh/{b6qyJAFDGxdo<I+K,TZIx`r:' );
define( 'LOGGED_IN_SALT',   '=%7H5)U9W (XP)?2i=sr8VzL)?F#hrXWB;R+e*i9l3@|+Ba[#Tvn)-XV!jRF{o_-' );
define( 'NONCE_SALT',       '*/4)/,(+d}Jwz]^1#N:fB{URmBan]N?uU4>lxORx[RwyYzBzZTi:bIF!Q?#AUU_z' );

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
