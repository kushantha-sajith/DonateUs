<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Donation</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donate_financial_donor.css" />
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

          <?php if($data['isRequest'] == 1){ ?>
            <form action="<?php echo URLROOT; ?>/donor/donate/<?php echo $data['req_id'];  ?>/<?php echo $data['cat_id'];  ?>" method="POST">
          <?php }else{?>
            <form action="<?php echo URLROOT; ?>/donor/donateToEvents/<?php echo $data['req_id'];  ?>/1" method="POST">
          <?php } ?>
          <h3 class="title_a">Donation Details</h3>
<div class="row">

    <div class="col">
            

        <div class="inputBox">
            <span>Full name :</span>
            <input type="text" name="donor_name" placeholder="Your Name" value="<?php echo $data['donor_name']; ?>">
        </div>
        <div class="inputBox">
            <span>Email :</span>
            <input type="email" name="donor_email" placeholder="Your Email Address" value="<?php echo $data['donor_email']; ?>">
        </div>
               
        <div class="circle-wrap">
        <div class="circle">
        <?php 
          $requested = $data['amount'];
          $received = $data['received'];
          //typecast to get integer value
          $percentage = (int) (($received/$requested)*100);
          $degree = (360/200)*$percentage; // (360/100)*percentage, then devide by 2 bcz circle is formed by 2 parts
        ?>
        
          <div class="mask full" style="transform: rotate(<?php echo $degree; ?>deg);">
            <div class="fill" style="transform: rotate(<?php echo $degree; ?>deg);"></div>
           </div> <!-- eo mask full -->
          <div class="mask half">
            <div class="fill" style="transform: rotate(<?php echo $degree; ?>deg);"></div>
          </div><!-- eo mask half -->
          <div class="inside-circle"> <?php echo $percentage; ?>% </div>
        </div><!-- eo circle -->
      </div> <!-- eo circle-wrap -->
      <div class="inputBox">
            <span>Rs.<?php echo $received; ?> raised out of Rs.<?php echo $requested; ?></span>            
        </div>
        

    </div>

    <div class="col">
        <div class="inputBox">
            <span>Contact Number :</span>
            <input type="text" name="donor_contact" placeholder="Your Contact Number" value="<?php echo $data['donor_contact']; ?>">
        </div>
        <div class="inputBox">
            <span>Amount Rs :</span>
            <input type="text" name="donated_amount" placeholder="500" value="<?php echo $data['donated_amount']; ?>">
            <p class="error"><?php echo $data['amount_err']; ?></p>
        </div>
        <div class="inputBox">
            <span>Anonymous Donation</span>
            <input type="checkbox" id="demoCheckbox" name="anonymous" value="1">
            <p>Your donation will be displayed as <b>Anonymous Donation</b> under the resent Donations of this donation request</p>
            <p>Your donation will be <b>Anonymous</b> to the beneficiary as well</p>
        </div>
        

    </div>
    <input type="submit" value="Proceed to Payment" class="submit-btn">
</div>



</form>
          </div><!-- eo box -->
          <div class="btns2">
          <?php if($data['isRequest'] == 1){ ?>
            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $data['req_id'];?>/1"><button class="btn-back">Back</button></a>
          <?php }else{?>
            <a href="<?php echo URLROOT;?>/donor/viewmoreEventDonor/<?php echo $data['req_id'];?>"><button class="btn-back">Back</button></a>
          <?php } ?>
          </div> 
        </div> <!-- eo gigcontainer -->
          
           
      </div> <!-- eo main-container --> 
            
        
        
    </section>
    <!--home section end-->

  </body>
</html>