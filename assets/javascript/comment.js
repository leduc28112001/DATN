document.addEventListener("DOMContentLoaded", ()=>{
    let comment = document.getElementById("comment");
    comment.addEventListener("click", ()=>{
        let content_comment = document.getElementById("content-comment").value;
        let productId = document.getElementById("productId");
        // Hiển thị biểu tượng "Loading" trước khi gửi yêu cầu Ajax
        if(content_comment.trim() !== "" && productId.value !== ""){
            let loadingElement = document.getElementById("loading");
            loadingElement.style.display = "block";
            let xhr = new XMLHttpRequest();
            xhr.open(
                "POST",
                "./handles/comment-action.php",
                true
            );
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = () =>{
                loadingElement.style.display = "none";
                document.getElementById("content-comment").value = "";
                if(xhr.responseText == "Không thể đánh giá khi chưa mua sản phẩm"){
                    Swal.fire({icon: 'error',title: 'Oops...',text: xhr.responseText,});
                }else{
                    Swal.fire({icon: 'success',title: 'Thành công',text: 'Cảm ơn bạn đã đánh giá sản phẩm',});
                }   
            }
            xhr.send("content=" + content_comment + "&productId=" + productId.value);
        }else{
            Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',});
        }
    });
});