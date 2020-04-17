<?php 
	// Database configuration 
	$host= "studmysql01.fhict.local";
	$port = "81";
	$username = "dbi435688";
	$password = "webhosting54";
	$db = "dbi435688";
 
	try {
	    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
	}
	// error catching/ exception
	catch(PDOEXCEPTION $e) {
	    print_r("Something went wrong: " . $e->getMessage());
	}
?>
<?php $connec = mysqli_connect('studmysql01.fhict.local','dbi435688', 'webhosting54','dbi435688');

if(!$connec){
    die("conn field".mysqli_connect_error());
}
?>