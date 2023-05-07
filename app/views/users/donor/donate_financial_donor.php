<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
<<<<<<< Updated upstream
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/request_viewmore.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/payment.css" />
=======
    <title>Donation</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donate_financial_donor.css" />
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
          <span class="dashboard"><?php echo $data['title'];  ?></span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
          
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
      
        <div class="gigcontainer">
<<<<<<< Updated upstream
        <form id="payment-form">
      <div class="form-group">
        <label for="name">Name on Card</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="card-number">Card Number</label>
        <input type="text" id="card-number" name="card-number" required>
      </div>
      <div class="form-group">
        <label for="exp-date">Expiration Date</label>
        <input type="text" id="exp-date" name="exp-date" placeholder="MM/YY" required>
      </div>
      <div class="form-group">
        <label for="cvc">CVC</label>
        <input type="text" id="cvc" name="cvc" required>
      </div>
      <div class="form-group">
        <label for="amount">Amount (USD)</label>
        <input type="text" id="amount" name="amount" required>
      </div>
      <button type="submit">Submit Payment</button>
    </form>
        </div> <!-- eo gigcontainer -->
          
            <div class="btns2">
            <!-- <?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?> -->
              <a href="<?php echo URLROOT;?>/pages/donationRequestsDonor"><button class="btn-back">Back</button></a>
            </div> 
        </div>

    </section>
    <!--home section end-->

    <script>

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

        const form = document.getElementById('payment-form');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  // Validate form data
  const name = document.getElementById('name').value;
  const cardNumber = document.getElementById('card-number').value;
  const expDate = document.getElementById('exp-date').value;
  const cvc = document.getElementById('cvc').value;
  const amount = document.getElementById('amount').value;

  if (!name || !cardNumber || !expDate || !cvc || !amount) {
    showError('Please fill in all fields');
    return;
  }

  if (!/^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/.test(cardNumber)) {
    showError('Please enter a valid card number');
    return;
  }

  if (!/^[0-9]{2}/[0-9]{2}$/.test(expDate)) {
showError('Please enter a valid expiration date (MM/YY)');
return;
}

const expDateArray =
expDate.split('/');
const expMonth = parseInt(expDateArray[0], 10);
const expYear = parseInt(expDateArray[1], 10);

const currentDate = new Date();
const currentYear = currentDate.getFullYear() % 100;
const currentMonth = currentDate.getMonth() + 1;

if (expYear < currentYear || (expYear === currentYear && expMonth < currentMonth)) {
showError('Please enter a valid expiration date');
return;
}

if (!/^[0-9]{3}$/.test(cvc)) {
showError('Please enter a valid CVC');
return;
}

if (!/^[0-9]+(.[0-9]{1,2})?$/.test(amount)) {
showError('Please enter a valid amount');
return;
}

// If all data is valid, submit form
alert(Payment of $${amount} was successful!);
});

function showError(message) {
const error = document.createElement('div');
error.className = 'error';
error.innerText = message;
form.appendChild(error);
}

    </script>
=======
       
          <div class="box">

          <?php if($data['isRequest'] == 1){ ?>
            <form action="<?php echo URLROOT; ?>/donor/donate/<?php echo $data['req_id'];  ?>/<?php echo $data['cat_id'];  ?>" method="POST">
          <?php }else{?>
            <form action="<?php echo URLROOT; ?>/donor/donateToEvents/<?php echo $data['req_id'];  ?>/1" method="POST">
          <?php } ?>
          <h3 class="title_a">Donation Details</h3>
<div class="row">

    <div class="col">
            

        <div class="inputBox">
            <span>Full name :</span>
            <input type="text" name="donor_name" placeholder="Your Name" value="<?php echo $data['donor_name']; ?>">
        </div>
        <div class="inputBox">
            <span>Email :</span>
            <input type="email" name="donor_email" placeholder="Your Email Address" value="<?php echo $data['donor_email']; ?>">
        </div>
               
        <div class="circle-wrap">
        <div class="circle">
        <?php 
          $requested = $data['amount'];
          $received = $data['received'];
          //typecast to get integer value
          $percentage = (int) (($received/$requested)*100);
          $degree = (360/200)*$percentage; // (360/100)*percentage, then devide by 2 bcz circle is formed by 2 parts
        ?>
        
          <div class="mask full" style="transform: rotate(<?php echo $degree; ?>deg);">
            <div class="fill" style="transform: rotate(<?php echo $degree; ?>deg);"></div>
           </div> <!-- eo mask full -->
          <div class="mask half">
            <div class="fill" style="transform: rotate(<?php echo $degree; ?>deg);"></div>
          </div><!-- eo mask half -->
          <div class="inside-circle"> <?php echo $percentage; ?>% </div>
        </div><!-- eo circle -->
      </div> <!-- eo circle-wrap -->
      <div class="inputBox">
            <span>Rs.<?php echo $received; ?> raised out of Rs.<?php echo $requested; ?></span>            
        </div>
        

    </div>

    <div class="col">
        <div class="inputBox">
            <span>Contact Number :</span>
            <input type="text" name="donor_contact" placeholder="Your Contact Number" value="<?php echo $data['donor_contact']; ?>">
        </div>
        <div class="inputBox">
            <span>Amount Rs :</span>
            <input type="text" name="donated_amount" placeholder="500" value="<?php echo $data['donated_amount']; ?>">
            <p class="error"><?php echo $data['amount_err']; ?></p>
        </div>
        <div class="inputBox">
            <span>Anonymous Donation</span>
            <input type="checkbox" id="demoCheckbox" name="anonymous" value="1">
            <p>Your donation will be displayed as <b>Anonymous Donation</b> under the resent Donations of this donation request</p>
            <p>Your donation will be <b>Anonymous</b> to the beneficiary as well</p>
        </div>
        

    </div>
    <input type="submit" value="Proceed to Payment" class="submit-btn">
</div>



</form>
          </div><!-- eo box -->
          <div class="btns2">
          <?php if($data['isRequest'] == 1){ ?>
            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $data['req_id'];?>/1"><button class="btn-back">Back</button></a>
          <?php }else{?>
            <a href="<?php echo URLROOT;?>/donor/viewmoreEventDonor/<?php echo $data['req_id'];?>"><button class="btn-back">Back</button></a>
          <?php } ?>
          </div> 
        </div> <!-- eo gigcontainer -->
          
           
      </div> <!-- eo main-container --> 
            
        
        
    </section>
    <!--home section end-->

>>>>>>> Stashed changes
  </body>
</html>