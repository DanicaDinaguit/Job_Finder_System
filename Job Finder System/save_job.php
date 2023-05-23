<?php
include("inc/header.php");
session_start();

$user_id = $_POST['user_id'];
$job_id = $_POST['job_id'];
$query1 = "INSERT INTO tbl_savedjob (user_id, job_id)
            VALUES ('$user_id', '$job_id')";

if (mysqli_query($conn, $query1)) {
    alert("Job Saved");
} else {
    // Error executing query1
    echo "Error: " . mysqli_error($conn);
}
?>