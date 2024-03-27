<button class="add"><a href="?room=add-banner">Thêm Banner</a></button>
<table style="width:100%;">
    <!-- XỬ LÍ HIỂN THỊ -->
    <?php 
    if(isset($banners)){
        ?>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>URL</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            <?php 
            if(isset($banners)){
                foreach ($banners as $banner){
                    ?>
                    <tr>
                        <td><?= $banner['id'] ?></td>
                        <td><img width="100px" src="../assets/image/<?= $banner['image'] ?>" alt=""></td>
                        <td><?= $banner['url'] ?></td>
                        <td><?= $banner['description'] ?></td>
                        <td><?= $banner['status'] ?></td>
                        <td class="actions">
                            <a href="?room=banners&action=update-banner&status=display&id=<?= $banner['id'] ?>" class="black"><i class="fa-regular fa-eye"></i> Hiển thị</a>
                            <a href="?room=banners&action=update-banner&status=hidden&id=<?= $banner['id'] ?>" class="black"><i class="fa-regular fa-eye-slash"></i> Ẩn</a>
                            <a href="?room=edit-banner&id=<?= $banner['id'] ?>" class="green"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                            <a onclick="return confirmDelete('?action=delete-banner&id=<?= $banner['id'] ?>&room=banners')" href="" class="red"><i class="fa-solid fa-trash-can"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php // HTML
                }
            }
        }else{
            if(!isset($alertDelete) && !isset($alertUpdate)){
                messRed("Trống");
            }
        }
    ?>
    <!-- XỬ LÍ HIỂN THỊ -->
</table>
<!-- Xử lí hiển thị -->
<?= (isset($alertUpdate) && $alertUpdate === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Cập nhật thành công'}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=banners';}});</script>" : ""?>
<?= (isset($alertUpdate) && $alertUpdate === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Xóa thành công',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=banners';}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
