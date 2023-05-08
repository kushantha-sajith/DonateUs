<div class="sidebar">
      <div class="logo-details">
      <img src="<?php echo URLROOT; ?>/img/logo_.png" alt="logo" class="logo"/>

      </div>
      
      <ul class="nav-links">
        <li>
          <a href="<?php echo URLROOT; ?>/donor/index">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo URLROOT; ?>/pages/donationRequestsDonor">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Donation Requests</span>
          </a>
        </li>
        <li>
          <a href="<?php echo URLROOT; ?>/donor/eventsDonor">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Events</span>
          </a>
        </li>
        <li>
          <a href="<?php echo URLROOT; ?>/donor/reservationsDonor">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Reservations</span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo URLROOT; ?>/pages/donationHistoryDonor">
            <i class="bx bx-history"></i>
            <span class="links_name">Donation History</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-conversation"></i>
            <span class="links_name">Forum</span>
          </a>
        </li> -->
        <li>
          <a href="<?php echo URLROOT; ?>/donor/stats">
            <i class="bx bx-pie-chart-alt"></i>
            <span class="links_name">Stats</span>
          </a>
        </li>
        <li id="item1">
          <a href="<?php echo URLROOT; ?>/donor/sponsorshipsDonor">
            <i class="bx bxs-dollar-circle"></i>
            <span class="links_name">Sponsor</span>
          </a>
        </li>
        <li>
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
       
        switch (type) {
      case '2':
        menuitem1.style.display = "none";
          menuitem2.style.display = "none";
        document.getElementById("corp1").style.display = "none";
          document.getElementById("corp2").style.display = "none";
          document.getElementById("corp3").style.display = "none";
          document.getElementById("corp4").style.display = "none";
          document.getElementById("corp5").style.display = "none";
          document.getElementById("corp6").style.display = "none";
          document.getElementById("corp7").style.display = "none";
          document.getElementById("corp8").style.display = "none";
          document.getElementById("corp9").style.display = "none";
        break;
      case '3':
        menuitem1.style.display = "block";
          menuitem2.style.display = "block";
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

      
    </script>