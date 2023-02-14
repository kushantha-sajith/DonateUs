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
            <a href="<?php echo URLROOT; ?>/beneficiary/requests">
                <i class="bx bx-list-check"></i>
                <span class="links_name">Donation Requests</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/beneficiary/donationHistory_beneficiary">
                <i class="bx bx-history"></i>
                <span class="links_name">Donation History</span>
            </a>
        </li>
        <!-- <li>
            <a href="#">
                <i class="bx bx-message-alt-detail"></i>
                <span class="links_name">Forum</span>
            </a>
        </li> -->
        
        <li>
            <a href="<?php echo URLROOT; ?>/beneficiary/stats">
                <i class="bx bx-pie-chart-alt"></i>
                <span class="links_name">Stats</span>
                
            </a>
        </li>

        <li id="item1">
          <a href="#">
            <i class="bx bxs-calendar-check"></i>
            <span class="links_name">Calendar</span>
          </a>
        </li>

        <li id="item2">
          <a href="#">
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

      
    </script>