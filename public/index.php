<?php
require_once '../database.php';
require_once '../vendor/autoload.php';

//Mostrar todos los errores de PHP
ini_set('display_erros',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$baseUrl = '';
$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '',$_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://'.$_SERVER['HTTP_HOST']. $baseDir;

define('BASE_URL',$baseUrl);

$route = $_GET['route'] ?? '/';

function render($filename, $params = []){
    ob_start(); //
     extract($params);
       include $filename;
     return ob_get_clean();
}

use Phroute\Phroute\RouteCollector;
$router = new RouteCollector();


$router->controller('/admin', App\Controllers\Admin\IndexController::class);
// $router->get('/admin', function (){
//     return render('../views/admin/index.php');
// });

$router->controller('/admin/posts', App\Controllers\Admin\PostController::class);
// $router->get('/admin/posts', function () use($pdo){
//     $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
//     $query->execute();
//     $blogpost = $query->fetchAll(PDO::FETCH_ASSOC);
//     return render('../views/admin/posts.php', ['blogpost' =>$blogpost]);
// });
// $router->controller('/admin/posts/create',App\Controllers\Admin\PostController::class);
// $router->get('/admin/posts/create', function () use($pdo){
//       return render('../views/admin/insert-post.php');
// });

// $router->post('/admin/posts/create', function () use($pdo){
        
//         $sql = "INSERT INTO blog_posts (title, content) VALUES (:title, :content)";
//         $query = $pdo->prepare($sql);
        
//         $result = $query->execute([
//             'title'=> $_POST['title'],
//             'content' => $_POST['content']
//         ]);

//     return render('../views/admin/insert-post.php',['result'=>$result]);
// });

$router->controller('/', App\Controllers\IndexController::class);

// $router->get('/', function () use ($pdo){

//     $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
//     $query->execute();
//     $blogpost = $query->fetchAll(PDO::FETCH_ASSOC);

//     return render('../views/index.php', ['blogpost' =>$blogpost]);

// });
// echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;