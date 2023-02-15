<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/changepassword.css" />
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
          
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <main>
            <div class="container">
                <header>Change Password</header>

                <form action=" <?php echo URLROOT; ?>/donor/changePasswordDonor" method="POST">
                    <div class="formfirst">
                        <div class="fields">
                            <div class="input-field">
                                <label>Old Password</label>
                                <input type="password" name="old_password" placeholder="Enter Your Previous Password" value="<?php echo $data['old_password'];  ?>" >
                                <p class="error"><?php echo $data['old_password_error']; ?></p>
                            </div>
                            <div class="input-field">
                                <label>New Password</label>
                                <input type="password" name="new_password" placeholder="Enter Your New Password" value="<?php echo $data['new_password'];  ?>">
                                <p class="error"><?php echo $data['new_password_error']; ?></p>
                            </div>
                            <div class="input-field">
                                <label>Conform New Password</label>
                                <input type="password" name="confirm_password" placeholder="Conform Your New Password" value="<?php echo $data['confirm_password'];  ?>">
                                <p class="error"><?php echo $data['confirm_password_error']; ?></p>
                            </div>

                        </div>


                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>


                    </div>


                </form>
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