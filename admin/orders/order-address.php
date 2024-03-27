<?php 
$db = require '../config/database.php';
$userController = new User_Controller($db);
?>
<a href="?room=orders" class="back"><i class="fa-solid fa-left-long"></i></a>
<table>
    <?php 
    if(isset($result)){
        ?>
            <tr>
                <th>Địa chỉ</th>
                <th>Tỉnh thành</th>
                <th>Quận huyện</th>
                <th>Xã phường</th>
            </tr>
            <tr>
                <td><?= $result['address'] ?></td>
                <td><?= $userController->getLocation('province', $result['province']) ?></td>
                <td><?= $userController->getLocation('district', $result['district']) ?></td>
                <td><?= $userController->getLocation('wards', $result['wards']) ?></td>
            </tr>
        <?php // HTML
    }else{
        messRed("Trống");
    }
    ?>
</table>