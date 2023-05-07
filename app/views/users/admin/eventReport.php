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
                <h1>Event Request Report - <?php echo date('Y'); ?></h1>
                <br>
                <table>
                    <tr>
                        <th>Donation ID</th>
                        <th>Donor Name</th>
                        <th>Event Title</th>
                        <th>Community Name</th>
                        <th>Donated Amount</th>
                        <th>Completion Date</th>
                    </tr>
                    <?php foreach ($data['events'] as $donation) : ?>
                        <tr>
                            <td><?php echo $donation->id; ?></td>
                            <td><?php echo $donation->donor_name; ?></td>
                            <td><?php echo $donation->event_title; ?></td>
                            <td><?php echo $donation->community_name; ?></td>
                            <td><?php echo $donation->amount; ?></td>
                            <td><?php echo $donation->date_of_completion; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="section">
                <div class="sec-table">
                    <table>
                        <tr>
                            <th></th>
                            <th>Count</th>
                        </tr>
                        <tr>
                            <td>No. of Ongoing Events</td>
                            <td><?php echo $data['ongoing']->num_rows; ?></td>
                        </tr>
                        <tr>
                            <td>No. of Completed Events</td>
                            <td><?php echo $data['completed']->num_rows; ?></td>
                        </tr>
                        <tr>
                            <td>No. of Rejected Events</td>
                            <td><?php echo $data['rejected']->num_rows; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="sec-chart2">
                <h2>No. of Event Requests</h2>
                <canvas id="myChart1"></canvas>
            </div>
        </div>
    </div>
</section>
<!--home section end-->
<script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function No_of_events() {
        $.ajax({
            url: "http://localhost/DonateUs/Stats/eventRequests",
            method: 'GET',
            dataType: 'JSON',
            success: function (response) {
                // console.log(response);
                // setup block
                const data = {

                    labels: [response.jan, response.feb, response.mar, response.apr, response.may, response.jun, response.jul, response.aug, response.sep, response.oct, response.nov, response.dec],
                    datasets: [{
                        label: 'Event Requests',
                        data: [response.janCount.num_rows, response.febCount.num_rows, response.marCount.num_rows, response.aprCount.num_rows, response.mayCount.num_rows, response.junCount.num_rows, response.julCount.num_rows, response.augCount.num_rows, response.sepCount.num_rows, response.octCount.num_rows, response.novCount.num_rows, response.decCount.num_rows],
                        borderWidth: 2
                    }]
                };
                //config block
                const config = {
                    type: 'bar',
                    data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };
                //Render block
                const myChart = new Chart(
                    document.getElementById('myChart1'),
                    config
                );
            }
        })
    }

    No_of_events();
</script>
</body>
</html>