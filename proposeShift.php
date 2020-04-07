<?php 
	include("sql/calendarFunctions.php");
	$msg = '';
	$date = '';
	$shiftType = '';

	if(isset($_GET['date'])){
		$date = $_GET['date'];
	}

	if(isset($_POST['submit'])){
		// Current employee is
		$employeeId = 17;
		$shiftType = $_POST['shiftType'];

		// Check if shift is full
		$isShiftFull = isShiftFull($date, $shiftType);

		if(!$isShiftFull){
			$result = doesUserHasShift($employeeId, $date);

			if(sizeof($result) > 0){
				$msg = "Failure";
			}
			else {
				proposeShift($employeeId, $date, $shiftType);

				$msg = "Success";
			}
		}
		else {
			$msg = 'Full';
		}
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Propose shift</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/proposeShift.css">
	</head>
	<body>
		<main id="container">
			<h1>I'm available on: <?php echo $date; ?></h1><hr>
			<form action="" method="POST" autocomplete="off">
				<label for="">Shift Type</label>
				<select id="subject" name="shiftType">
					<option value="Morning">Morning</option>
					<option value="Afternoon">Afternoon</option>
					<option value="Evening">Evening</option>
				</select>
				<button class="btn" type="submit" name="submit">Submit</button>
			</form>	
		</main>

		<!-- Notification, Display msg -->
		<div class="notify"><span id="notifyType" class=""></span></div>

		<!-- Msg -->
		<input type="hidden" name="message" id="message" value="<?php echo $msg; ?>">

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script type="text/javascript" src="js/proposeShift.js"></script>
	</body>
</html>