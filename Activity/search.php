<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Database Search</title>
</head>
<body>
    <h2>Search Books in the Database</h2>

    <form method="get" action="search.php">
        <label for="search">Search for a book title:</label>
        <br>
        <input type="text" name="query" id="search">
        <br><br>

        <input type="submit" value="Search">
    </form>

    <?php
   
    echo "Search Query: " . $searchQuery;

        if (isset($_GET['query'])) {
            $searchQuery = htmlspecialchars($_GET['query']);

            $servername = "localhost";
            $username = "";
            $password = "";
            $dbname = "search_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }else{
                echo "Connected successfully!";
            }

            $sql = "SELECT * FROM books WHERE LOWER(title) LIKE LOWER('%$searchQuery%')";
            if (!$result = $conn->quesry($sql)) {
                echo "SQL error: " . $conn->error;
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>Search Results:</h2>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["title"] . " by " .$row["author"] . " (" .$row["year_published"] . ")</li>";
                }
                echo "</ul>";
            } else {
                echo "No results found for: " . $searchQuery;
            }

            $conn->close();
        };
    ?>

</body>
</html>