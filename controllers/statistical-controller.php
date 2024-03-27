<?php 
class Statistical_Controller{
    private $db;
    private $statisticalModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->statisticalModel = new Statistical_Model($this->db);
    }
    function statisticalOrder(){
        $data = $this->statisticalModel->orders();
        include './statistical/statistical.php';
    }
    function statisticalMonney(){
        $data = $this->statisticalModel->orders();
        include './statistical/statistical.php';
    }
    function statistical($table){
        return $this->statisticalModel->statistical($table);
    }
    function statiscalRevenue(){
        return $this->statisticalModel->statisticalRevenue();
    }
}
?>