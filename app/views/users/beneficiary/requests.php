<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Request</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
  <?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>

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
          <a href="<?php echo URLROOT; ?>/beneficiary/profile"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
      <div>
        <h1>Requests</h1>
      </div>
      <div>
      <table class="main-table">
          <thead>
            <th style="text-align:left;"><span>Id</span></th>
            <th style="text-align:left;"><span>Description</span></th>
            <th style="text-align:left;"><span>Name</span></th>
            <th style="text-align:left;"><span>Quantity</span></th>
            <th style="text-align:left;"><span>DueDate</span></th>
            <th style="text-align:left;"><span>Title</span></th>
            <th style="text-align:left;"><span>City</span></th>
            <th style="text-align:left;"><span>Contact</span></th>
            <!-- <th style="text-align:left;"><span>user_id</span></th>
            <th style="text-align:left;"><span>cat_id</span></th> -->


            <th></th>
            <th></th>            
          </thead>
          <tbody>
            <?php foreach($data['requests'] as $requests) : ?>
            <tr class="t-row">
              <td style="text-align:left;"><?php echo $requests->id; ?></td>
              <td style="text-align:left;"><?php echo $requests->description; ?></td>
              <td style="text-align:left;"><?php echo $requests->name; ?></td>
              <td style="text-align:left;"><?php echo $requests->quantity; ?></td>
              <td style="text-align:left;"><?php echo $requests->duedate; ?></td>
              <td style="text-align:left;"><?php echo $requests->title; ?></td>
              <td style="text-align:left;"><?php echo $requests->city; ?></td>
              <td style="text-align:left;"><?php echo $requests->contact; ?></td>
              <!-- <td style="text-align:left;"><?php echo $requests->user_id; ?></td>
              <td style="text-align:left;"><?php echo $requests->cat_id; ?></td> -->


              <td><a href="<?php echo URLROOT; ?>/beneficiary/editRequest/$requests->id<?php echo $requests->id; ?>" class="btn-edit">Edit</a></td>
              <td><a href="<?php echo URLROOT; ?>/beneficiary/deleteRequest/<?php echo $requests->id; ?>" class="btn-delete">Delete</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
      <br>
      <br>
      <br>
      <div>
        <a href="<?php echo URLROOT; ?>/beneficiary/reqForm">
        <input type="submit" value="Add a new request" class="btn add">
        </a>
      </div>
      </div> 
      </section>


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
        // js for drop down list 
        const optionMenu = document.querySelector(".select-menu"),
            selectBtn = optionMenu.querySelector(".select-btn"),
            options = optionMenu.querySelectorAll(".option"),
            sBtn_text = optionMenu.querySelector(".sBtn-text");

        selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

        options.forEach(option => {
            option.addEventListener("click", () => {
                let selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;

                optionMenu.classList.remove("active");
            });
        });

    </script>
</body>

</html> -->