<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Calendar</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_donation_req.css" /> 
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_req.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/calendar.css" /> 
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_user.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

<?php require APPROOT.'/views/inc/side_navbar_beneficiary.php';?>


<section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Donation Request</span>
            </div>

            <div class="profile-details">
                <div class="notification">
                    <i class="bx bx-bell bx-tada notification"></i>
                </div>
                <a href="<?php echo URLROOT; ?>/pages/profileBeneficiary"><img src="<?php echo URLROOT; ?>/img/img_profile.png" alt="" /></a>
                
            </div>
        </nav>

        <div class="main-container">

	  <div class="months">
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
</div>
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
				
			<h2>Do you want to add a reservation</h2>
            <?php foreach($data['user_data'] as $user ): ?>
	  
                <form action="<?php echo URLROOT;?>/beneficiary/makeReservation/<?php echo $user->id;  ?>" method="POST">
                    <div class="formfirst"> 
                        <div class="details personal"> 

                            <div class="fields"> 
								<div class="input-field">
                                    <label>Meal type</label>
                                    <input id="meal_type" type="text" name="meal_type" value="" > 
									<!-- readonly values can be read by the post method, but cannot be edited by the user -->
                                </div>
								<div class="input-field">
                                    <label>Date</label>
                                    <input type="text" id="date" name="date" value="" >
                                   
                                </div>
								 <div class="input-field">
                                    <label>Month</label>
                                    <input id="month" type="text" name="month" value=""  >
                                  
                                </div>
								<div class="input-field">
                                    <label>Year</label>
                                    <input id="year" type="text" name="year" value=""  >
                                    
                                </div>
								<div class="input-field">
                                    <label>Quantity</label>
                                    <input id="quantity" type="text" name="quantity" value=""  >
                                    
                                </div>

	  						</div>
							

                        <input class="btn-submit-popup" type="submit" value="Submit" >
                            
                    </div><!-- eo details personal -->
	  </div> <!-- eo formfirst -->
                </form>
	  <?php endforeach; ?>


				<button class="popup-close"></button>

		</div> <!-- eo content -->
		
	</div> <!-- eo popup -->
			</div>
	
	   <!-- eo calendar -->
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
					if((i < (currentDate)) && (month == today.getMonth()) && (year == today.getFullYear())){
						//if today
						if((i == currentDate) && (month == today.getMonth()) && (year == today.getFullYear())){
							$('.days').append('<div class="current-day"> <a href="<?php echo URLROOT; ?>/beneficiary/reservationsOfADay/'+i+'/'+month+'/'+year+'"><span>' + i + '</span></a><span class="today-text"><b>Today</b></span> <div class="meals" id="' + i + '"> </div></div></a>');
						}else{ //if other days until today+two days except today
							$('.days').append('<div class="day"> <a href="<?php echo URLROOT; ?>/beneficiary/reservationsOfADay/'+i+'/'+month+'/'+year+'"><span>' + i + '</span></a><span class="today-text"><b></b></span> <div class="meals" id="' + i + '"> </div></div></a>');
						}
					}else{// days after today+two days
						$('.days').append('<div class="day" > <a href="<?php echo URLROOT; ?>/beneficiary/reservationsOfADay/'+i+'/'+month+'/'+year+'"><span>' + i + '</span></a> <div class="meals" id="' + i + '"> <div class="meal1">Breakfast</div> <div class="meal2">Lunch</div> <div class="meal3">Dinner</div> <div class="meal0">Reserved</div> </div></div>');
					}
				}

				// mark reserved dates
				<?php foreach($data['reservations'] as $reservation ): ?>
					//mark only it it's on or after today+two days
					if(<?php echo $reservation->date;  ?> >= (currentDate)){
						//check month and year
						if((month == <?php echo $reservation->month;  ?>) && (year == <?php echo $reservation->year;  ?>)){
							//check status for color-coding 
						if(<?php echo $reservation->status;  ?> == 1){
							//reserved and approved
							document.getElementById("<?php echo $reservation->date;  ?>").querySelector(".meal<?php echo $reservation->meal;  ?>").style.background = "blue";
						}else{
							//reserved and pending
							document.getElementById("<?php echo $reservation->date;  ?>").querySelector(".meal<?php echo $reservation->meal;  ?>").style.background = "orange";
						}
						
					}
					}
	  				
	  			<?php endforeach; ?>
					
				// Add click event to meals
				
				$('.meal1').click(function() {
					//get the id value of parent element
					var date = $(this).parent().attr('id');
					//display the popup
					$('.popup').fadeIn();
					//set valuse of the input fields
					$('#meal_type').val("Breakfast");
					$('#date').val(date);
					$('#month').val(month+1);
					$('#year').val(year);
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
					$('#meal_type').val("Lunch");
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

// 				document.querySelectorAll('.day').forEach(function(day) {
//   day.addEventListener('click', function() {
//     // Get the value of the "id" attribute of the clicked element
//     var clickedId = this.id;
//     // Alert the value of the clickedId variable
//     window.alert(clickedId);
//   });
// });

// 				$('.day').forEach(function(day) {
// 					day.addEventListener('click', function() {
//     // Get the value of the "id" attribute of the clicked element
//     var clickedId = $(this).attr('id');
//     // Alert the value of the clickedId variable
//     window.alert(clickedId);
//   });
// });

	// 				var clicked_date = $(this).attr('id');
	// 				window.alert(clicked_date);
	// 				var clicked_month = month;
	// 				var clicked_year = year;

	// 				var xhttp = new XMLHttpRequest();
	// 				xhttp.onreadystatechange = function() {
	// 					if (this.readyState == 4 && this.status == 200) {
		
	// }
	// 				};
	// 				var url = "<?php echo URLROOT; ?>/beneficiary/reservationsOfADay" + clicked_date + "/" + clicked_month + "/" + clicked_year;
	// 				xhttp.open("GET", url, true);
	// 				xhttp.send();


  	// 				// if ($('.formfirst').checkValidity()) {
    // 				// 	$('.btn-submit-popup').disabled = false;
  	// 				// } else {
    // 				// 	$('.btn-submit-popup').disabled = true;
  	// 				// }
				
	// 			});

						
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
			highlightMonthCircle(currentMonth);

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
				highlightMonthCircle(currentMonth);
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
				highlightMonthCircle(currentMonth);
				}
				
			});

			// Add click event to next button
			$('.next-month').click(function() {
				if (currentMonth == 11) {
					currentMonth = 0;
					currentYear++;
				} else {
					currentMonth++;
				}
				populateCalendar(currentMonth, currentYear);
				highlightMonthCircle(currentMonth);
			});

			// Add click event to close button
			$('.popup-close').click(function() {
				$('.popup').fadeOut();
			});

			for (let i = 0; i < 12; i++) {
				$(monthsArray[i]).click(function() {
					currentMonth = i;
					populateCalendar(currentMonth, currentYear);
					highlightMonthCircle(currentMonth);
			});
			}

			
		});
		
	</script>



        <!-- <script>
       

       // js for drop down list 
      const optionMenu = document.querySelector(".select-menu"),
           selectBtn = optionMenu.querySelector(".select-btn"),
           options = optionMenu.querySelectorAll(".option"),
           sBtn_text = optionMenu.querySelector(".sBtn-text");

       selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

       options.forEach(option => {
           option.addEventListener("click", () => {
               let selectedOption = option.querySelector(".option-text").innerText;
               sBtn_text.innerText = selectedOption;

               optionMenu.classList.remove("active");
           });
       });

   </script> -->
</body>

</html>
