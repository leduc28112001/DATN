<?php
include '../models/user-model.php';
include '../controllers/user-controller.php';
$db = require '../config/database.php';
$userController = new User_Controller($db);
if($userController->uploadAvatar() == "Thành công"){
    header("Location: ../?page=profile");
}else{
    header("Location: ../?page=profile");
}
?>
