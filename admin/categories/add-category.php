<form class="input" action="?action=add-category" method="POST" onsubmit="return validateAddCategory()">
    <h1>Thêm danh mục</h1>
    <label for="">Tên danh mục</label>
    <input type="text" name="categoryName" id="categoryName" placeholder="Nhập tên danh mục">
    <label for="">Mô tả</label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Nhập mô tả"></textarea>
    <button name="add-category">Add Category</button>
</form>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Thêm thành công',confirmButtonText: 'View',showCancelButton: true,cancelButtonText: 'Continue',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=categories';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đầy đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->