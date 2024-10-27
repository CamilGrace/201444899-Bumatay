<?php

    include 'db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM students WHERE id = $id";
        if ($conn->query($sql)===TRUE) {
            echo "Student details successfully deleted!";
        }
        else {
            echo "Error deleting record!" . $sql . "<br" . $conn->error;
        }
    }
    header("Location: index.php");
?>