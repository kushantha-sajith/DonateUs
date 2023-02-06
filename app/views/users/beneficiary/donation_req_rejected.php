<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Donation Requests</title>
    <link rel="stylesheet" href="donation_req.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <!--navigation bar left-->
    <div class="sidebar">
        <div class="logo-details">
            <!-- <i class="bx bx-grid-alt"></i>
      <span class="logo_name">Dashboard</span> -->
            <img src="logo_.png" class="logo">
        </div>
        <div class="welcome">
            <span>Welcome</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="1.html">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="users.html">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="donation_req_ui.html">
                    <i class="bx bx-list-check"></i>
                    <span class="links_name">Donation Requests</span>
                </a>
            </li>
            <li>
                <a href="donation_history.html">
                    <i class="bx bx-history"></i>
                    <span class="links_name">Donation History</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-message-alt-detail"></i>
                    <span class="links_name">Feedbacks</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Donation Categories</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-conversation"></i>
                    <span class="links_name">Forum</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-calendar-check"></i>
                    <span class="links_name">Events</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-pie-chart-alt"></i>
                    <span class="links_name">Stats</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-report"></i>
                    <span class="links_name">Reports</span>
                </a>
            </li>
            <li class="log_out">
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
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
                <a href="profile_update.html"><img src="1.jpeg" alt="" /></a>
                <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <main>
            <div class="select-menu">
            
                <div class="select-btn">
                    <span class="material-icons">
                        error
                        </span>
                    <span class="option-text">Rejected Requests</a></span>
                    <i class="bx bx-chevron-down"></i>
                </div>

                <ul class="options">
                    <a href="donation_req_Ui.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;" >
                                pending_actions
                                </span>
                             
                            <span class="option-text"> Pending Requests</span>
                        </li>
                    </a>
                    <a href="donation_req_rejected.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                error
                                </span>
                            <span class="option-text">Rejected Requests</span>
                        </li>
                    </a>
                    <a href="donation_req_ongoing.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                receipt_long
                                </span>
                            <span class="option-text">Ongoing Requests</span>
                        </li>
                    </a>
                    <a href="donation_req_completed.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                assignment_turned_in
                                </span>
                            <span class="option-text">Completed Requests</span>
                        </li>
                    </a>

                    

                </ul>
            </div>
            


            <div class="cards_heading head">
                <div>ID</div>
                <div>Beneficiary Name</div>
                <div>Beneficiary Type</div>
                <div>Contact Number</div>
                <div>Donation Type</div>
                <div>Amount / Quentity</div>
                <div></div>
            </div>
            <div class="cards_heading cards_color">
                <div>001</div>
                <div>Kushantha Lakshan</div>
                <div>Individual</div>
                <div>0767128051</div>
                <div>Money</div>
                <div>100,000</div>
                <div>
                   <center> <a href="donation_req.html"> <button class="btnview" >View More</button> </a></center>
                </div>
             </div>
             <div class="cards_heading cards_color">
                <div>001</div>
                <div>Kushantha Lakshan</div>
                <div>Individual</div>
                <div>0767128051</div>
                <div>Money</div>
                <div>100,000</div>
                <div>
                   <center> <a href="donation_req.html"> <button class="btnview" >View More</button> </a></center>
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