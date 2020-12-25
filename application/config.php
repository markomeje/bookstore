<?php

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_METHOD', 'index');

define('SERVER_PROTOCOL', isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on' ? true : false);
define('WEBSITE_DOMAIN',  SERVER_PROTOCOL === false ? 'http://bookstore.build' : $_ENV['LIVE_WEBSITE_DOMAIN']);

define('REFERER', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
define('HOST', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');

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
define('LOCAL_DATABASE_NAME', 'bookstore');
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

define('PAYSTACK_TEST_SECRET_KEY', 'sk_test_f350cd8fedff13ddffc1ff1e12bc42b60ad62ae8');
define('PAYSTACK_TEST_PUBLIC_KEY', 'pk_test_c11c47953d4145442c60e6e97e0524bb9ead088c');

define('PAYSTACK_LIVE_SECRET_KEY', $_ENV['PAYSTACK_LIVE_SECRET_KEY']);
define('PAYSTACK_LIVE_PUBLIC_KEY', $_ENV['PAYSTACK_LIVE_PUBLIC_KEY']);

define('REMEMBER_ME_COOKIE_NAME', 'h89hIteIHB7nb5yh3ufer7fad2q9yv98');
define('COOKIE_PATH', '/');
define('COOKIE_DOMAIN', WEBSITE_DOMAIN);
define('COOKIE_SECURE', false);
define('COOKIE_HTTP', false);
define('COOKIE_EXPIRY', 3600 * 24 * 15); /** 15 days **/

define('SESSION_COOKIE_NAME', 'hjkrueihi548ysgnk3kdnbm,aoprgahit7483uj');
define('SESSION_COOKIE_EXPIRY', 3600 * 24 * 60); /** 60 Days **/
define('ENCRYPTION_KEY', 'H43ag5js60z4D86tgEsh6w4e385Y');
define('REMEMBER_ME_COOKIE_EXPIRY', 3600 * 24 * 365); /** One Year **/

define('REDIRECT_LINK_EXPIRY', 3600 * 24); /** I Day **/
define('BOOK_TRACKER_EXPIRY', 3600 * 24); /** I Day **/

define('ACCESS_DENIED_KEY', '672kbauh892ytqBGKA89jnb');
define('ACCESS_DENIED_EXPIRY', 3600 * 24); /** 60 Days **/
define('FAILED_LOGIN_ATTEMPTS_NAME', 'hjky456778434176HJuT67438');
define('LOGIN_ATTEMPTS_EXPIRY', 3600 * 3); /** 3 hours **/

define('PAGINATION_DEFAULT_LIMIT', 30);

define('AMAZON_LINK', 'https://www.amazon.com/s?i=digital-text&rh=p_27%3ADr.+Charles+O.+Ukemenam&s=relevancerank&text=Dr.+Charles+O.+Ukemenam&ref=dp_byline_sr_ebooks_1');
define('OKADABOOKS_LINK', 'https://okadabooks.com/user/charlesukemenam');

define('EMAIL_HOST', 'charlesukemenam.com');
define('EMAIL_USERNAME', 'author@charlesukemenam.com');
define('EMAIL_PASSWORD', $_ENV['AUTHOR_EMAIL_PASSWORD']);
define('EMAIL_SMTPSECURE', 'ssl');
define('EMAIL_PORT', 465);
define('EMAIL_FROM', 'author@charlesukemenam.com');
define('EMAIL_FROM_NAME', 'Success and Motivation Book Series');
define('EMAIL_REPLY_TO', 'author@charlesukemenam.com');
define('EMAIL_DEBUG', 4);
define('EMAIL_AUTH', true);

define('EMAIL_VERIFICATION', 1);
define('EMAIL_VERIFICATION_SUBJECT', 'Email Verification');
define('EMAIL_VERIFICATION_URL', WEBSITE_DOMAIN.'/register/verify');

define('SEND_BOOK_AS_ATTACHMENT', 2);
define('SEND_BOOK_AS_ATTACHMENT_SUBJECT', 'Book Purchase Successfull');

define('PASSWORD_RESET', 3);

define('CONTACT_EMAIL_REQUEST', 4);
define('CONTACT_EMAIL_REQUEST_SUBJECT', 'Contact Request');

define('INSTAGRAM_LINK', 'https://www.instagram.com/charlesukemenam/');
define('FACEBOOK_LINK', 'https://www.facebook.com/charlesoukemenam/');

define('ADMIN_EMAIL', 'author@charlesukemenam.com');



