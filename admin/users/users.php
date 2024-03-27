<table style="width:100%;">
    <!-- /* ---------------------------------- DATA ---------------------------------- */ -->
    <?php 
    if(isset($result)){
        ?>
        <tr>
            <th>Mã người dùng</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Trạng thái</th>
            <th>Đơn đặt</th>
            <th>Đơn Boom</th>
            <th>Thao tác</th>
        </tr>
        <?php // HTML
        foreach ($result as $users => $user) :
        ?>
        <tr>
            <td>
                <?= $user['id'] ?>
                <a href="?room=information-user&id=<?= $user['id'] ?>" class="inforUserMore"><i class="fa-solid fa-magnifying-glass"></i></a>
            </td>
            <td><?= $user['userName'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
                <strong>
                    <?php 
                    // Xử lí hiển thị - màu
                    $role = $user['role'];
                    if($role === 'admin'){
                        messRed($role);
                    }elseif($role === 'staff'){
                        messNavi($role);
                    }else{
                        echo $role;
                    }
                    // Xử lí hiển thị - màu
                    ?>
                </strong>
            </td>
            <td>
                <strong>
                    <?php 
                    $status = $user['status'];
                    if($status === 'active'){
                        messGreen($status);
                    }else{
                        messRed($status);
                    }
                    ?>
                </strong>
            </td>
            <td>
                <?php
                $db = include '../config/database.php';
                $orderController = new Order_Controller($db);
                echo $orderController->numOrder($user['id']);
                ?>
            </td>
            <td>
                <?= $orderController->numBoom($user['id']) ?>
            </td>
            <td class="actions">
                <?php 
                if($role !== 'admin'){ // Nếu người dùng không phải admin
                    $ss_role = $_SESSION["user"]['role'];
                    if($ss_role == 'admin'){
                        ?>
                            <form action="?action=updateUser" method="POST">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button name="action" value="active" class="green"><i class="fa-solid fa-lock-open"></i> Kích hoạt</button>
                                <button name="action" value="disable" class="red"><i class="fa-solid fa-lock"></i> Vô hiệu hóa</button>
                                <button name="action" value="user" class="green"><i class="fa-regular fa-user"></i> Người dùng</button>
                                <button name="action" value="staff" class="black"><i class="fa-solid fa-users"></i> Nhân viên</button>
                            </form>
                        <?php //HTML
                    }else{
                        messRed("no action");
                    }
                }else{
                    messRed("no action");
                }
                ?>
            </td>
        </tr>
        <?php // HTML
        endforeach;
    }else{
        messRed("Trống");
    }
    ?>
    <!-- /* ---------------------------------- DATA ---------------------------------- */ -->
</table>