<?php 
	// Rememeber me
	// If user wants to be remembered, keep his session as long as he's logged in

	// If not remove his session after 1 hour
	if(isset($_SESSION['userId']) && !isset($_SESSION['remember_me'])) {
		$current_time = time();
		if($current_time - $_SESSION['loggedin_time'] >= 3600){
			session_start();

			// Unset all of the session variables.
			unset($_SESSION['userId']);
			unset($_SESSION['username']);
			unset($_SESSION['remember_me']);
			unset($_COOKIE['uid']);
			// Finally, destroy the session.    
			session_destroy();

			// Include URL for Login page to login again.
			header("Location: login.php");
		}
	}
?>