<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
<<<<<<< Updated upstream
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <!--navigation bar left-->
    <div class="sidebar">
        <div class="logo-details">
            <!-- <i class="bx bx-grid-alt"></i>
      <span class="logo_name">Dashboard</span> -->
            <img src="logo_.png" class="logo">
        </div>
        <div class="welcome">
            <span>Welcome</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="1.html">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="users.html">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="donation_req_ui.html">
                    <i class="bx bx-list-check"></i>
                    <span class="links_name">Donation Requests</span>
                </a>
            </li>
            <li>
                <a href="donation_history.html">
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
                <span class="dashboard">Donation Requests</span>
            </div>

            <div class="profile-details">
                <div class="notification">
                    <i class="bx bx-bell bx-tada notification"></i>
                </div>
                <a href="#"><img src="1.jpeg" alt="" /></a>
                <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <main>
            <div class="select-menu">
            
                <div class="select-btn">
                    <span class="material-icons">
                        pending_actions
                        </span>
                    <span class="option-text">Pending Requests</a></span>
                    <i class="bx bx-chevron-down"></i>
                </div>

                <ul class="options">
                    <a href="<?php echo URLROOT; ?>requests" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;" >
                                pending_actions
                                </span>
                             
                            <span class="option-text"> Pending Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>donation_req_rejected" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                error
                                </span>
                            <span class="option-text">Rejected Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>donation_req_ongoing" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                receipt_long
                                </span>
                            <span class="option-text">Ongoing Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>donation_req_completed" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                assignment_turned_in
                                </span>
                            <span class="option-text">Completed Requests</span>
                        </li>
                    </a>

                    

                </ul>
            </div>


            <!-- <div>
      <table class="cards_heading head">
          <thead class="cards_heading cards_color">
=======
    
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
  <?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>

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
          <a href="<?php echo URLROOT; ?>/beneficiary/profile"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
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
>>>>>>> Stashed changes
            <th style="text-align:left;"><span>Id</span></th>
            <th style="text-align:left;"><span>Description</span></th>
            <th style="text-align:left;"><span>Name</span></th>
            <th style="text-align:left;"><span>Quantity</span></th>
            <th style="text-align:left;"><span>DueDate</span></th>
<<<<<<< Updated upstream
            <th style="text-align:left;"><span>Categories</span></th>
             <th style="text-align:left;"><span>City</span></th>
            <th style="text-align:left;"><span>Contact</span></th> -->
<!-- 
            <div>
=======
            <th style="text-align:left;"><span>Title</span></th>
            <th style="text-align:left;"><span>City</span></th>
            <th style="text-align:left;"><span>Contact</span></th>
            <!-- <th style="text-align:left;"><span>user_id</span></th>
            <th style="text-align:left;"><span>cat_id</span></th> -->


            <th></th>
            <th></th>            
          </thead>
          <tbody>
>>>>>>> Stashed changes
            <?php foreach($data['requests'] as $requests) : ?>
            <tr class="t-row">
              <td style="text-align:left;"><?php echo $requests->id; ?></td>
              <td style="text-align:left;"><?php echo $requests->description; ?></td>
              <td style="text-align:left;"><?php echo $requests->name; ?></td>
              <td style="text-align:left;"><?php echo $requests->quantity; ?></td>
              <td style="text-align:left;"><?php echo $requests->duedate; ?></td>
<<<<<<< Updated upstream
              <td style="text-align:left;"><?php echo $requests->categories; ?></td>
              <!-- <td style="text-align:left;"><?php echo $requests->city; ?></td>
              <td style="text-align:left;"><?php echo $requests->contact; ?></td> -->

              <center> <a href="<?php echo URLROOT; ?>req_form"> <button class="btnview" >View More</button> </a></center>

              <!-- <td><a href="<?php echo URLROOT; ?>/beneficiary/editRequest/<?php echo $requests->id; ?>" class="btn-edit">Edit</a></td>
              <td><a href="<?php echo URLROOT; ?>/beneficiary/deleteRequest/<?php echo $requests->id; ?>" class="btn-delete">Delete</a></td> -->
            <!-- </tr>
=======
              <td style="text-align:left;"><?php echo $requests->title; ?></td>
              <td style="text-align:left;"><?php echo $requests->city; ?></td>
              <td style="text-align:left;"><?php echo $requests->contact; ?></td>
              <!-- <td style="text-align:left;"><?php echo $requests->user_id; ?></td>
              <td style="text-align:left;"><?php echo $requests->cat_id; ?></td> -->


              <td><a href="<?php echo URLROOT; ?>/beneficiary/editRequest/$requests->id<?php echo $requests->id; ?>" class="btn-edit">Edit</a></td>
              <td><a href="<?php echo URLROOT; ?>/beneficiary/deleteRequest/<?php echo $requests->id; ?>" class="btn-delete">Delete</a></td>
            </tr>
>>>>>>> Stashed changes
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>  -->
    <br>
    <br>
    <br>

<<<<<<< Updated upstream
       <!-- <div>
        <a href="<?php echo URLROOT; ?>/beneficiary/req_form">
=======
      </div>
      <br>
      <br>
      <br>
      <div>
        <a href="<?php echo URLROOT; ?>/beneficiary/reqForm">
>>>>>>> Stashed changes
        <input type="submit" value="Add a new request" class="btn add">
        </a>
      </div>  -->
             <div class="cards_heading head">
                <div><span>Id</span></div>
                <div><span>Description</span></div>
                <div><span>Type</span></div>
                <div><span>Quantity</span></div>
                <div><span>DueDate</span></div>
                <div><span>Category</span></div>
                <div></div>
            </div>

            <div class="cards_heading cards_color">
            <?php foreach($data['requests'] as $requests) : ?>
                <div><?php echo $requests->id; ?></div>
                <div><?php echo $requests->description; ?></div>
                <div><?php echo $requests->type; ?></div>
                <div><?php echo $requests->quantity; ?></div>
                <div><?php echo $requests->duedate; ?></div>
                <div><?php echo $requests->categories; ?></div>
                <div>
                   <center> <a href="<?php echo URLROOT; ?>req_form"> <button class="btnview" >View More</button> </a></center>
                </div>
                <?php endforeach; ?>
             </div>
         </main>

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
        // js for drop down list 
        const optionMenu = document.querySelector(".select-menu"),
            selectBtn = optionMenu.querySelector(".select-btn"),
            options = optionMenu.querySelectorAll(".option"),
            sBtn_text = optionMenu.querySelector(".sBtn-text");

        selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

        options.forEach(option => {
            option.addEventListener("click", () => {
                let selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;

                optionMenu.classList.remove("active");
            });
        });

    </script>
</body>

<<<<<<< Updated upstream
</html>
=======
</html> -->
>>>>>>> Stashed changes
