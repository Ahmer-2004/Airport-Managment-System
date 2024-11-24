<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != ('staff' || 'admin')) {
    // echo "Masla if mai hai boss";
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO staff (name, phone, role, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $phone, $role, $email]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header_footer.php' ?>
    <div class="container mt-5">
        <h1>Add Staff Details</h1>
        <form id="staffForm" method="POST">
            <div class="form-group">
                <label for="staffName">Name</label>
                <input type="text" class="form-control" id="staffName" name="name" required>
            </div>
            <div class="form-group">
                <label for="staffPhone">Phone</label>
                <input type="text" class="form-control" id="staffPhone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="staffRole">Role</label>
                <input type="text" class="form-control" id="staffRole" name="role" required>
            </div>
            <div class="form-group">
                <label for="staffEmail">Email</label>
                <input type="email" class="form-control" id="staffEmail" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
        <button class="btn btn-secondary btn-block" onclick="window.location.href = 'dashboard_logic.php';">Back to Dashboard</button>
    </div>
</body>
</html>
