<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airplane Management System - Login</title>
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
        .admin-only {
            display: none;
        }
    </style>
</head>
<body>
    <video autoplay muted loop class="video-background">
        <source src="3657467-hd_1920_1080_30fps.mp4" type="video/mp4">
    </video>
    <div class="container mt-5">
        <div id="home" class="content active">
            <h1>Welcome to the Airplane Management System</h1>
            <p>Please log in to access the system.</p>
            <form id="loginForm" action="login_logic.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="admin">Admin</option>
                        <option value="passenger">Passenger</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <button type="button" class="btn btn-secondary btn-block" onclick="window.location.href = 'register.php';">Register</button>
            </form>
        </div>
    </div>
    <script>
        // function showPage(page) {
        //     var pages = document.querySelectorAll('.content');
        //     pages.forEach(function(p) {
        //         p.classList.remove('active');
        //     });
        //     document.getElementById(page).classList.add('active');
        // }

        // function logout() {
        //     showPage('home');
        // }

        // JavaScript code for handling the form submissions, editing, and deleting goes here

        // Display the appropriate options based on the role
        function showDashboard(role) {
            document.getElementById('currentRole').innerText = role;
            document.getElementById('adminOptions').style.display = (role === 'admin') ? 'block' : 'none';
            document.getElementById('passengerOptions').style.display = (role === 'passenger') ? 'block' : 'none';
            document.getElementById('staffOptions').style.display = (role === 'staff') ? 'block' : 'none';
        }
    </script>
</body>
</html>
