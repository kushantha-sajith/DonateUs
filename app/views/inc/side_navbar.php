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
            <a href="<?php echo URLROOT; ?>/pages/admin">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/adminPages/donors">
                <i class="bx bx-user"></i>
                <span class="links_name">Users</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/adminPages/verifyBeneficiaries">
                <i class="bx bx-user"></i>
                <span class="links_name">Verify New Users</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/adminPages/pendingRequests">
                <i class="bx bx-list-check"></i>
                <span class="links_name">Donation Requests</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admin/financialDonationHistory">
                <i class="bx bx-history"></i>
                <span class="links_name">Donation History</span>
            </a>
        </li>
        <!--        <li>-->
        <!--            <a href="#">-->
        <!--                <i class="bx bx-message-alt-detail"></i>-->
        <!--                <span class="links_name">Feedbacks</span>-->
        <!--            </a>-->
        <!--        </li>-->
        <li>
            <a href="<?php echo URLROOT; ?>/admin/categories">
                <i class="bx bx-list-ul"></i>
                <span class="links_name">Donation Categories</span>
            </a>
        </li>
        <!--        <li>-->
        <!--            <a href="#">-->
        <!--                <i class="bx bx-conversation"></i>-->
        <!--                <span class="links_name">Forum</span>-->
        <!--            </a>-->
        <!--        </li>-->
        <li>
            <a href="<?php echo URLROOT; ?>/adminPages/pendingEvents">
                <i class="bx bx-calendar-check"></i>
                <span class="links_name">Events</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admin/eventHistory">
                <i class="bx bx-history"></i>
                <span class="links_name">Event Donation History</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admin/stats">
                <i class="bx bx-pie-chart-alt"></i>
                <span class="links_name">Stats</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admin/reports">
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