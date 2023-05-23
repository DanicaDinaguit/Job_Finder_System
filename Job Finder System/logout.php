<?php
include("inc/header.php");

session_start();
session_destroy();
header("Location: dashboard.html");
exit();
mysqli_close($conn);
?>
