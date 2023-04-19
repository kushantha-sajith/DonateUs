<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Donation Requests></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" /> -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>

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
                <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
                <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <main>
            <div class="container">
                <header>Donation Request</header>

                <form method="post" action="<?php echo URLROOT; ?>/beneficiary/addFinancialRequest">
                    <div class="formfirst">
                        <div class="details personal">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Request Title </label>
                                    
                                    <input type="text" placeholder="Enter Request Title" name="title" value="<?php echo $data['title']; ?>">
                                    <span class="error"><?php echo $data['titleErr']; ?></span>
                                </div>
                                <div class="input-field">
                                    <label>Beneficiary Name</label>
                                    
                                    <input type="text" placeholder="Enter Beneficiary Name" name="name" value="<?php echo $data['name']; ?>">
                                    <span class="error"><?php echo $data['nameErr']; ?></span>
                                </div>

                                <div class="input-field">
                                    <label>National ID Number</label>
                            
                                    <input type="text" placeholder="Enter NIC" name="NIC" value="<?php echo $data['NIC']; ?>">
                                    <span class="error"><?php echo $data['NICErr']; ?></span>
                                </div>


                                <div class="input-field">
                                    <label>Amount </label>
                                    
                                    <input type="text" placeholder="Enter Amount" name="amount" value="<?php echo $data['amount']; ?>">
                                    <span class="error"><?php echo $data['amountErr']; ?></span>
                                </div>



                                <div class="input-field" id="description">
                                    <label>Description</label>
                                    <textarea placeholder="Enter Description" name="description" rows="4" cols="40"><?php echo $data['description']; ?></textarea>
                                    <span class="error"> <?php echo $data['descriptionErr']; ?></span>
                                </div>

                                <div class="input-field">
                                    <label>Contact Number</label>
                                    
                                    <input type="text" placeholder="Enter Contact Number" name="contact" value="<?php echo $data['contact']; ?>">
                                    <span class="error"><?php echo $data['contactErr']; ?></span>
                                </div>

                                <!-- <div class="input-field">
                                    <label>Donation Type </label>
                                    <select>
                                        <option disabled selected>Select Donation Type</option>
                                        <option>Financial</option>
                                        <option>Foods</option>
                                        <option>Stationaries</option>
                                    </select>
                                </div> -->

                                <div class="input-field">
                                    <label>Location / City </label>
                                    <!-- <input type="text" placeholder="Location"> -->
                                    <input type="text" placeholder="Enter city" name="city" value="<?php echo $data['city']; ?>">
                                    <span class="error"><?php echo $data['cityErr']; ?></span>
                                </div>

                                <div class="input-field">
                                    <label>Due Date</label>
                                    <!-- <input type="date" placeholder="Due Date"> -->
                                    <input type="date" placeholder="Enter Due Date" name="duedate" value="<?php echo $data['duedate']; ?>">
                                    <span class="error"><?php echo $data['duedateErr']; ?></span>
                                </div>


                            </div>
                        </div>

<!-- 
                        <span class="title"><u>Id Verification</u></span>

                        <div class="ggg">
                            <div class="photo-container">
                                <input type="file" id="file" accept="image/*" hidden name="img1" value="<?php echo $data['img1']; ?>">
                                <div class="img-area" data-img="">
                                    <i class='bx bxs-cloud-upload icon'></i>
                                    <h3>Upload Image</h3>
                                    <p>Image size must be less than <span>2MB</span></p>
                                </div>
                                <button class="select-image">Select Image</button>
                            </div>
                            <div class="photo-container">
                                <input type="file" id="file2" accept="image/*" hidden name="img2" value="<?php echo $data['img2']; ?>">
                                <div class="img-area" id="area-two" data-img="">
                                    <i class='bx bxs-cloud-upload icon'></i>
                                    <h3>Upload Image</h3>
                                    <p>Image size must be less than <span>2MB</span></p>
                                </div>
                                <button class="select-image" id="select_two">Select Image</button>
                            </div>
                        </div> -->
                        <span class="title"><u>Recomondation Letter By Grama Niladari</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="file3" accept="image/*" hidden name="proof" value="<?php echo $data['proof']; ?>">
                            <div class="img-area" id="area-three" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div>
                            <!-- <button class="select-image" id="select_three">Select Image</button> -->
                        </div>

                        <span class="title"><u>Bank Pass Book</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="file3" accept="image/*" hidden name="passbook" value="<?php echo $data['passbook']; ?>">
                            <div class="img-area" id="area-three" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div>
                            <!-- <button class="select-image" id="select_three">Select Image</button> -->
                        </div>

                        <div class="input-field">
                                <label>Bank Account Number </label>
                                <!-- <input type="text" placeholder="Location"> -->
                                <input type="text" placeholder="Enter bank account number" name="accnumber" value="<?php echo $data['accnumber']; ?>">
                                <span class="error"><?php echo $data['accnumberErr']; ?></span>
                        </div>

                        <div class="input-field">
                                <label>Bank Name </label>
                                <!-- <input type="text" placeholder="Location"> -->
                                <input type="text" placeholder="Enter Bank Name" name="bankname" value="<?php echo $data['bankname']; ?>">
                                <span class="error"><?php echo $data['banknameErr']; ?></span>
                        </div>

                        <!-- <div class="flex">
                            <button class="abc">Accept</button>
                        <button class="abc">Reject</button> -->

                        </div>
                        <div>
                          <!-- <a href="<?php echo URLROOT; ?>/beneficiary/addRequest">  -->
                          <input type="submit" value="submit" class="btn add">
                          </a>
                        </div>

                    </div>
                     <!-- <input type="submit" name="submit" value="Submit" class="btn1 add">  -->
                     

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