<?php

require_once "Mail.php";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// $my_file = '/tmp/contact_me.log';
// $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
// $log = "name: $name, email: $email, message: $message\n";
// fwrite($handle, $log);
// fclose($handle);

// Check for empty fields
if(empty($_POST['name'])                ||
   empty($_POST['email'])               ||
   empty($_POST['message']))
   {
        echo "No arguments Provided!";
        return false;
   }


$from = $email;
$to = '<info@tura.io>';
$subject = "tura.io website contact from: $name";
$body = "From: $name\nEmail: $email\nMessage:\n$message";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'info@tura.io',
        'password' => '1nf0teamtura'
    ));

$mail = $smtp->send($to, $headers, $body);

// old send mail
// Create the email and send the message
// $to = "info@tura.io";
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nContact: $email\n\nMessage:\n$message";
// $headers = "From: $email\n";
// $headers .= "Reply-To: $email";
// mail($to,$email_subject,$email_body,$headers);

echo "sent mail.";
return true;
?>