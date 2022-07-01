<?php
require 'db.php';
$id = $_GET['id'];
$sql = "UPDATE rent SET rent_confirm='1' WHERE rent_ID=:id";
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: confirm.php");
}