<?php
$conn = new mysqli("localhost", "booking_user", "password123", "car_booking");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=bookings.xls");

$result = $conn->query("SELECT * FROM bookings");

echo "ID\tPickup\tDrop\tPickup Date\tDrop Date\tCar\n";

while($row = $result->fetch_assoc()) {
    echo $row['id']."\t".
         $row['pickup_location']."\t".
         $row['drop_location']."\t".
         $row['pickup_date']."\t".
         $row['drop_date']."\t".
         $row['car_type']."\n";
}
?>
