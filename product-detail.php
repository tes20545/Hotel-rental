<?php session_start();?>
<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_condb = "localhost";
$database_condb = "hotel-rental";
$username_condb = "root";
$password_condb = "";
$condb = mysqli_connect($hostname_condb, $username_condb, $password_condb) or trigger_error(mysqli_error($condb),E_USER_ERROR); 
mysqli_query($condb,"SET NAMES UTF8");
error_reporting( error_reporting() & ~E_NOTICE );
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 7) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }



  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_prdt = "-1";
if (isset($_GET['id'])) {
  $colname_prdt = $_GET['id'];
}
mysqli_select_db($condb,$database_condb);
$query_prdt = sprintf("SELECT * FROM room WHERE room_id = %s", GetSQLValueString($colname_prdt, "int"));
$prdt = mysqli_query( $condb,$query_prdt) or die(mysqli_error($prdt));
$row_prdt = mysqli_fetch_assoc($prdt);
$totalRows_prdt = mysqli_num_rows($prdt);


//update product view
$p_id = $row_prdt['id'];

$sql= "UPDATE room WHERE room_id = $p_id";
	mysqli_query($condb,$sql);
//
?>
<?php include('head.php');?>
  <head>
    <title><?php echo $row_prdt['room_name']; ?></title>
  </head>
<style>
    .thumbnail {
    position: relative;
}

.caption {
    position: absolute;
    top: 5%;
    left: 0;
    width: 100%;
}
a{
  text-decoration:none;
}
</style>
    <!-- slider Area Start-->
    
    <div class="thumbnail text-center">
        <img src="assets/img/hero/category2.jpg" alt="" class="img-responsive" width="100%" height="50%">
        <div class="caption">
            <br><br><p><h2><b><?php echo $row_prdt['room_name']; ?></b></h2></p>
        </div>
    </div>
<br>
<br>

 <!--start show  product-->
 <div class="container">
 	<div class="row">
        <!-- product-->
        <div class="col-md-12">
         	<?php  include('prd-detail.php');?>
        </div>
        
    </div>
</div>
 <!--end show  product-->
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

  </body>
</html>