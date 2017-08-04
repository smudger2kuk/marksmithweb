<?php
// define variables and set to empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
        
        $nameErr = "Name is required";
        
    } else {
        
        $name = test_input($_POST["name"]);
        
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            
            $nameErr = "Only letters and white space allowed";
            
        }
    }

    if (empty($_POST["email"])) {
        
        $emailErr = "Email is required";
        
    } else {
        
        $email = test_input($_POST["email"]);
        
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
      $emailErr = "Invalid email format";
        
        }
    }

    if (empty($_POST["message"])) {
        
        $message = "";
        
    } else {
        
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
        "Here is the message: \n $message".;
    
    $to = "contact@marksmithweb.co.uk";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $email \r\n";
    
    mail($to,$email_subject,$email_body,$headers);
    
}
?>