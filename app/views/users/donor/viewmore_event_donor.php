<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/event_viewmore.css" />
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
          <span class="dashboard"><?php echo $data['title'];  ?></span>
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
      <?php foreach($data['details'] as $details ): ?>
        <div class="gigcontainer">
       
                <div class="box">
                                    
                    <div class="mid">
                        <div class="image"> 
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $details->proof_letter;  ?>">
                        </div> <!-- eo image -->
                        
 
                       <!-- <?php if($details->cat_id >1){ ?>
                       
                        <div class="skill-box">
                        
                            <span class="title"> <?php echo $details->received_quantity ; ?> raised out of <?php  echo $details->quantity;  ?></span>
                            <div class="skill-bar">
                                <span class="skill-per"></span>
                            </div> eo skill-box
                        
                       
                        <?php } else{ ?> -->
                          <p class="due-date"><b>Due on : <?php echo $details->due_date;  ?> </b> </p>                                 
                        <div class="skill-box">
                        
                            <span class="title">Rs.<?php echo $details->received ;  ?> raised out of Rs.<?php echo $details->budget;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($details->received * 100) / $details->budget);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                            </div><!-- eo skill-box -->
                        
                        
                         <!-- <?php } ?> -->
                                                   
                        <div class="btns">
                          <a href="#"><button>Donate Now</button></a>
                        </div> <!-- eo btns -->

                        <div class="easy">
                        
                        <div class="name_job"><?php echo $details->event_title;  ?></div> <!-- eo name_job -->
                        <p><b>By : </b><?php echo $details->community_name."    |   ".$details->city;  ?></p>  
                        <p><b>On : </b><?php echo $details->published_date;  ?></p>
                        
                    </div> <!-- eo easy -->
                    
                        </div>
                        <p><?php echo $details->description;  ?></p>
                    </div><!-- eo box -->
                </div> <!-- eo gigcontainer -->
          
            <?php endforeach; ?>
            <div class="btns2">
              <a href="<?php echo URLROOT;?>/donor/eventsDonor"><button class="btn-back">Back</button></a>
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