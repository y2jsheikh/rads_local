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
define( 'DB_NAME', 'wp_rads' );

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
define( 'AUTH_KEY',         'BP-!.1!u.u8R~V4=:+`zcs-ihwYFJY9Q_swtqbI|nerz3~Ez==)Z!hTW^]0]7[iT' );
define( 'SECURE_AUTH_KEY',  '<E#{Bx/@8D>-1AKX%+/p/<-f JcFSLTgY$/?|H,Tx~ZvEAo!%Zb~i>OliU3V|m`f' );
define( 'LOGGED_IN_KEY',    '>Is>eB^k@p?^8_HFWr4r:InP5pU+/cBrM#Vh+G4f4$idjCE|+:N{j0YVhZ?#bho~' );
define( 'NONCE_KEY',        '-jeud6 Zwo!Oi<@rT}e6^UNnf|a[zT&n])|*(k]yF12*.1U?qVASOw!zn3Y!-6#&' );
define( 'AUTH_SALT',        'b}=nUDD&5TB.`t89DB|IXrZ1,gT~Qqn=v( uDWUcWh^10Mh]2]@g>nQl`Pd}J+O,' );
define( 'SECURE_AUTH_SALT', 'GNl[Qz04Xb>=t?y4l@P_[rGiIF]Dt-%/!rTDBtUNHzro0OZ_M|3|w<!n15{0uRYL' );
define( 'LOGGED_IN_SALT',   'a5VZ$OX)<FGCFy-8#8/@Fb9m:WvP!#Y>0HHk1_OZE3pJ]-i_}PW6D; <E/ 2M:yM' );
define( 'NONCE_SALT',       '^ju[;Iu/Fb$W_^T eR]rj5>8)+NLNd}mq~M+|yX<Cn8I1^J)Ew6LwL7p6WF#C>m ' );

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
