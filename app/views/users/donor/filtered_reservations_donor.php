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

         <div class="select-menu">
            <h4>Filter By : District</h4>
            <div class="select-btn">
                <span class="sBtn-text"><?php echo $data['dist_title'];  ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
            <a href="<?php echo URLROOT;?>/donor/reservationsDonor" style="text-decoration:none">
                    <li class="option" id="0">
                        <span class="option-text">All</span>
                    </li>
                </a>
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
            <?php foreach($data['records'] as $requests ): ?>
            
                <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $requests->proof_document;  ?>">
                    </div>
                    <div class="easy">
                        <div class="name_job"><?php echo $requests->org_name;  ?>    |    <?php echo $requests->city;  ?></div>
                        <p><b> <?php echo $requests->request_title;  ?></b></p>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p><?php echo $requests->description;  ?>
                        </p>
                        
                        <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewCalendarDonor/<?php echo $requests->user_id;  ?>" ><button>Make a Reservation</button></a>
                        </div>
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