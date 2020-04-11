<?php 
    include 'sql/server.php';
    include 'php/connection.inc.php';
    include 'php/func.inc.php';
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
        <div class = "container">
            <?php 
                $id = $_COOKIE['uid'];
                $sql ="SELECT * FROM person WHERE id = '$id'";
                $result = $connec->query($sql);
                while($row = $result->fetch_assoc()){
                echo "
                <form action='".updateInfo($connec)."' method='POST'>
                <div class='postForm'>
                <div class='left_side'>
                    <h3>First name</h3>
                    <input type='text' class='form_input' name='firstName' value='".$row['firstName']."' readonly>
                    <br>
                    <h3>Second name</h3>
                    <input type='text' class='form_input' name='lastName' value='".$row['lastName']."' readonly>
                    <br>
                    <h3>Email</h3>
                    <input type='text' class='form_input' name='email' value='".$row['email']."'>
                    <br>
                    <h3>Date of Birth</h3>
                    <input type='text' class='form_input' name='dob' value='".$row['dateOfBirth']."'>
                    <br>
                    <input type='hidden' name='uid' value='".$id."'>
                    <h3>Password</h3>
                    <input type='text' class='form_input' name='pass' value='".$row['password']."'>
                    <br>
                </div>
                <div class='right_side'>
                    <h3>Street name</h3>
                    <input type='text' class='form_input' name='streetName' value='".$row['streetName']."'>
                    <br>
                    <h3>House Number</h3>
                    <input type='text' class='form_input' name='houseN' value='".$row['houseNr']."'>
                    <br>
                    <h3>City</h3>
                    <input type='text' class='form_input' name='city' value='".$row['city']."'>
                    <br>
                    <h3>Zip Code</h3>
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
        <div id='myModal' class='modal'>


<div class='modal-content'>
  <p id="modal_text">Your information has been updated successfully</p>
</div>

          </div>
<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("btn_form");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
        
    </body>
</html>