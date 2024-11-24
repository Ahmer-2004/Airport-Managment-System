<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airplane Management System - Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #000;
        }
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .container {
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        .content {
            display: none;
        }
        .content.active {
            display: block;
        }
    </style>
</head>
<body>
    <video autoplay muted loop class="video-background">
        <source src="3657467-hd_1920_1080_30fps.mp4" type="video/mp4">
    </video>
    <div class="container mt-5">
        <div id="dashboard" class="content active">
            <h1>Dashboard</h1>
            <p>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</p>
            <div id="adminOptions" style="display: <?php echo $user['role'] == 'admin' ? 'block' : 'none'; ?>;">
                <button class="btn btn-primary btn-block" onclick="window.location.href = 'manage_flights_logic.php';">Manage Flights</button>
                <button class="btn btn-primary btn-block" onclick="window.location.href = 'manage_passengers_logic.php';">Manage Passengers</button>
                <button class="btn btn-primary btn-block" onclick="window.location.href = 'manage_staff_logic.php';">Manage Staff</button>
            </div>
            <div id="passengerOptions" style="display: <?php echo $user['role'] == 'passenger' ? 'block' : 'none'; ?>;">
                <button class="btn btn-primary btn-block" onclick="window.location.href = 'manage_passengers_logic.php';">Add Passenger Details</button>
            </div>
            <div id="staffOptions" style="display: <?php echo $user['role'] == 'staff' ? 'block' : 'none'; ?>;">
                <button class="btn btn-primary btn-block" onclick="window.location.href = 'manage_staff_logic.php';">Add Staff Details</button>
            </div>
            <button class="btn btn-secondary btn-block" onclick="window.location.href = 'logout.php';">Logout</button>
        </div>
    </div>
</body>
</html>
