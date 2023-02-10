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
    <?php require APPROOT.'/views/inc/side_navbar.php';?>
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
    <script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
  </body>
</html>