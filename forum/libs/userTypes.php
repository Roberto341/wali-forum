<?php 

enum errorTypes: int {
   case BAD_PASS = 0;
   case BAD_USERNAME = 1;
   case USER_EMAIL_EMPTY = 2;
   case PASS_NO_MATCH = 4;
   case USERNAME_EXIST = 5;
   case EMAIL_EXIST = 6;
   case UNKOWN_ERROR = 7;
   case USERNAME_EMPTY = 8;
   case EMAIL_EMPTY = 9;
   case PASSWORD_EMPTY = 10;
   case BAD_REGISTER = 11;
   case NO_ACCOUNT = 12;
   public function  label() : string{
        return static::getLabel($this);
   }

   public static function getLabel($value){
    return match ($value){
        errorTypes::BAD_PASS => "Password isn't long enough",
        errorTypes::BAD_USERNAME => "Username isn't long enough",
        errorTypes::USER_EMAIL_EMPTY => "Username or email empty",
        errorTypes::PASS_NO_MATCH => "Passwords don't match",
        errorTypes::USERNAME_EXIST => "Username already exists",
        errorTypes::EMAIL_EXIST => "Email already exists",
        errorTypes::UNKOWN_ERROR => "Unkown Error occured",
        errorTypes::USERNAME_EMPTY => "Username is empty",
        errorTypes::EMAIL_EMPTY => "Email is empty",
        errorTypes::PASSWORD_EMPTY => "Password is empty",
        errorTypes::BAD_REGISTER => "Some field's are empty",
        errorTypes::NO_ACCOUNT => "Account does not exist"
    };
   }
}

enum successTypes: int {
    case LOGGED_IN = 1;
    CASE ACCOUNT_REGISTER = 2;
    case LOGGED_OUT = 3;
    case UPDATE_PROFILE = 4;

    public function  label() : string{
        return static::getLabel($this);
    }
    public static function getLabel($value){
        return match($value){
            successTypes::LOGGED_IN => "Successfully Logged In",
            successTypes::ACCOUNT_REGISTER => "Account created",
            successTypes::LOGGED_OUT => "Successfully Logged Out",
            successTypes::UPDATE_PROFILE => "Successfully Updated Profile"
        };
    }
}

class userTypes{
    public function setCookies($username, $password){
        setcookie('wf_username', "$username", time() + 31556926, '/');
        setcookie('wf_utk', "$password", time() + 31556926, '/');
        setcookie('wf_loggedIn', 'true', time() + 31556926, '/');
    }
    public function unsetCookies(){
        setcookie("wf_username","",time() - 1000, '/');
        setcookie("wf_utk","",time() - 1000, '/');
        setcookie('wf_loggedIn', 'true', 31556926, '/');
    }
}
?>