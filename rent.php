<?php session_start();?>
<?php 

if (!$_SESSION["id"]){  //check session

    echo "<script type='text/javascript'>";
    echo "alert('โปรดลงชื่อเข้าใช้ก่อนการจอง!');";
    echo "window.location = 'index.php';";
    echo "</script>";

}else{?>
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.css" />
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
            <br><br><p><h2><b>จอง : <?php echo $row_prdt['room_name']; ?></b></h2></p>
        </div>
    </div>
<br>
<br>

 <!--start show  product-->
 <div class="container">
 <form class="row g-3" action="rent_process.php" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">ชื่อ</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">นามสกุล</label>
    <input type="text" class="form-control" name="lastname">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">ที่อยู่</label>
    <input type="text" class="form-control" name="address" placeholder="1234 Main St">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">เบอร์โทรศัพท์</label>
    <input type="number" class="form-control" name="tel" >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">อีเมลล์</label>
    <input type="email" class="form-control" name="email" >
  </div>

  <div class="col">
  <label for="inputAddress2" class="form-label">ราคารวมภาษี</label>
  <input type="text" class="form-control" placeholder="<?php $tax=$row_prdt['room_price']/100*7; echo $tax+$row_prdt['room_price']; ?>" disabled/>
  </div>
    <input type="hidden" value="<?php echo $row_prdt['room_id']; ?>" name="room_id">
  <div class="col-md-4">
  <label for="inputAddress2" class="form-label">ชื่อห้องที่ต้องการจอง</label>
  <input type="text" class="form-control" placeholder="<?php echo $row_prdt['room_name']; ?>" disabled/>
  </div>
  
  <div class="col-md-4">
  <label for="inputAddress2" class="form-label">จองวันที่</label>
  <div id="sandbox-container" ><input type="text" name="rent" class="form-control" placeholder="From" /></div>  
  </div>
  <div class="col-md-4">
  <label for="inputAddress2" class="form-label">คืนวันที่</label>
  <div id="sandbox-container"><input type="text" name="return" class="form-control" placeholder="From" /></div>  
  </div>
  <input type="hidden" name="rentuser" value="<?php echo $_SESSION["id"]; ?>">
  <input type="hidden" name="user" value="<?php echo $_SESSION["id"]; ?>">
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">จองห้องพัก</button>
  </div>
</form>
</div>
 <!--end show  product-->
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
$('#sandbox-container input').datepicker({
    autoclose: true
});

$('#sandbox-container input').on('show', function(e){
    console.debug('show', e.date, $(this).data('stickyDate'));
    
    if ( e.date ) {
         $(this).data('stickyDate', e.date);
    }
    else {
         $(this).data('stickyDate', null);
    }
});

$('#sandbox-container input').on('hide', function(e){
    console.debug('hide', e.date, $(this).data('stickyDate'));
    var stickyDate = $(this).data('stickyDate');
    
    if ( !e.date && stickyDate ) {
        console.debug('restore stickyDate', stickyDate);
        $(this).datepicker('setDate', stickyDate);
        $(this).data('stickyDate', null);
    }
});
    </script>
  </body>
</html>
<?php }?>