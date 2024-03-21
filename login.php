<?php
// Initiate login session
session_start();

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

    // Password validation
    if (empty($_POST["password"])) // if user submits while password field is empty
        $passwordError = "Password is required";

    if (empty($usernameError) && empty($passwordError)){
        header("Location: verifyLogin.php");
        exit();
    }

}


?>

<!-- LOGIN WEB USER INTERFACE: HTML -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="loginClasses.css"> <!-- Link to CSS file -->
</head>

<body>

<!-- Welcome heading -->
<div class="centerText"><h1>Welcome. Please login with your credentials:</h1></div>

<!-- User login inputs -->
<!-- Note that localhost will have to be changed to an actual server name that we can run this program on
so the prof can test it -->
<!-- Also technically, action="handleLogin.php" should work and execute but for some reason, it instead
takes the user to the file code itself. It doesn't execute the code at all. So putting the full localhost URL is
a workaround for now.-->

<!-- <form action="http://localhost/handleLogin.php" method="POST">  -->
<form method="POST">

    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username">
    <span class="error">* <?php echo $usernameError;?></span><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password">
    <span class="error">* <?php echo $passwordError;?></span><br>

    <input type="submit" value="Submit">

</form>
</body>
</html>