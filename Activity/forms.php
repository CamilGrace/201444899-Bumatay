<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Forms</title>
</head>
<body>
    <form action="forms.php" method="post">
        <label for="firstname">Enter your First Name:</label>
        <br>
        <input type="text" name="fname" id="name">
        <br><br>
        
        <label for="lastname">Enter your Last Name:</label>
        <br>
        <input type="text" name="lname" id="lasname">
        <br><br>
        
        <label for="age">Enter your age:</label>
        <br>
        <input type="number" name="edad" id="age">
        <br><br>
        
        <input type="submit" value="Submit">
    </form>


    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $name=htmlspecialchars($_POST["fname"]);
            $lastname=htmlspecialchars($_POST["lname"]);
            $age=htmlspecialchars($_POST["edad"]);

            echo "<h3>Your Inputs:</h3><br>";
            echo "First Name: ".$name."<br>";
            echo "Last Name: ".$lastname."<br>";
            echo "Age: ".$age."<br>";
        }
    ?>
</body>
</html>