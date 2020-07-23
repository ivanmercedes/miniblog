<?php
session_start();
// Enable PHP errors
ini_set('display_erros',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

// require_once '../database.php';
require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/..');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;


$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_NAME'],
    'username'  => $_ENV['DB_USER'],
    'password'  => $_ENV['DB_PASS'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$baseUrl = '';
$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '',$_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://'.$_SERVER['HTTP_HOST']. $baseDir;

define('BASE_URL',$baseUrl);

$route = $_GET['route'] ?? '/';

use Phroute\Phroute\RouteCollector;
$router = new RouteCollector();

$router->filter('auth', function (){
    if(!isset($_SESSION['userId'])){
        header('Location:' .BASE_URL.'auth/login');
        return false;
    }
});

// all router define by controllers
$router->controller('/auth', App\Controllers\AuthController::class);

$router->group(['before'=>'auth'],function ($router){
    $router->controller('/admin', App\Controllers\Admin\IndexController::class);
    $router->controller('/admin/posts', App\Controllers\Admin\PostController::class);
    $router->controller('/admin/users', App\Controllers\Admin\UserController::class);
});

$router->controller('/', App\Controllers\IndexController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;