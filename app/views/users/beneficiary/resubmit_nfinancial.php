<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Non Financial Donation Request</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" /> -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>

    <!--home section start-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Donation Requests</span>
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

        <main>
            <div class="container">
                <header>Donation Request</header>
            <?php  foreach($data['nfinancials'] as $nfinancials ):  ?>

                <form method="post" action="<?php echo URLROOT; ?>/beneficiary/updateNonFinancialDueDate/<?php echo $nfinancials->id;  ?>" enctype="multipart/form-data">
                    <div class="formfirst">
                        <div class="details personal">
                            <div class="fields">

                                
                                <div class="input-field">
                                    <label>Due Date</label>
                                    <!-- <input type="date" placeholder="Due Date"> -->
                                    <input type="date" placeholder="Enter Due Date" name="due_date" value="<?php echo $nfinancials->due_date; ?>">
                                    <!-- <span class="error"><?php echo $data['duedateErr']; ?></span> -->

                            </div>
                       
            </div>
            </div>
                        <div>
                          <!-- <a href="<?php echo URLROOT; ?>/beneficiary/addRequest">  -->
                          <input type="submit" value="submit" class="btn add">
                          </a>
                        </div>
                    
                    </div>

                    </div>
                    </form>
                     
                    <?php endforeach; ?>

             
            </div>

        </main>

    </section>
    <!--home section end-->


</body>

</html>