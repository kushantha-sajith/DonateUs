<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            <span class="dashboard">Donation Requests</span>
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

    <main>
<!--        <div style="text-align: center;"> <a href="--><?php //echo URLROOT; ?><!--/pages/addNewRequest"> <button class="btnview btnadd">Add New Request</button> </a></div>-->
<!--        <br>-->
            <div class="select-menu">
                <div class="select-btn">
                    <span class="material-icons" style="color: black; margin-right: 1rem;">receipt_long</span>
                    <span class="option-text">Ongoing Requests</span>
                    <i class="bx bx-chevron-down"></i>
                </div>
                <ul class="options">
                    <a href="<?php echo URLROOT; ?>/adminPages/pendingRequests" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons"
                                  style="color: black; margin-right: 1rem;">pending_actions</span>
                            <span class="option-text"> Pending Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/adminPages/rejectedRequests" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">error</span>
                            <span class="option-text">Rejected Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/adminPages/ongoingRequests" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">receipt_long</span>
                            <span class="option-text">Ongoing Requests</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/adminPages/completedRequests" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons"
                                  style="color: black; margin-right: 1rem;">assignment_turned_in</span>
                            <span class="option-text">Completed Requests</span>
                        </li>
                    </a>
                </ul>
            </div>



        <div class="cards_heading head">
            <div>ID</div>
            <div>Request Title</div>
            <div>Received Amount / Quantity</div>
            <div>Category</div>
            <div>Donation Type</div>
            <div>Amount / Quantity</div>
            <div></div>
        </div>
        <?php foreach($data['ongoingRequests'] as $ongoingRequests) : ?>
            <div class="cards_heading cards_color">
                <div><?php echo $ongoingRequests->id; ?></div>
                <div><?php echo $ongoingRequests->request_title; ?></div>
                <div><?php echo $ongoingRequests->rec_amount; ?></div>
                <div><?php echo $ongoingRequests->category_name; ?></div>
                <div><?php echo $ongoingRequests->req_type; ?></div>
                <div><?php echo $ongoingRequests->amount; ?></div>
                <div>
                    <div style="text-align: center;"> <a href="<?php echo URLROOT; ?>/pages/ongoingRequestDetails/<?php echo $ongoingRequests->id; ?>"> <button class="btnview" >View More</button> </a></div>
                </div>
            </div>
        <?php endforeach; ?>
        </main>
    </section>
    <!--home section end-->


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

</html>