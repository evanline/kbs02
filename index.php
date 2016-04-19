<!--
velden:
Naam
achternaam
email adres
 -->

<?php 

    global $first_name ;
    global $tussenvoegsel;
    global $last_name;
    global $email;


	$_SESSION["first_name"] = NULL;
	$_SESSION["tussenvoegsel"] = NULL;
    $_SESSION["last_name"] = NULL;
    $_SESSION["email"] = NULL;

    if (isset($_POST['submit'])){
    	$first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_STRING);
    	$tussenvoegsel = filter_input(INPUT_POST, "tussenvoegsel", FILTER_SANITIZE_STRING);
        $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_STRING);
        $email =  filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
    
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

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[3] = "Het ingevoerde Email adres is ongeldig.";
    }
        
        if (empty($error)){
             header("Location:afgehandeld.php");
        } //todo: dit naar mail.

    } else {
    	$first_name = "";
    	$tussenvoegsel = "";
    	$last_name = "";
    	$email = "";
    }
	
?>
<html>
<head>
	<title>brochure aanvragen</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
</head>
<body>
	<h1 class='titel'>Vraag uw brochure aan!</h1>

	<br>
	<form method = 'post' action = 'index.php' class = "form">
		<h3>Persoonsgegevens</h3>
		<p >Voornaam*</p>
        <input type="text" name="first_name" placeholder="voornaam" value="<?php echo $first_name; ?>"> 
        <p class="error"><?php
            if (isset($_POST['submit']) AND isset($error[0])){echo $error[0];} 
        ?></p>
        
        <p >Tussenvoegsel</p>
        <input type="text" name="tussenvoegsel" placeholder="tussenvoegsel" value="<?php echo $tussenvoegsel; ?>">
        <p>Achernaam*</p>
        <input type="text" name="last_name" placeholder="achternaam" value="<?php echo $last_name; ?>">
        <br>
        <p class="error"><?php
            if (isset($_POST['submit']) AND isset($error[1])){echo $error[1];} 
        ?></p>
        <br>
        <h3>Contactgegevens</h3>
        <p>Email*</p>
        
    	<input type="email" name="email" placeholder="email-adres" value="<?php echo $email; ?>">
    	<p class="error"><?php
            if (isset($_POST['submit']) AND isset($error[2])){echo $error[2];}
            ?></p>
            <p class="error"><?php
            if (isset($_POST['submit']) AND isset($error[3]) AND(!isset($error[2]))){echo $error[3];}
            ?></p>
    	<br>
    	<input type="submit" value="verstuur aanvraag" name="submit">
	</form>
</body>
</html>

