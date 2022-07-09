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
define('FS_METHOD', 'direct');
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'practisewp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

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
define( 'AUTH_KEY',         '@2]QtMO+sis[0Pq:FD4ztb]5dm;r,  AyR9d^&$2O?[)jRu<<WgFh!h8Xj_3Cu2B' );
define( 'SECURE_AUTH_KEY',  ')!iB~cPA}+EMiy!,|BNQ#BJS^AOZy nN<u.&^}<L/ng{nSs651emnR!) yL+Kz*W' );
define( 'LOGGED_IN_KEY',    'p,x{PW4R>exdXWMTn8zg`_Hm[YX*Wa:x(K^68y(K(7&Wr`8& Ak9xS@[vHJ=ii5a' );
define( 'NONCE_KEY',        'KJjW&#{w-krh8gl+G8EEjMsSTFEchrXE2I^DMEp>|V(%Z!p-901KbAwEnz-{t.[6' );
define( 'AUTH_SALT',        'D&m%Fc32Z?]=]I<+WdEjH6cR+Rv OdXF$rL}S@1TeT;y<wA0<VWd=K44Uk@O$m&8' );
define( 'SECURE_AUTH_SALT', 'rts-DQK9s7)ny}g}_bFDB~pvK?Y9&oKc-Dih^or;dt1l_[<NgzhPID%Va;*L4[B5' );
define( 'LOGGED_IN_SALT',   '(hqz9Lr$iu6yprnkW?(#&dSj6|YXzXZ=/rumA!HJ6[_8#az{*ZK79wofc5q#2GR*' );
define( 'NONCE_SALT',       'Afv_}.@JO4Xg)J_^{e,;x~*Qks/ue2;vq(Q+G77KacR4%]thfJKGUA}zOx@<RJVM' );

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
