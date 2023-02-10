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
            <a href="<?php echo URLROOT; ?>/pages/index"><img class="logo" src="<?php echo URLROOT; ?>/img/logo_.png" alt="logo" href="<?php echo URLROOT; ?>/pages/index"></a>
                <ul class="menu">
                  <li class="menu"><a href="<?php echo URLROOT; ?>/users/login_donor">Login</a></li>
                </ul>
            </div>
            <div class="left">
                <img class="img_reg" src="<?php echo URLROOT; ?>/img/img_reg_eo.png" alt="img_reg_eo">
            </div>
            <div class="right">
                <div class="position1">
                <h1>Registration - Charity Event Organizers</h1>
                    
                    <div class="content">
                    <table>
                    <form action="<?php echo URLROOT; ?>/users/register_eorganizer" method="POST">
                        <tr><td>
                            <label>User email</label>
                            <input type="text" id="email" name="email" placeholder="ex: abc@gmail.com" value="<?php echo $data['email']; ?>"></td>
                            <td>
                            <label>NIC</label>
                            <input type="text" id="nic" name="nic" placeholder="ex: 19XXXXXXXXXX/ 9XXXXXXXXX" value="<?php echo $data['nic']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['email_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['nic_err']; ?></p></td>
                        </tr>
                        <tr><td>
                            <label>Password</label>
                            <input type="password" id="pword" name="password" placeholder="******"  value="<?php echo $data['password']; ?>"></td>
                            <td><label>Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="******"  value="<?php echo $data['confirm_password']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['password_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['confirm_password_err']; ?></p></td></tr>
                    
                        <tr id="name"><td>
                            <label>Full Name</label>
                            <input type="text" id="fullname" name="fullname" placeholder="ex: Fernando A.B.C." value="<?php echo $data['fullname']; ?>"></td>
                            <td>
                            <label>Contact Number</label>
                            <input type="text" id="contact" name="contact" placeholder="ex: +94XXXXXXXXX" value="<?php echo $data['contact']; ?>"></td>
                            <td>
                        </tr>
                        
                        </tr>
                        <tr><td><p class="error"><?php echo $data['fullname_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['contact_err']; ?></p></td></tr>

                        <tr><td>
                            <label>Community Name</label>
                            <input type="text" id="comm_name" name="comm_name" placeholder="ex: Rotract Club of UCSC" value="<?php echo $data['comm_name']; ?>"></td>
                            <td>
                            <label>Designation</label>
                            <input type="text" id="desg" name="desg" placeholder="ex: Treasurer" value="<?php echo $data['desg']; ?>"></td>
                            <td>
                        </tr>
                        
                        </tr>
                        <tr><td><p class="error"><?php echo $data['fullname_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['desg_err']; ?></p></td></tr>

                        <tr><td>
                            <label>City</label>
                            <input type="text" id="city" name="city" placeholder="ex: Colombo" value="<?php echo $data['city']; ?>"></td>
                            <td>
                            <label>District</label>
                            <select class="dropdown" name="district" id="district">
                            <?php foreach($data['districts'] as $districts) : ?>
                                <option <?php if($districts->id==$data['district']) {echo "selected";} ?> value="<?php echo $districts->id; ?>"><?php echo $districts->dist_name; ?></option>
                            <?php endforeach; ?>

                            </select></td>
                        </tr>
                        <tr>
                            <td><p class="error"><?php echo $data['city_err']; ?></p></td>
                            <td><p class="error"><?php echo $data['district_err']; ?></p></td>
                        </tr>
                       
                        <tr >
                            <td  colspan="2"><input class="btnsubmit" type="submit" value="Register"></td>
                        </tr>
                        <tr>
                            <td ><a href="<?php echo URLROOT; ?>/users/login_donor"><input type="button" value="Register as a Beneficiary" ></a></td>
                            <td ><a href="<?php echo URLROOT; ?>/users/register_donor/gen"><input type="button" value="Register as a Donor" ></a></td>
                        </tr>
                        </form>
                        
                    
                    </table>
                    </div>

                   
</div>    
                
               
            </div>
        </section>
       <script>
        function btnActivate() {
        const btns = document.getElementsByClassName("tablinks");
        btns[0].className += " active";
        }

        function openTab(evt, tabName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
    
        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
  
        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
  
         }
       </script>                         
    </body>
</html>
