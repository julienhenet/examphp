<?php
require_once('../functions/functions.php');
if($_SESSION['loggedIn'] != 1){ 
		
		//empêche l'internaute d'accéder à la page s'il n'est pas connecté, redirection vers page login
		$_SESSION['message'] = "Tu dois être connecté.";
		header("Location: ". BASE_URL ."/admin"); 
		die();
}
$message = $_POST['messageArea'];
$subject = $_POST['subject'];
if(strlen($message) == 0 || strlen($subject) == 0){
	// si les champs sont vides
	$_SESSION['subject'] = $subject;
	$_SESSION['messageArea'] =  $message;	
	$_SESSION['message'] = "Remplis le message et le sujet.";
	header("Location: " .BASE_URL."/admin");
	die();
	
}
// selctionne tous les souscris
$sql = "
	SELECT * FROM users;
";

$qr = mysql_query($sql);
// s'il n'y en a pas
if(mysql_num_rows($qr) == 0){
	$_SESSION['message'] =  "Tu n'as pas encore d'inscrits :(";	
	header("Location: " .BASE_URL."/admin"); 
	die();
}

// passe tous les souscris
while( $user = mysql_fetch_array($qr)){
	
	$_SESSION['message'] =  "Envois vers tous les e-Mails...";	
	$newMessage = "";

	// remplacer les caractères spéciaux
	$newMessage = htmlspecialchars($message);
	// ajouter un saut à chaque nouvelle ligne
	$newMessage = str_replace( "\r\n",
								"<br />",
								$newMessage
							);
	//meta pour e-mail html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	//contenu de l'e-Mail
	$headers .= "From: ".REPLY_EMAIL."\r\n"; // l'email de l'admin
	mail($user['email'], $subject, $newMessage, $headers); //envoie l'email
}
	$_SESSION['message'] =  "e-Mails envoyés!";	
	header("Location: " .BASE_URL."/admin");  //redirction vers page admin
	