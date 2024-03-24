<?php
/* Calculates the final grade of a student based on their three test scores and final exam score.
Note from MLS:
- Each test weighs 20% and the final exam weighs 40%. The final grade is calculated with
the following: (test,1,2,3) 3x20% + (final exam) 40% = 100%.
- All the grades should be decimal number with one digital after the dot.
*/

require_once 'login.php'; // Include the login.php to use the established $conn PDO connection

try {
    // Check if the FinalExamGradesCalculation table exists, drop if it does, and create a fresh one
    $dropAndCreateTableSQL = "
    DROP TABLE IF EXISTS FinalExamGradesCalculation;
    CREATE TABLE FinalExamGradesCalculation (
        StudentID VARCHAR(9) NOT NULL,
        StudentName VARCHAR(100) NOT NULL,
        CourseCode VARCHAR(5) NOT NULL,
        FinalGrade FLOAT NOT NULL,
        FOREIGN KEY(StudentID) REFERENCES NameTable(StudentID),
        PRIMARY KEY(StudentID, CourseCode)
    );";

    $conn->exec($dropAndCreateTableSQL);
    echo "FinalExamGradesCalculation table has been dropped and recreated.<br>";

    // Continue with the process of fetching grades and inserting them into the new table
    $sql = "SELECT n.StudentID, n.StudentName, c.CourseCode, c.Test1, c.Test2, c.Test3, c.FinalExam FROM NameTable n JOIN CourseTable c ON n.StudentID = c.StudentID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();

    if ($results) {
        foreach ($results as $row) {
            $finalGrade = ($row['Test1'] * 0.2) + ($row['Test2'] * 0.2) + ($row['Test3'] * 0.2) + ($row['FinalExam'] * 0.4);

            // Prepare insert statement for the FinalExamGradesCalculation table
            $insertSql = "INSERT INTO FinalExamGradesCalculation (StudentID, StudentName, CourseCode, FinalGrade) VALUES (:StudentID, :StudentName, :CourseCode, :FinalGrade)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->execute([
                ':StudentID' => $row['StudentID'],
                ':StudentName' => $row['StudentName'],
                ':CourseCode' => $row['CourseCode'],
                ':FinalGrade' => $finalGrade
            ]);

            echo "Record inserted: StudentID - " . $row['StudentID'] . ", CourseCode - " . $row['CourseCode'] . ", Final Grade - " . $finalGrade . "<br>";
        }
    } else {
        echo "No course records found.";
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    exit("Error occurred while handling the FinalExamGradesCalculation table or fetching/inserting data. Exiting program...");
}

?>
