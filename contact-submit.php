<?php


error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);

require 'vendor/autoload.php';

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    //email = 'admin@nyunai.com';
    $interested = $_POST["interested"];
    $budget = $_POST["budget"];
    $message = $_POST["message1"];

    // You can addsdfsdf additional validation here if needed

    // Send email (example)
    $to = "rahuljainscool@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    // You can customize the email body as per your requirements
    $email_body = "Name: $name\nEmail: $email\nInterested In: $interested\nBudget: $budget\nMessage: $message";
    // Use mail() function to send the email
    
    $transport = Transport::fromDsn('native://default');
    $mailer = new Mailer($transport);
    
    $email = (new Email())
        ->from('admin@nyunai.com')
        ->to('contact@nyunai.com')
        ->subject('Contact Request')
        ->text($email_body)
        ->html($email_body);
    ;


    if ($mailer->send($email) == false) {
        echo "success";
    } else {
        echo 'Unable to send mail.';
    }
}