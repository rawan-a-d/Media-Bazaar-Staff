<?php 

//login
include("sql/server.php");

echo $_SERVER["PHP_SELF"];
    if (isset($_POST['login_user'])) 
	{
        $email = $_POST["email"];
        $password_login = $_POST["password_login"];
        login($email, $password_login);
    } 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Welcome</title>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
        <form method="post" action="login.php">
            <label for="email">Email</label> <br> <br>
            <input type="text" name="email" id = "login_input"> <br>
            <label for="pass">Password</label> <br> <br>
            <input type="password" name="password_login" id="login_input"> 
            <input type="checkbox" name="remember_me" id="remember_me">  
            <label for="rememberMe">Remember me</label> <br> <br>
            <button type="submit" class="btn" name="login_user" id="btn_log"><p>Login<p></button>  <br>  <br>  
            <label for="forgotPass"><a href="Email.php">Forget Password </a>  </label> 
      </form>
    </div>
</body>
</html>