<?php
    $servername="localhost";
    $username= "camil";
    $password= "camilgrace";
    $dbname= "student_list";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("". $conn->connect_error);
    }
?>