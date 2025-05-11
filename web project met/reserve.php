<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserve | Do5o Dish</title>
  <link href="css\bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Do5o Dish</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link active" href="reserve.php">Reserve Table</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="mb-4">Reserve a Table</h2>

  <form action="reserve.php" method="POST" class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Name</label>
      <input type="text" name="customer_name" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Date</label>
      <input type="date" name="res_date" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Time</label>
      <input type="time" name="res_time" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Guests</label>
      <input type="number" name="guests" class="form-control" required>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-success">Confirm Reservation</button>
    </div>
  </form>
</div>

<script src="js\bootstrap.bundle.min.js"></script>
</body>
</html>



<?php
//Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $res_date = $_POST['res_date'];
    $res_time = $_POST['res_time'];
    $guests = $_POST['guests'];

    $sql = "INSERT INTO reservation (customer_name, phone, res_date, res_time, guests) 
            VALUES ('$customer_name', '$phone', '$res_date', '$res_time', '$guests')";

    if ($conn->query($sql) === TRUE) {
      header("Location: confirmation.php");
      exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
