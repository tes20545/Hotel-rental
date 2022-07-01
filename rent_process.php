
<meta charset="utf-8">
<?php
//connec
include('admin/connec.php');
// echo '<pre>';
// 	print_r($_POST);
// 	echo '</pre>';


	$name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $room_id =  $_POST["room_id"];
	$rentuser = $_POST["rentuser"];
	$rent_confirm = '0';
    $dt = \DateTime::createFromFormat('m/d/Y', $_POST['rent']);
    $rent = $dt->format('Y-m-d');

    $dt = \DateTime::createFromFormat('m/d/Y', $_POST['return']);
    $return = $dt->format('Y-m-d');

//Add to database
$sql = "INSERT INTO user
(
user_Tfullname,
user_Tlastname,
user_tel,
user_address,
user_email,
useruser_ID
)
VALUES
(
'$name',
'$lastname',
'$tel',
'$address',
'$email',
'$rentuser'
)";

$sql1 = "INSERT INTO rent
(
rent_wantdate,
rent_returnroom,
rent_req,
rent_user,
rent_confirm
)
VALUES
(
'$rent',
'$return',
'$room_id',
'$rentuser',
'$rent_confirm'
)";

	$result = mysqli_query($condb, $sql) or die ("Error in Query : $sql" . mysqli_error($result));
    $result1 = mysqli_query($condb, $sql1) or die ("Error in Query : $sql1" . mysqli_error($result1));

//close check doubly
	//Disconnection Database
	mysqli_close($condb);

	if($result){
		echo "<script type='text/javascript'>";
		echo "window.location = 'product.php';";
		echo "</script>";
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('ผิดพลาด!');";
		echo "window.location = 'product.php';";
		echo "</script>";

	}
    if($result1){
		echo "<script type='text/javascript'>";
		echo "window.location = 'product.php';";
		echo "</script>";
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('ผิดพลาด!');";
		echo "window.location = 'product.php';";
		echo "</script>";

	}
?>