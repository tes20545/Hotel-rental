<style>
  a{
    text-decoration:none;
  }
  .card#hotel:hover{
    border-color:black;
  }
  .card{
    border:1px solid rgba(0,0,0,.0)
  }
  body{
    background-color:#E6EAED;
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
mysqli_select_db($condb,$database_condb);
$query_prd = "SELECT * FROM room ORDER BY room_id DESC";
$prd = mysqli_query( $condb,$query_prd) or die(mysqli_error($prd));
$row_prd = mysqli_fetch_assoc($prd);
$totalRows_prd = mysqli_num_rows($prd);
?>

<?php do { ?>

  <a href="product-detail.php?id=<?php echo $row_prd['room_id'];?>&act=product-detail">
  <div class="card mb-3" id="hotel" style="max-width: 70rem;">
  <div class="row g-0">
    <div class="col-md-4">
    <img src="pmi/<?php echo $row_prd['room_images'];?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><font face="Kanit"><h2><?php echo $row_prd['room_name']; ?></h2></font></h5>
        <p class="card-text"><font face="Kanit"><?php echo $row_prd['room_note']; ?></font></p>
        <p class="card-text"><small class="text-muted"><font face="Kanit"><?php $status = $row_prd['room_status']; 
        if($status == "1")
          echo "สถานะ : ว่าง";
        else{
          echo "สถานะ : ไม่ว่าง";
        }
          ?></font></small></p>
          <p class="card-text"><font face="Kanit"><h2><?php echo "THB &nbsp;".$row_prd['room_price']."฿"?></h2></font></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
      </a>
<?php } while ($row_prd = mysqli_fetch_assoc($prd)); ?>
<?php
mysqli_free_result($prd);
?>