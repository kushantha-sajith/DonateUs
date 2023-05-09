<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Event Details</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req_Ui.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <?php require APPROOT . '/views/inc/side_navbar_eorganizer.php'; ?>

    <!--home section start-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Event Details</span>
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

        <main>
            <div class="select-menu">

                <div class="select-btn">
                    <span class="material-icons">
                        pending_actions
                    </span>
                    <span class="option-text"><?php echo $data['status']?></a></span>
                    <i class="bx bx-chevron-down"></i>
                </div>

                <ul class="options">
                    <a href="<?php echo URLROOT; ?>/EOrganizer/EventDetails/0" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                pending_actions
                            </span>

                            <span class="option-text"> Pending Events</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/EOrganizer/EventDetails/2" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                error
                            </span>
                            <span class="option-text">Rejected Events</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/EOrganizer/EventDetails/1" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                receipt_long
                            </span>
                            <span class="option-text">Ongoing Events</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/EOrganizer/EventDetails/3" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                assignment_turned_in
                            </span>
                            <span class="option-text">Completed Events</span>
                        </li>
                    </a>



                </ul>
            </div>



            <div class="cards_heading head">
                <div>ID</div>
                <div>Title</div>
                <div>Description</div>
                <div>Due Date</div>
                <div>Amount(Rs.)</div>
                <div>Received Amount(Rs.)</div>
                <div></div>
            </div>
            <!-- <div class="cards_heading cards_color">
                <div>001</div>
                <div>Kushantha Lakshan</div>
                <div>Individual</div>
                <div>0767128051</div>
                <div>Money</div>
                <div>100,000</div>
                <div>
                    <center> <a href="donation_req.html"> <button class="btnview">View More</button> </a></center>
                </div>
            </div> -->

            <?php foreach ($data['donation_req'] as $donation_req) : ?>
                <div class="cards_heading cards_color">
                    <div><?php echo $donation_req->id; ?></div>
                    <div><?php echo $donation_req->event_title; ?></div>
                    <div><?php echo $donation_req->description; ?></div>
                    <div><?php echo $donation_req->due_date; ?></div>
                    <div><?php echo $donation_req->budget; ?></div>
                    <div><?php echo $donation_req->received; ?></div>
                    <div class="event-details-btn-container">
                        <center> <a href="<?php echo URLROOT; ?>/EOrganizer/EventDetailsFull/<?php echo $donation_req->id; ?>"> <button class="btnview">View More</button> </a></center>
                    </div>
                </div>
            <?php endforeach; ?>
        </main>

    </section>
    <!--home section end-->


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");

            sidebarBtn.onclick = function() {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
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
        })
    </script>
</body>

</html>