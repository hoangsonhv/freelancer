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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'wppass' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',          '@^yTN,y+UzgeP0LlJl2qAl;.=XL!rQB38k%ky@Oopx|{Lp)3mj3_{Z:eO>~6]SjU' );
define( 'SECURE_AUTH_KEY',   '({x`Nzz,a.,YRT963b3%#?d=sM,Hr6MHfK8=;-^B(plsuYgYC7>h$;/nkFtz[5JQ' );
define( 'LOGGED_IN_KEY',     'R1I-(22dvV7$=>V79``yuhn)zlQZ3YLj&i=x!88K-sC_=zx!3g2UPSvt{oD:bRNt' );
define( 'NONCE_KEY',         'NFR7;TCXbAPw7VS!>aV8/Z/tl.EcENwm*n bkcLq}miYYO&2<qyS^P|07}!$#5w7' );
define( 'AUTH_SALT',         'g~adc(y[+[fJS~NHD2/ ^86k`bS[SFKr,zA0t{9r*WePNdE;(]SaTDWu Vg6vTO$' );
define( 'SECURE_AUTH_SALT',  'L_Tc4%[rKs Eb4I2O(/{Qy7T1bBy.6 X;YvBY(?Kr~0U32=J~^CgV`hcyX*#[H0$' );
define( 'LOGGED_IN_SALT',    'M*)!M%3cEe0LR|G_BQA!Ru3qXX:!v$:RQbXEf,1=+:fC6zZQ^|80>~7Kkba_F)%7' );
define( 'NONCE_SALT',        'Q$FOtJcEV</R/1)GGS!r|<,`L!1o%GDG`K:oX?gDAD@>J~w&yt=lz)]nQ1}4dR=p' );
define( 'WP_CACHE_KEY_SALT', '578#k%?P-[#kMZKBV#NmG_6?*ey`b0?^Ha.`c kF%QDAHA.QTX^Id5MkpV3qzgca' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define('WP_HOME', 'http://localhost:8888');
define('WP_SITEURL', 'http://localhost:8888');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
