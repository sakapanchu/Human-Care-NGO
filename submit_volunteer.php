<?php

// Allow requests from any origin
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Disable displaying errors to the user
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// Start output buffering to capture any unintended output
ob_start();

require 'vendor/autoload.php'; // Include Composer's autoloader

use SendGrid\Mail\Mail;
use SendGrid\Mail\TypeException;

// Retrieve form data
$fullName = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'];
$interest = $_POST['interest'];
$message = $_POST['message'];

// Debugging: Log the form data
error_log(print_r($_POST, true));
error_log(print_r($_FILES, true));

// Validate required fields
if (empty($fullName) || empty($email) || empty($interest) || empty($phone) || empty($message)) { 
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

//SendGrid API Key
$sendgridApiKey = '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'; // Replace with your SendGrid API key

// Send email to the NGO
$emailNGO = new Mail();
$emailNGO->setFrom("sakaaniya2000@gmail.com", "Human Care"); // Replace with your company email //info@faiteplus.com
$emailNGO->setSubject("New Volunteer Application from: ". $name);
$emailNGO->addTo("sakaaniya2000@gmail.com", "Director"); // Replace with the HR email //Faiteplus1@gmail.com

// Construct the email body based on the job level
$emailBody = "
    <h2>New volunteer application Received</h2>
    <p><strong>Full Name:</strong> $fullName</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Interest Area:</strong> $interest</p>
    <p><strong>Message:</strong> $message</p>
";

$emailNGO->addContent("text/html", $emailBody);

$sendgrid = new \SendGrid($sendgridApiKey);


try {
    $response = $sendgrid->send($emailNGO);
    error_log('SendGrid Response: ' . print_r($response, true)); // Log the full response
    echo json_encode(['status' => 'success', 'message' => 'Email sent to company successfully!']);
} catch (Exception $e) {
    error_log('SendGrid Error: ' . $e->getMessage()); // Log the error
    echo json_encode(['status' => 'error', 'message' => 'Failed to send email to company. Error: ' . $e->getMessage()]);
    exit;
}


// Send email to the applicant
$emailApplicant = new Mail();
$emailApplicant->setFrom("sakaaniya2000@gmail.com", "Human Care"); // Replace with your company email //info@faiteplus.com
$emailApplicant->setSubject("Thank you for applying as volunteer for " . $interest );
$emailApplicant->addTo($email, $fullName); // Send to the applicant

// Construct the email body
$applicantEmailBody = "
    <h2>Dear $fullName,</h2>
    <p>Thank you for expressing your interest in volunteering with HUMAN CARE! We are thrilled to have you join our community of dedicated individuals who are committed to making a positive impact.</p>
    <p>Your application for the <strong>$interest</strong> program has been received, and we truly appreciate the time and effort you invested in submitting it. Your willingness to contribute to our cause means a lot to us.</p>
    <p>Our team will carefully review your application to ensure the best fit for both you and our programs. If you are shortlisted, a member of our team will reach out to you to discuss the next steps in the volunteer onboarding process.</p>
    <p>Once again, thank you for considering HUMAN CARE as a platform to share your time and skills. We look forward to the possibility of working together to create meaningful change.</p>
    <p>Best regards,<br>HUMAN CARE Team</p>
";


$emailApplicant->addContent("text/html", $applicantEmailBody);

try {
    $response = $sendgrid->send($emailApplicant);
    error_log('SendGrid Response: ' . print_r($response, true)); // Log the full response
    echo json_encode(['status' => 'success', 'message' => 'Confirmation email sent to applicant successfully!']);
} catch (Exception $e) {
    error_log('SendGrid Error: ' . $e->getMessage()); // Log the error
    echo json_encode(['status' => 'error', 'message' => 'Failed to send confirmation email to applicant. Error: ' . $e->getMessage()]);
    exit;
}

// Clear the output buffer and send the JSON response
ob_end_clean();
echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully!']);
exit;


?>


****************select language to sent email (en,ta,si)**************************


// // Allow requests from any origin
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Content-Type');

// // Disable displaying errors to the user
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// error_reporting(E_ALL);

// // Start output buffering to capture any unintended output
// ob_start();

// require 'vendor/autoload.php'; // Include Composer's autoloader

// use SendGrid\Mail\Mail;
// use SendGrid\Mail\TypeException;

// // Retrieve form data
// $fullName = $_POST['name'] ?? '';
// $email = $_POST['email'] ?? '';
// $phone = $_POST['phone'] ?? '';
// $interest = $_POST['interest'] ?? '';
// $message = $_POST['message'] ?? '';
// $language = $_POST['language'] ?? 'ta'; // Default to English if not provided

// // Debugging: Log the form data
// error_log(print_r($_POST, true));
// error_log(print_r($_FILES, true));

// // Validate required fields
// if (empty($fullName) || empty($email) || empty($interest) || empty($phone) || empty($message)) { 
//     echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
//     exit;
// }

// // Load language-specific email templates
// $emailTemplates = include("languages/email_templates_$language.php");

// // SendGrid API Key
// $sendgridApiKey = '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'; // Replace with your SendGrid API key

// // Send email to the NGO
// $emailNGO = new Mail();
// $emailNGO->setFrom("sakaaniya2000@gmail.com", "Human Care"); // Replace with your company email
// $emailNGO->setSubject($emailTemplates['ngo_subject'] . $fullName);
// $emailNGO->addTo("sakaaniya2000@gmail.com", "Director"); // Replace with the HR email

// // Construct the email body for the NGO
// $emailBody = "
<!-- //     <h2>{$emailTemplates['ngo_heading']}</h2>
//     <p><strong>{$emailTemplates['full_name']}:</strong> $fullName</p>
//     <p><strong>{$emailTemplates['email']}:</strong> $email</p>
//     <p><strong>{$emailTemplates['phone']}:</strong> $phone</p>
//     <p><strong>{$emailTemplates['interest_area']}:</strong> $interest</p>
//     <p><strong>{$emailTemplates['message']}:</strong> $message</p>
// "; -->

// $emailNGO->addContent("text/html", $emailBody);

// $sendgrid = new \SendGrid($sendgridApiKey);

// try {
//     $response = $sendgrid->send($emailNGO);
//     error_log('SendGrid Response: ' . print_r($response, true)); // Log the full response
//     echo json_encode(['status' => 'success', 'message' => 'Email sent to company successfully!']);
// } catch (Exception $e) {
//     error_log('SendGrid Error: ' . $e->getMessage()); // Log the error
//     echo json_encode(['status' => 'error', 'message' => 'Failed to send email to company. Error: ' . $e->getMessage()]);
//     exit;
// }

// // Send email to the applicant
// $emailApplicant = new Mail();
// $emailApplicant->setFrom("sakaaniya2000@gmail.com", "Human Care"); // Replace with your company email
// $emailApplicant->setSubject($emailTemplates['applicant_subject'] . $interest);
// $emailApplicant->addTo($email, $fullName); // Send to the applicant

// // Construct the email body for the applicant
// $applicantEmailBody = "
<!-- //     <h2>{$emailTemplates['applicant_heading']} $fullName,</h2>
//     <p>{$emailTemplates['applicant_body1']}</p>
//     <p>{$emailTemplates['applicant_body2']} <strong>$interest</strong> {$emailTemplates['applicant_body3']}</p>
//     <p>{$emailTemplates['applicant_body4']}</p>
//     <p>{$emailTemplates['applicant_body5']}</p>
//     <p>{$emailTemplates['applicant_body6']}</p>
//     <p>{$emailTemplates['applicant_signoff']}<br>{$emailTemplates['applicant_team']}</p> -->
// ";

// $emailApplicant->addContent("text/html", $applicantEmailBody);

// try {
//     $response = $sendgrid->send($emailApplicant);
//     error_log('SendGrid Response: ' . print_r($response, true)); // Log the full response
//     echo json_encode(['status' => 'success', 'message' => 'Confirmation email sent to applicant successfully!']);
// } catch (Exception $e) {
//     error_log('SendGrid Error: ' . $e->getMessage()); // Log the error
//     echo json_encode(['status' => 'error', 'message' => 'Failed to send confirmation email to applicant. Error: ' . $e->getMessage()]);
//     exit;
// }

// // Clear the output buffer and send the JSON response
// ob_end_clean();
// echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully!']);
// exit;


?>*/


