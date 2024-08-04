<?php 
include('../../libs/userController.php');

if(isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['conf_password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['conf_password'];
    $userController = new UserController();
    $userController->createUser($username, $email, $password, $password2);
}
?>