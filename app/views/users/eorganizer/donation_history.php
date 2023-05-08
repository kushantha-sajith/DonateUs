<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Donation History</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req_Ui.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        .cards_heading{
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }
    </style>
</head>

<body>
    <?php require APPROOT . '/views/inc/side_navbar_eorganizer.php'; ?>

    <!--home section start-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Event Donation History</span>
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
            <div class="cards_heading head">
                <div>ID</div>
                <div>Date of Completion</div>
                <div>Amount</div>
                <div>Donor's Name</div>
            </div>
            <!-- <div class="cards_heading cards_color">
                <div>001</div>
                <div>Kushantha Lakshan</div>
                <div>Individual</div>
                <div>0767128051</div>
            </div> -->
            <?php foreach ($data as $donation_req) : ?>
                <div class="cards_heading cards_color">
                    <div><?php echo $donation_req->id; ?></div>
                    <div><?php echo $donation_req->date_of_completion; ?></div>
                    <div><?php echo $donation_req->amount; ?></div>
                    <div><?php echo $donation_req->donor_name; ?></div>
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