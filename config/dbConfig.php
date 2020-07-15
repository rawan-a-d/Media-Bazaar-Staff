<?php 
    // Load configuration as an array. Use the actual location of your configuration file
    $config = parse_ini_file('config/config.ini');

	// Database configuration 
	$host= $config['host'];
	$port = $config['port'];
	$username = $config['username'];
	$password = $config['password'];
	$db = $config['dbname'];
 
	try {
	    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
	}
	// error catching/ exception
	catch(PDOEXCEPTION $e) {
	    print_r("Something went wrong: " . $e->getMessage());
	}
?>