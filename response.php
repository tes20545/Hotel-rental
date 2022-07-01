<?php
//include connection file 
session_start();
Class dbObj{
	/* Database connection start */
	var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "hotel-rental";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}
$db = new dbObj();
$connString =  $db->getConnstring();

$params = $_REQUEST;
$action = $params['action'] !='' ? $params['action'] : '';
$empCls = new Employee($connString);

switch($action) {
 case 'login':
	$empCls->login();
 break;
 case 'logout':
	$empCls->logout();
 break;
 default:
 return;
}


class Employee {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}
	
	function login() {
		if(isset($_POST['login-submit'])) {
			$username = $_POST['username'];
        	$password = $_POST['password'];
			$sql = "SELECT * FROM login_user WHERE username='$username'";
			$resultset = mysqli_query($this->conn, $sql) or die("database error:". mysqli_error($this->conn));
			$count = mysqli_num_rows($resultset);


			if($count == 1){
				$query2 = "SELECT password FROM login_user WHERE username='$username'";
				$result2 = mysqli_query($this->conn,$query2);
				$row = mysqli_fetch_array($result2);
				$hash = $row['password'];
        if(password_verify($password, $hash)){
            if(mysqli_num_rows($resultset)==1){
 
                $row = mysqli_fetch_array($resultset);
                $_SESSION["id"] = $row['id'];
                $_SESSION["r_name"] = $row['r_name'];
                $_SESSION["username"] = $row['username'];
            if($_SESSION["r_name"] == 'Admin'){
				echo "กำลังเข้าสู่ระบบ";
                echo "<script>";
				echo "window.location.href = 'admin/index.php';";
				echo "</script>";}
			elseif($_SESSION["r_name"] == 'Member'){
					echo "กำลังเข้าสู่ระบบ";
					echo "<script>";
					echo "window.location.href = 'index.php';";
					echo "</script>";}
			else{
				echo "กำลังเข้าสู่ระบบ";
					echo "<script>";
					echo "window.location.href = 'index.php';";
					echo "</script>";
			}
        }else{

           echo "ชื่อผู้ใช้ไม่มีอยู่ในระบบ";}
    	}else{
			echo "รหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง";}
		}else{
				echo "ชื่อผู้ใช้ไม่มีอยู่ในระบบ";
			}
			
		}
	}
}
?>
	