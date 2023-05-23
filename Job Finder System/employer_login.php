<?php
include("inc/header.php");
session_start();

if (isset($_POST['btnlogin'])){
    if(isset($_POST["remember"])) {
        setcookie ("email",$_POST['email'],time()+ 3600);
        setcookie ("password",$_POST['password'],time()+ 3600);    
    }
    
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_company;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row["company_id"];
        $dbname = $row["company_name"];
        $dbemail = $row["company_email"];
        $dbpassword = $row["company_password"];

        if ($email === $dbemail &&  $password === $dbpassword){
            $_SESSION['id'] =  $id;
            $_SESSION['name'] =  $dbname;
           header("Location: employer/loggedemployer.html");
        }else{
            echo "Log In failed, please input the right credentials";
        }
    }
    } else {
    echo "0 results";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login Page</title>
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
              <a style="background-color: #0C545D; color: white; text-decoration: none;" id="register" role="button" data-bs-toggle="dropdown" aria-expanded="false">SIGN UP</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Jseeker_reg.php">Job Seeker</a></li>
                <li><a class="dropdown-item" href="employer_reg.php">Employer</a></li> 
              </ul>
            </button>
        </div>
    </nav>
    
    <section class="py-4 py-xl-5" style="position: relative; top: 400px;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-xl-4">
                    <div class="card mb-5">
                        
                        <div class="card-body d-flex flex-column align-items-center">
                            <h2 class="text-center mb-4">Employer Login</h2>
                            <form class="text-center" action="" method="post" style="width: 80%;">
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"];} ?>" required></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"];} ?>" required></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" name="btnlogin" type="submit">Login</button></div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check text-center"><input name="remember" id="formCheck-1" class="form-check-input" type="checkbox" /><label class="form-check-label" for="formCheck-1">Remember Me</label></div>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted"><a href="employer_reg.php">Create Account</a></p>
                                    </div>
                                </div>
                                
                                
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