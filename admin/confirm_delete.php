<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM rent WHERE rent_ID=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: confirm.php");
}