<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />
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
          <span class="dashboard">Reservations</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
          
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
      <div class="btns2">
              <a href="<?php echo URLROOT;?>/donor/viewMyReservationsDonor" ><button class="btn-back">My Reservations</button></a>
            </div>
         <div class="select-menu">
            <h4>Filter By : District</h4>
            <div class="select-btn">
                <span class="sBtn-text">Select District</span>
                <i class="bx bx-chevron-down"></i>
            </div>
          
            <ul class="options">
            <?php foreach($data['districts'] as $district ): ?>
                <a href="<?php echo URLROOT;?>/donor/filteredReservationsDonor/<?php echo $district->district; ?>" style="text-decoration:none">
                    <li class="option" id="<?php echo $district->district; ?>">
                        <span class="option-text"><?php echo $district->dist_name; ?></span>
                    </li>
                </a>
                
                <?php endforeach; ?> 
            </ul>
            
        </div>

            <div class="gigcontainer">
            <?php foreach($data['requests'] as $requests ): ?>
            
                <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $requests->thumbnail;  ?>">
                    </div>
                    <div class="easy">
                        <div class="name_job"><?php echo $requests->org_name;  ?>    |    <?php echo $requests->org_type;  ?></div>
                        <p><b> <?php echo $requests->dist_name;  ?></b></p>

                        <p><?php echo $requests->reservation_description;  ?>
                        </p>
                        
                        <?php if($data['pending_count'] <= 5 || $data['pending_count_reservations'] <= 3){ ?>
                          <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewCalendarDonor/<?php echo $requests->user_id;  ?>" ><button>Make a Reservation</button></a>
                        </div>
                        <?php }else{ ?>
                          <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewCalendarDonor/<?php echo $requests->user_id;  ?>" ><button disabled>Make a Reservation</button></a>
                        </div>
                          <p>You are not eligible to make reservations at the moment. Please complete the <b>Pending Donations </b>and try again!</p>
  
                        <?php } ?>
                        
                    </div>
                </div>
                <?php endforeach; ?>
               
            </div>

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