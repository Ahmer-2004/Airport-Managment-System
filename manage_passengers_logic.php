<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $flightNumber=$_POST['flightNumber'];
    $seatNumber=$_POST['seatNumber'];
    $stmt = $pdo->prepare("INSERT INTO passengers (name, email, phone,flightNumber,seatNumber) VALUES (?, ?, ?,?,?)");
    $stmt->execute([$name, $email, $phone,$flightNumber,$seatNumber]);
}

$passengers = $pdo->query("SELECT * FROM passengers")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Passengers</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header_footer.php' ?>
    <div class="container mt-5">
        <div id="passengers" class="content active">
            <h1>Manage Passengers</h1>
            <form id="passengerForm" method="POST">
                <div class="form-group">
                    <label for="passengerName">Name</label>
                    <input type="text" class="form-control" id="passengerName" name="name">
                </div>
                <div class="form-group">
                    <label for="passengerEmail">Email</label>
                    <input type="email" class="form-control" id="passengerEmail" name="email">
                </div>
                <div class="form-group">
                    <label for="passengerPhone">Phone</label>
                    <input type="text" class="form-control" id="passengerPhone" name="phone">
                </div>
                <div class="form-group">
                    <label for="passengerflightNumber">Flight Number</label>
                    <input type="text" class="form-control" id="passengerflightNumber" name="flightNumber">
                </div>
                <div class="form-group">
                    <label for="passengerseatNumber">Seat Number</label>
                    <input type="text" class="form-control" id="passengerseatNumber" name="seatNumber">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
            <button class="btn btn-secondary btn-block" onclick="showPage('dashboard_logic')">Back to Dashboard</button>
            <table class="table mt-3 admin-only">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($passengers as $passenger): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($passenger['name']); ?></td>
                            <td><?php echo htmlspecialchars($passenger['email']); ?></td>
                            <td><?php echo htmlspecialchars($passenger['phone']); ?></td>
                            
                            <td>
                                <!-- Add edit and delete functionality as needed -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function showPage(page) {
            window.location.href = page + '.php'; // Redirect to the corresponding page
        }
    </script>
</body>
</html>
