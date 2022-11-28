<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>
<style>
    body{
        box-sizing: border-box;
        margin: 0;
        font-family: Poppins, sans-serif;
        background-color: lightgray;
    }

    .container{
        background-color: white;
        margin-top: 30px;
        margin-left: 10%;
        margin-right:10%;
        border-radius: 10px;
        border: 2px solid #0A2558;
        box-shadow: rgba(0, 0, 0, 0.15) 2px 2px 3px;
        -webkit-box-shadow: rgba(0, 0, 0, 0.15) 2px 2px 3px;
        -moz-box-shadow: rgba(0, 0, 0, 0.15) 2px 2px 3px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    img{
        width: 150px;
        height: 150px;
    }

    .container div h2{
        color: #0A2558;
    }

    .container div h3{
        color: #0A2558;
    }

    .container div h4{
        margin-left: 20px;
        margin-right: 20px;
    }
</style>
<body>
<div class="container">
    <div>
        <img src="<?php echo URLROOT ?>/images/logo.png" alt="">
    </div>
    <div>
        <h2><b>Welcome To DonateUs</b></h2>
    </div>
    <div>
        <h4>Before using our service, there is one more little thing to do. Please use the below OTP to verify your account.</h4>
    </div>
    <div>
        <h3>Thank You!</h3>
    </div>
</div>
</body>
</html>