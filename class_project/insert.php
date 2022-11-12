<?php
require"db.php";

$Obj = new Database();

//Insert data

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $Obj->insert($name, $email, $contact);

 ?>