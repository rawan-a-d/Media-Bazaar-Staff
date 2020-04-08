<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="Login">
    <main>
        <div class="container">    
            <div  id="white_block"  >
                <div id="login_page">
                    <form method="post" action="changePassword.php">
                       <?php include('errors.php'); ?> 
                        <ul class="Login_list">
                        <li> <h2>Member Login </h2> </li><br>
                        <label><p>Email</p></label><br>
                        <li> <input type="text" name="emailToChange" id = "login_input"> </li><br>
                        <label><p>New Password</p></label><br>
                        <li> <input type="Password" name="New_Password" id = "login_input"> </li><br>
                        <label><p>Repeat Password</p></label><br>
                        <li><input type="password" name="Repeat_New_Password" id="login_input">  </li> 
                        <br>
                        <li> <button type="submit" class="btn" name="changePassword" id="btn_log"><p>Login<p></button> </li>  <br>  
                        </ul>
                    </form>
                </div>    
            </div>
        </div>
    </main>
    
    </div>

</body>
</html>