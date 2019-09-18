<?php include('../login/server.php') ?>

<?php 
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents"); 
if(isset($_GET['edit']))
	$email = mysqli_real_escape_string($connect, $_GET['edit']);
	$sql = "SELECT * FROM users WHERE email ='$email'";
	$result = mysqli_query($connect, $sql);
	// if($queryResult > 0)
	while($row = mysqli_fetch_assoc($result)){
	$email = $row['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile Picture | My City Events</title>
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
	<link rel="shortcut icon" type="text/css" href="logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
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
section{
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	box-shadow: 0 0 5px #ccc;
	border-radius: 3px;
	padding: 15px;
	height: 300px;
	margin-top: 50px;
}
button{
	display: inline-block;
	float: left;
	margin: 15px 10px 0 0;
	cursor: pointer;
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
p{
	color: #fff;
	position: absolute;
	top: 100px;
	left: 50%;
	transform: translateX(-50%);
	font-size: 14px;
	background: green;
	border-radius: 3px;
	padding: 5px 40px;
}
p a{
	color: rgba(250,250,250,.8);
	text-decoration: underline;
}
p a:hover{
	color: rgba(250,250,250,.6);

}
span{color: red;margin: 0px;padding: 0px;}

</style>
</head>
<body>
<header>
<a href="../index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>
</header><br><br><br><br>
<section>
	<form method="post" action="edit-picture.php" enctype="multipart/form-data">
	   <h2>Edit Profile Picture</h2>

		<?php include('../Login/errors.php'); ?>

			<label for="image">Select an image </label><br>
			<input type="file" name="image" id="image" /><br>
			<input type="text" value="<?php echo $email?>" name="email" style="display: none;">
			
			<button type="submit" class="btn btn-success" name="update" id="insert">Update profile picture <i class="fa fa-edit"></i></button>
	</form>

</section>
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