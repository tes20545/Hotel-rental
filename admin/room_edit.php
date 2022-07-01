<?php session_start();?>
<?php 

if (!$_SESSION["id"]){  //check session

	  Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>
<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM room WHERE room_id= :id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['roomname'])  && isset($_POST['cetegory']) ) {
  $roomname = $_POST['roomname'];
  $detail = $_POST['detail'];
  $price = $_POST['price'];
  $status = $_POST['status'];
  $cetegory = $_POST['cetegory'];

  $sql = "UPDATE room SET room_name='$roomname', room_note='$detail' ,room_status='$status', room_cetegory='$cetegory', room_price='$price' WHERE room_id='$id'";
  $statement = $connection->prepare($sql);
  if ($statement->execute([':roomname' => $roomname, ':detail' => $detail, ':status' => $status, ':cetegory' => $cetegory,':price' => $price, ':id' => $id])) {
    $message = 'แก้ไขข้อมูลสำเร็จ<a href="room.php">แสดง</a>';
    $alert = "success";
  }
  else{
    $message = "แก้ไขข้อมูลไม่สำเร็จ $sql";
    $alert = "danger";
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>เปลี่ยนแปลงข้อมูล</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-<?php echo $alert;?>">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Room name</label>
          <input value="<?= $person->room_name; ?>" type="text" name="roomname" id="room_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="detail">Details</label>
          <input type="text" value="<?= $person->room_note; ?>" name="detail" id="room_note" class="form-control">
        </div>

        <div class="form-group">
        <?php
        $ops='';
        $stmt = $connection->query("SELECT * FROM roomstatus");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ops.= "<option value='" . $row['roomstatus_id'] . "'>" . $row['roomstatus_name'] . "</option>";
        }
        ?>
        <label for="status">roomstatus_name</label>

        <select name="status" id="status" class="form-control">
        <?php echo $ops;?>
        </select>


        </div>
        <div class="form-group">
        <?php
        $ops='';
        $stmt = $connection->query("SELECT * FROM roomcetegory");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ops.= "<option value='" . $row['roomcetegory_id'] . "'>" . $row['cetegory_name'] . "</option>";
        }
        ?>
        <label for="cetegory">cetegory_name</label>

        <select name="cetegory" id="cetegory" class="form-control">
        <?php echo $ops;?>
        </select>

        </div>
        
        <div class="form-group">
          <label for="price">room_price</label>
          <input type="number" value="<?= $person->room_price; ?>" name="price" id="room_price" class="form-control">
        </div>
        <div class="form-group">
          <label for="images">room_images</label>
          <input type="text" value="<?= $person->room_images; ?>" name="room_images" id="room_images" class="form-control">
          <img src="../pmi/<?= $person->room_images;?>" >
        </div>
    
        <div class="form-group">
          <button type="submit" class="btn btn-info">อัพเดท</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
<?php }?>
