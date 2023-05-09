<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="<?php echo URLROOT; ?>/js/updateForm.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        .input-field select,
        .input-field input,
        .input-field textarea[type="date"] {
            color: black;
        }

        .error{
            color:red;
        }
    </style>
</head>

<body>
    <?php require APPROOT . '/views/inc/side_navbar_eorganizer.php'; ?>

    <!--home section start-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Event Details</span>
            </div>

            <div class="profile-details">
                <div class="notification">
                    <i class="bx bx-bell bx-tada notification"></i>
                </div>
                <a href="<?php echo URLROOT; ?>/pages/profileOrganizer"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
                <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <main>
            <div class="container">
                <header>Event Details</header>
                <form method="post" action="<?php echo URLROOT; ?>/EOrganizer/updateEvent/<?php echo $data['eventID']?>" enctype="multipart/form-data">
                    <div class="formfirst">
                        <div class="details personal">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Event Title </label>
                                    <input disabled type="text" name="title" value="<?php echo $data['eventDetails']->event_title; ?>">
                                    <span class="error"><?php echo $data['titleErr']; ?></span>
                                </div>
                                <div class="input-field">
                                    <label>Amount / Quantity </label>
                                    <input disabled type="text" name="ammount" value="<?php echo $data['eventDetails']->budget; ?>">
                                    <span class="error"><?php echo $data['amountErr']; ?></span>
                                </div>
                                <div class="input-field" id="description">
                                    <label>Description</label>
                                    <textarea name="description" rows="4" cols="40" disabled><?php echo $data['eventDetails']->description; ?></textarea>
                                    <span class="error"><?php echo $data['descriptionErr']; ?></span>
                                </div>
                                <div class="input-field">
                                    <label>Location / City </label>
                                    <!-- <input disabled type="text" -->
                                    <input disabled type="text" name="city" value="<?php echo $data['eventDetails']->location; ?>">
                                    <span class="error"><?php echo $data['cityErr']; ?></span>
                                </div>

                                <div class="input-field">
                                    <label>Due Date</label>
                                    <!-- <input disabled type="date" placeholder-->
                                    <input disabled type="date" name="duedate" value="<?php echo $data['eventDetails']->due_date; ?>">
                                    <span class="error"><?php echo $data['duedateErr']; ?></span>
                                </div>

                                <div class="input-field">
                                    <label>Account Number </label>
                                    <!-- <input disabled type="text" -->
                                    <input disabled type="text" name="accountno" value="<?php echo $data['eventDetails']->bank_acc_number; ?>">
                                    <span class="error"><?php echo $data['accnumberErr']; ?></span>
                                </div>

                                <div class="input-field">
                                    <label>Bank Name </label>
                                    <!-- <input disabled type="text" -->
                                    <input disabled type="text" name="bankname" value="<?php echo $data['eventDetails']->bank_name; ?>">
                                    <span class="error"><?php echo $data['banknameErr']; ?></span>
                                </div>
                            </div>
                        </div>


                        <span class="title"><u>Thumbnail & Bank Pass Book</u></span>

                        <div class="ggg">
                            <div class="photo-container">
                                <input disabled type="file" id="file" accept="image/*" name="thumb" hidden>
                                <div class="img-area" data-img="">
                                    <img src="<?php echo URLROOT . '/img/uploads/thumb/' . $data['eventDetails']->thumbnail ?>" alt="Thumbnail">
                                </div>
                                <button class="select-image" style="display: none;">Select Image</button>
                            </div>
                            <div class="photo-container">
                                <input disabled type="file" id="file2" accept="image/*" name="passbook" hidden>
                                <div class="img-area" id="area-two" data-img="">
                                    <img src="<?php echo URLROOT . '/img/uploads/passbook/' . $data['eventDetails']->bank_pass_book ?>" alt="Bank Pass Book">
                                </div>
                                <button class="select-image" id="select_two" style="display: none;">Select Image</button>
                            </div>
                        </div>
                        <span class="title"><u>Recomondation Letter By Organization</u></span>
                        <div class="photo-container" id="grame">

                            <input disabled type="file" id="file3" accept="image/*" name="proof" hidden>
                            <div class="img-area" id="area-three" data-img="">
                                <img src="<?php echo URLROOT . '/img/uploads/proof/' . $data['eventDetails']->proof_letter ?>" alt="Proof Letter">
                            </div>
                            <button class="select-image" id="select_three" style="display: none;">Select Image</button>
                        </div>
                        <?php if ($data['statusNumber'] == 0) : ?>
                            <div>
                                <input type="submit" name="edit" value="Edit Details" class="btn add" id="editBtn">
                            </div>
                        <?php endif; ?>
                    </div>

            </div>
            </form>
            </div>
        </main>

    </section>
    <!--home section end-->
    <script>
        //Image select button handling
        const selectImageBtns = document.querySelectorAll('.select-image');
        //Listen for click event on all select image buttons
        selectImageBtns.forEach(selectImageBtn => {
            const photoContainer = selectImageBtn.parentElement;
            const inputFile = photoContainer.querySelector('input[type="file"]'); //Select the input element for that specific photo container
            const imgArea = photoContainer.querySelector('.img-area'); //Select the img area for that specific photo container
            selectImageBtn.addEventListener('click', function(e) {
                e.preventDefault();
                inputFile.click();
            })
            inputFile.addEventListener('change', function() {
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
        })
        document.addEventListener('DOMContentLoaded', ()=>{
            let updateClicked = <?php echo json_encode($data['update']);?>;
            if(updateClicked){
                document.querySelector('#editBtn').click();
            }
        })
    </script>
</body>

</html>