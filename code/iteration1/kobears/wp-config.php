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
define( 'DB_NAME', 'kkobe697_image' );

/** Database username */
define( 'DB_USER', 'kkobe697_imageuser' );

/** Database password */
define( 'DB_PASSWORD', 'TA35imagegallery' );

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
define( 'AUTH_KEY',         '?_iU7BE);ct>E5!l.v&_Apb7?w}putpj@];zz% ( Hp]QF3:SI{cZA;VdE?X#<OW' );
define( 'SECURE_AUTH_KEY',  '>Tb*3)u%?LsC))|;,26zWD:~^60GnJ{DN01TxA;LU$Uewvrz3-un1.p>1qt:Fqes' );
define( 'LOGGED_IN_KEY',    'Iz^p)C{TXhh *N(]C9|.PP2G^[Ct0znG~TPZ<dgc%;|PN!_q@%`nD7*<_p<T:xEM' );
define( 'NONCE_KEY',        'MUGov:mZH |d3{yq(XIpi4=f#zY@NN`Us ;d|vN9{Au~7&4%.Xv4%Kc_*}>4kDBX' );
define( 'AUTH_SALT',        '~stT>C;e>U/p/*Boz#tbc6 pc1#ok8LrxW[i ;X1)l0Wi,D@9?1J(6wud&<W:zmf' );
define( 'SECURE_AUTH_SALT', '93a2hFKj>j`<g@O$V+4/dGTYX!oNB b9H#mY|C7P^OE@+v%@24/6z,glRd=F>=wc' );
define( 'LOGGED_IN_SALT',   'wvD^ibt_svhU_-L.7[l>cRQiRlxY,WbVXOPRk!%x2A?NI*E@a4AE_iV[_c>3*>u&' );
define( 'NONCE_SALT',       'Xj.!_=.Ji[ZD4tNK^cxD,][I>K}roRV#B:!<mygR.)*xXJO(]s!1:nCYXz221)D!' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kobe_';

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
