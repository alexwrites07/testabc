<?php
phpinfo();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);

require 'vendor/autoload.php';

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

$transport = Transport::fromDsn('native://default');
$mailer = new Mailer($transport);

$email = (new Email())
    ->from('admin@nyunai.com')
    ->to('rahuljainscool@gmail.com')
    //->cc('cc@example.com')
    //->bcc('bcc@example.com')
    //->replyTo('fabien@example.com')
    //->priority(Email::PRIORITY_HIGH)
    ->subject('Time for Symfony Mailer!')
    ->text('Sending emails is fun again!')
    ->html('<p>See Twig integration for better HTML integration!</p>');

$mailer->send($email);

var_dump($mailer->getDebug());
