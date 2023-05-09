<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_history_donor.css" />
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
          
        </div>
      </nav>
      <div class="main-container">
      <div class="filters"> 
      <div class="select-menu cat-menu">
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text"><?php echo $data['cat_title']; ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
              <a href="<?php echo URLROOT;?>/pages/donationHistoryBeneficiary" style="text-decoration:none">
                    <li class="option">
                      <span class="option-text">All</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/1/0" style="text-decoration:none">
                    <li class="option">
                      <span class="option-text">Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/0/0" style="text-decoration:none">
                    <li class="option">
                      <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>
                <?php foreach($data['categories'] as $category ): ?>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/<?php echo $category -> id;?>/0" style="text-decoration:none">
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
            <a href="<?php echo URLROOT;?>/pages/donationHistoryBeneficiary" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">All</span>
                    </li>
                </a>
                
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/2/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Delivered</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/3/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Completed</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/beneficiary/filteredHistoryBeneficiary/4/1" style="text-decoration:none">
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
                <!-- <div>Amount/<br>Quantity</div> -->
                <div>Type</div>
                <div>Anonymous</div>
                <div>Status</div>
                <div><span></span></div>
                <div><span></span></div>
            </div>

            <?php foreach($data['donations'] as $record) : ?>
              <?php   $don_id = $record->id;
                      $status = $record->status; ?>
                      <!-- $don_id=request_id -->
                <div class="cards_heading2 cards_color">
                <div><?php echo $record->timestamp; ?></div>
                <div><?php echo $record->request_title; ?></div>
                
                    
                      
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
                        <a href="#"> <button class="btn-view-more">View more</button> </a>
                        <?php if($record->type == 0){ ?>
                        <a href="#"> <button class="btn-contact-org">Contact Beneficiary</button> </a>
                        <?php } ?>
                      </div>
                      <?php }
                      if($status == 2){?> 
                      <div class ="btns3">
                      <a href="<?php echo URLROOT;?>/beneficiary/viewmoreHistoryBeneficiary/<?php echo $record->id;?>/<?php echo $record->type?>"> <button class="btn-view-more">View more</button> </a>
                      <a href="<?php echo URLROOT; ?>/beneficiary/markReceived/<?php echo $record->id;  ?>"> <button class="btn-mark-delivered">Mark as Received</button> </a>

                      </div>
                      <?php } 
                      if($status == 3){ ?> 
                      <div class ="btns3"> 
                      <a href="<?php echo URLROOT;?>/beneficiary/viewmoreHistoryBeneficiary/<?php echo $record->id;?>/<?php echo $record->type?>"> <button class="btn-view-more">View more</button> </a>
                        <a href="<?php echo URLROOT; ?>/beneficiary/feedback/<?php echo $record->id;?>"> <button class="btn-mark-delivered">Feedback</button> </a>
                      </div>
                      <?php } 
                      if($status == 4){ ?> 
                        <div class ="btns3"> 
                      <a href="<?php echo URLROOT;?>/beneficiary/viewmoreHistoryBeneficiary/<?php echo $record->id;?>/<?php echo $record->type?>"> <button class="btn-view-more">View more</button> </a>

                        </div>
                        <?php }
                        if($status == 5){ ?> 
                          <div class ="btns3"> 
                            
                          </div>
                          <?php } ?>
                    </div>
                    
                </div>
            <?php endforeach; ?>
    </section>
    <!--home section end-->

    <script>

    let filter_type = <?php echo $data['filter'] ; ?>;
    if(filter_type == 0){
      document.querySelector(".status-menu").style.display = 'none';
    }else{
      document.querySelector(".cat-menu").style.display = 'none';
    }

// js for drop down list 
 const optionMenu = document.querySelector(".cat-menu"),
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

</script>
  </body>
</html>