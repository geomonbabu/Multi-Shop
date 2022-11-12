<?php
require"db.php";

$Obj = new Database();

$email = $_POST['email'];
$Obj->verify($email);

?>