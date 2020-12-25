<?php declare(strict_types=1);
//https://www.bulksmsnigeria.com/app/bulksms/drafts/43ad0578-a12e-439e-843b-8179afe1fdbb

/**
 * --------------------------------------------------
 * Declaring current time zone for accurate time logs
 * --------------------------------------------------
 */
date_default_timezone_set('Africa/Lagos');

/**
 * ROOT - Thats the root of server filesystem.
 * DS - Defining a foward slash with PHP DIRECTORY_SEPARATOR using str_replace.
 */
define('ROOT', str_replace('\\', '/', dirname(__FILE__)));
define('DS', str_replace('\\', '/', DIRECTORY_SEPARATOR));

/**
 * Paths to all project root folders
 */
define('PUBLIC_PATH', ROOT . DS . 'public');
define('APPLICATION_PATH', ROOT . DS . 'application');
define('VENDOR_PATH', ROOT . DS . 'vendor');

/**
 * Standard PHP way of autoloading classes - Using composer.
 */
require VENDOR_PATH . DS . 'autoload.php';

/**
 * For Handling Exceptions
 */
Bookstore\Core\Handler::register();

/*
|--------------------------------------------------------------------------
| Storing sensitive data in .env file
|--------------------------------------------------------------------------
|
| All live database credentials and any api keys are registered
| Highly recommended for security purposes
|
*/
$dotenv = \Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();
$dotenv->required(['LIVE_DATABASE_HOST', 'LIVE_DATABASE_NAME', 'LIVE_DATABASE_USERNAME', 'LIVE_DATABASE_PASSWORD', 'LIVE_DATABASE_CHARSET']);

/**
 * Requiring the configuration file.
 */
require APPLICATION_PATH . DS . 'config.php';


/**
 * Starting the session at the root
 * To avoid session error.
 */
Bookstore\Library\Session::start();

/**
 * [$request description]
 * @var Bookstore
 */
$request = new Bookstore\Http\Request;
$app = new Bookstore\Core\Parser($request);

/**
 * ---------------------------------------------------------------------
 * [Route the application]
 * ---------------------------------------------------------------------
 * 
 * @var [type] Mixed
 */
$app->router->route();

