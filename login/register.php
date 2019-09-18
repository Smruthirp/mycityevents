<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up | My City Events</title>
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
	<link rel="shortcut icon" type="text/css" href="logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
*{margin: 0; padding: 0;}
body{
	font-family: 'Roboto', sans-serif;
	}
header{
	background: #fff;
	position: fixed;width: 100%;
	box-shadow: 0 1px 2px #ccc;
	height: 70px;
	}

a{
	display: inline-block;
}
form{
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	box-shadow: 0 0 5px #ccc;
	border-radius: 3px;
	padding: 15px;
	margin-top: 20px;
}
form h2{
	border-bottom: 1px solid #000;
	font-weight: normal;
	padding-bottom: 10px;
	margin-bottom: 15px;
	font-size: 20px;
}
form input[type="text"],[type="email"],[type="password"],[type="file"]{
	border: none;
	background: unset;
	outline: none;
	padding: 7px;
	border: 1px solid #ccc;
	margin-bottom: 12px;
	width: 350px;
	border-radius: 3px;
	font-size: 14px;
}
form input[type="text"]:focus,[type="email"]:focus,[type="password"]:focus{
	border: 1px solid #000;
}
span{color: red;margin: 0px;padding: 0px; font-size: 14px;}

.must{
    width: 200px;
    margin: 5px;
    display: inline-block;
    width: 450px;
    color: #000;
    font-size: 12px;
    border-radius: 3px;
	}

@media screen and (max-width: 800px) {
    form{
        width: 95%;
        padding: 5px;
        
    }
    form input[type="text"],[type="email"],[type="password"],[type="file"]{
        width: 320px;
    }
    .must{font-size: 9px;}
}

</style>
</head>
<body>
		<header>
		<a href="../index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>
	</header><br><br><br><br>
	<form method="post" action="register.php" enctype="multipart/form-data">
	   <h2><b>Sign up</b>  | My City Events</h2>

		<?php include('errors.php'); ?>

			<input type="text" required name="username" placeholder="Full Name" value="<?php echo $username; ?>"><br>
			<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>"><br>
			<span class="must"><b>Note: </b>Password should contain capital letters, Numbers and Special characters</span><br>
			<input type="password" placeholder="Password" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
			<br>
			<input type="password" placeholder="Confirm password" name="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br><br>
		    <label for="image">Upload a Profile picture (optional)</label><br>
			<input type="file" name="image" id="image" /><br>
			
			<button type="submit" class="btn btn-success" name="insert" id="insert">Sign up</button>
		<br><br>
		<p>Already a member? <a href="login.php">Log in</a></p>
	</form>
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