function verify() {
    var pwd = document.getElementById("pass").value.trim();
    var cnpwd = document.getElementById('confirm').value.trim();
    var secret = document.getElementById("secret").value.trim();
    var text = document.getElementById("text").value.trim();
    var regx = /^([a-z 0-9\._-]+)@([a-z0-9-]+).([a-z.]{2,8})$/;
    if (!regx.test(text)) {
        document.getElementById("email").innerHTML = "*Enter Valid ID";
        return false;

    }
    if (pwd === "") {
        document.getElementById('password').innerHTML = "*Enter the Password";
        return false;
    }

    if (cnpwd === "") {
        document.getElementById('conpassword').innerHTML = "*Enter the Confirm Password";
        return false;
    }
    if (secret === "") {
        document.getElementById('sec').innerHTML = "*Enter the Secret Code";
        return false;
    }


    if (pwd === cnpwd) {
        if (pwd.length < 8 || pwd.length>15) {
            alert("Password must be 8 to 15 characters..!!");
            return false;
        }
    } else if (pwd != cnpwd) {
        alert("Password Didn't Match");
        return false;
    } else {
        return true;
    }
    if (secret.length>=9 || secret.length<=3){
        alert("Secret code must be 4 to 8 characters..!!");
        return false;
    }

    return true;
}
function verifyin() {
    var pwd = document.getElementById("pass").value.trim();
    var text = document.getElementById("text").value.trim();
    var regx = /^([a-z 0-9\._-]+)@([a-z0-9-]+).([a-z.]{2,8})$/;
    if (!regx.test(text)) {
        document.getElementById("email").innerHTML = "*Enter Valid ID";
        return false;

    }
    if (pwd === "") {
        document.getElementById('password').innerHTML = "*Enter the Password";
        return false;
    }
    if (pwd.length < 8 || pwd.length>15) {
        alert("Password must be 8 to 15 characters..!!");
        return false;
    }
    return true;
}
function sec() {
    var secret = document.getElementById("secret").value.trim();
    var text = document.getElementById("text").value.trim();
    var regx = /^([a-z 0-9\._-]+)@([a-z0-9-]+).([a-z.]{2,8})$/;
    if (!regx.test(text)) {
        document.getElementById("email").innerHTML = "*Enter Valid ID";
        return false;

    }
    if (secret === "") {
        document.getElementById('sec').innerHTML = "*Enter the Password";
        return false;
    }
    if (secret.length < 8 || secret.length>15) {
        alert("Secret Code must be 4 to 8 characters..!!");
        return false;
    }
    return true;
}
function dislighting(the) {
    var shadow = document.getElementById(the);
    if (shadow.parentElement.lastElementChild.innerHTML !== "") {
        shadow.parentElement.lastElementChild.innerHTML = "";
        shadow.parentElement.lastElementChild.style.paddingTop = "0px";
    }
}
function contact() {
    var name = document.getElementById("name").value.trim();
    var phone = document.getElementById('phone').value.trim();
    var email = document.getElementById("email").value.trim();
    var regx = /^([a-z 0-9\._-]+)@([a-z0-9-]+).([a-z.]{2,8})$/;
    
    if (name === "") {
        alert( "*Enter the Name");
        return false;
    }

    var phoneno = /^\d{10}$/;
    if(!phone.match(phoneno)){
        alert("*Enter Valid Number");
        return false;
    }
    if (!regx.test(email)) {
        alert( "*Enter Valid Email");
        return false;
    }
    return true;
}
