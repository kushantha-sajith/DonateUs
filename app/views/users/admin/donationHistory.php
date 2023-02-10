<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_history.css" />
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
                <span class="dashboard">Donation History</span>
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

            <div class="select-menu">
            
                <div class="select-btn">
                    <span class="material-icons">
                        attach_money
                        </span>
                    <span class="option-text">Financial Donations</a></span>
                    <i class="bx bx-chevron-down"></i>
                </div>

                <ul class="options">
                    <a href="<?php echo URLROOT; ?>/admin/financialDonationHistory" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;" >
                                attach_money
                                </span>
                             
                            <span class="option-text"> Financial Donations</span>
                        </li>
                    </a>
                    <a href="<?php echo URLROOT; ?>/admin/nonFinancialDonationHistory" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                fastfood
                                </span>
                            <span class="option-text">Non-Financial Donations</span>
                        </li>
                    </a>
                </ul>
            </div>


            <div class="cards_heading head">
                <div>ID</div>
                <div>Donor Name</div>
                <div>Donor Type</div>
                <div>Req ID</div>
                <div>Contact Number</div>
                <div>Amount</div>
                <div>Status</div>
                <div></div>
            </div>
            <div class="cards_heading cards_color">
                <div>001</div>
                <div>Kushantha Lakshan</div>
                <div>Individual</div>
                <div>003</div>
                <div>0767128051</div>
                <div>100,000</div>
                <div>
                    <select name="status" id="status" style="margin-top: 0.5rem;">
                        <option value="Active">Ongoing</option>
                        <option value="Deactive">Completed</option>
                    </select>
                </div>
                <div>
                    <div style="text-align: center;"> <a href="#"> <button class="btnview" >View More</button> </a></div>
                 </div>
             </div>
             <div class="cards_heading cards_color">
                <div>001</div>
                <div>Kushantha Lakshan</div>
                <div>Individual</div>
                <div>003</div>
                <div>0767128051</div>
                <div>100,000</div>
                <div>
                    <select name="status" id="status" style="margin-top: 0.5rem;">
                        <option value="Active">Ongoing</option>
                        <option value="Deactive">Completed</option>
                    </select>
                </div>
                <div>
                    <div style="text-align: center;"> <a href="#"> <button class="btnview" >View More</button> </a></div>
                 </div>
             </div>
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