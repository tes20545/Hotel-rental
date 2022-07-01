<style>
.nav-link{
  color:black;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link{
  color:black;
}
  </style>
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

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysqli_real_escape_string($condb,$theValue) : mysqli_escape_string($condb,$theValue);

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

mysqli_select_db($condb,$database_condb);
$query_typeprd = "SELECT * FROM roomcetegory ORDER BY roomcetegory_id ASC";
$typeprd = mysqli_query($condb,$query_typeprd) or die(mysqli_error($typeprd));
$row_typeprd = mysqli_fetch_assoc($typeprd);
$totalRows_typeprd = mysqli_num_rows($typeprd);
?>

         <nav class="nav nav-pills nav-fill" style="background-color: #F9F9F9;padding: .5rem;">
            <a class="nav-item nav-link active" href="product.php" >ทั้งหมด</a>
<?php do { ?>
                <a href="product.php?t_id=<?php echo $row_typeprd['roomcetegory_id'];?>&type-name=<?php echo $row_typeprd['cetegory_name'];?>" class="nav-item nav-link"> <?php echo $row_typeprd['cetegory_name']; ?></a>
<?php } while ($row_typeprd = mysqli_fetch_assoc($typeprd)); ?>
</nav>

         
                        
</div>
<?php
mysqli_free_result($typeprd);
?>
