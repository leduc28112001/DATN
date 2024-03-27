<?php 
class Promotion_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    } 
    /* ------------------------------- SHOW BANNER LIST WEB ------------------------------ */
    function showPromotionListWeb(){
        $status = "display";
        $stmt = $this->db->prepare("SELECT * FROM promotions WHERE status = ?");
        $stmt->bind_param("s", $status);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    /* ------------------------------- SHOW BANNER LIST WEB ------------------------------ */
    /* ------------------------------- SHOW BANNER LIST ------------------------------ */
    function showPromotionList(){
        $stmt = $this->db->prepare("SELECT * FROM promotions");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    /* ------------------------------- SHOW BANNER LIST ------------------------------ */
    /* ------------------------------- ADD BANNER ------------------------------ */
    function addPromotion(){
        $mess = "";
        $promotionName = (isset($_POST["promotionName"])) ? $_POST["promotionName"] : "";
        $description = (isset($_POST["description"])) ? $_POST["description"] : "";
        $percent = (isset($_POST["percent"])) ? $_POST["percent"] : "";
        $startDate = (isset($_POST["startDate"])) ? $_POST["startDate"] : "";
        $endDate = (isset($_POST["endDate"])) ? $_POST["endDate"] : "";
        $status = "hidden";

        if(!empty($promotionName) && !empty($startDate) && !empty($endDate) && !empty($status) && !empty($description)){ // Thiếu cái mô tả
            if(isset($_POST["add-promotion"])){
                $stmt = $this->db->prepare("INSERT INTO promotions(`promotionName`,`description`,`percent`,`startDate`, `endDate`, `status`) VALUES (?,?,?,?,?,?)");
                $stmt->bind_param("ssisss", $promotionName, $description, $percent, $startDate, $endDate, $status);
                if($stmt->execute()){
                    $mess = "Thành công";
                }else{
                    $mess = "Lỗi";
                }
            }
        }else{
            $mess = "Chưa nhập đầy đủ thông tin";
        }
        return $mess;
    }
    /* ------------------------------- ADD BANNER ------------------------------ */
    /* ------------------------------- DATA OLD BANNER ------------------------------ */
    function dataOldPromotion(){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            $stmt = $this->db->prepare("SELECT * FROM promotions WHERE id = ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    return $row;
                }
            }
        }
    }
    /* ------------------------------- DATA OLD BANNER ------------------------------ */
    /* ------------------------------- EDIT BANNER ------------------------------ */
    function editPromotion(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["edit-promotion"])){
                $mess = "";
                $promotionName = (isset($_POST["promotionName"])) ? $_POST["promotionName"] : "";
                $description = (isset($_POST["description"])) ? $_POST["description"] : "";
                $percent = (isset($_POST["percent"])) ? $_POST["percent"] : "";
                $startDate = (isset($_POST["startDate"])) ? $_POST["startDate"] : "";
                $endDate = (isset($_POST["endDate"])) ? $_POST["endDate"] : "";
                
                if(!empty($id) && is_numeric($id) && !empty($promotionName) && !empty($startDate) && !empty($endDate) && !empty($description)){ // Thiếu mô tả
                    $stmt = $this->db->prepare("UPDATE promotions SET promotionName = ?, description = ?, percent = ?, startDate = ?, endDate = ? WHERE id = ?");
                    $stmt->bind_param("ssissi", $promotionName, $description, $percent, $startDate, $endDate, $id);
                    if($stmt->execute()){
                        $mess = "Thành công";
                    }else{
                        $mess = "Lỗi";
                    }
                }else{
                    $mess = "Chưa nhập đầy đủ thông tin";
                }
            }
        }
        return $mess;
    }
    /* ------------------------------- EDIT BANNER ------------------------------ */
    /* ------------------------------- UPDATE BANNER ------------------------------ */
    function updatePromotion(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        $status = (isset($_GET["status"])) ? $_GET["status"] : "";
        if(!empty($status) && !empty($id) && is_numeric($id)){
            if($status === "hidden" || $status === "display"){
                $stmt = $this->db->prepare("UPDATE promotions SET status = ? WHERE id = ?");
                $stmt->bind_param("si", $status, $id);
                if($stmt->execute()){
                    $mess = "Thành công";
                }
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    /* ------------------------------- UPDATE BANNER ------------------------------ */
    /* ------------------------------- DELETE BANNER ------------------------------ */
    function deletePromotion(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            $stmt = $this->db->prepare("DELETE FROM promotions WHERE id = ?");
            $stmt->bind_param("i", $id);
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
    /* ------------------------------- DELETE BANNER ------------------------------ */
}
