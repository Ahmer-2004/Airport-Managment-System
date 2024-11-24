<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Debugging: Print input data
    echo "Username: $username, Password: $password, Role: $role<br>";

    // Special condition for admin credentials
    if ($username === 'admin' && $password === 'admin' && $role === 'admin') {
        // Set session for admin user
        $_SESSION['user'] = [
            'username' => 'admin',
            'role' => 'admin'
        ];

        // Redirect directly to admin options page
        header("Location: dashboard_logic.php");
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE username = ? AND password = ? AND role = ?");
    $stmt->execute([$username, $password, $role]);
    $user = $stmt->fetch();

    if ($user) {
        // Debugging: Print user data
        echo "User found: ";
        print_r($user);

        $_SESSION['user'] = $user;

        // Redirect to dashboard
        header("Location: dashboard_logic.php");
        exit;
    } else {
        echo "Invalid login credentials.";
    }
}
?>
