<?php

class Banner_Controller{
    private $db;
    private $bannerModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->bannerModel = new Banner_Model($this->db);
    } 
    function showBannerListWeb(){
        $result = $this->bannerModel->showBannerListWeb();
        include './layout/banner.php';
    }
    function showBannerList(){
        $banners = $this->bannerModel->showBannerList();
        include './banners/banners.php';
    }
    function addBanner(){
        $result = $this->bannerModel->addBanner();
        include './banners/add-banner.php';
    }
    function editBanner(){
        $dataOldBanner = $this->bannerModel->dataOldBanner();
        if(isset($dataOldBanner)){
            $result = $this->bannerModel->editBanner();
            include './banners/edit-banner.php';
        }
    }
    function updateBanner(){
        $alertUpdate = $this->bannerModel->updateBanner();
        include './banners/banners.php';
    }
    function deleteBanner(){
        $alertDelete = $this->bannerModel->deleteBanner();
        include './banners/banners.php';
    }
}
?>