<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reservation Details | Do5o Dish</title>
    <link href="css\bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <span style="position: relative; left: 120px; top: 20px; font-size: 25px; color: #6E2CF3">Your table has been successfully reserved. We will be happy to meet you &#10084;</span>
    <br><br>
    <div class="container mt-5">
        <h3>Your Reservation Information</h3>

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "restaurant";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT * FROM reservation ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

   
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();  
            
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead><tr><th>Field</th><th>Details</th></tr></thead>";
            echo "<tbody>";
            echo "<tr><td><strong>Name</strong></td><td>" . $row["customer_name"] . "</td></tr>";
            echo "<tr><td><strong>Phone</strong></td><td>" . $row["phone"] . "</td></tr>";
            echo "<tr><td><strong>Date</strong></td><td>" . $row["res_date"] . "</td></tr>";
            echo "<tr><td><strong>Time</strong></td><td>" . $row["res_time"] . "</td></tr>";
            echo "<tr><td><strong>Guests</strong></td><td>" . $row["guests"] . "</td></tr>";
            echo "<tr><td><strong>Created At</strong></td><td>" . $row["created_at"] . "</td></tr>";
            echo "<tr><td><strong>Reservation Number</strong></td><td>" . $row["id"] . "</td></tr>";
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No reservations found.";
        }

        //Exit connection
        $conn->close();
        ?>
    </div>

    <br>
    <a href="index.php" class="btn btn-success" style="position: relative; left: 120px;">Home page</a>
    <a href="reserve.php" class="btn btn-info" style="position: relative; left: 120px;">Book again</a>
    <script src="js\bootstrap.bundle.min.js"></script>
</body>
</html>
