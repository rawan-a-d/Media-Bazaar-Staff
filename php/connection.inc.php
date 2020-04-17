<?php

$connec = mysqli_connect('studmysql01.fhict.local','dbi435688', 'webhosting54','dbi435688');

if(!$connec){
    die("conn field".mysqli_connect_error());
}