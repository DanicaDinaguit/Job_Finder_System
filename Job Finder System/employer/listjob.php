<?php 
include("../inc/header.php");
session_start();?>

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
    <script>
      $(document).ready(function() {
        $('form').submit(function(event) {
          event.preventDefault(); // Prevent the form from submitting normally
          
          // Get form values
          var jobTitle = $('#job_title').val();
          var location = $('#location').val();
          var specialization = $('#job_specialization').val();
          var description = $('#job_description').val();
          var requirement = $('#job_requirement').val();
          var salaryRange = $('#salary').val();
          var process = $('#application_process').val();
          
          var salaryRangeValues = salaryRange.split('-');
          var salaryMin = parseFloat(salaryRangeValues[0].trim()).toFixed(2);
          var salaryMax = parseFloat(salaryRangeValues[1].trim()).toFixed(2);
          // Send an AJAX request to the PHP script
          $.ajax({
            type: 'POST',
            url: 'list_job.php',
            data: {
              job_title: jobTitle,
              location: location,
              job_specialization: specialization,
              job_description: description,
              job_requirement: requirement,
              job_salarymin: salaryMin,
              job_salarymax: salaryMax,
              application_process: process
            },
            success: function(response) {
              // Handle the response from the PHP script
              // You can update the UI or perform any other actions here
              console.log('AJAX request succeeded!');
              console.log('Response:', response);

              // Example: Update a div with the response content
              $('#result').html(response);
            },
            error: function(xhr, status, error) {
              // Handle error
              console.error('AJAX request failed!');
              console.error('Error:', error);
            }
          });
        });
        // function showJobDetails(description) {
        //   // Update the "result" div with the job description
        //   $('#results').html(description);
        // }
      });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg" id="nav_color">
        <div class="container-fluid">
          <a class="navbar-brand" href="loggedemployer.html">
                <img src="../images/logo.PNG" style=" width: 200px; margin-right: 0px;" alt="Logo">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a id="nav_item" class="nav-link active"  href="loggedemployer.html">Home</a>
              </li>
              <li class="nav-item">
                <a id="nav_item" class="nav-link" aria-current="page" href="#">List Jobs</a>
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
                  <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                  
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </button>
              
          </div>
        </div>
    </nav>
  
   
    </nav>
<br>
<br>
<div class="container" style="position: relative; top: 400px;">
    <div id="job">
        <form style="object-fit: cover;" action="listjob.php" method="POST">
            <h2 style="text-align: center;">Job Posting</h2>
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" name="job_title" id="job_title" placeholder="Job Title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Job Location</label>
                <input type="text" name="location" id="location" placeholder="Area, city or town" class="form-control">
            </div>
            <div class="mb-3">
                <label for="job_specialization" class="form-label">Job Specialization</label>
                <select name="job_specialization" id="job_specialization" class="form-select">
                  <option disabled selected hidden>Job Specialization</option>
                  <option value="accounting/finance">Accounting/Finance</option>
                  <option value="admin/human resources">Admin/Human resources</option>
                  <option value="sales/marketing">Sales/Marketing</option>
                  <option value="arts/media/communication">Arts/Media/Communication</option>
                  <option value="services">Services</option>
                  <option value="manager">Manager</option>
                  <option value="education/training">Education/Training</option>
                  <option value="computer/it">Computer/Information Technology</option>
                  <option value="customer service">Customer Service</option>
                  <option value="engineering">Engineering</option>
                  <option value="manufacturing">Manufacturing</option>
                  <option value="building/construction">Building/Construction</option>
                  <option value="sciences">Sciences</option>
                  <option value="healthcare">Healthcare</option>
                  <option value="">Others</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="job_description" class="form-label">Job Description</label>
                <textarea name="job_description" id="job_description" placeholder="Enter job description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="job_requirement" class="form-label">Job Requirement</label>
                <textarea name="job_requirement" id="job_requirement" placeholder="Enter job requirement" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary Range</label>
                <select name="salary_range" id="salary" class="form-select">
                    <option disabled selected hidden>Salary Range</option>
                    <option value="1k-5k">1k-5k</option>
                    <option value="5k-10k">5k-10k</option>
                    <option value="10k-15k">10k-15k</option>
                    <option value="10k-20k">10k-20k</option>
                    <option value="20k-50k">20k-50k</option>
                    <option value="50k-100k">50k-100k</option>
                </select>
            </div>
            <div class="mb-3">
                <textarea name="application_process" id="application_process" placeholder="Application Process" class="form-control"></textarea>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" style="object-fit: cover;" value="Post Jobs">
            </div>
        </form>
    </div>
</div>

<div id="result">
  <hr style="position: relative; top: 430px;border: 3px solid black;">
  <h2 style="position: relative; top: 430px;text-align: center;">Jobs Posted</h2>
  <?php
    $selectQuery = "SELECT * FROM tbl_jobposting WHERE company_id = {$_SESSION['id']}";
    $selectResult = $conn->query($selectQuery);
  
    if ($selectResult && $selectResult->num_rows > 0) {
      $job = $selectResult->fetch_assoc();
  
      // Display the inserted job posting
      echo '<div class="job-posting" style="position: relative; top: 430px; border: 1px solid black;margin-left: 20px; margin-right: 20px;margin-top: 20px;margin-bottom: 50px; padding: 15px;width:auto;">';
      echo '<h2>Job Title: ' . $job['job_title'] . '</h2>';
      echo '<p>Job Specialization: ' . $job['job_industry'] . '</p>';
      echo '<p>Job Description: ' . $job['job_description'] . '</p>';
      echo '<p>Job Requirement:' . $job['job_requirements'] . '</p>';
      echo '<p>Job Location:' . $job['job_location'] . '</p>';
      echo '<p>Job Salary:' . $job['job_salarymin'] . "-" .$job['job_salarymax'] . '</p>';
      echo '<p>Job Application Process:' . $job['job_applicationprocess'] . '</p>';

      // Add other job details here
      echo '</div><br><br>';
    } else {
      echo "Job posting not found";
    }
  ?>
</div>
<br><br><br>
    <div></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ></script>
    
    <!-- <script src="../JS.js" type="text/javascript"></script> -->
</body>
    
</html>