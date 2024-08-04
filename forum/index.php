<?php 
include('libs/userController.php');
include('libs/Router.php');
class SiteController { 
    public function home() { 
        include('views/home.view.php'); 
    }
    public function about() {
     include('views/about.view.php'); 
    } 
    public function login(){
        include('views/login.view.php');
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery3.7.1.js"></script>
    <script src="js/function_main.js"></script>
    <script src="js/function_login.js"></script>
    <title>Wali Forum</title>
</head>
<body class="bg-dark">
  <?php 
  $router = new Router();
  $router->addRoute('GET', '/forum/home', [SiteController::class, 'home']); 
  $router->addRoute('GET', '/forum/about', [SiteController::class, 'about']); 
  $router->addRoute('GET', '/forum/login', [SiteController::class, 'login']);
  $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $router->dispatch($path); 
    ?>  
</body>
</html>