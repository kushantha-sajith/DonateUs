<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_details.css"/>
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
            <span class="dashboard">Donation Request Details</span>
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
            <header>Donation Request</header>
            <form action="">
                <?php foreach ($data['reqData'] as $reqData): ?>
                <div class="formfirst">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field" id="description">
                                <label>Request Title </label>
                                <input type="text" disabled placeholder="<?php echo $reqData->request_title; ?>">
                            </div>
                            <div class="input-field">
                                <label><?php echo $data['user']; ?></label>
                                <input type="text" disabled placeholder="<?php echo $reqData->ben_id; ?>">
                            </div>
                            <div class="input-field">
                                <label><?php echo $data['ID']; ?></label>
                                <input type="text" disabled placeholder="<?php echo $reqData->nic; ?>">
                            </div>
                            <div class="input-field">
                                <label>Item</label>
                                <input type="text" disabled placeholder="<?php echo $reqData->item; ?>">
                            </div>
                            <div class="input-field">
                                <label><?php echo $data['amount']; ?></label>
                                <input type="text" disabled placeholder="<?php echo $reqData->amount; ?>">
                            </div>
                            <div class="input-field">
                                <label><?php echo $data['recAmount']; ?></label>
                                <input type="text" disabled placeholder="<?php echo $reqData->rec_amount; ?>">
                            </div>
                            <div class="input-field">
                                <label>Completed Date</label>
                                <input type="" disabled placeholder="<?php echo $reqData->completed_date; ?>">
                            </div>
                            <div class="input-field" id="description">
                                <label>Description</label>
                                <textarea disabled placeholder="<?php echo $reqData->description; ?>"></textarea>
                            </div>
                            <div class="input-field">
                                <label>Email</label>
                                <input type="text" disabled placeholder="<?php echo $reqData->email; ?>">
                            </div>
                            <div class="input-field">
                                <label>Contact Number</label>
                                <input type="number" disabled placeholder="<?php echo $reqData->tp_number; ?>">
                            </div>
                            <div class="input-field">
                                <label>Donation Type </label>
                                <input type="text" disabled placeholder="<?php echo $reqData->req_type; ?>">
                            </div>
                            <div class="input-field">
                                <label>Category</label>
                                <input type="text" disabled placeholder="<?php echo $reqData->category_name; ?>">
                            </div>
                            <div class="input-field">
                                <label>Zip Code </label>
                                <input type="text" disabled placeholder="<?php echo $reqData->zipcode; ?>">
                            </div>
                            <div class="input-field">
                                <label>District</label>
                                <input type="text" disabled placeholder="<?php echo $reqData->district; ?>">
                            </div>
                        </div>
                    </div>
                    <span class="title"><u>Thumbnail</u></span>
                    <div class="ggg">
                        <div class="photo-container">
                            <div class="img-area" id="area-two" data-img="">
                                <img src="<?php echo URLROOT; ?>/public/uploads/<?php echo $reqData->thumbnail; ?>">
                            </div>
                        </div>
                    </div>
                    <span class="title"><u>Proof Letter(#)</u></span>
                    <div class="photo-container" id="grame">
                        <input type="file" id="file3" accept="image/*" hidden>
                        <div class="img-area" id="area-three" data-img="">
                            <img src="<?php echo URLROOT; ?>/public/uploads/<?php echo $reqData->proof_document; ?>">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </form>
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

    const selectImage = document.querySelector('.select-image');
    const inputFile = document.querySelector('#file');
    const imgArea = document.querySelector('.img-area');

    selectImage.addEventListener('click', function () {
        inputFile.click();
    })

    inputFile.addEventListener('change', function () {
        const image = this.files[0]
        if (image.size < 2000000) {
            const reader = new FileReader();
            reader.onload = () => {
                const allImg = imgArea.querySelectorAll('img');
                allImg.forEach(item => item.remove());
                const imgUrl = reader.result;
                const img = document.createElement('img');
                img.src = imgUrl;
                imgArea.appendChild(img);
                imgArea.classList.add('active');
                imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
        } else {
            alert("Image size more than 2MB");
        }
    })

    const selectImage2 = document.querySelector('#select_two');
    const inputFile2 = document.querySelector('#file2');
    const imgArea2 = document.querySelector('#area-two');

    selectImage2.addEventListener('click', function () {
        inputFile2.click();
    })

    inputFile2.addEventListener('change', function () {
        const image2 = this.files[0]
        if (image2.size < 2000000) {
            const reader2 = new FileReader();
            reader2.onload = () => {
                const allImg2 = imgArea2.querySelectorAll('img');
                allImg2.forEach(item => item.remove());
                const imgUrl2 = reader2.result;
                const img2 = document.createElement('img');
                img2.src = imgUrl2;
                imgArea2.appendChild(img2);
                imgArea2.classList.add('active');
                imgArea2.dataset.img2 = image2.name;
            }
            reader2.readAsDataURL(image2);
        } else {
            alert("Image size more than 2MB");
        }
    })
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