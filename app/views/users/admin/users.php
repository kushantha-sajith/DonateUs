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
        <span class="dashboard">Users</span>
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
        <input type="radio" name="tabset" id="tab1" aria-controls="donors" checked />
        <label for="tab1">Donors</label>
        <!-- Tab 2 -->
        <input type="radio" name="tabset" id="tab2" aria-controls="beneficiaries" />
        <label for="tab2">Beneficiaries</label>
        <!-- Tab 3 -->
        <input type="radio" name="tabset" id="tab3" aria-controls="eventOrg" />
        <label for="tab3">Event Organizers</label>

        <div class="tabpanels">
          <section id="donors" class="tab">
            <p>Filter by :</p>
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Full Name/Company Name</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Status</th>
                <th>City</th>
                <th>Donor Type</th>
                <th></th>
              </thead>
              <tbody>
                 <?php foreach($data['users'] as $users) : ?>
                <tr class="t-row">
                  <td style="width: 10px;"><?php echo $users->id; ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="#"><i class="bx bx-trash"></i></a>
                  </td>
                </tr>
                 <?php endforeach; ?>
              </tbody>
            </table>
          </section>

          <section id="beneficiaries" class="tab">
            <h3>Verify Beneficiaries :</h3>
            <a href="#" class="">View All</a>
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Full Name/Company Name</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Address</th>
                <th>Beneficiary Type</th>
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
                  <td>
                    <a href="#">View More</a>
                  </td>
                </tr>
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
            <h3>Beneficiaries :</h3>
            <a href="#" class="">View All</a>
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Full Name/Company Name</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Status</th>
                <th>City</th>
                <th>Beneficiary Type</th>
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
                    <a href="#"><i class="bx bx-trash"></i></a>
                  </td>
                </tr>
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
          </section>

          <section id="eventOrg" class="tab">
            <h3>Verify Event Organizers :</h3>
            <a href="#" class="">View All</a>
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Full Name</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Address</th>
                <th>Community Name</th>
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
                  <td>
                    <a href="#">View More</a>
                  </td>
                </tr>
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
            <h3>Event Organizers :</h3>
            <a href="#" class="">View All</a>
            <table class="main-table t-table">
              <thead>
                <th>Id</th>
                <th>Full Name</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Status</th>
                <th>Community Name</th>
                <th>Designation</th>
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
                    <a href="#"><i class="bx bx-trash"></i></a>
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