<div class="sidebar">
      <div class="logo-details">
      <img src="<?php echo URLROOT; ?>/img/logo_.png" alt="logo" class="logo"/>

      </div>
      <ul class="nav-links">
        <li>
          <a href="<?php echo URLROOT; ?>/pages/organizer">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo URLROOT; ?>/EOrganizer/CreateEvent">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Create Events</span>
          </a>
        </li>
        <li>
        <a href="<?php echo URLROOT; ?>/EOrganizer/EventDetails/0">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Event Details</span>
          </a>
        </li>
        <li>
        <a href="<?php echo URLROOT; ?>/EOrganizer/DonationHistory">
            <i class="bx bx-conversation"></i>
            <span class="links_name">Event Donation History</span>
          </a>
        </li>
        <li >
        <a href="<?php echo URLROOT; ?>/EOrganizer/Sponserships">
            <i class="bx bxs-dollar-circle"></i>
            <span class="links_name">Sponsorships</span>
          </a>
        </li>
        <li >
        <a href="<?php echo URLROOT; ?>/EOrganizer/Reports">
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