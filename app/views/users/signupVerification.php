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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Verify Email</title>
</head>
<body>
<div class="email-container">
    <div class="message-container">
            <div class="logo">
<!--                <img src="--><?php //echo URLROOT ?><!--/images/logo.png" alt="">-->
            </div>
            <div class="heading-text">
                <h1>Welcome to DonateUs</h1>
                <h2>Email Verification</h2>
            </div>
        <div class="message-body">
            <div class="email-logo">
                <img src="<?php echo URLROOT ?>/img/email.gif" alt="">
            </div>
            <div class="text">
                <h3>OTP code has been sent to the email you've provided. <br>To complete registration, please check the inbox or spam folder and enter the OTP code you received below.</h3>
                <p class="err" id="otp-err"></p>
                <form action="<?php echo URLROOT; ?>/users/verify" method="POST" id="otp-form">
                    <div class="div">
                        <h5><label for="otp">Enter OTP here</label></h5>
                        <input type="text" name="otp" id="otp-input" class="otp" required>
                    </div>
                    <div class="error">
                        <span><?php echo $data['error']; ?></span>
                    </div>
                    <button class="btn" id="otp-btn">Verify</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
        if(isNaN(otpField.value)){
            if(isOTPFormValid()){
                otpForm.submit();
            }else{
                return false;
            }
        }else{
            otpErr.innerHTML = "*OTP should be a number";
        }

    });
</script>
</body>
</html>