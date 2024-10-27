<?php

    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $degree_prog = $_POST['degree_prog'];
        $major = $_POST['major'];
        $student_year = $_POST['student_year'];

        if(!empty($name) && !empty($age) && !empty($phone) && !empty($email) && !empty($degree_prog) && !empty($major) && !empty($student_year)){
            $sql = "INSERT INTO students (name, age, phone, email, degree_prog, major, student_year) VALUES ('$name', '$age', '$phone', '$email', '$degree_prog', '$major', '$student_year')";
            
            if($conn->query($sql)===TRUE){
                echo "New student added successfully!";
            }
            else{
                echo "Failed too add new student.";
            }
        }
        else{
            echo "Please fill all fields! ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
</head>
<body>
    <h2>Add New Student</h2>

    <form method="post" action="add.php">
        Name: <input type="text" name="name"><br><br>
        Age: <input type="text" name="age"><br><br>
        Phone: <input type="text" name="phone"><br><br>
        Email: <input type="text" name="email"><br><br>
        Degree_prog: <input type="text" name="degree_prog"><br><br>
        Major: <input type="text" name="major"><br><br>
        Student_year: <input type="text" name="student_year"><br><br>
        <input type="submit" value="Add Student"><br><br>
    </form>
    <a href="index.php">Back to List of Students</a>
</body>
</html>