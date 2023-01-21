<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
        <table class="main-table">
          <thead>
          <tr>
            <th colspan="2" style="text-align:left;"><span>Category Name</span></th>
            <th colspan="2" style="text-align:right;"><button id="add" class="add" type="button">Add
            <i class='bx bxs-plus-square'></i></button></th>
          </tr>
          </thead>
          <tbody>
            <?php foreach($data['categories'] as $categories) : ?>
            <tr class="t-row">
              <td style="width: 10px;"><!--<?php echo $categories->id; ?>--></td>
              <td><?php echo $categories->category_name	; ?></td>
              <td class="icon edit" id="edit"><a href="<?php echo URLROOT; ?>/admin/editCategories/<?php echo $categories->id; ?>"><i class='bx bxs-edit'></i></a></td>
              <td class="icon"><a href="<?php echo URLROOT; ?>/admin/deleteCategories/<?php echo $categories->id; ?>"><i class='bx bx-trash' ></i></a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
<!--        add modal-->
      <div id="modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <form action="<?php echo URLROOT; ?>/admin/addCategories" method="POST">
            <div class="div form-group">
              <h2><label for="category_name">Category Name</label></h2>
              <input type="text" name="category_name" id="category_name" class="input" placeholder="Enter Category Name">
            </div>
            <div class="form-group">
              <input type="submit" value="Add" class="btn">
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