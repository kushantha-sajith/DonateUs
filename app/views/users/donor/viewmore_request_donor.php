<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/request_viewmore.css" />
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
      <div class="main-container">
<<<<<<< Updated upstream
=======

      <?php if($data['cat_id'] != 1){ ?>
        <div class="how_it_works">
      <h3>How It Works</h3>
      <div class="progress-container">
        <div class="progress" id="progress"></div>
        <div class="circle"><b>1</b></div>
        <ul class="instructions">
          <li>Read the description</li>
          <li>Identify the requirement</li>
          <li>Donate Now!</li>
        </ul>
        <div class="circle"><b>2</b></div>
        <ul class="instructions">
          <li>Check your personal details</li>
          <li>Fill donation details</li>
          <li>Proceed</li>
        </ul>
        <div class="circle"><b>3</b></div>
        <ul class="instructions">
          <li>Get beneficiary contact details</li>
          <li>Contact them</li>
          <li>Deliver your donations</li>
        </ul>
        <div class="circle"><b>4</b></div>
        <ul class="instructions">
          <li>Go to your donation history</li>
          <li>Mark the donation as delivered </li>
          <li>Send us your feedback</li>
        </ul>
        <div class="circle"><b>End</b></div>
     </div>
     
      <?php } ?>
     
>>>>>>> Stashed changes
      <?php foreach($data['details'] as $details ): ?>
        <div class="gigcontainer">
       
                <div class="box">
                
                    <div class="easy">
                        <p><b><?php if($details->cat_id >1){ echo "Non-Financial";}else{echo "Financial";} echo "  |  ".$details->category_name;  ?></b></p>
                        <div class="name_job"><?php echo $details->request_title;  ?></div> <!-- eo name_job -->
<<<<<<< Updated upstream
                        <p><b>By : </b><?php echo $details->f_name." ".$details->l_name;  ?>       <b>On : </b><?php echo $details->published_date;  ?></p>
                        <p class="due-date"><b>Due on : <?php echo $details->due_date;  ?> </b> </p>
                    </div> <!-- eo easy -->
                    <div class="mid">
                        <div class="image"> 
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $details->proof_document;  ?>">
=======
                        <p><b>By : </b><?php echo $details->name;  ?>       <b>On : </b><?php echo $details->published_date;  ?></p>
                        <p class="due-date">
                          <span  <?php if(($details->days_left) > 0 && ($details->days_left) < 7){ ?> style="color:red;"<?php }else { ?> style="color:green;"<?php }?>><b>Due on : <?php echo $details->due_date;  ?> </b></span>
                        </p>
                        
                    </div> <!-- eo easy -->
                    <div class="mid">
                        <div class="image"> 
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $details->thumbnail;  ?>">
>>>>>>> Stashed changes
                        </div> <!-- eo image -->
                        

                        <?php if($details->cat_id >1){ ?>
                       
                        <div class="skill-box">
                        
                            <span class="title"> <?php echo $details->received_quantity ; ?> raised out of <?php  echo $details->quantity;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($details->received_quantity * 100) / $details->quantity);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                            </div> <!-- eo skill-bar -->
                            <div class="btns">
<<<<<<< Updated upstream
                          <a href="#"><button>Donate Now</button></a>
                        </div> <!-- eo btns -->
=======
                          <a href="<?php echo URLROOT;?>/donor/donate/<?php echo $data['id'] ; ?>/<?php echo $data['cat_id'] ; ?>"><button>Donate Now</button></a>
                        </div> <!-- eo btns -->

                        <div class="donation_list">
                            <p>Recent Donations (out of <?php echo $data['donations_count']; ?> donations)</p>
                            <?php foreach($data['recent_donations'] as $donation ): ?>
                              
                              <ul class="contact-list">
                                <li class="contact-item">
                                <?php if($donation->anonymous == 1){ ?>
                                  <img class="profile-image" src="<?php echo URLROOT; ?>/img/anonymous.png" alt="">
                                  <span class="username">Anonymous Donor</span>
                                <?php }else{ ?>
                                  <img class="profile-image" src="<?php echo URLROOT; ?>/img/<?php echo $donation->prof_img;  ?>" alt="">
                                  <span class="username"><?php echo $donation->donor_name;  ?></span>
                                <?php } ?>
                                  <span class="amount"><?php echo $donation->quantity_donated ;  ?></span>
                                </li>
                              </ul>
                            <?php endforeach; ?>
                          </div> <!-- donation_list -->
>>>>>>> Stashed changes
                            </div> <!-- eo skill-box -->
                        <?php } else{ ?>
                                                         
                        <div class="skill-box">
                        
                            <span class="title">Rs.<?php echo $details->received_amount ;  ?> raised out of Rs.<?php echo $details->total_amount;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($details->received_amount * 100) / $details->total_amount);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                            </div><!-- eo skill-bar -->
                            <div class="btns">
<<<<<<< Updated upstream
                          <a href="#"><button>Donate Now</button></a>
                        </div> <!-- eo btns -->
                            </div> <!-- eo skill-box -->
=======
                          <a href="<?php echo URLROOT;?>/donor/donate/<?php echo $data['id'] ; ?>/<?php echo $data['cat_id'] ; ?>"><button>Donate Now</button></a>
                          </div> <!-- eo btns -->

                          <div class="donation_list">
                          <p>Recent Donations (out of <?php echo $data['donations_count']; ?> donations)</p>
                            <?php foreach($data['recent_donations'] as $donation ): ?>
                              
                              <ul class="contact-list">
                                <li class="contact-item">
                                <?php if($donation->anonymous == 1){ ?>
                                  <img class="profile-image" src="<?php echo URLROOT; ?>/img/anonymous.png" alt="">
                                  <span class="username">Anonymous Donor</span>
                                <?php }else{ ?>
                                  <img class="profile-image" src="<?php echo URLROOT; ?>/img/<?php echo $donation->prof_img;  ?>" alt="">
                                  <span class="username"><?php echo $donation->donor_name;  ?></span>
                                <?php } ?>
                                  <span class="amount">Rs.<?php echo $donation->amount_donated ;  ?></span>
                                </li>
                              </ul>
                            <?php endforeach; ?>
                          </div> <!-- donation_list -->
                          </div> <!-- eo skill-box -->
>>>>>>> Stashed changes
                         <?php } ?>
                                                   
                        

                        </div> <!-- eo mid -->
                        <p><?php echo $details->description;  ?></p>
<<<<<<< Updated upstream
=======
                        <?php if($details->req_type == 0) { ?>
                          <div class="location">
                            
                        <p><b>Item Requested : </b><?php echo $details->item;  ?></p>
                        <?php foreach($data['beneficiary'] as $user ): ?>
                          <p><b>Address : </b><?php echo $user->address;  ?></p>
                          <p><b>Zipcode : </b><?php echo $user->zipcode;  ?></p>
                          <p><b>District : </b><?php echo $user->dist_name;  ?></p>
                          <?php endforeach; ?>
                        </div>
                        <?php } ?>
                        
>>>>>>> Stashed changes
                    </div><!-- eo box -->
                    <div class="btns2">
              <a href="<?php echo URLROOT;?>/pages/donationRequestsDonor"><button class="btn-back">Back</button></a>
        </div> 
                </div> <!-- eo gigcontainer -->
          
            <?php endforeach; ?>
            </div> <!-- eo main-container --> 
            
        
        
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

>>>>>>> Stashed changes
    </script>
  </body>
</html>