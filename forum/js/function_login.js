var errorMessage = $('#errorMessage');


sendLogin = function(){
    var login_name = $('#login_username').val();
    var login_pass = $('#login_password').val();
    $.ajax({
        url: 'system/action/login.php',
        type: "post",
        cache: false,
        dataType: 'json',
        data: {
            username: login_name,
            password: login_pass
        },
        success: function(response){
            if(response.code == 99){
                location.href = "http://localhost/forum/home";
                callSaved(response.success, 1);
            }else{
                callSaved(response.error, 3);
            }
        },
        error: function(response){
            callSaved(response.error, 3);
        }
    });
}
sendRegister = function(){
    var user_name = $('#reg_username').val();
    var user_email = $('#reg_email').val(); 
    var user_password = $('#reg_password').val(); 
    var conf_pass = $('#reg_conf_password').val(); 

    $.ajax({
        url: 'system/action/register.php',
        type: "post",
        cache: false,
        dataType: 'json',
        data: {
            username: user_name,
        email: user_email,
        password: user_password,
        conf_password: conf_pass
        },
        success: function(response){
            if(response.code == 99){
                callSaved(response.success, 1);
            }else{
                callSaved(response.error, 3);
            }
        },
        error: function(response){
            callSaved(response.error, 3);
        }
    });
}