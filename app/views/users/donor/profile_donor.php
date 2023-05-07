<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
    <!--navigation bar left-->
    <?php require APPROOT.'/views/inc/side_navbar_donor.php';?>
    <!--navigation bar left end-->

    <!--home section start-->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Profile</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
          
<<<<<<< Updated upstream
            <a href="<?php echo URLROOT; ?>/pages/profile_donor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
=======
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
>>>>>>> Stashed changes
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <main>
            <div class="container">
                <header>Profile Details</header>

                <form action="#">
                    <div class="formfirst">
                        <div class="details personal">
                            <span id ="ind1"class="title"><u>Personal Details</u></span>
                            <span id ="corp1"class="title"><u>Company Details</u></span>
                            <div class="fields">
                            <?php foreach($data['userdata'] as $user) : ?>
                              <?php foreach($data['personaldata'] as $personaldata) : ?>
                                <div id="ind2" class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->f_name." ".$personaldata->l_name; ?>" disabled>
                                </div>
                                <div id="ind3" class="input-field">
                                    <label>NIC</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->NIC; ?>" disabled>
                                </div>
                                <div id="corp2" class="input-field">
                                    <label>Company Name</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->comp_name; ?>" disabled>
                                </div>

                                <div id="corp3" class="input-field">
                                    <label>Email Address</label>
                                    <input type="text" placeholder="" value="<?php echo $user-> email; ?>" disabled>
                                </div>

                                <div id="ind4" class="input-field">
                                    <label>User Email</label>
                                    <input type="text" placeholder="" value="<?php echo $user-> email; ?>" disabled>
                                </div>

                                <div id="ind5" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="" value="<?php echo $user->tp_number; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>City</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->city; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>District</label>
                                    <input type="text" placeholder="" value="<?php echo $data['dist']; ?>" disabled>
                                </div>
                              </div>
                              <span id ="corp4" class="title"><u>Contact Person Details</u></span>
                              <div id="corp9" class="fields">
                                
                                <div id ="corp5" class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->emp_name; ?>" disabled>
                                </div>
                                <div id ="corp6" class="input-field">
                                    <label>Employee ID</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->emp_id; ?>" disabled>
                                </div>
                                <div id ="corp7" class="input-field">
                                    <label>Designation</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->designation; ?>" disabled>
                                </div>
                                <div id ="corp8" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="" value="<?php echo $user->tp_number; ?>" disabled>
                                </div>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- <span class="title"><u>Change Profile Picture</u></span>

                        <div class="photo-container">
                            <input type="file" id="file" accept="image/*" hidden>
                            <div class="img-area" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                            </div>
                            <button class="select-image">Select Image</button>
                        </div>

                        <span class="title"><u> Change Password</u></span>
                        <div class="fields">
                            <div class="input-field">
                                <label>Old Password</label>
                                <input type="text" placeholder="Enter Your Previous Password">
                            </div>
                            <div class="input-field">
                                <label>New Password</label>
                                <input type="text" placeholder="Enter Your New Password">
                            </div>
                            <div class="input-field">
                                <label>Conform New Password</label>
                                <input type="text" placeholder="Conform Your New Password">
                            </div> -->

                        <!-- </div> -->
                       
                    </div>
                </form>
                <div class="updatebtn">
<<<<<<< Updated upstream
                    <a href="<?php echo URLROOT; ?>/pages/edit_profile_donor">
=======
                    <a href="<?php echo URLROOT; ?>/pages/editProfileDonor">
>>>>>>> Stashed changes
                        <button class="edit" style="text-decoration: none;">Edit Profile Details
                        </button>
                    </a>

                    <a href="<?php echo URLROOT; ?>/donor/changePasswordDonor">
                        <button class="changepassword" style="text-decoration: none;">Change Password</button>
                    </a>

                    <a href="<?php echo URLROOT; ?>/donor/deleteProfileDonor">
                        <button class="delete" style="text-decoration: none;">Delete Profile Details</button>
                    </a>
                </div>
                
            </div>



        </main>
    </section>
    <!--home section end-->

  </body>
</html>