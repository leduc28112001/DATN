document.addEventListener("DOMContentLoaded", ()=>{
    let delete_buttons = document.querySelectorAll(".delete-comment");
    delete_buttons.forEach(delete_button => {
        delete_button.addEventListener("click", (event) => {
            // Hiển thị biểu tượng "Loading" trước khi gửi yêu cầu Ajax
            let loadingElement = document.getElementById("loading");
            loadingElement.style.display = "block";
            // Get the content to delete
            let content_delete = event.target.parentElement.querySelector(".content-delete").value;
            if (content_delete !== "") {
                let data = "content=" + content_delete;
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "./handles/comment-delete.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = () => {
                    if (xhr.status === 200 && xhr.readyState === 4) {
                        let result = xhr.responseText;
                        if (result === "Thành công") {
                            loadingElement.style.display = "none";
                            Swal.fire({ icon: 'success', title: 'Xóa thành công bình luận', });
                            // Remove the deleted comment from the DOM
                            event.target.parentElement.remove();
                        } else if (result === "Chưa nhập đầy đủ thông tin") {
                            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Not fully entered information!' });
                        } else {
                            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Something went wrong!' });
                        }
                    }
                };
                xhr.send(data);
            } else {
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'Something went wrong!' });
            }
        });
    });
});
