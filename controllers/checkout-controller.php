<?php 
class Checkout_Controller{
    private $db;
    private $checkoutModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->checkoutModel = new Checkout_Model($this->db);
    }
    function checkout(){
        return $this->checkoutModel->checkout();
    }
}
?>