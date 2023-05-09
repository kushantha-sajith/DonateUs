<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Beneficiary Dashboard</title>
    
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin_dashboard.css"/>

    
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
            <a href="<?php echo URLROOT; ?>/beneficiary/allDonations">
                <i class="bx bx-list-check"></i>
                <span class="links_name">Donation Requests</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/donationHistoryBeneficiary">
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
          <a href="<?php echo URLROOT; ?>/beneficiary/viewCalendar">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Calendar</span>
          </a>
        </li>

        <li id="item2">
          <a href="<?php echo URLROOT; ?>/beneficiary/viewReservation">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Reservations</span>
          </a>
        </li>

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
          <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
          
        </div>
      </nav>
      <div class="main-container">
        <h1>Welcome Beneficiary</h1>

          <div class="cardBox">
              <div class="card" >
                  <div>
                      <div class="numbers"><?php echo $data['total']; ?></div>
                      <div class="cardName"><a href="<?php echo URLROOT; ?>/beneficiary/allDonations" style="text-decoration:none;">Total Donation Requests </a></div>
                      <!-- Total Donation Requests -->
                  </div>

                  <div class="iconBx">
                      <ion-icon name="eye-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers"><?php echo $data['ongoing']; ?></div>
                      <div class="cardName"><a href="<?php echo URLROOT; ?>/beneficiary/donationOngoing" style="text-decoration:none">Ongoing Requests </a></div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="cart-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers"><?php echo $data['complete']; ?></div>
                      <div class="cardName"><a href="<?php echo URLROOT; ?>/beneficiary/donationCompleted" style="text-decoration:none">Completed Requests </a></div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers"><?php echo $data['reject']; ?></div>
                      <div class="cardName"><a href="<?php echo URLROOT; ?>/beneficiary/donationReject" style="text-decoration:none">Rejected Requests </a></div>

                  </div>

                  <div class="iconBx">
                      <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>
              </div>

              
               
            </div>
            <div >
                <div>
                    <div ><br><br>
                        <h3>Recent Donation Requests</h3>
                    </div>
                    
                    
                    </style>
                    <br>
                    <table class="recent-table">
                        <thead>
                        <tr class="recent-table-tr">
                            <td><b>Request Title</b> </td>
                            <td><b>Beneficiary Name</b> </td>
                            <td><b>Due Date</b></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['requests'] as $requests) : ?>
                            <tr  class="recent-table-tr">
                                <td>
                                    <p><?php echo $requests->request_title; ?></p>
                                </td>
                                <td><?php echo $requests->name; ?></td>
                                <td><?php echo $requests->due_date; ?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
             
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