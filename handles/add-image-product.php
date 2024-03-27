<?php 
include '../models/category-model.php';
include '../models/product-model.php';
include '../controllers/category-controller.php';
include '../controllers/product-controller.php';
$db = include '../config/database.php';
$productController = new Product_Controller($db);
echo $productController->addImageProduct();
?>