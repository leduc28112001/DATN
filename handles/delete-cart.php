<?php
include '../models/cart-model.php';
include '../controllers/cart-controller.php';
$db = include '../config/database.php';
$cartController = new Cart_Controller($db);
$cartController->deleteCart();
