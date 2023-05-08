<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <!--navigation bar left-->
  <?php require APPROOT . '/views/inc/side_navbar_eorganizer.php'; ?>
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

        <a href="<?php echo URLROOT; ?>/pages/profile_eorganizer"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
        <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
        <!-- <i class='bx bx-chevron-down'></i> -->
      </div>
    </nav>
    <main>
      <div class="container">
        <header>Profile Details</header>

        <form action="<?php echo URLROOT; ?>/eorganizer/updateprofileeorganizer" method="POST">
          <div class="formfirst">
            <div class="details personal">
              <span class="title"><u>Personal Details</u></span>
              <div class="fields">
                <?php foreach ($data['userdata'] as $user) : ?>
                  <?php foreach ($data['personaldata'] as $personaldata) : ?>
                    <div class="input-field">
                      <label>User Email</label>
                      <input type="text" name="email" placeholder="ex: abc@gmail.com" value="<?php echo $user->email; ?>" disabled>
                    </div>
                    <div class="input-field">
                      <label>NIC</label>
                      <input type="text" name="nic" placeholder="ex: 19XXXXXXXXXX/ 9XXXXXXXXX" value="<?php echo $personaldata->NIC; ?>" disabled>
                    </div>

                    <div class="input-field">
                      <label>Full Name</label>
                      <input type="text" name="full_name" placeholder="ex: John Doe" value="<?php echo $personaldata->full_name ?>">
                    </div>

                    <div class="input-field">
                      <label>Contact Number</label>
                      <input type="text" name="contact" placeholder="ex: +94XXXXXXXXX" value="<?php echo $user->tp_number; ?>">
                    </div>
                    <div class="input-field">
                      <label>Community Name</label>
                      <input type="text" name="comm_name" placeholder="ex: Rotract Club of UCSC" value="<?php echo $personaldata->community_name; ?>">
                    </div>
                    <div class="input-field">
                      <label>Designation</label>
                      <input type="text" name="desg" placeholder="ex: Treasurer" value="<?php echo $personaldata->designation; ?>">
                    </div>
                    <div class="input-field">
                      <label>City</label>
                      <input type="text" name="city" placeholder="ex: Colombo" value="<?php echo $personaldata->zipcode; ?>">
                    </div>
                    <div class="input-field">
                      <label>District</label>
                      <select class="dropdown" name="district" id="district">
                        <?php foreach ($data['districts'] as $districts) : ?>
                          <option <?php if ($districts->id == $personaldata->district) {
                                    echo "selected";
                                  } ?> value="<?php echo $districts->id; ?>"><?php echo $districts->dist_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                  <?php endforeach; ?>
                <?php endforeach; ?>
              </div>

              <span class="title"><u>Change Profile Picture</u></span>

              <div id="image-upload-container" class="image-upload-container">
                <div id="selected-image-container" class="selected-image-container"><i class='bx bxs-cloud-upload icon'></i></div>
                <div id="upload-buttons-container" class="upload-buttons-container">
                  <input type="file" id="image-upload-input" class="image-upload-input" accept="image/*" hidden>

                  <div class="buttons">
                    <div id="image-upload-button" class="image-upload-button">Browse Image</div>
                    <div id="image-clear-button" class="image-clear-button">Clear</div>
                  </div>

                </div>
                <button class="sumbit">
                  <span class="btnText">Submit</span>
                  <i class="uil uil-navigator"></i>
                </button>
              </div>

            </div>
        </form>
        <div class="updatebtn">

        </div>

      </div>



    </main>
  </section>
  <!--home section end-->

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      let welcome = document.querySelector(".welcome");
      sidebarBtn.onclick = function() {
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
    });
  </script>
</body>

</html>