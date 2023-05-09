<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Non Financial Donation Request</title>
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
            <?php  foreach($data['nfinancials'] as $nfinancials ):  ?>

                <form method="post" action="<?php echo URLROOT; ?>/beneficiary/updateNonFinancialRequest/<?php echo $nfinancials->id;  ?>" enctype="multipart/form-data">
                    <div class="formfirst">
                        <div class="details personal">
                            <div class="fields">

                                <div class="input-field">
                                    <label>Request Title </label>
                                    
                                    <input type="text" placeholder="Enter Request Title" name="title" value="<?php echo $nfinancials->request_title; ?>">

                                </div>
                                <div class="input-field">
                                    <label>Beneficiary Name</label>
                                    
                                    <input type="text" placeholder="Enter Beneficiary Name" name="name" value="<?php echo $nfinancials->name; ?>">

                                </div>

                                <div class="input-field">
                                    <label>National ID Number</label>
                            
                                    <input type="text" placeholder="Enter NIC" name="NIC" value="<?php echo $nfinancials->NIC; ?>">

                                </div>


                                <div class="input-field">
                                    <label>Quantity </label>
                                    
                                    <input type="text" placeholder="Enter Quantity" name="quantity" value="<?php echo $nfinancials->quantity; ?>">

                                </div>



                                <div class="input-field" id="description">
                                    <label>Description</label>
                                    <textarea placeholder="Enter Description" name="description" rows="4" cols="40"><?php echo $nfinancials->description; ?></textarea>

                                </div>

                                <div class="input-field">
                                    <label>Contact Number</label>
                                    
                                    <input type="text" placeholder="Enter Contact Number" name="contact" value="<?php echo $nfinancials->contact; ?>">

                                </div>

                                <div class="input-field">
                                    <label>Item</label>
                                    
                                    <input type="text" name="item" value="<?php echo $nfinancials->item; ?>" >
                                    
                                </div>

                                <!-- <div class="input-field">
                                    <label>Category Name</label>
                                    <input type="text" placeholder="" value="<?php echo $data['category_name']; ?>" disabled>
                                </div>
                              </div> -->

                                <!-- <div class="input-field"> 
                             <label>Donation Category</label>
                                <select class="dropdown" name="cat_id" id="cat_id">
                            <?php foreach($data['categories'] as $categories) : ?>
                                <option value="<?php echo $categories->id; ?>"><?php echo $categories->category_name	; ?></option>
                            <?php endforeach; ?>
                            </select> -->

                                <div class="input-field">
                                    <label>Zipcode </label>
                                    <input type="text" placeholder="Enter zipcode" name="zipcode" value="<?php echo $nfinancials->zipcode; ?>">

                                </div>

                                <div class="input-field">
                                    <label>Due Date</label>
                                    <input type="date" placeholder="Enter Due Date" name="duedate" value="<?php echo $nfinancials->due_date; ?>">

                                </div>
                                <!-- <div>
                                <span class="title"><u>Thumbnail</u></span>
                            <div class="photo-container" id="grame">
                            <input type="file" id="thumbnail" name="thumbnail" value="<?php echo $nfinancials->thumbnail; ?>">
                             
                             </div>
                             </div>
                             <div>

                             <span class="title"><u>Proof Document</u></span>
                             <div class="photo-container" id="grame">
                            <input type="file" id="passbook" name="proof" value="<?php echo $nfinancials->proof_document; ?>">
                            
                        </div> -->
                        </div>


                            </div>
                        </div>


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
 
</body>

</html>