<?php 
include('../../libs/userController.php');


if(isset($_POST['username'], $_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userController = new UserController();
    $userController->loginUser($username, $password);
}
?>