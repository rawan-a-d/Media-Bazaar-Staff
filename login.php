<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="Login">
    <main>
      <header>

      </header>
      <div class="container">
          <div id="loginBox">

          <form method="post" action="login.php">
                <?php include('errors.php'); ?> 
                <ul class="Login_list">
                <li> <h2>Member Login </h2> </li><br>
                    <label><p>Username</p></label><br>
                    <li> <input type="text" name="email" id = "login_input"> </li><br>
                    <label><p>Password</p></label><br>
                    <li><input type="password" name="password_login" id="login_input">  </li> 
                    <br>
                    <li> <button type="submit" class="btn" name="login_user" id="btn_log"><p>Login<p></button> </li>  <br>  
                    <li> <a href="Email.php">Forget Password </a> </li>
                    </ul>
            </form>
          </div>
           
      </div>
   
  
    </main>
    
    </div>
    <footer>

    </footer>

</body>
</html>