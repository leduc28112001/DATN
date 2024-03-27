<a href="?room=products" class="back"><i class="fa-solid fa-left-long"></i></a>
<a href="" class="refresh"><i class="fa-solid fa-arrows-rotate"></i></a>
<table>
    <!-- XỬ LÍ HIỂN THỊ -->
    <?php 
    if(isset($result)){
        ?>
            <tr>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
            <?php 
            if(isset($result)){
                foreach ($result as $image){
                    ?>
                    <tr>
                        <td><img width="260px" src="../assets/image/<?= $image['image'] ?>" alt=""></td>
                        <td class="actions">
                            <a onclick="return confirmDelete('?action=delete-image&image=<?= $image['image'] ?>&productId=<?= (isset($_GET['productId'])) ? $_GET['productId'] : '' ?>&room=images')" href="" class="red"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php // HTML
                }
            }
        }
    ?>
    <!-- XỬ LÍ HIỂN THỊ -->
    <!-- XỬ LÍ HIỂN THỊ -->
    <?php 
    if(!isset($alertDelete)){
        ?>
        <tr>
            <td>
                <input type="file" id="imageMore">
                <input type="hidden" id="productId" value="<?= (isset($_GET["productId"])) ? $_GET["productId"] : "" ?>">
            </td>
            <td><button id="addImageMore" class="green">Thêm mới</button></td>
        </tr>
        <?php // HTML
    }
    ?>
    <!-- XỬ LÍ HIỂN THỊ -->
</table>
<!-- LẤY ID ĐỂ NHẢY VỀ TRANG IMAGE CỦA PRODUCT VỪA RỒI -->
<input type="hidden" value="<?= $image['productId'] ?>" id="productIdIMG"> 
<!-- LẤY ID ĐỂ NHẢY VỀ TRANG IMAGE CỦA PRODUCT VỪA RỒI -->
<!-- Xử lí hiển thị -->
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script> let productIdIMG = document.getElementById('productIdIMG').value; Swal.fire({icon: 'success',title: 'Thành công',text: 'Xóa thành công',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=images&productId='+productIdIMG;}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->