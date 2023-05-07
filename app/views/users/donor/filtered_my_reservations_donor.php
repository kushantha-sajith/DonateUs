<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
<<<<<<< Updated upstream
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_lists.css" />
=======
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" /> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/my_reservations.css" />
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
          <span class="dashboard">My Reservations</span>
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
    
      <div class="select-menu">
      <h4>Filter By : Organization</h4>
            <div class="select-btn">
            <?php foreach($data['org_data'] as $org ): ?>
                <span class="sBtn-text"><?php echo $org->org_name;  ?></span>
            <?php endforeach; ?>    
=======
    <div class="filters">

    <!-- organization -->

  <div class="select-menu org-menu">
      <h4>Filter By : Organization</h4>
            <div class="select-btn">
           
                <span class="sBtn-text"><?php echo $data['org_name'];  ?></span>
              
>>>>>>> Stashed changes
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
            <a href="<?php echo URLROOT;?>/donor/viewMyReservationsDonor" style="text-decoration:none">
                    <li class="option" id="0">
                        <span class="option-text">All</span>
                    </li>
                </a>
            <?php foreach($data['organizations'] as $organization ): ?>
<<<<<<< Updated upstream
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/<?php echo $organization->ben_id; ?>" style="text-decoration:none">
=======
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/<?php echo $organization->ben_id; ?>/0" style="text-decoration:none">
>>>>>>> Stashed changes
                    <li class="option" id="<?php echo $organization->ben_id; ?>">
                        <span class="option-text"><?php echo $organization->org_name; ?></span>
                    </li>
                </a>
                
                <?php endforeach; ?> 
            </ul>
        </div>

<<<<<<< Updated upstream

            <div class="cards_heading head">
=======
    <!-- status -->
  <div class="select-menu status-menu">
            <h4>Filter By : Status</h4>
            <div class="select-btn status-btn">
                <span class="sBtn-text status_Btn-text"><?php echo $data['status'] ;  ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options status_options">
            <a href="<?php echo URLROOT;?>/donor/viewMyReservationsDonor" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">All</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/0/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Pending for Approval</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/1/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Approved & Reserved</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/2/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Delivered</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/3/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Completed</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/4/1" style="text-decoration:none">
                    <li class="option status_option">
                      <span class="option-text status-option-text">Canceled</span>
                    </li>
                </a>
                
            </ul>
        </div>
  
   </div>   <!-- eo filters -->
          <div class="cards_heading head">
>>>>>>> Stashed changes
                <div>Reservation ID</div>
                <div>Organization Name</div>
                <div>Reserved Date</div>
                <div>Meal Type</div>
                <div>Quantity</div>
                <div>Status</div>
                <div><span></span></div>
            </div>
            <?php foreach($data['records'] as $record) : ?>
                <div class="cards_heading cards_color">
                    <div><?php echo $record->id; ?></div>
                    <div><?php echo $record->org_name; ?></div>
                    <div><?php echo $record->date; ?>/<?php echo $record->month; ?>/<?php echo $record->year; ?></div>
                    <div><?php 
                    switch($record->meal){
                      case 1:
                        echo "Breakfast";
                        break;
                      case 2:
                        echo "Lunch";
                        break; 
                      case 3:
                        echo "Dinner";
                        break;  
                      default:
                        echo "None";
                        break;    
                     } ?></div>
                    <div><?php echo $record->amount; ?></div>
                    <div><?php 
                    switch($record->status){
                      case 0:
                        echo "Pending for Approval";
                        break;
                      case 1:
                        echo "Approved & Reserved";
                        break;
                      case 2:
                        echo "Delivered";
                        break; 
                      case 3:
                        echo "Completed";
                        break;
                      case 4:
                          echo "Cancelled";
                          break;    
                      default:
                        echo "Error";
                        break;    
                     } ?></div>
                    <div>
                    <?php if($record->status == 1){?>
                        <div class ="btns3"> 
                        <a href="<?php echo URLROOT; ?>/donor/markAsDelivered/1/<?php echo $record->id; ?>"> <button class="btn-mark-delivered">Mark as Delivered</button> </a>
                        <a href="<?php echo URLROOT; ?>/donor/markAsCancelled/1/<?php echo $record->id; ?>"> <button class="btn-contact-org">Contact Organization</button> </a>
                      </div>
                    <?php }
                     if($record->status == 0){?>
                      <div style="text-align: center;"> 
                        <a href="<?php echo URLROOT; ?>/donor/markAsCancelled/1/<?php echo $record->id; ?>"> <button class="btn-mark-cancelled">Cancel</button> </a>
                      </div>
                      <?php }
                      if($record->status == 2){?> 
                      <div style="text-align: center;"> 
                        <a href="<?php echo URLROOT; ?>/donor/markAsCancelled/1/<?php echo $record->id; ?>"> <button class="btn-contact-org">Contact Organization</button> </a>
                      </div>
                      <?php } ?> 
                      </div>
                </div>
            <?php endforeach; ?>
            <div class="btns2">
              <a href="<?php echo URLROOT;?>/donor/viewMyReservationsDonor"><button class="btn-back">Back</button></a>
            </div> 
                   
    </section>
    <!--home section end-->

    <script>

<<<<<<< Updated upstream
=======
  let filter_type = <?php echo $data['filter'] ; ?>;
    if(filter_type == 0){
      document.querySelector(".status-menu").style.display = 'none';
    }else{
      document.querySelector(".org-menu").style.display = 'none';
    }

>>>>>>> Stashed changes
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