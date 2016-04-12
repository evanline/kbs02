<?php

//Checkt de naam van de ingelogde gebruiker en zoekt hem op in de opgegeven database
if (isset($first_name) && isset(tussenvoegsel) && isset($last_name) && isset($email)){

    /*
	//Met behulp van prepared statements in PDO word SQL injectie tegengehouden
    $db = new PDO('mysql:host=;dbname=', '', '');
    $stmt = $db->prepare("INSERT INTO login username VALUES (?)");
    $stmt->execute(array($gebruikersnaam));
*/

        //Als er op de de mail knop gedrukt is en de opgegeven gebruikersnaam overeenkomt met
        //de bestaande gebruiker in de database dan word de mail functie in werking gezet, een
        //mail verstuurd met een tijdelijk wachtwoord (deze word direct aangepast)
        if (isset($submit)) {

            require_once 'swiftmailer/lib/swift_required.php';

            //SMTP (Simple Mail Transfer Protocol) server word opgevraagd met de bijbehorende login gegevens
            $smtp_host_ip = gethostbyname('smtp.gmail.com');
            $transport = Swift_SmtpTransport::newInstance($smtp_host_ip, 465, 'ssl')
                    ->setUsername('dummytestscrum@gmail.com')
                    ->setPassword('Qwerty!@#456');

            $mailer = Swift_Mailer::newInstance($transport);

            //De mail die bij de opgegeven gebruikersnaam hoort word opgehaald
            $mail = $email;
            $text = 'Beste ' . $gebruikersnaam . ', <p> Uw heeft een tijdelijk wachtwoord gekregen: ' . $dummyPW . ' <br> '
                    . 'U dient dit wachtwoord te veranderen de eerste keer wanneer u inlogt. <p> Groeten, Knoppers BV';
            //Er wordt een mail verstuurd met een onderwerp, naar een opgegeven mail adres, van jou mail
            //adres met het bijbehorende bericht
            $message = Swift_Message::newInstance('Brochure')
                    ->setFrom(array('dummytestscrum@gmail.com' => 'TEST'))
                    ->setTo(array($mail))
                    ->setBody($text, 'text/html');

            $result = $mailer->send($message);

        }
    } else {
        $faal = true;
    }

?>

