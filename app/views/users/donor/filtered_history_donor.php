<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
<<<<<<< Updated upstream
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />
=======
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_history_donor.css" />
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
      
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
=======
      <div class="filters"> 
      <div class="select-menu cat-menu">
>>>>>>> Stashed changes
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text"><?php echo $data['cat_title']; ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
              <a href="<?php echo URLROOT;?>/pages/donationHistoryDonor" style="text-decoration:none">
                    <li class="option">
<<<<<<< Updated upstream
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            filter_alt_off
                            </span>
                        <span class="option-text">All</span>
                    </li>
                </a>
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
                        <div style="text-align: center;"> <a href="<?php echo URLROOT; ?>/donor/feedback"> <button class="btnview">Feedback</button> </a></div>
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
       
=======
                      <span class="option-text">All</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/1/0" style="text-decoration:none">
                    <li class="option">
                      <span class="option-text">Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/0/0" style="text-decoration:none">
                    <li class="option">
                      <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>
                <?php foreach($data['categories'] as $category ): ?>
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/<?php echo $category -> id;?>/0" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text"><?php echo $category -> category_name;?></span>
                    </li>
                </a>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="select-menu status-menu">
            <h4>Filter By : Status</h4>
            <div class="select-btn status-btn">
                <span class="sBtn-text status_Btn-text"><?php echo $data['status_title']; ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options status_options">
            <a href="<?php echo URLROOT;?>/pages/donationHistoryDonor" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">All</span>
                    </li>
                </a>
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
                </div> <!--  eo filters -->
        <div class="cards_heading2 head">
            <div>Date</div>
                <div>Request Title</div>                
                <div>Amount/<br>Quantity</div>
                <div>Type</div>
                <div>Anonymous</div>
                
                <div>Status</div>
                <div><span></span></div>
                <div><span></span></div>
            </div>

            <?php foreach($data['donations'] as $record) : ?>
              <?php   $don_id = $record->id;
                      $status = $record->status; ?>
                <div class="cards_heading2 cards_color">
                <div><?php echo $record->timestamp; ?></div>
                <div><?php echo $record->request_title; ?></div>
                <?php if($record->type == 1){ ?>
                  <?php foreach($data['financials'] as $financial) : ?>
                      <?php if($financial->donation_id == $don_id){ ?>
                        <div>RS.<?php echo $financial->amount_donated; ?></div>
                        <?php } ?>
                    
                      <?php endforeach; ?>
                  <?php }else{ ?>
                    <?php foreach($data['nfinancials'] as $nfinancial) : ?>
                      <?php if($nfinancial->donation_id == $don_id){ ?>
                        
                        <div><?php echo $nfinancial->quantity_donated; ?></div>
                        <?php } ?>
                    
                      <?php endforeach; ?>
                 <?php } ?>
                    
                      
                    <div>
                    <?php if($record->type == 1){ 
                    echo "Financial"; }
                    else{
                      echo "Non-Financial";}
                      ?></div>
                    <div>
                    <?php if($record->anonymous == 1){ 
                    echo "Anonymous"; }
                    else{
                      echo "-";}
                      ?></div>
                    
                    <div>
                      <?php 
                        switch($status){ 
                          case 1:
                            echo "Pending";
                            break;
                          case 2:
                            echo"Delivered";
                            break;
                          case 3:
                            echo"Completed";
                            break;
                          case 4:
                            echo"Canceled";
                            break;
                          Default:
                            echo "Error";
                        }
                      ?>
                      </div>
                    <div>
                    <!-- <?php if($status == 1){?> <!-- pending -->
                      <div class ="btns3"> 
                        <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor/<?php echo $record->id;?>"> <button class="btn-view-more">View more</button> </a>
                        <?php if($record->type == 0){ ?>
                        <a href="#"> <button class="btn-contact-org">Contact Beneficiary</button> </a>
                        <?php } ?>
                      </div>
                      <?php }
                      if($status == 2){?> <!-- delivered -->
                      <div class ="btns3">
                      <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor/<?php echo $record->id;?>"> <button class="btn-view-more">View more</button> </a>
                      </div>
                      <?php } 
                      if($status == 3){ ?> <!-- completed -->
                      <div class ="btns3"> 
                      <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor/<?php echo $record->id;?>"> <button class="btn-view-more">View more</button> </a>
                        <a href="<?php echo URLROOT; ?>/donor/feedback"> <button class="btn-mark-delivered">Feedback</button> </a>
                      </div>
                      <?php } 
                      if($status == 4){ ?> <!-- canceled -->
                        <div class ="btns3"> 
                        <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor/<?php echo $record->id;?>"> <button class="btn-view-more">View more</button> </a>
                        </div>
                        <?php } ?>
                    </div>
                    
                </div>
            <?php endforeach; ?>
>>>>>>> Stashed changes
    </section>
    <!--home section end-->

    <script>

<<<<<<< Updated upstream
// js for drop down list 
 const optionMenu = document.querySelector(".select-menu"),
=======
    let filter_type = <?php echo $data['filter'] ; ?>;
    if(filter_type == 0){
      document.querySelector(".status-menu").style.display = 'none';
    }else{
      document.querySelector(".cat-menu").style.display = 'none';
    }

// js for drop down list 
 const optionMenu = document.querySelector(".cat-menu"),
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======

  const statusMenu = document.querySelector(".status-menu"),
  statusBtn = statusMenu.querySelector(".status-btn"),
      statusOptions = statusMenu.querySelectorAll(".status_option"),
      status_Btn_text = statusMenu.querySelector(".status_Btn-text");

  statusBtn.addEventListener("click", () => statusMenu.classList.toggle("active"));

  statusOptions.forEach(option => {
      option.addEventListener("click", () => {
          let selectedOption = option.querySelector(".status-option-text").innerText;
          status_Btn_text.innerText = selectedOption;

          statusMenu.classList.remove("active");
      });
  });

>>>>>>> Stashed changes
</script>
  </body>
</html>