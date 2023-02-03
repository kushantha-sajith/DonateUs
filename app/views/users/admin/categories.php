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
        <table class="main-table">
          <thead>
          <tr>
            <th colspan="2" style="text-align:left;"><span>Category Name</span></th>
            <th colspan="2" style="text-align:right;"><button id="add" class="add" type="button"><a style="text-decoration: none" href="<?php echo URLROOT; ?>/admin/addCategories">Add
                        <i class='bx bxs-plus-square'></i></a></button></th>
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
    </section>
    <!--home section end-->

    <script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
  </body>
</html>