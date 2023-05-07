<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
<<<<<<< Updated upstream
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_lists.css" />
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            <a href="<?php echo URLROOT; ?>/donor/profile_donor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
=======
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
>>>>>>> Stashed changes
=======
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
>>>>>>> Stashed changes
=======
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
>>>>>>> Stashed changes
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
<<<<<<< Updated upstream
 
=======
      <div class="filters">
>>>>>>> Stashed changes
      <div class="select-menu">
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text">Select Donation Category</span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
<<<<<<< Updated upstream
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
=======
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
        <div class="btns2">
              <a href="<?php echo URLROOT;?>/donor/viewAllFeedbackDonor" ><button class="btn-back">All Feedback</button></a>
            </div>
        </div> <!-- eo filters -->

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
                    
                    <?php if($status == 1){?>
                      <div class ="btns3"> 
                        <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor/<?php echo $record->id;?>/$record->type"> <button class="btn-view-more">View more</button> </a>
                        <?php if($record->type == 0){ ?>
                        <a href="#"> <button class="btn-contact-org">Contact Beneficiary</button> </a>
                        <?php } ?>
                      </div>
                      <?php }
                      if($status == 2){?> 
                      <div class ="btns3">
                      <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor/<?php echo $record->id;?>/$record->type"> <button class="btn-view-more">View more</button> </a>
                      </div>
                      <?php } 
                      if($status == 3){ ?> 
                      <div class ="btns3"> 
                      <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor/<?php echo $record->id;?>/$record->type"> <button class="btn-view-more">View more</button> </a>
                        <a href="<?php echo URLROOT; ?>/donor/feedback/<?php echo $record->id;?>"> <button class="btn-mark-delivered">Feedback</button> </a>
                      </div>
                      <?php } 
                      if($status == 4){ ?> 
                        <div class ="btns3"> 
                        <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor/<?php echo $record->id;?>/$record->type"> <button class="btn-view-more">View more</button> </a>
                        </div>
                        <?php }
                        if($status == 5){ ?> 
                          <div class ="btns3"> 
                            
                          </div>
                          <?php } ?>
                    </div>
                    
>>>>>>> Stashed changes
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