<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin_dashboard.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <?php require APPROOT . '/views/inc/side_navbar_eorganizer.php'; ?>

  <!--home section start-->
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
        <span class="dashboard">Dashboard</span>
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
    <section id="content">
      <main>
        <ul class="box-info">
          <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
              <h3><?php echo $data['ongoingReqCount']; ?></h3>
              <p>Ongoing Requests </p>
            </span>
          </li>
          <li>
            <i class='bx bxs-group'></i>
            <span class="text">
              <h3><?php echo $data['pendingRequests']; ?></h3>
              <p>Pending Requests</p>
            </span>
          </li>
          <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
              <h3>Rs.<?php echo $data['totalDonations']; ?></h3>
              <p>Total Donations</p>
            </span>
          </li>
        </ul>


        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Recent Donations</h3>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Donor Name</th>
                  <th>Date</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['recentDonations'] as $recentDonations) : ?>
                  <tr>
                    <td>
                      <!--                                <img src="img/people.png">-->
                      <p><?php echo $recentDonations->donor_name; ?></p>
                    </td>
                    <td><?php echo $recentDonations->date_of_completion; ?></td>
                    <td><?php echo $recentDonations->amount; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="todo">
            <!--<div class="head">-->
            <!--<h3>Top Donors</h3>-->
            <!--</div>-->
            <!--<ul class="todo-list">-->
            <!--<li class="not-completed">-->
            <!--<p>#</p>-->
            <!--<i class='bx bx-dots-vertical-rounded'></i>-->
            <!--</li>-->
            <!--</ul>-->
            <div class="chart1" style="height: 23vh;">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
      </main>
    </section>
    <!--home section end-->
    <script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
      function pieChart() {
        $.ajax({
          url: "http://localhost/DonateUs/Stats/eventStatus",
          method: 'GET',
          dataType: 'JSON',
          success: function(response1) {
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
                scales: {}
              }
            };
            //render pie chart
            const myPie = new Chart(
              document.getElementById('myChart'),
              configPie
            );
          }
        })
      }

      pieChart();
    </script>
</body>

</html>