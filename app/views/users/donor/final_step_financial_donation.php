<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Donation</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donate_nonfinancial_donor.css" />
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
          <span class="dashboard"><?php echo $data['data']['title'];  ?></span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
          
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['data']['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
      
        <div class="gigcontainer">
       
        <?php if ($data['status']== 1) { ?>
          <div class="box">
            <h3>Payment was Successful !</h3>
            <p>You have successfully donated <b>Rs.<?php echo $data['data']['donated_amount'];  ?></b> to <b><?php echo $data['data']['beneficiary_name'];  ?></b> for his request for financial support. </p>
            <p>Find more details in your <b>Donation History</b></p>  


          </div><!-- eo box -->
          <div class="btns2">
              <a href="<?php echo URLROOT;?>/pages/donationHistoryDonor"><button class="btn-back">OK</button></a>
          </div> 
          <?php } else{ ?>
            <div class="box">
            <h3>Payment was Failed !!</h3>
            <p>Your donation of <b>Rs.<?php echo $data['data']['donated_amount'];  ?></b> to <b><?php echo $data['data']['beneficiary_name'];  ?></b> for his request for financial support was <b>failed!</b> </p>
            <p><b>Please Try again!</b></p>  


          </div><!-- eo box -->
          <div class="btns2">
              <a href="<?php echo URLROOT;?>/pages/donationRequestsDonor"><button class="btn-back">Back</button></a>
          </div> 
         <?php } ?>
          
        </div> <!-- eo gigcontainer -->
          
           
      </div> <!-- eo main-container --> 

    </section>
    <!--home section end-->

    <script>

     
    </script>
  </body>
</html>