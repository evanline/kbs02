<?php
/* 	
	*****************************************************************************************
	********** NOTE: dit kan pas ingesteld worden wanneer de mail-server gereed is.**********
	*****************************************************************************************
            require_once 'swiftmailer/lib/swift_required.php';

            //SMTP (Simple Mail Transfer Protocol) server word opgevraagd met de bijbehorende login gegevens
            //todo: veranderen
			
            $transport = Swift_SmtpTransport::newInstance(, 25, 'ssl')
                    ->setUsername('')
                    ->setPassword('');

            $mailer = Swift_Mailer::newInstance($transport);

            //De mail bij de brochure
			
            $mail = $email;
//          $text = '<p> Beste ' . $first_name . " " . if(!empty($tussenvoegsel)) { echo $tussenvoegsel;} ." " $last_name ', </p>'.' <br> '.'<p> bedankt voor het aanvragen van onze brochure. </p> '.' <br> '.' <p> Groeten, </p> '.' <br> '.' <p> Bedrijf X. </p>';
            $text = '<p> Gefeliciteerd. het werkt! </p>';
            //Er wordt een mail verstuurd met een onderwerp, naar een opgegeven mail adres, van jou mail
            //adres met het bijbehorende bericht
            $message = Swift_Message::newInstance('Brochure')
                    ->setFrom(array('' => 'TEST')) //todo: verander mailadres
                    ->setTo(array($mail))
                    ->setBody($text, 'text/html');

            $result = $mailer->send($message);
    */
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