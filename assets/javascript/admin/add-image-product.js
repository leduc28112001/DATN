let addImageMore = document.getElementById("addImageMore");
let productId = document.getElementById("productId");
let imageMore = document.getElementById("imageMore");
addImageMore.addEventListener("click",()=>{
        let image = imageMore.files[0].name;
        let xhr = new XMLHttpRequest();
        xhr.open(
            "POST",
            "../handles/add-image-product.php"
        );
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = ()=>{
            if(xhr.status === 200 && xhr.readyState === 4){
                let result = xhr.responseText;
                if(result === "Thành công"){
                    Swal.fire({icon: 'success',title: 'Thành công',text: 'Thêm thành công',});
                }else if(result === "Chưa nhập đầy đủ thông tin"){
                    Swal.fire({icon: 'error',title: 'Oops...',text: 'Chưa nhập đầy đủ thông tin!',});
                }else{
                    Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});
                }
            }
        }
        xhr.send("imageMore=" + image + "&productId=" + productId.value );
});