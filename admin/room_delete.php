<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM room WHERE room_id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: room.php");
}