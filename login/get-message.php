	<?php 	

	// open mysql connection
	$username = "";
	$password = "";

	try {
		
		$db =  new PDO('mysql:host=localhost;dbname=mycidhnt_myevents', "mycidhnt_myevents", "Indrakant23");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (Exception $e) {
		die("Error : " . $e->getMessage() );
		// die("Database Error");
	}


	// will contain all the users info
	$data = [];

	// sql comman
	$sql = 'SELECT * FROM chat ORDER BY id DESC';

	// start retrieving data
	$request = $db->query( $sql );

	// adding data to the data array
	while ( $info = $request->fetch()  ) {
		$data[] = $info;
	}


	$request->closeCursor();



	// var_dump( $data );
	?>