<form class="input" action="?action=add-size&id=<?= $_GET["id"] ?>" method="POST" enctype="multipart/form-data" onsubmit="return true">
    <h1>Thêm size</h1>
    <label for="sizeId">Size</label>
    <select name="sizeId" id="">
        <?php 
        if(isset($sizes)){
            foreach ($sizes as $size) :
            ?><option value="<?= $size['id'] ?>"><?= $size['size'] ?> (ID = <?= $size['id'] ?>)</option><?php //HTML
            endforeach;
        }   
        ?>
    </select>
    <button name="add-size">Thêm mới</button>
</form>
<!-- Xử lí hiển thị -->
<input type="hidden" id="sizeId" value="<?= $_GET["id"] ?>">
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Thêm thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=add-size&id=' + document.getElementById('sizeId').value;}});</script>" : ""?>
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
            <th>Mã size</th>
            <th>Thao tác</th>
        </tr>
        <?php //HTML
        foreach ($data as $item) :
            ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['productId'] ?></td>
                <td><?= $item['sizeId'] ?></td>
                <td>
                    <a class="red" onclick="return confirmDelete('?action=delete-productsize&id=<?= $item['id'] ?>')" href=""><i class="fa-solid fa-trash-can"></i> Xóa</a>
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
