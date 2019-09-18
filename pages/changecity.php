<?php		
require_once('../location/geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();

$mycity = "";
$mystate = "";
if (empty($_COOKIE["city"])){
	$mycity = $geoplugin->city;
}else{
	$mycity = $_COOKIE["city"];
}

if (empty($_COOKIE["state"])){
	$mystate = $geoplugin->region;
}else{
	$mystate = $_COOKIE["state"];
}

$message = "";
if(isset($_POST['submit'])){
	setcookie("city", $_POST["city"],time()+2678400 , '/' );
	setcookie("state", $_POST["state"],time()+2678400 , '/' );

	$message = "Your location has been updated, Go to <a href='../index.php'>Home page</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change your city | My City Events</title>
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style type="text/css">
*{margin: 0;}
body{
	background: #f1f1f1;
	font-family: 'Roboto', sans-serif;
}
header{
	background: #FFF;
	position: fixed;
	width: 100%;
	height: 60px;
	z-index: 1000;
	background: /* gradient can be an image */
    linear-gradient(to left, #ba4e58 0%, #ba4e58 12%, #ddd 47%, #ba4e58 100%)left bottom #fff no-repeat; background-size:100% 3px ;
    box-shadow: 0 0 3px #000;
	}
header img{
	float: left;
	width: 80px;
	padding-left: 15px;
}
form{
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 20px;
	background: #FFF;
	box-shadow: 0 0 5px #ccc;
	border-radius: 3px;
	padding: 20px;
}
label{
	font-size: 16px;
}
input[type="text"]{
	border: 1px solid #ccc;
	outline: none;
	border-radius: 2px;
	padding: 7px;
	font-size: 16px;
	width: 400px;
	margin-top: 5px;
}input[type="text"]:focus{
	border: 1px solid #000;
}
input[type="submit"]{
	outline: none;
	border: none;
	background: #f48f42;
	color: #FFF;
	border-radius: 2px;
	width: 120px;
	font-size: 15px;
	padding: 7px;
	cursor: pointer;
}


footer{
	background: #251830;
	height: 150px;
	padding: 30px 0 0 0;
	border-top: 2px solid #333;
	margin-top: 90px;
}
footer a{
	text-decoration: none;
	color: #f1f1f1;
	display: inline-block;
	margin: 5px;
	font-family: 'Raleway', sans-serif;
	font-weight: normal;
	padding: 5px;
	font-size: 14px;
}
footer a:hover{
	text-decoration: underline;
}
.copyright{
	background: #130a1c;
	padding: 15px;
	margin-top: 30px;
	color: #aaa;
	font-size: 13px;
}
@media screen and (max-width: 800px) {
    input[type="text"]{width: 320px;}
}

</style>

</head>
<body>

<header>
	<a href="../index.php"><img src="../img/mylogo.png"></a>
</header><br><br><br><br>
<form method="post" action="changecity.php">
	<p><?php echo $message; ?></p><br>
	<label for="city">Enter you city</label><br>
	<input type="text" id="city" name="city" onclick="this.select()" value="<?php echo "$mycity";?>"><br><br>

	<label for="state">Not in <?php echo "$mystate";?>? Enter your state</label><br>
	<input type="text" id="state" name="state" onclick="this.select()" value="<?php echo "$mystate";?>"><br><br>
	<input type="submit" name="submit" value="Submit">
</form>

<!-- FOOTER PART -->
<footer>
	<a href="about.php" target="_blank">About</a>
	<a href="terms.php" target="_blank">Terms of service</a>
	<a href="privary-policy.php" target="_blank">Privacy Policy</a>
	<a href="pricing.php" target="_blank">Pricing</a>
	<a href="contact.php" target="_blank">Contact us</a>
	<img src="../img/mylogo.png" draggable="false" style="width:130px; float: right; padding-right: 30px;">
	<br/><a href="https://www.facebook.com/MyCityEvents2019/" target="_blank"><i class="fa fa-facebook-square" style="font-size: 18px"></i></a>
	<a href="https://www.linkedin.com/in/mycity-events-291384191/" target="_blank"><i class="fa fa-linkedin" style="font-size: 18px"></i></a>
	<div class="copyright">
		© Copyright 2019. All Rights Reserved.
	</div>
</footer>

</body>
</html>