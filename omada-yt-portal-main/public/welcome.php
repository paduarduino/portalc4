<?php

require 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Connect to WiFi</title>

<!-- Use latest intl-tel-input CSS from CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css"/>

<style>
body {
font-family: Arial, sans-serif;
background-image:url('https://assets.onecompiler.app/435jw49h2/43due6j3h/bg.jpg');
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
margin: 0;
background-repeat: no-repeat;
background-size: cover;
background-position: center;
}

.container {
background-color:#ffffff;
padding: 2rem;
border-radius: 20px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
text-align: center;
width: 90%;
max-width: 400px;
}

h2 {
margin-bottom: 1rem;
}

.logo {
width: 200px;
height: 200px;
max-width: 100%;
border-radius: 40px;
margin-bottom: 40px;
}

form {
display: flex;
flex-direction: column;
align-items: center;
}

input {
width: 100%;
padding: 0.75rem;
margin-bottom: 1rem;
border: 1px solid #ccc;
border-radius: 4px;
font-size: 1rem;
box-sizing: border-box;
}

#phone {
padding-left: 60px !important; /* Adjusted to match the input field with flag */
}

.iti {
width: 100%;
}

.iti__flag-container {
top: 0;
bottom: 0;
display: flex;
align-items: center;
}

.iti__selected-flag {
height: 100%;
display: flex;
align-items: center;
padding-left: 10px;
}

.iti__country-list {
max-height: 200px;
overflow-y: auto;
}

button {
width: 200px;
padding: 0.75rem;
background-color: #007bff;
color: #ffffff;
border: none;
border-radius: 14px;
cursor: pointer;
font-size: 1rem;
}

button:hover {
background-color: #0056b3;
}

.terms {
margin-top: 1rem;
font-size: 0.9rem;
}

.terms a {
color: #007bff;
text-decoration: none;
}

.terms a:hover {
text-decoration: underline;
}
</style>
</head>
<body>
<div class="container">
<img src="https://assets.onecompiler.app/435jw49h2/43due6j3h/Screenshot%202025-03-26%20at%205.02.54%E2%80%AFPM.png" alt="Logo" class="logo" />
<h1>Connect to WiFi</h1>
<p>Please enter your details below</p>
<form id="loginForm">
<input type="text" id="firstName" name="firstName" placeholder="First Name" required />
<input type="text" id="lastName" name="lastName" placeholder="Last Name" required />
<input type="email" id="email" name="email" placeholder="Email Address" required />
<input type="tel" id="phone" name="phone" placeholder="          Phone Number" required />
<h2></h2>
<button type="submit">Sign In</button>
</form>
<p class="terms">
By logging in, you agree to our
<a href="#">Terms and Conditions</a> and
<a href="#">Privacy Policy</a>.
</p>
</div>

<!-- Latest intl-tel-input JS from CDN -->
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
const phoneInput = document.querySelector("#phone");

const iti = window.intlTelInput(phoneInput, {
initialCountry: "in",
separateDialCode: true,
nationalMode: false,
autoPlaceholder: "polite",
allowDropdown: true,
autoHideDialCode: false,
utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
});

// Ensure phone number is at least 10 digits and does not exceed 11 digits
function validatePhoneNumber(phoneNumber) {
const digits = phoneNumber.replace(/\D/g, "");
return digits.length >= 10 && digits.length <= 11;
}

// Restrict input to numbers only in phone input and ensure it doesn't exceed 11 digits
phoneInput.addEventListener('input', function () {
let value = phoneInput.value;
const digitsOnly = value.replace(/\D/g, ''); // Allow only digits
if (digitsOnly.length <= 11) {
phoneInput.value = digitsOnly; // Set value back with only numbers
} else {
phoneInput.value = digitsOnly.slice(0, 10); // Restrict to 11 digits
}
});

document.getElementById('loginForm').addEventListener('submit', function(e) {
e.preventDefault();

const firstName = document.getElementById('firstName').value;
const lastName = document.getElementById('lastName').value;
const email = document.getElementById('email').value;
const phone = iti.getSelectedCountryData().dialCode + " " + phoneInput.value;

// Phone number validation
if (!validatePhoneNumber(phoneInput.value)) {
alert("Please enter a valid phone number with at least 10 digits and no more than 11 digits.");
return;
}

// Redirect to Google after form submission
window.location.href = "https://www.google.com";

alert(`Submitted:
First Name: ${firstName}
Last Name: ${lastName}
Phone: ${phone}
Email: ${email}`);
});
</script>
</body>
</html>
