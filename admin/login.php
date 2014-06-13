<?php
	require_once("../functions/functions.php");

	$username = mysql_real_escape_string(trim($_POST['username']));
	$password = mysql_real_escape_string(trim($_POST['password']));
		// something was entered
	if(strlen($username) == 0 || strlen($password) == 0){ // si un des champs est vide
		$_SESSION['message'] = "Entre ton mot de passe ou ton login, please"; // affiche ce message
		header("Location: ". BASE_URL ."/admin");   //refresh
		die();
	}else{
		$password = md5($password); //crypte le password
	}
	
	
	$sql = "
		SELECT * FROM users WHERE username = '{$email}' AND password = '{$password}' LIMIT 1;
		"; //recherche dans la DB un user avec ce mdp
	$qr = mysql_query($sql); // lancer la requête
	if( mysql_num_rows($qr) == 1 ){  // si trouvé
		$user = mysql_fetch_assoc($qr); // récupérer les valeurs
		$_SESSION['loggedIn'] = 1; // activer la session 
		$_SESSION['username'] = $user['username']; //  récupérer le nom de l'utilisateur
		
		// $_SESSION['time'] =  $_SERVER['REQUEST_TIME'];
		$_SESSION['message'] = "Tu es connecté!";
		header("Location: ". BASE_URL ."/admin");   // redirect the user
		die();
	}else{
		$_SESSION['message'] = "Login ou mot de passe incorrect :s.";
		header("Location: ". BASE_URL ."/admin");   
		die();
	}