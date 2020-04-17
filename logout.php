<?php

session_start();

unset($_SESSION['email']);
unset($_SESSION['remember_me']);

session_destroy();
header("Location:login.php");

?>
