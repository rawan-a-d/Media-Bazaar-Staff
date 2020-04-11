<?php
	/* Check session */
	include("config/session.php");
	/* Session expiry */
	include('config/session_expiry.php');

	include("sql/calendarFunctions.php");

	/* Cancel, call in sick */
	if(isset($_POST['cancelShift'])){
		$date = $_POST['date'];
		$employeeId = $_SESSION['employeeId'];

		cancelShift($date, $employeeId);
	}

	/* Confirm attendance */
	if(isset($_POST['confirm'])){
		$date = $_POST['date'];
		$employeeId = $_SESSION['employeeId'];

		confirmAttendance($date, $employeeId);
	}

	// Monthly calendar
	function build_calendar($month, $year){
		$employeeId = $_SESSION['employeeId'];
		getShifts($employeeId);

		// Array containing names of all days in a week
		$daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

		// First day of the month that is in the argument of this function
		$firstDayOfMonth = mktime(0,0,0,$month,1,$year);

		// Number of days this month contains
		$numberDays = date('t', $firstDayOfMonth);

		global $dateComponents;
		// Some information about the first day of this month
		$dateComponents = getdate($firstDayOfMonth);

		// Name of this month
		$monthName = $dateComponents['month'];

		// Index value 0-6 of the first day of this month (starting monday)
		$dayOfWeek = $dateComponents['wday'] - 1;

		// Current date
		$dateToday = date('Y-m-d');

		// Creating the HTML table
		$calendar = "<div class='table table-bordered'>";
		$calendar .= "<h2 id='month'>$monthName $year</h2>";

		$calendar .= "<div id='wrapper'>";
		// View type (Monthly, Weekly)
		$calendar .= "<button class='viewType'><a href='weekly_calendar.php' type='submit'>Weekly calendar</a></button>";
		$calendar .= "<button class='viewType active'><a href='#' type='submit'>Monthly calendar</a></button></div>";

		// Next month
		$calendar .= "<div id='wrapperSwitchMonth'><button class='switchMonth'><a href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></button>";
		// Previous month
		$calendar .= "<button class='switchMonth'><a href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a></button></div>";

		$calendar .= "<div id='header'>";

		// Calendar headers
		foreach ($daysOfWeek as $day) {
			$calendar .= "<div class='day'>$day</div>";
		}

		$calendar .= "</div><div class='container'>";

		// The variable $dayOfWeek will make sure that there must be only 7 columns or our table
		if($dayOfWeek > 0){
			for ($i=0; $i < $dayOfWeek; $i++) { 
				$calendar .= "<div class='box empty'></div>";
			}
		}

		// Initiating the day counter
		$currentDay = 1;

		// Getting the month number
		$month = str_pad($month, 2, "0", STR_PAD_LEFT);

		// Today date
		$todayDate = new DateTime(date('Y-m-d'));


		while ($currentDay <= $numberDays) {
			// If seventh culomn (Sunday) was reached, start a new row
			if($dayOfWeek == 7){
				$dayOfWeek = 0;
			}

			$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

			$date = "$year-$month-$currentDayRel";

			$dayname = strtolower(date('l', strtotime($date)));

			$today = $date==date('Y-m-d')?"today":"";

			// Current date as DateTime
			$currentDate = new DateTime($date);

			// Weekend
			if($dayname == 'saturday' || $dayname =='sunday'){
				$calendar .= "<div class='box'><h4> $currentDay <p class='daySmallScreen'>$dayname</p></h4> <a class='btn holiday'>Holiday</a>";
			}
			// Old dates
			elseif($date < date('Y-m-d')){
				// Check employee's agenda
				$result = DoIHaveWork($date, $employeeId);
				// If employee has a shift
				if($result != null){
					$calendar .= "<div class='box scheduled $today'><h4> $currentDay <p class='daySmallScreen'>$dayname</p></h4><p>".$result[0]."<br>". $result[1] ."</p>";
				}
				else {
					$calendar .= "<div class='box'><h4> $currentDay <p class='daySmallScreen'>$dayname</p></h4>";
				}
			}
			else {
				$employeeId = $_SESSION['employeeId'];
				// Check employee's agenda
				$result = DoIHaveWork($date, $employeeId);

				// If employee has a shift
				if($result != null){
					$interval = $todayDate->diff($currentDate);
					$interval = $interval->format('%R%a');

					// If result is assigned and it's after 7 days
					if($result[1] == 'Assigned' && $interval <= 7){
						$calendar .= "<div class='box scheduled $today'><h4> $currentDay <p class='daySmallScreen'>$dayname</p></h4><p>".$result[0]."<br>". $result[1] ."</p><form action='' method='POST'><button type='submit' name='confirm' class='btn confirm'>Confirm attendance</button><input type='hidden' name='date' value=".$date."></form>";
					}

					// Register as sick (Later). They can register a day before or same day. 
					else if($result[1] == 'Confirmed' && $interval <= 1){
						$calendar .= "<div class='box scheduled $today'><h4> $currentDay <p class='daySmallScreen'>$dayname</p></h4><p>".$result[0]."<br>". $result[1] ."</p><form action='' method='POST'><button type='submit' name='cancelShift' class='btn cancel'>Call in sick</button><input type='hidden' name='date' value=".$date."></form>";	;
					}
					else {
					// Confirm attendance
						$calendar .= "<div class='box scheduled $today'><h4> $currentDay <p class='daySmallScreen'>$dayname</p> </h4><p>".$result[0] ."<br>". $result[1] ."</p>";
					}						
				}
				// If user doesnt have a shift
				else {
					// Check number workers
					$morningShiftWorkers = checkShiftsMorning($date);
					$afternoonShiftWorkers = checkShiftsAfternoon($date);
					$eveningShiftWorkers = checkShiftsEvening($date);

					// Check if shifts are full
					if($morningShiftWorkers && $afternoonShiftWorkers && $eveningShiftWorkers){
						$calendar .= "<div class='box $today'><h4> $currentDay <p class='daySmallScreen'>$dayname</p> </h4> <a href='#' class='btn full'>Full</a>";
					}
					// Employee can propose shift
					else {
						$calendar .= "<div class='box $today'><h4> $currentDay <p class='daySmallScreen'>$dayname</p></h4> <a href='proposeShift.php?date=".$date."' class='btn propose'>Propose</a>";
					}
				}
			}

			$calendar .= "</div>";

			// Incrementing the counters
			$currentDay++;
			$dayOfWeek++;
		}

		// Completing the row of the last week in month, if necessary
		if($dayOfWeek != 7){
			$remainingDays = 7-$dayOfWeek;
			for ($i=0; $i < $remainingDays ; $i++) { 
				$calendar .= "<div class='box empty'></div>";
			}
		}
		$calendar .= "</div>";

		$calendar .= "</div>";

		$calendar .= "</div>";

		echo $calendar;
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Monthly Calendar</title>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/calendar.css">
	</head>
	<body>
		<h1><?php echo $_SESSION['employeeId']; ?></h1>
		<main id="main">
			<div id="calendar">
				<?php 
					$dateComponents = getdate();
					if(isset($_GET['month']) && isset($_GET['year'])){
						$month = $_GET['month'];
						$year = $_GET['year'];
					}
					else {
						$month = $dateComponents['mon'];
						$year = $dateComponents['year'];
					}
					build_calendar($month, $year);
				 ?>
			</div>
		</main>
		<script
  		src="https://code.jquery.com/jquery-3.4.1.js"
		  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		  crossorigin="anonymous"></script>		
		<script type="text/javascript" src="js/calendar.js"></script>
	</body>
</html>