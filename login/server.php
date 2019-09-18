<?php 
	session_start();
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 

	// connect to database
	$db = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");

	// REGISTER USER
if (isset($_POST['insert'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$file = mysqli_real_escape_string($db, file_get_contents($_FILES["image"]["tmp_name"]));

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "<span>Username is required</span>"); }
		if (empty($email)) { array_push($errors, "<span>Email is required</span>"); }
		if (empty($password_1)) { array_push($errors, "<span>Password is required</span>"); }
		// if (empty($file)) { array_push($errors, "<span>Profile picture is required</span>"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password, profile) 
					  VALUES('$username', '$email', '$password', '$file')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			// $_SESSION['success'] = "<p>You are now logged in</p>";
			header('location: ../index.php');
		}

	}
	// RESET PASSWORD
	if (isset($_POST['reset'])) {
		// receive all input values from the form
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		// $file = mysqli_real_escape_string($db, $_POST['image']);

		// form validation: ensure that the form is correctly filled
		if (empty($email)) { array_push($errors, "<span>Email is required</span>"); }
		if (empty($password_1)) { array_push($errors, "<span>Password is required</span>"); }
		// if (empty($file)) { array_push($errors, "<span>Profile picture is required</span>"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "UPDATE users SET password='$password' WHERE email='$email'";
			mysqli_query($db, $query);

			// $_SESSION['username'] = $username;
			// $_SESSION['email'] = $email;
			// $_SESSION['success'] = "<p>You are now logged in</p>";
// 			header('location: login.php');
            echo "<p class='message'>Your password has been reset, please login with new password</p>";
		}

	}


	// ... 

	// EDIT PROFILE PICTURE
	if (isset($_POST['update'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$file = mysqli_real_escape_string($db, file_get_contents($_FILES["image"]["tmp_name"]));

		// form validation: ensure that the form is correctly filled
		if (empty($file)) { array_push($errors, "<span>Please select an image</span>"); }
		if (count($errors) == 0) {
			$query = "UPDATE users SET profile='$file' WHERE email='$email'";
			mysqli_query($db, $query);
			echo "<p> Profile picture updated. Go to <a href='../index.php'>Home page</a></p>";		}
	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "<span>Email is required</span>");
		}
		if (empty($password)) {
			array_push($errors, "<span>Password is required</span>");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);
// 			echo $email;
			if (mysqli_num_rows($results) == 1) {
			  while($row = mysqli_fetch_assoc($results)) {
				$_SESSION['email'] = $email;
				header('location: ../index.php');
			}}else {
				array_push($errors, "<span>Wrong Email or Password combination</span>");
			}
		}
	}
	
	

	// ADMIN LOGIN
	if (isset($_POST['admin_login'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "<span>Username is required</span>");
		}
		if (empty($password)) {
			array_push($errors, "<span>Password is required</span>");
		}

		if (count($errors) == 0) {
			// $password = md5($password);
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
			  while($row = mysqli_fetch_assoc($results)) {
				$_SESSION['username'] = $username;
				header('location: ../admin/index.php');
			}}else {
				array_push($errors, "<span>Wrong Username or Password combination</span>");
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>My City Events</title>
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
</head>
<body>
<script type="text/javascript">
$(document).ready(function(){
	$('#insert').click(function(){
		var image_name = $('#image').val();
		if(image_name == ''){
			alert("Please select image");
			return false;
		}
		else {
			var extension = $('#image').val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert('Invalid image file');
				$('#image').val('');

				return false;
			}
		}
	});
});
</script>
</body>
</html>