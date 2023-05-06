<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
<!--navigation bar left-->
<?php require APPROOT . '/views/inc/side_navbar.php'; ?>
<!--navigation bar left end-->

<!--home section start-->
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class="bx bx-menu sidebarBtn"></i>
            <span class="dashboard">Users</span>
        </div>

        <div class="profile-details">
            <div class="notification">
                <i class="bx bx-bell bx-tada notification"></i>
            </div>
            <img src="<?php echo URLROOT; ?>/img/profile_pic.svg" alt=""/>
            <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
            <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
    </nav>
    <main>
        <div class="select-menu">
            <div class="select-btn">
            <span
                class="material-icons"
                style="color: #111e88; margin-right: 1rem"
            >
              perm_identity
            </span>
                <span class="option-text">Beneficiaries</span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
                <a href="<?php echo URLROOT; ?>/adminPages/donors" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                                volunteer_activism
                            </span>
                        <span class="option-text">Donors</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT; ?>/adminPages/beneficiaries" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                                perm_identity
                            </span>
                        <span class="option-text">Beneficiaries</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT; ?>/adminPages/organizers" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                                emoji_events
                            </span>
                        <span class="option-text">Event Organizers</span>
                    </li>
                </a>
            </ul>
        </div>

        <div class="cards_heading head">
            <div>ID</div>
            <div>Full Name / Organization Name</div>
            <div>Email Address</div>
            <div>Status</div>
            <div>Beneficiary Type</div>
            <div>Zip Code</div>
            <div></div>
        </div>
        <?php foreach ($data['indBeneficiaries'] as $indBeneficiaries) : ?>
            <div class="cards_heading cards_color">
                <div><?php echo $indBeneficiaries->id; ?></div>
                <div><?php echo $indBeneficiaries->f_name; ?></div>
                <div><?php echo $indBeneficiaries->email; ?></div>
                <div>
                    <select name="status" class="status" data-id="<?php echo $indBeneficiaries->id; ?>">
                        <option value=1 <?php if ($indBeneficiaries->acc_status == 1) echo "selected" ?>>Active</option>
                        <option value=0 <?php if ($indBeneficiaries->acc_status == 0) echo "selected" ?>>Deactive
                        </option>
                    </select>
                </div>
                <div>Individual</div>
                <div><?php echo $indBeneficiaries->zipcode; ?></div>
                <div>
                    <div style="text-align: center;"><a
                            href="<?php echo URLROOT; ?>/pages/userDetails/<?php echo $indBeneficiaries->id; ?>">
                            <button class="btnview">View More</button>
                        </a></div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($data['corpBeneficiaries'] as $corpBeneficiaries) : ?>
            <div class="cards_heading cards_color">
                <div><?php echo $corpBeneficiaries->id; ?></div>
                <div><?php echo $corpBeneficiaries->org_name; ?></div>
                <div><?php echo $corpBeneficiaries->email; ?></div>
                <div>
                    <select name="status" class="status" data-id="<?php echo $corpBeneficiaries->id; ?>">
                        <option value=1 <?php if ($corpBeneficiaries->acc_status == 1) echo "selected" ?>>Active
                        </option>
                        <option value=0 <?php if ($corpBeneficiaries->acc_status == 0) echo "selected" ?>>Deactive
                        </option>
                    </select>
                </div>
                <div>Organizational</div>
                <div><?php echo $corpBeneficiaries->zipcode; ?></div>
                <div>
                    <div style="text-align: center;"><a
                            href="<?php echo URLROOT; ?>/pages/userDetails/<?php echo $corpBeneficiaries->id; ?>">
                            <button class="btnview">View More</button>
                        </a></div>
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

    selectBtn.addEventListener("click", () =>
        optionMenu.classList.toggle("active")
    );

    options.forEach((option) => {
        option.addEventListener("click", () => {
            let selectedOption = option.querySelector(".option-text").innerText;
            sBtn_text.innerText = selectedOption;

            optionMenu.classList.remove("active");
        });
    });

    const statuses = document.querySelectorAll('.status');

    statuses.forEach(function (status) {
        status.addEventListener('change', function () {
            const userId = status.getAttribute("data-id");
            sendSelectedOption(status.value, userId);
        });
    });

    function sendSelectedOption(status, id) {
        console.log(id);
        console.log(status);
        const url = `http://localhost/DonateUs/adminPages/updateAccStatus/${id}`;
        const data = {
            status: status
        };

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            responseType: "JSON",
            success: function (data) {
                console.log(data);
            },
            error: function (err) {
                console.log(err);
            }
        });

    }
</script>
</body>
</html>
