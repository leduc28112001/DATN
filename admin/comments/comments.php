<table style="width:100%;">
    <?php 
    if(isset($result)){
        ?>
            <tr>
                <th>Mã người dùng</th>
                <th>Mã sản phẩm</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th>Đánh giá</th>
                <th>Thao tác</th>
            </tr>
        <?php // HTML
        foreach ($result as $comment) :
            ?>
                <tr>
                    <td><?= $comment['userId'] ?></td>
                    <td><?= $comment['productId'] ?></td>
                    <td><?= $comment['content'] ?></td>
                    <td><?= $comment['createdate'] ?></td>
                    <td>
                        <!-- XỬ LÍ HIỂN THỊ CHO ĐẸP -->
                        <?php 
                        $rate = $comment['rate'];
                        $color = "";
                        if($rate === "good"){
                            $color = "green";
                        }elseif($rate === "bad"){
                            $color = "red";
                        }else{
                            $rate = "not yet rate";
                        }
                        ?>
                        <span class="span-<?= $color ?>"><?= $rate ?></span>
                        <!-- XỬ LÍ HIỂN THỊ CHO ĐẸP -->
                    </td>
                    <td class="actions">
                        <form action="?action=update-rate-comment&content=<?= $comment['content'] ?>" method="POST">
                            <button type="submit" name="value" value="good" class="green"><i class="fa-regular fa-thumbs-up"></i> Tích cực</button>
                            <button type="submit" name="value" value="bad" class="red"><i class="fa-regular fa-thumbs-down"></i> Tiêu cực</button>
                            <button onclick="return confirmDelete('?room=comments&action=delete-comment&content=<?= $comment['content']?>')" type="submit" name="delete" class="red"><i class="fa-solid fa-trash-can"></i> Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php //HTML
        endforeach;
    }else{
        if(!isset($alertDelete)){
            messRed("Chưa có bình luận nào");
        }
    }
    ?>
</table>
<!-- Xử lí hiển thị -->
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Xóa thành công',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=comments';}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->