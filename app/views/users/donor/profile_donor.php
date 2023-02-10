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
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bx-grid-alt"></i>
        <!-- <h1><?php echo $data['title']; ?></h1> -->
        <span class="logo_name">Dashboard</span>
      </div>
      <div class="welcome">
        <span>Welcome</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo URLROOT; ?>/pages/donation_requests_donor">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Donation Requests</span>
          </a>
        </li>
        <li>
        <a href="<?php echo URLROOT; ?>/pages/donationHistory_donor">
            <i class="bx bx-history"></i>
            <span class="links_name">Donation History</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-conversation"></i>
            <span class="links_name">Forum</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-calendar-check"></i>
            <span class="links_name">Events</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-pie-chart-alt"></i>
            <span class="links_name">Stats</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-report"></i>
            <span class="links_name">Reservations</span>
          </a>
        </li>
        <li id="item1">
          <a href="#">
            <i class="bx bxs-report"></i>
            <span class="links_name">Sponsor</span>
          </a>
        </li>
        <li id="item2">
          <a href="#">
            <i class="bx bxs-report"></i>
            <span class="links_name">Reports</span>
          </a>
        </li>
        <li class="log_out">
          <a href="<?php echo URLROOT; ?>/users/logout">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
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
          
            <a href="<?php echo URLROOT; ?>/pages/profile_donor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
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
                                    <input type="text" placeholder="<?php echo $personaldata->f_name." ".$personaldata->l_name; ?>" value="<?php echo $personaldata->f_name." ".$personaldata->l_name; ?>" disabled>
                                </div>
                                <div id="ind3" class="input-field">
                                    <label>NIC</label>
                                    <input type="text" placeholder="<?php echo $personaldata->NIC; ?>" disabled>
                                </div>
                                <div id="corp2" class="input-field">
                                    <label>Company Name</label>
                                    <input type="text" placeholder="<?php echo $personaldata->comp_name; ?>" disabled>
                                </div>

                                <div id="corp3" class="input-field">
                                    <label>Email Address</label>
                                    <input type="text" placeholder="<?php echo $user-> email; ?>" disabled>
                                </div>

                                <div id="ind4" class="input-field">
                                    <label>User Email</label>
                                    <input type="text" placeholder="<?php echo $user-> email; ?>" disabled>
                                </div>

                                <div id="ind5" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="<?php echo $user->tp_number; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>City</label>
                                    <input type="text" placeholder="<?php echo $personaldata->city; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>District</label>
                                    <input type="text" placeholder="<?php echo $data['dist']; ?>" disabled>
                                </div>
                              </div>
                              <span id ="corp4" class="title"><u>Contact Person Details</u></span>
                              <div id="corp9" class="fields">
                                
                                <div id ="corp5" class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="<?php echo $personaldata->emp_name; ?>" disabled>
                                </div>
                                <div id ="corp6" class="input-field">
                                    <label>Employee ID</label>
                                    <input type="text" placeholder="<?php echo $personaldata->emp_id; ?>" disabled>
                                </div>
                                <div id ="corp7" class="input-field">
                                    <label>Designation</label>
                                    <input type="text" placeholder="<?php echo $personaldata->designation; ?>" disabled>
                                </div>
                                <div id ="corp8" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="<?php echo $user->tp_number; ?>" disabled>
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
                    <a href="<?php echo URLROOT; ?>/pages/edit_profile_donor">
                        <button class="edit" style="text-decoration: none;">Edit Profile Details
                        </button>
                    </a>

                    <a href="<?php echo URLROOT; ?>/pages/change_password_donor">
                        <button class="changepassword" style="text-decoration: none;">Change Password</button>
                    </a>

                    <a href="#">
                        <button class="delete" style="text-decoration: none;">Delete Profile Details</button>
                    </a>
                </div>
                
            </div>



        </main>
    </section>
    <!--home section end-->

    <script>

window.onload = function () {
        let type = "<?php echo $_SESSION['user_type']; ?>";
        // let individual ="ind", corporate ="corp";

        // let ind = document.getElementsById(individual);
        // let corp = document.getElementsById(corporate);

        // let i,j; 
        // if(type === "3" ){
          
        // for (i = 0; i < ind.length; i++) {
        //     ind[i].style.display = "none";
        // }
        
        // for (j = 0; j < corp.length; j++) {
        //     corp[j].style.display = "block";
        // }
         
        // }else{

        //   for (i = 0; i < ind.length; i++) {
        //     ind[i].style.display = "block";
        // }
        
        // for (j = 0; j < corp.length; j++) {
        //     corp[j].style.display = "none";
        // }
        // }
        if(type === "3" ){
          document.getElementById("ind1").style.display = "none";
          document.getElementById("ind2").style.display = "none";
          document.getElementById("ind3").style.display = "none";
          document.getElementById("ind4").style.display = "none";
          document.getElementById("ind5").style.display = "none";
        }
        else{
          document.getElementById("corp1").style.display = "none";
          document.getElementById("corp2").style.display = "none";
          document.getElementById("corp3").style.display = "none";
          document.getElementById("corp4").style.display = "none";
          document.getElementById("corp5").style.display = "none";
          document.getElementById("corp6").style.display = "none";
          document.getElementById("corp7").style.display = "none";
          document.getElementById("corp8").style.display = "none";
          document.getElementById("corp9").style.display = "none";
        }
      };

      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      let welcome = document.querySelector(".welcome");
      sidebarBtn.onclick = function () {       
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
          welcome.style.display = "none";
        } else {
          sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
          welcome.style.display = "block";
        }
      };
    </script>
  </body>
</html>