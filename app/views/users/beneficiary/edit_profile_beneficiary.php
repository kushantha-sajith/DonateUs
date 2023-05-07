<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
<<<<<<< Updated upstream
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
=======
>>>>>>> Stashed changes
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
<<<<<<< Updated upstream
    <!--navigation bar left-->
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bx-grid-alt"></i>
        <!-- <h1><?php echo $data['title']; ?></h1> -->
        <span class="logo_name">Dashboard</span>
      </div>
      <div class="welcome">
        <span>Welcome</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Donation Requests</span>
          </a>
        </li>
        <li>
        <a href="<?php echo URLROOT; ?>/donor/donationHistory_donor">
            <i class="bx bx-history"></i>
            <span class="links_name">Donation History</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-conversation"></i>
            <span class="links_name">Forum</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-calendar-check"></i>
            <span class="links_name">Events</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-pie-chart-alt"></i>
            <span class="links_name">Stats</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-report"></i>
            <span class="links_name">Reservations</span>
          </a>
        </li>
        <li id="item1">
          <a href="#">
            <i class="bx bxs-report"></i>
            <span class="links_name">Sponsor</span>
          </a>
        </li>
        <li id="item2">
          <a href="#">
            <i class="bx bxs-report"></i>
            <span class="links_name">Reports</span>
          </a>
        </li>
        <li class="log_out">
          <a href="<?php echo URLROOT; ?>/users/logout">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
    <!--navigation bar left end-->
=======
  <?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>
>>>>>>> Stashed changes

    <!--home section start-->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
<<<<<<< Updated upstream
          <span class="dashboard">Profile</span>
=======
          <span class="dashboard">Dashboard</span>
>>>>>>> Stashed changes
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
<<<<<<< Updated upstream
            <a href="<?php echo URLROOT; ?>/beneficiary/profile_beneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
=======
            <img src="<?php echo URLROOT; ?>/img/profile_pic.svg" alt="" />
>>>>>>> Stashed changes
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
<<<<<<< Updated upstream
      <div class="profile">
                      <img class="img_profile" src="<?php echo URLROOT; ?>/img/img_profile.png" alt="img_profile" href="">
                      <form action="<?php echo URLROOT; ?>/beneficiary/edit_profile_beneficiary" method="POST">
                      <table class="prof_data" >
                        <?php foreach($data['userdata'] as $user) : ?>
                        <tr id = "ind1"><td>
                            <label>Full Name</label>
                            <input type="text" id="fullname" name="fullname" value="<?php echo $user->f_name." ".$user->l_name; ?>"></td>
                            <td><label>Email</label>
                            <input type="text" id="email" name="email" placeholder="" value="<?php echo $user-> email; ?>"></td>
                        </tr>

                        <tr id = "corp1"><td>
                            <label>Company Name</label>
                            <input type="text" id="fullname" name="fullname" value="<?php echo $user-> c_name; ?>"></td>
                            <td><label>Email</label>
                            <input type="text" id="email" name="email" placeholder="" value="<?php echo $user-> email; ?>"></td>
                        </tr>

                        <tr><td>
                            <label>Contact Number</label>
                            <input type="text" id="contact" name="contact" value="<?php echo $user->contact; ?>"></td>
                            <td id = "ind2">
                            <label>City</label>
                            <input type="text" id="city" name="city" value="<?php echo $user->city; ?>"></td>
                        </tr>

                        <tr id = "corp2"><td>
                            <label>Employee Id</label>
                            <input type="text" id="fullname" name="fullname" value="<?php echo $user-> eid; ?>"></td>
                            <td><label>Designation</label>
                            <input type="text" id="email" name="email" placeholder="" value="<?php echo $user-> designation; ?>"></td>
                        </tr>

                           <?php endforeach; ?>
                        <tr>
                            <td><input type="submit" value="Update Profile"></td>
                            <td><input type="button" value="Update Password" onclick=""></td>
                        </tr>
                        
                      </table>
                      <input class="btndelete" type="button" value="Delete Account" onclick="">
                      </form>
                    </div>
                    
                </div>
      </div>
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
        if(type === "5" ){
          document.getElementById("ind1").style.display = "none";
          document.getElementById("ind2").style.display = "none";
          document.getElementById("ind3").style.display = "none";
          document.getElementById("ind4").style.display = "none";
          document.getElementById("ind5").style.display = "none";
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
    </script>
  </body>
=======
    
      <h2>Add a new Donation Request</h2>
      
     <br>
     <div class="form">
      <div class="container">
      <form method="post" action="<?php echo URLROOT; ?>/beneficiary/reqForm"> 
      Name
      <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-style-input">
      <span class="error"><?php echo $data['nameErr']; ?></span>
      
      Description
      <textarea name="description" rows="4" cols="40" class="form-style-input"><?php echo $data['description']; ?></textarea>
      <span class="error"> <?php echo $data['descriptionErr']; ?></span>
      
      Amount/Quantity 
      <input type="text" name="quantity" value="<?php echo $data['quantity']; ?>" class="form-style-input">
      <span class="error"><?php echo $data['quantityErr']; ?></span>

      Due Date
      <input type="date" name="duedate" value="<?php echo $data['duedate']; ?>" class="form-style-input">
     <span class="error"><?php echo $data['duedateErr']; ?></span>

      Donation Title  
      <input type="text" name="title" value="<?php echo $data['title']; ?>" class="form-style-input">
     <span class="error"><?php echo $data['titleErr']; ?></span>

     Category
     <div>
        <select class="form-style-input" name="cat_id" id="cat_id">
            <?php foreach($data['categories'] as $categories) : ?>
                <option <?php if($categories->id==$data['cat_id']) {echo "selected";} ?> value="<?php echo $categories->id; ?>"><?php echo $categories->category_name; ?></option>
            <?php endforeach; ?>
        </select>
        </div>

      Contact Number 
      <input type="text" name="contact" value="<?php echo $data['contact']; ?>" class="form-style-input">
      <span class="error"><?php echo $data['contactErr']; ?></span>

      Location/City 
      <input type="text" name="city" value="<?php echo $data['city']; ?>" class="form-style-input">
     <span class="error"><?php echo $data['cityErr']; ?></span>
     
     <!-- User_ID
      <input type="text" name="user_id" value="<?php echo $data['user_id']; ?>" class="form-style-input">
     <span class="error"><?php echo $data['user_idErr']; ?></span>

     Category ID
      <input type="text" name="cat_id" value="<?php echo $data['cat_id']; ?>" class="form-style-input">
     <span class="error"><?php echo $data['cat_idErr']; ?></span> -->
      
      <br><br>
      <input type="submit" name="submit" value="Submit" class="btn1 add"> 
      <br> 
    </form>
    </div>
    </div>
    
    </section>

    <!--home section end-->
    <script>
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

        const selectImage = document.querySelector('.select-image');
        const inputFile = document.querySelector('#file');
        const imgArea = document.querySelector('.img-area');

        selectImage.addEventListener('click', function () {
            inputFile.click();
        })

        inputFile.addEventListener('change', function () {
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

        const selectImage2 = document.querySelector('#select_two');
        const inputFile2 = document.querySelector('#file2');
        const imgArea2 = document.querySelector('#area-two');

        selectImage2.addEventListener('click', function () {
            inputFile2.click();
        })

        inputFile2.addEventListener('change', function () {
            const image2 = this.files[0]
            if (image2.size < 2000000) {
                const reader2 = new FileReader();
                reader2.onload = () => {
                    const allImg2 = imgArea2.querySelectorAll('img');
                    allImg2.forEach(item => item.remove());
                    const imgUrl2 = reader2.result;
                    const img2 = document.createElement('img');
                    img2.src = imgUrl2;
                    imgArea2.appendChild(img2);
                    imgArea2.classList.add('active');
                    imgArea2.dataset.img2 = image2.name;
                }
                reader2.readAsDataURL(image2);
            } else {
                alert("Image size more than 2MB");
            }
        })
        const selectImage3 = document.querySelector('#select_three');
        const inputFile3 = document.querySelector('#file3');
        const imgArea3 = document.querySelector('#area-three');

        selectImage3.addEventListener('click', function () {
            inputFile3.click();
        })

        inputFile3.addEventListener('change', function () {
            const image3 = this.files[0]
            if (image3.size < 2000000) {
                const reader3 = new FileReader();
                reader3.onload = () => {
                    const allImg3 = imgArea3.querySelectorAll('img');
                    allImg3.forEach(item => item.remove());
                    const imgUrl3 = reader3.result;
                    const img3 = document.createElement('img');
                    img3.src = imgUrl3;
                    imgArea3.appendChild(img3);
                    imgArea3.classList.add('active');
                    imgArea3.dataset.img3 = image3.name;
                }
                reader3.readAsDataURL(image3);
            } else {
                alert("Image size more than 2MB");
            }
        })
        
    </script>

</body>

>>>>>>> Stashed changes
</html>