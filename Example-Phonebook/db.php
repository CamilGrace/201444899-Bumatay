<?php
    $servername = "localhost";
    $username = "camil";
    $password = "camilgrace";
    $dbname = "phonebook";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed". $conn->connect_error);
    }
?>