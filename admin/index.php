<?php session_start();?>
<?php 

if (!$_SESSION["id"]){  //check session

	  Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>
<?php
require 'db.php';
$sql = 'SELECT * FROM login_user';
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
          <th>ID</th>
          <th>Username</th>
          <th>Status</th>
          <th>Manage</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->username; ?></td>
            <td><?= $person->r_name; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info"><i class="bi bi-gear-fill"></i>&nbsp;แก้ไข</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'><i class="bi bi-trash-fill"></i>&nbsp;ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
<?php }?>
