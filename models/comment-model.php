<?php 
class Comment_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    /* ---------------------------- SHOW LIST COMMENT --------------------------- */
    function showListComment(){
        $stmt = $this->db->prepare("SELECT * FROM comments");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    /* ---------------------------- SHOW LIST COMMENT --------------------------- */
    /* ---------------------------- SHOW LIST COMMENT FOR PRODUCT --------------------------- */
    function showListCommentForProduct(){
        $productId = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($productId) && is_numeric($productId)){
            $stmt = $this->db->prepare(
                "SELECT users.userName AS userComment, comments.createdate AS commentTime, comments.content AS content, comments.userId AS userId
                FROM comments
                INNER JOIN users ON comments.userId = users.id
                INNER JOIN products ON comments.productId = products.id 
                WHERE comments.productId = ? "
            );
            $stmt ->bind_param("i", $productId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result;
                }
            }
        }
    }
    /* ---------------------------- SHOW LIST COMMENT FOR PRODUCT --------------------------- */
    /* ---------------------------- SHOW LIST COMMENT DETAILS --------------------------- */
    function showListCommentDetails(){
        $productId = (isset($_GET["productId"])) ? $_GET["productId"] : "";
        if(!empty($productId) && is_numeric($productId)){
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE productId = ?");
            $stmt->bind_param("i", $productId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result;
                }
            }
        }
    }
    /* ---------------------------- SHOW LIST COMMENT DETAILS --------------------------- */
    /* ---------------------------- CREATE COMMENT --------------------------- */
    function createComment(){
        $content = $_POST["content"];
        $contentTrimed = trim($content);
        $productId = $_POST["productId"];
        session_start();
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "";
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // Cấu hình giờ Việt Nam
        $createdate = date("Y-m-d H:i:s");
        
        
        if(!empty($content) && !empty($productId) && !empty($userId) ){
            if(is_numeric($productId) && is_numeric($userId)){
                // check user buy product
                $check = $this->db->prepare("SELECT * 
                                            FROM orderdetails
                                            INNER JOIN orders 
                                            ON orderdetails.orderId = orders.id
                                            INNER JOIN users 
                                            ON users.id = orders.userId
                                            WHERE orderdetails.productId = ? AND users.id = ? AND orders.userId = ?");
                $check->bind_param("iii", $productId, $userId, $userId);
                $check->execute();
                $resCheck = $check->get_result();
                if($resCheck->num_rows > 0){
                    $stmt = $this->db->prepare("INSERT INTO comments (`userId`,`productId`,`content`,`createdate`) VALUES (?,?,?,?) ");
                    $stmt->bind_param("iiss", $userId, $productId, $contentTrimed, $createdate);
                    if($stmt->execute()){
                        $inforNewComment = $this->db->prepare(
                            "SELECT users.userName AS userName, users.id AS userId,comments.createdate AS createdate, comments.content AS content
                            FROM comments INNER JOIN users ON comments.userId = users.id
                            WHERE comments.createdate = ? AND userId = ?; 
                        ");
                        $inforNewComment->bind_param("si", $createdate, $userId);
                        if($inforNewComment->execute()){
                            $result = $inforNewComment->get_result();
                            $row = $result->fetch_assoc();
                            return $row;
                        }else{
                            $row = ["user" => 999];
                        }
                    }
                }else{
                    return "Không thể đánh giá khi chưa mua sản phẩm";
                }
                // check user buy product
            }
        }
    }
    /* ---------------------------- CREATE COMMENT --------------------------- */
    /* ---------------------------- QUANTITY COMMENT --------------------------- */
    function quantityComment(){
        $productId = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($productId) && is_numeric($productId)){
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE productId = ?");
            $stmt ->bind_param("i", $productId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                $quantity = $result->num_rows;
                return $quantity;
            }
        }
    }
    /* ---------------------------- QUANTITY COMMENT --------------------------- */
    /* ---------------------------- QUANTITY COMMENT ADMIN --------------------------- */
    function quantityCommentAdmin($productId){
        if(!empty($productId) && is_numeric($productId)){
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE productId = ?");
            $stmt ->bind_param("i", $productId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                $quantity = $result->num_rows;
                return $quantity;
            }
        }
    }
    /* ---------------------------- QUANTITY COMMENT ADMIN --------------------------- */
    /* ---------------------------- UPDATE RATE COMMENT --------------------------- */
    function updateRateComment(){
        $mess = "";
        $content = (isset($_GET["content"])) ? $_GET["content"] : "";
        $value = (isset($_POST["value"])) ? $_POST["value"] : "";
        if(!empty($content) && !empty($value)){
            $stmt = $this->db->prepare("UPDATE comments SET rate = ? WHERE content = ?");
            $stmt->bind_param("ss", $value, $content);
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
    /* ---------------------------- UPDATE RATE COMMENT --------------------------- */
    /* ---------------------------- DELETE COMMENT --------------------------- */
    function deleteComment(){
        $mess = "";
        $content = (isset($_POST["content"])) ? $_POST["content"] : "";
        if(!empty($content)){
            $stmt = $this->db->prepare("DELETE FROM comments WHERE content = ?");
            $stmt->bind_param("s", $content);
            if($stmt->execute()){
                $mess = "Thành công";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    /* ---------------------------- DELETE COMMENT --------------------------- */
    /* ---------------------------- DELETE COMMENT ADMIN --------------------------- */
    function deleteCommentAdmin(){
        $mess = "";
        $content = (isset($_GET["content"])) ? $_GET["content"] : "";
        if(!empty($content)){
            $stmt = $this->db->prepare("DELETE FROM comments WHERE content = ?");
            $stmt->bind_param("s", $content);
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
    /* ---------------------------- DELETE COMMENT ADMIN --------------------------- */
}