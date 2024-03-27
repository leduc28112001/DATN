<?php 
class Order_Controller{
    private $db;
    private $orderModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->orderModel = new Order_Model($this->db);
    }
    function showOrderList(){
        $result = $this->orderModel->showOrderList();
        include './orders/orders.php';
    }
    function showOrderDetails(){
        // $result = $this->orderModel->orderDetails();
        include './orders/order-details.php';
    }
    function showOrderAddress(){
        $result = $this->orderModel->order();
        include './orders/order-address.php';
    }
    function showOrderWeb(){
        return $this->orderModel->showOrderWeb();
    }
    function updateOrder(){
        $alertUpdate = $this->orderModel->updateOrder();
        include './orders/orders.php';
    }
    function deleteOrder(){
        $alertDelete = $this->orderModel->cancelOrder();
        include './orders/orders.php';
    }
    function deleteOrderDetails(){
        $alertDelete = $this->orderModel->deleteOrderDetails();
        include './orders/order-details.php';
    }
    function receiveOrder(){
        $alertUpdate = $this->orderModel->receiveOrder();
        include './orders/orders.php';
    }
    function numOrder($userId){
        return $this->orderModel->orderNum($userId);
    }
    function numBoom($userId){
        return $this->orderModel->boomNum($userId);
    }
    function cancelOrder(){
        $alertUpdate = $this->orderModel->cancelOrder();
        include './views/profile.php';
    }
}