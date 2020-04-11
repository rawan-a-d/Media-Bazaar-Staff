<?php 

function updateInfo($conn) {
    if(isset($_POST['infoSubmit'])){
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $streetName = $_POST['streetName'];
        $houseN = $_POST['houseN'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $uid = $_POST['uid'];
        $pass = $_POST['pass'];
        
        $sql = "UPDATE person
        SET firstName = '$fName', lastName = '$lName', email  = '$email',  dateOfBirth = '$dob' ,streetName = '$streetName', houseNr = '$houseN', city = '$city', zipcode = '$zipcode', password = '$pass'
        WHERE id = '$uid'";
        
        $result = $conn->query($sql);
    }
    
}

