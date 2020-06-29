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

use Symfony\Component\Dotenv\Dotenv;

/** Include composer autoloader */
require_once __DIR__ . '/../vendor/autoload.php';

/** Retrieves the value of an environment variable or the default value */
$env = function ($key, $default = false) {
    return $_ENV[$key] ? $_ENV[$key] : $default;
};

/** Load WordPress config .env file */
if (!$env('APP_ENV')) {
    $dotenv = new Dotenv();
    $dotenv->loadEnv(__DIR__ . '/../config/.env');
}

/** The name of the MySQL database for WordPress */
define('DB_NAME', $env('DB_NAME'));

/** MySQL database username */
define('DB_USER', $env('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', $env('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', $env('DB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', $env('DB_CHARSET', 'utf8mb4'));

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', $env('DB_COLLATE', 'utf8mb4_unicode_ci'));

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
require_once __DIR__ . "/../config/salts.php";

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = $env('TABLE_PREFIX', 'wp_');

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
define('WP_DEBUG', $env('debug', true));

/**
 * Moving wp-content folder.
 * https://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content_folder
 */
define('WP_SITEURL', $env('SITE_URL') . '/wp');
define('WP_HOME', $env('SITE_URL'));
define('WP_CONTENT_DIR', __DIR__ . '/content');
define('WP_CONTENT_URL', $env('SITE_URL') . '/content');
define('WP_PLUGIN_DIR', __DIR__ . '/content/plugins');
define('WP_PLUGIN_URL', $env('SITE_URL') . '/content/plugins');
define('WPMU_PLUGIN_DIR', __DIR__ . '/content/mu-plugins');
define('WPMU_PLUGIN_URL', $env('SITE_URL') . '/content/mu-plugins');

/**
 * Force SSL Login and Admin access.
 */
define('FORCE_SSL_ADMIN', $env('FORCE_SSL_ADMIN', true));

/**
 * Proxy server
 */
if ($env('proxy')) {
    define('WP_PROXY_HOST', $env('PROXY_HOST'));
    define('WP_PROXY_PORT', $env('PROXY_PORT'));
    define('WP_PROXY_USERNAME', $env('PROXY_USERNAME'));
    define('WP_PROXY_PASSWORD', $env('PROXY_PASSWORD'));
    define('WP_PROXY_BYPASS_HOSTS', $env('PROXY_EXCLUDED_HOSTS'));
}

/**
 * If WordPress is hosted behind a reverse proxy that provides SSL, but is hosted itself without SSL, FORCE_SSL_ADMIN will initially send any requests into an infinite redirect loop.
 * To avoid this, you may configure WordPress to recognize the HTTP_X_FORWARDED_PROTO header (assuming you have properly configured the reverse proxy to set that header).
 */
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
    $_SERVER['HTTPS'] = 'on';
}

/**
 * Disable all automatic WordPress updates.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

/**
 * Define constants for PHPMailer configuration.
 */
define('PHPMAILER_IS_SMTP', $env('PHPMAILER_IS_SMTP'));
define('PHPMAILER_HOST', $env('PHPMAILER_HOST'));
define('PHPMAILER_SMTP_AUTH', $env('PHPMAILER_SMTP_AUTH'));
define('PHPMAILER_PORT', $env('PHPMAILER_PORT'));
define('PHPMAILER_USERNAME', $env('PHPMAILER_USERNAME'));
define('PHPMAILER_PASSWORD', $env('PHPMAILER_PASSWORD'));
define('PHPMAILER_SMTP_SECURE', $env('PHPMAILER_SMTP_SECURE'));
define('PHPMAILER_FROM', $env('PHPMAILER_FROM'));

/**
 * Disable theme editor and plugins editor in the dashboard.
 */
define('DISALLOW_FILE_EDIT', $env('FILE_EDIT', true));

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/wp/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
