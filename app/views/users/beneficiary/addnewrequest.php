<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" /> 
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_main.css" /> -->
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
            
            </div>
        </nav>

        <div class="main-container">
        <table>
            <tr>
                <td class="fin-table">
                    <div class="box">
                        <h2>Financial Request</h2>
                        <a href="<?php echo URLROOT; ?>/beneficiary/addFinancialRequest" style="text-decoration:none; padding-left:30px;">Add </a>
                    </div>
                </td>

                <td class="fin-table">
                    <div class="box">
                        <h2>Non Financial Request</h2>
                        <a href="<?php echo URLROOT; ?>/beneficiary/addNonFinancialRequest" style="text-decoration:none; padding-left:30px">Add </a>
                    </div>  
                </td>       
        </table>
        
        </div>
    </section>
    <!--home section end-->


</body>

</html>