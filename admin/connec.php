<?php
$condb=mysqli_connect("localhost","root","","hotel-rental") or die("Error : " .mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utd8'");
error_reporting(error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');

?>