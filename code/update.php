<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
<head>
    <title>Update Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        /* Custom styling for a modern card look */
        .card-custom {
            box-shadow: 0 4px 8px rgba(0.1, 0.1, 0.1, 0.1);
            border: 4px solid #f1f1f1;
            border-radius: 20px;
            background-color: #f9f9f9;
        }
        .form-title {
            font-weight: 700;
            color: #343a40;
        }
        .btn-custom {
            background-color: #343a40;
            color: #fff;
            border-radius: 50px;
        }
        .btn-custom:hover {
            background-color: #495057;
        }
    </style>
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
    <div class="text-center mt-4">
        <img src="LOGO-UTM.png" alt="UTM Logo" width="300">
        <h1>UTM Student Information System</h1>
    </div>

    <div class="container mt-5">
        <div class="card card-custom mx-auto p-4" style="max-width: 50rem;">
            <div class="card-header text-center bg-transparent border-bottom-0">
                <h2 class="form-title">Update Registration</h2>
            </div>

            <div class="card-body p-5">
                <?php
                include "db.php";

                if (isset($_GET['id'])) { 
                    $id = $_GET['id']; 
                    $sql = "SELECT * FROM students WHERE id = $id"; 
                    $result = mysqli_query($conn, $sql); 
                    $row = mysqli_fetch_assoc($result); 
                }
                ?>

                <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">

                    <div class="mb-4">
                        <label for="name" class="form-label"><b>Name:</b></label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="gender" class="form-label"><b>Gender:</b></label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label"><b>Email:</b></label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label"><b>Phone:</b></label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="icnum" class="form-label"><b>IC Number (without '-')</b></label>
                        <input type="text" class="form-control" id="icnum" name="icnum" value="<?php echo $row['icnum']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="faculty" class="form-label"><b>Faculty:</b></label>
                        <select class="form-select" id="faculty" name="faculty" required>
                            <option value="Engineering" <?php if ($row['faculty'] == 'Engineering') echo 'selected'; ?>>Faculty of Engineering</option>
                            <option value="Built-Environment" <?php if ($row['faculty'] == 'Built-Environment') echo 'selected'; ?>>Faculty of Built Environment & Surveying</option>
                            <option value="Computing" <?php if ($row['faculty'] == 'Computing') echo 'selected'; ?>>Faculty of Computing</option>
                            <option value="Science" <?php if ($row['faculty'] == 'Science') echo 'selected'; ?>>Faculty of Science</option>
                            <option value="Social-Sciences" <?php if ($row['faculty'] == 'Social-Sciences') echo 'selected'; ?>>Faculty of Social Sciences & Humanities</option>
                            <option value="Management" <?php if ($row['faculty'] == 'Management') echo 'selected'; ?>>Azman Hashim International Business School</option>
                            <option value="Education" <?php if ($row['faculty'] == 'Education') echo 'selected'; ?>>Faculty of Education</option>
                            <option value="Islamic-Civilization" <?php if ($row['faculty'] == 'Islamic-Civilization') echo 'selected'; ?>>Faculty of Islamic Civilization</option>
                            <option value="Biosciences-Medical" <?php if ($row['faculty'] == 'Biosciences-Medical') echo 'selected'; ?>>Faculty of Biosciences & Medical Engineering</option>
                            <option value="Technology-Informatics" <?php if ($row['faculty'] == 'Technology-Informatics') echo 'selected'; ?>>Razak Faculty of Technology and Informatics</option>
                            <option value="MJIIT" <?php if ($row['faculty'] == 'MJIIT') echo 'selected'; ?>>Malaysia-Japan International Institute of Technology (MJIIT)</option>
                            <option value="Advanced" <?php if ($row['faculty'] == 'Advanced') echo 'selected'; ?>>UTM Advanced Informatics School</option>
                            <option value="Petroleum" <?php if ($row['faculty'] == 'Petroleum') echo 'selected'; ?>>UTM-MPRC Institute for Oil & Gas</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-custom btn-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $icnum = $_POST['icnum'];
        $faculty = $_POST['faculty'];

        $sql = "UPDATE students SET name = '$name', gender = '$gender', email = '$email', phone='$phone', icnum='$icnum', faculty='$faculty' WHERE id = $id"; //SQL query to update user data based on id

        if (mysqli_query($conn, $sql)) {
            echo "<br><div class='alert alert-success text-center'>Record updated successfully!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
