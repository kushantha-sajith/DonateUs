<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Donation</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donate_nonfinancial_donor.css" />
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
      
      
      <div class="how_it_works">
      <h3>How It Works</h3>
      <div class="progress-container">
        <div class="progress" id="progress"></div>
        <div class="circle_a"><b>2</b></div>
        <ul class="instructions">
          <li>Check your personal details</li>
          <li>Fill donation details</li>
          <li>Proceed</li>
        </ul>
        <div class="circle_a"><b>3</b></div>
        <ul class="instructions">
          <li>Get beneficiary contact details</li>
          <li>Contact them</li>
          <li>Deliver your donations</li>
        </ul>
        <div class="circle_a"><b>4</b></div>
        <ul class="instructions">
          <li>Go to your donation history</li>
          <li>Mark the donation as delivered </li>
          <li>Send us your feedback</li>
        </ul>
        <div class="circle_a"><b>End</b></div>
     </div>

        <div class="gigcontainer">
       
          <div class="box">
          <form action="<?php echo URLROOT; ?>/donor/donate/<?php echo $data['req_id'];  ?>/<?php echo $data['cat_id'];  ?>" method="POST">

<div class="row">

    <div class="col">

        <h3 class="title">Donation Details</h3>

        <div class="inputBox">
            <span>Full name(Donor) :</span>
            <input type="text" name="donor_name" placeholder="your Name" value="<?php echo $data['donor_name']; ?>">
            
        </div>
        <div class="inputBox">
            <span>Contact Number :</span>
            <input type="text" name="donor_contact" placeholder="Your Contact Number" value="<?php echo $data['donor_contact']; ?>">
            
        </div>        
        <div class="inputBox">
            <span>Quantity :</span>
            <input type="text" name="donated_quantity" placeholder="ex : 100" value="">
            <p class="error"><?php echo $data['donated_quantity_err']; ?></p>
        </div>
        <div class="inputBox">
            <span>Note to Beneficiary :</span>
            <textarea id="txtid" name="note_to_beneficiary" rows="4" cols="50" maxlength="200" placeholder="Start typing here... "></textarea>
        </div>
        <div class="inputBox">
            <span>Anonymous Record</span>
            <input type="checkbox" id="demoCheckbox" name="anonymous" value="1">
            <p>Your donation will be displayed as <b>Anonymous Donation</b> under the resent Donations of this donation request</p>
        </div>

    </div>

    <div class="col">

        <h3 class="title">Request Details</h3>

        <div class="inputBox">
            <span>Beneficiary Name : </span>
            <input type="text" value="<?php echo $data['beneficiary']; ?>" disabled>
        </div>
        <div class="inputBox">
            <span>Item Requested :</span>
            <input type="text" value="<?php echo $data['item']; ?>" disabled>
        </div>
        <div class="inputBox">
            <span>Quantity Requested :</span>
            <input type="number" value="<?php echo $data['quantity']; ?>" disabled>
        </div>
        <div class="circle-wrap">
        <div class="circle">
        <?php 
          $requested = $data['quantity'];
          $received = $data['received'];
          //typecast to get integer value
          $percentage = (int) (($received/$requested)*100);
          $degree = (360/200)*$percentage; // (360/100)*percentage, then devide by 2 bcz circle is formed by 2 parts
        ?>
        
          <div class="mask full" style="transform: rotate(<?php echo $degree; ?>deg);">
            <div class="fill" style="transform: rotate(<?php echo $degree; ?>deg);"></div>
          </div>
          <div class="mask half">
            <div class="fill" style="transform: rotate(<?php echo $degree; ?>deg);"></div>
          </div>
          <div class="inside-circle"> <?php echo $percentage; ?>% </div>
        </div>
       </div> <!-- eo circle-wrap -->
       <div class="inputBox">
            <span><?php echo $received; ?> raised out of <?php echo $requested; ?></span>            
        </div>
    </div><!-- eo col -->

</div><!-- eo row -->
<?php if($data['pending_count'] <= 5 || $data['pending_count_reservations'] <= 3){ ?>
  <input type="submit" value="Proceed Donation" class="submit-btn">
<?php }else{ ?>
  <p>You are not eligible to donate at the moment. Please complte the <b>Pending Donations </b>and try again!</p>
  
<?php } ?>


</form>
          </div><!-- eo box -->
          <div class="btns2">
              <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $data['req_id'];?>/<?php echo $data['cat_id'];?>"><button class="btn-back">Back</button></a>
          </div> 
        </div> <!-- eo gigcontainer -->
          
           
      </div> <!-- eo main-container --> 

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