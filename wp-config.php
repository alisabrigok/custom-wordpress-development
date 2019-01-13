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
define('DB_NAME', 'stc_pay');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't1g(&rddk2085>V<loDUMFY`%Dj=>/lgkwJ*dy7>!(Xn?Q.)FBAIYAMvB?|Z0!;{');
  define('SECURE_AUTH_KEY',  'XykkN?$bd2eY8Vfjk}lz*/:9UQ-Kej+Kn|V:%l+l8m|7Y^[3A9,X`wb+A}#@nZhH');
  define('LOGGED_IN_KEY',    '^2ecwup%;|IgK9|VxA.QM-2iF2P,/~OH-#>g#n@}_tlA*kQ}t$o-z_1@y*lR!:|!');
  define('NONCE_KEY',        'H|xAs]J>IqQFk/KfW4{`}A-X@)R^M.?#RF~>3dWeV-E+0{_3#n8`2?_]1rf^M.j:');
  define('AUTH_SALT',        'a6wWVkQb]wiMOf17ks3}q510dM763oD:G.A).^My{NNk+:3EDG})/+dC}s!eME4I');
  define('SECURE_AUTH_SALT', 'M#b#||)fwf2>JO9-t/`QD(9 E`A?Wz`endYl$dS7zB0e>JhJ@|x%eK+C(|xa,$CE');
  define('LOGGED_IN_SALT',   '4KI1;6op8|mk<<+JyBs3*[sq4aG)]~jQ-mgb-xd[+@bGm%K.`N9J/25`isI05.)c');
  define('NONCE_SALT',       'zKX,k[6B213,>]>%wj|5_Bco:AY[ci@N|GUUZM41H2_R-cmRmho&61*X|afPsp4;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
