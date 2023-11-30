<?php
include 'config.php';

$result = $conn->query("SELECT * FROM students");

echo "<h2>Student Records</h2>";
echo "<a href='add.php'>Add New Student</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll</th>
            <th>City</th>
            <th>Action</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['roll']}</td>
                <td>{$row['city']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
