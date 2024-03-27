function validateRegister(){
    let username = document.getElementById("username");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let confirmpassword = document.getElementById("confirmpassword");
    let error_confirm = document.getElementById("error-confirm");
    let isValid = true;
    if(username.value == 0){
        username.style.borderColor = 'red';
        isValid = false;
    }else{
        username.style.borderColor = '#c5c5c5';
    }
    if(email.value == 0){
        email.style.borderColor = 'red';
        isValid = false;
    }else{
        email.style.borderColor = '#c5c5c5';
    }
    
    if(password.value == 0){
        password.style.borderColor = 'red';
        isValid = false;
    }else{
        password.style.borderColor = '#c5c5c5';
    }
    
    if(confirmpassword.value == 0){
        confirmpassword.style.borderColor = 'red';
        isValid = false;
    }else{
        confirmpassword.style.borderColor = '#c5c5c5';
    }
    if(isValid === false){
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Chưa nhập đầy đủ thông tin!',
        });
    }else{
        if(password.value !== confirmpassword.value){
            isValid = false;
            error_confirm.innerHTML = "Mật khẩu không trùng khớp";
        }
    }
    return isValid;
}

function validateLogin(){
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let isValid = true;
    if(email.value == 0){
        email.style.borderColor = 'red';
        isValid = false;
    }else{
        email.style.borderColor = '#c5c5c5';
    }
    if(password.value == 0){
        password.style.borderColor = 'red';
        isValid = false;
    }else{
        password.style.borderColor = '#c5c5c5';
    }
    if(isValid === false){
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Chưa nhập đầy đủ thông tin!',
        });
    }
    return isValid;
}

function validateForgotPassword(){
    let email = document.getElementById("email");
    let isValid = true;
    if(email.value == 0){
        email.style.borderColor = 'red';
        isValid = false;
    }else{
        email.style.borderColor = '#c5c5c5';
    }
    if(isValid === false){
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Chưa nhập đầy đủ thông tin!',
        });
    }
    return isValid;
}

function validateNewPassword(){
    let password = document.getElementById("password");
    let confirmpassword = document.getElementById("confirmpassword");
    let isValid = true;
    let pass = password.value;
    let cfPass = confirmpassword.value;
    if(pass !== cfPass){
        error_confirm.innerHTML = "Mật khẩu không trùng khớp";
        isValid == false;
    }
    if(password.value == 0){
        password.style.borderColor = 'red';
        isValid = false;
    }else{
        password.style.borderColor = '#c5c5c5';
    }
    
    if(confirmpassword.value == 0){
        confirmpassword.style.borderColor = 'red';
        isValid = false;
    }else{
        confirmpassword.style.borderColor = '#c5c5c5';
    }
    if(isValid === false){
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Chưa nhập đầy đủ thông tin!',
        });
    }
    return isValid;
}