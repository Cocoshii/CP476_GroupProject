<?php
// Upon successful connection to the database, cp476_db, populates the initialized empty tables with data
// The data is taken from NameFile.txt and CourseFile.txt
// Located under the data folder of the project folder

include("connect_database.php");

$nameFile = fopen("data/NameFile.txt", "r");
$courseFile = fopen("data/CourseFile.txt", "r");


function readData($file){
    $data = [];
    while (!feof($file)){ // loop until we reach the end of the file
        $line = fgets($file);
        if (!empty($line)) { // only add data valaues to data array if the line is not empty
            // (there may be trailing or empty lines in the file and we don't want to add those)
            $dataValues = explode(",", $line);
            array_push($data, $dataValues);
        }
    }
    return $data;
}

function insertData($data, $table){
    // $table is a string that identifies whether to insert into the NameTable or CourseTable
    // so $table = "name" or "course"

}

$nameData = readData($nameFile);
$courseData = readData($courseFile);

// print_r($nameData);
// print_r($courseData);

// Insert data
$sql = $conn->prepare('INSERT INTO name (student_id, student_name) VALUES (?, ?)');
foreach ($data as $row){



}

?>