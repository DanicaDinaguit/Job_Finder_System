<?php
include("../inc/header.php");
session_start();
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
            window.location.href = 'admin_login.php';
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
        <a class="navbar-brand" href="loggedadmin.html">
                <img src="../images/logo.PNG" style=" width: 200px; margin-right: 0px;" alt="Logo">
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
                <a id="nav_item" class="nav-link active"  href="loggedadmin.html">Home</a>
            </li>
            <li class="nav-item">
                <a id="nav_item" class="nav-link" aria-current="page" href="#">Manage Profiles
                </a>
            </li>
            <li class="nav-item dropdown">
                <a id="nav_item" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="developer.html">Developers</a></li>
                <li><a class="dropdown-item" href="faqs.html">FAQs</a></li>
                <li><a class="dropdown-item" href="privacy.html">Privacy Policy</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="terms.html">Licence Terms & Aggreements</a></li>
                </ul>
            </li>
            
            </ul>
            
            <button class="nav-item dropdown" id="pro">
    
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>PROFILE</b>
                    <img class="profile" src="../images/pro_img.png" alt="Profile">
                </a>
                
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="admin_profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="help.html">Help</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" id="btn_logout" href="logout.php">Log Out</a></li>
                </ul>
            </button>
            
        </div>
        </div>
    </nav>
   
    <div class="container p-3" style="position: relative; top: 400px;">
    <h3>All Users</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
            $sql = "SELECT tu.user_id, tu.user_name, tu.user_email
                    FROM tbl_user AS tu";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $row["user_id"];?></th>
                    <td><?php echo $row["user_name"];?></td>
                    <td><?php echo $row["user_email"];?></td>
                    <td><a class="btn btn-danger" name="delete" href="profile.php?userid=<?php echo $row["user_id"];?>">Delete</a></td>
                </tr>
            <?php 
            }
            } else {
            echo "<h3>No records found!</h3>";
            }

            ?>
            
        
        </tbody>
    </table>
</div>
    
    <br>
    <br>
    <br>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ></script>
    
    <script src="../JS.js" type="text/javascript"></script>
</body>
    
</html>