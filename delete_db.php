<?php
/*
This file enables the user to delete existing data entries in the database
(not to be confused with deleting the entire database, as handled by wipe_database.sql)
Syntax for a delete query is as follows: 
DELETE FROM table_name
WHERE condition;
*/


ob_start(); // Do not send any output to the web browser. This section is to initialize the database and initiate database connection
include("connect_database.php");
include("populate_database.php");
ob_end_clean(); // stops blocking output

session_start();

$conditionError = "";

?>


<!-- SEARCH DATABASE WEB USER INTERFACE: HTML -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="html_classes.css"> <!-- Link to CSS file -->
</head>

<body>

<!-- Welcome heading -->
<div class="centerText"><h1>Delete Database Entries</h1></div>

<!-- Form interface:
DELETE FROM (dropdown menu of existing table names) WHERE (condition, manually typed in) -->

<form method="POST">

    <div class="centerText"><p style="font-size: 20px;">Please fill in the blank text field below to delete a data entry from the database:</div></p>
    <!-- <p>DELETE FROM <span id="tableMenu"></span> WHERE <span id="condition"></span>.</p> -->
    <div class="centerText"><p>DELETE FROM

    <select name="tableMenu" id="tableMenu">
    <option value="NameTable">NameTable</option>
    <option value="CourseTable">CourseTable</option>
    <option value="FinalGrades">FinalGrades</option>
    </select>

    WHERE
    <input type="text" id="condition" name="condition"><br>
    <!-- <span class="error" style="color:red;">* <?php echo $conditionError;?></span><br> -->
    
    </p>


    <!-- <label for="tableMenu">Select a table to delete a database entry from:</label>
    <select name="tableMenu" id="tableMenu">
    <option value="NameTable">NameTable</option>
    <option value="CourseTable">CourseTable</option>
    <option value="FinalGrades">FinalGrades</option>
    </select><br>

    <br><label for="condition">Deletion condition (for example, <b>WHERE studentID = 12345678</b>) </label>
    <input type="text" id="condition" name="condition"><br>
    <span class="error" style="color:red;">* <?php echo $conditionError;?></span><br> -->

    <br><input type="submit" value="Execute deletion"></div>


</form>
</body>
</html>
