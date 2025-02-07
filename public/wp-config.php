<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad(); // `safeLoad()` prevents errors if .env is missing

// Debug: Check if environment variables are loaded
if (!isset($_ENV['DATABASE_NAME']) && !isset($_SERVER['DATABASE_NAME']) && !getenv('DATABASE_NAME')) {
    die('.env file is NOT loaded. Check file path and syntax.');
}

/**
 * Database configurations
 */
define('DB_NAME', $_ENV['DATABASE_NAME'] ?? $_SERVER['DATABASE_NAME'] ?? getenv('DATABASE_NAME') ?? 'default_db');
define('DB_USER', $_ENV['DATABASE_USER'] ?? $_SERVER['DATABASE_USER'] ?? getenv('DATABASE_USER') ?? 'default_user');
define('DB_PASSWORD', $_ENV['DATABASE_PASSWORD'] ?? $_SERVER['DATABASE_PASSWORD'] ?? getenv('DATABASE_PASSWORD') ?? 'default_password');
define('DB_HOST', $_ENV['DATABASE_HOST'] ?? $_SERVER['DATABASE_HOST'] ?? getenv('DATABASE_HOST') ?? 'localhost');

/**
 * Database Charset and Collate
 */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_general_ci');

/**
 * WordPress URLs
 */
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');

/**
 * WordPress directories
 */
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');
define('WP_PLUGIN_DIR', __DIR__ . '/wp-content/plugins');
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content');

/**
 * Debugging
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);

/**
 * Debugging
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);


/**
 * Security configurations
 */
define('DISALLOW_FILE_MODS', false);
define('WP_AUTO_UPDATE_CORE', false);


/* Authentication Unique Keys and Salts. */
/* https://api.wordpress.org/secret-key/1.1/salt/ */
define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));

$table_prefix = 'wp_';
/**
 * Define absolute path to the WordPress directory
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/public/');
}

/* Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
