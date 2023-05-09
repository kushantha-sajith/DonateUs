<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Create Event</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/limit_reached.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <?php require APPROOT . '/views/inc/side_navbar_eorganizer.php'; ?>

    <!--home section start-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Create Event</span>
            </div>

            <div class="profile-details">
                <div class="notification">
                    <i class="bx bx-bell bx-tada notification"></i>
                </div>
                <a href="<?php echo URLROOT; ?>/pages/profileOrganizer"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
                <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <main class="limit-reached-container">
            <!--Profile card start-->
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo URLROOT; ?>/img/red.jpeg" alt="">
                </div>
                <div class="profile-image">
                    <img src="<?php echo URLROOT; ?>/img/OIP.jpeg" alt="">
                </div>
                <div class="card-content">
                    <h1>Warning!</h1>
                    <p>I regret to inform you that the creation of an event is not currently possible, as it appears that the event creation limit has been reached.</p>
                </div>

            </div>
            <!--Profile card end-->
        </main>

    </section>
    <!--home section end-->
</body>

</html>