<?php
/*
This file enables the user to update existing data rows. Syntax for updating data is as
UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;


*/

ob_start(); // Do not send any output to the web browser. This section is to initialize the database and initiate database connection
include("connect_database.php");
include("populate_database.php");
ob_end_clean(); // stops blocking output

session_start();

// Verify condition input
$setError = "";
$conditionError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Once form is submitted on user end, run this code
    if (empty($_POST["newValues"]))  // if user submits while SET field is empty
        $setError = "SET input field is required.";

    if (empty($_POST["condition"])) // if user submits while WHERE field is empty
        $conditionError = "WHERE input field is required";

    // if (empty($usernameError) && empty($passwordError)){
    //     // If values were entered, execute the validateLogin() function
    //     $username = $_POST["username"];
    //     $password = $_POST["password"];
    //     if (validateLogin($username, $password) == true){
    //         header("Location: homepage.html");
    //     } else {
    //         $loginError = "Failed to login. Username or password incorrect.";
    //     }
    //     // header("Location: verifyLogin.php");
    //     // exit();
    // }

}


?>


<!-- SEARCH DATABASE WEB USER INTERFACE: HTML -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="html_classes.css"> <!-- Link to CSS file -->
</head>

<body>

<!-- Welcome heading -->
<div class="centerText"><h1>Update Database Entries</h1></div>

<!-- Form interface:
UPDATE (dropdown menu of existing table names)
SET (manually typed in column names and new values)
WHERE (condition, manually typed in) -->

<form method="POST">

    <div class="centerText"><p style="font-size: 20px;">Please fill in the blank text field below to delete a data entry from the database:</p>
    <!-- <p>DELETE FROM <span id="tableMenu"></span> WHERE <span id="condition"></span>.</p> -->
    Update operations are of the general form:<br>
    <b>UPDATE tableName<br>
    SET columnName = newValue<br>
    WHERE condition</b><br>
    
    For example:<br>
    <b>UPDATE FinalGrades<br>
    SET FinalGrade = 69.3<br>
    WHERE studentID = 12345678</b><br>
    </div></p><br>

    <p>UPDATE

    <select name="tableMenu" id="tableMenu">
    <option value="NameTable">NameTable</option>
    <option value="CourseTable">CourseTable</option>
    <option value="FinalGrades">FinalGrades</option>
    </select><br><br>

    SET 
    <input type="text" id="newValues" name="newValues">
    <span class="error" style="color:red;">* <?php echo $setError;?></span><br><br>
    
    WHERE
    <input type="text" id="condition" name="condition">
    <span class="error" style="color:red;">* <?php echo $conditionError;?></span><br><br>
    
    </p>

    <br><input type="submit" value="Execute update">


</form>
</body>
</html>

