<?php

// define variables and set to empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);
    
}
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    
// send email to myself to let me know the form has been completed
$emailFrom = "contact@marksmithweb.co.uk";
$emailSubject = "New Contact Form Submission";
$emailBody = "You have received a new message from $name.\n".
    "Here is the message: \n $message \n".

$to = "contact@marksmithweb.co.uk";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";

mail($to,$emailSubject,$emailBody,$headers);

echo 'Message sent successfully

    <a href="http://www.marksmithweb.co.uk/">Go back</a>';
    
?>