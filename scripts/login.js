function ValidateEmail(email) {
    const emailRegEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return emailRegEx.test(email);
}
function ShowPassword() {
    let x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function IsEmpty(val) {
    return (val == "") || (val == null);
}

function displayFormData(form) {
    const formData = new FormData(document.getElementById(form));
    for (const [key, value] of formData.entries()) {
        if (value instanceof File) {
            readAndDisplayFile(value);
        } else {
            console.log(`${key}: ${value}`);
        }
    }
}
function readAndDisplayFile(file) {
    const reader = new FileReader();
    reader.onload = function (e) {
        console.log(`${file.name}: ${e.target.result}`);
    };
    reader.readAsDataURL(file);
}


