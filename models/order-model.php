<?php 
class Order_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    /* ----------------------------- SHOW ORDER LIST ---------------------------- */
    function showOrderList(){
        $stmt = $this->db->prepare("SELECT * FROM orders ORDER BY createdate DESC");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    /* ----------------------------- SHOW ORDER LIST ---------------------------- */
    /* ----------------------------- UPDATE ORDER ---------------------------- */
    function updateOrder(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        $newValue = (isset($_GET["value"])) ? $_GET["value"] : "";
        if(!empty($newValue) && !empty($id)){
            if($newValue === 'paid' || $newValue === 'unpaid' || $newValue === 'boom'){
                $stmt = $this->db->prepare("UPDATE orders SET status = ? WHERE id = ?");
                $stmt->bind_param("si", $newValue, $id);
                if($stmt->execute()){
                    $mess = "Cập nhật thành công";
                }else{
                    $mess = "Lỗi";
                }
            }
            if($newValue === 'processing' || $newValue === 'delivering' || $newValue === 'completed'){
                $stmt = $this->db->prepare("UPDATE orders SET process = ? WHERE id = ?");
                $stmt->bind_param("si", $newValue, $id);
                if($stmt->execute()){
                    $mess = "Cập nhật thành công";
                }else{
                    $mess = "Lỗi";
                }
            }
        }
        return $mess;
    }
    /* ----------------------------- UPDATE ORDER ---------------------------- */
    /* ---------------------------------- ORDER --------------------------------- */
    function order(){
        $id = (isset($_GET["orderId"])) ? $_GET["orderId"] : "";
        if(!empty($id)){
            $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result->fetch_assoc();
                }
            }
        }
    }
    /* ---------------------------------- ORDER --------------------------------- */
    /* ----------------------------- ORDER DETAILS ---------------------------- */
    function orderDetails(){
        $orderId = (isset($_GET["orderId"])) ? $_GET["orderId"] : "";
        if(!empty($orderId)){
            $stmt = $this->db->prepare("SELECT * FROM orderdetails WHERE orderId = ?");
            $stmt->bind_param("i", $orderId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result;
                }
            }
        }
    }
    /* ----------------------------- ORDER DETAILS ---------------------------- */
    /* ----------------------------- DELETE ORDER DETAILS ---------------------------- */
    function deleteOrderDetails(){
        $mess = "";
        $productId = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($productId) && is_numeric($productId)){
            $stmt = $this->db->prepare("DELETE FROM orderdetails WHERE productId = ?");
            $stmt->bind_param("i", $productId);
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
    /* ----------------------------- DELETE ORDER DETAILS ---------------------------- */
    /* ----------------------------- RECEIVE ORDER ---------------------------- */
    function receiveOrder(){
        $mess = "";
        $action = (isset($_GET["action"])) ? $_GET["action"] : "";
        $newProcess = "confirm";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "";
        if(!empty($action) && !empty($id) && is_numeric($id) && !empty($userId) && is_numeric($userId)){
            $stmt = $this->db->prepare("UPDATE orders SET process = ?, userIdHandle = ? WHERE id = ?");
            $stmt->bind_param("sii", $newProcess, $userId,$id);
            if($stmt->execute()){
                $mess = "Cập nhật thành công";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    /* ----------------------------- RECEIVE ORDER ---------------------------- */
    /* -------------------------------- ORDER NUM ------------------------------- */
    function orderNum($userId){
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE userId = ?");
        $stmt->bind_param("i", $userId);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->num_rows;
            return $row;
        }
    }
    /* -------------------------------- ORDER NUM ------------------------------- */
    /* -------------------------------- ORDER BOM ------------------------------- */
    function boomNum($userId){
        $status = "boom";
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE userId = ? AND status = ?");
        $stmt->bind_param("is", $userId, $status);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->num_rows;
            if($row > 3){
                $newStatus = "disable";
                $disable = $this->db->prepare("UPDATE users SET status = ? WHERE id = ?");
                $disable->bind_param("si", $newStatus, $userId);
                $disable->execute();
            }
            return $row;
        }
    }
    /* -------------------------------- ORDER BOM ------------------------------- */
    /* -------------------------- SHOW ORDER WEB (USER) ------------------------- */
    function showOrderWeb(){
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]["id"] : "";
        if(!empty($userId) && is_numeric($userId)){
            $stmt = $this->db->prepare("SELECT * FROM orders WHERE userId = ?");
            $stmt->bind_param("i", $userId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result;
                }
            }
        }
    } 
    /* -------------------------- SHOW ORDER WEB (USER) ------------------------- */
    /* ------------------------------ CANCEL ORDER ------------------------------ */
    function cancelOrder(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            // Delete order details
            $stmt = $this->db->prepare("DELETE FROM orderdetails WHERE orderId = ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                // Delete order
                $stmt = $this->db->prepare("DELETE FROM orders WHERE id = ?");
                $stmt->bind_param("i", $id);
                if($stmt->execute()){
                    $mess = "Thành công";
                }else{
                    $mess = "Lỗi";
                }
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    /* ------------------------------ CANCEL ORDER ------------------------------ */
}
