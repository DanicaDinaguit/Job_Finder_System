<?php
include("inc/header.php");
session_start();
if(isset($_POST['btnsubmit'])){
    $userid = $_SESSION['id'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $query1 = "INSERT INTO tbl_feedback (user_id, feedback_review, feedback_rating)
            VALUES ('$userid', '$review', '$rating')";

    if (mysqli_query($conn, $query1)) {
        echo "Feedback Sent! Thank you!";       
    } else {
        // Error executing query1
        echo "Error: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder System</title>
    <link rel="stylesheet" href="help.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color:rgb(133, 163, 158);">
    <nav class="navbar navbar-expand-lg" id="nav_color">
        <div class="container-fluid">
          <a class="navbar-brand" href="loggedIn.html">
                <img src="images/logo.PNG" style=" width: 200px; margin-right: 0px;" alt="Logo">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a id="nav_item" class="nav-link active" href="loggedIn.html">Home</a>
              </li>
              <li class="nav-item">
                <a id="nav_item" class="nav-link" href="jobhire.html">Job Hiring</a>
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

            <!-- Profile with dropdown 48-61 -->
            <button class="nav-item dropdown" id="pro">
       
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>PROFILE</b>
                    <img class="profile" src="images/pro_img.png" alt="Profile">
                </a>
                
                
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                  <li><a class="dropdown-item" aria-current="page" href="help.html">Help</a></li>
                  <li><a class="dropdown-item" aria-current="page" href="#">Feedback</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </button>
              
          </div>
        </div>
    </nav>
  
    

    <!-- <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="" alt="" srcset="">
    </a> -->

<!-- <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><a class="dropdown-item" href="#">Help</a></li>
        <li><a class="dropdown-item" href="#">Log out</a></li>
    </ul> -->
    </div>
    </nav>

    <br>
    <br>
    <div class="help-container">
        <h1>Feedback</h1>
        <p>We would be happy to know of your experience in our platform. Please give your review, Thank you.</p>
    
        <form class="ticket-form"  method="post">
            <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <textarea name="review" id="review" placeholder="Enter your review" class="form-control"></textarea>
            </div>
          <div class="mb-3">
            <select name="rating" id="rating" class="form-select" style="width: auto;">
                <option disabled selected hidden>Rating</option>
                <option value="1 star">&#9734;</option>
                <option value="2 star">&#9734;&#9734;</option>
                <option value="3 star">&#9734;&#9734;&#9734;</option>
                <option value="4 star">&#9734;&#9734;&#9734;&#9734;</option>
                <option value="5 star">&#9734;&#9734;&#9734;&#9734;&#9734;</option>
            </select>
        </div>
          <br>
          <button style="background-color: rgb(20, 143, 250);" name="btnsubmit" type="submit">Submit Ticket</button>
        </form>
      </div>
      <br>
      <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
    
</html>