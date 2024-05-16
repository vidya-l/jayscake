<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'jays' );

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
define( 'AUTH_KEY',         '}z_TlUDSLoE,8sYb]s,rES5k?3mB>qm@g)ajkykOe7|l>84e>SR!JhW9BiBsqLJ!' );
define( 'SECURE_AUTH_KEY',  '-=~>]&fW9-GCy|Q??:,(M[D$-,<=Aj<wn7+%1f!Oky+A9MS?@<<59#W)ui>PabJ,' );
define( 'LOGGED_IN_KEY',    'X%1LniE_X7>M9W{xo}@CYw7X<ya,JX`l<w_Q*{9l9gkOlJ?aPM<kiRwU:DOyTp0,' );
define( 'NONCE_KEY',        '8FIZ/D81P;`>qj.Rh_/!t-<@Hjs kE`sT?-vp/ewO V3cq<!`0K/Lm.w!&OK2u:Q' );
define( 'AUTH_SALT',        '{)>,Y0%SOH0$u=/f7i;Bz$Uuv(<xB*ZRY({&Y:]peOA(,GD+BGOb>l$b>9dO%h0A' );
define( 'SECURE_AUTH_SALT', ':AKpgiJ=/J> :9-^JH@t5TJD&#X,c=5Z9]$gm03LD.t(~v1qFueO,^aePN_GE$D]' );
define( 'LOGGED_IN_SALT',   ']Z+$m4A9Lh|o*l;3N%fwyXYINany|EK]Hxhta/n{Ef+:794GTESN7o]uKKE4;Sc_' );
define( 'NONCE_SALT',       '5NS%/Etq&+<~=:XYNUC!m<f~<X.rlFsWg`t+vSX[qydCdWmKeJV=t.mq vft^o-v' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'jk_';

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
