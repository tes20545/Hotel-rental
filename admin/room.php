<?php session_start();?>
<?php 

if (!$_SESSION["id"]){  //check session

	  Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>
<?php
require 'db.php';
$sql = 'SELECT room_id,room_name,room_note,roomstatus_name,cetegory_name,room_price,room_images
FROM room 
INNER JOIN roomcetegory
ON roomcetegory.roomcetegory_id = room.room_cetegory
INNER JOIN roomstatus
ON roomstatus.roomstatus_id = room.room_status';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Users List</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>รหัสห้อง</th>
          <th>ชื่อห้อง</th>
          <th>รายละเอียด</th>
          <th>สถานะ</th>
          <th>ประเภทห้อง</th>
          <th>ราคา</th>
          <th>Manage</th>
        </tr>
        <?php foreach($people as $room): ?>
          <tr>
            <td><?= $room->room_id; ?></td>
            <td><?= $room->room_name; ?></td>
            <td><?= $room->room_note; ?></td>
            <td><?= $room->roomstatus_name; ?></td>
            <td><?= $room->cetegory_name; ?></td>
            <td><?= $room->room_price; ?></td>
            <td>
              <a href="room_edit.php?id=<?= $room->room_id ?>" class="btn btn-info"><i class="bi bi-gear-fill"></i>&nbsp;แก้ไข</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="room_delete.php?id=<?= $room->room_id ?>" class='btn btn-danger'><i class="bi bi-trash-fill"></i>&nbsp;ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
<?php }?>
