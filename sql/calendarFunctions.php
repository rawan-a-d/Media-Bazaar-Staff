<?php 
	include("config/dbConfig.php");

	// UPDATE
	/* Cancel shift due to sickness */
	function cancelShift($date, $employeeId){
		global $conn;

		try {
			$employeeId = $employeeId;
			$chosenDate = $date;
			$status = 'Cancelled';

			// Create sql query
			$sql = "UPDATE `schedule` SET `statusOfShift`= :status WHERE employeeId = :employeeId && date = :chosenDate";

			$statement = $conn -> prepare($sql);

			// bind parameters to values
			$statement->bindParam(':employeeId', $employeeId);
			$statement->bindParam(':chosenDate', $chosenDate);
			$statement->bindParam(':status', $status);

			$statement->execute();

			$result = $statement->fetch();

			// Close DB connection
			$conn = null;
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}
	}

	/* Confirm attendance */
	function confirmAttendance($date, $employeeId){
		global $conn;

		try {
			$employeeId = $employeeId;
			$chosenDate = $date;
			$status = 'Confirmed';

			// Create sql query
			$sql = "UPDATE `schedule` SET `statusOfShift`= :status WHERE employeeId = :employeeId && date = :chosenDate";

			$statement = $conn -> prepare($sql);

			// bind parameters to values
			$statement->bindParam(':employeeId', $employeeId);
			$statement->bindParam(':chosenDate', $chosenDate);
			$statement->bindParam(':status', $status);

			$statement->execute();

			$result = $statement->fetch();

			// Close DB connection
			$conn = null;
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}
	}

	// SELECT
	/* Check if morning shift is full */
	function checkShiftsMorning($date){
		$morningShiftWorkers = 0;
		$statusAssigned = 'Assigned';
		$statusConfirmed = 'Confirmed';
		$shiftType = 'Morning';
	 	global $conn;

		try {

			// 	Create sql query
			$sql = "SELECT * FROM schedule WHERE date = :date && shiftType = :shiftType && (statusOfShift = :statusAssigned || statusOfShift = :statusConfirmed)";

			$statement = $conn -> prepare($sql);

			// 	// bind parameters to values
			$statement->bindParam(':date', $date);
			$statement->bindParam(':statusAssigned', $statusAssigned);
			$statement->bindParam(':statusConfirmed', $statusConfirmed);
			$statement->bindParam(':shiftType', $shiftType);

			$statement->execute();

			$result = $statement->fetchAll();

			$morningShiftWorkers = sizeof($result);

			// If shift is full
			if($morningShiftWorkers >= 5){
				return true;
			}
			return false;
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}		
	}

	/* Check if afternoon shift is full */
	function checkShiftsAfternoon($date){
		$afternoonShiftWorkers = 0;
		$statusAssigned = 'Assigned';
		$statusConfirmed = 'Confirmed';
		$shiftType = 'Afternoon';
	 	global $conn;


		try {
			// 	Create sql query
			$sql = "SELECT * FROM schedule WHERE date = :date && shiftType = :shiftType && (statusOfShift = :statusAssigned || statusOfShift = :statusConfirmed)";

			$statement = $conn -> prepare($sql);

			// 	// bind parameters to values
			$statement->bindParam(':date', $date);
			$statement->bindParam(':statusAssigned', $statusAssigned);
			$statement->bindParam(':statusConfirmed', $statusConfirmed);
			$statement->bindParam(':shiftType', $shiftType);

			$statement->execute();

			$result = $statement->fetchAll();

			$afternoonShiftWorkers = sizeof($result);

			// If shift is full
			if($afternoonShiftWorkers >= 5){
				return true;
			}
			return false;
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}			
	}

	/* Check if evening shift is full */
	function checkShiftsEvening($date){
		$eveningShiftWorkers = 0;
		$statusAssigned = 'Assigned';
		$statusConfirmed = 'Confirmed';
		$shiftType = 'Evening';
		global $conn;

		try {
			// 	Create sql query
			$sql = "SELECT * FROM schedule WHERE date = :date && shiftType = :shiftType && (statusOfShift = :statusAssigned || statusOfShift = :statusConfirmed)";

			$statement = $conn -> prepare($sql);

			// 	// bind parameters to values
			$statement->bindParam(':date', $date);
			$statement->bindParam(':statusAssigned', $statusAssigned);
			$statement->bindParam(':statusConfirmed', $statusConfirmed);
			$statement->bindParam(':shiftType', $shiftType);

			$statement->execute();

			$result = $statement->fetchAll();

			$eveningShiftWorkers = sizeof($result);

			// If shift is full
			if($eveningShiftWorkers >= 5){
				return true;
			}
			return false;
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}	
	}

	/* Check if user has a shift on a specific date */
	function DoIHaveWork($date, $employeeId){
		global $conn;

		try {
			// 	// Create sql query
			$sql = "SELECT `shiftType`, `statusOfShift` FROM `schedule` WHERE `employeeId` = :employeeId AND `date` = :chosenDate";

			$statement = $conn -> prepare($sql);

			// 	// bind parameters to values
			$statement->bindParam(':employeeId', $employeeId);
			$statement->bindParam(':chosenDate', $date);

			$statement->execute();

			$result = $statement->fetch();

			// if(sizeof($result) > 0){
			// 	return true;
			// }
			// return false;
			return $result;
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}
	}



	/* Check if shift is full */
	function isShiftFull($date, $shiftType){
		$shiftWorkers = 0;
		$statusAssigned = 'Assigned';
		$statusConfirmed = 'Confirmed';
	 	global $conn;

		try {

			// 	Create sql query
			$sql = "SELECT * FROM schedule WHERE date = :date && shiftType = :shiftType && (statusOfShift = :statusAssigned || statusOfShift = :statusConfirmed)";

			$statement = $conn -> prepare($sql);

			// 	// bind parameters to values
			$statement->bindParam(':date', $date);
			$statement->bindParam(':statusAssigned', $statusAssigned);
			$statement->bindParam(':statusConfirmed', $statusConfirmed);
			$statement->bindParam(':shiftType', $shiftType);

			$statement->execute();

			$result = $statement->fetchAll();

			$shiftWorkers = sizeof($result);

			// If shift is full
			if($shiftWorkers >= 5){
				return true;
			}
			return false;
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}		
	}

	/* Get user's shift */
	function getShifts($employeeId){
		global $conn;

		// Create sql query
		$sql = "SELECT * FROM schedule WHERE employeeId = :employeeId ";

		$statement = $conn -> prepare($sql);

		// bind parameters to values
		$statement->bindParam(':employeeId', $employeeId);

		$statement->execute();

		$result = $statement->fetchAll();

		return $result;	
	}


	/* Check if user already has a shift on a specific date */
	function doesUserHasShift($employeeId, $date){
		global $conn;

		// Insert
	    // Check if user has another shift on same day
		// Create sql query
		$sql = "SELECT * FROM `schedule` WHERE employeeId = :employeeId && date = :chosenDate";

		$statement = $conn -> prepare($sql);

		// bind parameters to values
		$statement->bindParam(':employeeId', $employeeId);
		$statement->bindParam(':chosenDate', $date);

		$statement->execute();

		$result = $statement->fetchAll();

		return $result;
	}



	// INSERT
	/* Popose a shift */
	function proposeShift($employeeId, $date, $shiftType){
		global $conn;

		$status = 'Proposed';

		// Create sql query
		$sql = "INSERT INTO `schedule`(`employeeId`, `shiftType`, `date`, `statusOfShift`) VALUES (:employeeId, :shiftType, :chosenDate, :status)";

		$statement = $conn -> prepare($sql);

		// bind parameters to values
		$statement->bindParam(':employeeId', $employeeId);
		$statement->bindParam(':shiftType', $shiftType);
		$statement->bindParam(':chosenDate', $date);
		$statement->bindParam(':status', $status);

		$statement->execute();

		$result = $statement->fetch();
	}


	// DELETE
	function cancelProposedShift($date, $employeeId){
		global $conn;

		try {
			$employeeId = $employeeId;
			$chosenDate = $date;

			// Create sql query
			$sql = "DELETE FROM `schedule` WHERE employeeId = :employeeId && date = :chosenDate";

			$statement = $conn -> prepare($sql);

			// bind parameters to values
			$statement->bindParam(':employeeId', $employeeId);
			$statement->bindParam(':chosenDate', $chosenDate);

			$statement->execute();

			$result = $statement->fetch();

			// Close DB connection
			$conn = null;
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}		
	}

 ?>