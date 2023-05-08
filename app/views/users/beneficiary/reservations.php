<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Reservations</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" /> 
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_history.css" /> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />

    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" /> -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

<?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>


<section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Donation Request</span>
            </div>

            <div class="profile-details">
                <div class="notification">
                    <i class="bx bx-bell bx-tada notification"></i>
                </div>
                <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
                <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <div class="main-container">


<table class="main-table">
<thead>
            
            <th style="text-align:left;"><span>Meal Count</span></th>
            <th style="text-align:left;"><span>Reserved Date</span></th>
            <th style="text-align:left;"><span>Reserved Month</span></th>
<<<<<<< Updated upstream
            <th style="text-align:left;"><span>Meal Time</span></th>
            <th style="text-align:left;"></th>
=======
            <th style="text-align:left;"><span>Reserved Year</span></th>
            <th style="text-align:left;"><span>Meal Time</span></th>
>>>>>>> Stashed changes
            <th style="text-align:left;"></th>
</thead>

<tbody>
                            
    <tr>
                              
    <?php foreach($data['reservations'] as $reservations): ?>

        <td style="text-align:left;"><?php echo $reservations->amount; ?></td>
        <td style="text-align:left;"><?php echo $reservations->date; ?></td>
<<<<<<< Updated upstream
        <td style="text-align:left;"><?php echo $reservations->month; ?></td>
=======
        <td style="text-align:left;"><?php echo $reservations->month+1; ?></td>
        <td style="text-align:left;"><?php echo $reservations->year; ?></td>
>>>>>>> Stashed changes
        <?php if($reservations->meal == 1){ ?>
        <td style="text-align:left;">Breakfast</td> 
        <?php   } elseif($reservations->meal == 2){?>
        <td style="text-align:left;">Lunch</td>
        <?php } else{ ?>
        <td style="text-align:left;">Dinner</td> 
        <?php } ?>     
        <td style="text-align:left;"><a href="<?php echo URLROOT; ?>/beneficiary/approveReservation/<?php echo $reservations->id;  ?>" class="btn-edit">Accept</a></td>
        <td style="text-align:left;"><a href="<?php echo URLROOT; ?>/beneficiary/rejectReservation/<?php echo $reservations->id;  ?>" class="btn-edit">Reject</a></td>

    </tr>
    
    <?php endforeach; ?>

                          
   </tbody>
</table>
</div>
</section>

        <script>
       

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

</html>
