<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Verify Email</title>
</head>
    <body>
        <section class="loginSec1">
            <div class="top">
                <img class="logo" src="<?php echo URLROOT; ?>/img/logo.png" alt="logo" href="">
                
                <h1>DonateUs</h1>
                
            </div>
            <div class="left">
                <img class="img_reg" src="<?php echo URLROOT; ?>/img/img_signupverification.png" alt="img_reg">
            </div>
            <div class="right">
              <div class="centered">
              <div class="text">
                <h4>OTP code has been sent to the email you've provided. <br>To complete registration, please check the inbox or spam folder and enter the OTP code you received below.</h3>
                <br>
                <br>
                <p class="err" id="otp-err"></p>
                <form action="<?php echo URLROOT; ?>/users/verify" method="POST">
                <h1>Enter OTP here</h1>

                        <label>OTP</label>
                        <input type="text" name="otp" id="otp-input" class="otp">

                        <input type="submit" value="Verify">
                </form>
            </div>
              <div>
            </div>    
            <script type="text/javascript" src="<?php echo URLROOT; ?>/js/main.js"></script>
               
            </div>
        </section>
    </body>
</html>

<!-- client side OTP validation -->
<script>
    const otpField = document.getElementById('otp-input');
    const verifyBtn = document.getElementById('otp-btn');
    const otpErr = document.getElementById('otp-err');
    const otpForm = document.getElementById('otp-form');

    function isRequired(inputField){
        return inputField.value.trim() === '';
    }

    function isOTPValid(inputField, messageEl){
        if(this.isRequired(inputField)){
            this.error(inputField, messageEl, "*OTP is required");
            return false;
        }
        else{
            this.success(inputField, messageEl);
            return true;
        }
    }

    function isOTPFormValid(){
        return isOTPValid(otpField, otpErr);
    }

    verifyBtn.addEventListener('click', function(){
        if(isOTPFormValid()){
            otpForm.submit();
        }
    });
</script>
</body>
</html>