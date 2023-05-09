<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_lists.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
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
    <?php require APPROOT.'/views/inc/side_navbar_donor.php';?>
    <!--navigation bar left end-->

    <!--home section start-->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Donation History</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
 
      <div class="select-menu">
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text">Select Donation Category</span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/1" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            attach_money
                            </span>
                        <span class="option-text">Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/0" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            card_giftcard
                            </span>
                        <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/2" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            fastfood
                            </span>
                        <span class="option-text">Food</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/3" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                            menu_book
                            </span>
                        <span class="option-text">Stationary</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/4" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                                medical_services
                            </span>
                            <span class="option-text">Medicine</span>
                        </li>
                    </a>
            </ul>
        </div>

<<<<<<< Updated upstream

=======
        <div class="select-menu status-menu">
            <h4>Filter By : Status</h4>
            <div class="select-btn status-btn">
                <span class="sBtn-text status_Btn-text">Select Status</span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options status_options">
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/1/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Pending</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/2/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Delivered</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/3/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Completed</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/4/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Canceled</span>
                    </li>
                </a>
                
            </ul>
        </div>
        
        </div> <!-- eo filters -->
        <div class="mid_buttons">
        <div class="btns2">
              <a href="<?php echo URLROOT;?>/donor/eventDonationHistoryDonor" ><button class="btn-back">Donations to Events</button></a>
        </div>
        <div class="btns2">
              <a href="<?php echo URLROOT;?>/donor/viewAllFeedbackDonor" ><button class="btn-back">All Feedback</button></a>
        </div>
        </div>
       
>>>>>>> Stashed changes
            <div class="cards_heading2 head">
                <div>Request ID</div>
                <div>Request</div>
                <div>Category</div>
                <div>Amount/<br>Quantity</div>
                <div>Date</div>
                <div>Status</div>
                <div><span></span></div>
            </div>
            <?php foreach($data['records'] as $record) : ?>
                <div class="cards_heading2 cards_color">
                    <div><?php echo $record->id; ?></div>
                    <div><?php echo $record->request_title; ?></div>
                    <div><?php echo $record->category_name; ?></div>
                    <div>1</div>
                    <div><?php echo $record->time_stamp; ?></div>
                    <div>####</div>
                    <div>
                        <div style="text-align: center;"> <a href="<?php echo URLROOT; ?>/donor/feedback"> <button class="btnview">Feedback</button> </a></div>
                    </div>
                </div>
            <?php endforeach; ?>
            
       
    </section>
    <!--home section end-->

    <script>

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
</html>