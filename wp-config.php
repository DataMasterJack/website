<?php
define( 'DB_NAME', 'bookmememories_db' );
define( 'DB_USER', 'bookmememories_user' );
define( 'DB_PASSWORD', 'v41HYA7JrWct6hpm' );
define( 'DB_HOST', 'localhost' );

define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

$table_prefix = 'wp_';
define( 'WP_DEBUG', false );

if ( !defined('ABSPATH') )
  define('ABSPATH', __DIR__ . '/');

require_once ABSPATH . 'wp-settings.php';
