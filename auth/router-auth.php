<?php 
include '../config/config.php';
/* ---------------------------------- MODEL --------------------------------- */
include '../models/user-model.php';
include '../models/product-model.php';
include '../models/category-model.php';
/* ---------------------------------- MODEL --------------------------------- */
/* ---------------------------------- CONTROLLER --------------------------------- */
include '../controllers/user-controller.php';
include '../controllers/product-controller.php';
include '../controllers/category-controller.php';
/* ---------------------------------- CONTROLLER --------------------------------- */
define("AUTH", isset($_GET["auth"]) ? $_GET["auth"] : "");
define("ACTION", isset($_GET["action"]) ? $_GET["action"] : "");
/* ---------------------------------- AUTH ---------------------------------- */
if(!empty(AUTH)){
    if(AUTH === 'login'){
        include './views/login.php';
    }elseif(AUTH === 'register'){
        include './views/register.php';
    }elseif(AUTH === 'forgot-password'){
        include './views/forgot-password.php';
    }elseif(AUTH === 'new-password'){
        include './views/new-password.php';
    }
    // NOT FOUND
    else{
        include '../404/index.php';
    }
    // NOT FOUND
}
/* ---------------------------------- AUTH ---------------------------------- */
/* --------------------------------- ACTION --------------------------------- */
$db = require '../config/database.php';
$userController = new User_Controller($db);
if(ACTION === 'register'){
    $userController->register();
}elseif(ACTION === 'active-account'){
    $userController->active();
}elseif(ACTION === 'login'){
    $userController->login();
}elseif(ACTION === 'forgot-password'){
    $userController->forgot();
}elseif(ACTION === 'new-password'){
    $userController->newPass();
}elseif(ACTION === 'logout'){
    include './views/logout.php';
}
/* --------------------------------- ACTION --------------------------------- */
?>