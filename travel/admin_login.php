<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body {
margin: 0;
    font-family: 'Segoe UI', sans-serif;

    /* 🔥 BACKGROUND IMAGE */
    background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470') no-repeat center center/cover;

    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* 🔥 DARK OVERLAY (VERY IMPORTANT) */
body::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(15, 23, 42, 0.75); /* dark overlay */
    top: 0;
    left: 0;
}

* {
    box-sizing: border-box;
}
/* LOGIN CARD */
.login-box {
    position: relative;
    z-index: 1;

    width: 340px;
    padding: 30px 25px;
    border-radius: 15px;

    /* 🔥 GLASS EFFECT */
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(12px);

    box-shadow: 0 20px 50px rgba(0,0,0,0.4);
    text-align: center;
}

/* TITLE */
.login-box h2 {
    color: #f1f5f9;
    margin-bottom: 25px;
    font-weight: 600;
}

/* INPUT */
input {
    width: 100%;
    padding: 14px;
    margin: 10px 0;

    border: none;
    border-radius: 4px;

    background: rgba(255,255,255,0.1);
    color: white;

    outline: none;
}

/* PLACEHOLDER */
input::placeholder {
    color: #cbd5f5;
}

/* INPUT FOCUS */
input:focus {
    background: rgba(255,255,255,0.2);
}

/* BUTTON */
button {
    width: 100%;
    padding: 14px;
    margin-top: 10px;

    border: none;
    border-radius: 9px;

    background: linear-gradient(90deg, #3b82f6, #2563eb);
    color: white;

    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

/* HOVER */
button:hover {
    background: linear-gradient(90deg, #2563eb, #1e40af);
}
</style>
</head>

<body>

<div class="login-box">
<h2>Admin Login</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button type="submit">Login</button>
</form>

<?php
$conn = new mysqli("localhost", "booking_user", "password123", "car_booking");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $res = $conn->query("SELECT * FROM admin WHERE username='$u' AND password='$p'");

    if ($res->num_rows > 0) {
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
    } else {
        echo "<p style='color:red;'>Invalid Login</p>";
    }
}
?>

</div>
</body>
</html>
