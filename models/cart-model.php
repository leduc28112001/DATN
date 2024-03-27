<?php 
class Cart_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    /* ------------------------------- SHOW LIST CART ------------------------------ */
    function showCartList(){
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "";
        if(!empty($userId) && is_numeric($userId)){
            $data = array();
            $stmt = $this->db->prepare(
                "SELECT 
                    products.id AS productId,
                    products.productName AS productName,
                    products.image AS image,
                    products.price AS price,
                    products.discount AS discount,
                    carts.quantity AS quantity,
                    products.quantity AS quantityPrd,
                    sizes.size AS size,
                    colors.color AS color,
                    sizes.id AS sizeId,
                    colors.id AS colorId
                FROM 
                    carts
                INNER JOIN 
                    products ON carts.productId = products.id
                INNER JOIN 
                    colors ON carts.colorId = colors.id
                INNER JOIN 
                    sizes ON carts.sizeId = sizes.id
                WHERE 
                    carts.userId = ?"
            );
            $stmt->bind_param("i", $userId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $data[] = $row;
                    }
                }
            }
            if(!empty($data)){
                return $data;
            }
        }
    }
    /* ------------------------------- SHOW LIST CART ------------------------------ */
    /* ------------------------------- ADD TO CART ------------------------------ */
    function addToCart(){
        $mess = "";
        session_start();
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "";
        $productId = (isset($_POST["productId"])) ? $_POST["productId"] : "";
        $colorId = (isset($_POST["colorId"])) ? $_POST["colorId"] : "";
        $sizeId = (isset($_POST["sizeId"])) ? $_POST["sizeId"] : "";
        $quantity = (isset($_POST["quantity"])) ? $_POST["quantity"] : "";
        
        if(!empty($userId) && is_numeric($userId)){ // Kiểm tra đăng nhập chưa
            if(!empty($productId) && is_numeric($productId) && !empty($quantity) && is_numeric($quantity) && !empty($sizeId) && !empty($colorId)){ // validate
                // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng với cùng một kích thước và màu sắc hay không
                $check = $this->db->prepare("SELECT * FROM carts WHERE userId = ? AND productId = ? AND sizeId = ? AND colorId = ?");
                $check->bind_param("iiii", $userId, $productId, $sizeId, $colorId);
                if($check->execute()){
                    $result = $check->get_result();
                    if($result->num_rows === 1){ // Nếu đã có
                        $row = $result->fetch_assoc();
                        $dbQuantity = $row['quantity'];
                        $newQuantity = $quantity + $dbQuantity;
                        $update = $this->db->prepare("UPDATE carts SET quantity = ? WHERE productId = ? AND userId = ? AND sizeId = ? AND colorId = ?");
                        $update->bind_param("iiiii", $newQuantity, $productId, $userId, $sizeId, $colorId);
                        if($update->execute()){
                            $mess = "Thành công";
                        }else{
                            $mess = "Lỗi";
                        }
                    }else{ // Nếu chưa có
                        $stmt = $this->db->prepare("INSERT INTO carts(`userId`,`productId`, `sizeId`, `colorId`, `quantity`) VALUES (?,?,?,?,?)");
                        $stmt->bind_param("iiiii", $userId, $productId, $sizeId, $colorId, $quantity);
                        if($stmt->execute()){
                            $mess = "Thành công";
                        }else{
                            $mess = "Lỗi";
                        }
                    }
                }
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Bạn chưa đăng nhập";
        }
        return $mess;
    }
    
    /* ------------------------------- ADD TO CART ------------------------------ */
    /* ------------------------------- UPDATE QUANTITY CART ------------------------------ */
    function updateQuantityCart(){
        $mess = "";
        session_start();
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]["id"] : "";
        $productId = (isset($_POST["productId"])) ? $_POST["productId"] : "";
        $colorId = (isset($_POST["colorId"])) ? $_POST["colorId"] : "";
        $sizeId = (isset($_POST["sizeId"])) ? $_POST["sizeId"] : "";
        $action = (isset($_POST["action"])) ? $_POST["action"] : "";

        if(!empty($userId) && is_numeric($userId) && !empty($productId) && is_numeric($productId) && !empty($action) && is_numeric($colorId) && is_numeric($sizeId)){
            /* -------------------------- Lấy số lượng sản phẩm ------------------------- */
            $check = $this->db->prepare("SELECT quantity FROM carts WHERE userId = ? AND productId = ? AND colorId = ? AND sizeId = ?");
            $check->bind_param("iiii", $userId, $productId, $colorId, $sizeId);
            if($check->execute()){
                $result = $check->get_result();
                if($result->num_rows === 1){
                    $row = $result->fetch_assoc();
                    $dbQuantity = $row['quantity'];
                    if($action === "up"){
                        $dbQuantity++;
                    }
                    if($action === "down"){
                        $dbQuantity--;
                    }
                    // UPDATE QUANTITY
                    $update = $this->db->prepare("UPDATE carts SET quantity = ? WHERE userId = ? AND productId = ? AND colorId = ? AND sizeId = ?");
                    $update->bind_param("iiiii", $dbQuantity, $userId, $productId, $colorId, $sizeId);
                    if($update->execute()){
                        if($dbQuantity < 1){
                            $delete = $this->db->prepare("DELETE FROM carts WHERE userId = ? AND productId = ? AND colorId = ? AND sizeId = ?");
                            $delete->bind_param("iiii", $userId, $productId, $colorId, $sizeId);
                            $delete->execute();
                        }
                    }else{
                        $mess = "Lỗi";
                    }
                    // UPDATE QUANTITY
                }
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Lỗi";
        }
        return $dbQuantity;
    }
    /* ------------------------------- UPDATE QUANTITY CART ------------------------------ */
    /* ------------------------------- DELETE CART ------------------------------ */
    function deleteCart(){
        $mess = "";
        session_start();
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]["id"] : "";
        $productId = (isset($_POST["productId"])) ? $_POST["productId"] : "";
        $colorId = (isset($_POST["colorId"])) ? $_POST["colorId"] : "";
        $sizeId = (isset($_POST["sizeId"])) ? $_POST["sizeId"] : "";

        if(!empty($userId) && is_numeric($userId) && !empty($productId) && is_numeric($productId) && is_numeric($colorId) && is_numeric($sizeId)){
            $stmt = $this->db->prepare("DELETE FROM carts WHERE userId = ? AND productId = ? AND colorId = ? AND sizeId = ?");
            $stmt->bind_param("iiii", $userId, $productId, $colorId, $sizeId);
            if($stmt->execute()){
                $mess = "Thành công";
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    /* ------------------------------- DELETE CART ------------------------------ */
    /* -------------------------------- QUANTITY CART -------------------------------- */
    function quantityCart(){
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "";
        if(isset($userId) && is_numeric($userId)){
            $stmt = $this->db->prepare("SELECT * FROM carts WHERE userId = ?");
            $stmt->bind_param("i", $userId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                $quantityCart = $result->num_rows;
                return $quantityCart;
                }
        }else{
            return 0;
        }
    }
    /* -------------------------------- QUANTITY CART -------------------------------- */
}