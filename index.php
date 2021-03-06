<?php
	/* Check session */
	include("config/session.php");
	/* Session expiry */
	include('config/session_expiry.php');

?>

<!DOCTYPE html>
<html>
	<head>
        <title>Home page</title>
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
    </head>
    <!-- Include header (links to css files and navbar) -->
    <head>
    <?php include('includes/header.php')?>
    <p></p>
    
    
    <div class = "text">
        <p><br></p>
        <h1>Welcome to Media Bazaar!</h1>
        <p><br></p>
        <div class= "page-wrap">
        
            <h2>Media Bazaar is a new hardware store which just opened in Eindhoven, funded by the parent company “Jupiter”. All kinds of good quality hardware will be sold. 
            The business will make revenue and a profit by servicing its customers not only with needed hardware but also with expert advice in the use of any product it sells.
            </h2>
            <h3>
            This website was created to help employees of Media Bazaar. Here you can view your personal information and also modify it if necessary from the "Profile page", you
             can also easily see your schedule or propose a shift by simply going onto the "Schedule page".
            </h3>  
        </div>
    </div>
    <!-- Include footer -->
	<?php include('includes/footer.php') ?>
</html>