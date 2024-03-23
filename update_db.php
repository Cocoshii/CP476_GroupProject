

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Form Example</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formType = $_POST["formType"];

    // Process each form based on its type
    if ($formType == "form1") {
        // Process Form 1 data
        // Example: Validate inputs, perform database operations, etc.
        echo '<h2>Form 1 Submitted</h2>';
    } elseif ($formType == "form2") {
        // Process Form 2 data
        // Example: Validate inputs, perform database operations, etc.
        echo '<h2>Form 2 Submitted</h2>';
    }
}
?>

<h2>Select Form</h2>
<form method="POST">
    <label for="formType">Select Form Type:</label>
    <select name="formType">
        <option value="form1">Form 1</option>
        <option value="form2">Form 2</option>
    </select>
    <input type="submit" value="Submit">
</form>

<!-- Form 1 -->
<h2>Form 1</h2>
<form method="POST">
    <!-- Form fields for Form 1 -->
    <label for="field1">Field 1:</label>
    <input type="text" name="field1">
    <input type="hidden" name="formType" value="form1"> <!-- Hidden input to identify form type -->
    <input type="submit" value="Submit Form 1">
</form>

<!-- Form 2 -->
<h2>Form 2</h2>
<form method="POST">
    <!-- Form fields for Form 2 -->
    <label for="field2">Field 2:</label>
    <input type="text" name="field2">
    <input type="hidden" name="formType" value="form2"> <!-- Hidden input to identify form type -->
    <input type="submit" value="Submit Form 2">
</form>

</body>
</html>
