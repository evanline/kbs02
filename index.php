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

    } else {
    	$first_name = "";
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

	<form method = 'post' action = '/index.php'>
		<p class='form'>Naam:</p>
        <p class="error"><?php
            if (isset($_POST['submit']) AND isset($error[0])){echo $error[0];} 
            ?></p>
        <p class="error"><?php
            if (isset($_POST['submit']) AND isset($error[1])){echo $error[1];} 
            ?></p>
        <input type="text" name="first_name" placeholder="voornaam" value="<?php echo $first_name; ?>"> 
        <input type="text" name="last_name" placeholder="achternaam" value="<?php echo $last_name; ?>">
        <br>

        <p class='form'>Email</p>
        <p class="error"><?php
            if (isset($_POST['submit']) AND isset($error[2])){echo $error[2];}
            ?></p>
    	<input type="email" name="email" placeholder="email-adres" value="<?php echo $email; ?>">
    	<br>

    	<input class= "form" type="submit" value="verstuur aanvraag" name="submit">
	</form>
</body>
</html>