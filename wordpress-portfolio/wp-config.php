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
define( 'DB_NAME', 'portfolio_2' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' 2U?o)WH!F}+aHsMvNZ=q=GRRB+{J}l+x&&!U16W4[sngOO;SH9u8/3 #VRCwmfL' );
define( 'SECURE_AUTH_KEY',  ':iKU#5f2X hCBuX ,%<6`Ik6V^bo~r%o]mx>^d*FpP-&.5(3N&.bFicq%%pzxl]]' );
define( 'LOGGED_IN_KEY',    '^mGjK?l:j5[.APLB?0CQG6Mstx{W;V7(x&}+Kq[TPX0&bFb++>iQ]d.zwnG+o,1h' );
define( 'NONCE_KEY',        'eKk?0rQ3E$RVE!m|.zm&M(GS$^(o~{:,T6D^dJnCi&?g@r8I6=T|k}3oo.WJA_PO' );
define( 'AUTH_SALT',        '+a&(#La?7qQk^8vO~j 69.NWbubSSi1YE%)!5Z1F:ng}dv8xeic;1>$2. *v@^U0' );
define( 'SECURE_AUTH_SALT', 'ruJKnsw,qZ5_}(!v;<q216+d,c>TTW8yt;qDh`bfUTk~fu:L#I?WBJXkKD2EmLS<' );
define( 'LOGGED_IN_SALT',   '2_]zNd:Ow(chPVbxyrtm|DAWAT^)YvQifal~MH3 2I<0Ol*Xlen%Yr{ox#NH^4X?' );
define( 'NONCE_SALT',       'h^_GY^& aJWbG{N+3Eg^8qD_~MH54j}5T2Eos(w5!^|t^Tz}o2/NFnEgJ*nluA3 ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pf2_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
