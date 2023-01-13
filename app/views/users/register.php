<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css">
        <script type="text/javascript" src="<?php echo URLROOT; ?>/js/script.js"></script>
    </head>
    <body>
        <section class="loginSec1">
            <div class="top">
                <img class="logo" src="<?php echo URLROOT; ?>/img/logo.png" alt="logo" href="">
                <ul class="menu">
                  <li class="menu"><a href="<?php echo URLROOT; ?>/users/login">Login</a></li>
                </ul>
                <h1>DonateUs</h1>
            </div>
            <div class="left">
                <img class="img_reg" src="<?php echo URLROOT; ?>/img/img_reg.png" alt="img_reg">
            </div>
            <div class="right">
                <div class="centered">
                <h1>Registration</h1>
                    <div class="tab" >
                        
                        <button class="tablinks" onload="btnActivate()" onclick="openTab(event, 'Individual')">Individual</button>
                        <button class="tablinks" onclick="openTab(event, 'Corporate')">Corporate</button>
                    </div>
                    <div id="Individual" class="tabcontent">
                    <table>
                    <form action="<?php echo URLROOT; ?>/users/register/ind" method="POST">
                        <tr><td colspan="2">
                            <label>User email*</label>
                            <input type="text" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $data['email']; ?>"></td>
                        </tr>
                        <tr><td colspan="2"><p class="error"><?php echo $data['email_err']; ?></p></td></tr>
                        <tr><td>
                            <label>Password*</label>
                            <input type="password" id="pword" name="password" placeholder="******"  value="<?php echo $data['password']; ?>"></td>
                            <td><label>Confirm Password*</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="******"  value="<?php echo $data['confirm_password']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['password_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['confirm_password_err']; ?></p></td></tr>
                    
                        <tr id="name"><td>
                            <label>First Name*</label>
                            <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $data['fname']; ?>"></td>
                            <td>
                            <label>Last Name*</label>
                            <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $data['lname']; ?>"></td>
                        </tr>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['other_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['other_err']; ?></p></td></tr>

                        <tr><td>
                            <label>Contact Number*</label>
                            <input type="text" id="contact" name="contact" placeholder="+94712345678" value="<?php echo $data['contact']; ?>"></td>
                            <td>
                            <label>City*</label>
                            <input type="text" id="city" name="city" placeholder="Colombo" value="<?php echo $data['city']; ?>"></td>
                        </tr>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['other_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['other_err']; ?></p></td></tr>
                        <tr>
                        </tr>

                        <tr>
                            <td colspan="2"><input type="submit" value="Register"></td>
                        </tr>
                        </form>
                        
                    
                    </table>
                    </div>

                    <div id="Corporate" class="tabcontent">
                    <table>
                    <form action="<?php echo URLROOT; ?>/users/register/corp" method="POST">
                        <tr><td colspan="2">
                            <label>User email*</label>
                            <input type="text" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $data['email']; ?>"></td>
                        </tr>
                        <tr><td colspan="2"><p class="error"><?php echo $data['email_err']; ?></p></td></tr>
                        <tr><td>
                            <label>Password*</label>
                            <input type="password" id="pword" name="password" placeholder="******" value="<?php echo $data['password']; ?>"></td>
                            <td><label>Confirm Password*</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="******" value="<?php echo $data['confirm_password']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['password_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['confirm_password_err']; ?></p></td></tr>
                        <tr>
                        <tr><td>
                            <label>Company Name*</label>
                            <input type="text" id="compname" name="compname" placeholder="Company Name"  value="<?php echo $data['compname']; ?>"></td>
                            <td>
                            <label>Contact Number*</label>
                            <input type="text" id="contact" name="contact" placeholder="+94712345678"  value="<?php echo $data['contact']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['other_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['other_err']; ?></p></td></tr>
                        <tr>
                        <tr><td>
                            <label>Emloyee Id*</label>
                            <input type="text" id="empid" name="empid" placeholder="EID123456"  value="<?php echo $data['empid']; ?>"></td>
                            <td>
                            <label>Designation*</label>
                            <input type="text" id="desg" name="desg" placeholder="Manager"  value="<?php echo $data['desg']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['other_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['other_err']; ?></p></td></tr>
                        <tr>
                        <tr>
                        </tr>

                        <tr>
                            <td colspan="2"><input type="submit" value="Register"></td>
                        </tr>
                        </form>
                       
                        
                    </table>
                    </div>
</div>    
                
               
            </div>
        </section>
    </body>
</html>
