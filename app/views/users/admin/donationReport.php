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
        <button class="down_btn" onclick="genPDF()">Download Report</button>
        <div id="section">
            <div class="section">
                <h1>Donation Request Report - <?php echo date('Y'); ?></h1>
                <h2>Financial Donations Report</h2>
                <br>
                <table>
                    <tr>
                        <th>Donation ID</th>
                        <th>Donor Name</th>
                        <th>Donation Date</th>
                        <th>Donation Request ID</th>
                        <th>Donation Request</th>
                        <th>Donated Amount</th>
                    </tr>
                    <?php foreach ($data['donation'] as $donation) : ?>
                        <tr>
                            <td><?php echo $donation->id; ?></td>
                            <td><?php echo $donation->donor_name; ?></td>
                            <td><?php echo $donation->date_of_completion; ?></td>
                            <td><?php echo $donation->req_id; ?></td>
                            <td><?php echo $donation->request_title; ?></td>
                            <td><?php echo $donation->amount; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2>Non - Financial Donations Report</h2>
                <br>
                <table>
                    <tr>
                        <th>Donation ID</th>
                        <th>Donor Name</th>
                        <th>Donation Date</th>
                        <th>Donation Request ID</th>
                        <th>Donation Request</th>
                        <th>Donated Item</th>
                        <th>Donated Quantity</th>
                    </tr>
                    <?php foreach ($data['nDonation'] as $donation) : ?>
                        <tr>
                            <td><?php echo $donation->id; ?></td>
                            <td><?php echo $donation->donor_name; ?></td>
                            <td><?php echo $donation->date_of_completion; ?></td>
                            <td><?php echo $donation->req_id; ?></td>
                            <td><?php echo $donation->request_title; ?></td>
                            <td><?php echo $donation->request_title; ?></td>
                            <td><?php echo $donation->quantity; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="section">
                <div class="sec-table">
                    <table style="width: 45%">
                        <tr>
                            <th></th>
                            <th>Count</th>
                        </tr>
                        <tr>
                            <td>No. of Ongoing Requests</td>
                            <td><?php echo $data['ongoingCount']->num_rows; ?></td>
                        </tr>
                        <tr>
                            <td>No. of Completed Requests</td>
                            <td><?php echo $data['completedCount']->num_rows; ?></td>
                        </tr>
                        <tr>
                            <td>No. of Rejected Requests</td>
                            <td><?php echo $data['rejectedCount']->num_rows; ?></td>
                        </tr>
                    </table>
                    <table style="width: 45%">
                        <tr>
                            <td>No. of Total Financial Donations</td>
                            <td>Rs.<?php echo $data['financialCount']; ?></td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Count</th>
                        </tr>
                        <?php foreach ($data['category'] as $category) : ?>
                            <tr>
                                <td>No. of <?php echo $category->category; ?> Requests</td>
                                <td><?php echo $category->count; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="sec-chart">
                <canvas id="myPie"></canvas>
                <canvas id="myDon"></canvas>
            </div>
        </div>
    </div>
</section>
<!--home section end-->
<script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function pieChart() {
        $.ajax({
            url: "http://localhost/DonateUs/Stats/requestStatus",
            method: 'GET',
            dataType: 'JSON',
            success: function (response1) {
                // count = response1.pending;
                // req = response1.pendingCount;
                // console.log(response1);
                //setup pie chart
                const data = {
                    labels: [response1.pending, response1.ongoing, response1.completed, response1.rejected],
                    datasets: [{
                        label: 'No. of Donations',
                        data: [response1.pendingCount.num_rows, response1.ongoingCount.num_rows, response1.completedCount.num_rows, response1.rejectedCount.num_rows],
                        borderWidth: 1
                    }]
                };
                //config pie chart
                const configPie = {
                    type: 'pie',
                    data: data,

                    options: {
                        scales: {
                            // y: {
                            //     beginAtZero: true
                            // }
                        }
                    }
                };
                //render pie chart
                const myPie = new Chart(
                    document.getElementById('myPie'),
                    configPie
                );
            }
        })
    }

    pieChart();

    function donutChart() {
        $.ajax({
            url: "http://localhost/DonateUs/Stats/donationQuantity",
            method: 'GET',
            dataType: 'JSON',
            success: function (response2) {
                // count = response2.high;
                // req = response2.highCount;
                // console.log(response2);
                //setup pie chart
                const data = {
                    labels: [response2.financial, response2.nonFinancial],
                    datasets: [{
                        label: 'Financial vs Non-Financial',
                        data: [response2.financialCount.num_rows, response2.nonFinancialCount.num_rows],
                        borderWidth: 1
                    }]
                };
                //config pie chart
                const configDonut = {
                    type: 'doughnut',
                    data: data,

                    options: {
                        scales: {
                            // y: {
                            //     beginAtZero: true
                            // }
                        }
                    }
                };
                //render pie chart
                const myDon = new Chart(
                    document.getElementById('myDon'),
                    configDonut
                );
            }
        })
    }

    donutChart();
</script>
</body>
</html>