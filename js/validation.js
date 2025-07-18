function validateForm(){
    const email = document.forms["regForm"]["email"].value;
    const username = document.forms["regForm"]["username"].value;
    const password = document.forms["regForm"]["password"].value;

    if (!email || !username || !password) {
        alert("All fields must be filled out");
        return false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    return true;
}
