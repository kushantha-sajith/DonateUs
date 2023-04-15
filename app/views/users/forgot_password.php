<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>login page</title>
</head>

<body>
<div class="logo">
    <img src="images/logo.png" alt="logo">
</div>
<!-- <img class="wave" src="<?php echo URLROOT; ?>/img/wave.svg">   -->
<div class="container">
    <div class="img">
        <img src="<?php echo URLROOT; ?>/img/sign up.svg">
    </div>
    <div class="login-container">
        <form action="<?php echo URLROOT; ?>/users/resetPassword/<?php echo $data['token']; ?>" method="POST">
            <img class="avatar" src="<?php echo URLROOT; ?>/img/profile_pic.svg" alt="">

            <h2>Reset Password</h2>
            <p>Please fill out the following fields to reset password.</p>
            <div class="input-div one ">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5><label for="password">New Password: <sup>*</sup></label></h5>
                    <input class="input" type="password" name="password" value="<?php echo $data['password']; ?>"
                           required>
                </div>
            </div>
            <div class="error">
                <span><?php echo $data['password_err']; ?></span>
            </div>
            <div class="input-div one ">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5><label for="confirm_password">Confirm Password: <sup>*</sup></label></h5>
                    <input class="input" type="password" name="confirm_password"
                           value="<?php echo $data['confirm_password']; ?>" required>
                </div>
            </div>
            <div class="error">
                <span><?php echo $data['confirm_password_err']; ?></span>
            </div>
            <input type="submit" class="btn" value="Reset Password">
        </form>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/main.js"></script>
</div>
</body>

</html>