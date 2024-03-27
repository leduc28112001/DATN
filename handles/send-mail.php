<?php
session_start();
if(isset($_SESSION["user"])){
    include '../controllers/email-controller.php';
    include '../models/email-model.php';
    $db = include '../config/database.php';
    $emailController = new Email_Controller($db);
    echo $emailController->sendMail();
}else{
    echo "Bạn chưa đăng nhập";
}
