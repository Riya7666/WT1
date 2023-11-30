<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];

    $sql = "UPDATE students SET name='$name', roll='$roll', city='$city' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $row = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Roll: <input type="text" name="roll" value="<?php echo $row['roll']; ?>" required><br>
        City: <input type="text" name="city" value="<?php echo $row['city']; ?>" required><br>
        <input type="submit" value="Update Student">
    </form>
</body>
</html>
