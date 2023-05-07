<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
<<<<<<< Updated upstream
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />
=======
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" /> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" />
>>>>>>> Stashed changes
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<<<<<<< Updated upstream
=======
   
>>>>>>> Stashed changes
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
    <!--navigation bar left-->
    <?php require APPROOT.'/views/inc/side_navbar_donor.php';?>
    <!--navigation bar left end-->

    <!--home section start-->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
<<<<<<< Updated upstream
          <span class="dashboard">Donation Requests</span>
=======
          <span class="dashboard"><?php echo $data['title']; ?></span>
>>>>>>> Stashed changes
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
          
<<<<<<< Updated upstream
            <a href="<?php echo URLROOT; ?>/pages/profile_donor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
=======
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
>>>>>>> Stashed changes
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
<<<<<<< Updated upstream

         <div class="select-menu">
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text">Select Donation Category</span>
=======
        
        <label for="toggle-switch">View Nearby Requests </label>
        <input type="checkbox" id="toggle-switch">
               
         <div class="select-menu">
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text">Select a Donation Category</span>
>>>>>>> Stashed changes
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/1" style="text-decoration:none">
                    <li class="option">
<<<<<<< Updated upstream
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            attach_money
                            </span>
=======
>>>>>>> Stashed changes
                        <span class="option-text">Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/0" style="text-decoration:none">
                    <li class="option">
<<<<<<< Updated upstream
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            card_giftcard
                            </span>
                        <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/2" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color:#111e88; margin-right: 1rem;">
                            fastfood
                            </span>
                        <span class="option-text">Food</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/3" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                            menu_book
                            </span>
                        <span class="option-text">Stationary</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/4" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: #111e88; margin-right: 1rem;">
                                medical_services
                            </span>
                            <span class="option-text">Medicine</span>
                        </li>
                    </a>
=======
                        <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>
                <?php foreach($data['categories'] as $category ): ?>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/<?php echo $category -> id;?>" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text"><?php echo $category -> category_name;?></span>
                    </li>
                </a>
                <?php endforeach; ?>
                
>>>>>>> Stashed changes
            </ul>
        </div>

            <div class="gigcontainer">
<<<<<<< Updated upstream
            <?php foreach($data['requests'] as $requests ): ?>
            
                <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $requests->proof_document;  ?>">
                    </div>
                    <div class="easy">
                        <div class="name_job"><?php echo $requests->request_title;  ?></div>
                        <p><b>Published Date : </b><?php echo $requests->published_date;  ?>       <b>Due Date : </b><?php echo $requests->due_date;  ?></p>
                        <p><b>Donation Catagory :</b> <?php echo $requests->category_name;  ?></p>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p><?php echo $requests->description;  ?>
=======

            <div class="box nothing_to_display" >
                    
                    <div class="easy">
                        
                        <p>There are no nearby donation requests to display at the moment</p>
                        <p><b>Please refresh the page to view all donation requests</b> </p>
                        <div class="btns">
                            <!-- <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a> -->
                            
                            <button id="refresh" onclick="refresh()">Refresh</button>
                        </div>                   
                    </div>
                </div>

            <?php foreach($data['requests'] as $requests ): ?>
            
                <div class="box <?php echo $requests->zipcode;  ?>" >
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $requests->thumbnail;  ?>">
                    </div>
                    <div class="easy">
                        <div class="name_job"><?php echo $requests->request_title;  ?></div>
                        <p><b>Published Date : </b><?php echo $requests->published_date;  ?> <span  <?php if(($requests->days_left) > 0 && ($requests->days_left) < 7){ ?> style="color:red;"<?php } ?>><b>Due Date : </b><?php echo $requests->due_date;  ?></span></p>
                        <p><b>Catagory :</b> <?php echo $requests->category_name;  ?> 
                        <?php if($requests-> req_type == 0 ){ 
                            foreach($data['non_financials'] as $nfinancials ): 
                                if($requests->id == $nfinancials->req_id){ 
                                    $item = $nfinancials->item;
                         } 
                         endforeach; 
                         ?> 
                         <b>Item Requested : </b><?php echo $item;  ?> <!-- <p>Item is only for non-financials</p> -->
                         <?php } ?></p> 
                        
                         <p><?php echo $requests->description;  ?>
>>>>>>> Stashed changes
                        </p>
                        <?php if($requests->cat_id >1){ ?>
                       
                            <?php foreach($data['non_financials'] as $nfinancials ): ?>
                                <?php if($requests->id == $nfinancials->req_id){ ?>
                        <div class="skill-box">
                       
                            <span class="title"> <?php echo $nfinancials->received_quantity ; ?> raised out of <?php  echo $nfinancials->quantity;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($nfinancials->received_quantity * 100) / $nfinancials->quantity);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                                
                            </div>
                        </div>
                        <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a>
                            
<<<<<<< Updated upstream
                            <a href="<?php echo URLROOT;?>/donor/donate/0"><button>Donate</button></a>
=======
                            <a href="<?php echo URLROOT;?>/donor/donate/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>"><button>Donate</button></a>
>>>>>>> Stashed changes
                        </div>
                        <?php   } ?>
                        <?php endforeach; ?>
                        <?php } else{ ?>
                            <?php foreach($data['financials'] as $financials ): ?>
                                <?php if($requests->id == $financials->req_id){ ?>
                        <div class="skill-box">
                            <span class="title">Rs.<?php echo $financials->received_amount ;  ?> raised out of Rs.<?php echo $financials->total_amount;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($financials->received_amount * 100) / $financials->total_amount);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                                
                            </div>
                        </div>
                        <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a>
                            
<<<<<<< Updated upstream
                            <a href="<?php echo URLROOT;?>/donor/donate/1"><button>Donate</button></a>
=======
                            <a href="<?php echo URLROOT;?>/donor/donate/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>"><button >Donate</button></a>
                           

>>>>>>> Stashed changes
                        </div>
                        <?php   } ?>
                        <?php endforeach; ?>
                         <?php } ?>
                        
                           
                        
                    </div>
                </div>
                <?php endforeach; ?>
               
            </div>

        </div>

    </section>
    <!--home section end-->
<<<<<<< Updated upstream

    <script>

=======
    <script src="https://js.stripe.com/v3/"></script>
    <script>

// function processPayment(){

  
//     let pk = 'pk_test_51N4OOUBUpAx8uiW72yScgJIFw02GMM66j83iDem4IOYHUQJ9PJ29X8viRj4EkZRq20cNZNy1eAeMSTNLn77CbUOb00EQtTqMud';
   
// // Set Stripe publishable key to initialize Stripe.js
// const stripe = Stripe(pk);

// // // Select payment button
// // const payBtn = document.querySelector("#payButton");

// // // Payment request handler
// // payBtn.addEventListener("click", function (evt) {
//     // setLoading(true);
    
//     createCheckoutSession().then(function (data) {
       
//         if(data.sessionId){
//             stripe.redirectToCheckout({
//                 sessionId: data.sessionId,
//             }).then(handleResult);
//         }else{
//             handleResult(data);
//         }
//     });
// // });
// }
 
    
// // Create a Checkout Session with the selected product
// const createCheckoutSession = function (stripe) {
    
//     return fetch("<?php echo URLROOT;?>/donor/processPyament", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//         },
//         body: JSON.stringify({
//             createCheckoutSession: 1,
//         }),
//     }).then(function (result) {
//         return result.json();
        
//     });
   
// };

// // // Handle any errors returned from Checkout
// // const handleResult = function (result) {
// //     if (result.error) {
// //         showMessage(result.error.message);
// //     }
    
// //     // setLoading(false);
// // };

// // Show a spinner on payment processing
// // function setLoading(isLoading) {
// //     if (isLoading) {
// //         // Disable the button and show a spinner
// //         payBtn.disabled = true;
// //         document.querySelector("#spinner").classList.remove("hidden");
// //         document.querySelector("#buttonText").classList.add("hidden");
// //     } else {
// //         // Enable the button and hide spinner
// //         payBtn.disabled = false;
// //         document.querySelector("#spinner").classList.add("hidden");
// //         document.querySelector("#buttonText").classList.remove("hidden");
// //     }
// // }

// // Display message
// function showMessage(messageText) {
//     const messageContainer = document.querySelector("#paymentResponse");
	
//     messageContainer.classList.remove("hidden");
//     messageContainer.textContent = messageText;
	
//     setTimeout(function () {
//         messageContainer.classList.add("hidden");
//         messageText.textContent = "";
//     }, 5000);
// }
>>>>>>> Stashed changes
      // js for drop down list 
       const optionMenu = document.querySelector(".select-menu"),
            selectBtn = optionMenu.querySelector(".select-btn"),
            options = optionMenu.querySelectorAll(".option"),
            sBtn_text = optionMenu.querySelector(".sBtn-text");

        selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

        options.forEach(option => {
            option.addEventListener("click", () => {
                let selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;

                optionMenu.classList.remove("active");
            });
        });
<<<<<<< Updated upstream
    </script>
=======
        
        function refresh() {
            location.reload();
        }
    
        
        let userZip = <?php echo $data['user'];  ?>;
    </script>
    <script src="<?php echo URLROOT; ?>/js/toggle.js"></script>
>>>>>>> Stashed changes
  </body>
</html>