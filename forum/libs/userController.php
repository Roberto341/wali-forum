<?php 
// include(__DIR__ . '/../database/config.php');
include(__DIR__ . '/../database/config.php');
include('userTypes.php');
class UserController{
    public function getError(errorTypes $error){
        $error_message = '';
        $error_message = errorTypes::getLabel($error);
        
        return $error_message;
    }
    public function getSuccess(successTypes $success){
        $success_message = '';
        $success_message = successTypes::getLabel($success);

        return $success_message;
    }
    public function checkRegCredentials($username, $email, $password){
        if(empty($username)){
            echo waliCode(8, array('error' => $this->getError(errorTypes::USERNAME_EMPTY)));
            return false;
        }
        if(empty($email)){
            echo waliCode(9, array('error' => $this->getError(errorTypes::EMAIL_EMPTY)));
            return false;
        }
        if(empty($password)){
            echo waliCode(10, array('error' => $this->getError(errorTypes::PASSWORD_EMPTY)));
            return false;
        }
        return true;
    }
    public function checkLogCredentials($username, $password){
        if(empty($username)){
            echo waliCode(8, array('error' => $this->getError(errorTypes::USER_EMAIL_EMPTY)));
            return false;
        }
        if(empty($password)){
            echo waliCode(10, array('error' => $this->getError(errorTypes::PASSWORD_EMPTY)));
            return false;
        }
        return true;
    }
    public function createUser($username, $email, $password, $confPass){
        global $mysqli;

        # check to see if fields are empty if so alert a response and die
        if(!$this->checkRegCredentials($username, $email, $password)){
            die();
        }

        # hash the password for better password safety
        if($password == $confPass){
            $hashedPass = md5($password);
        }else{
            echo waliCode(4, array('error' => $this->getError(errorTypes::PASS_NO_MATCH))); // error code for failed password
            die();
        }

        # check for existing username
        if($this->getUser('username', $username)){
            echo waliCode(5, array('error' => $this->getError(errorTypes::USERNAME_EXIST)));
            die();
        }
        #check for existing email
        if($this->getUser('email', $email)){
            echo waliCode(6, array('error' => $this->getError(errorTypes::EMAIL_EXIST)));
            die();
        }

        # if no errors add the user too the database
       $createdUser =  $mysqli->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPass')");
       if(!$createdUser){
            echo waliCode(7, array('error' => $this->getError(errorTypes::UNKOWN_ERROR)));
            die();
        }else{
            echo waliCode(99, array('success' => $this->getSuccess(successTypes::ACCOUNT_REGISTER)));
       }
    }

    public function loginUser($username, $password){
        global $mysqli;

        # check to see if fields are empty if so alert a response and die
        if(!$this->checkLogCredentials($username, $password)){
            die();
        }

        if($this->getUser('username', $username) || $this->getUser('email', $username)){
            $getUser = $mysqli->query("SELECT * FROM users WHERE username = '$username' OR email = '$username' AND password = '$password'");
            if($getUser->num_rows > 0){
                // set appropriate cookies and direct to forum
                $cookieClass = new userTypes();
                $cookieClass->setCookies($username, $password);
                echo waliCode(99, array('success' => $this->getSuccess(successTypes::LOGGED_IN)));
            }else{
                waliCode(12, array('error' => $this->getError(errorTypes::NO_ACCOUNT)));
                die();
            }
        }
    }
    public function getUser($type, $param){
        global $mysqli;
        $query = '';
        switch($type){
            case 'username': 
                $query = $mysqli->query("SELECT * FROM users WHERE username = '$param'");
                break;
            case 'email':
                $query = $mysqli->query("SELECT * FROM users WHERE email = '$param'");
                break;
        }

        if($query->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    public function getUserInfo($type, $param){
        global $mysqli;
        $query = '';
        switch($type){
            case 'id': 
                $query = $mysqli->query("SELECT * FROM users WHERE id = '$param'");
                $look = 'id';
                break;
            case 'username': 
                $query = $mysqli->query("SELECT * FROM users WHERE username = '$param'");
                $look = 'username';
                break;
            case 'email':
                $query = $mysqli->query("SELECT * FROM users WHERE email = '$param'");
                $look = 'email';
                break;
        }

        if($query->num_rows > 0){
            $user = $query->fetch_assoc();
            return $user[$look];
        }else{
            return false;
        }
    }
}

?>