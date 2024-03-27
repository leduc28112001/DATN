<?php 
include '../models/comment-model.php';
include '../controllers/comment-controller.php';
$db = include '../config/database.php';
$commentController = new Comment_Controller($db);
echo $commentController->deleteComment();
?>