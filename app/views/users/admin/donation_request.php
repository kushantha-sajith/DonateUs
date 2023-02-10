<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
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
        <span class="dashboard">Donation Requests</span>
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
      <div class="tabset">
        <!-- Tab 1 -->
        <input type="radio" name="tabset" id="tab1" aria-controls="pending" checked />
        <label for="tab1">Pending</label>
        <!-- Tab 2 -->
        <input type="radio" name="tabset" id="tab2" aria-controls="ongoing" />
        <label for="tab2">Ongoing</label>
        <!-- Tab 3 -->
        <input type="radio" name="tabset" id="tab3" aria-controls="rejected" />
        <label for="tab3">Rejected</label>
        <!-- Tab 4 -->
        <input type="radio" name="tabset" id="tab4" aria-controls="completed" />
        <label for="tab4">Completed</label>

        <div class="tabpanels">
          <section id="pending" class="tab">
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Beneficiary Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Amount/Quantity</th>
                <th>Category</th>
                <th>Due Date</th>
                <th></th>
              </thead>
              <tbody>
                <!-- <?php foreach($data['categories'] as $categories) : ?> -->
                <tr class="t-row">
                  <td style="width: 10px;"><!--<?php echo $categories->id; ?>--></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="#">View More</a>
                  </td>
                </tr>
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
          </section>

          <section id="ongoing" class="tab">
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Beneficiary Name</th>
                <th>Receieved Amount/Quantity</th>
                <th>Type</th>
                <th>Amount/Quantity</th>
                <th>Due Date</th>
                <th>Category</th>
                <th></th>
              </thead>
              <tbody>
                <!-- <?php foreach($data['categories'] as $categories) : ?> -->
                <tr class="t-row">
                  <td style="width: 10px;"><!--<?php echo $categories->id; ?>--></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="#">View More</a>
                  </td>
                </tr>
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
          </section>
          
          <section id="rejected" class="tab">
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Beneficiary Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Amount/Quantity</th>
                <th>Category</th>
                <th>Rejection Date</th>
                <th></th>
              </thead>
              <tbody>
                <!-- <?php foreach($data['categories'] as $categories) : ?> -->
                <tr class="t-row">
                  <td style="width: 10px;"><!--<?php echo $categories->id; ?>--></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="#">View More</a>
                  </td>
                </tr>
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
          </section>

          <section id="completed" class="tab">
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Beneficiary Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Receieved Amount/Quantity</th>
                <th>Completeion Date</th>
                <th>Category</th>
                <th></th>
              </thead>
              <tbody>
                <!-- <?php foreach($data['categories'] as $categories) : ?> -->
                <tr class="t-row">
                  <td style="width: 10px;"><!--<?php echo $categories->id; ?>--></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="#">View More</a>
                  </td>
                </tr>
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
          </section>
        </div>
      </div>
    </div>
  </section>
  <!--home section end-->

  <script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
</body>

</html>