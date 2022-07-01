<?php
require 'db.php';
$message = '';
if (isset ($_POST['roomname'])  && isset($_POST['status']) ) {
  $roomname = $_POST['roomname'];
  $detail = $_POST['detail'];
  $price = $_POST['price'];
  $status = $_POST['status'];
  $cetegory = $_POST['cetegory'];


  $sql = "INSERT INTO room(room_name, room_note, room_status
  ,room_cetegory,room_price) 
  VALUES(:roomname, :detail, :status, :cetegory, :price)";
  $statement = $connection->prepare($sql);
  if ($statement->execute([':roomname' => $roomname, ':detail' => $detail, ':status' => $status, ':cetegory' => $cetegory,':price' => $price])) {
    $message = 'เพิ่มข้อมูลสำเร็จ<a href="room.php">แสดง</a>';
    $alert = "success";
  }
  else{
    $message = "เพิ่มข้อมูลไม่สำเร็จ";
    $alert = "danger";
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create Room</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-<?php echo $alert;?>">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="room">RoomName</label>
          <input type="text" name="roomname" id="roomname" class="form-control">
        </div>
        <div class="form-group">
          <label for="detail">Detail</label>
          <input type="text" name="detail" id="detail" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
        <label for="status">Status</label>
            <select class="form-control" name="status" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">ว่าง</option>
                <option value="0">ไม่ว่าง</option>
            </select>
        </div>
        <div class="form-group">
        <label for="cetegory">Room cetegory</label>
            <select class="form-control" name="cetegory" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">Standard</option>
                <option value="2">Superior</option>
                <option value="3">Deluxe</option>
                <option value="4">Suit</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" name="uploadfile" type="file" id="pic">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create Room</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
