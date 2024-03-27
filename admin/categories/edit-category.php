<form class="input" action="?action=edit-category&id=<?= isset($_GET["id"]) ? $_GET["id"] : "" ?>" method="POST">
    <h1>Sửa danh mục</h1>
    <label for="">Tên danh mục mới</label>
    <input type="text" name="categoryName" id="categoryName" placeholder="Nhập tên danh mục" value="<?= $dataOld['categoryName'] ?>">
    <label for="">Mô tả mới</label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Nhập mô tả"><?= $dataOld['description'] ?></textarea>
    <button name="edit-category">Chỉnh sửa</button>
</form>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Sửa thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=categories';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đầy đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->