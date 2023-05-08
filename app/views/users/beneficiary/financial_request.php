<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Financial Donation Request</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" />
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

                <form method="post" action="<?php echo URLROOT; ?>/beneficiary/addFinancialRequest" enctype="multipart/form-data">
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


                                <div class="input-field">
                                    <label>Zip Code</label>
<<<<<<< Updated upstream
                                    <!-- <input type="text" placeholder="Location"> -->
=======
>>>>>>> Stashed changes
                                    <input type="text" placeholder="Enter code" name="zipcode" value="<?php echo $data['zipcode']; ?>">
                                    <span class="error"><?php echo $data['zipcodeErr']; ?></span>
                                </div>

                                <div class="input-field">
                                    <label>Due Date</label>
                                    <input type="date" placeholder="Enter Due Date" name="duedate" value="<?php echo $data['duedate']; ?>">
                                    <span class="error"><?php echo $data['duedateErr']; ?></span>
                                </div>

                                <div class="input-field">
                                <label>Bank Account Number </label>
<<<<<<< Updated upstream
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

                               
                            </div>
                        </div>

                        <span class="title"><u>Identity Proof</u></span>
                                <div class="photo-container" id="grame">
                            <input type="file" id="proof" name="proof" value="<?php echo $data['proof']; ?>">
                            <!-- <div class="img-area" id="area-three" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div> -->
                            <!-- <button class="select-image" id="select_three">Select Image</button> -->
                            <span class="error"><?php echo $data['proofErr']; ?></span>

                        </div>

                        <span class="title"><u>Bank Pass Book</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="passbook" name="passbook" value="<?php echo $data['passbook']; ?>">
                            <!-- <div class="img-area" id="area-three" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div> -->
                            <!-- <button class="select-image" id="select_three">Select Image</button> -->
                            <span class="error"><?php echo $data['passbookErr']; ?></span>

                        </div>

                        <span class="title"><u>Thumbnail</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="file4" name="thumbnail" value="<?php echo $data['thumbnail']; ?>">
                            <!-- <div class="img-area" id="area-three" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div> -->
                            <span class="error"><?php echo $data['thumbnailErr']; ?></span>
                            
                        </div>

=======
                                <input type="text" placeholder="Enter bank account number" name="accnumber" value="<?php echo $data['accnumber']; ?>">
                                <span class="error"><?php echo $data['accnumberErr']; ?></span>
                                 </div>

                                 <div class="input-field">
                                <label>Bank Name </label>
                                <input type="text" placeholder="Enter Bank Name" name="bankname" value="<?php echo $data['bankname']; ?>">
                                <span class="error"><?php echo $data['banknameErr']; ?></span>
                                </div>

                               
                            </div>
                        </div>

                        <span class="title"><u>Proof Document</u></span>
                                <div class="photo-container" id="grame">
                            <input type="file" id="proof" name="proof" value="<?php echo $data['proof']; ?>">
                            <span class="error"><?php echo $data['proofErr']; ?></span>

                        </div>

                        <span class="title"><u>Bank Pass Book</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="passbook" name="passbook" value="<?php echo $data['passbook']; ?>">
                            <span class="error"><?php echo $data['passbookErr']; ?></span>

                        </div>

                        <span class="title"><u>Thumbnail</u></span>
                        <div class="photo-container" id="grame">
                            <input type="file" id="file4" name="thumbnail" value="<?php echo $data['thumbnail']; ?>">
                            <span class="error"><?php echo $data['thumbnailErr']; ?></span>
                            
                        </div>

>>>>>>> Stashed changes

                        </div>
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
  

</body>

</html>