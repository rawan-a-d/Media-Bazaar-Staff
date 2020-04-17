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
                $id = $_COOKIE['uid'];
                $sql ="SELECT * FROM person WHERE id = '$id'";
                $result = $connec->query($sql);
                while($row = $result->fetch_assoc()){
                echo "
                <form action='".updateInfo($connec)."' method='POST'>
                <div class='postForm'>
                <div class='left_side'>
                    <h3 class = 'h3info'>First name</h3>
                    <input type='text' class='form_input' name='firstName' value='".$row['firstName']."' readonly>
                    <br>
                    <h3 class = 'h3info'>Second name</h3>
                    <input type='text' class='form_input' name='lastName' value='".$row['lastName']."' readonly>
                    <br>
                    <h3 class = 'h3info'>Email</h3>
                    <input type='text' class='form_input' name='email' value='".$row['email']."' readonly>
                    <br>
                    <h3 class = 'h3info'>Date of Birth</h3>
                    <input type='text' class='form_input' name='dob' value='".$row['dateOfBirth']."' readonly>
                    <br>
                    <input type='hidden' name='uid' value='".$id."'>
                    <h3 class = 'h3info'>Password</h3>

                    <input type='password' id='typepass' class='form_input' name='pass' value='".$row['password']."'>
                    <input type='checkbox' onclick='Toggle()' id='cbPass'><label>Show</label>

                    <br>
                </div>
                <div class='right_side'>
                    <h3 class = 'h3info'>Street name</h3>
                    <input type='text' class='form_input' name='streetName' value='".$row['streetName']."'>
                    <br>
                    <h3 class = 'h3info'>House Number</h3>
                    <input type='text' class='form_input' name='houseN' value='".$row['houseNr']."'>
                    <br>
                    <h3 class = 'h3info'>City</h3>
                    <input type='text' class='form_input' name='city' value='".$row['city']."'>
                    <br>
                    <h3 class = 'h3info'>Zip Code</h3>
                    <input type='text' class='form_input' name='zipcode' value='".$row['zipcode']."'>
                    <br>

                </div>

                <div id='btnBlock'>
                    <center><button type='submit' name='infoSubmit' id = 'btn_form'>Modify</button></center>
                </div>

            </div>
            </form>
            ";
            }
            sleep(1.5);
            ?>
                    <?php include('includes/footer.php') ?>
            </div>
            <br>
            <div id='myModal' class='modal'>
                <div class='modal-content'>
                    <p id="modal_text">Your information has been updated successfully</p>
                </div>
            </div>
            <script src="js/modal.js"></script>
            <script src="js/cbPass.js"></script>

    </body>
    </html>