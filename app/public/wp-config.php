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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QX4waGvzo5MjvBTnMSTzga68zSMeJC5EQCsBL4TmBlyLijSHcNCEeg+7FobHf/U1rga2HmTxyFgWl+ywL/UqsA==');
define('SECURE_AUTH_KEY',  'Q6F4o4Mbb2BPDEODmfZsbKHmHsNhtlCa2DPlEsp1etIoWqIyo/h+73B+SwmdDbJP3V5Dc8W8v9xrrTsA/kPF/g==');
define('LOGGED_IN_KEY',    '4Qi+tbyA97vDNGFalFaTfJNbhuIXCiPyrKLTNJPiDwhnrdPshh8nxxiudKh9RBsx0kiFlaj/MdeIoTMFoMmSwQ==');
define('NONCE_KEY',        'zkLgxVLqyNRBuJAdfan/S803ixnC53VbP2LP+R8RWwJWmS7qxSg2eQ33e+X35xVHm+NhK1p2bgsL4NOw97xH7w==');
define('AUTH_SALT',        'jKb5DWTH7+8Pbs5f5zh3d8OG39M8Wb5XEkRVIQzdN062T9eW6skD9P2n4s5OPGogQ3+82wp4fVNIRaRIPmPp+g==');
define('SECURE_AUTH_SALT', 'TzXSyj0pflXrOCjNQ75MZ51360fbuZRTPOk54E7ldI+merdyF121b3YZa4LhtHQ9CaVMb8o6oIFCq4f7Y5RXyw==');
define('LOGGED_IN_SALT',   'a3Aup1B0DZCYbfEmsip5AXAffWVgkeWEm3VhnED5b9N3AXLl3WSA7BqRSGFU2Z76qJJ4dgRDu7h3eau+TGJeYQ==');
define('NONCE_SALT',       'p9CBLTP0b1d7juHbAtkbP5vFu1B5FdkgaF/+h3InVHgQ9xE4xtqxk98Rpk0y3b7wCXqSj5Qt6EeFBFpj1U+ebQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
