<?php
   include 'lib/swift_required.php';

/*
   // Create the Transport
   $transport = Swift_SmtpTransport::newInstance('mail.wtj01.com', 25)
     ->setUsername('wtj01admin')
     ->setPassword('Kaasplankje09')
   ;
   // Create the Mailer using your created Transport
   $mailer = Swift_Mailer::newInstance($transport);

   // Create a message
   $message = Swift_Message::newInstance('Wonderful Subject')
     ->setFrom(array( 'wtj01admin@mail.wtj01.com' => 'admin'))
     ->setTo(array($email =>'name'))
     ->setBody("You've got mail!")
   ;

   // Send the message
   $result = $mailer->send($message);
   */
   $transport = Swift_MailTransport::newInstance();

   $message = Swift_Message::newInstance();
   $message->setTo(array(
      $email => $first_name
      ));
   $message->setSubject("Look! An email!");
   $message->setBody("IT WORKED. NOW CELEBRATE!");
   $message->setFrom("wtj01admin@mail.wtj01.com", "admin");

   $mailer = Swift_Mailer::newInstance($transport);
   $mailer->send($message);
?>

<html>
<head>
	<title>verzonden</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
</head>
<body>
<h1 class= "titel">Uw brochure is verstuurd!</h1>
<p class = "form">Wij hebben de brochure naar u verzonden. Mocht u niets ontvangen, bekijk dan uw spam-folder of probeer het nog een keer.</p>
</body>
</html>
