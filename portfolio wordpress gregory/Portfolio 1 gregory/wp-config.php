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
define( 'DB_NAME', 'portfolio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ',::knwZd?}BJP`.S=Q0OVBDgTu&Xo9LE%-ZmyH/-NYtXnw2^ns!&!<#@_RCND$r{' );
define( 'SECURE_AUTH_KEY',  'ZLT tgg&=x$^Lzo9*tESVAV;Upq{|LvVB*br;nn(._2y@a/9Xj#3Ad`Vn9+$lIwO' );
define( 'LOGGED_IN_KEY',    'D4 Ucd;vum$U_(9Vd&dgA^`c8{OKfW/y^b1Zv5/CG?`pPw3LMQ)oRxb#3BJ6iNNw' );
define( 'NONCE_KEY',        'Ei<2e13K:c[!nM]F5VU<Dm!5 RNt-&S=fYz R~-s@DTV:|U)6y#Cz]$U8p1x>e;,' );
define( 'AUTH_SALT',        'KAd>m&Q_.BGd9Pyv5?{25aS>BRq%Stn_FJVW*hu3p-(ZKCR!ZO y2=jqr =BL!QT' );
define( 'SECURE_AUTH_SALT', ',OuOKqjtekz!MA:G;~z@k}= Cj`&g&gHRfvZX,GhZJ(=89PsqA:*x9-6*&#,S0(W' );
define( 'LOGGED_IN_SALT',   '&,}o^29mpEz(Pq]ILvF5B]0 ~:%S_Q,u}NHfPtQ|[_t15]fK6!ra+yM5I @S*+}@' );
define( 'NONCE_SALT',       'k-G$_{Za=u<6@@S;[z2ig,A#?8Y{>ED~9&lrlUD[Az|nepsq&HtS6gf_[ShN_|}J' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pf_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
