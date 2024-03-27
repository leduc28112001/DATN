<?php 
// Cấu hình SendMail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Cấu hình SendMail
class Email_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    function showEmailList(){
        $stmt = $this->db->prepare("SELECT * FROM emails");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    function showMessageEmail(){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            $stmt = $this->db->prepare("SELECT message FROM emails WHERE id = ?");
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
    function deleteEmail(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            $stmt = $this->db->prepare("DELETE FROM emails WHERE id = ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $mess = "Thành công";
            }else{
                $mess = 'Lỗi';
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    function sendMail(){
        $mess = "";
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "";
        $name = (isset($_POST["name"])) ? $_POST["name"] : "";
        $email = (isset($_POST["email"])) ? $_POST["email"] : "";
        $message = (isset($_POST["message"])) ? $_POST["message"] : "";
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $create = date("Y-m-d H:i:s");

        if(!empty($userId) && !empty($name) && !empty($email) && !empty($message)){
            if(is_numeric($userId)){
                $stmt = $this->db->prepare("INSERT INTO emails(`userId`,`name`,`email`,`message`,`createdate`) VALUES (?,?,?,?,?)");
                $stmt->bind_param("issss", $userId, $name, $email, $message, $create);
                if($stmt->execute()){
                    $mess = "Thành công";
                }else{
                    $mess = "Lỗi";
                }
            }else{
                $mess = "Bạn chưa đăng nhập";
            }
        }else{
            $mess = "Chưa nhập đầy đủ thông tin";
        }
        return $mess;
    }
    function replyEmail(){
        $mess = "";
        $email = (isset($_GET["email"])) ? $_GET["email"] : "";
        $subject = (isset($_POST["subject"])) ? $_POST["subject"] : "";
        $message = (isset($_POST["message"])) ? $_POST["message"] : "";
        if(!empty($email) && !empty($subject) && !empty($message)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                // Cấu hình SendMail
                require '../PHPMailer-master/src/Exception.php';
                require '../PHPMailer-master/src/PHPMailer.php';
                require '../PHPMailer-master/src/SMTP.php';
                // Cấu hình SendMail
                $mail = new PHPMailer(true);
            
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = USERNAME;
                $mail->Password = PASSWORD;
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
            
                $mail->setFrom(FROM);
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;
            
                if($mail->send()){
                    $mess = 'Thành công';
                }else{
                    $mess = "Lỗi";
                }
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Chưa nhập đầy đủ thông tin";
        }
        return $mess;
    }
}
?>