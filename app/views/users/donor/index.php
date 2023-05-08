<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
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
          <span class="dashboard">Dashboard</span>
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
        <h1>Welcome Donor</h1>
        <br>
        <h3>This month,</h3>
        <div class="cardBox">
              <div class="card">
                <a href="<?php echo URLROOT; ?>/pages/donationHistoryDonor">
                  <div>
                      <div class="numbers"><?php echo $data['total']; ?></div>
                      <div class="cardName">Total Donations</div>
                  </div>
                </a>
                  <div class="iconBx">
                      <ion-icon name="eye-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/0/0">
                  <div>
                      <div class="numbers"><?php echo $data['nfinancial_total']; ?></div>
                      <div class="cardName">Non Financial Donations</div>
                  </div>
                </a>
                  <div class="iconBx">
                      <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                <a href="<?php echo URLROOT;?>/donor/filteredHistoryDonor/1/0">
                  <div>
                      <!-- if there are no any financial donations display 0, used the SUM function to get total in the model, mandatory to mention 0  -->
                      <div class="numbers">Rs.<?php if($data['financial_total'] > 0){ echo $data['financial_total']; } else{ echo "0";} ?></div> 
                      <div class="cardName">Financial Donations</div>
                  </div>
                </a>
                  <div class="iconBx">
                      <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                <a href="<?php echo URLROOT;?>/donor/viewMyReservationsDonor">
                  <div>
                      <div class="numbers"><?php echo $data['reservattions_upcoming']; ?></div>
                      <div class="cardName">Upcoming Reservations</div>
                  </div>
                </a>
                  <div class="iconBx">
                      <ion-icon name="cart-outline"></ion-icon>
                  </div>
              </div>

             
          </div>
         
          <br><br>
          <table class="table-img">
            <tr>
              <td class="table-data"><img src="<?php echo URLROOT; ?>/img/image4.png" alt="" width="450" height="350"></td>
            
              <td class="table-data"><img src="<?php echo URLROOT; ?>/img/image2.png" alt="" width="500" height="350"></td>
          </tr>
          </table>

         
              </div>
          </div>
      </div>
        </div>
      </div>
    </section>
    <!--home section end-->

    
  </body>
</html>