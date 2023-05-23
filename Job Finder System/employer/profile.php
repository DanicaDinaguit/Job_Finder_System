<?php
include("../inc/header.php");
session_start();

$sql = "SELECT * 
        FROM tbl_company   
        WHERE tcp.company_id = {$_SESSION['id']};";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      
          
    $company_id = $row["company_id"];  
    $fullname = $row["company_name"];
    $password = $row["company_password"];
    $address = $row["company_location"];
    $email = $row["company_email"];
    $website = $row["company_website"];
    $contact = $row["company_contactinfo"];
    
              
  }
  } else {
  echo "0 results";
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update'])) {
    // Retrieve form data
    $company_name = $_POST['name'];
    $location = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $website = $_POST['website'];
    $contact =  $_POST['contact'];

  
    // Perform update query
    $sql = "UPDATE tbl_companyprofile AS tcp
            SET tcp.company_name='$company_name', tcp.company_location='$location', tcp.company_email='$email', tcp.company_password='$password',  tcp.company_website='$website', tcp.company_contactinfo='$contact'
            WHERE tcp.company_id=$company_id;";
  
    if (mysqli_query($conn, $sql)) {
      // Update successful, redirect back to profile page
      header('Location: profile.php');
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder System</title>
    <link rel="stylesheet" href="../dashboardstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    
</head>
<body>
<script>
     $(document).ready(function() {
      $('#exampleModal').on('hidden.bs.modal', function() {
        $('#updateForm').submit();
      });
      $('#btn_logout').click(function(event) {
        event.preventDefault(); // Prevent the default behavior of the anchor tag

        // Perform the logout action here
        // For example, you can use an AJAX request to a logout.php script
        $.ajax({
          type: 'GET',
          url: 'logout.php',
          success: function(response) {
            // Handle the response if needed
            // For example, you can redirect to the login page
            window.location.href = 'logout.php';
          },
          error: function(xhr, status, error) {
            // Handle error if needed
          }
        });
      })
    });
    </script>
    <nav class="navbar navbar-expand-lg" id="nav_color">
        <div class="container-fluid">
          <a class="navbar-brand" href="dashboard.html">
                <img src="../images/logo.PNG" style=" width: 200px; margin-right: 0px;" alt="Logo">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a id="nav_item" class="nav-link active"  href="loggedIn.html">Home</a>
              </li>
              <li class="nav-item">
                <a id="nav_item" class="nav-link" aria-current="page" href="listjob.php">List Jobs</a>
              </li>
              <li class="nav-item dropdown">
                <a id="nav_item" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Developers</a></li>
                  <li><a class="dropdown-item" href="faqs.html">FAQs</a></li>
                  <li><a class="dropdown-item" href="#">Privacy Policy</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Licence Terms & Aggreements</a></li>
                </ul>
              </li>
              
            </ul>
            
            <button class="nav-item dropdown" id="pro">
       
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>PROFILE</b>
                    <img class="profile" src="../images/pro_img.png" alt="Profile">
                </a>
                
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" id="btn_logout" href="#">Log Out</a></li>
                </ul>
            </button>
              
          </div>
        </div>
    </nav>
   
      

    <main style="position: relative; top: 420px;">  
      <div><br>
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header" style="text-align: center;">
                Employer/Company Profile Information
              </div>
              <div class="card-body">
                <form method="POST" id="updateForm">
                  <div class="mb-3">
                    <label for="name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $fullname; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Company Location</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password" name="Password" value="<?php echo $password; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="website" class="form-label">Company Website</label>
                    <input type="text" class="form-control" id="website" name="website" value="<?php echo $website; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="contact" class="form-label">Company Contact Info</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>">
                  </div>                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="btn_update">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Edit Profile Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to save the changes?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Changes</button>
          </div>
        </div>
      </div>
    </div>

    
    <br>
    <br>
    <br>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ></script>
    
    <script src="JS.js" type="text/javascript"></script>
</body>
    
</html>