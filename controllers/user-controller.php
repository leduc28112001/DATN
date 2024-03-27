<?php
class User_Controller{
    private $db;
    private $userModel;
    private $orderModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->userModel = new User_Model($this->db);
    }
    function register(){
        $result = $this->userModel->addUser();
        include './views/register.php';
    }
    function active(){
        $result = $this->userModel->activeAccount();
        include './views/register.php';
    }
    function login(){
        $result = $this->userModel->checkAccount();
        include './views/login.php';
    }
    function forgot(){
        $result = $this->userModel->forgotPassword();
        include './views/forgot-password.php';
    } 
    function newPass(){
        $result = $this->userModel->newPassword();
        include './views/new-password.php';
    }
    function showUserList(){
        $result = $this->userModel->showUsers();
        include './users/users.php';
    }
    function showInformationUser(){
        $result = $this->userModel->showInformationUser();
        include './users/information-user.php';
    }
    function showInformationOneUser(){
        $result = $this->userModel->showInformationOneUser();
        include './views/profile.php';
    }
    function showInformationUserOld(){
        return $this->userModel->showInformationUserOld();
    }
    function showLogs(){
        $result = $this->userModel->showLogs();
        include './users/logs.php';
    }
    function updateUser(){
        $result = $this->userModel->updateStatusOrRole();
    }
    function updateInformationUser(){
        return $this->userModel->updateInformationUser();
    }
    function disableBomm(){
        $this->userModel->disableBecauseBoom();
    }
    function checkToken(){
        $result = $this->userModel->checkToken();
        return $result;
    }
    function uploadAvatar(){
        return $this->userModel->uploadAvatar();
    }
    function getLocation($table, $id){
        return $this->userModel->getLocation($table, $id);
    }
}
?>