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

use Symfony\Component\Yaml\Yaml;

/** Root path */
$ROOT_PATH = dirname(__FILE__);

/** Include composer autoloader */
require_once $ROOT_PATH . '/vendor/autoload.php';

/** WordPress config in config.yml file */
$CONFIG = Yaml::parse(file_get_contents($ROOT_PATH . '/config/config.yml'));
if (!isset($CONFIG['IMPORTS'][$CONFIG['ENVIRONMENT']])) {
    die('Invalid environment in <code>config.yml</code> file');
}
$WP_CONFIG_FILE = $ROOT_PATH . '/config/' . $CONFIG['IMPORTS'][$CONFIG['ENVIRONMENT']];
$WP_CONFIG = Yaml::parse(file_get_contents($WP_CONFIG_FILE));

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $WP_CONFIG['DB_NAME']);

/** MySQL database username */
define('DB_USER', $WP_CONFIG['DB_USER']);

/** MySQL database password */
define('DB_PASSWORD', $WP_CONFIG['DB_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $WP_CONFIG['DB_HOST']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', $WP_CONFIG['DB_CHARSET']);

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', $WP_CONFIG['DB_COLLATE']);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', $WP_CONFIG['AUTH_KEY']);
define('SECURE_AUTH_KEY', $WP_CONFIG['SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY', $WP_CONFIG['LOGGED_IN_KEY']);
define('NONCE_KEY', $WP_CONFIG['NONCE_KEY']);
define('AUTH_SALT', $WP_CONFIG['AUTH_SALT']);
define('SECURE_AUTH_SALT', $WP_CONFIG['SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT', $WP_CONFIG['LOGGED_IN_SALT']);
define('NONCE_SALT', $WP_CONFIG['NONCE_SALT']);

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = $WP_CONFIG['TABLE_PREFIX'];

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
define('WP_DEBUG', $WP_CONFIG['WP_DEBUG']);

/**
 * Moving wp-content folder.
 * https://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content_folder
 */
define('WP_SITEURL', $WP_CONFIG['SITE_URL'] . '/wp');
define('WP_HOME', $WP_CONFIG['SITE_URL']);
define('WP_CONTENT_DIR', $ROOT_PATH . '/wp-content');
define('WP_CONTENT_URL', $WP_CONFIG['SITE_URL'] . '/wp-content');
define('WP_PLUGIN_DIR', $ROOT_PATH . '/wp-content/plugins');
define('WP_PLUGIN_URL', $WP_CONFIG['SITE_URL'] . '/wp-content/plugins');
define('WPMU_PLUGIN_DIR', $ROOT_PATH . '/wp-content/mu-plugins');
define('WPMU_PLUGIN_URL', $WP_CONFIG['SITE_URL'] . '/wp-content/mu-plugins');

/**
 * Proxy server
 */
if (!is_null($WP_CONFIG['PROXY']['HOST'])) {
    define('WP_PROXY_HOST', $WP_CONFIG['PROXY']['HOST']);
    define('WP_PROXY_PORT', $WP_CONFIG['PROXY']['PORT']);
    define('WP_PROXY_USERNAME', $WP_CONFIG['PROXY']['USERNAME']);
    define('WP_PROXY_PASSWORD', $WP_CONFIG['PROXY']['PASSWORD']);
    define('WP_PROXY_BYPASS_HOSTS', $WP_CONFIG['PROXY']['EXCLUDED_HOSTS']);
}

/**
 * Set the default theme
 */
define('WP_DEFAULT_THEME', $WP_CONFIG['DEFAULT_THEME']);

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', $ROOT_PATH . '/wp/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
