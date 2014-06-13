<?php
	require_once('../functions/functions.php');
	@$loggedIn = loggedIn();
	if( isset($_SESSION['message']) ){
		$message = $_SESSION['message']; 
		$_SESSION['message'] = "";
	}
	
	if( isset($_SESSION['subject']) ){
		$subject = $_SESSION['subject']; //enregistre le sujet
	}else{
		$subject = "";
	}
	if( isset($_SESSION['messageArea']) ){
		$messageArea = $_SESSION['messageArea']; //enregistre le message
	}else{
		$messageArea = "";
	}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>admin | weare</title>
		
 	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<div id="loginWrap">
<?php if(!$loggedIn){ ?>
	<h2>Connexion:</h2>
	<?php if($message) echo "<h4 class='loginMessage'>".$message."</h4>"; ?>
	<form action="login.php" method="POST" id="login">
		<label class="loginLabel" for="username">Login:</label>
		<input class="loginInput" type="text" value="alex" size="20" id="username" name="username" />
		<label class="loginLabel" for="password">Mot de passe:</label>
		<input class="loginInput" type="password" value="" size="20" id="password" name="password" />		
		<input type="submit" id="submitLogin" value="Connexion" />
	</form>
	<p class="message" id="messageLogin"></p>	
<?php }else{ ?>
	<h2>Envoie d'un message:</h2>
	<?php if($message) echo "<h4 class='loginMessage'>".$message."</h4>"; ?>
	
	<form action="poster.php" method="POST" id="create">
		<label  for="subject" class="loginLabel subjectLabel">Sujet:</label>
		<input class="loginInput subjectInput" name="subject" type="text" value="<?php echo $subject; ?>" />
		<label for="messageArea" class="loginLabel">Message:</label>
		<textarea class="input" name="messageArea" id="messageArea" rows="15" cols="46" wrap="wrap"><?php echo $messageArea; ?></textarea>
		<input id="submitMessage" type="submit" value="Envoyer" />
	</form>
	<div id="admin" class="logOut"><a href="<?php echo BASE_URL ?>/admin/logout.php">Déconnexion</a></div>
<?php } ?>
</div>
</body>
</html>