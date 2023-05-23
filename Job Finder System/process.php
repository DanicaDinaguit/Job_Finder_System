<?php
require 'vendor/autoload.php'; // Make sure to install the Mailgun PHP library via Composer

use Mailgun\Mailgun;

// Replace with your Mailgun API credentials
$mg = Mailgun::create('07ec2ba2-6af0067b');
$domain = 'sandbox64dce964fcc04af68bf50c85e5177e1e.mailgun.org';

// Form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$complaint = $_POST['complaint'];

// Compose and send the email
$mg->messages()->send($domain, [
    'from' => $email,
    'to' => 'admin@example.com', // Replace with your admin's email address
    'subject' => $subject,
    'text' => "Name: $name\nEmail: $email\n\n$complaint"
]);

// Redirect the user to a confirmation page
header('Location: thank-you.html');
?>