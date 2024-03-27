<?php 
function translateId($userId, $table){
    require './config/database.php';
    
    // Câu lệnh SQL đầu tiên
    $stmt = $db->prepare("SELECT * FROM orders WHERE userId = ? ORDER BY id DESC LIMIT 1");
    $stmt->bind_param("i", $userId);
    
    // Thực hiện câu lệnh SQL đầu tiên
    if (!$stmt->execute()) {
        return null; // Trả về null nếu có lỗi
    }
    
    // Lấy kết quả của câu lệnh SQL đầu tiên
    $result1 = $stmt->get_result();
    $dataEnd = $result1->fetch_assoc();

    $id = null;
    $column = $table . "_id"; 
    if($table == 'province'){
        $id = $dataEnd['province'];
    }
    if($table == 'district'){
        $id = $dataEnd['district'];
    }
    if($table == 'wards'){
        $id = $dataEnd['wards'];
    }   

    // Câu lệnh SQL thứ hai
    $stmt2 = $db->prepare("SELECT * FROM $table WHERE $column = ?");
    $stmt2->bind_param("i", $id);
    
    // Thực hiện câu lệnh SQL thứ hai
    if (!$stmt2->execute()) {
        return null; // Trả về null nếu có lỗi
    }
    
    // Lấy kết quả của câu lệnh SQL thứ hai và trả về
    $result2 = $stmt2->get_result();
    return $result2->fetch_assoc();
}
?>
