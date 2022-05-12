var nameError = document.getElementById('name-error');
var emailError = document.getElementById('email-error');
var phoneError = document.getElementById('phone-error');
var messageError = document.getElementById('message-error');
var submitError = document.getElementById('submit-error');

// Validate name
function validateName() {
    var name = document.getElementById('contact-name').value;

    if (name.length == 0) {
        nameError.innerHTML = "Please enter full name!";
        return false;
    }
    if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
        nameError.innerHTML = "Write full name!";
        return false;
    }
    nameError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true;
}

// Validate email address
function validateEmail(){
    var email = document.getElementById('contact-email').value;

    if (email.length == 0) {
        emailError.innerHTML = "Please enter email!";
        return false;
    }
    if (!email.match(/^[A-Za-z\._\-0-9]+[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
        emailError.innerHTML = "Enter valid email!";
        return false;
    }
    emailError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true;

// Validator functions
// /^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/
// /^\S+@\S+\.\S+$/
} 

// Validate phone number
function validatePhone(){
    var phone = document.getElementById('contact-phone').value;

    if (phone.length == 0) {
        phoneError.innerHTML = "Please enter phone number!";
        return false;
    }
    if (phone.length !== 10) {
        phoneError.innerHTML = "Enter valid phone number!";
        return false;
    }
    if (!phone.match(/^[0-9]{10}$/)) {
        phoneError.innerHTML = "Enter valid phone number!";
        return false;
    }
    phoneError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true;

}

function validateForm(){
    if(!validateName() || !validateEmail() || !validatePhone()){
        submitError.style.display = 'block';
        submitError.innerHTML = 'Please fill details to submit';
        setTimeout(function() {
            submitError.style.display = 'none';            
        }, 3000);
        return false;
    }

}