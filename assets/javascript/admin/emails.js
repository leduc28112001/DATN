function validateReplyEmail(){
    let subject = document.getElementById("subject");
    let message = document.getElementById("message");
    let isValid = true;
    if(subject.value == ""){
        isValid = false;
        subject.style.borderColor = "red";
    }
    if(message.value == ""){
        isValid = false;
        subject.style.borderColor = "red";
    }
    // if(isValid === false){
    //     Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',});
    // }
    return isValid;
}