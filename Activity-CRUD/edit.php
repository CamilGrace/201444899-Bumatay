<?php

    include 'db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM students WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $age = $row["age"];
            $phone = $row["phone"];
            $email = $row["email"];
            $degree_prog = $row["degree_prog"];
            $major = $row["major"];
            $student_year = $row["student_year"];
        }
        else{
            echo "No student found with that id";
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $degree_prog = $_POST['degree_prog'];
        $major = $_POST['major'];
        $student_year = $_POST['student_year'];
        $id=$_POST['id'];

        if(!empty($name) && !empty($age) && !empty($phone) && !empty($email) && !empty($degree_prog) && !empty($major) && !empty($student_year)) {
            $sql = "UPDATE students SET name='$name', age='$age', phone='$phone', email='$email', degree_prog='$degree_prog', major='$major', student_year='$student_year' WHERE id=$id";  
            
            if($conn->query($sql)===TRUE){
                echo "Student details updated!";
            }
            else{
                echo "Error editing record." . $sql . "<br>" . $conn->error;
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
    <title>Update</title>
</head>
<body>
    <h2>Edit Student Details</h2>

    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
        Age: <input type="text" name="age" value="<?php echo $age; ?>"><br><br>
        Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
        Degree_prog: <input type="text" name="degree_prog" value="<?php echo $degree_prog; ?>"><br><br>
        Major: <input type="text" name="major" value="<?php echo $major; ?>"><br><br>
        Student_year: <input type="text" name="student_year" value="<?php echo $student_year; ?>"><br><br>
        <input type="submit" value="Update Student Details"><br><br>
    </form>
    <a href="index.php">Back to List of Students</a>
</body>
</html>