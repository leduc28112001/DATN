<form class="input" action="?action=add-product" method="POST" enctype="multipart/form-data" onsubmit="return validateAddProduct()">
    <h1>Thêm sản phẩm</h1>
    <label for="categoryId">Danh mục</label>
    <select name="categoryId" id="categoryId">
        <?php 
        if(isset($categories)){
            foreach ($categories as $category) :
            ?><option value="<?= $category['id'] ?>"><?= $category['categoryName'] ?></option><?php //HTML
            endforeach;
        }
        ?>
    </select>
    <label for="image">Ảnh</label>
    <input type="file" name="image" id="image">
    <label for="">Tên sản phẩm</label>
    <input type="text" name="productName" id="productName" placeholder="Nhập tên sản phẩm">
    <label for="">Giá</label>
    <input type="number" name="price" id="price" placeholder="Nhập giá">
    <label for="">Giảm giá (%)</label>
    <input type="number" name="discount" id="discount" placeholder="%">
    <label for="">Số lượng</label>
    <input type="number" name="quantity" id="quantity" placeholder="Nhập số lượng">
    <label for="">Mô tả sản phẩm</label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Nhập mô tả sản phẩm"></textarea>
    <label for="">Chi tiết sản phẩm</label>
    <textarea name="details" id="details" cols="30" rows="10" placeholder="Nhập chi tiết sản phẩm"></textarea>
    <button name="add-product">Thêm sản phẩm</button>
</form>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Thêm thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=products';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đầy đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
