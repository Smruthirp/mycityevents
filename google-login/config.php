<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("987167082323-23h83oh3fr6kl8mnanhm68jvoe2v409c.apps.googleusercontent.com");
	$gClient->setClientSecret("RaZVDJL18_x_3RaAtbh5bdvc");
	$gClient->setApplicationName("My City Events");
	$gClient->setRedirectUri("https://mycityevents.org/google-login/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");


	require_once "../FacebookLogin/Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '2147059718918681',
		'app_secret' => '11467ad13513914a53027cd734c8912a',
		'default_graph_version' => 'v2.10'
	]);

	$helper = $FB->getRedirectLoginHelper();


?>
