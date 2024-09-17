function validateForm(){
    const password = document.getElementById("paswrd").value;
    const passVal = /^\S{8,}$/;

    if(!passVal.test(password)){
        alert("Password must be atleast 8 characters long");
        return false;
    }
}
