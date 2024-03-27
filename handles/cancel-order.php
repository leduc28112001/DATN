<?php 
if($_GET["action"] === 'cancel-order'){
    include '../models/order-model.php';
    include '../controllers/order-controller.php';
    $db = require '../config/database.php';
    $orderController = new Order_Controller($db);
    echo $orderController->cancelOrder();
    // header("Location: ../views/orders.php");
}
?>