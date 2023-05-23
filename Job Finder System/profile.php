<?php
include("inc/header.php");
session_start();

$sql = "SELECT tu.user_id, tu.user_name, tu.user_address, tu.user_email, tu.user_password, tu.user_contactnumber, tu.user_sex, tup.userprofile_bio  
        FROM tbl_user AS tu
        INNER JOIN tbl_userprofile AS tup
        ON tu.user_id =  tup.user_id
        WHERE tu.user_id = {$_SESSION['id']};";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      
          
    $userid = $row["user_id"];  
    $fullname = $row["user_name"];
    $password = $row["user_password"];
    $address = $row["user_address"];
    $email = $row["user_email"];
    $number = $row["user_contactnumber"];
    $sex = $row["user_sex"];
    $bio = $row["userprofile_bio"];
              
  }
  } else {
  echo "0 results";
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update'])) {
    // Retrieve form data
    $fullname = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $number = $_POST['number'];
    $sex = $_POST['sex'];
    $bio = $_POST['bio'];
  
    // Perform update query
    $sql = "UPDATE tbl_user AS tu
            INNER JOIN tbl_userprofile AS tup ON tu.user_id = tup.user_id
            SET tu.user_name='$fullname', tu.user_address='$address', tu.user_email='$email', tu.user_password='$password', tu.user_contactnumber='$number', tu.user_sex='$sex', tup.userprofile_bio='$bio'
            WHERE tu.user_id=$userid;";
  
    if (mysqli_query($conn, $sql)) {
      // Update successful, redirect back to profile page
      header('Location: profile.php');
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  // if (isset($_POST['btn_update'])) {
  //   $fullname = $_POST['name'];
  //   $address = $_POST['address'];
  //   $email = $_POST['email'];
  //   $password = $_POST['Password'];
  //   $number = $_POST['number'];
  //   $sex = $_POST['sex'];
  //   $bio = $_POST['bio'];
  
  //   $sql = "UPDATE tbl_user AS tu
  //           INNER JOIN tbl_userprofile AS tup ON tu.user_id = tup.user_id
  //           SET tu.user_name='$fullname', tu.user_address='$address', tu.user_email='$email', tu.user_password='$password', tu.user_contactnumber='$number', tu.user_sex='$sex', tup.userprofile_bio='$bio'
  //           WHERE tu.user_id=$userid;";
  
  //   if (mysqli_query($conn, $sql)) {
      
  //     alert("Update Successful");
  //   } else {
  //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  //   }
  // }

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder System</title>
    <link rel="stylesheet" href="dashboardstyle.css">
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
                <img src="images/logo.PNG" style=" width: 200px; margin-right: 0px;" alt="Logo">
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
                <a id="nav_item" class="nav-link" aria-current="page" href="jobhire.html">Job Hiring</a>
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
                    <img class="profile" src="images/pro_img.png" alt="Profile">
                </a>
                
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="help.html">Help</a></li>
                  <li><a class="dropdown-item" href="feedback.php">Feedback</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" id="btn_logout" href="logout.php">Log Out</a></li>
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
                Profile Information
              </div>
              <div class="card-body">
                <form method="POST" id="updateForm">
                  <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $fullname; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
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
                    <label for="number" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="number" name="number" value="<?php echo $number; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="sex" class="form-label">Sex</label>
                    <select class="form-select" id="sex" name="sex">
                      <option value="Male" <?php if($sex == 'Male') echo 'selected'; ?>>Male</option>
                      <option value="Female" <?php if($sex == 'Female') echo 'selected'; ?>>Female</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" name="bio"><?php echo $bio; ?></textarea>
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