<?php
include("inc/header.php");
session_start();
$user_id = $_SESSION['id'];
// if (isset($_POST['search'])) {
//     $location = $_POST['search'];
//     $sql = "SELECT * FROM tbl_jobposting WHERE location LIKE '%$location%' LIMIT 5";
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_array($result)) {
//             echo '<li onclick="fill(\'' . $row['location'] . '\')"><a>' . $row['location'] . '</a></li>';
//         }
//     } else {
//         echo "0 results";
//     }
// }

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
      echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyModal">Apply Now</button>';
      echo '</div>';
      echo '<button type="button" class="btn btn-success" style="align-self: flex-start;" onclick="bookmarkJob(' . $job_id . ')">&#9734;</button>';
      echo '</div>';
        
    }
  } else {
    echo "There are no results";
  }
}

//Close the connection
include("inc/closeconnect.php")
?>
<!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- jquery -->
<script>
  function bookmarkJob(jobId) {
      // Make an AJAX request to the PHP script to save the job
      $.ajax({
        type: "POST",
        url: "save_job.php",
        data: { 
          user_id: $user_id,
          job_id: jobId
        },
        success: function(response) {
          // Handle the response from the PHP script
          alert("Job bookmarked successfully!");
        },
        error: function() {
          alert("Error occurred while bookmarking the job.");
        }
      });
    }
    $(document).ready(function() {
  
    $('#applyModal').find('form').submit(function(event) {
      event.preventDefault(); // Prevent the form from submitting normally

      // Get the form data
      var formData = new FormData(this);

      formData.append('job_id', <?php echo $job_id; ?>); // Append the job_id to the form data

      // Make an AJAX request to submit the form data
      $.ajax({
        type: 'POST',
        url: 'submit_application.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          // Handle the response from the PHP script
          alert('Application in process!' . response);
          console.log(response);
        },
        error: function() {
          alert('Error occurred while process the application.');
        }
      });
    });
  });

</script>
<!-- Apply Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyModalLabel">Apply for the Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="applicationLetter">Application Letter</label>
            <input type="file" class="form-control" id="applicationLetter" name="applicationLetter" required>
          </div>
          <div class="form-group">
            <label for="resume">Resume</label>
            <input type="file" class="form-control" id="resume" name="resume" required>
          </div>
          <button type="submit" name="btnsub" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div> 

