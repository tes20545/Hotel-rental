<?php session_start();?>
<?php 

if (!$_SESSION["id"]){  //check session

	  Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>
<?php
require 'db.php';
$sql = 'SELECT rent_ID,room.room_id,rent_wantdate,rent_returnroom,login_user.username,room.room_name,rent_confirm 
FROM rent 
INNER JOIN room 
ON rent.rent_req = room.room_id
INNER JOIN login_user
ON rent.rent_user = login_user.id';
$statement = $connection->prepare($sql);
$statement->execute();
$rent = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Confirm List</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>รหัสจอง</th>
          <th>รหัสห้อง</th>
          <th>ชื่อห้อง</th>
          <th>วันจอง</th>
          <th>วันคืน</th>
          <th>ชื่อจอง</th>
          <th>สถานะ</th>
          <th>Manage</th>
        </tr>
        <?php foreach($rent as $room): ?>
          <tr>
            <td><?= $room->rent_ID; ?></td>
            <td><?= $room->room_id; ?></td>
            <td><?= $room->room_name; ?></td>
            <td><?= $room->rent_wantdate; ?></td>
            <td><?= $room->rent_returnroom; ?></td>
            <td><?= $room->username; ?></td>
            <td><?php if($room->rent_confirm == 0){echo "กำลังจอง";}else{ echo "จองแล้ว";} ?></td>
            <td>
            <?php if($room->rent_confirm == 0){
           echo " <a href='confirm_sure.php?id=$room->rent_ID' class='btn btn-success'><i class='bi bi-check-lg'></i>&nbsp;ยืนยัน</a>";
        }?>
            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="confirm_delete.php?id=<?= $room->rent_ID ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i>&nbsp;ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
<?php }?>
