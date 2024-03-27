<form class="input" action="?action=add-color&id=<?= $_GET["id"] ?>" method="POST" enctype="multipart/form-data" onsubmit="return true">
    <h1>Thêm màu</h1>
    <label for="colorId">Màu sắc</label>
    <select name="colorId" id="colorId">
        <?php 
        if(isset($colors)){
            foreach ($colors as $color) :
            ?><option value="<?= $color['id'] ?>"><?= $color['color'] ?> (ID = <?= $color['id'] ?>)</option><?php //HTML
            endforeach;
        }   
        ?>
    </select>
    <label for="image">Ảnh</label>
    <input type="file" name="image" id="image">
    <button name="add-color">Thêm mới</button>
</form>
<!-- Xử lí hiển thị -->
<input type="hidden" id="productId" value="<?= $_GET["id"] ?>">
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Thêm thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=add-color&id=' + document.getElementById('productId').value ;}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đầy đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
<table style="width: 100%;margin-top: 30px;">
    <?php 
    if(isset($data)){
        ?>
        <tr>
            <th>ID</th>
            <th>Mã sản phẩm</th>
            <th>Mã màu</th>
            <th>Ảnh</th>
            <th>Thao tác</th>
        </tr>
        <?php //HTML
        foreach ($data as $item) :
            ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['productId'] ?></td>
                <td><?= $item['colorId'] ?></td>
                <td><img src="../assets/image/<?= $item['image'] ?>" alt="" width="200px"></td>
                <td>
                <a class="red" onclick="return confirmDelete('?action=delete-productcolor&id=<?= $item['id'] ?>')" href=""><i class="fa-solid fa-trash-can"></i> Xóa</a>
                </td>
            </tr>
            <?php //HTML
        endforeach;
    }
    ?>
</table>
<!-- Xử lí hiển thị -->
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Xóa thành công',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=products';}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->