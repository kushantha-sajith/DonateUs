<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
    <!--navigation bar left-->
    <?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>
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
          <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
            <!-- <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a> -->
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <main>
            <div class="container">
                <header>Profile Update</header>

                <form action="<?php echo URLROOT; ?>/beneficiary/updateProfileBeneficiary" method="POST">
                    <div class="formfirst">
                        <div class="details personal">
                            <span id ="ind1"class="span_title"><u>Personal Details</u></span>
                            <span id ="org1"class="span_title"><u>Company Details</u></span>
                            <div class="fields">
                            <?php foreach($data['userdata'] as $user) : ?>
                              <?php foreach($data['personaldata'] as $personaldata) : ?>
                                
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
                                
                                <div id="org2" class="input-field">
                                    <label>Company Name</label>
                                    <input type="text" name="comp_name" placeholder="ex: ABC.co" value="<?php echo $personaldata->org_name; ?>">
                                    <p class="error"></p>
                                </div>

                                <div id="org3" class="input-field">
                                    <label>Email Address</label>
                                    <input type="text" name="email_org" placeholder="ex: abc@gmail.com" value="<?php echo $user-> email; ?>" disabled>
                                    
                                </div>

                                <div id="ind5" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_ind" placeholder="ex: +94XXXXXXXXX" value="<?php echo $user->tp_number; ?>">
                                    <p class="error"></p>
                                </div>
                                <div class="input-field">
                                    <label>zipcode</label>
                                    <input type="text" name="zipcode" placeholder="ex: Colombo" value="<?php echo $personaldata->zipcode; ?>">
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

                                <?php if($personaldata->reservation==1){ ?>

                                <div id="org10" class="input-field">
                                    <label>Members Quantity</label>
                                    <input type="text" placeholder="" value="<?php echo $user-> members; ?>" >
                                </div>

                                <div id="org11">
                                    <label>Meal Plan</label>
                                    <input type="file" placeholder="" value="<?php echo $user-> meal_plan; ?>" >
                                </div>
                                <?php } ?>

                              </div>
                              <span id ="org4" class="span_title"><u>Contact Person Details</u></span>
                              <div id="org9" class="fields">
                                
                                <div id ="org5" class="input-field">
                                    <label>Full Name</label>
                                    <input type="text" name="emp_name" placeholder="ex: John Doe" value="<?php echo $personaldata->emp_name; ?>">
                                    <p class="error"></p>
                                    
                                </div>
                                <div id ="org6" class="input-field">
                                    <label>Employee ID</label>
                                    <input type="text" name="emp_id" placeholder="ex: EID123456" value="<?php echo $personaldata->emp_id; ?>">
                                    <p class="error"></p>
                                </div>
                                <div id ="org7" class="input-field">
                                    <label>Designation</label>
                                    <input type="text" name="desg" placeholder="ex: Manager" value="<?php echo $personaldata->designation; ?>">
                                    <p class="error"></p>
                                </div>
                                <div id ="org8" class="input-field">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_org" placeholder="ex: +94XXXXXXXXX" value="<?php echo $user->tp_number; ?>">
                                    <p class="error"></p>
                                </div>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                            <span class="span_title"><u>Change Profile Picture</u></span>
                            
                        <div class="photo-container">
                            <input type="file" id="file" name="prof_img" accept="image/*" hidden>
                            <div class="img-area" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                            </div>
                            <button class="select-image">Select Image</button>
                        </div>

                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                            
                       
                       
                    </div>
                </form>
                
                
            </div>



        </main>
    </section>
    <!--home section end-->

    <script>

window.onload = function () {
        let type = "<?php echo $_SESSION['user_type']; ?>";
        // let individual ="ind", orgorate ="org";

        // let ind = document.getElementsById(individual);
        // let org = document.getElementsById(orgorate);

        // let i,j; 
        // if(type === "3" ){
          
        // for (i = 0; i < ind.length; i++) {
        //     ind[i].style.display = "none";
        // }
        
        // for (j = 0; j < org.length; j++) {
        //     org[j].style.display = "block";
        // }
         
        // }else{

        //   for (i = 0; i < ind.length; i++) {
        //     ind[i].style.display = "block";
        // }
        
        // for (j = 0; j < org.length; j++) {
        //     org[j].style.display = "none";
        // }
        // }
        if(type === "4" ){
          document.getElementById("ind1").style.display = "none";
          document.getElementById("ind2").style.display = "none";
          document.getElementById("ind3").style.display = "none";
          document.getElementById("ind4").style.display = "none";
          document.getElementById("ind5").style.display = "none";
          document.getElementById("ind6").style.display = "none";
        }
        else{
          document.getElementById("org1").style.display = "none";
          document.getElementById("org2").style.display = "none";
          document.getElementById("org3").style.display = "none";
          document.getElementById("org4").style.display = "none";
          document.getElementById("org5").style.display = "none";
          document.getElementById("org6").style.display = "none";
          document.getElementById("org7").style.display = "none";
          document.getElementById("org8").style.display = "none";
          document.getElementById("org9").style.display = "none";
          document.getElementById("org10").style.display = "none";
          document.getElementById("org11").style.display = "none";

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
    </script>
  </body>
</html>



