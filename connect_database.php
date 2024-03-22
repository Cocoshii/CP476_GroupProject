<?php

// CODE FROM LECTURE SLIDE: WEEK 5 PART 2 (cite this in the project report I guess)
$dbName = "cp476_db";
$dsn = "mysql:host=localhost;dbname=cp476_db;charset=utf8mb4"; // cp476_db is the name of the database to connect to
$options = [
PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];
try {
    $password = "Please enter your password: "; // REPLACE WITH YOUR MYSQL PASSWORD BEFORE RUNNING FILE
    // Note: When editing this and committing changes, it's best to update $password back to a placeholder string
    // if you don't want others to see your password here.

    $conn = new PDO($dsn, "root", $password, $options);
} catch (PDOException $e) {
    error_log($e->getMessage());
    exit("Could not connect to database: exiting program...");
}

echo "Connected successfully to database: " . $dbName . "\n";

$conn=null; // close connection

?>
