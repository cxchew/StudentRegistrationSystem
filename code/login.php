<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>

        .login-card {
            max-width: 400px;
            margin: 50px auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }
        .login-btn {
            background-color: #343a40;
            color: #fff;
            border-radius: 25px;
        }
        .login-btn:hover {
            background-color: #495057;
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="text-center my-4">
            <img src="LOGO-UTM.png" alt="My Picture" width="300">
            <h1>UTM Student Information Registration System</h1>
        </div>
        <div class="card login-card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Login</h2>

                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn login-btn btn-lg">Login</button>
                    </div>
                </form>

                <div class="register-link">
                    <a href="registerlog.php">Don't have an account? Register here</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_start();
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM user_reg WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo '<div class="error-message">Invalid username or password!</div>';
        }
    } else {
        echo '<div class="error-message">No user found!</div>';
    }

    mysqli_close($conn);
}

?>