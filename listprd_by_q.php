<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_condb = "localhost";
$database_condb = "db_std_shop";
$username_condb = "root";
$password_condb = "";
$condb = mysqli_connect($hostname_condb, $username_condb, $password_condb) or trigger_error(mysqli_error($condb),E_USER_ERROR); 
mysqli_query($condb,"SET NAMES UTF8");
error_reporting( error_reporting() & ~E_NOTICE );
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

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
$q = $_GET['q'];
mysqli_select_db($condb,$database_condb);
$query_prd = "SELECT * FROM tbl_product WHERE p_name LIKE '%$q%' OR  p_detial LIKE '%$q%'  ORDER BY p_id ASC";
$prd = mysqli_query($condb,$query_prd) or die(mysqli_error($prd));
$row_prd = mysqli_fetch_assoc($prd);
$totalRows_prd = mysqli_num_rows($prd);
?>
<?php do { ?>
  <div class="col-sm-4" align="center">
    <img src="pimg/<?php echo $row_prd['p_img1'];?>" width="80%" />
    <p align="center">
      <b><?php echo $row_prd['p_name']; ?> <font color="red">  <?php echo $row_prd['p_price']; ?>  บาท </font> </b>
      <br />
      <a href="product-detail.php?id=<?php echo $row_prd['p_id'];?>&act=product-detail" class="btn btn-info btn-xs" target="_blank"> <span class="glyphicon glyphicon-search"></span> รายละเอียด </a>
      
      <br><br>
      </p>
    </div>
  <?php } while ($row_prd = mysqli_fetch_assoc($prd)); ?>
<?php
mysqli_free_result($prd);
?>
