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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rangers' );

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
define( 'AUTH_KEY',         'kj%,.Te+K|3;~5yc:+rYT~j^4Sp=0uQfcvH_.CALYgA#B.sa%BV7~-OY:^ 1Umi$' );
define( 'SECURE_AUTH_KEY',  '$hJ$7zMvR:+U;x*|@C<z%BBUwN0KF{X|;g(zj+Sk*PS<~](j U,gQYAa&/0`Eip(' );
define( 'LOGGED_IN_KEY',    'T2:R#&rSoR3$V2,}K<uWW=!fa80ka]+Z18vNT[4.O6z`5@U|z+4tz`9tQ20Xl+zh' );
define( 'NONCE_KEY',        'aACXP2Xy{jty}Xo5!WO^O|wzkhMQ7H&.o&nWRW=ZIH;R5[+vZDGJ1%5R|<UrU5sG' );
define( 'AUTH_SALT',        'jjPbGp0=2|9Vv%7yVlc@&uSle9*8^4^)n=aY7tDzE=1$f$rg|`4h7V|n?jdIG(jw' );
define( 'SECURE_AUTH_SALT', 'AC 8QlipE.l%x1fGOGkIwGf4oHH}GaX&vA5Cjs(xS>C@]$u4keq)6/al6qf@$i?~' );
define( 'LOGGED_IN_SALT',   '8on<HnhRi@xQ4A[oQ<BfWIdEQ:MmT~1RYKZ[$X|J7fJ&Sm1EPQKH6S(O;iE4=F2g' );
define( 'NONCE_SALT',       '4 ^evBtJstd=9.- _m xv<tfY 7q:JY~Z%-H5cAQ(KyOXITD.Qj.5iNfJzRTNX=3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpr_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
