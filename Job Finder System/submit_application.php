<?php
include("inc/header.php");
session_start();

if (isset($_POST['btnsub'])) {
  // Get form data
  $job_id = $_POST['job_id'];
  $user_id = $_SESSION['id'];
  $resumeFile = $_FILES['resume'];
  $letterFile = $_FILES['applicationLetter'];

  // Check if files were uploaded successfully
  if ($resumeFile['error'] === 0 && $letterFile['error'] === 0) {
    // Move uploaded files to a desired location
    $resumePath = 'uploads/' . $resumeFile['name'];
    $letterPath = 'uploads/' . $letterFile['name'];

    if (move_uploaded_file($resumeFile['tmp_name'], $resumePath) && move_uploaded_file($letterFile['tmp_name'], $letterPath)) {
      // Insert application data into the database
      $sql = "INSERT INTO tbl_application (job_id, user_id, application_resume, application_letter)
              VALUES ('$job_id', '$user_id', '$resumePath', '$letterPath')";

      if ($conn->query($sql) === TRUE) {
        // Application submitted successfully
        alert("Application submitted successfully!") ;
      } else {
        // Error occurred while inserting the application data
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      // Error occurred while moving uploaded files
      echo "Error occurred while uploading files.";
    }
  } else {
    // Error occurred while uploading files
    echo "Error occurred while uploading files.";
  }
}

// Close the connection
include("inc/closeconnect.php");
?>