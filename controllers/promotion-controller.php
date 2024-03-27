<?php

class Promotion_Controller{
    private $db;
    private $promotionModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->promotionModel = new Promotion_Model($this->db);
    } 
    function showPromotionListWeb(){
        $result = $this->promotionModel->showPromotionListWeb();
        include './component/promotion.php';
    }
    function showPromotionList(){
        $result = $this->promotionModel->showPromotionList();
        include './promotions/promotions.php';
    }
    function addPromotion(){
        $result = $this->promotionModel->addPromotion();
        include './promotions/add-promotion.php';
    }
    function editPromotion(){
        $dataOldPromotion = $this->promotionModel->dataOldPromotion();
        $result = $this->promotionModel->editPromotion();
        include './promotions/edit-promotion.php';
    }
    function updatepromotion(){
        $alertUpdate = $this->promotionModel->updatePromotion();
        include './promotions/promotions.php';
    }
    function deletePromotion(){
        $alertDelete = $this->promotionModel->deletePromotion();
        include './promotions/promotions.php';
    }
}