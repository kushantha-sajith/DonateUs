<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Donate</title>
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
          <span class="dashboard">Donation</span>
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
        <?php foreach($data['request_data'] as $details ): ?>
          <div class="box">
            <h3>Request Details</h3>
            <p><b>Request title :</b> <?php echo $details->request_title;  ?></p>
            <p><b>Item requested : </b><?php echo $details->item;  ?> <b>Quantity : </b><?php echo $details->quantity;  ?></p>
            <p><b>You are donating : </b><?php echo $data['donated_quantity'];  ?></p>
            <?php foreach($data['beneficiary'] as $user ): ?>
            <h3>Beneficiary Contact Details</h3>
            <p><b>Beneficiary name : </b><?php echo $details->name;  ?></p>
            <p><b>Contact number : </b><?php echo $details->contact;  ?></p>
            <p><b>Email Address : </b><?php echo $user->email;  ?></p>
            <h3>Delivery Details</h3>
            
              <p><b>Address : </b><?php echo $user->address;  ?></p>
              <p><b>Zipcode : </b><?php echo $user->zipcode;  ?></p>
              <p><b>District : </b><?php echo $user->dist_name;  ?></p>
            <?php endforeach; ?>
          <?php endforeach; ?>
            <h3>Other Conditions & Guidlines</h3>
            <ul>
              <li> It is recommended that the donor should contact the beneficiary before delivering the donation to confirm their willingness 
                and to know more about the beneficiary's specific requirements.</li>
              <li>The donor should be respectful and polite to the beneficiary during the delivery process. 
                You should not engage in any behavior that might make the beneficiary uncomfortable.</li>
                <li>The donor should not donate cash directly to the beneficiary. 
                  Instead, they should donate through the system to ensure that the donation reaches the intended beneficiary.</li>
                  <li>The donor should take all necessary precautions to ensure their safety when delivering the donation. 
                    Follow recommended health guidelines to minimize the risk of COVID-19</li>
            </ul>
           
          </div><!-- eo box -->
          <div class="btns2">
              <a href="<?php echo URLROOT;?>/pages/donationHistoryDonor"><button class="btn-back">OK</button></a>
          </div> 
        </div> <!-- eo gigcontainer -->
          
           
      </div> <!-- eo main-container --> 

    </section>
    <!--home section end-->

    <script>


    </script>
  </body>
</html>