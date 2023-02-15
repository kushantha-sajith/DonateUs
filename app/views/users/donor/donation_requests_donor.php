<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" />
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
          
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <main>

            <div class="select-menu">
                <div class="abc">
                    <h4>Filter By : Donation Catagory</h4>
                    <div class="select-btn">

                        <span class="option-text">Select Donation Catagory</a></span>
                        <i class="bx bx-chevron-down"></i>
                    </div>
                </div>


                <ul class="options">
                    <a href="donation_history.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                attach_money
                            </span>

                            <span class="option-text"> Financial Donations</span>
                        </li>
                    </a>
                    <a href="non_financial_donations.html.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                fastfood
                            </span>
                            <span class="option-text">Food Donations</span>
                        </li>
                    </a>
                    <a href="non_financial_donations.html.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                menu_book
                            </span>
                            <span class="option-text">Stationary Donations</span>
                        </li>
                    </a>
                    <a href="non_financial_donations.html.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
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
                        <p><b>Donation Catagory :</b> <?php echo $requests->cat_id;  ?></p>

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
                                <span class="skill-per"></span>
                            </div>
                        </div>
                        <?php   } ?>
                        <?php endforeach; ?>
                        <?php } else{ ?>
                            <?php foreach($data['financials'] as $financials ): ?>
                        <div class="skill-box">
                            <span class="title">Rs.<?php echo $financials->received_amount ;  ?> raised out of Rs.<?php echo $financials->total_amount;  ?></span>
                            <div class="skill-bar">
                                <span class="skill-per"></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                         <?php } ?>
                        
                           
                        <div class="btns">
                            <button>View More</button>
                            <button>Donate</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/don_cat2.png">
                    </div>
                    <div class="easy">
                        <div class="name_job">I Need Money For My Moms Oparation</div>
                        <p>Donation Catagory : Financial</p>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>
                            I'm writing to you to ask you to support me
                            and my. Just a small donation of can help me
                            Your donation will go toward . possible, add a personal connection to tie the donor to the
                            cause.
                        </p>
                        <div class="skill-box">
                            <span class="title">Rs.60000 raised out of Rs.100000</span>

                            <div class="skill-bar">
                                <span class="skill-per"></span>
                            </div>
                        </div>
                        <div class="btns">
                            <button>View More</button>
                            <button>Donate</button>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/don_cat4.png">
                    </div>
                    <div class="easy">
                        <div class="name_job">I Need Money For My Moms Oparation</div>
                        <p>Donation Catagory : Financial</p>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>
                            I'm writing to you to ask you to support me
                            and my. Just a small donation of can help me
                            Your donation will go toward . possible, add a personal connection to tie the donor to the
                            cause.
                        </p>
                        <div class="skill-box">
                            <span class="title">Rs.60000 raised out of Rs.100000</span>

                            <div class="skill-bar">
                                <span class="skill-per"></span>
                            </div>
                        </div>
                        <div class="btns">
                            <button>View More</button>
                            <button>Donate</button>
                        </div>
                    </div>
                </div> -->
            </div>

        </main>

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