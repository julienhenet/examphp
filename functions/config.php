<?php
	//ficher de connection à la DB
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$db		= 'tfetest'; 
	$conn 	= mysql_connect($dbhost, $dbuser, $dbpass) or die("Impossible de se connecter à la base de donnée :(");
	mysql_select_db($db) or die("La base de donnée est introuvable :(");
	define("BASE_URL", "http://weasr.com/mailinglist/index.php"); 
	define("REPLY_EMAIL", "weasrbox@gmail.com");