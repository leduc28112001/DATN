<?php 
$db = require '../config/database.php';
$userController = new User_Controller($db);
?>
<a href="?room=users" class="back"><i class="fa-solid fa-left-long"></i></a>
<table style="width:100%;">
    <!-- /* ---------------------------------- DATA ---------------------------------- */ -->
    <?php 
    if(isset($result)){
        ?>
        <tr>
            <th>User ID</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>
        <?php // HTML
        foreach ($result as $users => $user) :
        ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['fullname'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['address'] ?></td>
            <td><?= $user['numberphone'] ?></td>
        </tr>
        <?php // HTML
        endforeach;
    }else{
        messRed("Empty");
    }
    ?>
    <!-- /* ---------------------------------- DATA ---------------------------------- */ -->
</table>