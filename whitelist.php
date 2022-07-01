<?php session_start();?>
<?php 

if (!$_SESSION["id"]){  //check session

    echo "<script type='text/javascript'>";
    echo "alert('โปรดลงชื่อเข้าใช้ก่อนการจอง!');";
    echo "window.location = 'index.php';";
    echo "</script>";

}else{?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Hotel</title>
    <?php include("head.php"); ?>
    <style>
        
        button.nav-link:active{
            background-color:#fff;
        }

        div#wrapperHeader {
 /* width:100%;
 height:200px; */
 background:url(assets/img/hero/category2.jpg) repeat-x 0 0;
 text-align:center;
 background-size:cover;
}

div#wrapperHeader div#header {
 width:100%;
 height:200px;
 margin:0 auto;
}

div#wrapperHeader div#header img {
 width:; /* the width of the logo image */
 height:; /* the height of the logo image */
 margin:0 auto;
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #8e7abd;
}
a{
    text-decoration:none;
}

    </style>

  </head>
  <body>
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <!--================Blog Area =================-->
    <div id="wrapperHeader">
    <div id="header">
    <div class="hero-text">
<h2 class="display-4">รายการจองห้องพัก <?php echo $_SESSION["username"];?></h2>
</div>
    </div> 
    </div>

    <div class="container">
      <div class="row">
        <!-- product-->
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading">
                <br>
         <div class="row">
  <div class="col">
    <div class="card text-white bg-primary">
      <div class="card-body">
        <h5 class="card-title">แจ้งให้ทราบ</h5>
        <p class="card-text">ทุกครั้งที่จองควรจะมีการติดต่อโรงแรมหรือรีสอร์ทนั้นๆเพื่อเป็นการป้องกันไม่ให้ผู้บริการเสียสิทธิ์ในการเข้าพัก</p>
      </div>
    </div>
  </div>

              </div>
            </div>
            <br>
            <div class="row">
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
$query_prd = "SELECT * FROM rent AS d1 INNER JOIN login_user AS d2 ON d1.rent_user = d2.id
INNER JOIN room AS d3 ON d1.rent_req = d3.room_id ORDER BY room_id DESC";
$prd = mysqli_query( $condb,$query_prd) or die(mysqli_error($prd));
$row_prd = mysqli_fetch_assoc($prd);
$totalRows_prd = mysqli_num_rows($prd);
?>
<?php if($row_prd == ""){
  echo "<h1 class='text-center'>ยังไม่มีรายการจอง</h1>";
}else{?>
<?php do { ?>

  
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
          <p class="card-text"><font face="Kanit"><h5><?php echo "เข้าพัก &nbsp;".$row_prd['rent_wantdate']."&nbsp; <br>ออกวันที่ ".$row_prd['rent_returnroom']?></h5></font></p>
        <p class="card-text"><h4 class="text-muted"><?php  if($row_prd['rent_confirm'] == 0){ echo "<h4 class='text-end text-danger'>กำลังจอง</h4>";}else{echo "<h4 class='text-end text-success'>จองสำเร็จ</h4>";} ?></h4></p>
      </div>
    </div>
  </div>
  
</div>

<?php } while ($row_prd = mysqli_fetch_assoc($prd)); ?>
<?php
mysqli_free_result($prd);
?>
<?php }?>
          </div>
        </div>
        </div>
      </div>
      
    <!--================Blog Area =================-->
<br>

</div>



</div>
    <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
        

</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
  </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>
<?php }?>