<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<!--navigation bar left-->
<?php require APPROOT.'/views/inc/side_navbar.php';?>
<!--navigation bar left end-->

<!--home section start-->
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class="bx bx-menu sidebarBtn"></i>
            <span class="dashboard">Statistics</span>
        </div>

        <div class="profile-details">
            <div class="notification">
                <i class="bx bx-bell bx-tada notification"></i>
            </div>
            <img src="<?php echo URLROOT; ?>/img/profile_pic.svg" alt="" />
            <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
            <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
    </nav>
    <div class="main-container">
        <div class="chart">
            <div class="chart1">
<<<<<<< Updated upstream
                <canvas id="myChart"></canvas>
            </div>
            <div class="chart2">
                <canvas id="myPie"></canvas>
                <canvas id="myDon"></canvas>
=======
            <canvas id="myChart"></canvas>
            <canvas id="myLine"></canvas>
            </div>
            <div class="chart2">
            <canvas id="myPie"></canvas>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>
</section>
<!--home section end-->

<script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<<<<<<< Updated upstream
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    var count;
    var req;
    function No_of_requests() {
        $.ajax({
            url: "http://localhost/DonateUs/Stats/donationRequests",
            method: 'GET',
            dataType: 'JSON',
            success: function(response) {
                console.log(response);
                // setup block
                const data = {

                    labels: [response.jan, response.feb, response.mar, response.apr, response.may, response.jun, response.jul, response.aug, response.sep, response.oct, response.nov, response.dec],
                    datasets: [{
                        label: 'title',
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
                    document.getElementById('myChart'),
                    config
                );
            }
        })
    }

    No_of_requests();

    function pieChart() {
        $.ajax({
            url: "http://localhost/DonateUs/Stats/requestStatus",
            method: 'GET',
            dataType: 'JSON',
            success: function(response1) {
                // count = response1.pending;
                // req = response1.pendingCount;
                console.log(response1);
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
            success: function(response2) {
                // count = response2.high;
                // req = response2.highCount;
                console.log(response2);
                //setup pie chart
                const data = {
                    labels: [response2.financial, response2.nonFinancial],
                    datasets: [{
                        label: 'Donation Priority',
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
                console.log(response2);
            }
        })
    }
    donutChart();
=======
<script>
    const ctx = document.getElementById('myChart');
    const ctp = document.getElementById('myPie');
    const ctr = document.getElementById('myLine');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'No. of Donations',
                data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    new Chart(ctp, {
        type: 'pie',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'No. of Donations',
                data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    new Chart(ctr, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'No. of Donations',
                data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

>>>>>>> Stashed changes
</script>

</body>

</html>