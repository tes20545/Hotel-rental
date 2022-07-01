<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM login_user WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['username'])  && isset($_POST['status']) ) {
  $username = $_POST['username'];
  $r_name = $_POST['status'];
  $sql = 'UPDATE login_user SET username=:username, r_name=:r_name WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':username' => $username, ':r_name' => $r_name, ':id' => $id])) {
    header("Location: index.php");
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
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input value="<?= $person->username; ?>" type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <input type="text" value="<?= $person->r_name; ?>" name="status" id="status" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">อัพเดท</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
