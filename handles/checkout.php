<?php 
include '../models/checkout-model.php';
include '../controllers/checkout-controller.php';
$db = include '../config/database.php';
$checkoutController = new Checkout_Controller($db);
echo $checkoutController->checkout();
?>