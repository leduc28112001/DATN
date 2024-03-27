function validateAddCategory(){
    let categoryName = document.getElementById("categoryName");
    let description = document.getElementById("description");
    let valid = true;
    if(categoryName.value == 0){
        categoryName.style.borderColor = 'red';
        valid = false;
    }else{
        categoryName.style.borderColor = 'gray';
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