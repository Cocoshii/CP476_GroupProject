<?php

// Code re-engineering reference:
// https://www.w3schools.com/php/php_form_required.asp <-- CITE THIS IN PROJECT REPORT

// Error handling variables
$usernameError = "";
$passwordError = "";

// Username and password fields cannot be left blank. Most values must also be valid.

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Once form is submitted on user end, run this code
    // Username validation
    if (empty($_POST["username"]))  // if user submits while username field is empty
        $usernameError = "Username is required";
    else 
        $username = validateUsername($_POST["username"]); // send user input to validateUsername for validation

    // Password validation
    if (empty($_POST["password"])) // if user submits while password field is empty
        $passwordError = "Password is required";
    else 
        $password = validatePassword($_POST["password"]); // send user input to validatePassword for validation
    
}


function validateUsername($username){
    // Ensure username is valid
    echo "Validating username..."; // temporary debug statement

}

function validatePassword($password){
    // Ensure password is valid
    echo "Validating password..."; // temporary debug statement

}

?>