<?php
include("inc/header.php");


if (isset($_POST['btnsub'])){
    $fullname = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $number = $_POST['number'];
    $sex = $_POST['sex'];
    
    
    
    $query1 = "INSERT INTO tbl_user (user_name, user_address, user_email, user_password, user_contactnumber, user_sex)
            VALUES ('$fullname', '$address', '$email', '$password', '$number', '$sex')";

    if (mysqli_query($conn, $query1)) {
        // Retrieve the last inserted user_id
        $user_id = mysqli_insert_id($conn);

        // Insert into tbl_userprofile
        $query2 = "INSERT INTO tbl_userprofile (user_id) VALUES ('$user_id')";

        if (mysqli_query($conn, $query2)) {
            // Both queries executed successfully
            echo "Registration successful!";
        } else {
            // Error executing query2
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Error executing query1
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Job Seeker Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboardstyle.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="nav_color">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.html">
                <img src="images/logo.PNG" style=" width: 200px; margin-right: 0px;" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            
            <button class="nav-item dropdown" style="background-color: #0C545D; margin-right: 100px;" id="reg" >
              <a style="background-color: #0C545D; color: white; text-decoration: none;" id="register" role="button" data-bs-toggle="dropdown" aria-expanded="false">LOG IN</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="login.php">Job Seeker</a></li>
                <li><a class="dropdown-item" href="employer_login.php">Employer</a></li> 
              </ul>
            </button>
        </div>
    </nav>
    
    <section class="py-4 py-xl-5" style="position: relative; top: 400px;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">Job Seeker Registration</h2>
                            <form method="post">
                                <div class="mb-3"><input class="form-control form-control-lg" type="text" id="name-2" name="name" placeholder="Fullname"></div>
                                <div class="mb-3"><input class="form-control form-control-lg" type="text" id="address" name="address" placeholder="Address"></div>
                                <div class="mb-3"><select name="sex" id="sex" class="form-select">
                                    <option disabled selected hidden>Sex</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select></div>
                                <div class="mb-3"><input class="form-control form-control-lg" type="tel" id="number" name="number" placeholder="Contact Number"></div>
                                <div class="mb-3"><input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Email"></div> 
                                <div class="mb-3"><input class="form-control form-control-lg" type="password" name="Password" placeholder="Password"></div>
                                <div class="mb-3"></div>
                                <div><button class="btn btn-success d-block w-100" name="btnsub" type="submit">Register Account</button></div>
                                <p class="text-muted text-center mt-2">Already have an account? <a href="login.php">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ></script>
</body>

</html>