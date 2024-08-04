<p class="error-message" id="errorMessage"></p>
<div class="container-full">
    <div class="container-split">
        <div class="container-left">
            <h1>Login</h1>
            <div class="pad-box">
                <p class="label">Username: </p>
                <input type="text"  id="login_username" class="full-input">
                <p class="label">Password: </p>
                <input type="text"  id="login_password" class="full-input">
                <div class="tpad10">
                <button type="button" class="full-btn" onclick="sendLogin();">Login</button>
                </div>
            </div>
        </div>
        <div class="container-right">
            <h1>Register</h1>
            <div class="pad-box">
                <p class="label">Username: </p>
                <input type="text"  id="reg_username" class="full-input">
                <p class="label">Email: </p>
                <input type="email"  id="reg_email" class="full-input">
                <p class="label">Password: </p>
                <input type="password"  id="reg_password" class="full-input">
                <p class="label">Confrim Password: </p>
                <input type="password"  id="reg_conf_password" class="full-input">
                
                <div class="tpad10">
                    <button type="button" class="full-btn" onclick="sendRegister();">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>
