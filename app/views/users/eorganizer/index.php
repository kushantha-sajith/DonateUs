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
    <?php require APPROOT.'/views/inc/side_navbar_eorganizer.php';?>
    <!--navigation bar left end-->

    <!--home section start-->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
<<<<<<< Updated upstream
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
=======
        <a href="<?php echo URLROOT; ?>/pages/profileOrganizer"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
        <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
        <!-- <i class='bx bx-chevron-down'></i> -->
      </div>
    </nav>
    <section id="content">
      <main>
        <ul class="box-info">
          <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
              <h3><?php echo $data['ongoingReqCount']; ?></h3>
              <p>Ongoing Requests </p>
            </span>
          </li>
          <li>
            <i class='bx bxs-group'></i>
            <span class="text">
              <h3><?php echo $data['pendingRequests']; ?></h3>
              <p>Total Users</p>
            </span>
          </li>
          <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
              <h3>Rs.<?php echo $data['totalDonations']; ?></h3>
              <p>Total Financial
                Donations</p>
            </span>
          </li>
        </ul>


        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Recent Donations</h3>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Donor Name</th>
                  <th>Date</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['recentDonations'] as $recentDonations) : ?>
                  <tr>
                    <td>
                      <!--                                <img src="img/people.png">-->
                      <p><?php echo $recentDonations->donor_name; ?></p>
                    </td>
                    <td><?php echo $recentDonations->date_of_completion; ?></td>
                    <td><?php echo $recentDonations->amount; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="todo">
            <!--<div class="head">-->
            <!--<h3>Top Donors</h3>-->
            <!--</div>-->
            <!--<ul class="todo-list">-->
            <!--<li class="not-completed">-->
            <!--<p>#</p>-->
            <!--<i class='bx bx-dots-vertical-rounded'></i>-->
            <!--</li>-->
            <!--</ul>-->
            <div class="chart1" style="height: 23vh;">
              <canvas id="myChart"></canvas>
            </div>
>>>>>>> Stashed changes
          </div>
            <a href="<?php echo URLROOT; ?>/pages/profile_eorganizer"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
         <div class="main-container">
        <h1>Welcome Charity Event Organizer</h1>
          <div class="cardBox">
              <div class="card">
                  <div>
                      <div class="numbers">XXXX</div>
                      <div class="cardName">XXXX XXXXX</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="eye-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">XX</div>
                      <div class="cardName">XXXXX</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="cart-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">XXX</div>
                      <div class="cardName">XXXXXXX</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">XXXXXX</div>
                      <div class="cardName">XXXXXX</div>
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
      /*window.onload = function () {
        
        let type = "<?php echo $_SESSION['user_type']; ?>";
        let menuitem1 = document.getElementById("item1");
        let menuitem2 = document.getElementById("item2");
        if(type === "3" ){
          menuitem1.style.display = "block";
          menuitem2.style.display = "block";
        }else{
          menuitem1.style.display = "none";
          menuitem2.style.display = "none";
        }
        
      };*/

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