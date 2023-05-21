document.addEventListener('DOMContentLoaded', (event) => {
    var passwordInput = document.querySelector('input[name=password]');
    var confirmPasswordInput = document.querySelector('input[name=password_confirmation]');
    var emailInput = document.querySelector('input[name=email]');
    var nameInput = document.querySelector('input[name=name]');

    passwordInput.addEventListener('input', function () {
        if (!this.value) {
            this.style.backgroundColor = '#FFFFFF'; // white
        } else {
            var strength = getStrength(this.value);
            this.style.backgroundColor = getStrengthColor(strength);
        }
    });

    confirmPasswordInput.addEventListener('input', function () {
        if (!this.value) {
            this.style.backgroundColor = '#FFFFFF'; // white
        } else {
            this.style.backgroundColor = (this.value === passwordInput.value) ? '#00FF00' : '#FF0000';
        }
    });

    emailInput.addEventListener('input', function () {
        if (!this.value) {
            this.style.backgroundColor = '#FFFFFF'; // white
        } else {
            this.style.backgroundColor = validateEmail(this.value) ? '#00FF00' : '#FF0000';
        }
    });

    nameInput.addEventListener('input', function () {
        if (!this.value) {
            this.style.backgroundColor = '#FFFFFF'; // white
        } else {
            this.style.backgroundColor = this.value.length >= 2 ? '#00FF00' : '#FF0000';
        }
    });
});

function getStrength(password) {
    var strength = 0;
    if (password.length > 7) strength++;
    if (password.length > 11) strength++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
    if (/\d/.test(password)) strength++;
    if (/\W/.test(password)) strength++;
    return strength;
}

function getStrengthColor(strength) {
    switch (strength) {
        case 0: case 1: case 2: return '#FF0000';  // red for weak
        case 3: case 4: return '#FFFF00';  // yellow for acceptable
        case 5: return '#00FF00';  // green for strong
    }
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
