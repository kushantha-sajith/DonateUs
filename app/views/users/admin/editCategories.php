<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
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
          <a href="#">
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
<!--        edit modal-->
        <div id="modal1" class="modal" style="display: block">
            <div class="modal-content">
                <span class="close"><a href="<?php echo URLROOT; ?>/admin/categories">&times;</a></span>
                <form action="<?php echo URLROOT; ?>/admin/editCategories/<?php echo $data['id']; ?>" method="POST">
                    <div class="div form-group">
                        <h2><label for="category_name">Category Name</label></h2>
                        <input id="catName1" type="text" name="category_name" class="input" placeholder="Edit Category Name" value="<?php echo $data['category_name']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn">
                    </div>
                </form>
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