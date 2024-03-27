<?php
session_start();
include '../models/user-model.php';
include '../controllers/user-controller.php';
$db = require '../config/database.php';
$check = new User_Controller($db);
$checkToken = $check->checkToken(); // Phòng trường hợp người dùng tạo session với role admin bên 1 phiên khác ko liên quan ==> check token
$CHECK_ID = isset($_SESSION["user"]) ? $_SESSION["user"]['id'] : "";
$CHECK_ROLE = isset($_SESSION["user"]) ? $_SESSION["user"]['role'] : "";
if($checkToken !== "successtoken" || empty($CHECK_ID) || empty($CHECK_ROLE)){ // Kiểm tra token + id + role => Đã đăng nhập chưa
    header("Location: ../404/");
}else{ // Nếu như đã token đã được check hợp lệ
    if($CHECK_ROLE === 'admin' || $CHECK_ROLE === 'staff'){ // Kiểm tra quyền
    }else{
        header("Location: ../404/");
    }
}
?>