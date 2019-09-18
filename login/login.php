<?php include('server.php') ?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>Login | My City Events</title>
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
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
	margin-top: 40px;
}
form h2{
	border-bottom: 1px solid #000;
	font-weight: normal;
	padding-bottom: 10px;
	margin-bottom: 15px;
	font-size: 20px;
}
form input[type="text"],[type="password"]{
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
form input[type="text"]:focus,[type="password"]:focus{
	border: 1px solid #000;
}
.message{
    position:absolute;
    top: 90px;
    text-align: center;
    color: green;
    left: 50%;
    transform: translateX(-50%);
}
span{color: red;margin: 0px;padding: 0px;}

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

	 <form method="post" action="login.php">
	  <h2><b>Login</b>  | My City Events</h2>
	  <?php include('errors.php'); ?>
	 
 	<label for="email">Email</label><br>
	<input type="text" placeholder="email@mycityevents.org" name="email" id="username"><br>

	<label for="pass">Password</label><i style="font-size: 10px; "></i><br>
	<input type="password" placeholder="********" name="password" id="pass"><br>

	<input type="checkbox" onclick="check()" id="password" style="width: 20px; margin-top: 10px;">
	<label for="password" style="float: left; font-size: 15px;margin-top: 7px;">Show Password</label>
	<a href="forgot.php">Forgot Password?</a>
	<br><br>

	<button type="submit" class="btn btn-success" name="login_user">Login</button><br><br>
	<p>Not yet a member? <a href="register.php">Sign up</a></p>
	
	</form>

	<script type="text/javascript">
		function check(){
			x = document.getElementById("pass");
			if(x.type=== "password"){
				x.type="text";
			}else {
				x.type="password";
			}
		}
	</script>

</body>
</html>