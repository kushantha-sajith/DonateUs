<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.css">
<div class="sidebar">
    <div class="logo-details">
        <img src="<?php echo URLROOT; ?>/img/logo_.png" alt="logo" class="logo"/>
    </div>
    <ul class="nav-links">
        <li>
            <a href="<?php echo URLROOT; ?>/pages/admin">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/#">
                <i class="bx bx-notification"></i>
                <span class="links_name">Notifications</span>
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
        <li>
            <a href="#">
                <i class="bx bx-message-alt-detail"></i>
                <span class="links_name">Feedbacks</span>
            </a>
        </li>
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
        <li class="log_out" id="logout">
            <a href="">
                <i class="bx bx-log-out"></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#logout').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out of your account.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log me out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms the action, redirect to the logout controller function
                    window.location.href = '<?php echo URLROOT; ?>/users/logout';
                }
            });
        });
    });
</script>