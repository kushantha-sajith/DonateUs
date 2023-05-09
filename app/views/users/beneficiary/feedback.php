<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" /> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/feedback.css" />
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
          <span class="dashboard">Feedback</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
            <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
         
        </div>
      </nav>
      <div class="main-container">
        <div class="gigcontainer">
          
            <div class="gigcontainer">
       
                <div class="box">
                <header>Feedback</header>
<form action="<?php echo URLROOT; ?>/beneficiary/feedback/<?php echo $data['donation_id'];  ?>" method="POST"> 
    <div class="formfirst">
        <div class="details personal">
       
            <div class="fields">
            
                <div class="input-field">
                    <label>Name :</label>
                    <input type="text" name="name" placeholder="" value="<?php echo $data['name'];  ?>">
                    
                </div>
                <div class="input-field">
                    <label>Email :</label>
                    <input type="email" name="email" placeholder="" value="<?php echo $data['email'];  ?>" >
                    
                </div>
                <div class="input-field">
                    <label>Subject :</label>
                    <input type="text" name="subject" placeholder="" value="<?php echo $data['subject'];  ?>">
                    <p class="error"><?php echo $data['subject_err'];  ?></p>
                </div>
                                
            </div>
            <div class="input-field">
                    <textarea class="feedback" id="desc" name="desc" placeholder="Type here..." rows="17" cols="100" > <?php echo $data['desc'];  ?> </textarea>
                    <p class="error"><?php echo $data['feedback_err'];  ?></p>
                </div>
                   
           </div>
           <div class="btns2">
           <a><input class="btn-back" type="submit" value="Submit"></a>
</div>
</form>
             </div><!-- eo box -->
              
        </div> <!-- eo gigcontiner --> 
        <div class="btns2">
              <a href="<?php echo URLROOT;?>/pages/donationHistoryBeneficiary"><button class="btn-back">Back</button></a>
            </div>            
      </div> <!-- eo main-container -->   

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
    </script>
  </body>
</html>