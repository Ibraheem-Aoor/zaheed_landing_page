<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
$_SERVER["HTTPS"] = "on";
//END Really Simple SSL cookie settings
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
define( 'DB_NAME', 'wp_site' );
/** Database username */
define( 'DB_USER', 'aurora' );
/** Database password */
define( 'DB_PASSWORD', '4902903822343421090' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
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
define('AUTH_KEY',         'JBI&Fj-u8KG~m#Z@-EJk(S5W+.yi7~FBgYYat,ZMOjC.=V2`1c5E8aYvKAC{G:b9');
define('SECURE_AUTH_KEY',  '+RIpon*M]trlu%Yq>Xr:k#_*v+rlm42DEbNWvMaPao~m2L@:2z;4de;Q-u.!iWL6');
define('LOGGED_IN_KEY',    's,a*;}dz^$+|.T>qM{y@qU/e.7||_+g-<G[&+F(hmO:Hw*>PQa@7bEG%zcXs|5/{');
define('NONCE_KEY',        'IK70sUJUj1lZLY6$-RI2J,-TyuNPr5<Rsr`|>A_JVNgVA(^!v,`[dROq_PGQU{_Z');
define('AUTH_SALT',        'rFvZbZ,dJZDRv] h^L4_oqBgc|`|e+esvbc9>03iu=|`2@I`s#m4eSa95RDNL8)<');
define('SECURE_AUTH_SALT', '#b.| .Ia&,;y&:O+>(_;mj^$J6~3 k-#Z I=(zdLjI09TT$R7-H?C s2fNcnWP6K');
define('LOGGED_IN_SALT',   'Cym+G~8`v4^rcj$J/ORc7TOl6?0V,v|9ieb&&p2,JF)UZ&e@i#-Bo21F[}>%lxT)');
define('NONCE_SALT',       '$1$</~;+M$xZiA=iugok7|U`/cvAwRs$^^gk,Xc;<|m<S[8hadLl4M%3cl&,zQtH');
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
@ini_set('upload_max_size' , '128M' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
