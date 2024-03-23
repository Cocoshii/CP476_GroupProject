<?php

/* Handles user input queries
There are two versions for the interface: Simplified and manual. The user can select which interface they want through two radio buttons.
Manual interface is simple. There is simply a textbox where the user can enter their full query manually through a text field
And it will be validated accordingly.
Simplified interface is described below for users that are less familiar with the database and writing SQL queries:

Simplified interface as the following features (text in square brackets [] are optional):
SELECT (attribute or *) from (table name)[where attribute = value]

To make input easier, two radio buttons will be displayed at the top of the page, for example:
>> Which table would you like to search?
>> () Student Names Data Table
>> (x) Course Data Table
... and clicking on one of the above radio buttons autofills in the query for "from (table name)"

It also affects which attributes can be selected in the SELECT (attribute or *) section of the query
If Student Names is selected, a dropdown menu of the following items are available:
> All attributes (*)
> Student name
> StudentID

If Course Data is selected, a dropdown menu of the following items are available:
> All attributes (*)
> Student ID
> Course code
> Test 1 grade
> Test 2 grade
> Test 3 grade
> Final exam grade

The [where attribute = value] is optional. The condition is typed in manually in a text field. This may result in
an alert saying the query is invalid, if the user enters their condition incorrectly.
*/

session_start();

// connect to database (include)
include("connect_database.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") { // Once query form is submitted on user end, run this code
    

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
<div class="centerText"><h1>Search Database</h1></div>

<!-- User login inputs -->

<form method="POST">
    <!-- Choose between simplified or manual mode user input mode: -->
    <div class="centerText"><label for="simplified" style="font-size: 20px;">Simplified input</label>
    <input type="radio" onclick="location.href = 'search_db_simplified.php';" id="simplified" name="simplified" value="Simplified">
    <label for="manual" style="font-size: 20px;">Manual input</label>
    <input type="radio" onclick="location.href = 'search_db_manual.php';" id="manual" name="manual" value="Manual" checked></div>

    <div class="centerText"><p style="font-size: 20px;">Queries are of the general form: SELECT tableAttribute FROM tableName WHERE condition<br>
    Enter a query in the input text field below:</div></p>
    <div class="centerText"><input type="text" id="query" name="query" size="100"></div><br>
    <!-- <span class="error" style="color:red;">* <?php echo $usernameError;?></span><br> -->

    <div class="centerText"><input type="submit" value="Search" style="font-size: 20px;"></div>
    <!-- <span class="error" style="color:red;">* <?php echo $loginError;?></span><br> -->

</form>
</body>
</html>

