<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Ticket Booking Status | My City Events</title>
	<link rel="shortcut icon" href="../../img/mylogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js'></script>
<style type="text/css">
	*{margin: 0;}
	body{
		font-family: 'Roboto',sans-serif;
	}
	section{
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	padding-right: 10px;
	border-radius: 3px;
	padding: 20px;
	border: 1px solid green;
}
.continue{
	background: unset;
	border: none;
	margin-left: 60px;
	border: 1px solid green;
	cursor: pointer;
	border-radius: 3px;
	text-transform: uppercase;
	font-size: 11px;
	color: green;
	padding: 7px;
}
h3{
	text-transform: uppercase;
	border-bottom: 2px solid #3ca1c1;
	padding-bottom: 5px;
	margin-bottom: 15px;
	color: #263147;
	font-family: 'Raleway', sans-serif;
}
span{
	font-weight: bold;
	padding-right: 10px;
}
p{
	padding-top: 10px;
}
h2{
	border-bottom: 1px solid #ccc;
	padding-bottom: 10px;
	font-weight: normal;
	font-size: 18px;
	color: green;
}
h4{
	border-top: 1px dashed #ccc;
	padding-top: 10px;
	padding-bottom: 5px;
}
header{
	background: #FFF;
	position: fixed;
	width: 100%;
	height: 60px;
	z-index: 1000;
    box-shadow: 0 0 3px #000;
	}
header img{
	float: left;
	width: 80px;
	padding-left: 15px;
}
#submit{
	border: none;
	background: #000;
	color: #cfc3e5; 
	outline: none;
	padding: 7px;
	font-family: 'Roboto', sans-serif;
	margin-top: 10px;
	border-radius: 3px;
}
.fa{
	padding-left: 10px;
}
.gif{
	float: left;
	width: 70px;
	margin: -15px 0 0 -20px;
}
h5{
	font-size: 16px;
	font-weight: normal;
	padding-top: 15px;
	margin-top: 10px;
	border-top: 1px solid #317c36;
	color: #317c36;
}
section + body{
	color: #FFF;
}
</style>

</head>
<body>
<header>
	<a href="../../index.php"><img src="../../img/mylogo.png"></a>
</header>
<br><br><br><br>
<?php 
// session_start();
ob_start();
include '../../pages/checkout.php';
$user = $_SESSION['user'];
$participant = $_SESSION['participant'];
$phone = $_SESSION['phone'];
$event = $_SESSION['event'];
$email = $_SESSION['email'];
$location = $_SESSION['location'];
$link = $_SESSION['link'];
$startDate = $_SESSION['startDate'];
$startTime = $_SESSION['startTime'];
$bookingId = $_SESSION['bookingId'];
$eventId = $_SESSION ['eventId'];

// $count1 = $_POST['count1'];
// $count2 = $_POST['count2'];
// $count3 = $_POST['count3'];
// $count4 = $_POST['count4'];
// $count5 = $_POST['count5'];
// $count6 = $_POST['count6'];
// $count7 = $_POST['count7'];
// $count8 = $_POST['count8'];

// $seat1 = $_POST['seat1'];
// $seat2 = $_POST['seat2'];
// $seat3 = $_POST['seat3'];
// $seat4 = $_POST['seat4'];
// $seat5 = $_POST['seat5'];
// $seat6 = $_POST['seat6'];
// $seat7 = $_POST['seat7'];
// $seat8 = $_POST['seat8'];

$count1 = $_SESSION ['count1'];
$count2 = $_SESSION ['count2'];
$count3 = $_SESSION ['count3'];
$count4 = $_SESSION ['count4'];
$count5 = $_SESSION ['count5'];
$count6 = $_SESSION ['count6'];
$count7 = $_SESSION ['count7'];
$count8 = $_SESSION ['count8'];

$seat1 = $_SESSION ['seat1'];
$seat2 = $_SESSION ['seat2'];
$seat3 = $_SESSION ['seat3'];
$seat4 = $_SESSION ['seat4'];
$seat5 = $_SESSION ['seat5'];
$seat6 = $_SESSION ['seat6'];
$seat7 = $_SESSION ['seat7'];
$seat8 = $_SESSION ['seat8'];


$updatedSeat1 = $seat1-$count1;
$updatedSeat2 = $seat2-$count2;
$updatedSeat3 = $seat3-$count3;
$updatedSeat4 = $seat4-$count4;
$updatedSeat5 = $seat5-$count5;
$updatedSeat6 = $seat6-$count6;
$updatedSeat7 = $seat7-$count7;
$updatedSeat8 = $seat8-$count8;


ob_end_clean();


 ?>


<?php
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");

// header("Pragma: no-cache");
// header("Cache-Control: no-cache");
// header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your applications MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
	//	echo "<b>Transaction status is success</b>" . "<br/>";
		if(isset($_POST['ORDERID'], $_POST['TXNAMOUNT'])){
		$amount = $_POST['TXNAMOUNT'];
		$orderId = $_POST['ORDERID'];
		
		date_default_timezone_set('Asia/Kolkata');
		$bookingDate = date('d M Y h:i a');

mysqli_query($connect, "UPDATE image_table SET seat1='$updatedSeat1', seat2='$updatedSeat2', seat3='$updatedSeat3', seat4='$updatedSeat4', seat5='$updatedSeat5', seat6='$updatedSeat6', seat7='$updatedSeat7', seat8='$updatedSeat8' WHERE ID='$eventId'");

    mysqli_query($connect, "INSERT INTO bookingdetails (userName, userEmail, userPhone, eventName, eventDate, eventLocation, ticketAmount, attendees, bookingId, startTime, orderId, bookingDate, eventLink) VALUES ('$user', '$email', '$phone', '$event', '$startDate', '$location', '$amount', '$participant', '$bookingId', '$startTime', '$orderId', '$bookingDate', '$link')") or die(mysqli_error());




	//		echo "Order ID = ".$orderId;
	//		echo "Amount = ".$amount;
	//		echo "User = ".$user;

			echo "
			<section><img src='../../img/success.gif' class='gif'>
			<h2>Congratulations $user. Your ticket has been successfully booked. Please download your ticket below.</h2>
		<div id='content' style='font-family: sans-serif;'> 
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Event name: </span>".$event."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Order id: </span>".$orderId."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Total amount: </span>Rs ".$_POST['TXNAMOUNT']."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Total participants: </span>".$participant."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Event location: </span>".$location."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Start date: </span>".$startDate."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Start time: </span>".$startTime."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Booking id: </span>".$bookingId."</p><br>
			<h4 style='font-family: sans-serif;'>Contact Details</h4>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>User: </span>".$user."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Email: </span>".$email."</p>
			<p style='font-family: sans-serif;'><span style=' font-weight: bold;'>Phone: </span>+91 - ".$phone."</p>			
		</div>
			<div style='background: #03776e; width: 150px;font-size: 14px; margin-top: 20px;padding: 5px;float: left;margin-right: 10px; border-radius: 3px; text-transform: uppercase; color: #fff;display: block;'><a href='generate2-pdf.php' target='_blank' style='color: #fff; text-decoration: none;'>Download ticket<i class='fa fa-download'></i></a></div>
			
			<div style='background: #03776e; width: 200px;margin-left: 10px;font-size: 14px; margin-top: 20px;padding: 5px;float:left; border-radius: 3px; text-transform: uppercase; color: #fff;display: block;'>
			<a href='email.php' target='_blank' style='color: #fff; text-decoration: none;'>Send ticket to my email<i class='fa fa-envelope'></i></a>
			</div>
			<br><br><br>
			<h5>Thank you for booking ticket with us. Continue browsing for more events, <a href='../../index.php'>Click here</a></h5><br>
			</section>
			";

		}
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<section> <img src='../../img/failed.png' style='width: 30px; float: left; padding: 15px;'><p style='padding-top: 20px; font-size: 18px;'> We are sorry $user, Your ticket could not be booked. Please try again.</p>" . "<br/>";
	
// 	if(isset($_POST['ORDERID'], $_POST['TXNAMOUNT'])){
// 			echo "Order ID = ".$_POST['ORDERID'];
// 			echo "Amount = ".$_POST['TXNAMOUNT'];
// 		}
	echo "<button onclick=window.location.href='../../index.php' class='continue'>Continue Booking Event</button>";
		 echo "</section>";

		}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				// echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

<script type="text/javascript">
	var doc = new jsPDF(); 
var specialElementHandlers = { 
    '#editor': function (element, renderer) { 
        return true; 
    } 
};
$('#submit').click(function () { 
    doc.fromHTML($('#content').html(), 15, 15, { 
        'width': 190, 
            'elementHandlers': specialElementHandlers 
    }); 
    doc.save('<?php echo $user. '`s event for '.$event . ' on ' . $startDate  ?> .pdf'); 
});
</script>
<?php $br = "<br>"; ?>

<!-- FOOTER PART -->
<footer>
	<a href="../../pages/about.php" target="_blank">About</a>
	<a href="../../pages/team.php" target="_blank">Team</a>
	<a href="../../pages/terms.php" target="_blank">Terms of service</a>
	<a href="../../pages/privary-policy.php" target="_blank">Privacy Policy</a>
	<a href="../../pages/pricing.php" target="_blank">Pricing</a>
	<a href="../../pages/contact.php" target="_blank">Contact us</a>
	<img src="../../img/mylogo.png" draggable="false" style="width:130px; float: right; padding-right: 30px;">
	<div class="copyright">
		&copy; Copyright 2019. All Rights Reserved.
	</div>
</footer>



</body>
</html>