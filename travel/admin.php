<?php
session_start();

// 🔐 PROTECT PAGE
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "car_booking");

$result = $conn->query("SELECT * FROM bookings ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f6f9;
}

/* HEADER */
.header {
    background: linear-gradient(to right, #1e3c72, #2a5298);
    color: white;
    padding: 15px;
    text-align: center;
}

.btn {
    padding: 8px 15px;
    margin: 5px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    color: white;
}

.logout { background: red; }

/* TABLE */
.container {
    width: 95%;
    margin: 20px auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    table-layout: fixed;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

th {
    background: #2a3f54;
    color: white;
    padding: 10px;
    text-align: center;
    white-space: nowrap;
}

td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

tr:hover {
    background: #f5f7fa;
}

.price {
    color: green;
    font-weight: bold;
}
</style>
</head>

<body>

<div class="header">
    <h2>Admin Dashboard</h2>
    <button class="btn logout" onclick="window.location='logout.php'">Logout</button>
</div>

<div class="container">

<h3>Booking History</h3>

<table>
<tr>
<th>ID</th>
<th>Pickup</th>
<th>Drop</th>
<th>Date</th>
<th>Car</th>
<th>Distance</th>
<th>Price</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['pickup_location']; ?></td>
<td><?php echo $row['drop_location']; ?></td>
<td><?php echo $row['pickup_date']; ?></td>
<td><?php echo $row['car_type']; ?></td>
<td><?php echo $row['distance']; ?> KM</td>
<td><?php echo $row['price']; ?></td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>
