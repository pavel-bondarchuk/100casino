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
define( 'DB_NAME', '100' );

/** MySQL database username */
define( 'DB_USER', '100' );

/** MySQL database password */
define( 'DB_PASSWORD', 'l10U4mSy' );

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
define( 'AUTH_KEY',         'oNY/wUj|.[7GA|)d9`yH;`N6-bpJLsP~Qo#@ohA0.dQBZ2juGwQHal@zc}E9^Ph`' );
define( 'SECURE_AUTH_KEY',  ':.B1LC~]&t&hPq zy4ECv_FgQ1._C%ne[YLXCn=BtZMl:}hFAkw q LJe5Fmc@{~' );
define( 'LOGGED_IN_KEY',    '& &VVsi`o1<No.ho%fD:4,(0=R-QAr2_3H`o|p;vO^7qc._mwOaz(8>l@^:I5WTc' );
define( 'NONCE_KEY',        '=}Z;N*u2K`c4P4X#HI3ZQVL53lD3/9zg^;x}R1Sydl%x!1<9L3PEwv`XEj)`D;6i' );
define( 'AUTH_SALT',        'V_G6]4}0^.KpF^E,dVP%mbKakn&2O71vRz`m@m&#m*I}0j5ilGT>A3yPR0iCisF9' );
define( 'SECURE_AUTH_SALT', 'cmmTq>whF5;~uJvj{87o{Q_P)sE*5Q=} H/{[$!o@;51ib*m@./4?bz1Vz*~5%S+' );
define( 'LOGGED_IN_SALT',   '6g`7Ys}82KQ{7W.{FsrSA]HMl]T.+,s@D/h-1RL_r{m<cOeeQ:s=[`~3~wazZT&>' );
define( 'NONCE_SALT',       '[%E?{`MyUwe1`(_Pn`x`CL&*U+;{<}3bNu9-&~NgDE)Qs[|@D3#B=LYbPt^xPj_n' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'COMPRESS_SCRIPTS', false );
define( 'COMPRESS_CSS', false );
define( 'CONCATENATE_SCRIPTS', false );
define( 'ENFORCE_GZIP', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
