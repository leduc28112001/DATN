<?php 
include '../models/user-model.php';
include '../controllers/user-controller.php';
$db = require '../config/database.php';
$userController = new User_Controller($db);
echo $userController->updateInformationUser();
?>