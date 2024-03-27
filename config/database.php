<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'loctuan';

$db = new mysqli($host, $username, $password, $db_name);
if($db->connect_error){
    die("Kết nối database thất bại" . $db->connect_error);
}
return $db;