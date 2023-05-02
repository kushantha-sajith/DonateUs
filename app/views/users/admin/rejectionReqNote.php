<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/userDetails.css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
            <span class="dashboard">Rejection Note</span>
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
        <div class="container">
            <div id="reject-modal" class="modal" style="display: block">
                <div class="modal-content">
                    <form action="<?php echo URLROOT; ?>/adminPages/rejectRequest/<?php echo $data['id']; ?>"
                          method="POST">
                        <h2>Rejection Note</h2>
                        <label for="note">Note :</label>
                        <textarea id="note" name="note" type="text"></textarea>
                        <div class="error">
                            <span><?php echo $data['note_err']; ?></span>
                        </div>
                        <div class="button-container">
                            <button id="confirm-yes" type="submit">Submit</button>
                            <button id="confirm-no" type="button"
                                    onclick="location.href='<?php echo URLROOT; ?>/pages/pendingRequestDetails/<?php echo $data['id'] ?>'">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
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
</script>

</body>

</html>