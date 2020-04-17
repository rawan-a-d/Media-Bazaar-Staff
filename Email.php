<?php 

include("sql/server.php");

if (isset($_POST['SendMail'])) 
	{
    $email = $_POST["emailToUse"];
    SendEmailForForgotPassword($email);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Forgot Password?</title>
</head>
<body>
<main id="container">
    <h1>Forgot Password </h1>
    <form method="post" action="Email.php"> 
        <label for="email"> Enter Your Email Address!</label> <br> <br>
        <input type="text" name="emailToUse" id = "login_input"> <br> <br>
        
        <button type="submit" class="btn" name="SendMail" id="btn_log"><p>Send Email<p></button> </li>
    </form>
</main>
</body>
</html>