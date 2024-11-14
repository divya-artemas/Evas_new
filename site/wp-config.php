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
define( 'DB_NAME', 'evas2024' );

/** Database username */
define( 'DB_USER', 'evas2024mwduat' );

/** Database password */
define( 'DB_PASSWORD', 'm-VN.2D)-az}' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

//* Allow svg
define('ALLOW_UNFILTERED_UPLOADS', true);

//* Remove p tag
define( 'WPCF7_AUTOP', false );

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
define( 'AUTH_KEY',         'IJFx90`mj}L>|@=aeKc$POTty%*Kbmn8.?3g7~LE%6@WC+jUL6TRNSg}*J9!u3{f' );
define( 'SECURE_AUTH_KEY',  'e1lu% =;lh+V4m~!YY*;<w7m&>23b5RMz, L8[ff/8V7mdVP4~W?7OaBMi}Enf|C' );
define( 'LOGGED_IN_KEY',    '<%ny@~jYmH6v07$a!4f3v1}Jh4xdKFlV/Uw4}Mo kS67cK>w_Vv8#vkA}WrALy[Z' );
define( 'NONCE_KEY',        'HgEwp`Yl)1Fa%7<,h]@5>V|NcU:d%$x(99]:#*UZc!v1oGpXID[F5i8R@-+n<XIm' );
define( 'AUTH_SALT',        'Bt$5ED{qqEC_,GM1Jmk,[LivYqW1&iaOs*;R8J0/wwOt-~$wK&N/U}ABmY|NTYO6' );
define( 'SECURE_AUTH_SALT', 'u[3q>(C:kwr&`=M{f3S!,Gw^WN(~`^6Y}}4S|QYf>:Tc>2&cnlS#SN4or9BG%4^b' );
define( 'LOGGED_IN_SALT',   '*bjSbc2?GUDkq{aIs)dG4IkXVO&H5`eXQqhIx.pD cD3R^$T$|693$.pNtt*s4J?' );
define( 'NONCE_SALT',       '{4XK_<0BM7Y{Y^PmDAH>DHa8wY255eR`$2Owp1tl0?_n{u=wSY3%r5+V:!%ktJ98' );

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
