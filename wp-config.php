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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpbasics' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'yqRKt<cnF^^cPI<,?`ixUk@):a2LU|;{65n_q7MX}/^krO^uKufzeK;,PX{/z2Sh' );
define( 'SECURE_AUTH_KEY',  ',xS0KVR2_fqUz<MNsx;$_}_TE4)A^hso<-!?4(/}lk)C`TpYnZ{$xR{NhZ)~sP/j' );
define( 'LOGGED_IN_KEY',    'qcx^g=UKqP,rO/|L:P/aQcrYN[0Jc_|RTFfw[T[R<-^[~,9=ie-8Ktk vdGfm6,:' );
define( 'NONCE_KEY',        'Yl#8pB}}`0a5#:qWVWT@ERi 0xTVX6?uY[M>K.~.PQdGPoh-vjcV)V!G[g5N>j=~' );
define( 'AUTH_SALT',        'dQ&DEZB/J>9w~MT~gXVm9S92`]Hdql57gQ5p=9O|lmWHB}oZ[QMxDQ|2XH0fdFRm' );
define( 'SECURE_AUTH_SALT', 'jZw*y3OY//Jk?.3/_fk`J|X8DT x59{l$^jK2P7lELr:)GaS-W*wbp.R}^HT-m 5' );
define( 'LOGGED_IN_SALT',   'aEY=v8]){&wuuk:j4VdQ~O#l[@|sn<d<{MZMq--a[_5v2t8EC?X]%m7L}l-m,N-b' );
define( 'NONCE_SALT',       'O2yEuTC!y+]Tu%l874Rlr&V)4$2v2 gd25&c;m6*@o=dXI0BD0Jt{S}h*FbTQA3n' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
