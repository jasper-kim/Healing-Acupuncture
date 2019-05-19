<?php

$error = "";
$successMessage = "";

if ($_POST) {
    if (!$_POST["name"]) {
        $error .= "The name field is required.<br>";
    }

    if (!$_POST["subject"]) {
        $error .= "The subject field is required.<br>";
    }

    if (!$_POST["email"]) {
        $error .= "The email address field is required.<br>";
    }

    if (!$_POST["phone"]) {
        $error .="The phone field is required.<br>";
    }
    
    if (!$_POST["date"]) {
        $error .="The date field is required.<br>";
    }

    if (!$_POST["message"]) {
        $error .= "The message field is required.<br>";
    }
    
    if ($_POST["email"] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        
        $error .=  "Email address is not a valid<br>";
        
    }
    
    if ($error != "") {
        
        $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . ' </div>';
        
    } else {
        
        $emailTo = "me@myemail.com";
        
        $subject = $_POST["subject"];
        
        $content = $_POST["content"];
        
        $headers = "From: ".$_POST["email"];
        
        if (mail($emailTo, $subject, $content, $headers)) {
            
            $successMessage = '<div class="alert alert-success" role="alert"><strong>Your message was sent successfully, we\'ll get back to you ASAP!</strong></div>';
            
            } else {
            
            $error = '<div class="alert alert-danger" role="alert"><strong>Your message couldn\'t be sent, please try again!</strong></div>';
        
        }
        
    }
    
}

?>