function validateForm(){
    const password = document.getElementById("paswrd").value;
    const contact = document.getElementById("phone").value;

    const passVal = /^\S{8,}$/;
    const phoneVal = /^\d{10}$/;

    if(!passVal.test(password)){
        alert("Password must be atleast 8 characters long");
        return false;
    }

    if(!phoneVal.test(contact)){
        alert("Contact must be 10 characters long");
        return false;
    }
}
