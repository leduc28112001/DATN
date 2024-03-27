<?php 
class Blog_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    } 
    /* ------------------------------- SHOW BLOG LIST WEB ------------------------------ */
    function showBlogListWeb(){
        $status = "display";
        $stmt = $this->db->prepare("SELECT * FROM blogs WHERE status = ?");
        $stmt->bind_param("s", $status);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    /* ------------------------------- SHOW BLOG LIST WEB ------------------------------ */
    /* ------------------------------- SHOW BLOG LIST ------------------------------ */
    function showBlogList(){
        $stmt = $this->db->prepare("SELECT * FROM blogs");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    /* ------------------------------- SHOW BLOG LIST ------------------------------ */
    /* ------------------------------- SHOW BLOG LIST ------------------------------ */
    function showBlogById(){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(is_numeric($id)){
            $stmt = $this->db->prepare("SELECT * FROM blogs WHERE id = ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result->fetch_assoc();
                }
            }
        }
    }
        /* ------------------------------- SHOW BLOG LIST ------------------------------ */
    /* ------------------------------- ADD BLOG ------------------------------ */
    function addBlog(){
        $mess = "";
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]["id"] : "";
        $image = (isset($_FILES['image'])) ? $_FILES['image']['name'] : "";
        $title = (isset($_POST["title"])) ? $_POST["title"] : "";
        $description = (isset($_POST["description"])) ? $_POST["description"] : "";
        $content = (isset($_POST["content"])) ? $_POST["content"] : "";
        $createdate = date("Y-m-d H:i:s");
        $status = "hidden";

        if(!empty($image) && !empty($title) && !empty($status) && !empty($createdate) && !empty($description) && !empty($content)){
            if(isset($_POST["add-blog"])){
                $stmt = $this->db->prepare("INSERT INTO blogs(`userId`,`image`,`title`,`description`,`content`,`createdate`,`status`) VALUES (?,?,?,?,?,?,?)");
                $stmt->bind_param("issssss", $userId, $image, $title, $description, $content, $createdate, $status);
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
    /* ------------------------------- ADD BLOG ------------------------------ */
    /* ------------------------------- DATA OLD BLOG ------------------------------ */
    function dataOldBlog(){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            $stmt = $this->db->prepare("SELECT * FROM blogs WHERE id = ?");
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
    /* ------------------------------- DATA OLD BLOG ------------------------------ */
    /* ------------------------------- EDIT BLOG ------------------------------ */
    function editBlog(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $image = (isset($_FILES['image'])) ? $_FILES['image']['name'] : "";
            if(empty($image)){
                $image = $_POST["imageOld"];
            }
            $title = (isset($_POST["title"])) ? $_POST["title"] : "";
            $description = isset($_POST["description"]) ? $_POST["description"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";
            
            if(!empty($id) && is_numeric($id) && !empty($image) && !empty($title) && !empty($description) && !empty($content)){
                if(isset($_POST["edit-blog"])){
                    $stmt = $this->db->prepare("UPDATE blogs SET image = ?, title = ?, description = ?, content = ? WHERE id = ?");
                    $stmt->bind_param("ssssi", $image, $title, $description, $content, $id);
                    if($stmt->execute()){
                        $mess = "Thành công";
                    }else{
                        $mess = "Lỗi";
                    }
                }
            }else{
                $mess = "Chưa nhập đầy đủ thông tin";
            }
        }
        return $mess;
    }
    /* ------------------------------- EDIT BLOG ------------------------------ */
    /* ------------------------------- UPDATE BLOG ------------------------------ */
    function updateBlog(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        $status = (isset($_GET["status"])) ? $_GET["status"] : "";
        if(!empty($status) && !empty($id) && is_numeric($id)){
            if($status === "hidden" || $status === "display"){
                $stmt = $this->db->prepare("UPDATE blogs SET status = ? WHERE id = ?");
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
    /* ------------------------------- UPDATE BLOG ------------------------------ */
    /* ------------------------------- DELETE BLOG ------------------------------ */
    function deleteBlog(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            $stmt = $this->db->prepare("DELETE FROM blogs WHERE id = ?");
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
    /* ------------------------------- DELETE BLOG ------------------------------ */
}