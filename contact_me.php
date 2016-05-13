<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['emailphone']) 		||
   empty($_POST['message'])
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$emailphone = $_POST['emailphone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'parham@tura.io';
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\Contact: $emailphone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n";
// $headers .= "Reply-To: $emailphone";
mail($to,$email_subject,$email_body,$headers);
return true;			
?>