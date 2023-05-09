<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>First Login</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" />
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
                <span class="dashboard">First Login</span>
            </div>

            <div class="profile-details">
                <div class="notification">
                    <i class="bx bx-bell bx-tada notification"></i>
                </div>
                <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
               
            </div>
        </nav>
        <main>

        <div class="main-container">

<h3>Do You Want to get reservations daily?</h3>

<a href="<?php echo URLROOT; ?>/users/addReservationDetails" class="btn-edit">Yes</a>
<a href="<?php echo URLROOT; ?>/pages/beneficiary" class="btn-delete">No</a>


 
         </div>
         </main>   
        </section>