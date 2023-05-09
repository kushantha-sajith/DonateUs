<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/history_viewmore.css" />
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
     
        <div class="gigcontainer">
       
                <div class="box">
                <?php foreach($data['details'] as $details) : ?>
                <div class="easy">
                        <p><b><?php echo $data['type'];  ?>  |  <?php echo $data['category'];  ?></b></p>
                        <div class="name_job"><?php echo $details->request_title;  ?></div> <!-- eo name_job -->
                        <p><?php echo $details->timestamp;  ?></p>
                        <p class="due-date">
                          <span><b><?php 
                          switch($details->status){
                            case 1: 
                              echo  "Pending";
                              break;
                            case 2:
                              echo  "Delivered";
                              break; 
                            case 3:
                              echo  "Completed";
                              break;
                            case 4:
                              echo  "Canceled";
                              break;
                            default:
                              echo  "Error";
                            
                              }  ?></b></span>
                        </p>
                        
                    </div> <!-- eo easy -->
               

<form action="#">
    <div class="formfirst">
        <div class="details personal">
        <header>Beneficiary Details</header>
            <div class="fields">
            
                <div class="input-field">
                    <label>Beneficiary Name</label>
                    <input type="text" placeholder="" value="<?php echo $details->name;  ?>" disabled>
                </div>
                <div class="input-field">
                    <label>Item Requested</label>
                    <input type="text" placeholder="" value="<?php echo $data['item'];  ?>" disabled>
                </div>
                <div class="input-field">
                    <label>Conatcat Number</label>
                    <input type="text" placeholder="" value="<?php echo $details->contact;  ?>" disabled>
                </div>
                <?php foreach($data['beneficiary'] as $beneficiary) : ?>
                <div class="input-field">
                    <label>Address</label>
                    <input type="text" placeholder="" value="<?php echo $beneficiary->address;  ?>" disabled>
                </div>
                <div class="input-field">
                    <label>District</label>
                    <input type="text" placeholder="" value="<?php echo $beneficiary->dist_name;  ?>" disabled>
                </div>
                <?php endforeach; ?>
                <div class="input-field">
                    <label>Zipcode</label>
                    <input type="text" placeholder="" value="<?php echo $details->zipcode;  ?>" disabled>
                </div>
            </div>
            <header>Donation Details</header>
            <div class="fields">
                <div class="input-field">
                    <label>You Donated</label>
                    <input type="text" placeholder="" value="<?php echo $data['amount'];   ?>" disabled>
                </div>

                <div class="input-field">
                    <label>Anonymous</label>
                    <input type="text" placeholder="" value="<?php if($details->anonymous ==1 ){
                      echo "Anonymous";
                    } else{
                      echo "Not Anonymous";
                    }  ?>" disabled>
                </div>

                <div class="input-field">
                    <label>Note to Beneficiary</label>
                    <input type="text" placeholder="" value="<?php echo $data['note'];  ?>" disabled>
                </div>
                <div class="input-field">
                    <label>Date of Completion</label>
                    <input type="text" placeholder="" value="<?php echo $details->date_of_completion;  ?>" disabled>
                </div>
                
              </div>
              
        </div>
        
       
    </div>
</form>
        <div class ="btns3"> 

                  <?php  if($details->status == 1) { ?>
                    <a href="<?php echo URLROOT;?>/donor/markAsDelivered/0/<?php echo $data['donation_id'];  ?>"> <button class="btn-contact-org">Mark As Delivered</button> </a>
                    <a href="<?php echo URLROOT; ?>/donor/markAsCancelled/0/<?php echo $data['donation_id'];  ?>"> <button class="btn-mark-cancelled">Cancel</button> </a>
                    <?php  } 
                  if($details->status == 3){ ?>
                    
                    <a href="<?php echo URLROOT; ?>/donor/feedback/<?php echo $data['donation_id'];  ?>"> <button class="btn-mark-delivered">Feedback</button> </a>
                 <?php }  ?>
                  
                
                      </div>
                    </div><!-- eo box -->
                    <div class="btns2">
              <a href="<?php echo URLROOT;?>/pages/donationHistoryDonor"><button class="btn-back">Back</button></a>
            </div> 

            <?php endforeach; ?>
                </div> <!-- eo gigcontainer -->
          
          
                           
        </div><!-- eo main-container -->

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