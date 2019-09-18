<?php 
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
$msg = "";
if(isset($_POST["insert"]))
{
	require 'phpmailer/PHPMailerAutoload.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$body = $_POST['message'];

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "premium25.web-hosting.com";
$mail->SMTPSecure = "tls";
$mail->Port = 587; 
$mail->SMTPAuth = true;
$mail->Username = 'support@mycityevents.org';
$mail->Password = 'Vijaypur2$';

$mail->setFrom('support@mycityevents.org','Support - My City Events');
$mail->addAddress('support@mycityevents.org');
$mail->Subject = 'Message from '. $name;
$mail->Body = "User name: " .$name. "\n". "Email: ". $email. "\n". "Message: ". $body;

if ($mail->send()){
    $msg = "Your Message has been sent ".$name.", we'll keep in touch with you soon over ". $email;
}
else{
	$msg = "Message not sent, Please try again.";
}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us | My City Events</title>
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	padding: 7px;
	text-transform: uppercase;
	width: 200px;
	border-radius: 1px; 
	resize: vertical;
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
       input[type="text"],[type="email"], textarea{
           width: 318px;
       }
}

	</style>
</head>
<body>

<header>
	<a href="../index.php"><img src="../img/mylogo.png"></a>
</header><br><br><br><br>

<section>
	<?php echo "<span> $msg </span><br><br>"; ?>
	<h1>Contact us</h1>	
<form method="post" action="contact.php">
	<label for="name">Name: </label><br>
	<input type="text" name="name" placeholder="Your name.." required /><br><br>

	<label for="email">Email: </label><br>
	<input type="email" name="email" placeholder="Your email.."  required/><br><br>

	<label for="message">Message: </label><br>
	<textarea name="message" placeholder="Type your message here.."  required/></textarea><br><br>

	<input type="submit" name="insert" value="Send">

</form>
</section>

<!-- FOOTER PART -->
<footer>
	<a href="about.php" target="_blank">About</a>
	<a href="terms.php" target="_blank">Terms of service</a>
	<a href="privary-policy.php" target="_blank">Privacy Policy</a>
	<a href="pricing.php" target="_blank">Pricing</a>
	<a href="contact.php" target="_blank">Contact us</a>
	<img src="../img/mylogo.png" draggable="false" style="width:130px; float: right; padding-right: 30px;">
	<br/><a href="https://www.facebook.com/MyCityEvents2019/" target="_blank"><i class="fa fa-facebook-square" style="font-size: 18px"></i></a>
	<a href="https://www.linkedin.com/company/my-city-events" target="_blank"><i class="fa fa-linkedin" style="font-size: 18px"></i></a>
	<div class="copyright">
		© Copyright 2019. All Rights Reserved.
	</div>
</footer>


</body>
</html>