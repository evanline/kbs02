<?php 
//define the receiver of the email
include 'index.php';

$to = $email;
//define the subject of the email 
$subject = 'Aanvraag brochure'; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash 
$random_hash = md5(date('r', time())); 
//define the headers we want passed. Note that they are separated with \r\n 
$headers = "From: jandehoop@rtlnieuws.nl\r\nReply-To: " . $email; 
//add boundary string and mime type specification 
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 
//read the atachment file contents into a string,
$attachment = chunk_split(base64_encode(file_get_contents('brochure.pdf'))); 
//encode it with MIME base64,S
//and split it into smaller chunks
//define the body of the message. 
ob_start(); //Turn on output buffering 
?> 
--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

Hallo ,
Bedankt voor het aanvragen van onze brochure 
De Brochure zit in de bijlage toegevoegd.

Groet,
Het WTJ01 Team
(Gerco en juffrouw schreeuwlelijk) - Medewerkers IT Helpdesk Toet Toet 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

Hallo,
Bedankt voor het aanvragen van onze brochure 
De Brochure zit in de bijlage toegevoegd.

Groet,
Het WTJ01 Team
(Gerco en juffrouw schreeuwlelijk) - Medewerkers IT Helpdesk Toet Toet 

--PHP-alt-<?php echo $random_hash; ?>-- 

--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: application/pdf; name="brochure.pdf"  
Content-Transfer-Encoding: base64  
Content-Disposition: attachment  

<?php echo $attachment; ?> 
--PHP-mixed-<?php echo $random_hash; ?>-- 

<?php 
//copy current buffer contents into $message variable and delete current output buffer 
$message = ob_get_clean(); 
//send the email 
$mail_sent = @mail( $to, $subject, $message, $headers ); 
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent" : "Mail failed"; 
?> 