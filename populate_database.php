<?php
// RE-ENGINEERING REFERENCE: Lecture slides week 5 part 2 <-- CITE IN PROJECT REPORT

// Upon successful connection to the database, cp476_db, populates the initialized empty tables with data
// The data is taken from NameFile.txt and CourseFile.txt
// Located under the data folder of the project folder

include("connect_database.php"); // connect to database before populating it

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

function insertData($data, $table, $conn){
    // $table is a string that identifies whether to insert into the NameTable or CourseTable
    // so $table = "name" or "course"
    if (strcmp($table, "name") == 0){
        // then insert $data into NameTable
        $stmt = $conn->prepare("INSERT INTO NameTable (StudentID, StudentName) VALUES (:StudentID, :StudentName)");
        foreach ($data as $row) {
            $studentID = $row[0];
            $studentName = $row[1];
            $stmt->bindParam(":StudentID", $studentID);
            $stmt->bindParam(":StudentName", $studentName);
            $stmt->execute();
        }
    } else { // for populating the CourseTable with $data
        $stmt = $conn->prepare("INSERT INTO CourseTable (StudentID, CourseCode, Test1, Test2, Test3, FinalExam)
        VALUES (:StudentID, :CourseCode, :Test1, :Test2, :Test3, :FinalExam)");
        foreach ($data as $row) {
            $stmt->bindParam(":StudentID", $row[0]);
            $stmt->bindParam(":CourseCode", $row[1]);
            $stmt->bindParam(":Test1", $row[2]);
            $stmt->bindParam(":Test2", $row[3]);
            $stmt->bindParam(":Test3", $row[4]);
            $stmt->bindParam(":FinalExam", $row[5]);
            $stmt->execute();
        }
    }
    // Note that this function only assumes that NameTable and CourseTable are the only two tables
    // It can be edited to add data to other tables if needed.
}

$nameData = readData($nameFile);
$courseData = readData($courseFile);

insertData($nameData, "name", $conn);
echo "NameTable populated with data from NameFile.txt successfully.<br>";

insertData($courseData, "course", $conn);
echo "CourseTable populated with data from CourseFile.txt successfully.<br>";

// $conn = null; // close connection. Will be reopened by re-including $connect_database.php in the necessary file

?>