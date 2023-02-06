<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
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
          <a href="<?php echo URLROOT; ?>/pages/donation_requests_donor">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Donation Requests</span>
          </a>
        </li>
        <li>
        <a href="<?php echo URLROOT; ?>/pages/donationHistory_donor">
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
          
            <a href="<?php echo URLROOT; ?>/pages/profile_donor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <main>

            <div class="select-menu">
                <div class="abc">
                    <h4>Filter By : Donation Catagory</h4>
                    <div class="select-btn">

                        <span class="option-text">Select Donation Catagory</a></span>
                        <i class="bx bx-chevron-down"></i>
                    </div>
                </div>


                <ul class="options">
                    <a href="donation_history.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                attach_money
                            </span>

                            <span class="option-text"> Financial Donations</span>
                        </li>
                    </a>
                    <a href="non_financial_donations.html.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                fastfood
                            </span>
                            <span class="option-text">Food Donations</span>
                        </li>
                    </a>
                    <a href="non_financial_donations.html.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                menu_book
                            </span>
                            <span class="option-text">Stationary Donations</span>
                        </li>
                    </a>
                    <a href="non_financial_donations.html.html" style="text-decoration:none">
                        <li class="option">
                            <span class="material-icons" style="color: black; margin-right: 1rem;">
                                medical_services
                            </span>
                            <span class="option-text">Medicine</span>
                        </li>
                    </a>

                </ul>
            </div>

            <div class="gigcontainer">
                <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/don_cat1.png">
                    </div>
                    <div class="easy">
                        <div class="name_job">I Need Money For My Moms Oparation</div>
                        <p>Donation Catagory : Financial</p>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>
                            I'm writing to you to ask you to support me
                            and my. Just a small donation of can help me
                            Your donation will go toward . possible, add a personal connection to tie the donor to the
                            cause.
                        </p>
                        <div class="skill-box">
                            <span class="title">Rs.60000 raised out of Rs.100000</span>

                            <div class="skill-bar">
                                <span class="skill-per"></span>
                            </div>
                        </div>
                        <div class="btns">
                            <button>View More</button>
                            <button>Donate</button>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/don_cat2.png">
                    </div>
                    <div class="easy">
                        <div class="name_job">I Need Money For My Moms Oparation</div>
                        <p>Donation Catagory : Financial</p>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>
                            I'm writing to you to ask you to support me
                            and my. Just a small donation of can help me
                            Your donation will go toward . possible, add a personal connection to tie the donor to the
                            cause.
                        </p>
                        <div class="skill-box">
                            <span class="title">Rs.60000 raised out of Rs.100000</span>

                            <div class="skill-bar">
                                <span class="skill-per"></span>
                            </div>
                        </div>
                        <div class="btns">
                            <button>View More</button>
                            <button>Donate</button>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/don_cat4.png">
                    </div>
                    <div class="easy">
                        <div class="name_job">I Need Money For My Moms Oparation</div>
                        <p>Donation Catagory : Financial</p>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>
                            I'm writing to you to ask you to support me
                            and my. Just a small donation of can help me
                            Your donation will go toward . possible, add a personal connection to tie the donor to the
                            cause.
                        </p>
                        <div class="skill-box">
                            <span class="title">Rs.60000 raised out of Rs.100000</span>

                            <div class="skill-bar">
                                <span class="skill-per"></span>
                            </div>
                        </div>
                        <div class="btns">
                            <button>View More</button>
                            <button>Donate</button>
                        </div>
                    </div>
                </div>
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
</html>