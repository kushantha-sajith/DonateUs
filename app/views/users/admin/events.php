<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Events</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <span class="dashboard">Events</span>
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
          <label for="tab1">
              <span class="material-icons" style="color: black; margin-right: 1rem;" >pending_actions</span>
              <span class="option-text">Pending</span>
          </label>
          <!-- Tab 2 -->
          <input type="radio" name="tabset" id="tab2" aria-controls="ongoing" />
          <label for="tab2">
              <span class="material-icons" style="color: black; margin-right: 1rem;">receipt_long</span>
              <span class="option-text">Ongoing</span>
          </label>
          <!-- Tab 3 -->
          <input type="radio" name="tabset" id="tab3" aria-controls="rejected" />
          <label for="tab3">
              <span class="material-icons" style="color: black; margin-right: 1rem;">error</span>
              <span class="option-text">Rejected</span>
          </label>
          <!-- Tab 4 -->
          <input type="radio" name="tabset" id="tab4" aria-controls="completed" />
          <label for="tab4">
              <span class="material-icons" style="color: black; margin-right: 1rem;">assignment_turned_in</span>
              <span class="option-text">Completed</span>
          </label>

        <div class="tabpanels">
          <section id="pending" class="tab">
<!--            <table class="main-table t-table">-->
<!--              <thead>-->
<!--                <th>Id</th>-->
<!--                <th>Event Organizer Name</th>-->
<!--                <th>Event Name</th>-->
<!--                <th>Description</th>-->
<!--                <th>Total Cost</th>-->
<!--                <th>Due Date</th>-->
<!--                <th></th>-->
<!--              </thead>-->
<!--              <tbody>-->
<!--                <?php //foreach($data['categories'] as $categories) : ?>-->
<!--                <tr class="t-row">-->
<!--                  <td style="width: 10px;"><?php //echo $categories->id; ?></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td>-->
<!--                    <a href="#">View More</a>-->
<!--                  </td>-->
<!--                </tr>-->
<!--                <?php //endforeach; ?>-->
<!--              </tbody>-->
<!--            </table>-->

              <div class="cards_heading head">
                  <div>ID</div>
                  <div>Event Title</div>
                  <div>Event Organizer Name</div>
                  <div>Description</div>
                  <div>Amount</div>
                  <div>Due Date</div>
                  <div></div>
              </div>
              <?php foreach($data['categories'] as $categories) : ?>
                  <div class="cards_heading cards_color">
                      <div><?php echo $categories->id; ?></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div>
                          <div style="text-align: center;"> <a href="#"> <button class="btnview">View More</button> </a></div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </section>

          <section id="ongoing" class="tab">
<!--            <table class="main-table t-table">-->
<!--              <thead>-->
<!--                <th>Id</th>-->
<!--                <th>Event Organizer Name</th>-->
<!--                <th>Event Name</th>-->
<!--                <th>Received Amount</th>-->
<!--                <th>Sponsors</th>-->
<!--                <th>Due Date</th>-->
<!--                <th>Total Cost</th>-->
<!--                <th></th>-->
<!--              </thead>-->
<!--              <tbody>-->
<!--                <?php //foreach($data['categories'] as $categories) : ?>-->
<!--                <tr class="t-row">-->
<!--                  <td style="width: 10px;"><?php //echo $categories->id; ?></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td>-->
<!--                    <a href="#">View More</a>-->
<!--                  </td>-->
<!--                </tr>-->
<!--                <?php //endforeach; ?>-->
<!--              </tbody>-->
<!--            </table>-->

              <div class="cards_heading head">
                  <div>ID</div>
                  <div>Event Title</div>
                  <div>Event Organizer Name</div>
                  <div>Received Amount</div>
                  <div>Due Date</div>
                  <div>Amount</div>
                  <div></div>
              </div>
              <?php foreach($data['categories'] as $categories) : ?>
                  <div class="cards_heading cards_color">
                      <div><?php echo $categories->id; ?></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div>
                          <div style="text-align: center;"> <a href="#"> <button class="btnview" >View More</button> </a></div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </section>
          
          <section id="rejected" class="tab">
<!--            <table class="main-table t-table">-->
<!--              <thead>-->
<!--                <th>Id</th>-->
<!--                <th>Event Organizer Name</th>-->
<!--                <th>Event Name</th>-->
<!--                <th>Description</th>-->
<!--                <th>Total Cost</th>-->
<!--                <th>Rejection Date</th>-->
<!--                <th></th>-->
<!--              </thead>-->
<!--              <tbody>-->
<!--                <?php //foreach($data['categories'] as $categories) : ?>-->
<!--                <tr class="t-row">-->
<!--                  <td style="width: 10px;"><?php //echo $categories->id; ?></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td>-->
<!--                    <a href="#">View More</a>-->
<!--                  </td>-->
<!--                </tr>-->
<!--                <?php //endforeach; ?>-->
<!--              </tbody>-->
<!--            </table>-->

              <div class="cards_heading head">
                  <div>ID</div>
                  <div>Event Title</div>
                  <div>Event Organizer Name</div>
                  <div>Rejection Note</div>
                  <div>Rejection Date</div>
                  <div>Amount</div>
                  <div></div>
              </div>
              <?php foreach($data['categories'] as $categories) : ?>
                  <div class="cards_heading cards_color">
                      <div><?php echo $categories->id; ?></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div>
                          <div style="text-align: center;"> <a href="#"> <button class="btnview" >View More</button> </a></div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </section>

          <section id="completed" class="tab">
<!--            <table class="main-table t-table">-->
<!--              <thead>-->
<!--                <th>Id</th>-->
<!--                <th>Event Organizer Name</th>-->
<!--                <th>Event Name</th>-->
<!--                <th>Received Sponsors</th>-->
<!--                <th>Receieved Amount</th>-->
<!--                <th>Completeion Date</th>-->
<!--                <th>Total Cost</th>-->
<!--                <th></th>-->
<!--              </thead>-->
<!--              <tbody>-->
<!--                <?php //foreach($data['categories'] as $categories) : ?>-->
<!--                <tr class="t-row">-->
<!--                  <td style="width: 10px;"><?php //echo $categories->id; ?></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td></td>-->
<!--                  <td>-->
<!--                    <a href="#">View More</a>-->
<!--                  </td>-->
<!--                </tr>-->
<!--                <?php //endforeach; ?>-->
<!--              </tbody>-->
<!--            </table>-->

              <div class="cards_heading head">
                  <div>ID</div>
                  <div>Event Title</div>
                  <div>Event Organizer Name</div>
                  <div>Received Amount</div>
                  <div>Completion Date</div>
                  <div>Amount</div>
                  <div></div>
              </div>
              <?php foreach($data['categories'] as $categories) : ?>
                  <div class="cards_heading cards_color">
                      <div><?php echo $categories->id; ?></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div>
                          <div style="text-align: center;"> <a href="#"> <button class="btnview" >View More</button> </a></div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </section>
        </div>
      </div>
    </div>
  </section>
  <!--home section end-->

  <script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
</body>

</html>