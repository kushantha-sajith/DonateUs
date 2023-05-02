<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_details.css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<!--navigation bar left-->
<?php require APPROOT . '/views/inc/side_navbar.php'; ?>
<!--navigation bar left end-->

<!--home section start-->
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class="bx bx-menu sidebarBtn"></i>
            <span class="dashboard">Donation Details</span>
        </div>
        <div class="profile-details">
            <div class="notification">
                <i class="bx bx-bell bx-tada notification"></i>
            </div>
            <img src="<?php echo URLROOT; ?>/img/profile_pic.svg" alt=""/>
            <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
            <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
    </nav>
    <main>
        <div class="container">
            <header>Donation Details</header>
            <form action="">
                <?php foreach ($data['donationDetails'] as $donationData): ?>
                <div class="formfirst">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>Donor Name</label>
                                <input type="text" disabled placeholder="<?php echo $donationData->donor_name; ?>">
                            </div>
                            <div class="input-field">
                                <label>Community Name</label>
                                <input type="text" disabled
                                       placeholder="<?php echo $donationData->community_name; ?>">
                            </div>
                            <div class="input-field">
                                <label>Event Title</label>
                                <input type="text" disabled placeholder="<?php echo $donationData->event_title; ?>">
                            </div>
                            <div class="input-field">
                                <label>Donated Amount</label>
                                <input type="text" disabled placeholder="Rs.<?php echo $donationData->amount; ?>">
                            </div>
                            <div class="input-field">
                                <label>Donor Email</label>
                                <input type="text" disabled placeholder="<?php echo $donationData->donor_email; ?>">
                            </div>
                            <div class="input-field">
                                <label>Donor Contact Number</label>
                                <input type="number" disabled
                                       placeholder="<?php echo $donationData->donor_contact_number; ?>">
                            </div>
                            <div class="input-field">
                                <label>Community Email</label>
                                <input type="text" disabled
                                       placeholder="<?php echo $donationData->cm_email; ?>">
                            </div>
                            <div class="input-field">
                                <label>community Contact Number</label>
                                <input type="number" disabled
                                       placeholder="<?php echo $donationData->cm_tp_number; ?>">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </main>
</section>
<!--home section end-->
<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    let welcome = document.querySelector(".welcome");
    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            welcome.style.display = "none";
        } else {
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            welcome.style.display = "block";
        }
    };
</script>

</body>

</html>