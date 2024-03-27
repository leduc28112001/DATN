<?php 
class Statistical_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    function orders(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $start_date = date("Y-m-d H:i:s", strtotime("-7 days"));
        $end_date = date("Y-m-d H:i:s");
        
        $stmt = $this->db->prepare(
            "SELECT 
                DATE(createdate) AS date, 
                COUNT(*) AS total_orders, 
                SUM(total) AS total
            FROM orders
            WHERE createdate BETWEEN ? AND ?
            GROUP BY DATE(createdate)
            ORDER BY date"
        );
        
        $stmt->bind_param("ss", $start_date, $end_date);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while($row = $result->fetch_assoc()){
            $data['date'][] = $row['date'];
            $data['orderTotal'][] = $row['total_orders'];
            $data['total'][] = $row['total'];
        }
        return $data;
    }
    function statistical($table){
        $stmt = $this->db->prepare("SELECT * FROM `$table` ");
        $stmt->execute();
        $result = $stmt->get_result();
        $num_row = $result->num_rows;
        return $num_row;
    }
    function statisticalRevenue(){
        $stmt = $this->db->prepare("SELECT SUM(orders.total) as total FROM orders ");
        $stmt->execute();
        $result = $stmt->get_result();
        $total = $result->fetch_assoc();
        return $total['total'];
    }
}
?>