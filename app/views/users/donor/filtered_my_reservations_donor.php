<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />
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
    
      <div class="select-menu">
      <h4>Filter By : Organization</h4>
            <div class="select-btn">
            <?php foreach($data['org_data'] as $org ): ?>
                <span class="sBtn-text"><?php echo $org->org_name;  ?></span>
            <?php endforeach; ?>    
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
            <a href="<?php echo URLROOT;?>/donor/viewMyReservationsDonor" style="text-decoration:none">
                    <li class="option" id="0">
                        <span class="option-text">All</span>
                    </li>
                </a>
            <?php foreach($data['organizations'] as $organization ): ?>
                <a href="<?php echo URLROOT;?>/donor/filteredMyReservationsDonor/<?php echo $organization->ben_id; ?>" style="text-decoration:none">
                    <li class="option" id="<?php echo $organization->ben_id; ?>">
                        <span class="option-text"><?php echo $organization->org_name; ?></span>
                    </li>
                </a>
                
                <?php endforeach; ?> 
            </ul>
        </div>


            <div class="cards_heading head">
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