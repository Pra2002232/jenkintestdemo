<?php
$conn = new mysqli("localhost", "booking_user", "password123", "car_booking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pickup = $_POST['pickup'];
$drop = $_POST['drop'];
$pdate = $_POST['pdate'];
$ddate = $_POST['ddate'];
$ptime = $_POST['ptime'];
$dtime = $_POST['dtime'];
$car = $_POST['car'];
$distance = $_POST['distance'];
$price = $_POST['price'];

$sql = "INSERT INTO bookings 
(pickup_location, drop_location, pickup_date, drop_date, pickup_time, drop_time, car_type, distance, price)
VALUES ('$pickup','$drop','$pdate','$ddate','$ptime','$dtime','$car','$distance','$price')";

if ($conn->query($sql) === TRUE) {
    echo "Booking Successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Summary</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #333;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 400px;
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .title {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .highlight {
            font-weight: bold;
            color: #2a5298;
        }

        .total {
            font-size: 20px;
            text-align: center;
            margin-top: 15px;
            color: green;
        }

        .btn {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            background: #2a5298;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn:hover {
            background: #1e3c72;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="card">

        <div class="title">🚗 Booking Summary</div>

        <div class="row">
            <span>Pickup</span>
            <span class="highlight"><?php echo $pickup; ?></span>
        </div>

        <div class="row">
            <span>Drop</span>
            <span class="highlight"><?php echo $drop; ?></span>
        </div>

        <div class="row">
            <span>Distance</span>
            <span><?php echo $distance; ?> KM</span>
        </div>

        <div class="row">
            <span>Car Type</span>
            <span><?php echo $car; ?></span>
        </div>

        <div class="row">
            <span>Pickup Time</span>
            <span><?php echo $pdate . " " . $ptime; ?></span>
        </div>

        <div class="row">
            <span>Drop Time</span>
            <span><?php echo $ddate . " " . $dtime; ?></span>
        </div>

        <div class="total">
            💰 Total Fare: ₹<?php echo $price; ?>
        </div>

        <button class="btn" onclick="window.print()">🧾 Download / Print</button>
        <button class="btn" onclick="window.location.href='index.html'">🏠 Back to Home</button>

    </div>
</div>

</body>
</html>
