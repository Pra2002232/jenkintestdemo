<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost", "booking_user", "password123", "car_booking");
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
    background: linear-gradient(135deg, #eef2f7, #d9e4f5);
}

/* HEADER */
.header {
    background: linear-gradient(90deg, #1e293b, #334155);
    color: white;
    padding: 18px;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
}

.header h2 {
    margin: 0;
    letter-spacing: 1px;
}

/* BUTTONS */
.btn {
    padding: 8px 15px;
    margin: 5px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    color: white;
    font-weight: 500;
}

.logout {
    background: #ef4444;
}

.logout:hover {
    background: #dc2626;
}

/* CONTAINER */
.container {
    width: 95%;
    margin: 30px auto;
}

/* TITLE */
h3 {
    color: #1e293b;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    table-layout: fixed;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

/* HEADER */
th {
    background: #334155;
    color: #f1f5f9;
    padding: 12px;
    text-align: center;
    font-size: 14px;
    letter-spacing: 0.5px;
}

/* ROWS */
td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #e5e7eb;
    font-size: 14px;
}

/* ALTERNATE ROW COLOR */
tr:nth-child(even) {
    background: #f8fafc;
}

/* HOVER EFFECT */
tr:hover {
    background: #e0f2fe;
    transition: 0.2s;
}

/* PRICE STYLE */
.price {
    color: #16a34a;
    font-weight: bold;
}

/* DISTANCE STYLE */
td:nth-child(9) {
    color: #2563eb;
    font-weight: 500;
}
</style>

</head>
<body>

<div class="header">
    <h2>Admin Dashboard</h2>
    <a href="logout.php" class="btn">Logout</a>
    <a href="export.php" class="btn">Export Excel</a>
</div>

<div class="container">

<h3>Booking History</h3>

<table>
<tr>
<th>ID</th>
<th>Pickup</th>
<th>Drop</th>
<th>Pickup Date</th>
<th>Drop Date</th>
<th>Pickup Time</th>
<th>Drop Time</th>
<th>Car</th>
<th>Distance</th>
<th>Price</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['pickup_location']; ?></td>
<td><?= $row['drop_location']; ?></td>
<td><?= $row['pickup_date']; ?></td>
<td><?= $row['drop_date']; ?></td>
<td><?= $row['pickup_time']; ?></td>
<td><?= $row['drop_time']; ?></td>
<td><?= $row['car_type']; ?></td>
<td><?php echo $row['distance']; ?> KM</td>
<td class="price">₹<?php echo $row['price']; ?></td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>
