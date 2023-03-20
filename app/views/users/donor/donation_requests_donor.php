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
          <span class="dashboard">Donation Requests</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
          
            <a href="<?php echo URLROOT; ?>/pages/profile_donor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
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
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/1" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            attach_money
                            </span>
                        <span class="option-text">Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/0" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            card_giftcard
                            </span>
                        <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/2" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            fastfood
                            </span>
                        <span class="option-text">Food</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/3" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                            menu_book
                            </span>
                        <span class="option-text">Stationary</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/4" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                                medical_services
                            </span>
                            <span class="option-text">Medicine</span>
                        </li>
                    </a>
            </ul>
        </div>

            <div class="gigcontainer">
            <?php foreach($data['requests'] as $requests ): ?>
            
                <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $requests->proof_document;  ?>">
                    </div>
                    <div class="easy">
                        <div class="name_job"><?php echo $requests->request_title;  ?></div>
                        <p><b>Published Date : </b><?php echo $requests->published_date;  ?>       <b>Due Date : </b><?php echo $requests->due_date;  ?></p>
                        <p><b>Donation Catagory :</b> <?php echo $requests->category_name;  ?></p>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p><?php echo $requests->description;  ?>
                        </p>
                        <?php if($requests->cat_id >1){ ?>
                       
                            <?php foreach($data['non_financials'] as $nfinancials ): ?>
                                <?php if($requests->id == $nfinancials->req_id){ ?>
                        <div class="skill-box">
                       
                            <span class="title"> <?php echo $nfinancials->received_quantity ; ?> raised out of <?php  echo $nfinancials->quantity;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($nfinancials->received_quantity * 100) / $nfinancials->quantity);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                                
                            </div>
                        </div>
                        <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a>
                            
                            <a href="<?php echo URLROOT;?>/donor/donate/0"><button>Donate</button></a>
                        </div>
                        <?php   } ?>
                        <?php endforeach; ?>
                        <?php } else{ ?>
                            <?php foreach($data['financials'] as $financials ): ?>
                                <?php if($requests->id == $financials->req_id){ ?>
                        <div class="skill-box">
                            <span class="title">Rs.<?php echo $financials->received_amount ;  ?> raised out of Rs.<?php echo $financials->total_amount;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($financials->received_amount * 100) / $financials->total_amount);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                                
                            </div>
                        </div>
                        <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a>
                            
                            <a href="<?php echo URLROOT;?>/donor/donate/1"><button>Donate</button></a>
                        </div>
                        <?php   } ?>
                        <?php endforeach; ?>
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