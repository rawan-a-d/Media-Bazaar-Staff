<?php

$conn = mysqli_connect('studmysql01.fhict.local','dbi435688', 'webhosting54','dbi435688');

if(!$conn){
    die("conn field".mysqli_connect_error());
}