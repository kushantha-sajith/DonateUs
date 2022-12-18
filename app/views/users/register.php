<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style1.css">
</head>

<body>
    <div>
        <div class="backgroundimg">
            <img src="<?php echo URLROOT; ?>/img/background.png" alt="background">
        </div>
        <div class="image">
            <img src="<?php echo URLROOT; ?>/img/signup2.png" alt="SignUp Image" height="500px" width="600px">
        </div>
    </div>

    <div class="forms-log-container">
        <div class="signin-signup">
            <form action="<?php echo URLROOT; ?>/users/register" class="sign-up-form" method="POST">
                <h1 class="title" >Sign Up</h1>
                <br>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Useremail" name="email" value="<?php echo $data['email']; ?>">
                </div>
                <div class="error">
                    <span><?php echo $data['email_err']; ?></span>
                </div>
                <div class="input-field">
                    <i class=" fas fa-lock "></i>
                    <input type=" text " placeholder="Password " name="password" value="<?php echo $data['password']; ?>">
                </div>
                <div class="error">
                    <span><?php echo $data['password_err']; ?></span>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirm Password" name="confirm_password"  value="<?php echo $data['confirm_password']; ?>">
                </div>
                <div class="error">
                    <span><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <br>
                <input type="submit" value="Sign Up" class=" btn solid ">
                <br>
                <p class="social-text">Already have an Account? <a href="<?php echo URLROOT; ?>/users/login">Login here</a></p>
            
            </form>

        </div>
    </div>

</body>

</html>