<?php include('../login/server.php'); ?>


<!DOCTYPE html>
<html>
<head>
<title>Admin Authentication | My City Events</title>
<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style type="text/css">
*{margin: 0;}
body{
	font-family: 'Roboto', sans-serif;
	scroll-behavior: smooth;
}	

header{
	background: #fff;
	height: 80px;
	box-shadow: 0 0 3px #000;
	width: 100%;
}
header img{
	width: 100px;
	padding-top: 10px;
	padding-left: 20px;
}
section{
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	box-shadow: 0 0 5px #ccc;
	border-radius: 3px;
	padding: 15px;
	margin-top: 20px;
	margin-bottom: 30px;
}

h3{
	border-bottom: 3px solid orange;
	margin-bottom: 15px;
	display: inline-block;
	padding-bottom: 5px;
}
input[type="text"],[type="password"]{
	border: 1px solid #ccc;
	outline: none;
	font-size: 15px;
	padding: 7px;
	width: 300px;
	border-radius: 2px;
	margin-bottom: 10px;
}
input[type="text"]:focus,[type="password"]:focus{
	border: 1px solid orange;
}
input[type="submit"]{
	background: orange;
	border: none;
	width: 100px;
	font-size: 14px;
	color: #FFF;
	padding: 5px;
	text-transform: uppercase;
	border-radius: 3px;
	cursor: pointer;
}
.msg{
	background: #FFF;
	box-shadow: 0 0 3px #ccc;
	padding: 15px;
	color: red;
}
span{
	color: red;
}
</style>

</head>
<body>

<header>
	<a href="index.php"><img src="../img/mylogo.png"></a>
</header>

<section>
	<h3>Admin Login</h3><br>
<form method="post" action="login.php">
	<?php include('../login/errors.php'); ?>
	<input type="text" name="username" placeholder="Username"><br>
	<input type="password" name="password" placeholder="Password"><br><br>
	<input type="submit" name="admin_login" value="Login">
</form>
</section>

</body>
</html>