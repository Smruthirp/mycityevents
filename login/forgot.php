<?php 
// $connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
$msg = "";
if(isset($_POST["insert"]))
{
require '../pages/phpmailer/PHPMailerAutoload.php';
$email = $_POST['email'];

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "premium25.web-hosting.com";
$mail->SMTPSecure = "tls";
$mail->Port = 587; 
$mail->SMTPAuth = true;
$mail->Username = 'support@mycityevents.org';
$mail->Password = 'Vijaypur2$';

$mail->setFrom('support@mycityevents.org','Support - My City Events');
$mail->addAddress($email);
$mail->Subject = 'Reset Password  - My City Events';
$mail->Body = "Dear user, \n\nPlease use below link to reset your password. \n http://mycityevents.org/login/reset.php \n\nThanks & Regards,\nMy City Events";

if ($mail->send()){
    $msg = "A password reset link has been sent to ". $email;
}
else{
	$msg = "Message not sent, Please try again.";
}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset Password | My City Events</title>
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
*{margin: 0;}
body{
	font-family: 'Roboto', sans-serif;
	background: #f1f1f1;
	}
header{
	background: #FFF;
	position: fixed;
	width: 100%;
	height: 60px;
    box-shadow: 0 0 3px #000;
	}
header img{
	float: left;
	width: 80px;
	padding-left: 15px;
}
section{
	width: 90%;
	background: #fff;
	height: auto;
	padding: 25px;
	margin-top: 10px;
	border-radius: 2px;
	box-shadow: 0 0 5px #ccc;
	margin-bottom: 30px;
	margin-left: auto;
	margin-right: auto;
}
label{
	color: #505556;
}
input[type="text"],[type="email"]{
	outline: none;
	margin-bottom: 10px;
	margin-top: 5px;
	border: 1px solid #bbb;
	border-radius: 2px;
	padding: 6px;
	width: 400px;
	font-size: 15px;
}
span{
	padding-bottom: 5px;
	margin-bottom: 15px;
	border-bottom: 1px solid #ccc;
}
textarea{
	outline: none;
	width: 400px;
	height: 100px;
	padding: 6px;
	font-size: 15px;
	border: 1px solid #bbb;
	font-family: 'Roboto', sans-serif; 
}
input[type="submit"]{
	outline: none;
	border: none;
	background: #3fa7c6;
	color: #FFF;
	border-radius: 3px;
	box-shadow: 0 0 3px #ccc;
	padding: 6px;
	width: auto;
	font-size: 15px;
	cursor: pointer;
}
h1{
	font-family: 'Raleway', sans-serif;
	color: #3d526d;
	font-weight: bold;
	font-size: 20px;
	padding-bottom: 30px;
}
p{
	background: #1c5b2f;
	color: #fff;
	padding: 10px;
	border-radius: 2px;
	margin-bottom: 10px;
}
p a{
	color: #fff;
	text-decoration: underline;
}
footer{
	background: #251830;
	height: 150px;
	padding: 30px 0 0 0;
	border-top: 2px solid #333;
	position: absolute; bottom: 0px; width: 100%;
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
	margin-top: 70px;
	color: #aaa;
	font-size: 13px;
}

</style>
</head>
<body>

<header>
	<a href="../index.php"><img src="../img/mylogo.png"></a>
</header><br><br><br><br>

<section>
	<?php echo "<span> $msg </span><br><br>"; ?>
	<h1>Email password reset link</h1>	
<form method="post" action="forgot.php">

<label for="email">Enter your registered email : </label><br>
<input type="email" name="email" placeholder="Your email.." id="email"  required/><br><br>

<input type="submit" name="insert" value="Send password reset link">

</form>
</section>

<!-- FOOTER PART -->
<footer>
	<a href="../pages/about.php" target="_blank">About</a>
	<a href="../pages/team.php" target="_blank">Team</a>
	<a href="../pages/terms.php" target="_blank">Terms of service</a>
	<a href="../pages/privary-policy.php" target="_blank">Privacy Policy</a>
	<a href="../pages/pricing.php" target="_blank">Pricing</a>
	<a href="../pages/contact.php" target="_blank">Contact us</a>
	<img src="../img/mylogo.png" draggable="false" style="width:130px; float: right; padding-right: 30px;">
	<div class="copyright">
		© Copyright 2019. All Rights Reserved.
	</div>
</footer>


</body>
</html>