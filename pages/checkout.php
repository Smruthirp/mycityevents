<?php
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
session_start();
ob_start();
include "../login/server.php";
ob_end_clean();
$email = "";
$user = "";
// Getting Login Data from sign up
if (isset($_SESSION['email'])) {
$signEmail = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$signEmail'";
$result = mysqli_query($connect, $query);
$queryResult = mysqli_num_rows($result);
if($queryResult > 0){
while($row = mysqli_fetch_array($result)){

$name = $row['username'];
}
}else{
	echo "";
}}

if (isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$user = $name;
}else if (isset($_SESSION['access_token'])){
	$email = $_SESSION['email'];
	$user = $_SESSION['givenName'];
}else{
	header('Location: ../google-login/login.php');
 	exit();
}
?>


<?php 
// session_start();
//$_SESSION['user'] = 'vishal123';
if(isset($_POST['totalAmount'])){
	$amount = $_POST['totalAmount'];
	$participant = $_POST['participant'];
	$phone = $_POST['phone'];
	$event = $_POST['event'];
	$location = $_POST['location'];
	$link = $_POST['link'];
	$startDate = $_POST['sDate'];
	$startTime = $_POST['sTime'];
	$eventId = $_POST['eventId'];
	
	$count1 = $_POST['count1'];
    $count2 = $_POST['count2'];
    $count3 = $_POST['count3'];
    $count4 = $_POST['count4'];
    $count5 = $_POST['count5'];
    $count6 = $_POST['count6'];
    $count7 = $_POST['count7'];
    $count8 = $_POST['count8'];
    
    $seat1 = $_POST['seat1'];
    $seat2 = $_POST['seat2'];
    $seat3 = $_POST['seat3'];
    $seat4 = $_POST['seat4'];
    $seat5 = $_POST['seat5'];
    $seat6 = $_POST['seat6'];
    $seat7 = $_POST['seat7'];
    $seat8 = $_POST['seat8'];
	
// 	$adultCount = $_POST['adultCount'];
// 	$childrenCount = $_POST['childrenCount'];
// 	$coupleCount = $_POST['coupleCount'];
// 	$adult_seat = $_POST['adult_seat'];
// 	$children_seat = $_POST['children_seat'];
// 	$couple_seat = $_POST['couple_seat'];

	$bookingId = uniqid();



$_SESSION['participant'] = $participant;
$_SESSION['user'] = $user;
$_SESSION['phone'] = $phone;
$_SESSION['event'] = $event;
$_SESSION['email'] = $email;
$_SESSION['location'] = $location;
$_SESSION['link'] = $link;
$_SESSION['startDate'] = $startDate;
$_SESSION['startTime'] = $startTime;
$_SESSION['bookingId'] = $bookingId;
$_SESSION ['eventId'] = $eventId;

$_SESSION ['count1'] = $count1;
$_SESSION ['count2'] = $count2;
$_SESSION ['count3'] = $count3;
$_SESSION ['count4'] = $count4;
$_SESSION ['count5'] = $count5;
$_SESSION ['count6'] = $count6;
$_SESSION ['count7'] = $count7;
$_SESSION ['count8'] = $count8;

$_SESSION ['seat1'] = $seat1;
$_SESSION ['seat2'] = $seat2;
$_SESSION ['seat3'] = $seat3;
$_SESSION ['seat4'] = $seat4;
$_SESSION ['seat5'] = $seat5;
$_SESSION ['seat6'] = $seat6;
$_SESSION ['seat7'] = $seat7;
$_SESSION ['seat8'] = $seat8;

// $_SESSION ['adultCount'] = $adultCount;
// $_SESSION ['childrenCount'] = $childrenCount;
// $_SESSION ['coupleCount'] = $coupleCount;

// $_SESSION ['adult_seat'] = $adult_seat;
// $_SESSION ['children_seat'] = $children_seat;
// $_SESSION ['couple_seat'] = $couple_seat;


}

 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<title>Checkout | My City Events</title>
<style type="text/css">
*{margin: 0;}
body{
	font-family: 'Roboto',sans-serif;
}
	table{
	border-collapse: collapse;
	width: 70%;
	margin-left: auto;
	margin-right: auto;
}
td, th{
	border: 1px solid #f1f1f1;
	text-align: left;
	padding: 10px;
}
input{
	border: none;
	width: 100%;
	outline: none; 
	cursor: text;
}
th{
	border-bottom: 2px solid #b0b7f2;
	color: #2f3038;
}

.no-display{
	display: none;
}
section{
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	padding-right: 10px;
	border-radius: 3px;
	margin-top: -130px;
	padding: 20px;
	box-shadow: 0 0 5px #ccc;	
}
h3{
	text-transform: uppercase;
	border-bottom: 2px solid #3ca1c1;
	padding-bottom: 5px;
	margin-bottom: 15px;
	color: #263147;
	font-size: 17px;
	/*font-weight: normal;*/
	font-family: 'Roboto', sans-serif;
}
span{
	display: inline-block;
	float: left;
	font-weight: bold;
	padding-right: 10px;
}
span, p{
	padding-top: 10px;
}
h4{
	border-top: 1px dashed #ccc;
	padding-top: 10px;
	padding-bottom: 5px;
}


.Checkout{
	background: #3ca1c1;
	margin-top: 20px;
	padding: 7px;
	cursor: pointer;
	border-radius: 3px;
	color: #FFF;
	width: 200px;
	font-size: 15px;
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
	</style>
</head>
<body>
<header>
	<a href="../index.php"><img src="../img/mylogo.png"></a>
</header>

<br><br><br><br>

	<form method="post" action="../Paytm/PaytmKit/pgRedirect.php">
		<table style="visibility: hidden;">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>Order ID</label></td>
					<td><input id="ORDER_ID" readonly tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr class="no-display">
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" readonly tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="Test"></td>
				</tr>
				<tr class="no-display">
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" readonly tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr class="no-display">
					<td>4</td>
					<td><label>Channel:*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" readonly maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>Total Amount</label></td>
					<td><input title="TXN_AMOUNT" readonly tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $amount; ?>">
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>Total Participant</label></td>
					<td><input readonly	type="text" value="<?php echo $participant; ?>"></td>
				</tr>
			</tbody>
		</table>
		
		<section>
			<h3><?php echo "Hello, $user"; ?></h3>
			<span>Event name: </span><p><?php echo "$event"; ?></p>
			<span>Total amount: </span><p><?php echo "Rs. "."$amount"; ?></p>
			<span>Total participants: </span><p><?php echo "$participant"; ?></p>
			<span>Event location: </span><p><?php echo "$location"; ?></p>
			<span>Start date: </span><p><?php echo "$startDate"; ?></p>
			<span>Start time: </span><p><?php echo "$startTime"; ?></p>
			<span>Booking id: </span><p><?php echo "$bookingId"; ?></p><br>
			<h4>Contact Details</h4>
			<span>Email: </span><p><?php echo $email; ?></p>
			<span>Phone: </span><p><?php echo "+91 - $phone"; ?></p>
			<input value="Checkout" type="submit" onclick="" class="Checkout">
	
		</section>
	</form>

</body>
</html>