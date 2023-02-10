<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
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
          <span class="dashboard">Dashboard</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
            <a href="<?php echo URLROOT; ?>/donor/profile"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
      <div class="profile">
                      <img class="img_profile" src="<?php echo URLROOT; ?>/img/img_profile.png" alt="img_profile" href="">
                      <form action="<?php echo URLROOT; ?>/donor/updateProfile" method="POST">
                      <table class="prof_data" >
                        <?php foreach($data['userdata'] as $user) : ?>
                        <tr id = "ind1"><td>
                            <label>Full Name</label>
                            <input type="text" id="fullname" name="fullname" value="<?php echo $user->f_name." ".$user->l_name; ?>"></td>
                            <td><label>Email</label>
                            <input type="text" id="email" name="email" placeholder="" value="<?php echo $user-> email; ?>"></td>
                        </tr>

                        <tr id = "corp1"><td>
                            <label>Company Name</label>
                            <input type="text" id="fullname" name="fullname" value="<?php echo $user-> c_name; ?>"></td>
                            <td><label>Email</label>
                            <input type="text" id="email" name="email" placeholder="" value="<?php echo $user-> email; ?>"></td>
                        </tr>

                        <tr><td>
                            <label>Contact Number</label>
                            <input type="text" id="contact" name="contact" value="<?php echo $user->contact; ?>"></td>
                            <td id = "ind2">
                            <label>City</label>
                            <input type="text" id="city" name="city" value="<?php echo $user->city; ?>"></td>
                        </tr>

                        <tr id = "corp2"><td>
                            <label>Employee Id</label>
                            <input type="text" id="fullname" name="fullname" value="<?php echo $user-> eid; ?>"></td>
                            <td><label>Designation</label>
                            <input type="text" id="email" name="email" placeholder="" value="<?php echo $user-> designation; ?>"></td>
                        </tr>

                           <?php endforeach; ?>
                        <tr>
                            <td><input type="submit" value="Update Profile"></td>
                            <td><input type="button" value="Update Password" onclick=""></td>
                        </tr>
                        
                      </table>
                      <input class="btndelete" type="button" value="Delete Account" onclick="">
                      </form>
                    </div>
                    
                </div>
      </div>
    </section>
    <!--home section end-->

    <script>

window.onload = function () {
        let type = "<?php echo $_SESSION['user_type']; ?>";
        let menuitem1 = document.getElementById("item1");
        let menuitem2 = document.getElementById("item2");
        let profitem1 = document.getElementById("ind1");
        let profitem2 = document.getElementById("corp1");
        let profitem3 = document.getElementById("ind2");
        let profitem4 = document.getElementById("corp2");
        if(type === "corporate" ){
          menuitem1.style.display = "block";
          menuitem2.style.display = "block";
          profitem1.style.display = "none";
          profitem3.style.display = "none";
          profitem2.style.display = "absolute";
          profitem4.style.display = "absolute";
        }else{
          menuitem1.style.display = "none";
          menuitem2.style.display = "none";
          profitem1.style.display = "absolute";
          profitem3.style.display = "absolute";
          profitem2.style.display = "none";
          profitem4.style.display = "none";
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