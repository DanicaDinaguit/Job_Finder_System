<?php
include("../inc/header.php");
session_start();
// if (isset($_POST['job_title'])){
  // Retrieve form values from the AJAX request in the listjob.php
  $com_id  = $_SESSION['id'];
  $jobTitle = $_POST['job_title'];
  $location = $_POST['location'];
  $specialization = $_POST['job_specialization'];
  $description = $_POST['job_description'];
  $requirement = $_POST['job_requirement'];
  $salaryMin = $_POST['job_salarymin'];
  $salaryMax = $_POST['job_salarymax'];
  $process = $_POST['application_process'];
  

  // Write the SQL query and insert the values into the tbl_jobposting table
  $sql = "INSERT INTO tbl_jobposting(company_id, job_title, job_industry, job_description, job_requirements, job_location, job_salarymin, job_salarymax, job_applicationprocess)
          VALUES ('$com_id', '$jobTitle', '$specialization', '$description', '$requirement','$location',  '$salaryMin', '$salaryMax', '$process' )"; 



  
  // Execute the query
  

  // Process the query results
  if (mysqli_query($conn, $sql)) {
    // Get the ID of the last inserted job posting
    $jobId = mysqli_insert_id($conn);
  
    // Retrieve the inserted job posting from the database
    $selectQuery = "SELECT * FROM tbl_jobposting WHERE job_id = $jobId || company_id = $com_id";
    $selectResult = $conn->query($selectQuery);
  
    if ($selectResult && $selectResult->num_rows > 0) {
      $job = $selectResult->fetch_assoc();
  
      // Display the inserted job posting
      echo '<div class="job-posting" style="position: relative; top: 300px; border: 1px solid black;">';
      echo '<h2>Job Title:' . $job['job_title'] . '</h2>';
      echo '<p>Job Specialization: ' . $job['job_industry'] . '</p>';
      echo '<p>Job Description: ' . $job['job_description'] . '</p>';
      echo '<p>Job Requirement:' . $job['job_requirements'] . '</p>';
      echo '<p>Job Location:' . $job['job_location'] . '</p>';
      echo '<p>Job Salary:' . $job['job_salarymin'] . "-" .$job['job_salarymax'] . '</p>';
      echo '<p>Job Application Process:' . $job['job_applicationprocess'] . '</p>';

      // Add other job details here
      echo '</div>';
    } else {
      echo "Job posting not found";
    }
  } else {
    echo "Error creating job posting: " . mysqli_error($conn);
  }
  


//Close the connection
include("../inc/closeconnect.php")
?>