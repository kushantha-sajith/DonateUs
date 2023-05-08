<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Profile</title>
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
    <?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>
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
          <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
            <!-- <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a> -->
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
                            <span id ="org1"class="title"><u>organization Details</u></span>
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
                                <div id="org2" class="input-field">
                                    <label>Company Name</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->org_name; ?>" disabled>
                                </div>

                                <div id="org3" class="input-field">
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
                                    <label>zipcode</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->zipcode; ?>" disabled>
                                </div>
<<<<<<< Updated upstream
                                <!-- <div class="input-field">
=======

                                <div class="input-field">
>>>>>>> Stashed changes
                                    <label>District</label>
                                    <input type="text" placeholder="" value="<?php echo $data['dist']; ?>" disabled>
                                </div>
                              </div> -->


                                <?php if($personaldata->reservation==1){ ?>

                                <div id="org10" class="input-field">
                                    <label>Members Quantity</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata-> members; ?>" disabled>
                                </div>


                                <!-- <div id="org11">
                                    <label>Meal Plan</label>
                                    <input type="file" placeholder="" value="<?php echo $personaldata-> meal_plan; ?>" disabled>

                                </div> -->

                            
                                <div id="org11">
                                    <label>Meal Plan</label>
                                    <img src="<?php echo URLROOT; ?>/uploads/ <?php echo $personaldata->meal_plan; ?>" alt="Meal Plan">
                                </div>

                                <?php } ?>

                              </div>
                              
                              
                                <!-- <?php if($personaldata->reservation==1 && $personaldata->$user_type==5){ ?>
                                  <div>
                                <div id="org10" class="input-field">
                                    <label>Members Quantity</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata-> members; ?>" disabled>
                                </div>


                                <div id="org11" class="input-field">
                                <label>Meal Plan</label>
                                    <img style="width:150px; height:150px;" src="<?php echo URLROOT; ?>/uploads/<?php echo $personaldata->meal_plan;  ?>">
                                </div>

                                </div>
                                <?php } ?> -->

                              </div>
                              <span id ="org4" class="title"><u>Contact Person Details</u></span>
                              <div id="org9" class="fields">
                                
                                <div id ="org5" class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->emp_name; ?>" disabled>
                                </div>
                                <div id ="org6" class="input-field">
                                    <label>Employee ID</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->emp_id; ?>" disabled>
                                </div>
                                <div id ="org7" class="input-field">
                                    <label>Designation</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->designation; ?>" disabled>
                                </div>
                                <div id ="org8" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="" value="<?php echo $user->tp_number; ?>" disabled>
                                </div>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="updatebtn">
                    <a href="<?php echo URLROOT; ?>/beneficiary/editProfileBeneficiary">
                        <button class="edit" style="text-decoration: none; ">Edit Profile Details
                        </button>
                    </a>

                    <a href="<?php echo URLROOT; ?>/beneficiary/changePasswordBeneficiary">
                        <button class="changepassword" style="text-decoration: none; padding-left:20px;">Change Password</button>
                    </a>

                    <a href="<?php echo URLROOT; ?>/beneficiary/deleteProfileBeneficiary">
                        <button class="delete" style="text-decoration: none; padding-left:20px;">Delete Profile Details</button>
                    </a>
                </div>
                
                       
                    </div>
                </form>
                
            </div>

                                </div>
                                </div>
        </main>
    </section>
    <!--home section end-->


    

  </body>
</html>