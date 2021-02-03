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
define('AUTH_KEY',         'tGjH1u5bEXqeg5+BTq2hqROF74kOgfcaEOz7/vzZyXu+D4wcGyJ+jfYH1I57yq5RcNxg5WvJ+yJPWceGRUFYfg==');
define('SECURE_AUTH_KEY',  'usl2KzgfJCCQAuPMp8S/gfh5FFgjb3AgGa49r3pxLaYQqgeKZESakpiPju34Dxug2QP2GWq9d03prnQZYwEX1A==');
define('LOGGED_IN_KEY',    'KfNKi49kPsdvcVoBYDBSrWw9Hfyi7xaXt4SqO2za8w/2SEXrHJWdEyoK3YrT33AyRXULeAzWQ6JUcHdcGN4Y6Q==');
define('NONCE_KEY',        '4Zc6PfiN6C/TcuH5FNAwRzq9x0Zm/IXi0THnA1HYaX85GJd688KzKqbb6vOs6LPOStHTi9vANy6K2DIKeO/Zww==');
define('AUTH_SALT',        'XcFMNJKYr1Aeb5Y2uI9HCj0gTq7iyMLgX+xX6657TwoKz1wuqX4Vb1mERuHrWLJeKpw7jgh3rZdoZQKbuFxMTQ==');
define('SECURE_AUTH_SALT', 'WT88kULlU3mc40ceWYrpG/h6HzSiucp92ZuwabTYvoz1VkubogD6EcUQ+cgA7WIdqteHWOsqpFwdDat/qT5oGw==');
define('LOGGED_IN_SALT',   'NrNQzh5zFFaDVE3BxKO2tfkEWDDU7k0H4fbePSvgHRaLg8J5MdacEmpr9PgqkyR4Kdzjd9q2f/pf3v4STRRcNg==');
define('NONCE_SALT',       '/Zc8vRg2oi/B02fZgVoZHjry6yywcPUJLsG3yPLB0yKp9dh2PN+RBRgK3A0jQMpHn/A6+xtghTj9vbnrBBCUPQ==');

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
