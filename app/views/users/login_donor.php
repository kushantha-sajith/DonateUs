<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css">
    </head>
    <body>
        <section class="loginSec1">
            <div class="top">
                <img class="logo" src="<?php echo URLROOT; ?>/img/logo.png" alt="logo" href="">
                <ul class="menu">
                  <li class="menu"><a href="<?php echo URLROOT; ?>/users/register_donor/gen">Register</a></li>
                </ul>
                <h1>DonateUs</h1>
            </div>
            <div class="log_left">
                <img class="img_login" src="<?php echo URLROOT; ?>/img/img_login.png" alt="img_login">
            </div>
            <div class="log_right">
                
                <div class="form">
                    <form class="position2" autocomplete="off" action="<?php echo URLROOT; ?>/users/login_donor" method="POST">
                        <h1>Login</h1>
                        
                        <label>User email</label>
                        <input type="text" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $data['email']; ?>">
                        <p class="error"><?php echo $data['email_err']; ?></p>

                        <label>Password</label>
                        <input type="password" id="pword" name="password" placeholder="******" value="<?php echo $data['password']; ?>">
                        <p class="error"><?php echo $data['password_err']; ?></p>
                        <p><a href="">Forgot Password?</a></p>

                        <input type="submit" value="Login">

                        <label> <a href="<?php echo URLROOT; ?>/users/register_donor/gen">New to DonatUs? Get Registered Now!</a></label>
                        
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>
