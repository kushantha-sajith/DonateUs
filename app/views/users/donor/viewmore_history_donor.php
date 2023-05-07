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

                <div class="easy">
                        <p><b>Type  |  Category</b></p>
                        <div class="name_job">Request Title</div> <!-- eo name_job -->
                        <p>Date</p>
                        <p class="due-date">
                          <span><b>Status</b></span>
                        </p>
                        
                    </div> <!-- eo easy -->
               

<form action="#">
    <div class="formfirst">
        <div class="details personal">
        <header>Beneficiary Details</header>
            <div class="fields">
            
                <div class="input-field">
                    <label>Beneficiary Name</label>
                    <input type="text" placeholder="" value="jjjjjjjjjjjjjjjjjjjjj" disabled>
                </div>
                <div class="input-field">
                    <label>Item Requested</label>
                    <input type="text" placeholder="" value="kkkkkkkkkkkkkkkkkkkk" disabled>
                </div>
                <div class="input-field">
                    <label>Conatcat Number</label>
                    <input type="text" placeholder="" value="nnnnnnnnnnnnnnnnnnnnnnnnnnnn" disabled>
                </div>
                <div class="input-field">
                    <label>Address</label>
                    <input type="text" placeholder="" value="nnnnnnnnnnnnnnnnnnnnnnnnnnnn" disabled>
                </div>
                <div class="input-field">
                    <label>District</label>
                    <input type="text" placeholder="" value="nnnnnnnnnnnnnnnnnnnnnnnnnnnn" disabled>
                </div>
                <div class="input-field">
                    <label>Zipcode</label>
                    <input type="text" placeholder="" value="nnnnnnnnnnnnnnnnnnnnnnnnnnnn" disabled>
                </div>
            </div>
            <header>Donation Details</header>
            <div class="fields">
                <div class="input-field">
                    <label>Qunatity Donated</label>
                    <input type="text" placeholder="" value="nnnnnnnnnnnnnnnnnnnnnnnnnnnn" disabled>
                </div>

                <div class="input-field">
                    <label>Anonymous</label>
                    <input type="text" placeholder="" value="oooooooooooooooooooooo" disabled>
                </div>

                <div class="input-field">
                    <label>Note to Beneficiary</label>
                    <input type="text" placeholder="" value="mmmmmmmmmmmmmmmmmmmmmmmmmmm" disabled>
                </div>
                <div class="input-field">
                    <label>Date of Completion</label>
                    <input type="text" placeholder="" value="mmmmmmmmmmmmmmmmmmmmmmmmmmm" disabled>
                </div>
              </div>
              
        </div>
        
       
    </div>
</form>
        <div class ="btns3"> 
                    <a href="<?php echo URLROOT;?>/donor/viewmoreHistoryDonor"> <button class="btn-contact-org">Mark As Delivered</button> </a>
                    <a href="<?php echo URLROOT; ?>/donor/feedback/<?php echo $data['donation_id'];  ?>"> <button class="btn-mark-delivered">Feedback</button> </a>
                    <a href="<?php echo URLROOT; ?>/donor/feedback/<?php echo $data['donation_id'];  ?>"> <button class="btn-mark-cancelled">Cancel</button> </a>
                      </div>
                    </div><!-- eo box -->
                    <div class="btns2">
              <a href="<?php echo URLROOT;?>/pages/donationHistoryDonor"><button class="btn-back">Back</button></a>
            </div> 
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