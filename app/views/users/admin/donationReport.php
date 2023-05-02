<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/reports.css"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
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
        <script src="<?php echo URLROOT ?>/js/genPDF.js"></script>
        <button onclick="genPDF()">Download Report</button>
        <div id="section">
            <h1>Donation Report</h1>
            <table id="table">
                <tr>
                    <th>Donation ID</th>
                    <th>Donation Date</th>
                    <th>Donation Time</th>
                    <th>Donation Type</th>
                    <th>Donation Amount</th>
                    <th>Donation Status</th>
                </tr>
                <?php foreach ($data['donation'] as $donation) : ?>
                    <tr>
                        <td><?php echo $donation->donation_id; ?></td>
                        <td><?php echo $donation->donation_date; ?></td>
                        <td><?php echo $donation->donation_time; ?></td>
                        <td><?php echo $donation->donation_type; ?></td>
                        <td><?php echo $donation->donation_amount; ?></td>
                        <td><?php echo $donation->donation_status; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>
<!--home section end-->
<script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
</body>
</html>