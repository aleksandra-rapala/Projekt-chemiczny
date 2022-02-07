const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');

const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirm_password"]');


//czy podany email jest poprawny
function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;  //tez sprawdzanie typu
}


//jezeli warunek jest niepoprawny to temu elementowi dodamy klase no-valid
//w przeciwnym wypadku usun ta klasę

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}



//zdarzenia które zostana odpalone

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                passwordInput.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
        },
        1000
    );
}

//keyup - gdy zwolnimy przycisk
emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword);