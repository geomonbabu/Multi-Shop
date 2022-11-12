<?php
require"db.php";

$Obj = new Database();

//Delete data

    $user_id = $_POST['user_id'];
    $Obj->delete($user_id);

 ?>