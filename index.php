<!--
velden:
Naam
achternaam
email adres
 -->

<?php 
	$_SESSION["first_name"] = NULL;
    $_SESSION["last_name"] = NULL;
    $_SESSION["email"] = NULL;

    if (isset($_POST['submit'])){
    	$first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_STRING);
        $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_STRING);
        $email =  filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    
    	$_SESSION["first_name"] = $first_name;
    	$_SESSION["last_name"] = $last_name;
    	$_SESSION["email"] = $email;

    	if (empty($first_name)){
            $error = array('Vul een voornaam in:');
        }
        if (empty($last_name)){
            $error[1] = "Vul een achternaam in:";
        }
        if (empty($email)){
            $error[2] = "Vul een email-adres in:";
        }
        if (empty($error)){
             header("Location:afgehandeld.php");
        } //todo: dit naar mail.

    }
?>
<html>
<head>
	<title>brochure aanvragen</title>
</head>
<body>
	<form>
		
	</form>
</body>
</html>