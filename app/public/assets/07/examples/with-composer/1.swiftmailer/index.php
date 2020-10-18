<?php

// Require autoloader
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('relay.odisee.be', 25))
    ->setUsername('your username')
    ->setPassword('your password');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['john@doe.com' => 'John Doe'])
    ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
    ->setBody('Here is the message itself');

// Send the message
$result = $mailer->send($message);

// EOF