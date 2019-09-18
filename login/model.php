<?php

	// open mysql connection
	$username = "";
	$password = "";

	try {
		
		$db =  new PDO('mysql:host=localhost;dbname=mycidhnt_myevents', "mycidhnt_indrakant", "Indrakant23");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (Exception $e) {
		die("Error : " . $e->getMessage() );
		// die("Database Error");
	}


	$userName = null;
	$userMessage = null;


	if ( !empty($_POST['u_name']) ) {
		$userName = $_POST['u_name'];
	}

	if ( !empty($_POST['myMessage']) ) {
		$userMessage = $_POST['myMessage'];
	}


	// echo "INSERT INTO user_info (user_message, user_age) VALUES($userMessage, $userAge)";
	$sql = 'INSERT INTO chat (u_name, myMessage) VALUES(:name, :msg) ';

 	$request =  $db->prepare( $sql );
 	// $request->bindParam(':age', $userAge, PDO::PARAM_INT);
 	// $request->bindParam(':msg', $userMessage, PDO::PARAM_STR);

 	// execution
 	$request->execute(  [':name' => $userName, ':msg' => $userMessage]  );

 	// close request
 	$request->closeCursor();

 	

 	header('location: message.php');


				




