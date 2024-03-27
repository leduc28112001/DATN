document.addEventListener("DOMContentLoaded", ()=>{
    let editProfile = document.getElementById("editProfile");
    let boxsInfor = document.getElementById("boxs-infor");
    let editInformationUser = document.getElementById("editInformationUser");
    let uploadAvatar = document.getElementById("uploadAvatar");
    let eP = document.getElementById("eP");

    editProfile.addEventListener("click", ()=>{
        editInformationUser.style.display = "block";
        uploadAvatar.style.display = "flex";
        boxsInfor.style.display = "none";
        editProfile.style.display = "none";

        eP.addEventListener("click", ()=>{
            /* ---------------------------------- DATA ---------------------------------- */
            let newFullName = document.getElementById("fullName").value;
            let newEmail = document.getElementById("email").value;
            let newAddress = document.getElementById("address").value;
            let newNumberphone = document.getElementById("numberphone").value;
            let xhr = new XMLHttpRequest();
            xhr.open(
                "POST",
                "./handles/update-informationuser.php",
                true
            );
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = ()=>{
                if(xhr.readyState === 4 && xhr.status === 200){
                    let result = xhr.response;
                    if(result === "Thành công"){
                        Swal.fire({position: 'top-end',icon: 'success',title: 'Your work has been saved',showConfirmButton: false, timer: 1500,});
                    }else if(result === "Bạn chưa đăng nhập"){
                        Swal.fire({icon: 'error',title: 'Oops...',text: 'You not login!', allowOutsideClick: false,confirmButtonText: "Go to login"}).then((result) => { if (result.isConfirmed) {window.location.href = './auth/?auth=login';}});;
                    }else{
                        Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',});
                    }
            }
            }
            xhr.send("newFullName="+newFullName+"&newEmail="+newEmail+"&newAddress="+newAddress+"&newNumberphone="+newNumberphone);
            /* ---------------------------------- DATA ---------------------------------- */
        });
    });
});
function validateUpload(){
    let avatar = document.getElementById("avatar");
    let isValid = false;
    if(avatar.value !== ""){
        isValid = true;
    }else{
        Swal.fire({icon: 'error',title: 'Oops...',text: 'You have not selected a file!',});
    }
    return isValid;
}