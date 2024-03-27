<button class="add"><a href="?room=add-promotion">Thêm khuyến mãi</a></button>
<table style="width:100%;">
    <?php 
    if(isset($result)){
        ?>
            <tr>
                <th>ID</th>
                <th>Tên khuyến mãi</th>
                <th>Mô tả</th>
                <th>Giảm giá (%)</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        <?php // HTML
        foreach ($result as $promotions => $promotion) :
            ?>
                <tr>
                    <td><?= $promotion['id'] ?></td>
                    <td><?= $promotion['promotionName'] ?></td>
                    <td><?= $promotion['description'] ?></td>
                    <td><?= $promotion['percent'] ?></td>
                    <td><?= $promotion['startDate'] ?></td>
                    <td><?= $promotion['endDate'] ?></td>
                    <td><?= $promotion['status'] ?></td>
                    <td class="actions">
                        <form action="?action=delete-promotion" method="POST">
                        <a href="?room=promotions&action=update-promotion&status=display&id=<?= $promotion['id'] ?>" class="black"><i class="fa-regular fa-eye"></i> Display</a>
                            <a href="?room=promotions&action=update-promotion&status=hidden&id=<?= $promotion['id'] ?>" class="black"><i class="fa-regular fa-eye-slash"></i> Hidden</a>
                            <a class="green" href="?room=edit-promotion&id=<?= $promotion['id']?>"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                            <button onclick="return confirmDelete('?action=delete-promotion&id=<?= $promotion['id']?>')" type="submit" name="delete" class="red"><i class="fa-solid fa-trash-can"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            <?php //HTML
        endforeach;
    }else{
        if(!isset($alertDelete)){
            messRed("Chưa có khuyến mãi nào");
        }
    }
    ?>
</table>
<!-- Xử lí hiển thị -->
<?= (isset($alertUpdate) && $alertUpdate === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Cập nhật thành công'}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=promotions';}});</script>" : ""?>
<?= (isset($alertUpdate) && $alertUpdate === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Xóa thành công',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=promotions';}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
