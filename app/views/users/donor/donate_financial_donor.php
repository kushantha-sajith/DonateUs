<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/request_viewmore.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/payment.css" />
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
  </body>
</html>