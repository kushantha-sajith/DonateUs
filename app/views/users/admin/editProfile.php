<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/editProfile.css" />
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
            <span class="dashboard">User Profile</span>
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
            <div class="container">
                <header>Profile Update</header>

                <form action="#">
                    <div class="formfirst">
                        <div class="details personal">
                            <span class="title"><u>Personal Details</u></span>
                            <div class="fields">
                                <div class="input-field">
                                    <label>First Name</label>
                                    <input type="text" placeholder="Enter your first name">
                                </div>
                                <div class="input-field">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Enter your first name">
                                </div>

                                <div class="input-field">
                                    <label>Date of Birth</label>
                                    <input type="date" placeholder="Enter birth date">
                                </div>
                                <div class="input-field">
                                    <label>Mobile Number</label>
                                    <input type="number" placeholder="Enter mobile number">
                                </div>
                                <div class="input-field">
                                    <label>City</label>
                                    <input type="text" placeholder="Enter mobile number">
                                </div>
                                <div class="input-field">
                                    <label>District</label>
                                    <input type="number" placeholder="Enter mobile number">
                                </div>
                            </div>
                        </div>

                        <span class="title"><u>Change Profile Picture</u></span>
                        <div class="photo-container">
                            <input type="file" id="file" accept="image/*" hidden>
                            <div class="img-area" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                            </div>
                            <button class="select-image">Select Image</button>
                        </div>

                        <!-- <span class="title"><u> Change Password</u></span>
                        <div class="fields">
                            <div class="input-field">
                                <label>Old Password</label>
                                <input type="text" placeholder="Enter Your Previous Password">
                            </div>
                            <div class="input-field">
                                <label>New Password</label>
                                <input type="text" placeholder="Enter Your New Password">
                            </div>
                            <div class="input-field">
                                <label>Conform New Password</label>
                                <input type="text" placeholder="Conform Your New Password">
                            </div>

                        </div> -->


                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>


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
    </script>

</body>

</html>