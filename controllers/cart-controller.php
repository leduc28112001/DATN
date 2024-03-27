<?php 
class Cart_Controller{
    private $db;
    private $cartModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->cartModel = new Cart_Model($this->db);
    }
    function showCartList(){
        $result = $this->cartModel->showCartList();
        function showCartNoLogin($productId){
            include './config/database.php';
            $stmt = $db->prepare("SELECT * FROM products WHERE id = ? ");
            $stmt->bind_param("i", $productId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                return $result->fetch_assoc();
            }
        }
        if(isset($_SESSION["user"])){
            include './views/cart.php';
        }else{
            include './views/cart-nologin.php';
        }
    }
    function addToCart(){
        return $this->cartModel->addToCart();
    }
    function updateQuantityCart(){
        return $this->cartModel->updateQuantityCart();
    }
    function deleteCart(){
        return $this->cartModel->deleteCart();
    }
    function quantityCart(){
        return $this->cartModel->quantityCart();
    }
    function showCartListPageCheckout(){
        $result = $this->cartModel->showCartList();
        if(isset($result)){
            include './views/checkout.php';
        }else{
            $result = $this->cartModel->showCartList();
            include './views/cart.php';
        }
    }
}
?>