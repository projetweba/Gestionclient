<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("312083712370-9tb0cjgmmngk8s4b1bcq2h46tksrmi65.apps.googleusercontent.com");
	$gClient->setClientSecret("nN7dONDbnpsZ3uhvFRUaZ64b");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://localhost/zanimo/demo.devitems.com/views/marten-v1/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
