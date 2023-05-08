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
                <div class="position1">
                <h1>Registration</h1>
                    <div class="tab" >
                        
                        <button class="tablinks" onload="btnActivate()" onclick="openTab(event, 'Individual')">Individual</button>
                        <button class="tablinks" onclick="openTab(event, 'Organization')">Organization</button>
                    </div>

                    <!-- Individual Details -------------------------------------------------------------------------------------------------------------------------->
                    <div id="Individual" class="tabcontent">
                    <table>
                    <form action="<?php echo URLROOT; ?>/users/registerBeneficiary/ind" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <tr><td>
                            <label>User email</label>
                            <input type="text" id="email_ind" name="email_ind" placeholder="ex: abc@gmail.com" value="<?php echo $data['email_ind']; ?>"></td>
                            <td>
                            <label>NIC</label>
                            <input type="text" id="nic" name="nic" placeholder="ex: 19123567890" value="<?php echo $data['nic']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['email_err_ind']; ?></p></td>
                        <td><p class="error"><?php echo $data['nic_err']; ?></p></td>
                        </tr>
                        <tr><td>
                            <label>Password</label>
                            <input type="password" id="pword_ind" name="password_ind" placeholder="******"  value="<?php echo $data['password_ind']; ?>"></td>
                            <td><label>Confirm Password</label>
                            <input type="password" id="confirm_password_ind" name="confirm_password_ind" placeholder="******"  value="<?php echo $data['confirm_password_ind']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['password_err_ind']; ?></p></td>
                        <td><p class="error"><?php echo $data['confirm_password_err_ind']; ?></p></td></tr>
                    
                        <tr id="name"><td>
                            <label>First Name</label>
                            <input type="text" id="fname" name="fname" placeholder="ex: John" value="<?php echo $data['fname']; ?>"></td>
                            <td>
                            <label>Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="ex: Doe" value="<?php echo $data['lname']; ?>"></td>
                        </tr>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['fname_err_ind']; ?></p></td>
                        <td><p class="error"><?php echo $data['lname_err_ind']; ?></p></td></tr>

                        <tr><td>
                            <label>Contact Number</label>
                            <input type="text" id="contact_ind" name="contact_ind" placeholder="ex: +94712345678" value="<?php echo $data['contact_ind']; ?>"></td>
                            <td>
                            <label>Zip code</label>
                            <input type="text" id="zipcode_ind" name="zipcode_ind" placeholder="ex: Colombo" value="<?php echo $data['zipcode_ind']; ?>"></td>
                        </tr>
                        <tr>
                            <td><p class="error"><?php echo $data['contact_err_ind']; ?></p></td>
                            <td><p class="error"><?php echo $data['zipcode_err_ind']; ?></p></td>
                        </tr>
                        
                        <tr><td>
                            <label>District</label>
                            <select class="dropdown" name="district_ind" id="district_ind">
                            <?php foreach($data['districts'] as $districts) : ?>
                                <option value="<?php if($districts->id==$data['district_ind']) {echo "selected";}; ?>"><?php echo $districts->dist_name	; ?></option>
                            <?php endforeach; ?>

                            </select></td>
                            <td>
                            <label>Address</label>
                            <input type="text" id="add_ind" name="add_ind" placeholder="ex:21 Street, Colombo 5" value="<?php echo $data['add_ind']; ?>"></td>
                            </tr>
                            <tr>
                            <td><p class="error"><?php echo $data['district_err_ind']; ?></p></td>
                            <td><p class="error"><?php echo $data['add_err_ind']; ?></p></td>
                        </tr>

                        <tr><td>
                            
                            <label>Proof of Identity</label>
                           
                            <div class="tooltip">
                            <img src='https://s3.lightboxcdn.com/vendors/906a5d64-2cda-407f-a2d5-6cf94c06ddbe/uploads/274a7932-a0fd-4a89-9f58-a83cc44112ca/info.svg' width='15' height='15'>
                                <span class="tooltiptext">Any accepptable document of pdf format. <br> ex: NIC, Passport, Driver's License</span>
                            </div>
                           
                            <td>
                            <label>Proof of Address  </label>
                            <div class="tooltip">
                            <img src='https://s3.lightboxcdn.com/vendors/906a5d64-2cda-407f-a2d5-6cf94c06ddbe/uploads/274a7932-a0fd-4a89-9f58-a83cc44112ca/info.svg' width='15' height='15'>
                                <span class="tooltiptext">Any accepptable document of pdf format. <br> ex: Utility bill, Posted Mail with name of applicant  </span>
                            </div>
                            <tr>
                                <td><input type="file" id="address_ind" name="address_ind" value="<?php echo $data['address_ind']; ?>"></td></td>
                                <td> <input type="file" id="identity_ind" name="identity_ind" value="<?php echo $data['identity_ind']; ?>"></td></td>
                            </tr>

                            <tr><td><p class="error"><?php echo $data['address_err_ind']; ?></p></td>
                        <td><p class="error"><?php echo $data['identity_err_ind']; ?></p></td></tr>
                       
                        </tr>
                       
                       
                        <tr >
                            <td  colspan="2"><input class="btnsubmit" type="submit" value="Register"></td>
                        </tr>
                        <tr >
                        <td ><a href="<?php echo URLROOT; ?>/users/registerDonor/gen"><input type="button" value="Register as a Donor" ></a></td>
                        <td ><a href="<?php echo URLROOT; ?>/users/registerOrganizer"><input type="button" value="Register as an Event Organizer" ></a></td> 
                        </tr>
                        </form>
                        
                    
                    </table>
                    </div>



                    <!-- Organization Deatils ----------------------------------------------------------------------------------------------------------------->

                    <div id="Organization" class="tabcontent">
                    <table>
                    <form action="<?php echo URLROOT; ?>/users/registerBeneficiary/org" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <tr><td colspan="2"><label><b>- Organization Details -</b></label></td></tr>
                        <tr><td>
                            <label>Email Address</label>
                            <input type="text" id="email" name="email" placeholder="ex: abc@gmail.com" value="<?php echo $data['email']; ?>"></td>
                            <td>
                            <label>Organization Name</label>
                            <input type="text" id="compname" name="compname" placeholder="ex: ABC.co" value="<?php echo $data['compname']; ?>"></td>
                        </tr>
                        <tr><td ><p class="error"><?php echo $data['email_err']; ?></p></td>
                        <td ><p class="error"><?php echo $data['cname_err']; ?></p></td></tr>
                        <tr><td>
                            <label>Password</label>
                            <input type="password" id="pword" name="password" placeholder="******" value="<?php echo $data['password']; ?>"></td>
                            <td><label>Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="******" value="<?php echo $data['confirm_password']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['password_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['confirm_password_err']; ?></p></td></tr>
                        <tr>
                            <td>
                            <label>Organization Type</label>
                            <select class="dropdown" name="orgtype" id="orgtype">
                            <?php foreach($data['orgtype'] as $orgtype) : ?>
                                <option value="<?php if($orgtype->id==$data['orgtype']) {echo "selected";}; ?>"><?php echo $orgtype->org_type	; ?></option>
                            <?php endforeach; ?>
                            </select></td>

                            <td>
                            <label>District</label>
                            <select class="dropdown" name="district" id="district">
                            <?php foreach($data['districts'] as $districts) : ?>
                                <option value="<?php if($districts->id==$data['district']) {echo "selected";}; ?>"><?php echo $districts->dist_name	; ?></option>
                            <?php endforeach; ?>
                          </select></td>
                        </tr>                  

                        <tr><td><p class="error"><?php echo $data['orgtype_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['district_err']; ?></p></td></tr>



                        <tr>
                            <td>
                            <label>Zip code</label>
                            <input type="text" id="zipcode" name="zipcode" placeholder="ex: Colombo"  value="<?php echo $data['zipcode']; ?>"></td>
                            
                           <td><label>Address</label>
                            <input type="text" id="add" name="add" placeholder="ex:21 Street, Colombo 5" value="<?php echo $data['add']; ?>"></td>
                            
                        </tr>
                        <tr><td><p class="error"><?php echo $data['zipcode_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['add_err']; ?></p></td>

                        </tr>

                       
                        <tr><td>
                            <label>Proof of Identity</label>
                              
                           
                            <div class="tooltip">
                            <img src='https://s3.lightboxcdn.com/vendors/906a5d64-2cda-407f-a2d5-6cf94c06ddbe/uploads/274a7932-a0fd-4a89-9f58-a83cc44112ca/info.svg' width='15' height='15'>
                                <span class="tooltiptext">Any accepptable document of pdf format. <br> ex: NIC, Passport, Driver's License</span>
                            </div>
                            
                            <td>
                            <label>Proof of Address  </label>
                            <div class="tooltip">
                            <img src='https://s3.lightboxcdn.com/vendors/906a5d64-2cda-407f-a2d5-6cf94c06ddbe/uploads/274a7932-a0fd-4a89-9f58-a83cc44112ca/info.svg' width='15' height='15'>
                                <span class="tooltiptext">Any accepptable document of pdf format. <br> ex: Utility bill, Posted Mail with name of applicant  </span>
                            </div>
                            <tr>
                                <td><input type="file" id="address" name="address"  value="<?php echo $data['address']; ?>"></td>
                                <td><input type="file" id="identity" name="identity"  value="<?php echo $data['identity']; ?>"></td>
                            </tr>

                            <tr><td><p class="error"><?php echo $data['address_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['identity_err']; ?></p></td></tr>
                            
                        </tr>

                        <tr><td colspan="2"><label><b>- Contact Person Details -</b></label></td></tr>
                        <tr><td>
                            <label>Full Name</label>
                            <input type="text" id="fullname" name="fullname" placeholder="ex: John Doe"  value="<?php echo $data['fullname']; ?>"></td>
                            <td>
                            <label>Emloyee Id</label>
                            <input type="text" id="empid" name="empid" placeholder="ex: EID123456"  value="<?php echo $data['empid']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['fullname_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['empid_err']; ?></p></td></tr>
                        <tr>
                        <tr><td>
                            <label>Designation</label>
                            <input type="text" id="desg" name="desg" placeholder="ex: Manager"  value="<?php echo $data['desg']; ?>"></td>
                            <td>
                            <label>Contact Number</label>
                            <input type="text" id="contact" name="contact" placeholder="ex: +94701234567"  value="<?php echo $data['contact']; ?>"></td>
                        </tr>
                        <tr><td><p class="error"><?php echo $data['desg_err']; ?></p></td>
                        <td><p class="error"><?php echo $data['contact_err']; ?></p></td></tr>
                        
                        <tr>
                            <td colspan="2"><input type="submit" value="Register"></td>
                        </tr>
                        <tr>
                        <td ><a href="<?php echo URLROOT; ?>/users/registerDonor/gen"><input type="button" value="Register as a Donor" ></a></td>
                            <td ><a href="<?php echo URLROOT; ?>/users/registerOrganizer"><input type="button" value="Register as an Event Organizer" ></a></td>
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

        window.onload = function () {
            let tab = "<?php echo $data['tab']; ?>";
            document.getElementById(tab).style.display = "block";
        
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
