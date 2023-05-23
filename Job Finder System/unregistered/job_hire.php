<?php
include("../inc/header.php");
session_start();



if (isset($_POST['job_title'])){
  // Retrieve form values from the AJAX request
  $jobTitle = $_POST['job_title'];
  $location = $_POST['location'];
  $specialization = isset($_POST['job_specialization']) ? $_POST['job_specialization'] : '';
  $sort = $_POST['sort'];
  $salary = $_POST['salary'];

  // Build the SQL query based on the form values
  $sql = "SELECT * FROM tbl_jobposting WHERE 1 = 1"; // Start with a basic query

  if (!empty($jobTitle)) {
    $sql .= " AND job_title LIKE '%$jobTitle%'";
  }

  if (!empty($location)) {
    $sql .= " AND (job_location LIKE '%$location%' OR job_location IS NULL)";
  }

  if (!empty($salary)) {
    list($minSalary, $maxSalary) = explode('-', $salary);
    $minSalary = (float)str_replace('k', '000', $minSalary);
    $maxSalary = (float)str_replace('k', '000', $maxSalary);

    $sql .= " AND job_salarymin <= $maxSalary AND job_salarymax >= $minSalary";
  }
  
  if (!empty($specialization)) {
    $sql .= " AND job_industry LIKE '%$specialization%'";
  }

  // Execute the query
  $result = $conn->query($sql);

  // Process the query results
  if ($result->num_rows > 0) {
    // Iterate over the rows and do something with the data
    while ($row = $result->fetch_assoc()) {
      // Access the column values using $row['column_name']
      $job_id = $row['job_id'];
      $jobDescription = $row['job_description'];
      $job_title = $row['job_title'];
      $job_location = $row['job_location'];
      $job_specialization = $row['job_industry'];
      $salaryMin = $row['job_salarymin'];
      $salaryMax = $row['job_salarymax'];
      
      
      echo '<div style="border: 1px solid black; margin-left: 20px; margin-right: 20px;margin-top: 20px;margin-bottom: 20px; padding: 5px; display: flex; align-items: flex-start; justify-content: space-between;">';
        echo '<div>';
          echo '<h3>Job Title: ' . $job_title . '</h3>';
          echo '<p>Job Specialization: ' . $job_specialization . '</p>';
          echo '<p>Job Description: ' . $jobDescription . '</p>';
          echo '<p>Job Salary Range: Php ' . $salaryMin . ' - Php ' . $salaryMax . '</p>';
          echo '<p>Location: ' . $job_location . '</p>';
          
        echo '</div>';
        
      echo '</div>';
        
    }
  } else {
    echo "There are no results";
  }
}

//Close the connection
include("../inc/closeconnect.php")
?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>