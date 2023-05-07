<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
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
            <span class="dashboard">Reports</span>
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
    <div class="main-container">
        <div class="rep-container">
            <h1>Reports</h1>
            <br>
            <div class="report">
                <h3>Donation Request Report</h3>
                <div class="rep">
                    <div>Annual Report</div>
                    <button class="down_btn" type="button"
                            onclick="window.location.href='<?php echo URLROOT; ?>/admin/donationReqReport'">
                        View
                    </button>
                </div>
                <div class="rep">
                    <div>Monthly Report</div>
                    <button class="down_btn" type="button"
                            onclick="window.location.href='<?php echo URLROOT; ?>/admin/monthlyDonationReqReport'">
                        View
                    </button>
                </div>
                <div class="rep">
                    <div>Custom Report</div>
                    <div class="rep1">
                        <form class="rep1" method="POST">
                            <div>From <input type="date" name="from"> to <input type="date" name="to" max=""></div>
                            <button class="down_btn">
                                View
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="report">
                <h3>Event Request Report</h3>
                <div class="rep">
                    <div>Annual Report</div>
                    <button class="down_btn" type="button"
                            onclick="window.location.href='<?php echo URLROOT; ?>/admin/eventReqReport'">
                        View
                    </button>
                </div>
                <div class="rep">
                    <div>Monthly Report</div>
                    <button class="down_btn" type="button"
                            onclick="window.location.href='<?php echo URLROOT; ?>/admin/donationReqReport'">
                        View
                    </button>
                </div>
                <div class="rep">
                    <div>Custom Report</div>
                    <div class="rep1">
                        <form class="rep1" method="POST">
                            <div>From <input type="date" name="from"> to <input type="date" name="to" max=""></div>
                            <button class="down_btn">
                                View
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--home section end-->
<script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
</body>
</html>