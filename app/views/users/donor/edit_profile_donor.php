<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" /> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" /> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/editProfile.css" /> -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
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
          <span class="dashboard">Profile</span>
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
      <main>
            <div class="container">
                <header>Profile Update</header>
                <?php foreach($data['userdata'] as $user) : ?>
                <?php foreach($data['personaldata'] as $personaldata) : ?>
                <form action="<?php echo URLROOT; ?>/donor/updateProfileDonor/<?php echo $user->tp_number; ?>" method="POST">
                    <div class="formfirst">
                        <div class="details personal">
                            <span id ="ind1"class="span_title"><u>Personal Details</u></span>
                            <span id ="corp1"class="span_title"><u>Company Details</u></span>
                            <div class="fields">
                                                            
                                <div id="ind4" class="input-field">
                                    <label>User Email</label>
                                    <input type="text" name="email_ind" placeholder="ex: abc@gmail.com" value="<?php echo $user-> email; ?>" disabled>
                                </div>
                                <div id="ind3" class="input-field">
                                    <label>NIC</label>
                                    <input type="text" name="nic_ind" placeholder="ex: 19XXXXXXXXXX/ 9XXXXXXXXX" value="<?php echo $personaldata->NIC; ?>" disabled>
                                   
                                </div>

                                <div id="ind2" class="input-field">
                                    <label>First Name</label>
                                    <input type="text" name="f_name" placeholder="ex: John" value="<?php echo $personaldata->f_name; ?>" >
                                    <p class="error"></p>
                                </div>
                                <div id="ind6" class="input-field">
                                    <label>Last Name</label>
                                    <input type="text" name="l_name" placeholder="ex:Doe" value="<?php echo $personaldata->l_name; ?>" >
                                    <p class="error"></p>
                                </div>
                                
                                <div id="corp2" class="input-field">
                                    <label>Company Name</label>
                                    <input type="text" name="comp_name" placeholder="ex: ABC.co" value="<?php echo $personaldata->comp_name; ?>">
                                    <p class="error"></p>
                                </div>

                                <div id="corp3" class="input-field">
                                    <label>Email Address</label>
                                    <input type="text" name="email_corp" placeholder="ex: abc@gmail.com" value="<?php echo $user-> email; ?>" disabled>
                                    
                                </div>


                                <div id="ind5" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_ind" placeholder="ex: +94XXXXXXXXX" value="<?php echo $user->tp_number; ?>">
                                    <p class="error"></p>
                                </div>
                                <div class="input-field">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="ex: Colombo" value="<?php echo $personaldata->city; ?>">
                                    <p class="error"></p>
                                </div>
                                <div class="input-field">
                                    <label>District</label>
                                    <select class="dropdown" name="district" id="district">
                            <?php foreach($data['districts'] as $districts) : ?>
                                <option <?php if($districts->id==$personaldata->district) {echo "selected";} ?> value="<?php echo $districts->id; ?>"><?php echo $districts->dist_name; ?></option>
                            <?php endforeach; ?> </select>
                            <p class="error"></p>
                                </div>
                              </div>
                              <span id ="corp4" class="span_title"><u>Contact Person Details</u></span>
                              <div id="corp9" class="fields">
                                
                                <div id ="corp5" class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" name="emp_name" placeholder="ex: John Doe" value="<?php echo $personaldata->emp_name; ?>">
                                    <p class="error"></p>
                                    
                                </div>
                                <div id ="corp6" class="input-field">
                                    <label>Employee ID</label>
                                    <input type="text" name="emp_id" placeholder="ex: EID123456" value="<?php echo $personaldata->emp_id; ?>">
                                    <p class="error"></p>
                                </div>
                                <div id ="corp7" class="input-field">
                                    <label>Designation</label>
                                    <input type="text" name="desg" placeholder="ex: Manager" value="<?php echo $personaldata->designation; ?>">
                                    <p class="error"></p>
                                </div>
                                <div id ="corp8" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_corp" placeholder="ex: +94XXXXXXXXX" value="<?php echo $user->tp_number; ?>">
                                    <p class="error"></p>
                                </div>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                            <span class="span_title"><u>Change Profile Picture</u></span>

                            <div id="image-upload-container" class="image-upload-container">
                              <div id="selected-image-container" class="selected-image-container"><i class='bx bxs-cloud-upload icon'></i></div>
                              <div id="upload-buttons-container" class="upload-buttons-container">
                              <input type="file" id="image-upload-input" class="image-upload-input" accept="image/*" hidden >

                              <div class="buttons">
                                <div id="image-upload-button" class="image-upload-button">Browse Image</div>
                                <div id="image-clear-button" class="image-clear-button">Clear</div>
                              </div>
    
                            </div>
                      </div>

           <input class="btn-submit" type="submit" value="Update"> 
                       
                    </div>
                </form>
                
                
            </div>



        </main>
    </section>
    <!--home section end-->

    <script>

window.onload = function () {
        let type = "<?php echo $_SESSION['user_type']; ?>";
        // let individual ="ind", corporate ="corp";

        // let ind = document.getElementsById(individual);
        // let corp = document.getElementsById(corporate);

        // let i,j; 
        // if(type === "3" ){
          
        // for (i = 0; i < ind.length; i++) {
        //     ind[i].style.display = "none";
        // }
        
        // for (j = 0; j < corp.length; j++) {
        //     corp[j].style.display = "block";
        // }
         
        // }else{

        //   for (i = 0; i < ind.length; i++) {
        //     ind[i].style.display = "block";
        // }
        
        // for (j = 0; j < corp.length; j++) {
        //     corp[j].style.display = "none";
        // }
        // }
        if(type === "3" ){
          document.getElementById("ind1").style.display = "none";
          document.getElementById("ind2").style.display = "none";
          document.getElementById("ind3").style.display = "none";
          document.getElementById("ind4").style.display = "none";
          document.getElementById("ind5").style.display = "none";
          document.getElementById("ind6").style.display = "none";
        }
        else{
          document.getElementById("corp1").style.display = "none";
          document.getElementById("corp2").style.display = "none";
          document.getElementById("corp3").style.display = "none";
          document.getElementById("corp4").style.display = "none";
          document.getElementById("corp5").style.display = "none";
          document.getElementById("corp6").style.display = "none";
          document.getElementById("corp7").style.display = "none";
          document.getElementById("corp8").style.display = "none";
          document.getElementById("corp9").style.display = "none";
        }
      };

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

      let selectedImageContainer = document.querySelector(".selected-image-container");
      let uploadInput = document.querySelector(".image-upload-input");
      let uploadButton = document.querySelector(".image-upload-button");   
      let clearButton = document.querySelector(".image-clear-button");

// When the upload input changes, update the selected image display
uploadInput.addEventListener("change", (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();
  reader.onload = (e) => {
    selectedImageContainer.style.backgroundImage = `url(${e.target.result})`;
  };
  reader.readAsDataURL(file);
});

// When the upload button is clicked, trigger the upload input
uploadButton.addEventListener("click", () => {
  uploadInput.click();
});

// When the clear button is clicked, clear the selected image display
clearButton.addEventListener("click", () => {
  selectedImageContainer.style.backgroundImage = "none";
  uploadInput.value = "";
});

    </script>
  </body>
</html>



