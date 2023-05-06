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
            <span class="dashboard">Users Details</span>
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
            <header>User Details</header>
            <?php foreach ($data['userData'] as $userData): ?>
                <form action="#">
                    <div class="formfirst">
                        <div class="details personal">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Full Name </label>
                                    <input type="text" value="<?php echo $userData->full_name; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>Community Name</label>
                                    <input type="text" value="<?php echo $userData->community_name; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>Designation</label>
                                    <input type="text" value="<?php echo $userData->designation; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>Email</label>
                                    <input type="email" value="<?php echo $userData->email; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>National ID Number</label>
                                    <input type="text" value="<?php echo $userData->NIC; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>Contact Number</label>
                                    <input type="number" value="<?php echo $userData->tp_number; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>Zip Code</label>
                                    <input type="text" value="<?php echo $userData->zipcode; ?>" disabled>
                                </div>
                                <div class="input-field">
                                    <label>District </label>
                                    <input type="text" value="<?php echo $userData->dist_name; ?>" disabled>
                                </div>
                                <!---->
                                <!--                                <div class="input-field" id="address">-->
                                <!--                                    <label>Address </label>-->
                                <!--                                    <input type="text" value="-->
                                <?php //echo $userData->f_name;?><!--" disabled>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                        <span class="title"><u>Verification Letter</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="file3" accept="image/*" hidden>
                            <img alt="id-img"
                                 src="<?php echo URLROOT; ?>/public/uploads/<?php echo $userData->address_proof; ?>">
                            <div class="img-area" id="area-three" data-img="">
                            </div>
                        </div>
                        <div class="flex">
                            <button type="button" id="accept"
                                    onclick="document.getElementById('confirm-modal').style.display='block'"
                                    class="abc">Accept
                            </button>
                            <div id="confirm-modal" class="modal">
                                <div class="modal-content">
                                    <h2>Are you sure?</h2>
                                    <div class="button-container">
                                        <button id="confirm-yes" type="button"
                                                onclick="location.href='<?php echo URLROOT; ?>/adminPages/acceptOrganizers/<?php echo $userData->id; ?>'">
                                            Yes
                                        </button>
                                        <button id="confirm-no" type="button"
                                                onclick="document.getElementById('confirm-modal').style.display='none'">
                                            No
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                    onclick="location.href='<?php echo URLROOT; ?>/adminPages/rejectOrgUserNote/<?php echo $userData->id; ?>'"
                                    class="abc">Reject
                            </button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
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
    
    const selectImage3 = document.querySelector('#select_three');
    const inputFile3 = document.querySelector('#file3');
    const imgArea3 = document.querySelector('#area-three');

    selectImage3.addEventListener('click', function () {
        inputFile3.click();
    })

    inputFile3.addEventListener('change', function () {
        const image3 = this.files[0]
        if (image3.size < 2000000) {
            const reader3 = new FileReader();
            reader3.onload = () => {
                const allImg3 = imgArea3.querySelectorAll('img');
                allImg3.forEach(item => item.remove());
                const imgUrl3 = reader3.result;
                const img3 = document.createElement('img');
                img3.src = imgUrl3;
                imgArea3.appendChild(img3);
                imgArea3.classList.add('active');
                imgArea3.dataset.img3 = image3.name;
            }
            reader3.readAsDataURL(image3);
        } else {
            alert("Image size more than 2MB");
        }
    })

</script>

</body>

</html>