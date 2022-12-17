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
            <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                <img class="avatar" src="<?php echo URLROOT; ?>/img/profile_pic.svg">

                <h2>Create Account</h2>
                <p>Please fill out the following fields to create an account.</p>

                <!-- <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Organization name</h5>
                        <input type="text" class="input" >
                    </div>
                </div> -->
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5><label for="email">Email: <sup>*</sup></label></h5>
                        <input class="input" type="email" name="email" value="<?php echo $data['email']; ?>" required>
                    </div>
                </div>
                <div class="error">
                    <span><?php echo $data['email_err']; ?></span>
                </div>
                <!-- <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-mobile"></i>
                    </div>
                    <div class="div">
                        <h5>Telephone number</h5>
                        <input type="text" class="input" >
                    </div>
                    </div>
                    <div class="input-div one ">
                        <div class="i">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <div class="div">
                            <h5>Address</h5>
                            <input type="text" class="input" >
                        </div>
                        </div>-->
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5><label for="password">Password: <sup>*</sup></label></h5>
                        <input class="input" type="password" name="password" value="<?php echo $data['password']; ?>" required>
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
                        <input class="input" type="password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>" required>
                    </div>
                </div>
                <div class="error">
                    <span><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <input type="submit" class="btn" value="Register">
                <div class="reminder">
                    <p>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Login here</a></p>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="<?php echo URLROOT; ?>/js/main.js"></script>
    </div>
</body>

</html>