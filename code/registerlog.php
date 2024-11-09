<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="text-center my-4">
            <img src="LOGO-UTM.png" alt="My Picture" width="300">
            <h1>UTM Student Information System</h1>
        </div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header text-center">
                        <h2>Register</h2>
                    </div>
                    <div class="card-body">

                        <form action="registerlog.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="Register" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="login.php">Already have an account? Login here</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $sql = "INSERT INTO user_reg (username, password) VALUES ('$username', '$password')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('New user registered successfully!'); window.location='login.php'</script>";
    } else {
        echo "<script>alert('Record Not Deleted!'); window.location='view.php'</script>" . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>