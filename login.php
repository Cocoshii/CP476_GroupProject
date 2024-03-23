<?php
// Initiate login session
session_start();

// Code re-engineering reference:
// https://www.w3schools.com/php/php_form_required.asp <-- CITE THIS IN PROJECT REPORT
// https://www.w3schools.com/html/html_forms.asp <-- CITE THIS IN PROJECT REPORT

ob_start(); // Do not send any output to the web browser. This section is to initialize the database and initiate database connection
include("connect_database.php");
include("populate_database.php");
ob_end_clean(); // stops blocking output

// Error handling variables
$usernameError = "";
$passwordError = "";
$loginError = "";

// Username and password fields cannot be left blank. Most values must also be valid.

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Once form is submitted on user end, run this code
    // Username validation
    if (empty($_POST["username"]))  // if user submits while username field is empty
        $usernameError = "Username is required";

    // Password validation
    if (empty($_POST["password"])) // if user submits while password field is empty
        $passwordError = "Password is required";

    if (empty($usernameError) && empty($passwordError)){
        // If values were entered, execute the validateLogin() function
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (validateLogin($username, $password) == true){
            header("Location: homepage.html");
        } else {
            $loginError = "Failed to login. Username or password incorrect.";
        }
        // header("Location: verifyLogin.php");
        // exit();
    }

}

function validateLogin($username, $password){
    // Ensure that the provided user-provided username and password are valid MySQL entries that can connect to the database
    $dbName = "cp476_db";
    $dsn = "mysql:host=localhost;dbname=$dbName;charset=utf8mb4"; // cp476_db is the name of the database to connect to
    try {
        // $conn = new PDO($dsn, $username, $password, $options);
        $conn = new PDO($dsn, $username, $password);
    
    } catch (PDOException $e) {
        error_log($e->getMessage());
        // exit("Failed to login. Username or password incorrect.");
        return false;
    
    }

    return true;

}


?>

<!-- LOGIN WEB USER INTERFACE: HTML -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="html_classes.css"> <!-- Link to CSS file -->
</head>

<body>

<!-- Welcome heading -->
<div class="centerText"><h1>Welcome. Please login with your credentials:</h1></div>

<!-- User login inputs -->

<form method="POST">

    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username">
    <span class="error" style="color:red;">* <?php echo $usernameError;?></span><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password">
    <span class="error" style="color:red;">* <?php echo $passwordError;?></span><br>

    <input type="submit" value="Submit">
    <span class="error" style="color:red;">* <?php echo $loginError;?></span><br>

</form>
</body>
</html>