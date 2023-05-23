<?php 
$servername = "localhost:3307";
$username = "root";
$password = "";  
$dbname = "group2-jobfindersystem-application";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['search'])) {
    $location = $_POST['search'];
    $sql = "SELECT * FROM JobPosting WHERE location LIKE '%$location%' LIMIT 5";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo '<li onclick="fill(\'' . $row['location'] . '\')"><a>' . $row['location'] . '</a></li>';
        }
    } else {
        echo "0 results";
    }
}
// if (isset($_POST['location'])) {
//     $location = $_POST['location'];
//     $sql = "SELECT * FROM jobs WHERE location = '%$location%' ";
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_array($result)) {
//             echo "<li>Location: " . $row['location'] . "</li>";
            
//         }
//     } else {
//         echo "0 results";
//     }
// }
mysqli_close($conn);
?>
