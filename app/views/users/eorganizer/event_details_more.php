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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        .input-field select,
        .input-field input,
        .input-field textarea[type="date"] {
            color: black;
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
                <span class="dashboard">Create Event</span>
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
            <form method="post" action="<?php echo URLROOT; ?>/EOrganizer/Addevent" enctype="multipart/form-data">
                <div class="formfirst">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>Event Title </label>
                                <input disabled type="text" name="title" value="<?php echo $data->event_title; ?>">
                            </div>
                            <div class="input-field">
                                <label>Amount / Quantity </label>
                                <input disabled type="text" name="ammount" value="<?php echo $data->budget; ?>">
                            </div>
                            <div class="input-field" id="description">
                                <label>Description</label>
                                <textarea name="description" rows="4" cols="40" disabled><?php echo $data->description; ?></textarea>
                            </div>
                            <div class="input-field">
                                <label>Location / City </label>
                                <!-- <input disabled type="text" -->
                                <input disabled type="text" name="city" value="<?php echo $data->location; ?>">
                            </div>

                            <div class="input-field">
                                <label>Due Date</label>
                                <!-- <input disabled type="date" placeholder-->
                                <input disabled type="date" name="duedate" value="<?php echo $data->due_date; ?>">
                            </div>

                            <div class="input-field">
                                <label>Account Number </label>
                                <!-- <input disabled type="text" -->
                                <input disabled type="text" name="accountno" value="<?php echo $data->bank_acc_number; ?>">
                            </div>

                            <div class="input-field">
                                <label>Bank Name </label>
                                <!-- <input disabled type="text" -->
                                <input disabled type="text" name="bankname" value="<?php echo $data->bank_name; ?>">
                            </div>
                        </div>
                    </div>


                    <span class="title"><u>Thumbnail & Bank Pass Book</u></span>

                    <div class="ggg">
                        <div class="photo-container">
                            <input disabled type="file" id="file" accept="image/*" name="thumb" hidden>
                            <div class="img-area" data-img="">
                                <img src="<?php echo URLROOT . '/img/uploads/thumb/' . $data->thumbnail ?>" alt="Thumbnail">
                            </div>
                            <button class="select-image">Select Image</button>
                        </div>
                        <div class="photo-container">
                            <input disabled type="file" id="file2" accept="image/*" name="passbook" hidden>
                            <div class="img-area" id="area-two" data-img="">
                                <img src="<?php echo URLROOT . '/img/uploads/passbook/' . $data->bank_pass_book ?>" alt="Bank Pass Book">
                            </div>
                            <button class="select-image" id="select_two">Select Image</button>
                        </div>
                    </div>
                    <span class="title"><u>Recomondation Letter By Organization</u></span>
                    <div class="photo-container" id="grame">

                        <input disabled type="file" id="file3" accept="image/*" name="proof" hidden>
                        <div class="img-area" id="area-three" data-img="">
                            <img src="<?php echo URLROOT . '/img/uploads/proof/' . $data->proof_letter ?>" alt="Proof Letter">
                        </div>
                        <button class="select-image" id="select_three">Select Image</button>
                    </div>
                </div>

                </div>
                <!-- <input disabled type="submit" name="submit" value="Submit" class="btn1 add">  -->
            </form>
        </main>

    </section>
    <!--home section end-->


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");

            sidebarBtn.onclick = function() {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            };
        })
    </script>
</body>

</html>