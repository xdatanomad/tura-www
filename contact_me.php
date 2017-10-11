<?php
// Check for empty fields
if(empty($_POST['name'])                ||
   empty($_POST['email'])               ||
   empty($_POST['message']))
   {
        echo "No arguments Provided!";
        return false;
   }

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Create the email and send the message
$to = "info@tura.io";
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nContact: $email\n\nMessage:\n$message";
$headers = "From: $email\n";
$headers .= "Reply-To: $email";
mail($to,$email_subject,$email_body,$headers);
return true;
?>