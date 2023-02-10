<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Beneficiary Dashboard</title>
    
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>

  <div class="sidebar">
      <div class="logo-details">
        <!-- <i class="bx bx-grid-alt"></i>
       
        <span class="logo_name">Dashboard</span> -->
        <img src="<?php echo URLROOT; ?>/img/logo_.png" alt="logo" class="logo"/>
      </div>
      <!-- <div class="welcome">
        <span>Welcome</span>
      </div> -->
      <ul class="nav-links">
      <li>
            <a href="<?php echo URLROOT; ?>/beneficiary/index">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        
        <li>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        <a href="<?php echo URLROOT; ?>/beneficiary/donation_req">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Donation Requests</span>
          </a>
=======
=======
>>>>>>> Stashed changes
            <a href="<?php echo URLROOT; ?>/beneficiary/requests">
                <i class="bx bx-list-check"></i>
                <span class="links_name">Donation Requests</span>
            </a>
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/beneficiary/donationHistory_beneficiary">
                <i class="bx bx-history"></i>
                <span class="links_name">Donation History</span>
            </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-conversation"></i>
            <span class="links_name">Forum</span>
          </a>
        </li> -->
        <li>
            <a href="<?php echo URLROOT; ?>/beneficiary/stats">
                <i class="bx bx-pie-chart-alt"></i>
                <span class="links_name">Stats</span>
                
            </a>
        </li>

        <li id="item1">
<<<<<<< Updated upstream
          <a href="#">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Calendar</span>
          </a>
        </li>

        <li id="item2">
          <a href="#">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Reservations</span>
          </a>
        </li>

=======
          <a href="#">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Calendar</span>
          </a>
        </li>

        <li id="item2">
          <a href="#">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Reservations</span>
          </a>
        </li>

>>>>>>> Stashed changes
        <li id="item3">
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
          <a href="<?php echo URLROOT; ?>/beneficiary/profile"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
        <h1>Welcome Beneficiary</h1>

          <div class="cardBox">
              <div class="card">
                  <div>
                      <div class="numbers">10</div>
                      <div class="cardName">Total Donation Requests</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="eye-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">20</div>
                      <div class="cardName">Rejected Requests</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="cart-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">Rs.5000/=</div>
                      <div class="cardName">Received Financial Donations</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">10</div>
                      <div class="cardName">Received Non Financial Donations</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>
              </div>

             
          </div>
       
          <br><br>
          <table class="table-img">
            <tr>
              <td class="table-data"><img src="<?php echo URLROOT; ?>/img/image1.png" width="650" height="450"/></td>
            
              <td class="table-data"><img src="<?php echo URLROOT; ?>/img/image2.png" width="700" height="450"/></td>
          </tr>
          </table>

         
        </div>
      </div>
    </section>
    <!--home section end-->

    <script>

        window.onload = function () {
        
        let type = "<?php echo $_SESSION['user_type']; ?>";
        let menuitem1 = document.getElementById("item1");
        let menuitem2 = document.getElementById("item2");
        let menuitem3 = document.getElementById("item3");
        if(type === "5" ){
          menuitem1.style.display = "block";
          menuitem2.style.display = "block";
          menuitem3.style.display = "block";
        }else{
          menuitem1.style.display = "none";
          menuitem2.style.display = "none";
          menuitem3.style.display = "none";
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