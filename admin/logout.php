<?php
require_once('../functions/functions.php');
session_destroy();
session_start();
$_SESSION['message'] = "Tu t'es déconnecté.";
header("Location: " .BASE_URL."/admin");  // redirection sur page admin