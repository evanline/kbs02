<?php
/*	*****************************************************************************************
	********** NOTE: dit kan pas ingesteld worden wanneer de mail-server gereed is.**********
	***************************************************************************************** */
            include 'lib/swift_required.php';

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('mail.wtj01.com', 25)
  ->setUsername('wtj01admin')
  ->setPassword('Kaasplankje09')
  ;

/*
You could alternatively use a different transport such as Sendmail or Mail:

// Sendmail
$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

// Mail
$transport = Swift_MailTransport::newInstance();
*/

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array( 'wtj01admin@mail.wtj01.com' => 'admin'))
  ->setTo(array($email =>'name'))
  ->setBody('look! a message')
  ;

// Send the message
$result = $mailer->send($message);
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
