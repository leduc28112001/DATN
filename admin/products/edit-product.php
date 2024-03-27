<form class="input" action="?action=edit-product&id=<?= (isset($_GET["id"]) ? $_GET["id"] : "") ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateAddProduct()">
    <h1>Sửa sản phẩm</h1>
    <label for="categoryId">Danh mục</label>
    <select name="categoryId" id="categoryId">
        <option value="<?= $dataOld['categoryId'] ?>">Mặc định</option>
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
    <input type="hidden" name="imageOld" value="<?= $dataOld['image'] ?>">
    <label for="">Tên sản phẩm</label>
    <input type="text" name="productName" id="productName" placeholder="Nhập tên sản phẩm" value="<?= $dataOld['productName'] ?>">
    <label for="">Giá</label>
    <input type="number" name="price" id="price" placeholder="Nhập giá" value="<?= $dataOld['price'] ?>">
    <label for="">Giảm giá (%)</label>
    <input type="number" name="discount" id="discount" placeholder="%" value="<?= $dataOld['discount'] ?>">
    <label for="">Số lượng</label>
    <input type="number" name="quantity" id="quantity" placeholder="Nhập số lượng" value="<?= $dataOld['quantity'] ?>">
    <label for="">Mô tả sản phẩm</label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Nhập mô tả"><?= $dataOld['description'] ?></textarea>
    <label for="">Chi tiết sản phẩm</label>
    <textarea name="details" id="details" cols="30" rows="10" placeholder="Nhập chi tiết"><?= $dataOld['details'] ?></textarea>
    <button name="edit-product">Chỉnh sửa</button>
</form>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Sửa thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=products';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đầy đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->