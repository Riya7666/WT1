<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];

    $sql = "INSERT INTO students (name, roll, city) VALUES ('$name', '$roll', '$city')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br>
        Roll: <input type="text" name="roll" required><br>
        City: <input type="text" name="city" required><br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>
