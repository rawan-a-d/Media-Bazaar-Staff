<?php

session_start();

unset($_SESSION['email']);
unset($_SESSION['remember_me']);
unset($_SESSION['employeeId']);

session_destroy();
header("Location:login.php");

?>
