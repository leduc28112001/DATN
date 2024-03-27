function validateAddBanner(){
    let image = document.getElementById("image");
    let url = document.getElementById("url");
    let type = document.getElementById("type");
    let description = document.getElementById("description");
    var valid = true;

    if(image.value == 0){
        image.style.borderColor = 'red';
        valid = false;
    }else{
        image.style.borderColor = 'gray';
        valid = true;
    }
    if(url.value == 0){
        url.style.borderColor = 'red';
        valid = false;
    }else{
        url.style.borderColor = 'gray';
        valid = true;
    }
    if(description.value == 0){
        description.style.borderColor = 'red';
        valid = false;
    }else{
        description.style.borderColor = 'gray';
        valid = true;
    }
    // if(!valid){
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Oops...',
    //         text: 'Not fully entered information!',
    //     });
    // }
    return valid;
}