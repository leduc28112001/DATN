<?php 
include '../models/category-model.php';
include '../models/product-model.php';
include '../controllers/product-controller.php';
$db = include '../config/database.php';
$productController = new Product_Controller($db);
$productController->searchProduct();
?>