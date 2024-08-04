<?php  
    $userCont = new UserController();
    if(isset($_COOKIE['wf_utk'])){
?>
<h1>Welocme <?php echo $userCont->getUserInfo('username', $_COOKIE['wf_username']);?></h1>
<?php 
    }else{
?>
    <h1>Welcome to the home page! <a>Login or register</a></h1>
<?php
    }
?>