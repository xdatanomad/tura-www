<?php

$my_file = '/tmp/contact_me.log';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$log = "name: $name, email: $email, message: $message";
fwrite($handle, $data);
fclose($handle);

// Check for empty fields
if(empty($_POST['name'])                ||
   empty($_POST['email'])               ||
   empty($_POST['message']))
   {
        echo "No arguments Provided!";
        return false;
   }



// Create the email and send the message
$to = "info@tura.io";
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nContact: $email\n\nMessage:\n$message";
$headers = "From: $email\n";
$headers .= "Reply-To: $email";
mail($to,$email_subject,$email_body,$headers);
return true;
?>