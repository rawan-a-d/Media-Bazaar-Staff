<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
        <div class="container">    
            <div  id="white_block"  >
                <div id="login_page">
                    <form method="post" action="Email.php">
                       <?php include('errors.php'); ?> 
                     <input type="text" name="emailToUse" id = "login_input"> <br>
                     <button type="submit" class="btn" name="SendMail" id="btn_log"><p>Login<p></button> </li>
                    </form>
                </div>    
            </div>
        </div>
    </main>
    
    </div>

</body>
</html>