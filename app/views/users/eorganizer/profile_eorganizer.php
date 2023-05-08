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
    <?php require APPROOT.'/views/inc/side_navbar_eorganizer.php';?>
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
          
            <a href="<?php echo URLROOT; ?>/pages/profile_eorganizer"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
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
                            <span class="title"><u>Personal Details</u></span>
                            <div class="fields">
                            <?php foreach($data['userdata'] as $user) : ?>
                              <?php foreach($data['personaldata'] as $personaldata) : ?>
                                                              
                                <div class="input-field">
                                    <label>User Email</label>
                                    <input type="text" placeholder="" value="<?php echo $user-> email; ?>" disabled>
                                </div>

                                <div class="input-field">
                                    <label>NIC</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->NIC; ?>" disabled>
                                </div>

                                <div class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->full_name ?>" disabled >
                                </div>
                                

                                <div class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="" value="<?php echo $user->tp_number; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>Community Name</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->community_name; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>Designation</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->designation; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>City</label>
                                    <input type="text" placeholder="" value="<?php echo $personaldata->zipcode; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>District</label>
                                    <input type="text" placeholder="" value="<?php echo $data['dist']; ?>" disabled>
                                </div>
                                                              
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                    </div>
                </form>
                <div class="updatebtn">
                    <a href="<?php echo URLROOT; ?>/pages/editProfileOrganizer">
                        <button class="edit" style="text-decoration: none;">Edit Profile Details
                        </button>
                    </a>

                    <a href="<?php echo URLROOT; ?>/pages/changePasswordOrganizer">
                        <button class="changepassword" style="text-decoration: none;margin-left: 10px;">Change Password</button>
                    </a>

                    <a href="#">
                        <button class="delete" style="text-decoration: none;margin-left: 20px;">Delete Profile Details</button>
                    </a>
                </div>
                
            </div>
            



        </main>
    </section>
    <!--home section end-->

    
  </body>
</html>