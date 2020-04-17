<?php 
    /* Check session */
    include("config/session.php");
    /* Session expiry */
    include('config/session_expiry.php');
    include 'sql/server.php';
    include 'config/dbConfig.php';

?>

    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <title>Home page</title>
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
    </head>

    <body>
        <?php include('includes/header.php') ?>
            <div class="container">
                <?php 
                   echo "
                   <form action='".updatePass($connec)."' method='POST'>
                   <div class='postForm'>
                        <center>
                            <h3 class = 'h3infoPass'>Old password</h3>
                            <input type='password' class='form_input' id='typepass' name='oldPass'>
                            <input type='checkbox' onclick='Toggle()' id='cbPass'><label>Show</label>
                            <br>
                            <h3 class = 'h3infoPass'>New password</h3>
                            <input type='password' class='form_input' id='typepass' name='newPass'>
                            <input type='checkbox' onclick='Toggle()' id='cbPass'><label>Show</label>
                            <br>
                            <h3 class = 'h3infoPass'>Confirm new password</h3>
                            <input type='password' class='form_input' id='typepass' name='conNewPass'>
                            <input type='checkbox' onclick='Toggle()' id='cbPass'><label>Show</label>
                            <br>
                            <br>
                            <br>
                            <button type='submit' name='infoSubmit' id = 'btn_form'>Modify</button>
                            <br>
                            <br>
                        </center>
                   </div>
                   </form>
                   
                   "; 
                    
                
                
                ?>
            
            <script src="js/cbPass.js"></script>

    </body>
    </html>