<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/env/App/Config.php';

use App\Helpers\SessionHelper;

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

// $session = new \App\Helpers\OptimisticSessionHandler();
$session = new SessionHandler();
ini_set('session.save_handler', 'files');
session_set_save_handler($session, true);
session_save_path(App\Config::SESSIONS_DIR);
session_start();

SessionHelper::init();

// $sh = new SessionHelper();

/**
 * Routing
 */
$router = new Core\Router();

// $t = new Twig\Loader\FilesystemLoader();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('login.php', ['controller' => 'Login', 'action' => 'index']);
$router->add('logout.php', ['controller' => 'Login', 'action' => 'logout']);
$router->add('token.php', ['controller' => 'Login', 'action' => 'token']);
$router->add('music.php', ['controller' => 'Music', 'action' => 'index']);
$router->add('listall.php', ['controller' => 'SongListings', 'action' => 'listAll']);
$router->add('listcategory.php', ['controller' => 'SongListings', 'action' => 'listCategory']);
$router->add('onesong.php', ['controller' => 'SongListings', 'action' => 'oneSong']);

$router->add('media_listall.php', ['controller' => 'MediaListings', 'action' => 'listAll']);
$router->add('media_one.php', ['controller' => 'MediaListings', 'action' => 'listOne']);

$router->add('{controller}/{action}');
    
$router->dispatch($_SERVER['QUERY_STRING']);
