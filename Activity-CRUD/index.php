<?php

    include 'db.php';

    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Students</title>
</head>
<body>
    <h2>List of Students</h2>
    <table border = '1'>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Degree Program</th>
            <th>Major</th>
            <th>Student Year</th>
        </tr>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] ."</td>";
                    echo "<td>" . $row["age"] ."</td>";
                    echo "<td>" . $row["phone"] ."</td>";
                    echo "<td>" . $row["email"] ."</td>";
                    echo "<td>" . $row["degree_prog"] ."</td>";
                    echo "<td>" . $row["major"] ."</td>";
                    echo "<td>" . $row["student_year"] ."</td>";
                    echo "<td><a href = 'delete.php?id=". $row["id"] ."'>Delete</td>";
                    echo "<td><a href = 'edit.php?id=". $row["id"] ."'>Edit</td>";
                    echo "</tr>";
                }
            }else{
                echo "<tr><td colspan='3'>Empty List</td></tr>";
            }
        ?>
    </table>
    <a href="add.php">Add New Student</a>
</body>
</html>