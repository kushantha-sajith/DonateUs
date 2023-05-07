<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
<<<<<<< Updated upstream
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />
=======
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" /> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" />
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
          <span class="dashboard">Donation Requests</span>
=======
          <span class="dashboard"><?php echo $data['title'];  ?></span>
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======
      <label id="toggle-switch-label" for="toggle-switch">View Nearby Requests </label>
        <input type="checkbox" id="toggle-switch">

>>>>>>> Stashed changes
         <div class="select-menu">
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text"><?php echo $data['cat_title'];  ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
              <a href="<?php echo URLROOT;?>/pages/donationRequestsDonor" style="text-decoration:none">
                    <li class="option">
<<<<<<< Updated upstream
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            filter_alt_off
                            </span>
=======
>>>>>>> Stashed changes
                        <span class="option-text">All</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/1" style="text-decoration:none">
                    <li class="option">
<<<<<<< Updated upstream
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            attach_money
                            </span>
=======
>>>>>>> Stashed changes
                        <span class="option-text">Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/0" style="text-decoration:none">
                    <li class="option">
<<<<<<< Updated upstream
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
=======
                        <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>

                <?php foreach($data['categories'] as $category ): ?>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/<?php echo $category -> id;?>" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text"><?php echo $category -> category_name;?></span>
                    </li>
                </a>
                <?php endforeach; ?>
>>>>>>> Stashed changes
            </ul>
        </div>

            <div class="gigcontainer">
<<<<<<< Updated upstream
            <?php foreach($data['records'] as $requests): ?>
            
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
=======

            <div class="box nothing_to_display" >
                    
                    <div class="easy">
                        
                        <p>There are no nearby donation requests to display at the moment</p>
                        <p><b>Please refresh the page to view all donation requests</b> </p>
                        <div class="btns">
                            <!-- <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a> -->
                            
                            <button id="refresh" onclick="refresh()">Refresh</button>
                        </div>                   
                    </div>
                </div>

                <div class="box nothing_to_display empty_filetered" >
                    
                    <div class="easy">
                        
                        <p>There are no donation requests to display under the selected category at the moment</p>
                        <div class="btns">
                            <!-- <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a> -->
                            
                            <button id="refresh" onclick="viewAll()">View All</button>
                        </div>                   
                    </div>
                </div>

            <?php foreach($data['records'] as $requests): ?>
            
                <div class="box <?php echo $requests->zipcode;  ?>">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $requests->thumbnail;  ?>">
                    </div>
                    <div class="easy">
                        <div class="name_job"><?php echo $requests->request_title;  ?></div>
                        <p><b>Published Date : </b><?php echo $requests->published_date;  ?>       <span  <?php if(($requests->days_left) > 0 && ($requests->days_left) < 7){ ?> style="color:red;"<?php } ?>><b>Due Date : </b><?php echo $requests->due_date;  ?></span></p>
                        <p><b>Catagory :</b> <?php echo $requests->category_name;  ?>
                        <?php if($requests-> req_type == 0 ){ ?> 
                         <b>Item Requested : </b><?php echo $requests-> item;  ?> <!-- <p>Item is only for non-financials</p> -->
                         <?php } ?>
                        </p>

>>>>>>> Stashed changes
                        <p><?php echo $requests->description;  ?>
                        </p>
                        <?php if($requests->cat_id > 1){ ?>
                       
                        <div class="skill-box">
                       
                            <span class="title"> <?php echo $requests->received_quantity ; ?> raised out of <?php  echo $requests->quantity;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($requests->received_quantity * 100) / $requests->quantity);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                            </div>
                        </div>
                        
                        <?php } else{ ?>
                            
                        <div class="skill-box">
                            <span class="title">Rs.<?php echo $requests->received_amount ;  ?> raised out of Rs.<?php echo $requests->total_amount;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($requests->received_amount * 100) / $requests->total_amount);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                            </div>
                        </div>
                        
                         <?php } ?>
                        
                           
                        <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a>
<<<<<<< Updated upstream
                            <a href="#"><button>Donate</button></a>
=======
                            <a href="<?php echo URLROOT;?>/donor/donate/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>"><button>Donate</button></a>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
    </script>
=======

        const container = document.querySelector(".gigcontainer");
        // if there are no nearby requests
        let height = container.offsetHeight;
            if (height == 0){
                
                container.querySelector(".empty_filetered").style.display = "flex";
                document.getElementById('toggle-switch').style.display = "none";
                document.getElementById('toggle-switch-label').style.display = "none";
            }

        function refresh() {
            location.reload();
        }

        function viewAll(){
            window.location.href = "<?php echo URLROOT;?>/pages/donationRequestsDonor";
        }

        let userZip = <?php echo $data['user'];  ?>;
    </script>
    <script src="<?php echo URLROOT; ?>/js/toggle.js"></script>
>>>>>>> Stashed changes
  </body>
</html>