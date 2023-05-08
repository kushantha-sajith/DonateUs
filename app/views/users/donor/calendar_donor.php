<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Reservations</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
	  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/calendar_donor.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
  </head>
  
  <body>
    <!--navigation bar left-->
    <?php require APPROOT.'/views/inc/side_navbar_donor.php';?>
    <!--navigation bar left end-->

    <!--home section start-->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Reservations</span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
          
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">

	  <div class="how_it_works">
      <h3>How It Works</h3>
      <div class="progress-container">
        <div class="progress" id="progress"></div>
        <div class="circle_a"><b>1</b></div>
        <ul class="instructions">
		<li>Choose a day</li>
          <li>Click on a meal</li>
          <li>Reserve & view your reservations</li>
          
        </ul>
        <div class="circle_a"><b>2</b></div>
        <ul class="instructions">
          <li>Get beneficiary contact details</li>
          <li>Contact them</li>
          <li>Deliver your donations</li>
        </ul>
        <div class="circle_a"><b>3</b></div>
        <ul class="instructions">
          <li>Go to your resrvations</li>
          <li>Mark the donation as delivered </li>
          <li>Send us your feedback</li>
        </ul>
        <div class="circle_a"><b>End</b></div>
     </div>

	  <?php foreach($data['user_data'] as $user ): ?>
		<?php $ben_id = $user->user_id;  ?>
	  <h1 class="org-name"><?php echo $user->org_name;  ?></h1>
	  <?php endforeach; ?>
	  <!-- <div class="months">
		<div >
			<ul class="month-line">
				<li><span class="month-circle">Jan</span></li>
				<li><span class="month-circle">Feb</span></li>
				<li><span class="month-circle">Mar</span></li>
				<li><span class="month-circle">Apr</span></li>
				<li><span class="month-circle">May</span></li>
				<li><span class="month-circle">Jun</span></li>
				<li><span class="month-circle">Jul</span></li>
				<li><span class="month-circle">Aug</span></li>
				<li><span class="month-circle">Sep</span></li>
				<li><span class="month-circle">Oct</span></li>
				<li><span class="month-circle">Nov</span></li>
				<li><span class="month-circle">Dec</span></li>
			</ul>
		
		</div>
 </div> eo months -->
      <div class="calendar">
		<div class="header">
			<button class="prev-month">&lt;</button>
			<span class="month-year">
			<h2 class="current-month"></h2>
			<h1 class="current-year"></h1>
			</span>
			<button class="next-month">&gt;</button>
		</div>
		<div class="divider"></div>
		<div class ="day-header" >
			<div class="day"><b>Sun</b></div>
			<div class="day"><b>Mon</b></div>
			<div class="day"><b>Tue</b></div>
			<div class="day"><b>Wed</b></div>
			<div class="day"><b>Thu</b></div>
			<div class="day"><b>Fri</b></div>
			<div class="day"><b>Sat</b></div>
		</div>
		<div class="days"></div>
		<div class="popup">
			<div class="content">
				
			<h3>Reservation Details</h3>

                <form action="<?php echo URLROOT;?>/donor/makeReservationDonor/<?php echo $user->user_id;  ?>" method="POST">
                    <div class="formfirst"> 
                        <div class="details personal"> 
                            <!-- <span class="span_title"><u>Reservation Details</u></span> -->
                            <div class="fields"> 
                                
                                <div class="input-field">
                                    <label>Organization name</label>
                                    <input type="text" name="org_name" value="<?php echo $user->org_name;  ?>" disabled >
                                    
                                </div>
                                <div class="input-field">
                                    <label>Meal type</label>
                                    <input id="meal_type" type="text" name="meal_type" value="" readonly> 
									<!-- readonly values can be read by the post method, but cannot be edited by the user -->
                                </div>
								<div class="input-field">
                                    <label>Date</label>
                                    <input id="date" type="text" name="date" value="" readonly >
                                    
                                </div>
								<div class="input-field">
                                    <label>Month</label>
                                    <input id="month" type="text" name="month" value="" readonly >
                                  
                                </div>
								<div class="input-field">
                                    <label>Year</label>
                                    <input id="year" type="text" name="year" value="" readonly >
                                    
                                </div>

                                <div class="input-field">
                                    <label>Number of plates (Available)</label>
                                    <input id="plates" type="text" name="num_of_plates" value="" readonly>
                                   
                                </div>

                                <div class="input-field">
                                    <label>Count you prefer to reserve</label>
                                    <input class="required-input" type="number" name="amount_reserved" value="" min="1" required>
                                    <!-- required field to check before the submission of the form -->
                                </div>
	  						</div>
							<!-- <span class="span_title"><u>My Contact Details</u></span>
	  						<div class="fields"> 
								
                                <div class="input-field">
                                    <label>Contact number 1</label>
                                    <input class="required-input" type="text" name="contact1" placeholder="ex: +94XXXXXXXXX" value="" required>
                                  
                                </div>
                                <div class="input-field">
                                    <label>Contact number 2</label>
                                    <input class="required-input" type="text" name="contact2" placeholder="ex: +94XXXXXXXXX" value="" required>
                                  
                                </div>
                                <div class="input-field">
                                    <label>Email Address</label>
                                    <input class="required-input" type="text" name="email" placeholder="ex: abc@gamil.com" value="" required>
                                    
                                </div> -->
                                
                            <!-- </div>eo fields -->

                        <input class="btn-submit-popup" type="submit" value="Submit" >
                            
                    </div><!-- eo details personal -->
	  </div> <!-- eo formfirst -->
                </form>
				<button class="popup-close"></button>

		</div> <!-- eo content -->
		
	</div> <!-- eo popup -->
	
	  </div> <!-- eo calendar -->
	  
	  <div class="btns2">
	  <a href="<?php echo URLROOT;?>/donor/viewMealPlan/<?php echo $data['id'];?>/<?php echo $data['meal_plan'];?>"><button class="btn-back">View Meal Plan</button></a>
        <a href="<?php echo URLROOT;?>/donor/reservationsDonor"><button class="btn-back">Back</button></a>
    	</div> <!-- eo btns2 -->
		</div>
    </section>
    <!--home section end-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<script>
		$(document).ready(function() {
			// Initialize variables
			var today = new Date();
			var currentDate = today.getDate();
			var currentMonth = today.getMonth();
			var currentYear = today.getFullYear();
			
			// Populate calendar with days
			function populateCalendar(month, year) {
				// Set current month and year
				$('.current-month').text(months[month]);
				$('.current-year').text(year);

				// Get number of days in month and first day of month
				var daysInMonth = new Date(year, month + 1, 0).getDate();
				var firstDayOfMonth = new Date(year, month, 1).getDay();
				// document.cookie = "days = " + daysInMonth; // to be accessed in php later
				

				// Empty days div
				$('.days').empty();

				// Add days to calendar
				//days of last month
				for (var i = 0; i < firstDayOfMonth; i++) {
					$('.days').append('<div class="day"></div>'); //days of last month
				}
				//days of this month
				for (var i = 1; i <= daysInMonth; i++) {
					//days until today+two days
					if((i < (currentDate+2)) && (month == today.getMonth()) && (year == today.getFullYear())){
						//if today
						if((i == currentDate) && (month == today.getMonth()) && (year == today.getFullYear())){
							$('.days').append('<div class="current-day"> <span class="day-number">' + i + '</span><span class="today-text"><b>Today</b></span> <div class="meals" id="' + i + '"> </div></div>');
						}else{ //if other days until today+two days except today
							$('.days').append('<div class="day"> <span class="day-number">' + i + '</span><span class="today-text"><b></b></span> <div class="meals" id="' + i + '"> </div></div>');
						}
					}else{// days after today+two days
						$('.days').append('<div class="day"> <span class="day-number">' + i + '</span> <div class="meals" id="' + i + '"> <div class="meal1">Breakfast</div> <div class="meal2">Lunch</div> <div class="meal3">Dinner</div> <div class="meal0">Reserved</div> </div></div>');
					}
				}

				// // mark reserved dates
				// <?php foreach($data['reservations'] as $reservation ): ?>
				// 	//check month and year
				// 	if((month == <?php echo $reservation->month;  ?>) && (year == <?php echo $reservation->year;  ?>)){
				// 		//if it is current month
				// 		if((month == today.getMonth()) && (year == today.getFullYear())){
				// 			//mark only it it's on or after today+two days
				// 			if(<?php echo $reservation->date;  ?> >= (currentDate+2)){
				// 			//check status for color-coding 
				// 			if(<?php echo $reservation->status;  ?> == 1){
				// 				//reserved and approved
				// 				document.getElementById("<?php echo $reservation->date;  ?>").querySelector(".meal<?php echo $reservation->meal;  ?>").style.display = "none";
				// 			}else{
				// 				//reserved and pending
				// 				document.getElementById("<?php echo $reservation->date;  ?>").querySelector(".meal<?php echo $reservation->meal;  ?>").style.background = "orange";
				// 			}
				// 			}
				// 		}else{
				// 			if(<?php echo $reservation->status;  ?> == 1){
				// 				//reserved and approved
				// 				document.getElementById("<?php echo $reservation->date;  ?>").querySelector(".meal<?php echo $reservation->meal;  ?>").style.display = "none";
				// 			}else{
				// 				//reserved and pending
				// 				document.getElementById("<?php echo $reservation->date;  ?>").querySelector(".meal<?php echo $reservation->meal;  ?>").style.background = "orange";
				// 			}
				// 		}
						
				// 	}
	  				
	  			// <?php endforeach; ?>
					
				// Add click event to meals
				
				$('.meal1').click(function() {
					//get the id value of parent element
					var date = $(this).parent().attr('id');
					
					//display the popup
					$('.popup').fadeIn();
					var plates_reserved;
					var dataArray = [date, month, year, "1", "<?php echo $ben_id;?>" ];
					$.ajax({
           			url: '<?php echo URLROOT;?>/donor/getReservedPlatesCount/'+dataArray,
            		type: 'GET',
					data: { data_arr: JSON.stringify(dataArray) },
            		dataType: 'json',
            		success: function(response) {
						
						// if(response == NULL){
						// 	plates_reserved = 0;
						// }else{
						// 	
						// }
                		
						plates_reserved = parseInt(response);
						// return plates_reserved;
						window.alert(plates_reserved);
            		}
        			});
					
					var members = parseInt(<?php echo $data['members'];  ?>);
					var plates = members - plates_reserved;

					//set valuse of the input fields
					$('#meal_type').val("Breakfast");
					$('#date').val(date);
					$('#month').val(month+1);
					$('#year').val(year);
					$('#plates').val(plates);
					
					
					//add EventListener to catch the changes in the required fields
					$('.required-input').addEventListener('input', () => {
						//if the required fields are empty submit button is not active 
						if ($('.required-input').value === "") {
							
							$('.btn-submit-popup').disabled = true;
						}else{
							
							$('.btn-submit-popup').disabled = false;
						}

  					// if ($('.formfirst').checkValidity()) {
    				// 	$('.btn-submit-popup').disabled = false;
  					// } else {
    				// 	$('.btn-submit-popup').disabled = true;
  					// }
				});
					
				});

				$('.meal2').click(function() {
					var date = $(this).parent().attr('id');
					$('.popup').fadeIn();

					var plates_reserved;
					var dataArray = [date, month, year, "2", "<?php echo $ben_id;?>" ];
					$.ajax({
           			url: '<?php echo URLROOT;?>/donor/getReservedPlatesCount/'+dataArray,
            		type: 'GET',
					data: { data_arr: JSON.stringify(dataArray) },
            		dataType: 'json',
            		success: function(response) {
                		plates_reserved = response;
						// return plates_reserved;
						window.alert(plates_reserved);
            		}
        			});
					
					var members = parseInt(<?php echo $data['members'];  ?>);
					var plates = members - plates_reserved;

					$('#meal_type').val("Lunch");
					$('#date').val(date);
					$('#month').val(month+1);
					$('#year').val(year);
					$('#plates').val(plates);
					$('.required-input').addEventListener('input', () => {
						if ($('.required-input').value === "") {
							$('.btn-submit-popup').disabled = true;
						}else{
							$('.btn-submit-popup').disabled = false;
						}

  					// if ($('.formfirst').checkValidity()) {
    				// 	$('.btn-submit-popup').disabled = false;
  					// } else {
    				// 	$('.btn-submit-popup').disabled = true;
  					// }
				});
					
				});
				$('.meal3').click(function() {
					var date = $(this).parent().attr('id');
					$('.popup').fadeIn();
					$('#meal_type').val("Dinner");
					$('#date').val(date);
					$('#month').val(month+1);
					$('#year').val(year);
					$('.required-input').addEventListener('input', () => {
						if ($('.required-input').value === "") {
							$('.btn-submit-popup').disabled = true;
						}else{
							$('.btn-submit-popup').disabled = false;
						}

  					// if ($('.formfirst').checkValidity()) {
    				// 	$('.btn-submit-popup').disabled = false;
  					// } else {
    				// 	$('.btn-submit-popup').disabled = true;
  					// }
				});
					
				});
			
				
				// var parent = document.getElementById("12");
				// // parent.meals.getElementByClassName("meal1").style.display = "none";

				
				
				//begin from two days from today
				for (var n = (currentDate+2); n <= daysInMonth; n++) {
					//id of the element
					var eId = "" + n;
					//check whether each element is displaying or not using its height
					var breakfast = document.getElementById(eId).querySelector(".meal1").offsetHeight;
					var lunch = document.getElementById(eId).querySelector(".meal2").offsetHeight;
					var dinner = document.getElementById(eId).querySelector(".meal3").offsetHeight;
					//calculate total height
					var meal = breakfast + lunch + dinner;
					
				  	// if ($(element).length){
					// document.getElementById(eId).querySelector(".meal0").style.display = "block";
					// }

					//if total height is zero, it means all meals are reserved and approved
					if(meal === 0 ){
						document.getElementById(eId).querySelector(".meal0").style.display = "block";
						//document.getElementById(eId).style.backgroundImage = "url()";
					}

				}


			}
			//get all 'month-circle' class elements to an array
			var monthsArray = document.getElementsByClassName("month-circle");

			function highlightMonthCircle(month){
				
				for (let j = 0; j < 12; j++) {
					if(j==month){
						monthsArray[month].classList.add("active");
					}else{
						monthsArray[j].classList.remove("active");
					}
					
				}
			}

			// Get month name from month number
			var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

			// Populate calendar on page load
			populateCalendar(currentMonth, currentYear);
			// highlightMonthCircle(currentMonth);

			// Add click event to previous button
			$('.prev-month').click(function() {
				//no need to access last month and previous months
				if((currentYear == today.getFullYear()) && (currentMonth > today.getMonth())){
					if (currentMonth == 0) {
					currentMonth = 11;
					currentYear--;
				} else {
					currentMonth--;
				}
				populateCalendar(currentMonth, currentYear);
				// highlightMonthCircle(currentMonth);
				}
				//in other years
				if((currentYear > today.getFullYear())){
					if (currentMonth == 0) {
					currentMonth = 11;
					currentYear--;
				} else {
					currentMonth--;
				}
				populateCalendar(currentMonth, currentYear);
				// highlightMonthCircle(currentMonth);
				}
				
			});

			// Add click event to next button
			$('.next-month').click(function() {
				//can access only next month to reserve dates
				if((currentYear == today.getFullYear()) && (currentMonth == today.getMonth())){
				if (currentMonth == 11) {
					currentMonth = 0;
					currentYear++;
				} else {
					currentMonth++;
				}
				populateCalendar(currentMonth, currentYear);
				// highlightMonthCircle(currentMonth);

			}
			});

			// Add click event to close button
			$('.popup-close').click(function() {
				$('.popup').fadeOut();
			});

			for (let i = 0; i < 12; i++) {
				$(monthsArray[i]).click(function() {
					currentMonth = i;
					populateCalendar(currentMonth, currentYear);
					// highlightMonthCircle(currentMonth);
			});
			}

			
		});
	</script>
   
  </body>
</html>