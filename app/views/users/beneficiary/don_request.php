<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Donation nfinancials</title>
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

    <!--home section start-->
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
             <div class="select-menu">
            
                <div class="select-btn">
                    <span class="material-icons">
                        pending_actions
                        </span>
                    <span class="option-text">Pending Requests</a></span>
                    <i class="bx bx-chevron-down"></i>
                </div>

                <ul class="options">
                    <a href="<?php echo URLROOT; ?>beneficiary/donationRequest" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;" >
                                pending_actions
                                </span>
                             
                            <span class="option-text"> Pending Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/beneficiary/donationReject" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                error
                                </span>
                            <span class="option-text">Rejected Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/beneficiary/donationOngoing" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                receipt_long
                                </span>
                            <span class="option-text">Ongoing Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/beneficiary/donationCompleted" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                assignment_turned_in
                                </span>
                            <span class="option-text">Completed Requests</span>
                        </li>
                    </a>    

                </ul>
            </div> 

        </div> 

             <div>
      <table class="main-table">
          <thead>
            <!-- <th style="text-align:left;"><span>Id</span></th> -->
            <th style="text-align:left;"><span>Request Title</span></th>
            <th style="text-align:left;"><span>Description</span></th>
            <th style="text-align:left;"><span>Beneficiary Name</span></th>
            <th style="text-align:left;"><span>Due Date</span></th>
            <th style="text-align:left;"><span>Contact</span></th>
            <th style="text-align:left;"><span>Donation Type</span></th>
            <!-- <th style="text-align:left;"><span>Amount/Quantity</span></th> -->
            <th style="text-align:left;"></th>
            <!-- <th style="text-align:left;"><span>Contact</span></th> -->
            <!-- <th style="text-align:left;"><span>user_id</span></th>
            <th style="text-align:left;"><span>cat_id</span></th> -->                   
          </thead>
          <tbody>
            <?php  foreach($data['non_financials'] as $nfinancials ):  ?>
                <tr class="t-row">
              <!-- <td style="text-align:left;"><?php echo $nfinancials->id; ?></td> -->
              <td style="text-align:left;"><?php echo $nfinancials->request_title; ?></td>
              <td style="text-align:left;"><?php echo $nfinancials->description; ?></td>
              <td style="text-align:left;"><?php echo $nfinancials->name; ?></td>
             <td style="text-align:left;"><?php echo $nfinancials->due_date; ?></td>
              <td style="text-align:left;"><?php echo $nfinancials->contact; ?></td>
              <td style="text-align:left;">Non-Financial</td>
              <td>  <a href="<?php echo URLROOT; ?>/beneficiary/viewNonFinancialRequest " class="btn-edit">View More</a></td> 
            <?php endforeach; ?>

            <?php  foreach($data['financials'] as $financials ): ?>
            <tr class="t-row">
              <!-- <td style="text-align:left;"><?php echo $financials->id; ?></td> -->
              <td style="text-align:left;"><?php echo $financials->request_title; ?></td>
              <td style="text-align:left;"><?php echo $financials->description; ?></td>
              <td style="text-align:left;"><?php echo $financials->name; ?></td>
             <td style="text-align:left;"><?php echo $financials->due_date; ?></td>
              <td style="text-align:left;"><?php echo $financials->contact; ?></td>
              <td style="text-align:left;">Financial</td>
              <td>  <a href="<?php echo URLROOT; ?>/beneficiary/viewFinancialRequest" class="btn-edit">View More</a></td> 
            <?php endforeach; ?>
  
            </tr>
        
          </tbody>
        </table>

      </div>

      <div class="tablecategory">
      <div>
        <a href="<?php echo URLROOT; ?>/beneficiary/addFinancialRequest">
        <input type="submit" value="Financial Request" class="btn add">
        </a>
      </div>

      <div>
        <a href="<?php echo URLROOT; ?>/beneficiary/addNonFinancialRequest">
        <input type="submit" value="Non Financial Request" class="btn add">
        </a>
      </div>
      </div>


        
                </div>
    </section>
    <!--home section end-->


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