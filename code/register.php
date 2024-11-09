<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
<head>
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UTM Student Information Registration System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="view.php">Student List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Add Student</a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <img src="LOGO-UTM.png" alt="UTM Logo" width="300">
            <h1>UTM Student Information System</h1>
        </div>

        <div class="card text-bg-light mx-auto" style="max-width: 60rem;">
            <div class="card-header text-center">
                <h2>New Student Registration</h2>
            </div>

            <div class="card-body">
                <form action="register.php" method="POST">

                    <div class="mb-3">
                        <label for="name" class="form-label"><b>Name:</b></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label"><b>Gender:</b></label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><b>Email:</b></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label"><b>Phone:</b></label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="icnum" class="form-label"><b>IC Number (without '-'): </b></label>
                        <input type="text" class="form-control" id="icnum" name="icnum" required>
                    </div>


                    <div class="mb-3">
                        <label for="faculty" class="form-label"><b>Faculty:</b></label>
                        <select class="form-select" id="faculty" name="faculty" required>
                            <option value="n">None</option>
                            <option value="Engineering">Faculty of Engineering</option>
                            <option value="Built-Environment">Faculty of Built Environment & Surveying</option>
                            <option value="Computing">Faculty of Computing</option>
                            <option value="Science">Faculty of Science</option>
                            <option value="Social-Sciences">Faculty of Social Sciences & Humanities</option>
                            <option value="Management">Azman Hashim International Business School</option>
                            <option value="Education">Faculty of Education</option>
                            <option value="Islamic-Civilization">Faculty of Islamic Civilization</option>
                            <option value="Biosciences-Medical">Faculty of Biosciences & Medical Engineering</option>
                            <option value="Technology-Informatics">Razak Faculty of Technology and Informatics</option>
                            <option value="MJIIT">Malaysia-Japan International Institute of Technology (MJIIT)</option>
                            <option value="Advanced">UTM Advanced Informatics School</option>
                            <option value="Petroleum">UTM-MPRC Institute for Oil & Gas</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $icnum = $_POST['icnum'];
    $faculty = $_POST['faculty'];
    $gender = $_POST['gender'];


    $sql = "INSERT INTO students (name, gender, email, phone, icnum, faculty) 
            VALUES ('$name', '$gender', '$email', '$phone', '$icnum', '$faculty')";

    if (mysqli_query($conn, $sql)) {
        echo "<br><div class='alert alert-success text-center'>New student registered successfully!</div>";
    } else {
        echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
