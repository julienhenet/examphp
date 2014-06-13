<?php
session_start();	// start session
require_once("config.php");

function reply($type, $message){ // interpreter le JS
		$replying = array("error"=>"{$type}", "message"=>"$message");
		echo(json_encode($replying)); // en code JSOn
}

function add_email_to_database($email){ // ajouter l'email à la DB
 // Il faut:
 // Vérifier s'il n'est pas déjà enregisté
 // Créer un lien unique pour la désinscription
 // Ajouter l'utilisateur à la DB

 $email = mysql_real_escape_string($email); 
 $sql = "SELECT * FROM `users` WHERE email = '{$email}' LIMIT 1"; // trouve tout les e-mails correspondants (s'il y a lieu), mais n'en prend qu'un seul. (évite une requete plus longue)
 $qry = mysql_query($sql);
 if( mysql_num_rows($qry) != 0){ // retourne faux si on a trouvé un e-mail correspondant
  return false;
 }else{ // si pas d'e-mail correspondant (nouvel inscrit)

  // insère les valeurs dans la DB
  $sql = "
    INSERT INTO `users` (
     `id` ,
     `email`
    )
    VALUES (
     NULL , '$email'
    );
   "; 
   
  mysql_query($sql); //on envoie la requete, l'utilisateur est inscrit

  //Message au nouvel inscrit
  $subject = 'Inscription mailinglist';
  $message = 'Merci de t\'être inscrit sur la mailinglist!';
  //meta pour e-mail html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  //contenu de l'e-Mail
  $headers .= "From: ".REPLY_EMAIL."\r\n"; // l'email de l'admin
  mail($email, $subject, $message, $headers); //envoie l'email

  return true; // retourne true comme on a ajouté l'inscrit
 }
}

?>