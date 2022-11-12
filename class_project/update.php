<?php
require"db.php";

$Obj = new Database();

//Update data
    $user_id=$_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $Obj->update($user_id,$name, $email, $contact);

 ?>