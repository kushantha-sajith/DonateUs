<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_history.css"/>
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
            <span class="dashboard">Event Donation History</span>
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
        <div class="cards_heading head">
            <div>ID</div>
            <div>Donor Name</div>
            <div>Event Title</div>
            <div>Community</div>
            <div>Completed Date</div>
            <div>Amount</div>
            <div>Donor Contact Number</div>
            <div></div>
        </div>
        <?php foreach ($data['donationHistory'] as $donation) : ?>
            <div class="cards_heading cards_color">
                <div><?php echo $donation->id; ?></div>
                <div><?php echo $donation->donor_name; ?></div>
                <div><?php echo $donation->event_title; ?></div>
                <div><?php echo $donation->community_name; ?></div>
                <div><?php echo $donation->date_of_completion; ?></div>
                <div><?php echo $donation->amount; ?></div>
                <div><?php echo $donation->donor_contact_number; ?></div>
                <div>
                    <div style="text-align: center;">
                        <a href="<?php echo URLROOT; ?>/adminPages/eventDonations/<?php echo $donation->id; ?>">
                            <button class="btnview">View More</button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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