<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Financial Donation Request</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" /> -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>

    <!--home section start-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Reservation Details</span>
            </div>

            <div class="profile-details">
                <div class="notification">
                    <i class="bx bx-bell bx-tada notification"></i>
                </div>
                <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
                <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <main>
            <div class="container">
                <header>Donation Request</header>

                <form method="post" action="<?php echo URLROOT; ?>/users/addReservationDetails" enctype="multipart/form-data">
                    <div class="formfirst">
                        <div class="details personal">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Members Quantity </label>
                                    
                                    <input type="text" placeholder="Enter a Quantity" name="members" value="<?php echo $data['members']; ?>">
                                    <!-- <span class="error"><?php echo $data['titleErr']; ?></span> -->
                                </div>
                                <div class="input-field" id="description">
                                    <label>Description</label>
                                    <textarea placeholder="Enter Description" name="reservation_description" rows="4" cols="40"><?php echo $data['reservation_description']; ?></textarea>
                                    <!-- <span class="error"> <?php echo $data['descriptionErr']; ?></span> -->
                                </div>

                                <span class="title"><u>Meal Plan</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="meal_plan" name="meal_plan" value="<?php echo $data['meal_plan']; ?>">
                            <!-- <div class="img-area" id="area-three" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div> -->
                            <span class="error"><?php echo $data['meal_planErr']; ?></span>
                            
                        </div>

                        <div>
                          <!-- <a href="<?php echo URLROOT; ?>/beneficiary/addRequest">  -->
                          <input type="submit" value="submit" class="btn add" >
                          </a>
                        </div>

                                
                    </div>
              
</div>
</div>
              </form>
          </div>



      </main>

  </section>
