<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include "db.php";

    $sql="SELECT * FROM contacts";
    $result=$conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
</head>
<body>
    <h2>Phonebook</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>Delete</td>";
                    echo "</tr>";
                }
            }else{
                echo "<tr><td colspan='3'>No Contacts</td></tr>";
            }
        ?>
    </table>
</body>
</html>