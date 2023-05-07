<div class="sidebar">
    <div class="logo-details">
        <!--        <i class="bx bx-grid-alt"></i>-->
        <!-- <h1><?php echo $data['title']; ?></h1> -->
        <!--        <span class="logo_name">Dashboard</span>-->
        <img src="<?php echo URLROOT; ?>/img/logo_.png" alt="logo" class="logo"/>
    </div>
<!--    <div class="welcome">-->
<!--        <span>Welcome</span>-->
<!--    </div>-->
    <ul class="nav-links">
        <li>
            <a href="<?php echo URLROOT; ?>/beneficiary/index">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URLROOT; ?>/beneficiary/allDonations">
                <i class="bx bx-list-check"></i>
                <span class="links_name">Donation Requests</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/donationHistoryBeneficiary">
                <i class="bx bx-history"></i>
                <span class="links_name">Donation History</span>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URLROOT; ?>/beneficiary/stats">
                <i class="bx bx-pie-chart-alt"></i>
                <span class="links_name">Stats</span>
                
            </a>
        </li>

        <li id="item1">
          <a href="<?php echo URLROOT; ?>/beneficiary/viewCalendar">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Calendar</span>
          </a>
        </li>

        <li id="item2">
          <a href="<?php echo URLROOT; ?>/beneficiary/viewReservation">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Reservations</span>
          </a>
        </li>

        <li id="item3">
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


<script>
      window.onload = function () {
        
        let type = "<?php echo $_SESSION['user_type']; ?>";
        let menuitem1 = document.getElementById("item1");
        let menuitem2 = document.getElementById("item2");
        let menuitem3 = document.getElementById("item3");
       
        switch (type) {
      case '4':
        menuitem1.style.display = "none";
          menuitem2.style.display = "none";
          menuitem3.style.display = "none";
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

        break;
      case '5':
        menuitem1.style.display = "block";
          menuitem2.style.display = "block";
          menuitem3.style.display = "block";
          document.getElementById("ind1").style.display = "none";
          document.getElementById("ind2").style.display = "none";
          document.getElementById("ind3").style.display = "none";
          document.getElementById("ind4").style.display = "none";
          document.getElementById("ind5").style.display = "none";
          document.getElementById("ind6").style.display = "none";
        break;
      default:
        break;
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
  
       

      //  // js for drop down list 
      // const optionMenu = document.querySelector(".select-menu"),
      //      selectBtn = optionMenu.querySelector(".select-btn"),
      //      options = optionMenu.querySelectorAll(".option"),
      //      sBtn_text = optionMenu.querySelector(".sBtn-text");

      //  selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

      //  options.forEach(option => {
      //      option.addEventListener("click", () => {
      //          let selectedOption = option.querySelector(".option-text").innerText;
      //          sBtn_text.innerText = selectedOption;

      //          optionMenu.classList.remove("active");
      //      });
      //  });

   </script>
      
 