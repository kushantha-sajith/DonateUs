<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Request</title>
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
          <a href="#">
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
            <i class="bx bx-pie-chart-alt"></i>
            <span class="links_name">Stats</span>
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
      <div>
        <h1>Requests</h1>
      </div>
      <div>
      <table class="main-table">
          <thead>
            <th style="text-align:left;"><span>Id</span></th>
            <th style="text-align:left;"><span>Description</span></th>
            <th style="text-align:left;"><span>Type</span></th>
            <th style="text-align:left;"><span>Quantity</span></th>
            <th style="text-align:left;"><span>DueDate</span></th>
            <th style="text-align:left;"><span>Category</span></th>
            <th></th>
            <th></th>            
          </thead>
          <tbody>
            <?php foreach($data['requests'] as $requests) : ?>
            <tr class="t-row">
              <td style="text-align:left;"><?php echo $requests->id; ?></td>
              <td style="text-align:left;"><?php echo $requests->description; ?></td>
              <td style="text-align:left;"><?php echo $requests->type; ?></td>
              <td style="text-align:left;"><?php echo $requests->quantity; ?></td>
              <td style="text-align:left;"><?php echo $requests->duedate; ?></td>
              <td style="text-align:left;"><?php echo $requests->categories; ?></td>
              <td><a href="<?php echo URLROOT; ?>/beneficiary/edit/<?php echo $requests->id; ?>">Edit</a></td>
              <td><a href="<?php echo URLROOT; ?>/beneficiary/delete/<?php echo $requests->id; ?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
      <br>
      <br>
      <br>
      <div>
        <a href="<?php echo URLROOT; ?>/beneficiary/newrequest">
        <input type="submit" value="Add a new request" class="btn add">
        </a>
      </div>
      </div> 
      </section>

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


      var modal = document.getElementById("modal");
      var btn = document.getElementById("add");
      var span = document.getElementsByClassName("close")[0];
      btn.onclick = function() {
        modal.style.display = "block";
      }
      span.onclick = function() {
        modal.style.display = "none";
      }
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }

    </script>
  </body>
</html>