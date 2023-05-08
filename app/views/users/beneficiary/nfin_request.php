<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Non Financial Donation Request</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" />
<<<<<<< Updated upstream
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" /> -->
=======
>>>>>>> Stashed changes
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
               
            </div>
        </nav>

        <main>
            <div class="container">
                <header>Donation Request</header>
            <?php  foreach($data['nfinancials'] as $nfinancials ):  ?>

                <form method="post" action="<?php echo URLROOT; ?>/beneficiary/updateNonFinancialRequest/<?php echo $nfinancials->id;  ?>" enctype="multipart/form-data">
                    <div class="formfirst">
                        <div class="details personal">
                            <div class="fields">

                                <div class="input-field">
                                    <label>Request Title </label>
                                    
                                    <input type="text" placeholder="Enter Request Title" name="title" value="<?php echo $nfinancials->request_title; ?>">
<<<<<<< Updated upstream
                                    <!-- <span class="error"><?php echo $data['titleErr']; ?></span> -->
=======
>>>>>>> Stashed changes

                                </div>
                                <div class="input-field">
                                    <label>Beneficiary Name</label>
                                    
                                    <input type="text" placeholder="Enter Beneficiary Name" name="name" value="<?php echo $nfinancials->name; ?>">
<<<<<<< Updated upstream
                                    <!-- <span class="error"><?php echo $data['nameErr']; ?></span> -->
=======
>>>>>>> Stashed changes

                                </div>

                                <div class="input-field">
                                    <label>National ID Number</label>
                            
                                    <input type="text" placeholder="Enter NIC" name="NIC" value="<?php echo $nfinancials->NIC; ?>">
<<<<<<< Updated upstream
                                    <!-- <span class="error"><?php echo $data['NICErr']; ?></span> -->
=======
>>>>>>> Stashed changes

                                </div>


                                <div class="input-field">
                                    <label>Quantity </label>
                                    
                                    <input type="text" placeholder="Enter Quantity" name="quantity" value="<?php echo $nfinancials->quantity; ?>">
<<<<<<< Updated upstream
                                    <!-- <span class="error"><?php echo $data['quantityErr']; ?></span> -->
=======
>>>>>>> Stashed changes

                                </div>



                                <div class="input-field" id="description">
                                    <label>Description</label>
                                    <textarea placeholder="Enter Description" name="description" rows="4" cols="40"><?php echo $nfinancials->description; ?></textarea>
<<<<<<< Updated upstream
                                    <!-- <span class="error"> <?php echo $data['descriptionErr']; ?></span> -->
=======
>>>>>>> Stashed changes

                                </div>

                                <div class="input-field">
                                    <label>Contact Number</label>
                                    
                                    <input type="text" placeholder="Enter Contact Number" name="contact" value="<?php echo $nfinancials->contact; ?>">
<<<<<<< Updated upstream
                                    <!-- <span class="error"><?php echo $data['contactErr']; ?></span> -->
=======
>>>>>>> Stashed changes

                                </div>

                                <div class="input-field">
                                    <label>Item</label>
                                    
                                    <input type="text" name="item" value="<?php echo $nfinancials->item; ?>" >
                                    
                                </div>

<<<<<<< Updated upstream
                                <div class="input-field"> 
=======
                                <!-- <div class="input-field">
                                    <label>Category Name</label>
                                    <input type="text" placeholder="" value="<?php echo $data['category_name']; ?>" disabled>
                                </div>
                              </div> -->

                                <!-- <div class="input-field"> 
>>>>>>> Stashed changes
                             <label>Donation Category</label>
                                <select class="dropdown" name="cat_id" id="cat_id">
                            <?php foreach($data['categories'] as $categories) : ?>
                                <option value="<?php echo $categories->id; ?>"><?php echo $categories->category_name	; ?></option>
                            <?php endforeach; ?>
<<<<<<< Updated upstream
                            </select>
                            <!-- <span class="error"><?php echo $data['cat_idErr']; ?></span> -->

                                <div class="input-field">
                                    <label>Zipcode </label>
                                    <!-- <input type="text" placeholder="Location"> -->
                                    <input type="text" placeholder="Enter zipcode" name="zipcode" value="<?php echo $nfinancials->zipcode; ?>">
                                    <!-- <span class="error"><?php echo $data['zipcodeErr']; ?></span> -->
=======
                            </select> -->

                                <div class="input-field">
                                    <label>Zipcode </label>
                                    <input type="text" placeholder="Enter zipcode" name="zipcode" value="<?php echo $nfinancials->zipcode; ?>">
>>>>>>> Stashed changes

                                </div>

                                <div class="input-field">
                                    <label>Due Date</label>
<<<<<<< Updated upstream
                                    <!-- <input type="date" placeholder="Due Date"> -->
                                    <input type="date" placeholder="Enter Due Date" name="duedate" value="<?php echo $nfinancials->due_date; ?>">
                                    <!-- <span class="error"><?php echo $data['duedateErr']; ?></span> -->
=======
                                    <input type="date" placeholder="Enter Due Date" name="duedate" value="<?php echo $nfinancials->due_date; ?>">
>>>>>>> Stashed changes

                                </div>
                                <div>
                                <span class="title"><u>Thumbnail</u></span>
                            <div class="photo-container" id="grame">
                            <input type="file" id="thumbnail" name="thumbnail" value="<?php echo $nfinancials->thumbnail; ?>">
                           
                             </div>
                             </div>
                             <div>

                             <span class="title"><u>Proof Document</u></span>
                             <div class="photo-container" id="grame">
                            <input type="file" id="passbook" name="proof" value="<?php echo $nfinancials->proof_document; ?>">
                           
                        </div>
                        </div>


                            </div>
                        </div>

<<<<<<< Updated upstream
                        <!-- <span class="title"><u>Recomondation Letter By Grama Niladari</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="proof_document" name="proof_document" value="<?php echo $nfinancials->proof_document; ?>"> -->
                             <!-- <div class="img-area" id="area-three" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div> -->
                            <!-- <span class="error"><?php echo $data['proofErr']; ?></span> -->

                         <!-- </div> -->

                        <!-- <span class="title"><u>Thumbnail</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="thumbnail" name="thumbnail" value="<?php echo $nfinancials->thumbnail; ?>">  -->
                             <!-- <div class="img-area" id="area-three" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div>  -->
                            <!-- <span class="error"><?php echo $data['thumbnailErr']; ?></span> -->

                        <!-- </div>  -->
=======
>>>>>>> Stashed changes

                        </div>
                       <?php endforeach; ?>

                        <div>
                          <input type="submit" value="submit" class="btn add">
                          </a>
                        </div>

                    </div>
                     

                </form>
            </div>



        </main>

    </section>
    <!--home section end-->
<<<<<<< Updated upstream
    <!-- <script>
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
        
    </script> -->

=======
 
>>>>>>> Stashed changes
</body>

</html>