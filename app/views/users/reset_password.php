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
    <img src="<?php echo URLROOT; ?>/img/logo_dark.png" alt="logo">
</div>

<div class="container">
    <div class="img">
        <!--        <img src="--><?php //echo URLROOT; ?><!--/img/login.svg">-->
    </div>
    <div class="login-container">
        <form autocomplete="off" action="<?php echo URLROOT; ?>/users/forgotPassword" method="POST">
            <!--            <img class="avatar" src="--><?php //echo URLROOT; ?><!--/img/profile_pic.svg">-->
            <!--            --><?php //flash('register_success'); ?>
            <h2>Welcome</h2>
            <!-- <h2>Login</h2> -->
            <p>Please insert your email.</p><br>

            <div class="input-div one ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5><label for="email">Email: <sup>*</sup></label></h5>
                    <input class="input" type="email" name="email" value="<?php echo $data['email']; ?>" required>
                </div>
            </div>
            <div class="error">
                <span><?php echo $data['email_err']; ?></span>
            </div>
            <input type="submit" class="btn" value="Submit">
        </form>

    </div>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/main.js"></script>

</div>
</body>

</html>