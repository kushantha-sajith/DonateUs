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
          <a href="#">
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
          <span class="dashboard">Dashboard</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
            <a href="<?php echo URLROOT; ?>/donor/profile_donor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
      <div>
        <h1>History</h1>
      </div>
      <div>
      <div class="tab" >
                        
                        <button class="tablinks" onload="btnActivate()" onclick="openTab(event, 'Individual')">Pending</button>
                        <button class="tablinks" onclick="openTab(event, 'Corporate')">Completed</button>
                    </div>
                    <div class="tabcontent">
                    <table class="main-table">
          <thead>
            <th colspan="2" style="text-align:left;"><span>Id</span></th>
            <th colspan="2" style="text-align:left;"><span>Request</span></th>
            <th colspan="2" style="text-align:left;"><span>Request Id</span></th>
            <th colspan="2" style="text-align:left;"><span>Type</span></th>
            <th colspan="2" style="text-align:left;"><span>Amount<br>/Quantity</span></th>
            <th colspan="2" style="text-align:left;"><span>Date</span></th>
            <th colspan="2" style="text-align:left;"><span>Category</span></th>
            <th colspan="2" style="text-align:left;"><span></span></th>
            <th colspan="2" style="text-align:left;"><span>Status</span></th>
          </thead>
          <tbody>
            
            <tr class="t-row">
              <td colspan="2" style="text-align:left;">1</td>
              <td colspan="2" style="text-align:left;">aaaaaaaaaaaaaaaaaaaaaaa<br>aaaaaaaaaaaaaaaaaaaaaa</td>
              <td colspan="2" style="text-align:left;">1</td>
              <td colspan="2" style="text-align:left;">Non-Financial</td>
              <td colspan="2" style="text-align:left;">45</td>
              <td colspan="2" style="text-align:left;">14/12/2022</td>
              <td colspan="2" style="text-align:left;">Medicine</td>
              <td colspan="2" style="text-align:left;"><a href="<?php echo URLROOT; ?>/donor/feedback"><button class="btnfeedback">Feedback</button></a></td>
              <td colspan="2" style="text-align:left;">Completed</td>
            </tr>
          
          </tbody>
        </table>

      </div>
                    
                </div>
      </div>
    </section>
    <!--home section end-->

    <script>
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