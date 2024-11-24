<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flightNumber = $_POST['flightNumber'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    $stmt = $pdo->prepare("INSERT INTO flights (flightnumber, origin, destination) VALUES (?, ?, ?)");
    $stmt->execute([$flightNumber, $origin, $destination]);
}

$flights = $pdo->query("SELECT * FROM flights")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Flights</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centered-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .centered-form {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body>
<?php include 'header_footer.php' ?>
<div class="centered-form-container">
    <div id="flights" class="content active centered-form">
        <h1 class="text-center">Manage Flights</h1>
        <form id="flightForm" method="POST">
            <div class="form-group">
                <label for="flightNumber">Flight Number</label>
                <input type="text" class="form-control" id="flightNumber" name="flightNumber">
            </div>
            <div class="form-group">
                <label for="origin">Origin</label>
                <input type="text" class="form-control" id="origin" name="origin">
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control" id="destination" name="destination">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
        <button class="btn btn-secondary btn-block mt-3" onclick="window.location.href = 'dashboard_logic.php';">Back to Dashboard</button>
        <table class="table mt-3 admin-only">
            <thead>
                <tr>
                    <th>Flight Number</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flights as $flight): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($flight['flightNumber']); ?></td>
                        <td><?php echo htmlspecialchars($flight['origin']); ?></td>
                        <td><?php echo htmlspecialchars($flight['destination']); ?></td>
                        <td>
                            <!-- Add edit and delete functionality as needed -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
