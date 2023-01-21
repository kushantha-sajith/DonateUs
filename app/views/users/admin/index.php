<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
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
<!--        <i class="bx bx-grid-alt"></i>-->
        <!-- <h1><?php echo $data['title']; ?></h1> -->
<!--        <span class="logo_name">Dashboard</span>-->
        <img src="<?php echo URLROOT; ?>/img/logo_.png" alt="logo" class="logo"/>
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
            <i class="bx bx-user"></i>
            <span class="links_name">Users</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Donation Requests</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-history"></i>
            <span class="links_name">Donation History</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-message-alt-detail"></i>
            <span class="links_name">Feedbacks</span>
          </a>
        </li>
        <li>
          <a href="<?php echo URLROOT; ?>/admin/categories">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Donation Categories</span>
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
          <span class="dashboard">Dashboard</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
            <img src="<?php echo URLROOT; ?>/img/profile_pic.svg" alt="" />
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
        <h1>Welcome Admin</h1>

          <div class="cardBox">
              <div class="card">
                  <div>
                      <div class="numbers">1,504</div>
                      <div class="cardName">Daily Views</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="eye-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">80</div>
                      <div class="cardName">Sales</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="cart-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">284</div>
                      <div class="cardName">Comments</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">$7,842</div>
                      <div class="cardName">Earning</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="cash-outline"></ion-icon>
                  </div>
              </div>
          </div>

          <div class="tbl-container">
              <div class="lt">
                  <h2>Recent Donations</h2>
                  <table class="main-table t-table tb">
                      <thead>
                      <th>Id</th>
                      <th>Donor Name</th>
                      <th>Category</th>
                      <th>Amount/Quantity</th>
                      <th>Status</th>
                      <th></th>
                      </thead>
                      <tbody>
                      <tr class="t-row">
                          <td>1</td>
                          <td>A</td>
                          <td>Food</td>
                          <td>5</td>
                          <td>Pending</td>
                          <td>view More</td>
                      </tr>
                      <tr class="t-row">
                          <td>1</td>
                          <td>A</td>
                          <td>Food</td>
                          <td>5</td>
                          <td>Pending</td>
                          <td>view More</td>
                      </tr>
                      <tr class="t-row">
                          <td>1</td>
                          <td>A</td>
                          <td>Food</td>
                          <td>5</td>
                          <td>Pending</td>
                          <td>view More</td>
                      </tr>
                      <tr class="t-row">
                          <td>1</td>
                          <td>A</td>
                          <td>Food</td>
                          <td>5</td>
                          <td>Pending</td>
                          <td>view More</td>
                      </tr>
                      <tr class="t-row">
                          <td>1</td>
                          <td>A</td>
                          <td>Food</td>
                          <td>5</td>
                          <td>Pending</td>
                          <td>view More</td>
                      </tr>
                      </tbody>
                  </table>
              </div>
              <div class="rt">
                  <h2>Top Donors</h2>
                  <table class="main-table t-table tb">
                      <thead>
                      <th>Profile</th>
                      <th>Donor Name</th>
                      </thead>
                      <tbody>
                      <tr class="t-row">
                          <td><img class="pr" src="<?php echo URLROOT; ?>/img/profile_pic.svg" alt="" /></td>
                          <td>Avishka</td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>
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