<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['status']) ) {
  $name = $_POST['name'];
  $status = $_POST['status'];
  $password = $_POST['password'];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $sql = 'INSERT INTO login_user(username, r_name, password) VALUES(:name, :status, :password)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':status' => $status, ':password' => $hash])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a User</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Status</label>
          <input type="text" name="status" id="status" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a User</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
