<?php

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_METHOD', 'index');

define('SERVER_PROTOCOL', isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on' ? 'https://' : 'http://');
define('WEBSITE_DOMAIN',  ENVIROMENT === 'development' ? 'http://bullnet.build' : SERVER_PROTOCOL.$_ENV['LIVE_WEBSITE_DOMAIN']);

/**
 * Views PATHS
 */
define('VIEWS_PATH', PUBLIC_PATH . DS . 'views');
define('FRONTEND_PATH', VIEWS_PATH . DS . 'frontend');
define('BACKEND_PATH', VIEWS_PATH . DS . 'backend');

/**
 * Internal URIs
 */
define('PUBLIC_URL', WEBSITE_DOMAIN.'/public');

/**
 * Local database credential
 */
define('LOCAL_DATABASE_HOST', '127.0.0.1');
define('LOCAL_DATABASE_NAME', 'bullnet');
define('LOCAL_DATABASE_USERNAME', 'root');
define('LOCAL_DATABASE_PASSWORD', '');
define('LOCAL_DATABASE_CHARSET', 'UTF8');

/**
 * Live database details from .env file
 */
define('LIVE_DATABASE_HOST', $_ENV['LIVE_DATABASE_HOST']); 
define('LIVE_DATABASE_NAME', $_ENV['LIVE_DATABASE_NAME']); 
define('LIVE_DATABASE_USERNAME', $_ENV['LIVE_DATABASE_USERNAME']); 
define('LIVE_DATABASE_PASSWORD', $_ENV['LIVE_DATABASE_PASSWORD']); 
define('LIVE_DATABASE_CHARSET', $_ENV['LIVE_DATABASE_CHARSET']);

define('REMEMBER_ME_COOKIE_NAME', 'h89hIteIHB7nb5yh3ufer7fad2q9yv98');
define('COOKIE_PATH', '/');
define('COOKIE_DOMAIN', DOMAIN);
define('COOKIE_SECURE', false);
define('COOKIE_HTTP', false);
define('COOKIE_EXPIRY', 3600 * 24 * 15); /** 15 days **/

define('SESSION_COOKIE_NAME', 'hjkrueihi548ysgnk3kdnbm,aoprgahit7483uj');
define('SESSION_COOKIE_EXPIRY', 3600 * 24 * 60); /** 60 Days **/
define('ENCRYPTION_KEY', 'H43ag5js60z4D86tgEsh6w4e385Y');

define('REMEMBER_ME_COOKIE_EXPIRY', 3600 * 24 * 365); /** One Year **/

define('ACCESS_DENIED_KEY', '672kbauh892ytqBGKA89jnb');
define('ACCESS_DENIED_EXPIRY', 3600 * 24); /** 60 Days **/

define('FAILED_LOGIN_ATTEMPTS_NAME', 'hjky456778434176HJuT67438');
define('LOGIN_ATTEMPTS_EXPIRY', 3600 * 3); /** 3 hours **/

define('PAGINATION_DEFAULT_LIMIT', 30);


