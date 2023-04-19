<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />
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
    <?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>
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
            <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
      
      <!-- <div>
      <div class="tab" >
                        
                        <button class="tablinks" onload="btnActivate()" onclick="openTab(event, 'Individual')">Completed</button>
                        <button class="tablinks" onclick="openTab(event, 'Corporate')">Pending</button>
                    </div>
                    <div class="tabcontent">
                    <table class="main-table">
          <thead>
            <th colspan="2" style="text-align:left;"><span>Id</span></th>
            <th colspan="2" style="text-align:left;"><span>Request</span></th>
            <th colspan="2" style="text-align:left;"><span>Request Id</span></th>
            <th colspan="2" style="text-align:left;"><span>Type</span></th>
            <th colspan="2" style="text-align:left;"><span>Amount<br>/Quantity</span></th>
            <th colspan="2" style="text-align:left;"><span>Date</span></th>
            <th colspan="2" style="text-align:left;"><span>Category</span></th>
            <th colspan="2" style="text-align:left;"><span></span></th>
            <th colspan="2" style="text-align:left;"><span>Status</span></th>
          </thead>
          <tbody>
            
            <tr class="t-row">
              <td colspan="2" style="text-align:left;">1</td>
              <td colspan="2" style="text-align:left;">aaaaaaaaaaaaaaaaaaaaaaa<br>aaaaaaaaaaaaaaaaaaaaaa</td>
              <td colspan="2" style="text-align:left;">1</td>
              <td colspan="2" style="text-align:left;">Non-Financial</td>
              <td colspan="2" style="text-align:left;">45</td>
              <td colspan="2" style="text-align:left;">14/12/2022</td>
              <td colspan="2" style="text-align:left;">Medicine</td>
              <td colspan="2" style="text-align:left;"><a href="<?php echo URLROOT; ?>/donor/feedback"><button class="btnfeedback">Feedback</button></a></td>
              <td colspan="2" style="text-align:left;">Completed</td>
            </tr>
          
          </tbody>
        </table>

      </div>
                    
                </div>
      </div> -->

   
      <div class="select-menu">
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text"><?php echo $data['cat_title']; ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
              <a href="<?php echo URLROOT;?>/beneficiary/donationHistoryBeneficiary" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            filter_alt_off
                            </span>
                        <span class="option-text">All</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/1" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            attach_money
                            </span>
                        <span class="option-text">Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/0" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            card_giftcard
                            </span>
                        <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/2" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            fastfood
                            </span>
                        <span class="option-text">Food</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/3" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                            menu_book
                            </span>
                        <span class="option-text">Stationary</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/4" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                                medical_services
                            </span>
                            <span class="option-text">Medicine</span>
                        </li>
                    </a>
            </ul>
        </div>


            <div class="cards_heading head">
                <div>Request ID</div>
                <div>Request</div>
                <div>Category</div>
                <div>Amount/<br>Quantity</div>
                <div>Date</div>
                <div>Status</div>
                <div><span></span></div>
            </div>
            <?php foreach($data['records'] as $record) : ?>
                <div class="cards_heading cards_color">
                    <div><?php echo $record->id; ?></div>
                    <div><?php echo $record->request_title; ?></div>
                    <div><?php echo $record->category_name; ?></div>
                    <div>1</div>
                    <div><?php echo $record->time_stamp; ?></div>
                    <div>####</div>
                    <div>
                        <div style="text-align: center;"> <a href="<?php echo URLROOT; ?>/beneficiary/feedback"> <button class="btnview">Feedback</button> </a></div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <?php foreach($data['corpDonors'] as $corpDonors) : ?>
                <div class="cards_heading cards_color">
                    <div><?php echo $corpDonors->id; ?></div>
                    <div><?php echo $corpDonors->comp_name; ?></div>
                    <div><?php echo $corpDonors->email; ?></div>
                    <div>
                        <select name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Deactive">Deactive</option>
                        </select>
                    </div>
                    <div>Corporate</div>
                    <div><?php echo $corpDonors->city; ?></div>
                    <div>
                        <div style="text-align: center;"> <a href="<?php echo URLROOT; ?>/pages/userDetails"> <button class="btnview">View More</button> </a></div>
                    </div>
                </div>
            <?php endforeach; ?> -->
       
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