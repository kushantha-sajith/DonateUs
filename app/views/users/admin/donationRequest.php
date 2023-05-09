<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<!--navigation bar left-->
<?php require APPROOT . '/views/inc/side_navbar.php'; ?>
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
            <img src="<?php echo URLROOT; ?>/img/profile_pic.svg" alt=""/>
            <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
            <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
    </nav>


    <main>
<!--        <div style="text-align: center;"><a href="--><?php //echo URLROOT; ?><!--/pages/addNewRequest">-->
<!--                <button class="btnview btnadd">Add New Request</button>-->
<!--            </a></div>-->
<!--        <br>-->
        <!--        <div>-->
        <!--            <form>-->
        <!--                <input type="text" placeholder="&#xf002; Search Donor..." class="jssearch" oninput=get_data()>-->
        <!--            </form>-->
        <!--            <a href="--><?php //echo URLROOT; ?><!--/adminPages/pendingRequests">-->
        <!--                <button class="reset">Reset</button>-->
        <!--            </a>-->
        <!--        </div>-->
        <div class="select-menu">
            <div class="select-btn">
                    <span class="material-icons">
                        pending_actions
                    </span>
                <span class="option-text">Pending Requests</a></span>
                <i class="bx bx-chevron-down"></i>
            </div>
            <ul class="options">
                <a href="<?php echo URLROOT; ?>/adminPages/pendingRequests" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons"
                                  style="color: black; margin-right: 1rem;">pending_actions</span>
                        <span class="option-text"> Pending Requests</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT; ?>/adminPages/rejectedRequests" style="text-decoration:none">
                    <li class="option">
                        <span class="material-icons" style="color: black; margin-right: 1rem;">error</span>
                        <span class="option-text">Rejected Requests</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT; ?>/adminPages/ongoingRequests" style="text-decoration:none">
                    <li class="option">
                        <span class="material-icons" style="color: black; margin-right: 1rem;">receipt_long</span>
                        <span class="option-text">Ongoing Requests</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT; ?>/adminPages/completedRequests" style="text-decoration:none">
                    <li class="option">
                            <span class="material-icons"
                                  style="color: black; margin-right: 1rem;">assignment_turned_in</span>
                        <span class="option-text">Completed Requests</span>
                    </li>
                </a>
            </ul>
        </div>
        <div class="jstable">
            <div class="cards_heading head">
                <div>ID</div>
                <div>Request Title</div>
                <div>Beneficiary Name</div>
                <div>Category</div>
                <div>Donation Type</div>
                <div>Amount / Quantity</div>
                <div></div>
            </div>
            <?php foreach ($data['pendingRequests'] as $pendingRequests) : ?>
                <div class="cards_heading cards_color">
                    <div><?php echo $pendingRequests->id; ?></div>
                    <div><?php echo $pendingRequests->request_title; ?></div>
                    <div><?php echo $pendingRequests->ben_id; ?></div>
                    <div><?php echo $pendingRequests->category_name; ?></div>
                    <div><?php echo $pendingRequests->req_type; ?></div>
                    <div><?php echo $pendingRequests->amount; ?></div>
                    <div>
                        <div style="text-align: center;"><a
                                href="<?php echo URLROOT; ?>/pages/pendingRequestDetails/<?php echo $pendingRequests->id; ?>">
                                <button class="btnview">View More</button>
                            </a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</section>
<!--home section end-->

<script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function get_data() {
        var text = document.querySelector(".jssearch").value;
        var form = new FormData();

        form.append('text', text);
        var ajax = new XMLHttpRequest();
        ajax.addEventListener('readystatechange', (e) => {
            if (ajax.readyState == 4 && ajax.status == 200) {
                //res
                // console.log(ajax.responseText);..
                var obj = JSON.parse(ajax.responseText);
                console.log(obj);
                var resultdiv = document.querySelector(".jstable");
                if (resultdiv) { // check if the element exists
                    //TODO
                    var str = "<table><thead><tr><th>Name</th><th>Email</th><th>Age</th><th>User NIC</th><th>City</th><th>Tel Number</th><th></th></tr></thead>";
                    for (var i = obj.length - 1; i >= 0; i--) {
                        console.log(obj[i].request_title);
                        str += "<tr><td>" + obj[i].id +
                            "</td> <td>" + obj[i].request_title +
                            "</td> <td>" + obj[i].ben_id +
                            "</td> <td>" + obj[i].category_name +
                            "</td> <td>" + obj[i].req_type +
                            "</td> <td>" + obj[i].amount +
                            "</td></tr>";
                    }
                    resultdiv.innerHTML = str;
                    // console.log('Hello');
                }
            }
        })
        ajax.open('post', '<?php echo URLROOT; ?>/adminPages/liveSearch', true);
        ajax.send(form);
    }
</script>
</body>

</html>