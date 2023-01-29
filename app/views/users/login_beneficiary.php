<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style1.css">
</head>

<body>

    <div>
        <div class="backgroundimg">
            <img src="<?php echo URLROOT; ?>/img/background.png" alt="background">
        </div>
        <div class="image">
            <img src="<?php echo URLROOT; ?>/img/login.png".png alt="Login Image" height="500px" width="500px">
        </div>
    </div>


    <div class="forms-log-container">
        <div class="signin-signup">
            <form autocomplete="off" action="<?php echo URLROOT; ?>/users/login_beneficiary" class="sign-in-form" method="POST">
            
                <h1 class="title">Login</h1>
                <br>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Useremail" name="email" value="<?php echo $data['email']; ?>">
                </div>
                <div class="error">
                    <span><?php echo $data['email_err']; ?></span>
                </div>
                <div class="input-field ">
                    <i class="fas fa-user "></i>
                    <input type="password" placeholder="Password " name="password" value="<?php echo $data['password']; ?>">
                </div>
                <div class="error">
                    <span><?php echo $data['password_err']; ?></span>
                </div>
                <br>
                <input type="submit" value="Login" class="btn solid" > 
                <br>
                <p class="social-text">Don't have an Account? <a href="<?php echo URLROOT; ?>/users/register_beneficiary">SignUp here</a></p>

                
            </form>


        </div>
    </div>

</body>

</html>