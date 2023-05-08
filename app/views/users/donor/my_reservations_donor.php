<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" /> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/my_reservations.css" />
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
      
  <div class="filters">
      
    <!-- organization -->
        <div class="select-menu">
            <h4>Filter By : Organization</h4>
            <div class="select-btn">
                <span class="sBtn-text">Select Organization</span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
            <?php foreach($data['organizations'] as $organization ): ?>
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/<?php echo $organization->ben_id; ?>/0" style="text-decoration:none">
                    <li class="option" id="<?php echo $organization->ben_id; ?>">
                        <span class="option-text"><?php echo $organization->org_name; ?></span>
                    </li>
                </a>
                
                <?php endforeach; ?> 
            </ul>

        </div>

        <!-- status -->
  <div class="status-menu select-menu">
            <h4>Filter By : Status</h4>
            <div class="select-btn status-btn">
                <span class="sBtn-text status_Btn-text">Select Status</span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options status_options">
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

  </div>  <!-- eo filters -->
         


            <div class="cards_heading head">
                <div>Reservation ID</div>
                <div>Organization Name</div>
                <div>Reserved Date</div>
                <div>Meal Type</div>
                <div>Quantity (plates)</div>
                <div>Status</div>
                <div><span></span></div>
            </div>
            <?php foreach($data['records'] as $record) : ?>
                <div class="cards_heading cards_color">
                    <div><?php echo $record->id; ?></div>
                    <div><?php echo $record->org_name; ?></div>
                    <div><?php echo $record->date; ?>/<?php echo ($record->month)+1; ?>/<?php echo $record->year; ?></div>
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
                          echo "Canceled";
                          break;    
                      default:
                        echo "Error";
                        break;    
                     } ?></div>
                    <div>
                    <?php if($record->status == 1){?>
                        <div class ="btns3"> 
                        <a href="<?php echo URLROOT; ?>/donor/getMyReservationDetails/<?php echo $record->id; ?>"> <button class="btn-mark-delivered">View more</button> </a>
                        <a href="<?php echo URLROOT; ?>/donor/markAsDelivered/1/<?php echo $record->id; ?>"> <button class="btn-contact-org">Mark as Delivered</button> </a>
                        
                      </div>
                    <?php }
                     if($record->status == 0){?>
                      <div class ="btns3"> 
                      <a href="<?php echo URLROOT; ?>/donor/getMyReservationDetails/<?php echo $record->id; ?>"> <button class="btn-mark-delivered">View more</button> </a>
                        <a href="<?php echo URLROOT; ?>/donor/markAsCancelled/1/<?php echo $record->id; ?>"> <button class="btn-mark-cancelled">Cancel</button> </a>
                      </div>
                      <?php }
                      if($record->status == 2){?> 
                      <div class ="btns3"> 
                      <a href="<?php echo URLROOT; ?>/donor/getMyReservationDetails/<?php echo $record->id; ?>"> <button class="btn-mark-delivered">View more</button> </a>
                      </div>
                      <?php }
                       if($record->status == 3){?> 
                        <div class ="btns3"> 
                        <a href="<?php echo URLROOT; ?>/donor/getMyReservationDetails/<?php echo $record->id; ?>"> <button class="btn-mark-delivered">View more</button> </a>
                        </div>
                        <?php }
                         if($record->status == 4){?> 
                          <div class ="btns3"> 
                          <a href="<?php echo URLROOT; ?>/donor/getMyReservationDetails/<?php echo $record->id; ?>"> <button class="btn-mark-delivered">View more</button> </a>
                          </div>
                          <?php } ?> 
                      </div>
                </div>
            <?php endforeach; ?>
            <div class="btns2">
              <a href="<?php echo URLROOT;?>/donor/reservationsDonor"><button class="btn-back">Back</button></a>
            </div> 
                   
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