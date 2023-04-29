<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
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
            <span class="dashboard">Dashboard</span>
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
    <div class="main-container">
        <!--        edit modal-->
        <div id="modal1" class="modal" style="display: block">
            <div class="modal-content">
                <span class="close"><a href="<?php echo URLROOT; ?>/admin/categories">&times;</a></span>
                <form action="<?php echo URLROOT; ?>/admin/editCategories/<?php echo $data['id']; ?>" method="POST">
                    <div class="div form-group">
                        <h2><label for="category_name">Category Name</label></h2>
                        <input id="catName1" type="text" name="category_name" class="input"
                               placeholder="Edit Category Name" value="<?php echo $data['category_name']; ?>">
                    </div>
                    <div class="error">
                        <span><?php echo $data['category_name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn">
                    </div>
                </form>
            </div>
        </div>
</section>
<!--home section end-->

<script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
</body>
</html>